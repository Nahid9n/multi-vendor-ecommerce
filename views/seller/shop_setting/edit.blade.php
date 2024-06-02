@extends('seller.Layout.master')
@section('title', 'Edit Page')
@section('body')
    <div class="row justify-content-center">
        <div class="col-lg-12 shadow">
            <div class="card shadow">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="fw-bold">Update Shop Setting Form</h3>
                    <a href="{{route('seller.shop-setting.index')}}" class="btn  px-5 btn-primary">Shop Setting</a>
                    <hr>

                </div>

                <div class="card-body">
                    <form action="{{route('seller.shop-setting.update',$shop_setting->id)}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        @method('PUT')
                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label" > Logo </label>
                            <div class="col-md-9 test_class">
                                <div class="input-group singleFile" data-bs-toggle="modal" id="logo" data-bs-target="#singleImg" data-type="image" data-multiple="false">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                    </div>
                                    <div class="form-control" id="logoFileAmount" >Choose file</div>
                                </div>
                                <input type="hidden" id="logoItemId" name="logo">
                                <div class="row d-flex" id="logoData">
                                    <div class="position-relative d-flex" id="imageContainer">
                                        <div class="imgs m-1">
                                            <span class="btn btn-danger btn-sm position-absolute rmSingleimg" id="{{ isset($image->id)}}" style="float: left">&times;</span>
                                            <img width="100" height="100" class="img" src="{{asset(isset($image->file))}}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label" > Banner </label>
                            <div class="col-md-9 test_class">
                                <div class="input-group singleFile" data-bs-toggle="modal" id="banner" data-bs-target="#singleImg" data-type="image" data-multiple="false">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                    </div>
                                    <div class="form-control" id="bannerFileAmount" >Choose file</div>
                                </div>
                                <input type="hidden" id="bannerItemId" name="banner">
                                <div class="row d-flex" id="bannerData">
                                    <div class="position-relative d-flex" id="imageContainer">
                                        <div class="imgs m-1">
                                            <span class="btn btn-danger btn-sm position-absolute rmSingleimg" id="{{ isset($image->id)}}" style="float: left">&times;</span>
                                            <img width="100" height="100" class="img" src="{{asset(isset($image->file))}}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label" > Icon </label>
                            <div class="col-md-9 test_class">
                                <div class="input-group singleFile" data-bs-toggle="modal" id="icon" data-bs-target="#singleImg" data-type="image" data-multiple="false">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                    </div>
                                    <div class="form-control" id="iconFileAmount" >Choose file</div>
                                </div>
                                <input type="hidden" id="iconItemId" name="icon">
                                <div class="row d-flex" id="iconData">
                                    <div class="position-relative d-flex" id="imageContainer">
                                        <div class="imgs m-1">
                                            <span class="btn btn-danger btn-sm position-absolute rmSingleimg" id="{{ isset($image->id)}}" style="float: left">&times;</span>
                                            <img width="100" height="100" class="img" src="{{asset(isset($image->file))}}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="slogan" class="col-md-3 form-label">Shop Name <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input disabled class="form-control" value="{{$shop_setting->shop_setting->shop_name}}" id="shop_name" name="shop_name" placeholder="Shop Name" type="text">
                                <b><span class="text-danger">{{$errors->first('colors')}}</span></b>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="email" class="col-md-3 form-label">Email Address</label>
                            <div class="col-md-9">
                                <input disabled class="form-control" value="{{auth()->user()->email}}" id="email" name="email" placeholder="email address" type="email">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="slogan" class="col-md-3 form-label">Motto</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{$shop_setting->slogan}}" id="slogan" name="slogan" placeholder="write your Motto" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="address" class="col-md-3 form-label">Meta Desctiption</label>
                            <div class="col-md-9">
                                <textarea name="meta_description" class="form-control" id="" placeholder="Descriptions">{{$shop_setting->meta_description}}</textarea>
                            </div>
                            <div class="row mb-4">
                                <label for="address" class="col-md-3 form-label">Meta</label>
                                <div class="col-md-9">
                                    <input class="form-control" value="{{$shop_setting->meta}}" name="meta" id="address" placeholder="type Address" type="text">
                                </div>
                            </div>
                        <div class="row mb-4">
                            <label for="summernote" class="col-md-3 form-label">About Us</label>
                            <div class="col-md-9">
                                <textarea name="about" class="" id="summernote" cols="30"  rows="3">{{$shop_setting->about}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="facebook" class="col-md-3 form-label">Facebook address</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{$shop_setting->facebook}}" name="facebook" id="facebook" placeholder="Facebook address" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="twitter" class="col-md-3 form-label">Twitter address</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{$shop_setting->twitter}}" name="twitter" id="twitter" placeholder="Twitter address" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="LinkedIn" class="col-md-3 form-label">LinkedIn address</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{$shop_setting->linkedIn}}" name="linkedIn" id="LinkedIn" placeholder="LinkedIn address" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="youtube" class="col-md-3 form-label">Youtube</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{$shop_setting->youtube}}" name="youtube" id="youtube" placeholder="youtube address" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="map" class="col-md-3 form-label">Google Map</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{$shop_setting->map}}" name="map" id="map" placeholder="google map link" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="radio" class="col-md-3 form-label"></label>
                            <div class="col-md-9">
                                <button class="btn btn-primary float-end" type="submit">Update</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
