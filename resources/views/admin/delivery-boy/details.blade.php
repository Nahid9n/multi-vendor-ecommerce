@extends('admin.master')
@section('title','delivery Boy Payment Details Page')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Payment-Details</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Payments</li>
                <li class="breadcrumb-item active" aria-current="page">Payment Details</li>
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
                            <h3 class="card-title mb-0">#payment-{{$withdraw->id}}</h3>
                        </div>
                        <div class="float-end">
                            <h3 class="card-title">Date: {{date('d M-Y')}}</h3>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive push">
                        <table class="table table-bordered table-hover mb-0 text-nowrap border-bottom">
                            <tbody>
                            <tr class="">
                                <th>Name</th>
                                <td>{{$withdraw->user->name}}</td>
                            </tr>
                            <tr class="">
                                <th>payment method</th>
                                <td>{{$withdraw->payment_method}}</td>
                            </tr>
                            <tr class="">
                                <th>Account Holder</th>
                                <td>{{$withdraw->account_holder_name}}</td>
                            </tr>
                            <tr class="">
                                <th>Account Number</th>
                                <td>{{$withdraw->account_number}}</td>
                            </tr>
                            <tr class="">
                                <th>Branch</th>
                                <td>{{$withdraw->branch}}</td>
                            </tr>
                            <tr class="">
                                <th>Total</th>
                                <td>{{$withdraw->withdrawal_amount}} {{$currency->symbol ?? ''}}</td>
                            </tr>
                            <tr class="">
                                <th>Payment Prove</th>
                                <td><img class="img-fluid" src="{{asset($withdraw->image)}}" alt=""></td>
                            </tr>
                            <tr class="">
                                <th>Payment</th>
                                <td><span class="{{$withdraw->status == 0 ? 'bg-warning text-dark':''}}{{$withdraw->status == 1 ? 'bg-success text-dark':''}}{{$withdraw->status == 2 ? 'bg-danger text-white':''}} p-1">{{$withdraw->status == 0 ? 'Pending':''}}{{$withdraw->status == 1 ? 'Done':''}}{{$withdraw->status == 2 ? 'Cancel':''}}</span></td>

                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-end">
                    {{--                    <button type="button" class="btn btn-primary mb-1" onclick="javascript:window.print();"><i class="si si-wallet"></i> Back </button>--}}
                    {{--                    <button type="button" class="btn btn-success mb-1" onclick="javascript:window.print();"><i class="si si-paper-plane"></i> Send Invoice</button>--}}
                    <button type="button" class="btn btn-info mb-1" onclick="javascript:window.print();"><i class="si si-printer"></i> Print</button>
                </div>
            </div>
        </div><!-- COL-END -->
    </div>
    <!-- ROW-1 CLOSED -->
@endsection
