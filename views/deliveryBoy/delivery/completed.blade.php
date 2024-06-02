@extends('deliveryBoy.layout.app')
@section('title','Completed Delivery')
@section('body')
    <div class="pagetitle">
        <h1>Completed Orders</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('delivery-boy.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item">Completed Orders</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Completed Orders</h5>
                        @if(count($completedOrders) > 0)
                        <table class="table datatable">
                            <thead>
                            <tr>
                                <th>Order</th>
                                <th>Date</th>
                                <th>Order Status</th>
                                <th>Total</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($completedOrders as $order)
                                <tr>
                                    <td>#{{$order->order_code }}</td>
                                    <td>{{$order->order_date}}</td>
                                    <td>
                                        <span class="rounded-2 p-1 {{$order->order_status == 0 ? 'bg-warning':''}}{{$order->order_status == 1 ? 'bg-success text-white':''}}{{$order->order_status == 2 ? 'bg-danger text-white':''}}">
                                            {{$order->order_status == 0 ? 'Pending':''}}
                                            {{$order->order_status == 1 ? 'Completed':''}}
                                            {{$order->order_status == 2 ? 'Canceled':''}}
                                        </span>
                                    </td>
                                    <td>{{$order->total_price}} .{{$currency->symbol ?? ''}}</td>
                                    <td class="d-flex">
                                        <a class="btn btn-sm btn-success text-white mx-1" href="{{ route('deliveryBoy.order.details', $order->id) }}">View</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Order</th>
                                    <th>Date</th>
                                    <th>Order Status</th>
                                    <th>Total</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-center">
                                        <td colspan="5">No Orders Assigned</td>
                                    </tr>

                                </tbody>
                            </table>
                    @endif
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
