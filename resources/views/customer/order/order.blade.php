@extends('customer.layout')
@section('title', 'Customer Order')
@section('content')

<style>
    .status_change {
        border: 1px solid #dee2e6;
        padding: 10px 6px;
        margin-bottom: 13px;
    }
</style>

<div class="col-md-8">
    <div class="tab-content dashboard-content">
        <div class="">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Your Orders</h5>
                </div>
                <div class="card-body">

{{--                    <select class="form-select status_change" onchange="customerOrderFilter(this)">--}}
{{--                        <option value="">Select</option>--}}
{{--                        <option value="pending">Pending</option>--}}
{{--                        <option value="accepted">Accepted</option>--}}
{{--                        <option value="delivered">Delivered</option>--}}
{{--                        <option value="canceled">Canceled</option>--}}
{{--                    </select>--}}

                    <div class="table-responsive">
                        @if(count($orders) > 0)
                        <table class="table table-striped table-bordered">
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
                                @foreach($orders as $order)
                                <tr class="">
                                    <td><a class="btn-small  d-block" href="{{ route('customer-order-details', $order->order_code) }}">{{$order->order_code}}</a></td>
                                    <td>{{$order->order_date}}</td>
                                    <td>
                                        <span class="p-1 rounded-2 {{$order->order_status == 0 ? 'bg-warning ':''}}
                                        {{$order->order_status == 1 ? 'bg-success text-white':''}}
                                        {{$order->order_status == 2 ? 'bg-danger text-white':''}}
                                        {{$order->order_status == 3 ? 'bg-primary text-white':''}}">
                                            {{$order->order_status == 0 ? 'Pending':''}}
                                            {{$order->order_status == 3 ? 'Accepted':''}}
                                            {{$order->order_status == 1 ? 'Completed':''}}
                                            {{$order->order_status == 2 ? 'Canceled':''}}
                                        </span>

                                    </td>
                                    <td>{{$order->total_price.' '.$currency->symbol}}</td>
                                    <td>
                                        <a class="btn-small  d-block" href="{{ route('customer-order-details', $order->order_code) }}">View</a>

                                        @if($order->order_status == 'Pending')
                                        <form method="post" action="{{ route('customer-order-cancel', $order->order_code) }}">
                                            @csrf
                                            @method('PUT')
                                            <button class="btn-sm" type="submit">Cancel</button>
                                        </form>
                                        @endif
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <div class="text-center">@include('empty-space')</div>
                        @endif
                    </div>
                    <div class="row justify-content-center">
                        {{$orders->links()}}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
