@extends('admin.master')
@section('title','Website Details')
@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Website Details Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Website Detail</a></li>
                <li class="breadcrumb-item active" aria-current="page">Website Details</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header row border-bottom">
                    <div class="col-6">
                        <h3 class="card-title">Website Details Information</h3>
                    </div>
                    <div class="col-6">
                        <a href="{{route('website-settings.edit',$websiteSetting->id)}}" class="btn btn-success my-1 float-end mx-2 text-center">Edit Details</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 text-center mb-2">
                            <div class="row justify-content-center my-2">
                                <div class="col-md-6">
                                    <h3 class="text-dark fw-bold">{{$websiteSetting->slogan}}</h3>
                                    <h5 class="text-dark"><span class="fw-bold">Email : </span>{{$websiteSetting->email}}</h5>
                                    <h5 class="text-dark"><span class="fw-bold">Mobile : </span>{{$websiteSetting->mobile}}</h5>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{asset($websiteSetting->logo)}}" class="img-fluid mx-2" height="200" width="200">
                                    <p>logo</p>
                                </div>
                                <div class="col-md-4">
                                    <img src="{{asset($websiteSetting->banner)}}" class="img-fluid mx-2" height="200" width="200">
                                    <p>Banner</p>
                                </div>
                                <div class="col-md-4 text-center">
                                    <img src="{{asset($websiteSetting->icon)}}" class="img-fluid mx-2" height="200" width="200">
                                    <p>Icon</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered position-relative table-hover">
                        <tr>
                            <th>Address</th>
                            <td>{{$websiteSetting->address}}</td>
                        </tr>
                        <tr>
                            <th>facebook</th>
                            <td>{{$websiteSetting->facebook}}</td>
                        </tr>

                        <tr>
                            <th>twitter</th>
                            <td>{{$websiteSetting->twitter}}</td>
                        </tr>
                        <tr>
                            <th>youtube</th>
                            <td>{{$websiteSetting->youtube}}</td>
                        </tr>
                        <tr>
                            <th> linkedIn :</th>
                            <td>{{$websiteSetting->linkedIn}}</td>
                        </tr>
                        <tr>
                            <th>
                                <div class="row">
                                    <div class="col-md-12">
                                        Map
                                    </div>
                                </div>
                            </th>
                            <td>
                                <div class="row">
                                    <div class="col-md-7 p-5">
                                        {{$websiteSetting->map}}
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <div class="row">
                                    <div class="col-md-12">
                                        About Us
                                    </div>
                                </div>
                            </th>
                            <td>
                                <div class="row">
                                    <div class="col-md-7 p-5">
                                        <h1 class="text-primary text-center">ABOUT US</h1>
                                        <hr>
                                        {!! $websiteSetting->about !!}
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th> Publication Status</th>
                            <td>{{$websiteSetting->status == 1 ? "Active" : "Inactive"}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

