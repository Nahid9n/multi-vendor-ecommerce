<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrdersDetails;
use App\Models\SellerCommission;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $order = Order::find($id);
        $orderDetails = OrdersDetails::where('order_id',$order->id)->orderBy('seller_id')->get();
        $tax = 0;
        foreach($orderDetails as $orderDetail){
            $tax = $orderDetail->tax_total + $tax;
        }
        return view('admin.sales.show-order',[
            'order'=>Order::find($id),
            'orderDetails'=>$orderDetails,
            'tax'=>$tax,

        ]);
    }

    public function showInhouseOrderDetails($id)
    {
        $order = Order::find($id);
        $orderDetails = OrdersDetails::where('order_id',$order->id)->where('seller_id',auth()->user()->id)->get();
        $tax = 0;
        foreach($orderDetails as $orderDetail){
            $tax = $orderDetail->tax_total + $tax;
        }
        return view('admin.sales.show-inhouse-order',[
            'order'=>Order::find($id),
            'orderDetails'=>$orderDetails,
            'tax'=>$tax,
        ]);
    }
    public function showSellerOrderDetails($id)
    {
        $order = Order::find($id);
        $orderDetails = OrdersDetails::where('order_id',$order->id)->whereNotIn('seller_id',[1])->get();
        $sellerCommission = SellerCommission::first();
        $tax = 0;
        foreach($orderDetails as $orderDetail){
            $tax = $orderDetail->tax_total + $tax;
        }
        return view('admin.sales.show-seller-order',[
            'order'=>Order::find($id),
            'orderDetails'=>$orderDetails,
            'tax'=>$tax,
            'sellerCommission'=>$sellerCommission,
        ]);
    }
    public function showOrderDetails($id)
    {
        $order = Order::find($id);
        $orderDetails = OrdersDetails::where('order_id',$order->id)->where('seller_id',auth()->user()->id)->get();
        $sellerCommission = SellerCommission::first();
        $tax = 0;
        foreach($orderDetails as $orderDetail){
            $tax = $orderDetail->tax_total + $tax;
        }
        return view('seller.sales.show-order',[
            'order'=>Order::find($id),
            'orderDetails'=>$orderDetails,
            'tax'=>$tax,
            'sellerCommission'=>$sellerCommission,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
