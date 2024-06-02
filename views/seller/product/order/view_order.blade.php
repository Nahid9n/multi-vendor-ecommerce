@extends('seller.Layout.master')
@section('title','Show Seller ')
@section('body')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title">Order Views</h3>
                    <h3><a class="btn btn-primary" href="{{route('seller-product.orderDetail',$order->id)}}">Order Details</a></h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">

                        <tr>
                            <th>Order Number</th>
                            <td>{{$order->order_number ?? "N/A"}}</td>
                        </tr>
                        <tr>
                            <th> Prodcut Name</th>
                            <td>{{$order->product_name ?? "N/A"}}</td>
                        </tr>
                        <tr>
                            <th>Product Quantity</th>
                            <th>{{$order->product_qty ?? "N/A"}}</th>
                        </tr>
                        <tr>
                            <th>Product Color</th>
                            <th>{{$order->product_color ?? "N/A"}}</th>
                        </tr>
                        <tr>
                            <th>Product Size</th>
                            <td>{{$order->product_size ?? "N/A"}}</td>
                        </tr>
                        <tr>
                            <th> Product Price</th>
                            <td>{{$order->product_price ?? "N/A"}}</td>
                        </tr>
                        <tr>
                            <th>Total Price</th>
                        <td>{{ $order->total_price ?? "N/A"}}</td>
                        </tr>
                        <tr>
                            <th>Total Shipping</th>
                            <td>{{$order->total_shipping ?? "N/A"}}</td>
                        </tr>
                        <tr>
                            <th>Order satus</th>
                            <td>{{$order->order_number==1 ? "Approved":"Pending"}}</td>
                        </tr>
                        <tr>
                            <th>Delivery Address</th>
                            <td>{{$order->delivery_address ?? "N/A"}}</td>
                        </tr>
                        <tr>
                            <th>Payment Amount</th>

                            <td>{{ $order->payment_amount ?? 'N/A'}}</td>

                        </tr>

                        <tr>
                            <th>Payment Method</th>
                            <td>{{ $order->payment_method?? 'N/A'}}</td>
                        </tr>
                        <tr>
                            <th>Payment Status</th>
                            <td>{{ $order->payment_status?? 'N/A'}}</td>
                        </tr>
                        <tr>
                            <th>Payment Date</th>
                            <td>{{$order->payment_date?? "N/A"}}</td>
                        </tr>
                        <tr>
                            <th>Delivery Status</th>
                            <td>
                               {{ $order->delivery_status ==1 ? "Active": "Inactive"}}
                            </td>
                        </tr>
                        <tr>
                            <th>Delivery Date</th>
                            <td>
                              {{ $order->delivery_date ?? "N/A"}}
                            </td>
                        </tr>
                        <tr>
                            <th>Currency</th>
                            <td>
                              {{$order->currency}}
                            </td>
                        </tr>
                            <th>Transation ID</th>
                            <td>{{$order->transaction_id}}</td>
                        </tr>
                        <tr>
                            <th>Cupon</th>
                            <td>{{$order->coupon}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

