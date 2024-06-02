@extends('seller.Layout.master')
@section('title','Invoice Page')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Invoice-Details</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Orders</li>
                <li class="breadcrumb-item active" aria-current="page">Invoice Details</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- ROW-1 OPEN -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-start">
                            <h3 class="card-title mb-0">#INV-{{$order->order_code}}</h3>
                        </div>
                        <div class="float-end">
                            <h3 class="card-title">Date: {{date('d M-Y')}}</h3>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-6 ">
                        </div>
                        <div class="col-lg-6 text-end">
                            <p class="h3">Invoice To:</p>
                            <address>
                                {{$order->user->name}}<br>
                                {{$order->phone}}<br>
                                {{$order->user->email}}<br>
                                {{$order->delivery_address}}<br>
                            </address>
                        </div>
                    </div>
                    <div class="table-responsive push">
                        <table class="table table-bordered table-hover mb-0 text-nowrap border-bottom">
                            <tbody><tr class=" ">
                                <th class="text-center"></th>
                                <th>Item</th>
                                <th>Shop</th>
                                <th class="text-end">Product Price</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-end">Sub Total</th>
                            </tr>
                            @php($sum = 0)
                            @php($tax = 0)
                            @foreach($orderDetails as $orderDetail)
                            <tr>
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-2">
                                            <img class="mx-2" width="50" height="50" src="{{asset($orderDetail->product->product_image)}}" alt="">
                                        </div>
                                        <div class="text-muted col-10">
                                            <div class="text-muted">
                                                <p class="font-w600 fw-bold mb-1">{{$orderDetail->product_name}}</p>
                                            </div>
                                            <div class="text-muted ">
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
                                <td class="text-center">{{$orderDetail->user->seller->shop_name ?? ''}}</td>
                                <td class="text-end">{{$orderDetail->product_price}} {{$currency->symbol ?? ''}}</td>
                                <td class="text-center">{{$orderDetail->product_qty}}</td>
                                <td class="text-end">{{$orderDetail->product_price * $orderDetail->product_qty }} {{$currency->symbol ?? ''}}</td>
                                <td hidden>{{$sum = $sum + ($orderDetail->product_price * $orderDetail->product_qty) }}</td>
                                <td hidden>{{$tax = $tax + ($orderDetail->tax_total) }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="5" class="fw-semibold text-uppercase text-end">Total</td>
                                <td class="fw-semibold text-end h4">{{$sum}} {{$currency->symbol ?? ''}}</td>
                            </tr>
                            <tr class="">
                                <td colspan="5" class="fw-semibold text-uppercase text-end">Admin Commission ({{$sellerCommission->seller_commission}}%)</td>
                                <td class="fw-semibold text-end h4">{{$commission = $sum * ($sellerCommission->seller_commission/100)}} {{$currency->symbol ?? ''}}</td>
                            </tr>
                            <tr class="">
                                <td colspan="5" class="fw-semibold text-uppercase text-end">In Total</td>
                                <td class="fw-semibold text-end h4">{{$sum - $commission}} {{$currency->symbol ?? ''}}</td>
                            </tr>
                            </tbody></table>
                    </div>
                </div>
                <div class="card-footer text-end">
{{--                    <button type="button" class="btn btn-primary mb-1" onclick="javascript:window.print();"><i class="si si-wallet"></i> Back </button>--}}
{{--                    <button type="button" class="btn btn-success mb-1" onclick="javascript:window.print();"><i class="si si-paper-plane"></i> Send Invoice</button>--}}
                    <button type="button" class="btn btn-info mb-1" onclick="javascript:window.print();"><i class="si si-printer"></i> Print Invoice</button>
                </div>
            </div>
        </div><!-- COL-END -->
    </div>
    <!-- ROW-1 CLOSED -->
@endsection
