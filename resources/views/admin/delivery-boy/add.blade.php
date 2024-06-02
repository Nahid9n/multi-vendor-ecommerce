@extends('admin.master')
@section('title','Delivery Boy Page')
@section('body')
    @include('modal.common')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Delivery Boy Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Delivery Boy</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row justify-content-center">
        <div class="col-lg-12 shadow">
            <div class="card shadow">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title text-bold">Add Delivery Boy Form</h3>
                    <a href="{{route('delivery-boy.index')}}" class="btn btn-success my-1 float-end text-center">All Delivery Boy</a>
                </div>
                <div class="card-body">
                    <form action="{{route('delivery-boy.store')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        <input type="hidden" name="role" value="delivery_boy" readonly>
                        <input type="hidden" name="owner_id" value="{{ auth()->user()->id }}" readonly>
                        <div class="row mb-4">
                            <label for="image" class="col-md-3 form-label">Photo</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{old('image')}}" id="image" name="image" placeholder="Delivery Boy image" type="file">
                                <span class="text-danger">{{$errors->has('image')?$errors->first('image'):''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="name" class="col-md-3 form-label">Delivery Boy name<span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{old('name')}}" id="name" name="name" placeholder="Delivery Boy name" type="text" required>
                                <span class="text-danger">{{$errors->has('name')?$errors->first('name'):''}}</span>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="email" class="col-md-3 form-label">Email Address  <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{old('email')}}" id="email" name="email" placeholder="email address" type="email" required>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="password" class="col-md-3 form-label">Password  <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{old('password')}}" id="password" name="password" placeholder="password" type="password" required>
                                <span class="text-success my-1">password should be 8 character</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="confirm_password" class="col-md-3 form-label">Confirm Password  <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{old('confirm_password')}}" id="confirm_password" name="confirm_password" placeholder="confirm password" type="password" required>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="radio" class="col-md-3 form-label"></label>
                            <div class="col-md-9">
                                <button class="btn btn-primary" type="submit">Add Delivery Boy</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
