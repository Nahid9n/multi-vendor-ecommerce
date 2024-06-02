@extends('admin.master')
@section('title','Add Package')
@section('body')
@include('modal.common')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Seller Package Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Package </a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Package </li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <!-- row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Create New Package</h3>
                </div>
                <div class="text-end">
                    <a href="{{route('sellerPackage.index')}}" class="btn btn-success my-1 float-end mx-2 text-center">All Package</a>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{route('sellerPackage.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label">Package Logo</label>
                            <div class="col-md-9 test_class">
                                <div class="input-group openImageModal" data-multiple="false" data-inputname="package_logo">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                    </div>
                                    <div class="form-control" >Choose file
                                    </div>
                                </div>

                                <div class="row d-flex" id="package_logo"> </div>
                                <b><span class="text-danger">{{$errors->first('package_logo')}}</span></b>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="package_name" class="col-md-3 form-label">Package Name <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" id="package_name" required value="{{old('package_name')}}" name="package_name" placeholder="Enter your package name" type="text">
                                <span class="text-danger">{{$errors->has('package_name') ? $errors->first('package_name'):''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="amount" class="col-md-3 form-label">Amount <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" required value="{{old('amount')}}" id="amount" name="amount" placeholder="Enter amount" type="number">
                                <span class="text-danger">{{$errors->has('amount') ? $errors->first('amount'):''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="product_upload" class="col-md-3 form-label">Upload Product Limit <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" required value="{{old('product_upload')}}" id="product_upload" name="product_upload" placeholder="Enter Product Upload Amount" type="number">
                                <span class="text-danger">{{$errors->has('product_upload') ? $errors->first('product_upload'):''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="duration" class="col-md-3 form-label">Package Duration<span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" required value="{{old('duration')}}" id="duration" name="duration" placeholder="Enter Product duration" type="number">
                                <span class="text-danger">{{$errors->has('duration') ? $errors->first('duration'):''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4 d-flex form-group">
                            <div class="col-md-3">
                                <label class="" for="status">Publication Status</label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control select2 form-select" id="status" name="status" data-placeholder="Choose one">
                                    <option class="form-control" label="Choose one" disabled selected></option>
                                    <option selected value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary px-4" type="submit">Create New Package</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
@endsection

