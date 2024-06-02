<?php

namespace App\Http\Controllers;

use App\Mail\OrderInvoice;
use App\Models\BillingModel;
use App\Models\CartItem;
use App\Models\Coupon;
use App\Models\CouponUsed;
use App\Models\Customer;
use App\Models\CustomerWallet;
use App\Models\FeatureActivation;
use App\Models\Invoice;
use App\Models\Message;
use App\Models\Order;
use App\Models\OrdersDetails;
use App\Models\Product;
use App\Models\ProductStock;
use App\Models\Refund;
use App\Models\ShippingsModel;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Queue\Failed\DynamoDbFailedJobProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Cart;
use Barryvdh\DomPDF\Facade\Pdf;

class CheckoutController extends Controller
{
    private $order,$customer;
    public function index(){
        if(auth()->user()->role != 'customer'){
            Toastr::error("Only customer can access this page");
            return redirect()->route('home');
        }
        else{
        $cartContent = CartItem::where('user_id', auth()->user()->id)->get();
            return view('website.checkout.index', compact('cartContent'));
        }
    }
    public function couponCodeApply(Request $request){

       try {
            $this->validate($request,[
                'coupon' => 'required'
            ]);
            $couponMain = Coupon::where('coupon_code',$request->coupon)->first();
            if ($couponMain){
                if ($couponMain->coupon_type == 'product'){
                    $cartContents = CartItem::where('user_id', auth()->user()->id)->get('product_id');
                    $cartContentProductIds = array();
                    foreach ($cartContents as $content){
                        array_push($cartContentProductIds,$content->product_id);
                    }

                    $usedCoupon = CouponUsed::where('coupon_id',$couponMain->id)->first();
                    $couponProducts = Coupon::whereIn('product_id',$cartContentProductIds)->get();
                    $couponProductIds = array();
                    foreach ($couponProducts as $coupon){
                        if ($request->coupon == $coupon->coupon_code){
                            array_push($couponProductIds,$coupon->product_id);
                        }
                    }
                    $couponProducts = Coupon::whereIn('product_id',$couponProductIds)->get();

                    if (!$usedCoupon){
                        if ($couponProducts != ''){
                            foreach ($couponProducts as $product){
                                $productProduct_id = $product->product_id;
                                if ($product->coupon_code == $request->coupon){
                                    $cartContent = CartItem::where('user_id', auth()->user()->id)->where('product_id',$product->product_id)->first();
                                    if ($product->discount_status == 1){
                                        $discount = ($cartContent->price * $product->discount)/100;
                                        $cartContentPrice = $cartContent->price - $discount;
                                    }
                                    elseif ($product->discount_status == 0){
                                        $discount = $product->discount;
                                        $cartContentPrice = $cartContent->price - $product->discount;
                                    }
                                    $usedCoupon_id = $couponMain->id;
                                    $usedUser_id = auth()->user()->id;
                                    Toastr::success('apply coupon success.');
                                    return back()->with([
                                        'discount' => $discount,
                                        'couponType' => $couponMain->coupon_type,
                                        'cartContentPrice' => $cartContentPrice,
                                        'usedCoupon_id' => $usedCoupon_id,
                                        'usedUser_id' => $usedUser_id,
                                        'productProduct_id' => $productProduct_id,
                                        'couponMain_productId' => $couponMain->product_id,
                                    ]);
                                }
                                else{
                                    Toastr::error('Invalid Coupon Code');
                                    return back();
                                }
                            }
                        }
                        else{
                            Toastr::error('Invalid Coupon Code');
                            return back();
                        }
                    }
                    else{
                        Toastr::error('Invalid Coupon Code');
                        return back();
                    }
                }
                else{
                    $usedCoupon = CouponUsed::where('coupon_id',$couponMain->id)->first();
                    if (!$usedCoupon){

                        if ($couponMain->discount_status == 1){
                            $discount = ($request->order_total * $couponMain->discount)/100;
                            $cartTotal = $request->order_total - $discount;
                        }
                        elseif ($couponMain->discount_status == 0){

                            $discount = $couponMain->discount;
                            $cartTotal = $request->order_total - $discount;
                        }

                        $usedCoupon_id = $couponMain->id;
                        $usedUser_id = auth()->user()->id;
                        Toastr::success('apply coupon success.');
                        return back()->with([
                            'discount' => $discount,
                            'couponType' => $couponMain->coupon_type,
                            'cartTotal' => $cartTotal,
                            'usedCoupon_id' => $usedCoupon_id,
                            'usedUser_id' => $usedUser_id,
                            'couponMain_productId' => $couponMain->product_id,
                        ]);
                    }
                    else{
                        Toastr::error('Invalid Coupon Code');
                        return back();
                    }
                }
            }
            else{
                Toastr::error('Invalid Coupon');
                return back();
            }
       }
       catch (Exception $e){
           Toastr::error($e->getMessage());
           return back();
       }
    }
    public function newOrder(Request $request){
        try {
            if(auth()->user()->status == 1){
                $cartContent = CartItem::all();
                if ($cartContent->isEmpty()) {
                  Toastr::error('The cart is empty');
                  return redirect()->back();
                } else {
                    $this->validate($request,[
                        'name' => 'required',
                        'email' => 'required',
                        'delivery_address' => 'required',
                        'phone' => 'required',
                        'payment' => 'required',
                    ]);
                    $customer = auth()->user()->email;
                    $order_number = self::unique_code();
                    $order_code = self::unique_code();

                    if($request->payment == 'wallet'){
                        $wallet = CustomerWallet::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->first('balance');

                        if($wallet->balance < $request->order_total){
                            Toastr::error("Insufficient balance at wallet");
                            return redirect()->route('customer.dashboard');
                        }
                        CustomerWallet::create([
                            'payment_method'    =>$request->payment_type,
                            'user_id'           => auth()->user()->id,
                            'balance'           => $wallet->balance - (int)$request->order_total,
                        ]);
                    }
                    if ($request->usedCoupon_id != ''){
                        $used = new CouponUsed();
                        $used->coupon_id = $request->usedCoupon_id;
                        $used->user_id = $request->usedUser_id;
                        $used->save();
                    }

                    $order = Order::newOrder($customer,$request,$order_number,$order_code);
                    $cartContent = CartItem::where('user_id', auth()->user()->id)->get();

                    foreach ($cartContent as $product){
                        $products = Product::find($product->product_id);
                        if($products->product_select == 'single_product'){
                            Product::where('id', $product->product_id)->update(['product_stock' => $products->product_stock - (int)$product->qty]);
                            $single_stock = ProductStock::where('product_id',$products->id)->first();
                            $single_stock->qty = $single_stock->qty - $product->qty;
                            $single_stock->save();
                        }
                        elseif($products->product_select == 'product_variation'){

                            $color = $product->color_id;
                            $size = $product->size_id;
                            $variant = $color.'-'.$size;

                            if($color != null){
                                if($size !=null){
                                    $product_stock = ProductStock::where('product_id',$products->id)->where('variant',$variant)->first();
                                    $product_stock->update([
                                        'qty'   => $product_stock->qty - $product->qty
                                    ]);
                                }
                            }
                            if($color != null){
                                if($size == null){
                                    $product_stock = ProductStock::where('product_id',$products->id)->where('variant',$color)->first();
                                    $product_stock->update([
                                        'qty'   => $product_stock->qty - $product->qty
                                    ]);
                                }
                            }
                            if($size != null){
                                if($color == null){
                                    $product_stock = ProductStock::where('product_id',$products->id)->where('variant',$size)->first();
                                    $product_stock->update([
                                        'qty'   => $product_stock->qty - $product->qty
                                    ]);
                                }
                            }
                        }
                        OrdersDetails::newOrderDetails($request,$order);
                    }
                    $invoice = Invoice::createInvoice($request,$order);
                    $data = [
                        'invoice' => $invoice,
                        'order' => $order,
                    ];
                    $tax_total = $request->tax_total;

                    $activation = FeatureActivation::where('name','Order_Invoice_Email')->where('type','Business Related')->first();
                    if($activation->status ==1){
                        Mail::to($order->user->email)->send(new OrderInvoice($order,$tax_total));
                    }
                    Toastr::success("Order placed successfully");
                    return redirect()->route('customer.dashboard')->with('message','order placed. please waiting for your product.');
                }

            }else{
                Toastr::error('You are banned, Please Login again.');
                return redirect()->back();
            }
        }catch (Exception $exception){
            Toastr::error($exception->getMessage());
            return back();
        }

    }

