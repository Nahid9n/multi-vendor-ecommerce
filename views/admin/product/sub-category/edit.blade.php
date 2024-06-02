@extends('admin.master')
@section('title','category page')
@section('body')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title text-bold">Edit SubCategory Form</h3>
                    <a href="{{route('sub-category.index')}}" class="btn btn-success my-1 text-center">All SubCategory</a>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{session('message')}}</p>
                    <form class="form-horizontal" action="{{route('sub-category.update', $sub_category->id)}}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Category Name <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <select class="form-control" name="category_id" required>
                                    <option value="" disabled selected> -- Select Category -- </option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{$sub_category->category_id == $category->id ? 'selected' : ''}}> {{$category->name}} </option>
                                    @endforeach
                                </select>
                                <b><span class="text-danger">{{ $errors->first('category_id') }}</small></b>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="name" class="col-md-3 form-label">SubCategory Name <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{$sub_category->name}}" id="name" name="name" placeholder="Sub Category Name" type="text" required/>
                                <b><span class="text-danger">{{ $errors->first('name') }}</small></b>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="lastName" class="col-md-3 form-label">SubCategory Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="lastName" name="description" placeholder="Sub Category Description">{{$sub_category->description}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label" >SubCategory Image</label>
                            <div class="col-md-9">
                                <div class="input-group singleImg" data-bs-toggle="modal" data-bs-target="#singleImg" data-type="image" data-multiple="false">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                    </div>
                                    <div class="form-control singlefile-amount">Choose file</div>
                                </div>
                                <div class="row d-flex" id="singleData">
                                    <input type="hidden" id="singleSelectedItemId" name="image">
                                    <div class="position-relative d-flex" id="imageContainer">
                                        <div class="imgs m-1">
                                            <span class="btn btn-danger btn-sm position-absolute" id="{{$image->id ?? ''}}" onclick="rmSingleimg(this)" style="float: left">&times;</span>
                                            <img width="100" height="100" class="img" src="{{asset($sub_category->image)}}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Publication Status</label>
                            <div class="col-md-9 pt-3">
                                <label> <input type="radio" value="1" {{$sub_category->status == 1 ? 'checked' : ''}} name="status"><span>Active</span> </label>
                                <label> <input type="radio" value="0" {{$sub_category->status == 0 ? 'checked' : ''}} name="status"><span> Inactive</span> </label>
                            </div>
                        </div>
                        <button class="btn btn-primary rounded-0 float-end" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection



