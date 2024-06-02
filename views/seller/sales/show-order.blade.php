@extends('seller.Layout.master')
@section('title', 'Show Order')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Order Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Order</a></li>
                <li class="breadcrumb-item active" aria-current="page">Order Detail</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Order <span class="text-danger">#{{$order->order_code}}</span> Details</h3>
                </div>
                <div class="text-end">
                    <a href="{{route('seller.order.manage')}}" class="btn btn-success my-1 float-end mx-2 text-center">All Orders</a>
                    <!-- <a href="{{route('orders.edit', $order->id)}}" class="btn btn-success my-1 float-end mx-2 text-center">Edit this Order</a> -->
                </div>
                <div class="card-body table-responsive">
                    <h4>Order Product Information</h4>
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr class="text-center">
                            <th>SL No</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Quantity</th>
                            <th>Product Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($sum = 0)
                        @foreach($orderDetails as $orderDetail)
                            <tr class="text-center">
                                <td>{{$loop->iteration}}</td>
                                <td class="text-start">
                                    <div class="row">
                                        <div class="col-2">
                                            <img class="mx-2" width="50" height="50" src="{{asset($orderDetail->product->product_image)}}" alt="">
                                        </div>
                                        <div class="text-muted col-10">
                                            <div class="text-muted">
                                                <p class="font-w600 fw-bold mb-1">{{$orderDetail->product_name}}</p>
                                            </div>
                                            <div class="text-muted">
                                                @if(isset($orderDetail->product_color))
                                                    <span class="fw-bold">Color : </span><span>{{$orderDetail->product_color}}</span><br>
                                                @endif
                                                @if(isset($orderDetail->product_size))
                                                    <span class="fw-bold">Size : </span><span>{{$orderDetail->product_size}}</span>
                                                    <br>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>{{$orderDetail->product_price}} {{$currency->symbol ?? ''}}</td>
                                <td>{{$orderDetail->product_qty}}</td>
                                <td>{{$orderDetail->product_price * $orderDetail->product_qty }} {{$currency->symbol ?? ''}}</td>
                                <td hidden>{{$sum = $sum + ($orderDetail->product_price * $orderDetail->product_qty) }}</td>
                            </tr>
                        @endforeach
                            <tr class="text-center">
                                <td colspan="4" class="text-end bg-success-transparent text-dark">Total </td>
                                <td colspan="5" class="bg-success-transparent">{{$sum}} {{$currency->symbol ?? ''}}</td>
                            </tr>
                            <tr class="text-center">
                                <td colspan="4" class="text-end bg-success-transparent text-dark">Admin Commission ({{$sellerCommission->seller_commission}}%)</td>
                                <td colspan="5" class="bg-success-transparent">{{$commission = $sum * ($sellerCommission->seller_commission/100)}} {{$currency->symbol ?? ''}}</td>
                            </tr>
                            <tr class="text-center">
                                <td colspan="4" class="text-end bg-success-transparent text-dark">In Total</td>
                                <td colspan="5" class="bg-success-transparent">{{$sum - $commission}} {{$currency->symbol ?? ''}}</td>
                            </tr>

                        </tbody>
                    </table>

                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Order ID</th>
                            <td>#{{$order->order_code}}</td>
                        </tr>
                        <tr>
                            <th>Order Number</th>
                            <td>#{{$order->order_number}}</td>
                        </tr>
                        <tr>
                            <th>Order Total</th>
                            <td>{{$sum}}.{{$currency->symbol ?? ''}}</td>
                        </tr>
                        <tr>
                            <th>Customer Info</th>
                            <td>{{isset($order->user->name) ? $order->user->name.'('.$order->phone.')': ''}}</td>
                        </tr>
                        <tr>
                            <th>Order Date</th>
                            <td>{{$order->order_date}}</td>
                        </tr>
                        <tr>
                            <th>Order Status</th>
                            <td class="{{$order->order_status == 0 ? 'bg-warning':''}}{{$order->order_status == 1 ? 'bg-success':''}}{{$order->order_status == 2 ? 'bg-primary':''}}{{$order->order_status == 3 ? 'bg-danger':''}}">
                                {{$order->order_status == 0 ? 'pending':''}}
                                {{$order->order_status == 1 ? 'Accepted':''}}
                                {{$order->order_status == 2 ? 'Delivered':''}}
                                {{$order->order_status == 3 ? 'Canceled':''}}
                            </td>
                        </tr>
                        <tr>
                            <th>Delivery Address</th>
                            <td>{{$order->delivery_address}}</td>
                        </tr>
                        <tr>
                            <th>Delivery Status</th>
                            <td class="{{$order->delivery_status == 0 ? 'bg-warning':''}}{{$order->delivery_status == 1 ? 'bg-info':''}}{{$order->delivery_status == 2 ? 'bg-primary':''}}{{$order->delivery_status == 3 ? 'bg-success':''}}{{$order->delivery_status == 4 ? 'bg-danger text-white':''}}">
                                {{$order->delivery_status == 0 ? 'Pending':''}}
                                {{$order->delivery_status == 1 ? 'Accepted':''}}
                                {{$order->delivery_status == 2 ? 'Shipping':''}}
                                {{$order->delivery_status == 3 ? 'Delivered':''}}
                                {{$order->delivery_status == 4 ? 'Canceled':''}}
                            </td>
                        </tr>
                        <tr>
                            <th>Payment Method</th>
                            <td>{{str_replace('_',' ',ucwords($order->payment_method))}}</td>
                        </tr>
                        <tr>
                            <th>Payment Amount</th>
                            <td>{{$sum}}.{{$currency->symbol ?? ''}}</td>
                        </tr>
                        <tr>
                            <th>Payment Date</th>
                            <td>{{$order->payment_date}}</td>
                        </tr>
                        <tr>
                            <th>Payment Status</th>
                            <td class="{{$order->payment_status == 0 ? 'bg-warning':''}}{{$order->payment_status == 1 ? 'bg-success':''}}{{$order->payment_status == 2 ? 'bg-danger text-white':''}}">
                                {{$order->payment_status == 0 ? 'Pending':''}}
                                {{$order->payment_status == 1 ? 'Completed':''}}
                                {{$order->payment_status == 2 ? 'Canceled':''}}
                            </td>
                        </tr>
                        <tr>
                            <th>Currency</th>
                            <td>{{$order->currency}}</td>
                        </tr>
                        <tr>
                            <th>Transaction Id</th>
                            <td>{{$order->transaction_id}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

