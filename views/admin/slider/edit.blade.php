@extends('admin.master')
@section('title','Slider  Page')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Slider  Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Update Slider </li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row justify-content-center">
        <div class="col-lg-12 shadow">
            <div class="card shadow">
                <div class="card-header row border-bottom">
                    <div class="col-6">
                        <h3 class="card-title">Update Slider  Form</h3>
                    </div>
                    <div class="col-6">
                        <a href="{{route('slider.index')}}" class="btn btn-success my-1 float-end mx-2 text-center">Slider Details</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('slider.update',$slider->id)}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        @method('PUT')
                        <div class="row mb-4">
                            <label for="title" class="col-md-3 form-label">Title</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{$slider->title}}" name="title" id="title" placeholder="type Title" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label">Image </label>
                            <div class="col-md-9 test_class">
                                <div class="input-group singleFile" data-bs-toggle="modal" id="image"
                                     data-bs-target="#singleImg" data-type="image" data-multiple="false">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                    </div>
                                    <div class="form-control imageFile-amount" id="imageFileAmount">Choose file</div>
                                </div>
                                <input type="hidden" id="imageItemId" name="image" readonly>
                                <div class="row d-flex singleRemove" id="imageData">
                                    <div class="position-relative d-flex" id="imageContainer">
                                        <div class="imgs m-1">
                                            <span class="btn btn-danger btn-sm position-absolute rmSingleimg" id="{{$image->id ?? ''}}" style="float: left">&times;</span>
                                            <img width="100" height="100" class="img" src="{{asset($slider->image)}}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label">Banner </label>
                            <div class="col-md-9 test_class">
                                <div class="input-group singleFile" data-bs-toggle="modal" id="banner"
                                     data-bs-target="#singleImg" data-type="image" data-multiple="false">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                    </div>
                                    <div class="form-control bannerFile-amount" id="bannerFileAmount">Choose file</div>
                                </div>
                                <input type="hidden" id="bannerItemId" name="banner" readonly>
                                <div class="row d-flex singleRemove" id="bannerData">
                                    <div class="position-relative d-flex" id="imageContainer">
                                        <div class="imgs m-1">
                                            <span class="btn btn-danger btn-sm position-absolute rmSingleimg" id="{{$banner->id ?? ''}}" style="float: left">&times;</span>
                                            <img width="100" height="100" class="img" src="{{asset($slider->banner)}}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="slogan" class="col-md-3 form-label">Motto</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{$slider->slogan}}" id="slogan" name="slogan" placeholder="write your Slider slogan" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="meta" class="col-md-3 form-label">Meta Title</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{$slider->meta}}" id="meta" name="meta" placeholder="write your Slider meta title" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="summernote" class="col-md-3 form-label">Meta Description</label>
                            <div class="col-md-9">
                                <textarea name="meta_description" class="" id="summernote" cols="30"  rows="3">{{$slider->meta_description}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-4 d-flex form-group">
                            <div class="col-md-3">
                                <label class="" for="type">Publication Status</label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control select2 form-select" name="status" data-placeholder="Choose one">
                                    <option class="form-control" label="Choose one" disabled selected></option>
                                    <option value="1" {{$slider->status == 1 ? 'selected':''}} >Active</option>
                                    <option value="0" {{$slider->status == 0 ? 'selected':''}}>Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="radio" class="col-md-3 form-label"></label>
                            <div class="col-md-9">
                                <button class="btn btn-primary" type="submit">Update Slider Info</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
