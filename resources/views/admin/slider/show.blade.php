@extends('admin.master')
@section('title','Slider Details')
@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Website Slider Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Slider Detail</a></li>
                <li class="breadcrumb-item active" aria-current="page">Slider Details</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header row border-bottom">
                    <div class="col-6">
                        <h3 class="card-title">{{$websiteSlider->title}}</h3>
                    </div>
                    <div class="col-6">
                        <a href="{{route('slider.index')}}" class="btn btn-success my-1 float-end mx-2 text-center">All Slider</a>
                        <a href="{{route('slider.edit',$websiteSlider->id)}}" class="btn btn-warning text-dark my-1 float-end mx-2 text-center">Edit Details</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 text-center mb-2">

                            <div class="row">
                                <div class="col-md-6">
                                    <img src="{{asset($websiteSlider->image)}}" class="img-fluid mx-2" width="500">
                                    <p>Image</p>
                                </div>
                                <div class="col-md-6">
                                    <img src="{{asset($websiteSlider->banner)}}" class="img-fluid mx-2" width="500">
                                    <p>Banner</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered position-relative table-hover">
                        <tr>
                            <th>slogan</th>
                            <td>{{$websiteSlider->slogan}}</td>
                        </tr>
                        <tr>
                            <th>meta</th>
                            <td>{{$websiteSlider->meta}}</td>
                        </tr>
                        <tr>
                            <th>meta description</th>
                            <td>{!! $websiteSlider->meta_description !!}</td>
                        </tr>
                        <tr>
                            <th> Publication Status</th>
                            <td>{{$websiteSlider->status == 1 ? "Active" : "Inactive"}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

