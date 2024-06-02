@extends('delivery-boy.layout.app')
@section('title','Dashboard')
@section('body')

<style>
    .status_change {
        border: 1px solid #dee2e6;
        padding: 10px 6px;
        margin-bottom: 13px;
    }

    .form-group select {
        background: #fff;
        border: 1px solid #e2e9e1;
        height: 45px;
        -webkit-box-shadow: none;
        box-shadow: none;
        padding-left: 20px;
        font-size: 13px;
        color: #1a1a1a;
        width: 100%;
    }

    .modal-body{
        margin-top: 0;
    }

    .modal-body button{
        width: initial;
    }

    .modal-body button{
        border-radius: 7px;
    }

    #error_msg{
        display: none;
        font-weight: bold;
    }
</style>

<div class="page-header breadcrumb-wrap mt-5">
    <div class="container">
        <div class="breadcrumb">
            <a href="" rel="nofollow">Home</a>
            <span class="mx-2"> Delivery Boy</span>
            <span>Dashboard</span>
        </div>
    </div>
</div>

<section class="pt-50 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card custom-card">
                            <div class="card-header">
                                <h3 class="card-title">Order Details #{{$orderss->order_code}}</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table  border text-nowrap text-md-nowrap">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Order Date</th>
                                                <th>Name</th>
                                                <th>Color</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($orderDetails as $order)
                                            <tr>
                                                <td>{{ $loop->iteration  }}</td>
                                                <td>{{ date('d-m-Y', strtotime($order->created_at)) }}</td>
                                                <td class="product_name">{{ $order->product_name }}</td>
                                                <td style="display: none;" class="product_id">{{ $order->product_id }}</td>
                                                <td>{{ $order->product_color ?? 'N/A' }}</td>
                                                <td class="product_price">{{ $order->product_price }} .{{$currency->symbol ?? ''}}</td>
                                                <td>{{ $order->product_qty }}</td>
                                                <td>{{ $order->product_price * $order->product_qty }} .{{$currency->symbol ?? ''}}</td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <th colspan="8"><p class="fw-bolder">Tax: {{ $orderss->total_shipping }} .{{$currency->symbol ?? ''}} , Total: {{ $orderss->total_price }} .{{$currency->symbol ?? ''}}</p></th>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                                <div class="text-end my-3">
                                    <p><span class="fw-bold">Delivery Date : </span>{{$orderss->delivery_date}}</p>
                                    <p><span class="fw-bold">Delivery Address :</span> {{$orderss->delivery_address}}</p>
                                    <p><span class="fw-bold">Receiver Name : </span>{{$orderss->user->name}}</p>
                                    <p><span class="fw-bold">Phone : </span>{{$orderss->phone}}</p>
                                </div>
                                <div class="my-3 d-flex">

                                        <form {{$orderss->delivery_status == 3 ?'hidden':''}} class="{{$orderss->deliveryBoy_pickup == 1 ?'disabled':''}}" action="{{route('deliveryBoy.confirm.pickup',$orderss->id)}}" method="post" >
                                            @csrf
                                            <input type="hidden" name="confirm" value="1" readonly {{$orderss->deliveryBoy_pickup == 1 ?'disabled':''}}>
                                            <button class="btn btn-sm btn-success me-1" {{$orderss->deliveryBoy_pickup == 1 ?'disabled':''}}>Confirm</button>
                                        </form>
                                        <form {{$orderss->delivery_status == 3 ?'hidden':''}} class="{{$orderss->deliveryBoy_pickup == 2 ?'disabled':''}}" action="{{route('deliveryBoy.cancel.request.pickup',$orderss->id)}}" method="post">
                                            @csrf
                                            <input type="hidden" name="cancel" value="2" readonly {{$orderss->deliveryBoy_pickup == 2 ?'disabled':''}}>
                                            <button class="btn btn-sm btn-danger mx-1" {{$orderss->deliveryBoy_pickup == 2 ?'disabled':''}}>Cancel</button>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
