@extends('admin.master')
@section('title','Blog Post page')
@section('body')
<!-- row -->
<div class="row row-deck mt-5">
    <div class="col-md-12">
        <div class="card">
            <div class="text-end">
                <a href="{{route('blogs.index')}}" class="btn btn-success my-1 mx-2 float-end text-center">All Blog
                    Post</a>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="{{route('blogs.store')}}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-4">
                        <label for="title" class="col-md-3 form-label">Blog Post Title <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <input class="form-control" id="title" required value="{{old('title')}}" name="title"
                                placeholder="Enter your Blog Post Title" type="text">
                            <span class="text-danger">{{$errors->has('title') ? $errors->first('title'):''}}</span>
                        </div>
                    </div>
                    <div class="row mb-4 d-flex form-group">
                        <div class="col-md-3">
                            <label class="" for="type">Category <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <select class="form-control select2 select2-show-search form-select" name="category_id"
                                data-placeholder="Choose one" required>
                                <option class="form-control" label="Choose one" disabled selected></option>
                                @foreach($blogCategories as $blogCategory)
                                <option value="{{$blogCategory->id}}">{{$blogCategory->name}}</option>
                                @endforeach
                            </select>
                            <span
                                class="text-danger">{{$errors->has('category_id') ? $errors->first('category_id'):''}}</span>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="slug" class="col-md-3 form-label">slug</label>
                        <div class="col-md-9">
                            <input class="form-control" value="{{old('slug')}}" id="slug" name="slug"
                                placeholder="Enter your slug here" type="text">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="" class="col-md-3 form-label">Banner</label>
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

                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="" class="col-md-3 form-label">Blog Other Images</label>
                        <div class="col-md-9 test_class">
                            <div class="input-group multipleFile" data-bs-toggle="modal" id="other_image"
                                data-bs-target="#multipleImg" data-type="image" data-multiple="true">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                </div>
                                <div class="form-control multiplefile-amount" id="other_imageFileAmount">Choose file
                                </div>
                            </div>
                            <input type="hidden" id="other_imageItemId" name="other_images" readonly>
                            <div class="row d-flex" id="other_imageData">

                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="description" class="col-md-3 form-label">Short Description</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="short_description" id="short_description"
                                placeholder="Short Description"></textarea>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="summernote" class="col-md-3 form-label">Long Description</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="long_description" id="summernote"
                                placeholder="Long Description" value="{{old('long_description')}}"></textarea>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="meta_title" class="col-md-3 form-label">Meta Title</label>
                        <div class="col-md-9">
                            <input class="form-control" value="{{old('meta_title')}}" id="meta_title" name="meta_title"
                                placeholder="Enter Meta Title" type="text">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="" class="col-md-3 form-label"> Meta Image</label>
                        <div class="col-md-9">
                            <div class="input-group singleFile" data-bs-toggle="modal" id="metaImg"
                                data-bs-target="#singleImg" data-type="image" data-multiple="false">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                </div>
                                <div class="form-control singlefile-amount3" id="metaImgFileAmount">Choose file</div>
                            </div>
                            <input type="hidden" id="metaImgItemId" name="meta_image" readonly>
                            <div class="row d-flex" id="metaImgData">

                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="meta_description" class="col-md-3 form-label">Meta Description</label>
                        <div class="col-md-9">
                            <textarea class="form-control" id="meta_description" name="meta_description"
                                placeholder="Enter Meta Description" type="text">{{old('metaDescription')}}</textarea>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="meta_keyword" class="col-md-3 form-label">Meta Keyword</label>
                        <div class="col-md-9">
                            <input class="form-control" value="{{old('meta')}}" id="meta_keyword" name="meta_keyword"
                                placeholder="Enter keywords" type="text">
                        </div>
                    </div>
                    <div class="row mb-4 d-flex form-group">
                        <div class="col-md-3">
                            <label class="" for="type">Publication Status</label>
                        </div>
                        <div class="col-md-9">
                            <select class="form-control select2 form-select" name="status"
                                data-placeholder="Choose one">
                                <option class="form-control" label="Choose one" disabled selected></option>
                                <option selected value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <button class="btn btn-primary px-4" type="submit">Create Blog Post</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /row -->
@endsection
