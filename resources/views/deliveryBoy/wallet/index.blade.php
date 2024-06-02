@extends('deliveryBoy.layout.app')
@section('title','Wallet')
@section('body')
    <div class="pagetitle">
        <h1> Wallet</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('delivery-boy.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item">Wallet</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card my-2">
                    <div class="wallet-header">
                        <h3 class="text-white">My Wallet</h3>
                    </div>
                    <div class="card-body contact-from-area">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="wallet-container">
                                    <div class="my-2 text-center">
                                        <img class="rounded-circle" src="{{asset($deliveryBoy->deliveryBoy->image)}}" alt="" width="100" height="100">
                                        <p class="fw-bold">{{auth()->user()->name}}</p>
                                        <p>Payment Method : <span class="fw-bold text-primary">{{$deliveryBoyPaymentInfo->payment_method ?? 'N/A'}}</span></p>
                                        <p>Account Holder : <span class="fw-bold text-primary">{{$deliveryBoyPaymentInfo->account_holder_name ?? 'N/A'}}</span></p>
                                        <p>Account Number : <span class="fw-bold text-primary">{{$deliveryBoyPaymentInfo->account_number ?? 'N/A'}}</span></p>
                                        <p>Balance: <span class="fw-bold text-primary">{{$deliveryBoyDetail->balance}} .{{$currency->symbol ?? ''}}</span></p>
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
                                                    <form action="{{route('deliveryBoy.withdrawal.request')}}" method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <!-- Form to add payment information -->
                                                            <form action="{{route('deliveryBoy.withdrawal.request')}}" method="POST">
                                                            @csrf
                                                            <!-- Input fields for payment information -->
                                                                <div class="form-group">
                                                                    <label for="payment_method" class="my-2">Withdrawal Amount <span class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control" id="withdrawal_amount" name="withdrawal_amount" placeholder="Withdrawal Amount" required>
                                                                </div>
                                                                <!-- Add more fields as needed -->
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

                                    <div class="modal fade" id="withdraw" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="paymentModalLabel">Withdraw</h5>
                                                    <button type="button" class="btn-sm btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Form to add payment information -->
                                                    <form action="{{route('deliveryBoy.withdrawal.request')}}" method="POST">
                                                    @csrf
                                                    <!-- Input fields for payment information -->
                                                        <div class="form-group">
                                                            <label for="payment_method">Withdrawal Amount <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" id="withdrawal_amount" name="withdrawal_amount" placeholder="Withdrawal Amount" required>
                                                        </div>
                                                        <!-- Add more fields as needed -->
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
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
                                            <th>Payment Id</th>
                                            <th>Payment Method</th>
                                            <th>Account Holder</th>
                                            <th>Account Number</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($deliveryBoyPaymentHistories as $payment)
                                            <tr>
                                                <td><a href="{{route('deliveryBoy.withdraw.details',$payment->id)}}">{{$payment->payment_id}}</a></td>
                                                <td>{{$payment->payment_method}}</td>
                                                <td>{{$payment->account_holder_name}}</td>
                                                <td>{{$payment->account_number}}</td>
                                                <td>{{$payment->withdrawal_amount}} .{{$currency->symbol ?? ''}}</td>
                                                <td><span class="{{$payment->status == 0 ? 'bg-warning text-dark':''}}{{$payment->status == 1 ? 'bg-success text-white':''}}{{$payment->status == 2 ? 'bg-danger text-white':''}} p-1">{{$payment->status == 0 ? 'Pending':''}}{{$payment->status == 1 ? 'Done':''}}{{$payment->status == 2 ? 'Cancel':''}}</span></td>
                                                <td>{{$payment->created_at}}
                                                <td><a href="{{route('deliveryBoy.withdraw.details',$payment->id)}}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a></td>
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
