
@extends('seller.Layout.master')
@section('title', 'Edit Product Page')
@section('body')
@include('modal.common')
    <div class="row mt-5">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title text-bold">Edit Product</h3>
                    <a href="{{ route('product.index') }}" class="btn btn-primary my-1 mx-2 text-center">All Product</a>
                </div>
                <div class="card-body">
                    <form class="" action="{{ route('product.update') }}" method="post" enctype="multipart/form-data" id="choice_form">
                        @csrf
                        <input type="hidden" name="product_type" value="{{ $product->product_type }}">
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <div class="row mb-4">
                            <label for="name" class="col-md-3 form-label">Product Name <span
                                    class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" id="name" value="{{ $product->name }}"
                                    name="name" placeholder="Product name"/>
                                <b><span class="text-danger">{{ $errors->first('name') }}</span></b>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="category_id" class="col-md-3 form-label">Category Name <span
                                    class="text-danger">*</span></label>
                            <div class="col-md-9 form-group">
                                <select name="category_id" class="form-control select2 select2-show-search form-select"
                                    data-placeholder="Select Category" id="category" >
                                    <option value="" disabled selected> -- Select Category --</option>
                                    @forelse($parent_categories as $parent_category)
                                        <?php
                                        $dashes = '';
                                        ?>

                                        @for ($i = 1; $i <= $parent_category->level; $i++)
                                            <?php
                                            $dashes = str_repeat('-', $i);
                                            ?>
                                        @endfor
                                        <option value="{{ $parent_category->id }}"
                                            @if ($parent_category->id == $product->category_id) @selected(true) @endif>
                                            {{ $dashes }} {{ $parent_category->name }} </option>
                                    @empty
                                        <option class="text-center text-danger"> --No Category--</option>
                                    @endforelse
                                </select>
                                <b><span class="text-danger">{{ $errors->first('category_id') }}</span></b>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label">Brand Name <span
                                    class="text-danger">*</span></label>
                            <div class="col-md-9 form-group">
                                <select name="brand_id" class="form-control select2 select2-show-search form-select"
                                    data-placeholder="Select Brand" >
                                    <option value="" disabled selected> -- Select Brand --</option>
                                    @forelse($brands as $brand)
                                        <option value="{{ $brand->id }}"
                                            @if ($brand->id == $product->brand_id) selected @endif> {{ $brand->name }} </option>
                                    @empty
                                        <option class="text-center text-danger"> --No Brand--</option>
                                    @endforelse
                                </select>
                                <b><span class="text-danger">{{ $errors->first('brand_id') }}</span></b>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="bar_code" class="col-md-3 form-label">Bar Code <span
                                    class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ $product->bar_code }}" name="bar_code" id="bar_code"
                                    placeholder="Bar code" type="text" />
                                <b><span class="text-danger">{{ $errors->first('bar_code') }}</span></b>
                            </div>
                        </div>
                        <div class="row mb-4" id="product_price">
                            <label for="" class="col-md-3 form-label"> Product Price<span
                                class="text-danger">*</span></label>
                                <div class="col-md-9">
                                    <input class="form-control" value="{{ $product->product_price }}" name="product_price" min="0" step=".01" placeholder="0.01" type="text"/>
                                    <b><span class="text-danger">{{ $errors->first('product_price') }}</span></b>
                                </div>
                            </div>
                            <input type="hidden" class="form-control" name="product_select" value="single_product" readonly>
                                <div class="row mb-4" id="">
                                    <label for="" class="col-md-3 form-label">Product Stock <span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <input class="form-control" value="{{ $product->product_stock }}" name="product_stock" id="" placeholder="1" min="1" type="number"/>
                                        <b><span class="text-danger">{{$errors->first('product_stock')}}</span></b>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="" class="col-md-3 form-label">Select Prouduct</label>
                                    <div class="col-md-9 form-group">
                                        <input type="hidden" class="form-control" name="product_select" value="{{$product->product_select}}"
                                            readonly>

                                        <select name="product_select" class="form-control select2 select2-show-search form-select"
                                            data-placeholder="Select Product" onchange="productSelect(this)" disabled>
                                            <option value="single_product"
                                                @if ($product->product_select == 'single_product') @selected(true) @endif>Single Product
                                            </option>
                                            <option value="product_variation"
                                                @if ($product->product_select == 'product_variation') @selected(true) @endif>Product
                                                Variation</option>
                                        </select>
                                    </div>
                                </div>


                                @if ($product->product_select == 'product_variation')
                        <input type="hidden" class="form-control" name="product_select" value="product_variation" readonly>

                            <div class="row mb-4">
                                <label for="" class="col-md-3 form-label">Product Color<span class="text-danger"></span></label>
                                <div class="col-md-9 form-group">
                                <select class="form-control color_multiple select2 select2-show-search" data-live-search="true" name="colors[]" id="colors" multiple data-placeholder="Nothing Selected">
                                    @foreach ($colors as $key => $color)
                                    <option value="{{ $color->code }}" @if(in_array($color->code, json_decode($product->colors))) selected @endif>
                                        <span>{{ $color->name }}</span>
                                    </option>

                                    @endforeach
                                </select>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="" class="col-md-3 form-label">Product Attribute <span class="text-danger"></span></label>
                                <div class="col-md-9 form-group">
                                    <select name="choice_attributes[]" id="choice_attributes"  class="form-control color_multiple select2 select2-show-search" multiple data-placeholder="Choose Attributes">
                                        @foreach (\App\Models\Attribute::all() as $key => $attribute)
                                        <option value="{{ $attribute->id }}" @if($product->attributes !== null && in_array($attribute->id, json_decode($product->attributes, true))) selected @endif>{{ $attribute->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            @foreach (json_decode($product->choice_options) as $key => $choice_option)
                            <div class="customer_choice_options" id="customer_choice_options">
                            <div class="row mb-4">
                            <label for="" class="col-md-3 form-label">Size</label>
                                <div class="col-md-9 form-group">
                                        <select class="form-control color_multiple attribute_choice color_multiple select2 select2-show-search" data-live-search="true" name="choice_options_{{ $choice_option->attribute_id }}[]" multiple data-placeholder="Nothing Selected">
                                                @foreach (\App\Models\AttributeValue::where('attribute_id', $choice_option->attribute_id)->get() as $row)
                                                <option value="{{ $row->value }}" @if( in_array($row->value, $choice_option->values)) selected @endif>
                                                    {{ $row->value }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <input type="hidden" name="choice_no[]" value="{{ $choice_option->attribute_id }}">
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            <div class="row mb-4">
                                <div class="customer_choice_options" id="customer_choice_options"></div>
                            </div>
                            <div class="row mb-4">
                                <div class="sku_combination table-reponsive" id="sku_combination"></div>
                            </div>
                        @endif

                        <div class="row mb-4" id="prodcut_image">
                            <label for="" class="col-md-3 form-label" >Product Image</label>
                            <div class="col-md-9 test_class">
                                <div class="input-group openImageModal" data-multiple="false">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                    </div>
                                    <div class="form-control bannerFile-amount" id="product_imageFileAmount">Choose file</div>
                                </div>
                                <div class="row d-flex" id="product_imageData">
                                    <div class="position-relative d-flex">
                                        <div class="imgs m-1">
                                            @if(isset($product->product_image))
                                                <span class="btn btn-danger btn-sm position-absolute rmSingleimg" id="" style="float: left">&times;</span>
                                                <img width="100" height="100" class="img" src="{{asset($product->product_image)}}" alt="">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="shipping_cost" class="col-md-3 form-label">Shipping Cost <span class="text-danger">*</span> </label>
                            <div class="col-md-9">
                                <input class="form-control" id="shipping_cost" value="{{ $product->shipping_cost }}"
                                    name="shipping_cost" placeholder="0.01" min="0" step=".01" type="number" />
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

                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label">Other Images</label>
                            <div class="col-md-9 test_class">
                                <div class="input-group openImageModal" data-multiple="true">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                    </div>
                                    <div class="form-control bannerFile-amount" id="product_imageFileAmount">Choose file</div>
                                </div>

                                <div class="row d-flex" id="multipleImgData">
                                    <div class="position-relative d-flex" id="imageContainer">
                                        @if(isset($otherImages))
                                            @foreach($otherImages as $value)
                                                <div class="imgs m-1">
                                                    <span class="btn btn-danger btn-sm position-absolute rmMultipleImg" id="" style="float: left">&times;</span>
                                                    <img width="100" height="100" class="img" src="{{asset($value->file)}}" alt="">
                                                    <input type="hidden" id="multipleImgItemId" name="image[]" value="{{ $value->id }}" required>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>

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
                                    <option value="1" {{ $product->refund == 1 ? 'selected' : '' }}>Refundable
                                    </option>
                                    <option value="0" {{ $product->refund == 0 ? 'selected' : '' }}>
                                        Non-Refundable
                                    </option>
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
                        <button class="btn btn-primary float-end" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    $(document).ready(function (){
        // start image select modal 
        $(document).on('click','.openImageModal', function(e) {
            e.preventDefault();
            var multiple = $(this).data('multiple');

            if(multiple === true){
                var url ="{{ route('multipleSection') }}";
            }else{
                var url ="{{ route('singleSelection') }}";
            }
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'html',
                success: function(response) {
                    $("div#common_modal").html(response).modal("show");
                },
                error: function(xhr, status, error) {
                console.error(error);
                }
            });
        });
        // end image select modal 

        update_sku();

        $('#colors').on('change', function() {
            update_sku();
        });

        $('#choice_attributes').on('change', function() {
            $.each($("#choice_attributes option:selected"), function(j, attribute){
                flag = false;
                $('input[name="choice_no[]"]').each(function(i, choice_no) {
                    if($(attribute).val() == $(choice_no).val()){
                        flag = true;
                    }
                });
                if(!flag){
                    add_more_customer_choice_option($(attribute).val(), $(attribute).text());
                }
            });

            var str = @php echo $product->attributes @endphp;

            $.each(str, function(index, value){
                flag = false;
                $.each($("#choice_attributes option:selected"), function(j, attribute){
                    if(value == $(attribute).val()){
                        flag = true;
                    }
                });
                if(!flag){
                    $('input[name="choice_no[]"][value="'+value+'"]').parent().parent().remove();
                }
            });
        });

        $(document).on("change", ".attribute_choice", function() {
            update_sku();
        });


        function update_sku() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url:'{{ route('products-sku-combination-edit') }}',
                data: $('#choice_form').serialize(),
                success: function(data) {
                    $('#sku_combination').html(data);
                }
            });
        }

        function add_more_customer_choice_option(i, name) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: '{{ route('products.add-more-choice-option') }}',
                data: {
                    attribute_id: i
                },
                success: function(data) {
                    var obj = JSON.parse(data);

                    var selectHtml =`
                        <div class="row mb-4" id="product_size">
                              <label for="" class="col-md-3 form-label">Size<span class="text-danger"></span></label>
                                <div class="col-md-9 form-group">
                                    <input type="hidden" name="choice_no[]" value="${i}">
                                    <select id="mySelect" class="form-control size_multiple attribute_choice select2 select2-show-search" name="choice_options_${i}[]" multiple data-placeholder="Nothing Selected">
                                        <option value="">${obj}</option>
                                    </select>
                                </div>
                            </div>
                        `;
                        $('#customer_choice_options').html(selectHtml);
                        $('#mySelect').select2();
                }
            });
        }

        
    });
</script>
@endpush