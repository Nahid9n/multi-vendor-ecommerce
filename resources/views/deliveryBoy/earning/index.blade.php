@extends('deliveryBoy.layout.app')
@section('title','Earnings')
@section('body')
    <div class="pagetitle">
        <h1>Earnings </h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('delivery-boy.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item">Earnings </li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Earnings </h5>
                    </div>
                    <div class="card-body contact-from-area">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table datatable">
                                        <thead>
                                        <tr>
                                            <th>Order</th>
                                            <th>Date</th>
                                            <th>Amount</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($completedOrders as $order)
                                            <tr>
                                                <td>{{$order->order_code}}</td>
                                                <td>{{$order->order_date}}</td>
                                                <td>{{(($order->total_shipping * 30)/100)}} .{{$currency->symbol ?? ''}}</td>
                                                <td class="d-flex">
                                                    <a class="btn btn-sm btn-success text-white mx-1" href="{{ route('deliveryBoy.order.details', $order->id) }}">View</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