    function unique_code(){
        return random_int(10000000000, 99999999999);
    }


    public function billingsStore(Request $request, $id){

        try{

           $address = BillingModel::where('customer_id', $id)->first();

            if(!$address){
                Toastr::error("Unable to update");
                return redirect()->back();
            }

           $address->update([
                'address_one'    => $request->address_one,
                'address_two'    => $request->address_two,
                'city'           => $request->city,
                'state'          => $request->state,
                'zip'            => $request->zip,
                'country'        => $request->country,
           ]);

           Toastr::success("Billing address has been updated");
           return redirect()->route('customer.address');
        }
        catch(Exception $e){
            Toastr::error($e);
            return redirect()->back();
        }
    }

    public function shippingStore(Request $request, $id){
        try{
           $address = ShippingsModel::where('customer_id', $id)->first();
           $address->update([
                'address_one'    => $request->address_one,
                'address_two'    => $request->address_two,
                'city'           => $request->city,
                'state'          => $request->state,
                'zip'            => $request->zip,
                'country'        => $request->country,
           ]);
           Toastr::success("Shipping address has been updated");
           return redirect()->route('customer.address');
        }
        catch(Exception $e){
            Toastr::error($e);
            return redirect()->back();
        }
    }
    public function showOrder($id){
            $order = Order::find($id);
            return redirect()->route('customer.dashboard')->with('order', $order);
    }


