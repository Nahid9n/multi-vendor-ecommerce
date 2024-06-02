
@extends('seller.Layout.master')
@section('title','Edit Digital Product Page')
@section('body')
<div class="row mt-5">
    <div class="col">
        <div class="card">
            <div class="card-header border-bottom justify-content-between">
                <h3 class="card-title text-bold">Edit Digital Product</h3>
                <a href="{{route('digital-product.index')}}" class="btn btn-primary my-1 mx-2 text-center">All Digital Product</a>
            </div>
            <div class="card-body">
                <form class="" action="{{ route('digital-product.update',$product->id) }}" method="post" enctype="multipart/form-data" id="choice_form">
                    @csrf
                    @method('put')
                    <input type="hidden" name="product_type" value="{{$product->product_type}}" readonly>
                    <input type="hidden" name="product_select" value="{{$product->product_select}}" readonly>
                    <div class="row mb-4">
                        <label for="" class="col-md-3 form-label">Product Name <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" id="" value="{{ $product->name }}" name="name" placeholder="Product name" required/>
                            <b><span class="text-danger">{{$errors->first('name')}}</span></b>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="category_id"  class="col-md-3 form-label">Category Name <span class="text-danger">*</span></label>
                        <div class="col-md-9 form-group">
                            <select name="category_id" class="form-control select2 select2-show-search" data-placeholder="Select Category" id="category" required>
                                <option value="" disabled selected> -- Select Category --</option>
                                @forelse($parent_categories as $parent_category)
                                        <?php
                                            $dashes = '';
                                        ?>

                                        @for ($i=1; $i<=$parent_category->level; $i++)

                                            <?php
                                                $dashes = str_repeat('-', $i);
                                            ?>
                                        @endfor
                                    <option value="{{$parent_category->id}}" @if ($parent_category->id == $product->category_id)@selected(true)

                                    @endif>{{$dashes}} {{$parent_category->name}} </option>
                                @empty
                                <option class="text-center text-danger"> --No Category--</option>
                                @endforelse
                            </select>
                            <b><span class="text-danger">{{$errors->first('category_id')}}</span></b>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for=""  class="col-md-3 form-label">Brand Name <span class="text-danger">*</span></label>
                        <div class="col-md-9 form-group">
                            <select name="brand_id"  class="form-control select2 select2-show-search" data-placeholder="Select Brand" required>
                                <option value="" disabled selected> -- Select Brand --</option>
                                @forelse($brands as $brand)
                                    <option value="{{$brand->id}}" @if ($brand->id == $product->brand_id)@selected(true)

                                    @endif> {{$brand->name}} </option>
                                @empty
                                    <option class="text-center text-danger"> --No Brand--</option>
                                @endforelse
                            </select>
                            <b><span class="text-danger">{{$errors->first('brand_id')}}</span></b>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="bar_code"  class="col-md-3 form-label">Bar Code <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <input class="form-control" value="{{ $product->bar_code }}" name="bar_code" id="bar_code" placeholder="Bar code" type="text" required/>
                            <b><span class="text-danger">{{$errors->first('bar_code')}}</span></b>
                        </div>
                    </div>

                    <div class="row mb-4" id="product_price">
                        <label for="" class="col-md-3 form-label">Product Price<span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <input class="form-control" value="{{ $product->product_price }}" name="product_price" id="" placeholder="0.01" step=".01" min="0" type="number" required/>
                            <b><span class="text-danger">{{$errors->first('product_price')}}</span></b>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="" class="col-md-3 form-label" >File</label>
                        <div class="col-md-9 test_class">
                            <div class="input-group singleFile" data-bs-toggle="modal" id="file" data-bs-target="#singleImg" data-type="image" data-multiple="false">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                </div>
                                <div class="form-control" id="fileFileAmount" >Choose file</div>
                            </div>
                            <input type="hidden" id="fileItemId" name="file">

                            <div class="row d-flex" id="fileData">
                                <div class="position-relative d-flex" id="imageContainer">
                                    <div class="imgs m-1">
                                        <span class="btn btn-danger btn-sm position-absolute rmSingleimg" id="{{ isset($file->id) }}" style="float: left">&times;</span>
                                        <img width="100" height="100" class="img" src="{{asset(isset($product->file))}}" alt="">
                                        <p>{{ isset($file->file_name) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="" class="col-md-3 form-label" >Product Image </label>
                        <div class="col-md-9 test_class">
                            <div class="input-group singleFile" data-bs-toggle="modal" id="product_image" data-bs-target="#singleImg" data-type="image" data-multiple="false">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                </div>
                                <div class="form-control" id="product_imageFileAmount" >Choose file</div>
                            </div>
                            <input type="hidden" id="product_imageItemId" name="product_image">
                            <div class="row d-flex" id="product_imageData">
                                <div class="position-relative d-flex" id="imageContainer">
                                    <div class="imgs m-1">
                                        <span class="btn btn-danger btn-sm position-absolute rmSingleimg" id="" style="float: left">&times;</span>
                                        <img width="100" height="100" class="img" src="{{asset($product->product_image)}}" alt="">
                                    </div>
                                </div>
                            </div>
                            <b><span class="text-danger">{{$errors->first('product_image')}}</span></b>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="" class="col-md-3 form-label" >Other Images</label>
                        <div class="col-md-9 test_class">
                            <div class="input-group multipleFile" data-bs-toggle="modal" id="other_images" data-bs-target="#multipleImg" data-type="image" data-multiple="true">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                </div>
                                <div class="form-control multiplefile-amount" id="other_imagesFileAmount">Choose file</div>
                            </div>
                            <input type="hidden" id="other_imagesItemId" name="other_image">
                            <div class="row d-flex" id="other_imagesData">
                                <div class="position-relative d-flex" id="imageContainer">
                                    @foreach($otherImages as $key=>$image)
                                        <div class="imgs m-1">
                                            <span class="btn btn-danger btn-sm position-absolute rmMultipleImg" id="" style="float: left">&times;</span>
                                            <img width="100" height="100" class="img" src="{{asset($image)}}" alt="">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="shipping_cost" class="col-md-3 form-label">Shipping Cost <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <input class="form-control" id="shipping_cost" min="0" step=".01" name="shipping_cost" value="{{ $product->shipping_cost }}" placeholder="0.01" type="number" required/>
                            <b><span class="text-danger">{{$errors->first('shipping_cost')}}</span></b>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="description" class="col-md-3 form-label">Short Description</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="short_description" id="short_description" placeholder="Short Description">{{ $product->short_description }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="summernote" class="col-md-3 form-label">Long Description</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="long_description" id="summernote" placeholder="Long Description"
                                value="">{{ $product->long_description }}</textarea>
                        </div>
                    </div>

                    <div class="row mb-4 d-flex form-group">
                        <label for="stockAmount" class="col-md-3 form-label">Tags</label>
                        <div class="example col-md-9">
                            <input type="text" data-role="tagsinput" value="{{ $product->tags }}" name="tags"
                                class="form-control" placeholder="type & press enter">
                        </div>
                    </div>
                    <div class="row mb-4 d-flex form-group">
                        <div class="col-md-3">
                            <label class="form-label" for="type">Refund</label>
                        </div>
                        <div class="col-md-9">
                            <select class="form-control select2" name="refund">
                                <option value="1" {{ $product->refund == 1 ? 'selected' : '' }}> Refundable </option>
                                <option value="0" {{ $product->refund == 0 ? 'selected' : '' }}> Non-Refundable </option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4 d-flex form-group">
                        <div class="col-md-3">
                            <label class="form-label" for="type">Feature Product</label>
                        </div>
                        <div class="col-md-9">
                            <div class="material-switch">
                                <input id="feature_product" value="1"
                                    {{ $product->featured_status == 1 ? 'checked' : '' }} name="featured_status"
                                    type="checkbox" />
                                <label for="feature_product" class="label-primary"></label>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-primary float-end" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
