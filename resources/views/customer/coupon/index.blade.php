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
            <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Your Coupons</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                @if(count($coupons) > 0)
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Coupon Code</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($coupons as $coupon)
                                            <tr class="">
                                                <td>{{$coupon->coupon->coupon_code}}</td>
                                                <td>{{date_format($coupon->created_at,'d M,Y H:s A')}}</td>
                                                <td>{{$coupon->status == 1 ? 'Active':'Inactive'}}</td>
                                                <td>
                                                    <a class="btn-small  d-block" href="{{ route('customer.coupon.view', $coupon->coupon->coupon_code) }}">View</a>
                                                </td>
                                            </tr>
                                        @endforeach
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

@endsection
