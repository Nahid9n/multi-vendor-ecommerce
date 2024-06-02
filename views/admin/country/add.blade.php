@extends('admin.master')
@section('title','Country Add Page')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Country Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Country</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row justify-content-center">
        <div class="col-lg-12 shadow">
            <div class="card shadow">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title text-bold">Add Country Form</h3>
                    <a href="{{route('country.index')}}" class="btn btn-success my-1 float-end text-center">Country Manage</a>
                </div>

                <div class="card-body">
{{--                    <p class="alert alert-success text-center" x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show">{{session('message')}}</p>--}}
                    <form action="{{route('country.store')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        <div class="row mb-4">
                            <label for="name" class="col-md-3 form-label">Name <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{old('name')}}" name="name" id="name" placeholder="write your country name" required type="text">
                                <span class="text-danger">{{$errors->has('name')?$errors->first('name'):''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="code" class="col-md-3 form-label">Code <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{old('code')}}" id="code" name="code" placeholder="write your country code" required type="text">
                            </div>
                        </div>
                        <div class="row mb-4 d-flex form-group">
                            <div class="col-md-3">
                                <label class="" for="type">Publication Status</label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control select2 form-select" name="status" data-placeholder="Choose one">
                                    <option class="form-control" label="Choose one" disabled selected></option>
                                    <option value="1" selected>Active</option>
                                    <option value="0" >Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="radio" class="col-md-3 form-label"></label>
                            <div class="col-md-9">
                                <button class="btn btn-primary" type="submit">Create Country</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
