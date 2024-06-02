@extends('deliveryBoy.layout.app')
@section('title','Order Details')
@section('body')

    <div class="pagetitle">
        <h1>Order Details #{{$orderss->order_code}}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('delivery-boy.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item">Order Details #{{$orderss->order_code}}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="pt-50 pb-50">
        <div class="row">
                <div class="col-lg-12">
                    <div class="card">
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
                                            @php($sum = 0)
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
                                                    <td hidden>{{ $sum = $sum + ($order->product_price * $order->product_qty) }} .{{$currency->symbol ?? ''}}</td>
                                                </tr>

                                            @endforeach
                                            <tr class="text-end">
                                                <th colspan="8">
                                                    <p class="fw-semibold">Total : {{ $sum }} .{{$currency->symbol ?? ''}} </p>
                                                    <p class="fw-semibold">Shipping : {{ $orderss->total_shipping }} .{{$currency->symbol ?? ''}} </p>
                                                    <hr>
                                                    <p>In Total: {{ $sum + $orderss->total_shipping }} .{{$currency->symbol ?? ''}}</p>
                                                </th>
                                            </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                    <div class="text-start my-3">
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
    </section>
@endsection
