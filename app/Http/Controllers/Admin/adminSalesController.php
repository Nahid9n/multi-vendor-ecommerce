<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DeliveryBoy;
use App\Models\DeliveryBoyOrder;
use App\Models\Order;
use App\Models\OrdersDetails;
use App\Models\Product;
use App\Models\ProductStock;
use App\Models\SellerCommission;
use App\Models\vendorWallet;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AdminSalesController extends Controller
{
    public function order()
    {
        $orders = Order::orderBy('id', 'DESC')->get();
        $deliveryBoys = DeliveryBoy::where('status', 1)->get();
        return view('admin.sales.order', compact('orders', 'deliveryBoys'));
    }

    public function order_delete(string $id)
    {
        $order = Order::find($id);
        if (!$order) {
            return Redirect::back()->withErrors(['message' => 'Unable to delete']);
        }
        if ($order->order_status == 0 || $order->order_status == 1) {
            $order_details = OrdersDetails::where('order_id', $order->id)->get();
            foreach ($order_details as $data) {
                $product = Product::find($data->product_id);
                if ($product->product_select == 'single_product') {
                    if ($data->product_qty) {
                        $product->update([
                            'product_stock' => $product->product_stock + $data->product_qty,
                        ]);
                    }
                    $product_stock = ProductStock::where('product_id', $product->id)->first();
                    $product_stock->update([
                        'qty' => $product_stock->qty + $data->product_qty
                    ]);
                }
                if ($product->product_select == 'product_variation') {
                    $color = $data->product_color;
                    $size = $data->product_size;
                    ;
                    $variant = $color . '-' . $size;
                    if ($color != null) {
                        if ($size != null) {
                            $product = ProductStock::where('product_id', $product->id)->where('variant', $variant)->first();
                            $product->update([
                                'qty' => $product->qty + $data->product_qty
                            ]);

                        }
                    }
                    if ($color != null) {
                        if ($size == null) {
                            $product = ProductStock::where('product_id', $product->id)->where('variant', $color)->first();
                            $product->update([
                                'qty' => $product->qty + $data->product_qty
                            ]);
                        }
                    }
                    if ($size != null) {
                        if ($color == null) {
                            $product = ProductStock::where('product_id', $product->id)->where('variant', $size)->first();
                            $product->update([
                                'qty' => $product->qty + $data->product_qty
                            ]);
                        }

                    }
                }
            }
        }
        foreach ($order_details as $order_detail) {
            $order_detail->delete();
        }
        Order::destroy($id);

        return redirect()->route('sales.order')->withSuccess('Order Deleted');
    }

    public function inHouseOrder()
    {
        $orders = OrdersDetails::where('seller_id', 1)->get();
        $order_ids = array();
        foreach ($orders as $order) {
            if (!in_array($order->order_id, $order_ids)) {
                array_push($order_ids, $order->order_id);
            }
        }
        $orders = Order::whereIn('id', $order_ids)->latest()->get();

        $deliveryBoys = DeliveryBoy::where('status', 1)->get();
        return view('admin.sales.in-house-orders', compact('orders', 'deliveryBoys'));
    }
    public function sellerOrder()
    {
        $orders = OrdersDetails::whereNotIn('seller_id', [1])->get();
        $order_ids = array();
        foreach ($orders as $order) {
            if (!in_array($order->order_id, $order_ids)) {
                array_push($order_ids, $order->order_id);
            }
        }
        $orders = Order::whereIn('id', $order_ids)->latest()->get();

        $deliveryBoys = DeliveryBoy::where('status', 1)->get();
        return view('admin.sales.seller-orders', compact('orders', 'deliveryBoys'));
    }
    public function pickUpPointOrder()
    {
        return view('admin.sales.pickup-point-orders', [
            'products' => Product::all(),
        ]);
    }
    public function updatePaymentStatus(Request $request, $id)
    {

        $order = Order::find($id);
        $sellerCommission = SellerCommission::first();
        $sellers = OrdersDetails::whereIn('order_id', [$id])->get();

        $seller_ids = array();
        foreach ($sellers as $s) {
            if (!in_array($s->seller_id, $seller_ids)) {
                array_push($seller_ids, $s->seller_id);
            }
        }
        vendorWallet::whereIn('user_id', $seller_ids)->get();
        if ($order->payment_status == 0) {
            if ($request->payment_status == 1) {
                $order->payment_status = $request->payment_status;
                $order->payment_amount = $order->total_price;
                $order->payment_date = date('Y-m-d');
                $order->save();
                if (isset($sellers)) {
                    foreach ($sellers as $seller) {
                        $vendor = vendorWallet::where('user_id', $seller->seller_id)->first();
                        $commissionBalance = $seller->unit_price - ($seller->unit_price * ($sellerCommission->seller_commission / 100));
                        if (isset($vendor)) {
                            $vendor->total_earning = $vendor->total_earning + $commissionBalance;
                            $vendor->balance = $vendor->balance + $commissionBalance;
                            $vendor->save();
                        } else {
                            $vendor = new vendorWallet();
                            $vendor->user_id = $seller->seller_id;
                            $vendor->total_earning = $commissionBalance;
                            $vendor->balance = $commissionBalance;
                            $vendor->save();
                        }
                    }
                }
            }
            if ($request->payment_status == 2) {
                $order->payment_status = $request->payment_status;
                $order->payment_amount = 0;
                $order->payment_date = date('Y-m-d');
                $order->save();
            }
        }
        if ($order->payment_status == 1) {
            if ($request->payment_status == 0) {
                $order->payment_status = $request->payment_status;
                $order->payment_amount = 0;
                $order->payment_date = date('Y-m-d');
                $order->save();
                foreach ($sellers as $seller) {
                    $commissionBalance = $seller->unit_price - ($seller->unit_price * ($sellerCommission->seller_commission / 100));
                    $vendor = vendorWallet::where('user_id', $seller->seller_id)->first();
                    $vendor->total_earning = $vendor->total_earning - $commissionBalance;
                    $vendor->balance = $vendor->balance - $commissionBalance;
                    $vendor->save();
                }

            }
            if ($request->payment_status == 2) {
                $order->payment_status = $request->payment_status;
                $order->payment_amount = 0;
                $order->payment_date = date('Y-m-d');
                $order->save();

                foreach ($sellers as $seller) {
                    $commissionBalance = $seller->unit_price - ($seller->unit_price * ($sellerCommission->seller_commission / 100));
                    $vendor = vendorWallet::where('user_id', $seller->seller_id)->first();
                    $vendor->total_earning = $vendor->total_earning - $commissionBalance;
                    $vendor->balance = $vendor->balance - $commissionBalance;
                    $vendor->save();
                }
            }
        }
        if ($order->payment_status == 2) {
            if ($request->payment_status == 0) {
                $order->payment_status = $request->payment_status;
                $order->payment_amount = 0;
                $order->payment_date = date('Y-m-d');
                $order->save();
            }
            if ($request->payment_status == 1) {
                $order->payment_status = $request->payment_status;
                $order->payment_amount = $order->total_price;
                $order->payment_date = date('Y-m-d');
                $order->save();
                if (isset($sellers)) {
                    foreach ($sellers as $seller) {
                        $vendor = vendorWallet::where('user_id', $seller->seller_id)->first();
                        $commissionBalance = $seller->unit_price - ($seller->unit_price * ($sellerCommission->seller_commission / 100));
                        if (isset($vendor)) {
                            $vendor->total_earning = $vendor->total_earning + $commissionBalance;
                            $vendor->balance = $vendor->balance + $commissionBalance;
                            $vendor->save();
                        } else {
                            $vendor = new vendorWallet();
                            $vendor->user_id = $seller->seller_id;
                            $vendor->total_earning = $commissionBalance;
                            $vendor->balance = $commissionBalance;
                            $vendor->save();
                        }
                    }
                }
            }
        }
        toastr()->success('Update Payment Status Success.');
        return back();
    }
    public function updateOrderStatus(Request $request, $id)
    {

        $order = Order::find($id);

        // order Cancel
        if ($request->order_status == 2) {
            $order_details = OrdersDetails::where('order_id', $order->id)->get();
            foreach ($order_details as $data) {
                $product = Product::find($data->product_id);
                if ($product->product_select == 'single_product') {
                    if ($data->product_qty) {
                        $product->update([
                            'product_stock' => $product->product_stock - $data->product_qty,
                        ]);
                    }
                    $product_stock = ProductStock::where('product_id', $product->id)->first();
                    $product_stock->update([
                        'qty' => $product_stock->qty - $data->product_qty
                    ]);
                }
                if ($product->product_select == 'product_variation') {
                    $color = $data->product_color;
                    $size = $data->product_size;
                    $variant = $color . '-' . $size;
                    if ($color != null) {
                        if ($size != null) {
                            $product = ProductStock::where('product_id', $product->id)->where('variant', $variant)->first();
                            $product->update([
                                'qty' => $product->qty - $data->product_qty
                            ]);

                        }
                    }
                    if ($color != null) {
                        if ($size == null) {
                            $product = ProductStock::where('product_id', $product->id)->where('variant', $color)->first();
                            $product->update([
                                'qty' => $product->qty - $data->product_qty
                            ]);
                        }
                    }
                    if ($size != null) {
                        if ($color == null) {
                            $product = ProductStock::where('product_id', $product->id)->where('variant', $size)->first();
                            $product->update([
                                'qty' => $product->qty - $data->product_qty
                            ]);
                        }

                    }
                }
            }
        }
        // order pending
        elseif($request->order_status == 0) {
            if($order->order_status == 2){
                $order_details = OrdersDetails::where('order_id', $order->id)->get();
                foreach ($order_details as $data) {
                    $product = Product::find($data->product_id);
                    if ($product->product_select == 'single_product') {
                        if ($data->product_qty) {
                            $product->update([
                                'product_stock' => $product->product_stock + $data->product_qty,
                            ]);
                        }
                        $product_stock = ProductStock::where('product_id', $product->id)->first();
                        $product_stock->update([
                            'qty' => $product_stock->qty + $data->product_qty
                        ]);
                    }
                    if ($product->product_select == 'product_variation') {
                        $color = $data->product_color;
                        $size = $data->product_size;
                        ;
                        $variant = $color . '-' . $size;
                        if ($color != null) {
                            if ($size != null) {
                                $product = ProductStock::where('product_id', $product->id)->where('variant', $variant)->first();
                                $product->update([
                                    'qty' => $product->qty + $data->product_qty
                                ]);

                            }
                        }
                        if ($color != null) {
                            if ($size == null) {
                                $product = ProductStock::where('product_id', $product->id)->where('variant', $color)->first();
                                $product->update([
                                    'qty' => $product->qty + $data->product_qty
                                ]);
                            }
                        }
                        if ($size != null) {
                            if ($color == null) {
                                $product = ProductStock::where('product_id', $product->id)->where('variant', $size)->first();
                                $product->update([
                                    'qty' => $product->qty + $data->product_qty
                                ]);
                            }

                        }
                    }
                }

            }

        }
        //  order accept
        elseif($request->order_status == 3) {
            if($order->order_status == 2){
                $order_details = OrdersDetails::where('order_id', $order->id)->get();
                foreach ($order_details as $data) {
                    $product = Product::find($data->product_id);
                    if ($product->product_select == 'single_product') {
                        if ($data->product_qty) {
                            $product->update([
                                'product_stock' => $product->product_stock + $data->product_qty,
                            ]);
                        }
                        $product_stock = ProductStock::where('product_id', $product->id)->first();
                        $product_stock->update([
                            'qty' => $product_stock->qty + $data->product_qty
                        ]);
                    }
                    if ($product->product_select == 'product_variation') {
                        $color = $data->product_color;
                        $size = $data->product_size;
                        ;
                        $variant = $color . '-' . $size;
                        if ($color != null) {
                            if ($size != null) {
                                $product = ProductStock::where('product_id', $product->id)->where('variant', $variant)->first();
                                $product->update([
                                    'qty' => $product->qty + $data->product_qty
                                ]);

                            }
                        }
                        if ($color != null) {
                            if ($size == null) {
                                $product = ProductStock::where('product_id', $product->id)->where('variant', $color)->first();
                                $product->update([
                                    'qty' => $product->qty + $data->product_qty
                                ]);
                            }
                        }
                        if ($size != null) {
                            if ($color == null) {
                                $product = ProductStock::where('product_id', $product->id)->where('variant', $size)->first();
                                $product->update([
                                    'qty' => $product->qty + $data->product_qty
                                ]);
                            }

                        }
                    }
                }

            }
        }
        // complete order
        elseif($request->order_status == 1){
            if($order->order_status == 2){
                $order_details = OrdersDetails::where('order_id', $order->id)->get();
                foreach ($order_details as $data) {
                    $product = Product::find($data->product_id);
                    if ($product->product_select == 'single_product') {
                        if ($data->product_qty) {
                            $product->update([
                                'product_stock' => $product->product_stock + $data->product_qty,
                            ]);
                        }
                        $product_stock = ProductStock::where('product_id', $product->id)->first();
                        $product_stock->update([
                            'qty' => $product_stock->qty + $data->product_qty
                        ]);
                    }
                    if ($product->product_select == 'product_variation') {
                        $color = $data->product_color;
                        $size = $data->product_size;
                        ;
                        $variant = $color . '-' . $size;
                        if ($color != null) {
                            if ($size != null) {
                                $product = ProductStock::where('product_id', $product->id)->where('variant', $variant)->first();
                                $product->update([
                                    'qty' => $product->qty + $data->product_qty
                                ]);

                            }
                        }
                        if ($color != null) {
                            if ($size == null) {
                                $product = ProductStock::where('product_id', $product->id)->where('variant', $color)->first();
                                $product->update([
                                    'qty' => $product->qty + $data->product_qty
                                ]);
                            }
                        }
                        if ($size != null) {
                            if ($color == null) {
                                $product = ProductStock::where('product_id', $product->id)->where('variant', $size)->first();
                                $product->update([
                                    'qty' => $product->qty + $data->product_qty
                                ]);
                            }

                        }
                    }
                }
            }

        }

        $order->order_status = $request->order_status;
        $order->save();
        toastr()->success('Update Order Status Success.');
        return back();
    }
    public function updateStatus(Request $request, $id)
    {
        $order = Order::find($id);
        $order->delivery_status = $request->delivery_status;
        $order->save();
        toastr()->success('Update Delivery Status Success.');
        return back();
    }
    public function invoice($id)
    {
        $order = Order::find($id);
        $orderDetails = OrdersDetails::where('order_id', $order->id)->get();
        $tax = 0;
        foreach ($orderDetails as $orderDetail) {
            $tax = $orderDetail->tax_total + $tax;
        }
        return view('admin.invoice.invoice', [
            'order' => Order::find($id),
            'orderDetails' => $orderDetails,
            'tax' => $tax,
        ]);
    }
    public function invoiceInHouseOrders($id)
    {
        $order = Order::find($id);
        $orderDetails = OrdersDetails::where('order_id', $order->id)->where('seller_id', 1)->get();
        $tax = 0;
        foreach ($orderDetails as $orderDetail) {
            $tax = $orderDetail->tax_total + $tax;
        }
        return view('admin.invoice.invoice-in-house', [
            'order' => Order::find($id),
            'orderDetails' => $orderDetails,
            'tax' => $tax,
        ]);
    }
    public function invoiceSeller($id)
    {
        $order = Order::find($id);
        $orderDetails = OrdersDetails::where('order_id', $order->id)->where('seller_id', auth()->user()->id)->get();
        $sellerCommission = SellerCommission::first();
        $tax = 0;
        foreach ($orderDetails as $orderDetail) {
            $tax = $orderDetail->tax_total + $tax;
        }
        return view('seller.sales.invoice', [
            'order' => Order::find($id),
            'orderDetails' => $orderDetails,
            'tax' => $tax,
            'sellerCommission' => $sellerCommission,
        ]);
    }
    public function invoiceSellerOrders($id)
    {
        $order = Order::find($id);
        $orderDetails = OrdersDetails::where('order_id', $order->id)->whereNotIn('seller_id', [1])->get();
        $sellerCommission = SellerCommission::first();
        $tax = 0;
        foreach ($orderDetails as $orderDetail) {
            $tax = $orderDetail->tax_total + $tax;
        }
        return view('seller.sales.invoice', [
            'order' => Order::find($id),
            'orderDetails' => $orderDetails,
            'tax' => $tax,
            'sellerCommission' => $sellerCommission,
        ]);
    }
    public function deliveryBoyAssign(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $order = Order::find($id);

            if (!$order) {
                Toastr::error('Order not found');
                return redirect()->back();
            }

            $order->deliveryBoy_id = $request->deliveryBoy_id;
            $order->deliveryBoy_pickup = 0;
            $order->delivery_date = $request->delivery_date;
            $order->save();

            $deliveryBoyOrder = DeliveryBoyOrder::where('user_id', $request->deliveryBoy_id)->first();

            if (!$deliveryBoyOrder) {
                DB::rollBack();
                Toastr::error('No Delivery Boy found');
                return redirect()->back();
            }

            $deliveryBoyOrder->pending_order = $deliveryBoyOrder->pending_order + 1;
            $deliveryBoyOrder->save();

            DB::commit();
            Toastr::success('Delivery Boy assigned successfully');
            return back();

        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('An error occurred: ' . $e->getMessage());
            return redirect()->back();
        }
    }


}
