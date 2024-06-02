@extends('customer.layout')
@section('title', 'Customer Refund Requests')
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
                        <h5 class="mb-0">Your Requests</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            @if(count($refunds) > 0)
                                <table class="table text-nowrap mb-0 table-bordered table-striped">
                                    <thead class="table-head">
                                    <tr class="fw-bold bg-primary text-white text-center">
                                        <th>Order Id</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Seller Approval</th>
                                        <th>Refund Status</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>

                                    <tbody class="table-body">
                                    @forelse($refunds as $refund)
                                        <tr class="text-center">
                                            <td><a href="{{route('customer.refund.view',$refund->id)}}">{{$refund->order_code}}</a></td>
                                            <td>{{$refund->product->name}}</td>
                                            <td>{{$refund->price}} {{$currency->symbol}}</td>
                                            <td>
                                                <span class="p-2 {{$refund->seller_approval == 0 ? "bg-warning" : ""}}
                                                {{$refund->seller_approval == 1 ? "bg-success text-white" : ""}}
                                                {{$refund->seller_approval == 2 ? "bg-danger text-white" : ""}}">
                                                    {{$refund->seller_approval == 0 ? "Pending" : ""}}
                                                    {{$refund->seller_approval == 1 ? "Complete" : ""}}
                                                    {{$refund->seller_approval == 2 ? "Cancel" : ""}}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="p-2 {{$refund->refund_status == 0 ? "bg-warning" : ""}}
                                                {{$refund->refund_status == 1 ? "bg-success text-white" : ""}}
                                                {{$refund->refund_status == 2 ? "bg-danger text-white" : ""}}">
                                                    {{$refund->refund_status == 0 ? "Pending" : ""}}
                                                    {{$refund->refund_status == 1 ? "Complete" : ""}}
                                                    {{$refund->refund_status == 2 ? "Cancel" : ""}}
                                                </span>
                                            </td>
                                            <td>{{date_format($refund->created_at,'d M, Y')}}</td>

                                    @empty
                                        <tr class="text-center bg-danger-transparent">
                                            <td colspan="9">No Order Found</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            @else
                                <div class="text-center">@include('empty-space')</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

