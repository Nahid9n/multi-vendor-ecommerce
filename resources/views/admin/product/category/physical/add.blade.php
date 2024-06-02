@extends('admin.master')
@section('title', 'category page')
@section('body')
@include('modal.common')
    <div class="page-header">
        <div>
            <h1 class="page-title">Physical Category Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Category</li>
            </ol>
        </div>
    </div>
    <div class="row row-deck">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title">Create New Category</h3>
                    <a href="{{ route('physicals.index') }}" class="btn btn-success my-1 float-end mx-2 text-center">All
                        Category</a>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('physicals.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="type" value="physical">
                        <div class="row mb-4">
                            <label for="name" class="col-md-3 form-label">Category Name <span
                                    class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" id="name" value="{{ old('name') }}"
                                    name="name" placeholder="Enter your category name" type="text" required>
                                <b><span class="text-danger">{{ $errors->first('name') }}</span></b>
                            </div>
                        </div>
                        <div class="row mb-4 d-flex form-group">
                            <div class="col-md-3">
                                <label class="form-label" for="type">Parent Category <span
                                        class="text-danger">*</span></label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control select2 select2-show-search form-select" name="parent_id"
                                    data-placeholder="Choose one" required>

                                    <option value="0" class="form-control">No Parent</option>
                                    @foreach ($parent_categories as $parent_category)
                                    <?php
                                        $dashes = '';
                                    ?>

                                    @for ($i=1; $i<=$parent_category->level; $i++)

                                    <?php
                                         $dashes = str_repeat('-', $i);
                                    ?>
                                    @endfor
                                        <option value="{{ $parent_category->id }}">{{ $dashes }} {{ $parent_category->name}}</option>
                                    @endforeach
                                </select>
                                <b><span class="text-danger">{{ $errors->first('parent_id') }}</span></b>

                            </div>
                        </div>

                        {{-- <div class="row mb-4">
                            <label for="orderNumber" class="col-md-3 form-label">Ordering Number <span
                                    class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ old('name') }}" id="orderNumber" name="orderNumber"
                                    min="1" placeholder="Enter your Ordering Number" type="number">
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

                                <div class="row d-flex" id="banner"> </div>
                                <b><span class="text-danger">{{$errors->first('banner')}}</span></b>
                            </div>
                        </div>
                        
                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label">Banner</label>
                            <div class="col-md-9 test_class">
                                <div class="input-group openImageModal" data-multiple="false" data-inputname="icon">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                    </div>
                                    <div class="form-control" >Choose file
                                    </div>
                                </div>

                                <div class="row d-flex" id="icon"> </div>
                                <b><span class="text-danger">{{$errors->first('banner')}}</span></b>
                            </div>
                        </div>
                        
                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label">Banner</label>
                            <div class="col-md-9 test_class">
                                <div class="input-group openImageModal" data-multiple="false" data-inputname="cover">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                    </div>
                                    <div class="form-control" >Choose file
                                    </div>
                                </div>

                                <div class="row d-flex" id="cover"> </div>
                                <b><span class="text-danger">{{$errors->first('banner')}}</span></b>
                            </div>
                        </div>
                        
                        <div class="row mb-4">
                            <label for="meta" class="col-md-3 form-label">Meta Title </label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ old('meta') }}" id="meta" name="meta"
                                    placeholder="Enter Meta Title" type="text">

                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="metaDescription" class="col-md-3 form-label">Meta Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="metaDescription" name="metaDescription" placeholder="Enter Meta Description"
                                    type="text">{{ old('metaDescription') }}</textarea>

                            </div>
                        </div>
                        <div class="row mb-4 d-flex form-group">
                            <div class="col-md-3">
                                <label class="form-label" for="type">Publication Status </label>
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
                        <button class="btn btn-primary px-4 float-end" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
