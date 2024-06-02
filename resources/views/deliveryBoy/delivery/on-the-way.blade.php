@extends('deliveryBoy.layout.app')
@section('title','On The Ways Delivery')
@section('body')
    <div class="pagetitle">
        <h1>On The Ways Orders</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('delivery-boy.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item">On The Ways Orders</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">On The Ways Orders</h5>
                        @if(count($onTheWays) > 0)
                        <table class="table datatable">
                            <thead>
                            <tr>
                                <th>Order</th>
                                <th>Date</th>
                                <th>Order Status</th>
                                <th>Total</th>
                                <th>Delivery Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($onTheWays as $order)
                                <tr>
                                    <td>{{$order->order_code }}</td>
                                    <td>{{$order->order_date}}</td>
                                    <td>{{$order->order_status == 0 ? 'Pending':''}}{{$order->order_status == 1 ? 'Completed':''}}{{$order->order_status == 2 ? 'Canceled':''}}</td>
                                    <td>{{$order->total_price}} .{{$currency->symbol ?? ''}}</td>
                                    <td>
                                        <form action="{{route('deliveryBoy.delivery.status.change',$order->id)}}" method="post">
                                        @csrf
                                        <!-- order->order_status -->
                                            <select onchange="this.form.submit()" class="form-select status_change {{$order->delivery_status == 0 ? 'bg-warning':''}}{{$order->delivery_status == 1 ? 'bg-info':''}}{{$order->delivery_status == 2 ? 'bg-primary':''}}{{$order->delivery_status == 3 ? 'bg-success':''}}{{$order->delivery_status == 4 ? 'bg-danger text-white':''}}" name="delivery_status">
                                                <option label="select one">select one</option>
                                                <option value="3">Delivered</option>
                                                <option value="4">Canceled</option>
                                            </select>
                                        </form>
                                    </td>
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
                                    <th>Delivery Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-center">
                                        <td colspan="6">No Orders</td>
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
