@extends('seller.Layout.master')
@section('title','Wallet')
@section('body')
    <div class="page-header">
        <div>
            <h1 class="page-title">Payout</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active" aria-current="page">Payout</li>
            </ol>
        </div>
    </div>
    <!-- End Page Title -->
    <section class="section m-0">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="wallet-header">
                        <h3 class="text-white">My Wallet</h3>
                    </div>
                    <div class="card-body contact-from-area">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="wallet-container">
                                    <div class="my-2 text-center">
                                        <img class="rounded-circle" src="" alt="" width="100" height="100">
                                        <p class="fw-bold">{{auth()->user()->name}}</p>
                                        <p>Payment Method : <span class="fw-bold text-primary">{{$vendorPaymentInfo->payment_method ?? 'N/A'}}</span></p>
                                        <p>Account Holder : <span class="fw-bold text-primary">{{$vendorPaymentInfo->account_holder_name ?? 'N/A'}}</span></p>
                                        <p>Account Number : <span class="fw-bold text-primary">{{$vendorPaymentInfo->account_number ?? 'N/A'}}</span></p>
                                        <p>Balance: <span class="fw-bold text-primary">{{$vendor->balance ?? '0'}} .{{$currency->symbol ?? ''}}</span></p>
                                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#withdraw">
                                            Withdraw
                                        </button>
                                        <div class="modal fade" id="withdraw" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="paymentModalLabel">Withdraw</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{route('seller.withdraw.request')}}" method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="payment_method" class="my-2">Withdrawal Amount <span class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control" id="withdrawal_amount" name="withdrawal_amount" placeholder="Withdrawal Amount" required>
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit"  class="btn btn-primary">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div><!-- End Basic Modal-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Withdrawal History</h5>
                    </div>
                    <div class="card-body contact-from-area">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table dataTable table-hover">
                                        <thead>
                                        <tr>
                                            <th>Payment Method</th>
                                            <th>Account Holder</th>
                                            <th>Account Number</th>
                                            <th>Amount</th>
                                            <th>Branch</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($vendors as $vendor)
                                            <tr>
                                                <td>{{$vendor->payment_method}}</td>
                                                <td>{{$vendor->account_holder_name}}</td>
                                                <td>{{$vendor->account_number}}</td>
                                                <td>{{$vendor->withdrawal_amount}} .{{$currency->symbol ?? ''}}</td>
                                                <td>{{$vendor->branch}}</td>
                                                <td><span class="{{$vendor->status == 0 ? 'bg-warning text-dark':''}}{{$vendor->status == 1 ? 'bg-success text-dark':''}}{{$vendor->status == 2 ? 'bg-danger text-white':''}} p-1">{{$vendor->status == 0 ? 'Pending':''}}{{$vendor->status == 1 ? 'Done':''}}{{$vendor->status == 2 ? 'Cancel':''}}</span></td>
                                                <td>{{$vendor->created_at}}</td>
                                                <td><a href="{{route('seller.withdraw.details',$vendor->id)}}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a></td>
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
