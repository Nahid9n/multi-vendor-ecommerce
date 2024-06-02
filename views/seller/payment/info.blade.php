@extends('seller.Layout.master')
@section('title','Payment Info')
@section('body')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Payment Info</h5>
                    </div>
                    <div class="card-body">
                        @if(isset($vendorPayment))
                            <form method="post" action="{{ route('seller.payment.info.update',$vendorPayment->id) }}" name="enq">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="form-group col-md-12 my-2">
                                        <label>Payment Method <span class="text-danger">*</span></label>
                                        <input class="form-control square" name="payment_method" type="text" autocomplete="off" value="{{$vendorPayment->payment_method}}" placeholder="Payment Method" required>
                                    </div>
                                    <div class="form-group col-md-12 my-2">
                                        <label>Account Holder Name <span class="text-danger">*</span></label>
                                        <input class="form-control square" name="account_holder_name" type="text" value="{{$vendorPayment->account_holder_name}}" placeholder="Account Holder Name" required>
                                    </div>
                                    <div class="form-group col-md-12 my-2">
                                        <label>Account Number <span class="text-danger">*</span></label>
                                        <input class="form-control square" name="account_number" type="number" value="{{$vendorPayment->account_number}}" placeholder="account number" required>
                                    </div>
                                    <div class="form-group col-md-12 my-2">
                                        <label>Branch <span class="text-danger">(optional)</span></label>
                                        <input class="form-control square" name="branch" type="text" value="{{$vendorPayment->branch}}" placeholder="Branch">
                                    </div>
                                    <div class="col-md-12 my-4">
                                        <button type="submit" class="btn btn-success px-5 submit">Save</button>
                                    </div>
                                </div>
                            </form>
                        @else
                            <form method="post" action="{{ route('seller.payment.info.store') }}" name="enq">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-12 my-2">
                                        <label>Payment Method <span class="text-danger">*</span></label>
                                        <input class="form-control square" name="payment_method" type="text" autocomplete="off" value="" placeholder="Payment Method" required>
                                    </div>
                                    <div class="form-group col-md-12 my-2">
                                        <label>Account Holder Name <span class="text-danger">*</span></label>
                                        <input class="form-control square" name="account_holder_name" type="text" value="" placeholder="Account Holder Name" required>
                                    </div>
                                    <div class="form-group col-md-12 my-2">
                                        <label>Account Number <span class="text-danger">*</span></label>
                                        <input class="form-control square" name="account_number" type="number" value="" placeholder="account number" required>
                                    </div>
                                    <div class="form-group col-md-12 my-2">
                                        <label>Branch <span class="text-danger">(optional)</span></label>
                                        <input class="form-control square" name="branch" type="text" value="" placeholder="Branch">
                                    </div>
                                    <div class="col-md-12 my-4">
                                        <button type="submit" class="btn btn-success px-5 submit">Save</button>
                                    </div>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
