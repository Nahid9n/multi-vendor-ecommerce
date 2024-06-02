<?php

namespace App\Http\Controllers\DeliveryBoy;
use App\Http\Controllers\Controller;
use App\Models\DeliveryBoyOrder;
use App\Models\Order;
use Illuminate\Http\Request;

class DeliveryBoyOrderController extends Controller
{
    public function confirmPickup(Request $request,$id){
        $order = Order::find($id);
        $order->deliveryBoy_pickup = $request->confirm;
        $order->delivery_status = $request->confirm;
        $order->save();

        $deliveryBoyOrder = DeliveryBoyOrder::where('user_id',auth()->user()->id)->first();
        $deliveryBoyOrder->pickup_order = ($deliveryBoyOrder->pickup_order + 1);
        $deliveryBoyOrder->save();

        toastr()->success('Pickup the Order Success.');
        return back();
    }
    public function deliveryBoyDeliverStatus(Request $request,$id){

        $order = Order::find($id);
        $order->delivery_status = $request->delivery_status;
        $order->save();

        if ($request->delivery_status == 3){
            $deliveryBoyOrder = DeliveryBoyOrder::where('user_id',auth()->user()->id)->first();
            $deliveryBoyOrder->complete_order = $deliveryBoyOrder->complete_order + 1;
            $deliveryBoyOrder->earning = $deliveryBoyOrder->earning + (($order->total_shipping * 30)/100);
            $deliveryBoyOrder->balance = $deliveryBoyOrder->balance + (($order->total_shipping * 30)/100);
            $deliveryBoyOrder->total_collection = $deliveryBoyOrder->total_collection + $order->total_shipping;
            $deliveryBoyOrder->pending_order = $deliveryBoyOrder->pending_order - 1;
            $deliveryBoyOrder->save();
        }
        if ($request->delivery_status == 4){
            $order->deliveryBoy_id = null;
            $order->deliveryBoy_pickup = null;
            $order->save();

            $deliveryBoyOrder = DeliveryBoyOrder::where('user_id',auth()->user()->id)->first();
            $deliveryBoyOrder->pending_order = $deliveryBoyOrder->pending_order - 1;
            $deliveryBoyOrder->save();
        }
        toastr()->success('On the way the Order Success.');
        return back();
    }
    public function adminConfirmAssignCancelRequest(Request $request,$id){

        $order = Order::find($id);
        $order->deliveryBoy_pickup = 0;
        $deliveryBoyOrder = DeliveryBoyOrder::where('user_id',$order->deliveryBoy_id)->first();
        $deliveryBoyOrder->cancel_order = ($deliveryBoyOrder->cancel_order + 1);
        if ($deliveryBoyOrder->pending_order != 0){
            $deliveryBoyOrder->pending_order = ($deliveryBoyOrder->pending_order - 1);
        }
        $deliveryBoyOrder->save();
        $order->deliveryBoy_id = null;
        $order->deliveryBoy_pickup = null;
        $order->save();

        toastr()->success('Request Confirm Success.');
        return back();
    }
    public function cancelRequestPickup(Request $request,$id){

        $order = Order::find($id);
        $order->deliveryBoy_pickup = $request->cancel;
        $order->save();

        $deliveryBoyOrder = DeliveryBoyOrder::where('user_id',auth()->user()->id)->first();
        $deliveryBoyOrder->request_cancel_order = ($deliveryBoyOrder->request_cancel_order + 1);
        $deliveryBoyOrder->pending_order = $deliveryBoyOrder->pending_order - 1;
        $deliveryBoyOrder->save();

        toastr()->success('Delivery Order Cancel Request Sent Successfully Wait For Admin Approval.');
        return back();
    }

    public function adminCancelAssignRequest(Request $request,$id){

        $order = Order::find($id);
        $order->deliveryBoy_pickup = 1;
        $order->save();

        $deliveryBoyOrder = DeliveryBoyOrder::where('user_id',$order->deliveryBoy_id)->first();
        $deliveryBoyOrder->pending_order = $deliveryBoyOrder->pending_order + 1;
        $deliveryBoyOrder->save();
        toastr()->success('Delivery Order Cancel Request Rejected Successfully.');
        return back();
    }


}
