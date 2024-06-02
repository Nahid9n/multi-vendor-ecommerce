@extends('customer.layout')
@section('title', 'Customer Order')
@section('content')

<div class="col-md-8">
    <div class="tab-content dashboard-content">
        <div class="">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Cancel Order</h5>
                </div>
                <div class="card-body contact-from-area">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">

                            @if(count($orders) > 0)
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Order</th>
                                            <th>Date</th>
                                            <th>Total</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $order)                                        
                                        <tr>
                                            <td>#{{$order->order_number}}</td>
                                            <td>{{$order->order_date}}</td>
                                            <td>${{$order->total_price}}</td>
                                            <td>
                                                <a class="btn-small d-block" href="{{ route('customer-order-details', $order->id) }}">View</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                @include('empty-space')
                            @endif                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection