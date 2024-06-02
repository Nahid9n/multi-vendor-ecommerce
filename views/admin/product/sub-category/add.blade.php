@extends('admin.master')
@section('title','category page')
@section('body')
    <div class="row mt-5">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title text-bold">Add SubCategory Form</h3>
                    <a href="{{route('sub-category.index')}}" class="btn btn-success my-1 text-center">All SubCategory</a>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{route('sub-category.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Category Name <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <select class="form-control" name="category_id" required>
                                    <option value="" disabled selected> -- Select Category -- </option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}"> {{$category->name}} </option>
                                    @endforeach
                                </select>
                                <b><span class="text-danger">{{ $errors->first('category_id') }}</small></b>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="name" class="col-md-3 form-label">SubCategory Name<span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{old('name')}}" id="name" name="name" placeholder="Sub Category Name" type="text" required />
                                <b><span class="text-danger">{{ $errors->first('name') }}</small></b>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="description" class="col-md-3 form-label">SubCategory Description <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="description" name="description" placeholder="Sub Category Description"></textarea>

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
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Publication Status</label>
                            <div class="col-md-9 pt-3">
                                <label> <input type="radio" value="1" checked name="status"><span> Active</span> </label>
                                <label> <input type="radio" value="0" name="status"><span>Inactive</span> </label>
                            </div>
                        </div>
                        <button class="btn btn-primary rounded-0 float-end" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


