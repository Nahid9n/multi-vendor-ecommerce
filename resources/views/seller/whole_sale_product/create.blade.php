@extends('seller.Layout.master')
@section('title','Add Product Page')
@section('body')
<div class="row mt-5">
    <div class="col">
        <div class="card-body">
            <form class="form-horizontal" action="{{ route('seller-whole-sale-product.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mb-4">
                    <label for="name" class="col-md-3 form-label">Product Name <span class="text-danger">*</span></label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" id="myInput1" onkeyup="myChangeFunction(this)" value="{{ old('name') }}" name="name" placeholder="Product name" />
                        <b><span class="text-danger">{{$errors->first('name')}}</span></b>
                    </div>
                </div>

                <div class="row mb-4">
                    <label for="name"  class="col-md-3 form-label">Category Name <span class="text-danger">*</span></label>
                    <div class="col-md-9 form-group">
                        <select name="category_id"  class="form-control select2 select2-show-search form-select">
                            <option value="" disabled selected> Select Category </option>
                            @forelse($categories as $category)
                                <option value="{{$category->id}}"> {{$category->name}} </option>
                            @empty
                            <option class="text-center text-danger"> --No Category--</option>
                            @endforelse
                        </select>
                        <b><span class="text-danger">{{$errors->first('category_id')}}</span></b>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="name"  class="col-md-3 form-label">SubCategory Name <span class="text-danger">*</span></label>
                    <div class="col-md-9 form-group">
                        <select name="sub_category_id"  class="form-control select2 select2-show-search form-select">
                            <option value="" disabled selected> Select SubCategory </option>
                            @forelse($subCategories as $sub_category)
                                <option value="{{$sub_category->id}}"> {{$sub_category->name}} </option>
                            @empty
                            <option class="text-center text-danger"> --No SubCategory--</option>
                            @endforelse
                        </select>
                        </select>
                        <b><span class="text-danger">{{$errors->first('sub_category_id')}}</span></b>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="name"  class="col-md-3 form-label">Brand Name <span class="text-danger">*</span></label>
                    <div class="col-md-9 form-group">
                        <select name="brand_id"  class="form-control select2 select2-show-search form-select">
                            <option value="" disabled selected> Select Brand </option>
                            @forelse($brands as $brand)
                                <option value="{{$brand->id}}"> {{$brand->name}} </option>
                            @empty
                                <option class="text-center text-danger"> --No Brand--</option>
                            @endforelse
                        </select>
                        <b><span class="text-danger">{{$errors->first('name')}}</span></b>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="name"  class="col-md-3 form-label">Unit Name <span class="text-danger">*</span></label>
                    <div class="col-md-9 form-group">
                        <select name="unit_id"  class="form-control select2 select2-show-search form-select">
                            <option value="" disabled selected >Select Unit</option>
                            @forelse($units as $unit)
                                <option value="{{$unit->id}}"> {{$unit->name}} </option>
                            @empty
                                <option class="text-center text-danger"> --No Unit--</option>
                            @endforelse
                        </select>
                        <b><span class="text-danger">{{$errors->first('name')}}</span></b>
                    </div>
                </div>
                <div class="row mb-4 d-flex form-group">
                    <div class="col-md-3">
                        <label class="form-label" for="type">Product Type <span class="text-danger">*</span></label>
                    </div>
                    <div class="col-md-9">
                        <select class="form-control select2 select2-show-search form-select" name="type_id">
                            <option value="" disabled selected>Select Type</option>
                            @forelse($productTypes as $productType)
                                <option value="{{$productType->id}}">{{$productType->name}}</option>
                            @empty
                                <option class="text-center text-danger"> --No ProductType--</option>
                            @endforelse
                        </select>
                        <b><span class="text-danger">{{$errors->first('type_id')}}</span></b>
                    </div>
                </div>
                <div class="row mb-4 d-flex form-group">
                    <label for="color" class="col-md-3 form-label">Color <span class="text-danger">*</span></label>
                    <div class="example col-md-9">
                        <input type="text" data-role="tagsinput" name="colors" multiple class="form-control" placeholder="Type Color & press enter" id="color">
                        <b><span class="text-danger">{{$errors->first('colors')}}</span></b>
                    </div>
                </div>

                <div class="row mb-4 d-flex form-group">
                    <label for="size" class="col-md-3 form-label">Size <span class="text-danger">*</span></label>
                    <div class="example col-md-9">
                        <input type="text" data-role="tagsinput" name="sizes" multiple class="form-control" placeholder="Type Size & press enter" id="size">
                        <b><span class="text-danger">{{$errors->first('sizes')}}</span></b>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="name"  class="col-md-3 form-label">Product Code <span class="text-danger">*</span></label>
                    <div class="col-md-9">
                        <input class="form-control" value="{{ old('code') }}" name="code" id="code" placeholder="Product Code" type="text"/>
                        <b><span class="text-danger">{{$errors->first('code')}}</span></b>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for=""  class="col-md-3 form-label">Estimate Shipping Time<span class="text-danger">*</span></label>
                    <div class="col-md-9">
                        <input class="form-control" value="{{ old('estimate_shipping_time') }}" name="estimate_shipping_time" id="code" placeholder="Estimate Shipping Time" type="number"/>
                        <b><span class="text-danger">{{$errors->first('estimate_shipping_time')}}</span></b>
                    </div>
                </div>
                <div class="row mb-4">
                    <label  class="col-md-3 form-label">Product Price <span class="text-danger">*</span></label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <input class="form-control"  name="regular_price" placeholder="Regular Price" type="number" />
                            <b><span class="text-danger">{{$errors->first('regular_price')}}</span></b>
                            <input class="form-control"  name="selling_price" placeholder="Selling Price" type="number" /><br>
                            <b><span class="text-danger">{{$errors->first('selling_price')}}</span></b>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="description" class="col-md-3 form-label">Wholesale Quantity Prices <span class="text-danger">*</span></label>
                    <div class="col-md-9">
                       <div class="row customer_choice_options_types_wrap_child" >

                        <input type="button" value="Add More" class="btn btn-sm btn-primary" onclick="add_customer_choice_options(this)"><br>

                        <div class="col-md-4">

                            <input type="number" class="form-control" placeholder="MinQty" min="1" required>
                        </div>
                        <div class="col-md-4">
                            <input type="number" class="form-control" placeholder="MaxQty" min="1" required>
                        </div>
                        <div class="col-md-4">
                            <input type="number" class="form-control" placeholder="UnitPrice" min="1" required>
                        </div>

                       </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <label for="description" class="col-md-3 form-label">Short Description</label>
                    <div class="col-md-9">
                        <textarea class="form-control" name="short_description" id="short_description" placeholder="Short Description" ></textarea>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="summernote" class="col-md-3 form-label">Long Description</label>
                    <div class="col-md-9">
                        <textarea class="form-control" name="long_description" id="summernote" placeholder="Long Description" value="{{old('long_description')}}"></textarea>
                    </div>
                </div>

                <div class="row mb-4">
                    <label for="imgInp" class="col-md-3 form-label">Product thumbnail Image (500x500) <span class="text-danger">*</span></label>
                    <div class="col-md-9">
                        <input type="file" name="image" class="dropify" data-height="200" required />
                    </div>
                </div>
                <div class="row mb-4">
                    <label  class="col-md-3 form-label">Product Other Image</label>
                    <div class="col-md-9">
                        <div class="gallery mt-2">
                            <input type="file" name="images[]" id="gallery-photo-add" class="form-control" multiple >
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="stockAmount" class="col-md-3 form-label">Stock Amount</label>
                    <div class="col-md-9">
                        <input class="form-control" id="stockAmount"  name="stock_amount" placeholder="Stock Amount" type="number"/>
                    </div>
                </div>

                <div class="row mb-4">
                    <label for="shipping_cost" class="col-md-3 form-label">Shipping Cost</label>
                    <div class="col-md-9">
                        <input class="form-control" id="shipping_cost"  name="shipping_cost" placeholder="Shipping Cost" type="number"/>
                    </div>
                </div>

                <div class="row mb-4 d-flex form-group">
                    <label for="stockAmount" class="col-md-3 form-label">Tags</label>
                    <div class="example col-md-9">
                        <input type="text" data-role="tagsinput" name="tags" class="form-control" placeholder="type & press enter">
                    </div>
                </div>

                <div class="row mb-4 d-flex form-group">
                    <div class="col-md-3">
                        <label class="form-label" for="type">Refund</label>
                    </div>
                    <div class="col-md-9">
                        <select class="form-control " name="refund">
                            <option class="form-control" label="Choose one" disabled selected></option>
                            <option value="1" >Refundable</option>
                            <option value="0" selected>Non-Refundable</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-4 d-flex form-group">
                    <div class="col-md-3">
                        <label class="form-label" for="type">Cash On</label>
                    </div>
                    <div class="col-md-9">
                        <div class="material-switch">
                            <input id="uncheckedDangerSwitch" value="1" name="cash_on" checked type="checkbox"/>
                            <label for="uncheckedDangerSwitch" class="label-danger"></label>
                        </div>
                    </div>
                </div>
                {{-- <div class="row mb-4">
                    <label  class="col-md-3 form-label">Flash Deal</label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <div class="material-switch">
                                <input id="uncheckedPrimarySwitch1" value="1" name="flash_deal" checked type="checkbox"/>
                                <label for="uncheckedPrimarySwitch1" class="label-danger"></label>
                            </div>
                            <input class="form-control"  name="flash_deal_discount" placeholder="flash deal discount" type="number"  max="100"/>
                        </div>
                    </div>
                </div> --}}
                <div class="row mb-4 d-flex form-group">
                    <div class="col-md-3">
                        <label class="form-label" for="type">Feature Product</label>
                    </div>
                    <div class="col-md-9">
                        <div class="material-switch">
                            <input id="uncheckedPrimarySwitch" value="1" name="featured_status" checked type="checkbox"/>
                            <label for="uncheckedPrimarySwitch" class="label-danger"></label>
                        </div>
                    </div>
                </div>
                <div class="row mb-4 d-flex form-group">
                    <div class="col-md-3">
                        <label class="form-label" for="type">Publication Status</label>
                    </div>
                    <div class="col-md-9">
                        <select class="form-control " name="status">
                            <option class="form-control" label="Choose one" disabled selected></option>
                            <option selected value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>
                <button class="btn btn-primary float-end" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>


