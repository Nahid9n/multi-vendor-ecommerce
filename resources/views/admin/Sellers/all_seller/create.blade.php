@extends('admin.master')
@section('title', 'Create Seller')
@section('body')


    <div class="row mt-5">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title text-bold">Create Seller Form</h3>
                </div>

                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('seller.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="role" value="seller" readonly>
                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label">Shop Name <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ old('shop_name') }}" name="shop_name" id=""
                                    placeholder="Shop Name" class="form-control" type="text"/>
                                    <b><span class="text-danger">{{$errors->first('shop_name')}}</span></b>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="name" class="col-md-3 form-label">Name <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ old('name') }}" name="name" id="name"
                                    placeholder="Seller Name" type="text"/>
                                    <b><span class="text-danger">{{$errors->first('name')}}</span></b>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="email" class="col-md-3 form-label">Email <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ old('email') }}" name="email" id="email"
                                    placeholder="x@gmail.com" type="email" />
                                    <b><span class="text-danger">{{$errors->first('email')}}</span></b>



                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="password" class="col-md-3 form-label">Password <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" id="password" name="password" placeholder="password"
                                    type="password" value="{{old('password')}}" />
                                    <b><span class="text-danger">{{$errors->first('password')}}</span></b>

                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="confirm_password" class="col-md-3 form-label">Confirm Password <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" id="confirm_password" name="confirm_password" placeholder="confirm password"
                                    type="password" value="{{old('confirm_password')}}"/>
                                    <b><span class="text-danger">{{$errors->first('confirm_password')}}</span></b>

                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label">Addres<span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <textarea name="address" id="" class="form-control" placeholder="Address"></textarea>
                                <b><span class="text-danger">{{$errors->first('address')}}</span></b>

                            </div>
                        </div>
                     
                        <button class="btn btn-primary rounded-0 float-end" type="submit">Submit</button>
                    </form>


                </div>
            </div>
        </div>
    </div>

@endsection
