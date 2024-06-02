<?php

namespace App\Http\Controllers\DeliveryBoy;
use App\Http\Controllers\Controller;
use App\Models\DeliveryBoy;
use App\Models\DeliveryBoyOrder;
use App\Models\DeliveryBoyPayment;
use App\Models\Order;
use App\Models\OrdersDetails;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Exception;

class DeliveryBoyDashboardController extends Controller
{
    public function index(){
        $deliveryBoy = User::where('id',auth()->user()->id)->first();
        $deliveryBoyDetail = DeliveryBoyOrder::where('user_id',auth()->user()->id)->first();
        $deliveryBoyPaymentInfo = DeliveryBoy::where('user_id',auth()->user()->id)->first();
        $deliveryBoyPaymentHistories = DeliveryBoyPayment::where('user_id',auth()->user()->id)->latest()->get();
        $assignedOrders = Order::where('deliveryBoy_id',auth()->user()->id)->where('deliveryBoy_pickup',0)->get();
        $pickupOrders = Order::where('deliveryBoy_id',auth()->user()->id)->where('deliveryBoy_pickup',1)->where('delivery_status',0)->latest()->get();
        $onTheWays = Order::where('deliveryBoy_id',auth()->user()->id)->where('delivery_status',2)->latest()->get();
        $pendingOrders = Order::where('deliveryBoy_id',auth()->user()->id)->where('delivery_status',0)->latest()->get();
        $completedOrders = Order::where('deliveryBoy_id',auth()->user()->id)->where('delivery_status',3)->latest()->get();
        $cancelOrders = Order::where('deliveryBoy_id',auth()->user()->id)->where('delivery_status',4)->latest()->get();
        return view('deliveryBoy.home.index',compact(
            "deliveryBoy",
            "pickupOrders",
            "assignedOrders",
            "completedOrders",
            "onTheWays",
            "cancelOrders",
            "pendingOrders",
            "deliveryBoyDetail",
            "deliveryBoyPaymentInfo",
            "deliveryBoyPaymentHistories"));
    }
    public function assignedDelivery(){
        $assignedOrders = Order::where('deliveryBoy_id',auth()->user()->id)->where('deliveryBoy_pickup',0)->get();
        return view('deliveryBoy.delivery.assigned',compact("assignedOrders"));
    }
    public function pickupOrders(){
        $pickupOrders = Order::where('deliveryBoy_id',auth()->user()->id)->where('deliveryBoy_pickup',1)->where('delivery_status',1)->latest()->get();
        return view('deliveryBoy.delivery.pickup',compact("pickupOrders"));
    }
    public function onWayOrders(){
        $onTheWays = Order::where('deliveryBoy_id',auth()->user()->id)->where('delivery_status',2)->latest()->get();
        return view('deliveryBoy.delivery.on-the-way',compact("onTheWays"));
    }
    public function PendingDeliveries(){
        $pendingOrders = Order::where('deliveryBoy_id',auth()->user()->id)->where('delivery_status',0)->latest()->get();
        return view('deliveryBoy.delivery.pending',compact("pendingOrders"));
    }
    public function completedDeliveries(){
        $completedOrders = Order::where('deliveryBoy_id',auth()->user()->id)->where('delivery_status',3)->latest()->get();
        return view('deliveryBoy.delivery.completed',compact("completedOrders"));
    }
    public function cancelDeliveries(){
        $cancelOrders = Order::where('deliveryBoy_id',auth()->user()->id)->where('delivery_status',4)->latest()->get();
        return view('deliveryBoy.delivery.cancel',compact("cancelOrders"));
    }
    public function totalCollection(){
        $completedOrders = Order::where('deliveryBoy_id',auth()->user()->id)->where('delivery_status',3)->latest()->get();
        return view('deliveryBoy.collection.index',compact("completedOrders"));
    }
    public function earning(){
        $completedOrders = Order::where('deliveryBoy_id',auth()->user()->id)->where('delivery_status',3)->latest()->get();
        return view('deliveryBoy.earning.index',compact("completedOrders"));
    }
    public function wallet(){
        $deliveryBoy = User::where('id',auth()->user()->id)->first();
        $deliveryBoyDetail = DeliveryBoyOrder::where('user_id',auth()->user()->id)->first();
        $deliveryBoyPaymentInfo = DeliveryBoy::where('user_id',auth()->user()->id)->first();
        $deliveryBoyPaymentHistories = DeliveryBoyPayment::where('user_id',auth()->user()->id)->latest()->get();
        return view('deliveryBoy.wallet.index',compact("deliveryBoy","deliveryBoyDetail","deliveryBoyPaymentInfo","deliveryBoyPaymentHistories"));
    }

