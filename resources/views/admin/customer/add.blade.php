@extends('admin.master')
@section('title','Customer Module')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Customer Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Customer</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Customer</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <!-- row -->
    <div class="row row-deck">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title text-bold">Create New Customer</h3>
                    <a href="{{route('customers.index')}}" class="btn btn-success my-1 float-end text-center">All Customer</a>
                </div>

                <div class="card-body">
                    <form class="form-horizontal" action="{{route('customers.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <label for="name" class="col-md-3 form-label">Customer Name <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" id="name" required value="{{old('name')}}" name="name" placeholder="Enter your Customer name" type="text">
                                <span class="text-danger">{{$errors->has('name') ? $errors->first('name'):''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="email" class="col-md-3 form-label">Email <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input type="email" class="form-control" value="{{old('email')}}" id="email" name="email" placeholder="Enter your email" required>
                                <span class="text-danger">{{$errors->has('email') ? $errors->first('email'):''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="password" class="col-md-3 form-label">Password <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{old('password')}}" id="password" name="password" placeholder="Enter Password" type="password" required>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="confirm_password" class="col-md-3 form-label">Confirm Password <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{old('confirm_password')}}" id="confirm_password" name="confirm_password" placeholder="Enter password Again" type="password" required>
                            </div>
                        </div>
                        <button class="btn btn-primary px-4" type="submit">Create Customer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
@endsection


