<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrdersDetails;
use App\Models\Refund;
use App\Models\vendorWallet;
use Illuminate\Http\Request;
use Exception;

class RefundController extends Controller
{
    public function request(){
        return view('admin.refund.request',[
            'refunds'=>Refund::where('refund_status',0)->latest()->get(),
        ]);
    }
    public function approve(){
        return view('admin.refund.approve',[
            'refunds'=>Refund::where('refund_status',1)->latest()->get(),
        ]);
    }
    public function rejected(){
        return view('admin.refund.rejected',[
            'refunds'=>Refund::where('refund_status',2)->latest()->get(),
        ]);
    }
    public function refundView($id){
        $refund = Refund::find($id);
        return view('admin.refund.view',compact('refund'));
    }
    public function refundStatusChange(Request $request,$id){
        $refund = Refund::find($id);
        $sellerWallet = vendorWallet::where('user_id',$refund->user_id)->first();
        if ($refund->refund_status == 0){
            if ($request->refund_status == 1){
                $refund->refund_status = $request->refund_status;
                $refund->save();
            }
            if ($request->refund_status == 2){
                $refund->refund_status = $request->refund_status;
                $refund->save();
            }
        }
        if ($refund->refund_status == 1){
            if ($request->refund_status == 0){
                $refund->refund_status = $request->refund_status;
                $refund->save();
            }
            if ($request->refund_status == 2){
                $refund->refund_status = $request->refund_status;
                $refund->save();
            }
        }
        if ($refund->refund_status == 2){
            if ($request->refund_status == 1){
                $refund->refund_status = $request->refund_status;
                $refund->save();
            }
            if ($request->refund_status == 0){
                $refund->refund_status = $request->refund_status;
                $refund->save();
            }
        }
        toastr()->success('Successfully Change Status.');
        return back();
    }
    public function refundSellerStatusChange(Request $request,$id){
        $refund = Refund::find($id);
        $sellerWallet = vendorWallet::where('user_id',$refund->user_id)->first();
        if ($refund->seller_approval == 0){
            if ($request->seller_approval == 1){
                $sellerWallet->total_earning = $sellerWallet->total_earning - $refund->price;
                $sellerWallet->balance = $sellerWallet->balance - $refund->price;
                $sellerWallet->save();
                $refund->seller_approval = $request->seller_approval;
                $refund->save();
            }
            if ($request->seller_approval == 2){
                $refund->seller_approval = $request->seller_approval;
                $refund->save();
            }
        }
        if ($refund->seller_approval == 1){
            if ($request->seller_approval == 0){
                $sellerWallet->total_earning = $sellerWallet->total_earning + $refund->price;
                $sellerWallet->balance = $sellerWallet->balance + $refund->price;
                $sellerWallet->save();
                $refund->seller_approval = $request->seller_approval;
                $refund->save();
            }
            if ($request->seller_approval == 2){
                $sellerWallet = vendorWallet::where('user_id',$refund->user_id)->first();
                $sellerWallet->total_earning = $sellerWallet->total_earning + $refund->price;
                $sellerWallet->balance = $sellerWallet->balance + $refund->price;
                $sellerWallet->save();
                $refund->seller_approval = $request->seller_approval;
                $refund->save();
            }
        }
        if ($refund->seller_approval == 2){
            if ($request->seller_approval == 1){
                $sellerWallet->total_earning = $sellerWallet->total_earning - $refund->price;
                $sellerWallet->balance = $sellerWallet->balance - $refund->price;
                $sellerWallet->save();
                $refund->seller_approval = $request->seller_approval;
                $refund->save();
            }
            if ($request->seller_approval == 0){
                $refund->seller_approval = $request->seller_approval;
                $refund->save();
            }
        }
        toastr()->success('Successfully Change Status.');
        return back();
    }
    public function customerRefund(){
        $refunds = Refund::where('customer_id',auth()->user()->id)->latest()->get();
        return view('customer.refund.index',compact('refunds'));
    }
    public function refundCustomerRequest(){
        $refunds = Refund::where('customer_id',auth()->user()->id)->where('refund_status',0)->latest()->get();
        return view('customer.refund.requests',compact('refunds'));
    }

    public function refundOrderDetails($id){
        $order = Order::find($id);
        $refunds = Refund::where('customer_id',auth()->user()->id)->where('order_id',$order->id)->get();
        $orderDetails = OrdersDetails::where('order_id',$order->id)->get();
        return view('customer.refund.refund-details', compact('order','orderDetails','refunds'));
    }
    public function refundCustomerView($id){
        $refund = Refund::find($id);
        return view('customer.refund.view',compact('refund'));
    }
    public function refundRequest(Request $request){
        try {
            $this->validate($request,[
                'reason' => 'required',
                'order_id' => 'required',
                'user_id' => 'required',
                'price' => 'required',
                'product_qty' => 'required',
            ]);
            $refund = new Refund();
            $refund->user_id = $request->user_id;
            $refund->customer_id = auth()->user()->id;
            $refund->order_id = $request->order_id;
            $refund->order_code = $request->order_code;
            $refund->product_id = $request->product_id;
            $refund->price = $request->price * $request->product_qty;
            $refund->reason = $request->reason;
            $refund->save();
            toastr()->success('Refund Request Send Succesfully.');
            return redirect()->back();
        }
        catch (Exception $e){
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }



}
