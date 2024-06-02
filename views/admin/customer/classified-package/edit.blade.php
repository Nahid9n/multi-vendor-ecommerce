@extends('admin.master')
@section('title','Edit Package ')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Package Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Package </a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Package </li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <!-- row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Edit Package </h3>
                </div>
                <div class="text-end">
                    <a href="{{route('classifiedPackage.index')}}" class="btn btn-success my-1 float-end mx-2 text-center">All Package</a>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{route('classifiedPackage.update',$package->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label">Package Logo</label>
                            <div class="col-md-9 test_class">
                                <div class="input-group singleFile" data-bs-toggle="modal" id="package_logo" data-bs-target="#singleImg" data-type="image" data-multiple="false">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                    </div>
                                    <div class="form-control bannerFile-amount" id="package_logoFileAmount">Choose file</div>
                                </div>
                                <input type="hidden" id="package_logoItemId" name="package_logo">
                                <div class="row d-flex" id="package_logoData">
                                    <div class="position-relative d-flex" id="imageContainer">
                                        <div class="imgs m-1">
                                            @if(isset($package->package_logo))
                                            <span class="btn btn-danger btn-sm position-absolute rmSingleimg" id="" style="float: left">&times;</span>
                                            <img width="100" height="100" class="img" src="{{asset($package->package_logo)}}" alt="">
                                            @endif
                                            <p><span>{{$file->file_name ?? ''}}</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="package_name" class="col-md-3 form-label">Package Name <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" id="package_name" required value="{{$package->package_name}}" name="package_name" placeholder="Enter your package name" type="text">
                                <span class="text-danger">{{$errors->has('package_name') ? $errors->first('package_name'):''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="amount" class="col-md-3 form-label">Amount <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" required value="{{$package->amount}}" id="amount" name="amount" placeholder="Enter amount" type="number">
                                <span class="text-danger">{{$errors->has('amount') ? $errors->first('amount'):''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="product_upload" class="col-md-3 form-label">Upload Product <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" required value="{{$package->product_upload}}" id="product_upload" name="product_upload" placeholder="Enter Product Upload Amount" type="number">
                                <span class="text-danger">{{$errors->has('product_upload') ? $errors->first('product_upload'):''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4 d-flex form-group">
                            <div class="col-md-3">
                                <label class="" for="status">Publication Status</label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control select2 form-select" id="status" name="status" data-placeholder="Choose one">
                                    <option class="form-control" label="Choose one" disabled selected></option>
                                    <option value="1" {{$package->status == 1 ?'selected':''}}>Active</option>
                                    <option value="0" {{$package->status == 0 ?'selected':''}}>Inactive</option>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary px-4" type="submit">Update Package</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
@endsection
