@extends('admin.master')
@section('title','manage feature')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Seller Commission Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Seller Commission</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <!-- Row -->
    <div class="row row-sm">
            <div class="col-md-6">
                <div class="card border">
                    <div class="card-header border">
                        <h4 class="text-center">Seller Commission Activation</h4>
                    </div>
                    <div class="card-body text-center">
                        <form action="{{route('admin.seller.commission.status.update',$commission->id)}}" method="POST">
                            @csrf
                            <div class="material-switch">
                                <input class="" id="uncheckedDangerSwitchSystem" value="1" onchange="this.form.submit()" name="commission_status" {{$commission->commission_status == 1 ? 'checked':''}}  type="checkbox"/>
                                <label for="uncheckedDangerSwitchSystem" class="label-danger"></label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                    <div class="card border">
                        <div class="card-header border">
                            <h4 class="text-center">Category Based Commission</h4>
                        </div>
                        <div class="card-body text-center">
                            <form action="{{route('admin.seller.category.commission.update',$commission->id)}}" method="POST">
                                @csrf
                                <input type="hidden" name="seller_commission" value="{{$commission->previous_seller_commission}}" readonly>
                                <input type="hidden" name="previous_seller_commission" value="{{$commission->seller_commission}}" readonly>
                                <div class="material-switch">
                                    <input class="" id="uncheckedDangerSwitchSystem1" value="1" onchange="this.form.submit()" name="category_based_commission" {{$commission->category_based_commission == 1 ? 'checked':''}}  type="checkbox"/>
                                    <label for="uncheckedDangerSwitchSystem1" class="label-danger"></label>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
            <div class="col-md-6">
                    <div class="card border">
                        <div class="card-header border">
                            <h4 class="text-center">Seller Commission</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.seller.commission.update',$commission->id)}}" method="POST">
                                @csrf
                                <input type="hidden" name="previous_seller_commission" value="{{$commission->seller_commission}}" {{$commission->category_based_commission == 1 ?'disabled':''}}>
                                <div class="row mb-4">
                                    <label for="seller_commission" class="col-md-5 form-label">Seller Commission</label>
                                    <div class="col-md-7 input-group">
                                        <input class="form-control" {{$commission->category_based_commission == 1 ?'disabled':''}} id="seller_commission" value="{{$commission->seller_commission}}" name="seller_commission" placeholder="seller commission" type="number">
                                        <span class="text-danger">{{$errors->has('seller_commission') ? $errors->first('seller_commission'):''}}</span>
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="seller_commission" class="col-md-5 form-label"></label>
                                    <div class="col-md-7 text-end">
                                        <button {{$commission->category_based_commission == 1 ?'disabled':''}} class="btn px-5 btn-success">Save</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
            </div>
            <div class="col-md-6">
                    <div class="card border">
                        <div class="card-header border">
                            <h4 class="text-center">Note</h4>
                        </div>
                        <div class="card-body mx-5 mt-5 border">
                            <p>1. <span class="text-danger fw-bold">{{$commission->seller_commission}}%</span> of seller product price will be deducted from seller earnings.</p>
                        </div>
                        <div class="card-body mx-5 mb-5 border">
                            <p>2. If Category Based Commission is enabled, Set seller commission percentage 0.</p>
                        </div>
                    </div>
            </div>
        <div class="col-md-6">
            <div class="card border">
                <div class="card-header border">
                    <h4 class="text-center">Withdraw Seller Amount</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.seller.withdraw.amount.update',$commission->id)}}" method="POST">
                        @csrf
                        <div class="row mb-4">
                            <label for="withdraw_seller_amount" class="col-md-5 form-label">Minimum Seller Amount Withdraw</label>
                            <div class="col-md-7 input-group">
                                <input class="form-control" id="withdraw_seller_amount" value="{{$commission->withdraw_seller_amount}}" name="withdraw_seller_amount" placeholder="withdraw seller amount" type="number">
                                <span class="text-danger">{{$errors->has('withdraw_seller_amount') ? $errors->first('withdraw_seller_amount'):''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="seller_commission" class="col-md-5 form-label"></label>
                            <div class="col-md-7 text-end">
                                <button class="btn px-5 btn-success">Save</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- End Row -->

@endsection