    public function updateCustomerInfo(Request $request, $id){
        try{
            $validation = Validator::make($request->all(),[
                'first_name'     => 'string|min:3|max:64|nullable',
                'last_name'      => 'string|min:3|max:64|nullable',
                'dname'          => 'string|min:3|max:20|nullable',
                'phone'          => 'string|min:5|max:20|nullable',
                'company'        => 'string|min:3|max:100|nullable',
                'street_address' => 'string|min:3|max:255|nullable',
                'gender'         => 'string|min:3|max:10|nullable',
                'state'          => 'string|min:3|max:64|nullable',
                'post'           => 'string|min:3|max:64|nullable',
                'country'        => 'string|min:3|max:100|nullable',
                'ssn'            => 'string|min:3|max:64|nullable',
                'city'           => 'string|min:3|max:64|nullable',
                'email'          => 'string|min:3|max:255|nullable',
                'dob'            => 'string|min:3|max:20|nullable',
            ]);
            if($validation->fails()) {
                return redirect()->back()->withErrors($validation->errors());
            }


            $user_table = User::find($id);
            $user_table->update([
                'name'     => $request->dname
            ]);

            $customer = Customer::where('user_id',$id)->first();
            $image = $request->old_image;

            if(isset($request->image)){
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image = 'avatar'.'/'.$imageName;
                $destinationPath = public_path('/avatar');
                $request->file('image')->move($destinationPath, $imageName);

                if(file_exists($request->old_image)) {
                    unlink($request->old_image);
                }
            }

            $customer->update([
                'firstName'     => $request->first_name,
                'lastName'      => $request->last_name,
                'image'          => $image,
                'phone'          => $request->phone,
                'company'        => $request->company,
                'street_address' => $request->street_address,
                'gender'         => $request->gender,
                'state'          => $request->state,
                'post'           => $request->post,
                'country'        => $request->country,
                'ssn'            => $request->ssn,
                'city'           => $request->city,
                'date_of_birth'  => $request->dob,
            ]);
            Toastr::success('Data updated');
            return redirect()->route('customer.account.details');
        }catch(Exception $e){
            Toastr::error($e->getMessage());
            return redirect()->back();
        }
    }