@endsection
@push('js')
<script>

    function add_customer_choice_options(em){

        var divElement = document.createElement("div");
        divElement.setAttribute("class", "col-md-4");

        var inputField = document.createElement("input");

        inputField.setAttribute("type", "number");
        inputField.setAttribute("class", "form-control");
        inputField.setAttribute("placeholder", "MinQty");
        inputField.setAttribute("min", "1");

        divElement.appendChild(inputField);




        var divElement_two = document.createElement("div");
        divElement_two.setAttribute("class", "col-md-4");

        var inputField_two = document.createElement("input");

        inputField_two.setAttribute("type", "number");
        inputField_two.setAttribute("class", "form-control");
        inputField_two.setAttribute("placeholder", "MaxQty");
        inputField_two.setAttribute("min", "1");

        divElement_two.appendChild(inputField_two);






        var divElement_three = document.createElement("div");
        divElement_three.setAttribute("class", "col-md-4");

        var inputField_three = document.createElement("input");

        inputField_three.setAttribute("type", "number");
        inputField_three.setAttribute("class", "form-control");
        inputField_three.setAttribute("placeholder", "UnitPrice");
        inputField_three.setAttribute("min", "1");

        divElement_two.appendChild(inputField_three);



        $(".customer_choice_options_types_wrap_child").append(divElement);
        $(".customer_choice_options_types_wrap_child").append(divElement_two);
        $(".customer_choice_options_types_wrap_child").append(divElement_three);
    }

    </script>

@endpush
