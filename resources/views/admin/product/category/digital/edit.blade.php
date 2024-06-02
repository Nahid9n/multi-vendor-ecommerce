@extends('admin.master')
@section('title', 'category page')
@section('body')
@include('modal.common')
    <div class="page-header">
        <div>
            <h1 class="page-title">Digital Category Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
            </ol>
        </div>
    </div>
    <div class="row row-deck">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title">Update Category</h3>
                    <a href="{{ route('digitals.index') }}" class="btn btn-success my-1 mx-2 text-center">All Category</a>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('digitals.update', $category->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="type" value="digital">
                        <div class="row mb-4">
                            <label for="name" class="col-md-3 form-label">Category Name <span
                                    class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" id="name" required value="{{ $category->name }}"
                                    name="name" placeholder="Enter your category name" type="text">
                                <b><span class="text-danger">{{ $errors->first('name') }}</span></b>
                            </div>
                        </div>
                        <div class="row mb-4 d-flex form-group">
                            <div class="col-md-3">
                                <label class="form-label" for="type">Parent Category <span
                                        class="text-danger">*</span></label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control select2 select2-show-search form-select" name="parent_id" data-placeholder="Choose one">

                                    <option value="0">No Parent</option>
                                    @foreach ($parent_categories as $parent_category)
                                    <?php
                                        $dashes = '';
                                        ?>
                                    @for ($i=1; $i<=$parent_category->level; $i++)
                                    <?php
                                         $dashes = str_repeat('-', $i);
                                         ?>
                                    @endfor
                                    <option value="{{ $parent_category->id }}" @if ($parent_category->id == $category->parent_id)@selected(true)

                                    @endif>{{ $dashes }} {{ $parent_category->name}}</option>
                                    @endforeach>
                                </select>
                                <b><span class="text-danger">{{ $errors->first('parent_id') }}</span></b>

                            </div>
                        </div>
                        {{-- <div class="row mb-4">
                            <label for="orderNumber" class="col-md-3 form-label">Ordering Number<span
                                    class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ $category->orderNumber }}" id="orderNumber"
                                    name="orderNumber" placeholder="Enter your Ordering Number" type="number">
                                <b><span class="text-danger">{{ $errors->first('orderNumber') }}</span></b>
                            </div>
                        </div> --}}

                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label">Banner</label>
                            <div class="col-md-9 test_class">
                                <div class="input-group openImageModal" data-multiple="false" data-inputname="banner">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                    </div>
                                    <div class="form-control" >Choose file
                                    </div>
                                </div>

                                <div class="row d-flex" id="banner"> 
                                    <div class="position-relative d-flex" id="imageContainer">
                                        <div class="imgs m-1">
                                            @if($category->banner != '')
                                            <span class="btn btn-danger btn-sm position-absolute rmSingleimg" id="{{$banner->id ?? ''}}" style="float: left">&times;</span>
                                            <img width="100" height="100" class="img" src="{{asset($category->banner)}}" alt="">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <b><span class="text-danger">{{$errors->first('banner')}}</span></b>
                            </div>
                        </div>
                        
                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label">Icon</label>
                            <div class="col-md-9 test_class">
                                <div class="input-group openImageModal" data-multiple="false" data-inputname="icon">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                    </div>
                                    <div class="form-control" >Choose file
                                    </div>
                                </div>

                                <div class="row d-flex" id="icon"> 
                                    <div class="position-relative d-flex" id="imageContainer">
                                        <div class="imgs m-1">
                                            @if($category->icon != '')
                                                <span class="btn btn-danger btn-sm position-absolute rmSingleimg" id="{{$icon->id ?? ''}}" style="float: left">&times;</span>
                                                <img width="100" height="100" class="img" src="{{asset($category->icon)}}" alt="">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <b><span class="text-danger">{{$errors->first('banner')}}</span></b>
                            </div>
                        </div>
                        
                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label">Cover</label>
                            <div class="col-md-9 test_class">
                                <div class="input-group openImageModal" data-multiple="false" data-inputname="cover">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                    </div>
                                    <div class="form-control" >Choose file
                                    </div>
                                </div>

                                <div class="row d-flex" id="cover"> 
                                    <div class="position-relative d-flex" id="imageContainer">
                                        <div class="imgs m-1">
                                            @if($category->cover != '')
                                                <span class="btn btn-danger btn-sm position-absolute rmSingleimg" id="{{$cover->id ?? ''}}" style="float: left">&times;</span>
                                                <img width="100" height="100" class="img" src="{{asset($category->cover)}}" alt="">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <b><span class="text-danger">{{$errors->first('banner')}}</span></b>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="meta" class="col-md-3 form-label">Meta Title<span
                                    class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ $category->meta }}" id="meta" name="meta"
                                    placeholder="Enter Meta Title" type="text">
                                <b><span class="text-danger">{{ $errors->first('meta') }}</span></b>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="metaDescription" class="col-md-3 form-label">Meta Description<span
                                    class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="metaDescription" name="metaDescription" placeholder="Enter Meta Description"
                                    type="text">{{ $category->metaDescription }}</textarea>
                                <b><span class="text-danger">{{ $errors->first('metaDescription') }}</span></b>
                            </div>
                        </div>
                        <div class="row mb-4 d-flex form-group">
                            <div class="col-md-3">
                                <label class="form-label" for="type">Publication Status</label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control select2 form-select" name="status"
                                    data-placeholder="Choose one">
                                    <option class="form-control" label="Choose one" disabled selected></option>
                                    <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ $category->status == 0 ? 'selected' : '' }}>Inactive
                                    </option>
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