    public function userPasswordChange(Request $request, $id){

        try{
            $validation = Validator::make($request->all(), [
                'email' => 'email|unique:users,email,'.$id,
            ]);

            if ($validation->fails()) {
                Toastr::error($validation->messages());
                return redirect()->back();
            }

            $user = User::find(auth()->user()->id);

            if(isset($request->npassword)){

                #Match The Old Password
                if(Hash::check($request->password, $user->password)){
                    $new_password['password'] = Hash::make($request->npassword);
                    $user->update($new_password);
                    Toastr::success("Password has been changed");
                    return redirect()->back();
                }else{
                    Toastr::error("Password Unable to change");
                    return redirect()->back();
                }
            }

            $user->update([
                'name'          => $request->dname,
                'email'          => $request->email,
            ]);

            $customer = Customer::where('user_id', auth()->user()->id);
            $customer->update([
                'firstName'        => $request->first_name,
                'lastName'         => $request->last_name,
                'image'            => $request->image,
                'phone'            => $request->phone,
                'date_of_birth'    => $request->dob,
                'gender'           => $request->gender,
                'street_address'   => $request->street_address,
                'city'             => $request->city,
                'state'            => $request->state,
                'post'             => $request->post,
                'country'          => $request->country,
                'ssn'              => $request->ssn,
                'company'          => $request->company,
            ]);
            Toastr::success("Information has been updated");
            return redirect()->route('customer.dashboard');
        }
        catch(Exception $e){
            return redirect()->back();
        }
    }


    public function orderFilter($id){

        $status = '';

        if($id == 1){
            $status = 'Pending';
        }

        if($id == 2){
            $status = 'Accepted';
        }

        if($id == 3){
            $status = 'Delivered';
        }

        if($id == 4){
            $status = 'Canceled';
        }
        $orders = Order::where('user_id', auth()->user()->id)->where('order_status', $status)->get();
        $billings = BillingModel::where('customer_id', auth()->user()->id)->first();
        $shippings = ShippingsModel::where('customer_id', auth()->user()->id)->first();
        $customer = Customer::where('user_id', auth()->user()->id)->first();
        $conversation = Message::with('receiver')->where('conversation_id', $id)->get();
        return view('customer.home.index', compact('orders', 'billings', 'shippings', 'id', 'customer', 'conversation'));
    }

    public function orderReturnSubmit(Request $request){
        try{

            $validate = Validator::make($request->all(),[
                'order_code'        =>'required',
                'product'           =>'required',
                'price'             =>'required',
                'reason'            =>'required'
            ]);

            if($validate->fails()){
                Toastr::error($validation->messages());
                return redirect()->back();
            }

           Refund::create([
            'seller_name'       => "test seller name",
            'customer_id'       => auth()->user()->id,
            'order_code'        => $request->order_code,
            'product'           => $request->product,
            'price'             => $request->price,
            'seller_approval'   => 0,
            'refund_status'     => 0,
            'reason'            => $request->reason,
           ]);

           return response()->json(['Data has been successfully created.']);


        }catch(Exception $e){
            Toastr::error($e->getMessage());
            return redirect()->back();
        }
    }


    public function customerOrderCancel(Request $request){
        try{
            $order = Order::where('id', $request->order_id)->update(['order_status' => 2]);
            if($order){
                return response()->json(['success' => 'Order canceled']);
            }else{
                return response()->json(['error' => 'Order not canceled']);
            }

        }catch(Exception $e){
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