    public function deliveryBoyOrderDetails($id){
        $orderss = Order::find($id);
        $orderDetails = OrdersDetails::where('order_id',$id)->latest()->get();
        $deliverBoyOrder = DeliveryBoyOrder::where('user_id',auth()->user()->id)->first();

        return view('deliveryBoy.delivery.order-details', compact('orderss', 'orderDetails','deliverBoyOrder'));

    }
    public function register(){
        return view('delivery-boy.auth.register');
    }
    public function registerStore(Request $request){

        try {
            $validate = Validator::make($request->all(),[
                "name"          =>"required|min:3",
                "email"         =>"required|unique:users,email",
                'password'          => 'required|min:8|required_with:confirm_password|same:confirm_password',
                'confirm_password'  => 'required|min:8'
            ]);

            if($validate->fails())
            {
                toastr()->error($validate->messages());
                return redirect()->back();

            }
            $deliveryBoy = new User();
            $deliveryBoy->name = $request->name;
            $deliveryBoy->email = $request->email;
            $deliveryBoy->password = bcrypt($request->password);
            $deliveryBoy->role = 'delivery_boy';
            $deliveryBoy->save();

            $user = User::where('email',$request->email)->first();
            $deliveryBoy = new DeliveryBoy();
            $deliveryBoy->name = $request->name;
            $deliveryBoy->user_id = $user->id;
            $deliveryBoy->designation = 'DeliveryBoy';
            $deliveryBoy->save();

            $deliveryBoy = new DeliveryBoyOrder();
            $deliveryBoy->user_id = $user->id;
            $deliveryBoy->save();

            toastr()->success('Registration Success.');
            return redirect()->route('delivery-boy.login');
        }
        catch (Exception $e){
            toastr()->error($e->getMessage());
            return back();
        }


    }
    public function login(){
        return view('delivery-boy.auth.login');
    }
    public function loginConfirm(Request $request){

        try {
            $validate = Validator::make($request->all(),[
                "email"         =>"required",
                'password'          => 'required',
            ]);

            if($validate->fails())
            {
                toastr()->error($validate->messages());
                return redirect()->back();

            }
            $credential = $request->only('email', 'password');;
            $deliveryBoy = User::where('email',$request->email)->first();
            if ($deliveryBoy){
                if($deliveryBoy->status == 1){
                    if ($deliveryBoy->role == 'delivery_boy'){
                        if (Auth::guard('deliveryBoy')->attempt($credential)){
                            toastr()->success("Successfully Login");
                            return redirect()->route('delivery-boy.dashboard');
                        }
                        toastr()->error('Invalid Password.');
                        return back();
                    }
                    else{
                        toastr()->error('You are not Register.');
                        return back();
                    }
                }
                toastr()->error('You are banned.for more info contact with admin');
                return back();
            }
            toastr()->error('You are not Register.');
            return back();
        }
        catch (Exception $e){
            toastr()->error($e->getMessage());
            return back();
        }
    }
    public function logout(){
        Auth::guard('deliveryBoy')->logout();
        toastr()->success('Successfully Logout.');
        return redirect()->route('delivery-boy.login');
    }
}
