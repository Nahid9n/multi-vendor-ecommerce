@extends('admin.master')
@section('title','Brand page')
@section('body')
@include('modal.common')
    <div class="row row-deck mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title text-bold">Update Brand</h3>
                    <a href="{{route('brands.index')}}" class="btn btn-success my-1 float-end mx-2 text-center">All Brands</a>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{route('brands.update',$brand->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-4">
                            <label for="name" class="col-md-3 form-label">Brand Name <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" id="name" required value="{{$brand->name}}" name="name" placeholder="Enter your Brand name" type="text">
                               <b><span class="text-danger">{{$errors->first('name')}}</span></b>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label">Logo</label>
                            <div class="col-md-9 test_class">
                                <div class="input-group openImageModal" data-multiple="false" data-inputname="logo">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                    </div>
                                    <div class="form-control" >Choose file
                                    </div>
                                </div>

                                <div class="row d-flex" id="logo"> 
                                    <div class="position-relative d-flex" id="imageContainer">
                                        <div class="imgs m-1">
                                            @if($brand->logo != '')
                                            <span class="btn btn-danger btn-sm position-absolute rmSingleimg" id="{{$logo->id ?? ''}}" style="float: left">&times;</span>
                                            <img width="100" height="100" class="img" src="{{asset($brand->logo)}}" alt="">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <b><span class="text-danger">{{$errors->first('logo')}}</span></b>
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
                                <label class="form-label" for="type">Publication Status</label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control select2 form-select" name="status" data-placeholder="Choose one">
                                    <option class="form-control" label="Choose one" disabled selected></option>
                                    <option value="1" {{$brand->status == 1 ? 'selected':''}}>Active</option>
                                    <option value="0" {{$brand->status == 0 ? 'selected':''}}>Inactive</option>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary float-end" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection



