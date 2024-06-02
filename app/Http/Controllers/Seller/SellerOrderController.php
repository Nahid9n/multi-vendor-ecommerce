<?php

namespace App\Http\Controllers\Seller;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrdersDetails;
use App\Models\SellerCommission;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class SellerOrderController extends Controller
{

    public function order(){
        if(auth()->user()->status == 1){
            $orders = OrdersDetails::where('seller_id',auth()->user()->id)->orderBy('id','desc')->get();
            $order_ids = array();
            foreach ($orders as $order){
                if (!in_array($order->order_id,$order_ids)){
                    array_push($order_ids,$order->order_id);
                }
            }
            $orders = Order::whereIn('id',$order_ids)->latest()->get();
            return view('seller.sales.order',compact("orders"));
        }else{
            Toastr::error('You are not authenticated.');
            return back();
        }
    }

    public function completeOrder(){
        if( auth()->user()->status ==1 ){
            $orders = OrdersDetails::where('seller_id',auth()->user()->id)->get();
            $order_ids = array();
            foreach ($orders as $order){
                if (!in_array($order->order_id,$order_ids)){
                    array_push($order_ids,$order->order_id);
                }
            }
            $orders = Order::whereIn('id',$order_ids)->where('order_status',1)->latest()->get();
            return view('seller.sales.order',compact("orders"));

        }else{
            Toastr::error('You are not authenticated.');
            return back();
        }
    }
}
