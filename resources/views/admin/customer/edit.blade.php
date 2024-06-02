@extends('admin.master')
@section('title','Brand page')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Brand Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Brand</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Brand</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <!-- row -->
    <div class="row row-deck">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Update Brand</h3>
                </div>
                <div class="text-end">
                    <a href="{{route('brands.index')}}" class="btn btn-success my-1 float-end mx-2 text-center">All Brands</a>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{route('brands.update',$brand->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-4">
                            <label for="name" class="col-md-3 form-label">Brand Name</label>
                            <div class="col-md-9">
                                <input class="form-control" id="name" required value="{{$brand->name}}" name="name" placeholder="Enter your Brand name" type="text">
                                <span class="text-danger">{{$errors->has('name') ? $errors->first('name'):''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="banner" class="col-md-3 form-label">Logo (120x80)</label>
                            <div class="col-md-9">
                                <input type="file" class="dropify" name="logo" data-default-file="" data-height="200"/>
                                <img width="200" height="200" src="{{asset($brand->logo)}}" class="img-fluid mt-1" alt="">
                                <span class="text-danger">{{$errors->has('logo') ? $errors->first('logo'):''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="meta" class="col-md-3 form-label">Meta Title</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{$brand->meta}}" id="meta" name="meta" placeholder="Enter Meta Title" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="metaDescription" class="col-md-3 form-label">Meta Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="metaDescription" name="meta_description" placeholder="Enter Meta Description" type="text">{{$brand->meta_description}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-4 d-flex form-group">
                            <div class="col-md-3">
                                <label class="" for="type">Publication Status</label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control select2 form-select" name="status" data-placeholder="Choose one">
                                    <option class="form-control" label="Choose one" disabled selected></option>
                                    <option value="1" {{$brand->status == 1 ? 'selected':''}}>Active</option>
                                    <option value="0" {{$brand->status == 0 ? 'selected':''}}>Inactive</option>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
@endsection



