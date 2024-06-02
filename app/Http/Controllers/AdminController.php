<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\DeliveryBoy;
use App\Models\Order;
use App\Models\Product;
use App\Models\Seller;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $totalRevenue     = Order::whereNotIn('payment_amount',[0])->get();
        $pendingOrder     = Order::where('order_status',0)->count();
        $acceptedOrder     = Order::where('order_status',3)->count();
        $completeOrder     = Order::where('order_status',1)->count();
        $totalOrder     = Order::count();
        $cancelOrder     = Order::where('order_status',2)->count();
        $customer = Customer::count();
        $sellers = Seller::count();
        $product = Product::count();
        $orders = Order::where('order_status',0)->latest()->get();
        $deliveryBoys = DeliveryBoy::where('status', 1)->get();
        return view('admin.home.index',compact("totalRevenue","customer","product","sellers","completeOrder","acceptedOrder","pendingOrder","totalOrder","cancelOrder","orders","deliveryBoys"));
    }
    public function subscriber(){
        return view('admin.marketing.subscriber.subscriber',[
            'subscribers'=>Subscriber::all(),
        ]);
    }

}
