@extends('admin.master')
@section('title','Add Product Page')
@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Product Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Product</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Product</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->


    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Add Product Form</h3>
                </div>
                <div class="text-end">
                    <a href="{{route('product-seller.index')}}" class="btn btn-success my-1 float-end mx-2 text-center">All Product</a>
                </div>
                <div class="card-body">
                    <p class="alert alert-success text-center" x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show">{{session('message')}}</p>
                    <form class="form-horizontal" action="{{ route('product-seller.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-4 ">
                            <div class="col-md-3 md-3 form-label">
                                <label class="" for="type">Seller Name<span class="text-danger">*</span></label>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <select name="seller_id" class="form-control" data-placeholder="Choose one">
                                        @forelse ($sellers as $seller)
                                            <option value="{{ $seller->id }}">{{ $seller->full_name }}</option>
                                        @empty
                                            <option class="text-center bg-danger" value=""> -- NO Seller --</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-3 md-3 form-label">
                                <label class="" for="type">Category Name<span class="text-danger">*</span></label>
                            </div>
                            <div class="form-group col-md-9">
                                <select name="category_id" class="form-control "
                                    data-placeholder="Choose one">
                                    @forelse ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @empty
                                        <option class="text-center bg-danger" value=""> -- NO Category --</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-3 md-3 form-label">
                                <label class="" for="type">SubCategory Name<span class="text-danger">*</span></label>
                            </div>
                            <div class="form-group col-md-9">

                                <select name="sub_category_id" class="form-control "
                                    data-placeholder="Choose one">
                                    @forelse ($subCategories as $sub_category)
                                        <option value="{{ $sub_category->id }}">{{ $sub_category->name }}</option>
                                    @empty
                                        <option class="text-center bg-danger" value=""> -- NO sub_category --</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>


                        <div class="row mb-4">
                            <div class="col-md-3 md-3 form-label">
                                <label class="" for="type">Brand Name<span class="text-danger">*</span></label>
                            </div>
                            <div class="form-group col-md-9">

                                <select name="brand_id" class="form-control "
                                    data-placeholder="Choose one">
                                    @forelse ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @empty
                                        <option class="text-center bg-danger" value=""> -- NO brand --</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-3 md-3 form-label">
                                <label class="" for="type">Unit Name<span class="text-danger">*</span></label>
                            </div>
                            <div class="form-group col-md-9">

                                <select name="unit_id" class="form-control "
                                    data-placeholder="Choose one">
                                    @forelse ($units as $unit)
                                        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                    @empty
                                        <option class="text-center bg-danger" value=""> -- NO unit --</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-3 md-3 form-label">
                                <label class="" for="type">Size<span class="text-danger">*</span></label>
                            </div>
                            <div class="form-group col-md-9">

                                <select name="size_id" class="form-control"
                                    data-placeholder="Choose one">
                                    @forelse ($sizes as $size)
                                        <option value="{{ $size->id }}">{{ $size->name }}</option>
                                    @empty
                                        <option class="text-center bg-danger" value=""> -- NO size --</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>


                        <div class="row mb-4">
                            <div class="col-md-3 md-3 form-label">
                                <label class="" for="type">Type<span class="text-danger">*</span></label>
                            </div>
                            <div class="form-group col-md-9">
                                <select name="type_id" class="form-control"
                                    data-placeholder="Choose one">
                                    @forelse ($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @empty
                                        <option class="text-center bg-danger" value=""> -- NO type --</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="name"  class="col-md-3 form-label">Product Name<span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ old('name') }}" name="name" id="name" placeholder="Product Name" type="text"/>

                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="name"  class="col-md-3 form-label">Product Code<span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ old('code') }}" name="code" id="code" placeholder="Product Code" type="text"/>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="description" class="col-md-3 form-label">Short Description<span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="short_description" id="short_description" placeholder="Short Description" value="{{ old('short_description') }}" ></textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="summernote" class="col-md-3 form-label">Long Description<span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="long_description" id="summernote" placeholder="Long Description" value="{{old('long_description')}}"></textarea>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="imgInp" class="col-md-3 form-label">Product Image<span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input type="file" name="image" class="dropify" data-height="200" />
                            </div>
                        </div>
                     
                        <div class="row mb-4">
                            <label  class="col-md-3 form-label">Product Price<span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <input class="form-control"  name="regular_price" placeholder="Regular Price" type="number" />
                                    <input class="form-control"  name="selling_price" placeholder="Selling Price" type="number" />
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="stockAmount" class="col-md-3 form-label">Stock<span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" id="stockAmount"  name="stock" placeholder="Stock Amount" type="number"/>
                            </div>
                        </div>

                        <div class="row mb-4 d-flex form-group">
                            <label for="stockAmount" class="col-md-3 form-label">Tags<span class="text-danger">*</span></label>
                            <div class="example col-md-9">
                                <input type="text" data-role="tagsinput" name="tags" class="form-control" placeholder="type & press enter">
                            </div>
                        </div>
                        <div class="row mb-4 d-flex form-group">
                            <div class="col-md-3">
                                <label class="" for="type">Refund<span class="text-danger">*</span></label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control select2 form-select" name="refund" data-placeholder="Choose one">
                                    <option class="form-control" label="Choose one" disabled selected></option>
                                    <option value="1" >Refundable</option>
                                    <option value="0" selected>Non-Refundable</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4 d-flex form-group">
                            <div class="col-md-3">
                                <label class="" for="type">Publication Status</label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control select2 form-select" name="status" data-placeholder="Choose one">
                                    <option class="form-control" label="Choose one" disabled selected></option>
                                    <option selected value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary rounded-0 float-end" type="submit">Create New Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
