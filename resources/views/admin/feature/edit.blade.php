@extends('admin.master')
@section('title','Country update Page')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Country  Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Update Country </li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row justify-content-center">
        <div class="col-lg-12 shadow">
            <div class="card shadow">
                <div class="card-header justify-content-center border-bottom">
                    <h2 class="fw-bold">Update Country</h2>
                    <hr>
                    <div class="col-5 text-end me-1">
                        <a href="{{route('country.index')}}" class="btn text-dark px-5 btn-success">Country Details</a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{route('country.update',$country->id)}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        @method('PUT')
                        <div class="row mb-4">
                            <label for="name" class="col-md-3 form-label">Name <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{$country->name}}" name="name" id="name" placeholder="write your country name" type="text">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="code" class="col-md-3 form-label">Type</label>
                            <div class="col-md-9">
                                <select class="form-control select2 form-select" name="type" data-placeholder="Choose one">
                                    <option class="form-control" label="Choose one" disabled selected></option>
                                    <option value="System" {{$country->status == 'System' ? 'selected':''}}>System</option>
                                    <option value="Business Related" {{$country->status == 'Business Related' ? 'selected':''}} >Business Related</option>
                                    <option value="Payment Related" {{$country->status == 'Payment Related' ? 'selected':''}}>Payment Related</option>
                                    <option value="Social Media Login" {{$country->status == 'Social Media Login' ? 'selected':''}}>Social Media Login</option>
                                    <span class="text-danger">{{$errors->has('type')?$errors->first('type'):''}}</span>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4 d-flex form-group">
                            <div class="col-md-3">
                                <label class="" for="type">Publication Status</label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control select2 form-select" name="status" data-placeholder="Choose one">
                                    <option class="form-control" label="Choose one" disabled selected></option>
                                    <option value="1" {{$country->status == 1 ? 'selected':''}} >Active</option>
                                    <option value="0" {{$country->status == 0 ? 'selected':''}}>Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="radio" class="col-md-3 form-label"></label>
                            <div class="col-md-9">
                                <button class="btn btn-primary" type="submit">Update Feature Info</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
