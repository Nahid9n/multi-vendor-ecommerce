<div class="modal-header">
    <h2>{{ $product->name }}</h2>
    <span class="modal_close" onclick="closeModal()">&times;</span>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-lg-6"><img class="img-fluid" src="{{ asset($product->product_image) }}"></div>
        <div class="col-lg-6">

            <div class="price_div">
                <p class="text-dark">Selling Price : $<span id="p_price" class="product_model_price">{{ $product->product_price }}</span></p>
                <!--<p class=" text-dark">Regular Price : <del>${{$product->regular_price}}</del></p> -->
            </div>

            <div class="color_part">
                <p>Colors :</p>
                <div class="d-flex">

                    <div>
                        <label>
                            <select name="color" class="form-control products_colors color" id="{{ $product->id }}" onchange="getVariantPrice()">
                                @foreach (json_decode($product->colors) as $color)
                                <option class="form-control" value="{{ get_single_color_name($color) }}">{{ get_single_color_name($color) }}<span class="radio-btn  mx-1"></span></option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                </div>
            </div>


            <div class="size_part">
                <p>Size :</p>

                <div class="">
                    <label for="size">
                        <select name="size" class="form-control size" id="products_size" onchange="getVariantPrice()">
                            @foreach (json_decode($product->choice_options) as $choice)
                            <option>{{ get_single_attribute_name($choice->attribute_id) }}</option>
                            @foreach ($choice->values as $value)
                            <option value="{{ $value }}">{{ $value }}</option>
                            @endforeach
                            @endforeach
                        </select>
                    </label>
                </div>
            </div>

            <div class="row">
                <div class=" p-2 shadow-none shadow-0 border-0">
                    <div class="decrease unit3 col-lg-3 col-md-3 col-sm-4 col-xs-4">
                        <div class="pro_qun pro-ratee " style="display: none;">
                            <p>Quantity</p>
                        </div>
                        <div class="pro_counter">
                            <span style="border-radius: 4px 0px 0px 4px;" class="down" onClick='decreCount(event, this)'>-</span>
                            <input type="number" name="quantity" value="1" class="form-control" min="1" placeholder="0">
                            <span class="qty-increase" class="up" onClick='increCount(event, this)'>+</span>
                            <!-- <a href="#" class="btn btn-sm mx-1"><i class="fa fa-heart"></i></a> -->
                            <button onclick="productAddToWishlistVariant({{$product->id}})" class="btn btn-sm mx-1" type="button"><i class="fa fa-heart"></i></button>
                            <button onclick="productAddToCart(this)" id="" class="btn btn-sm variant_id" type="submit">Add to card</button>
                        </div>

                    </div>

                </div>
            </div>


        </div>


    </div>
</div>

<script>
function getVariantPrice(){

        var size = $('.size').val();
        var color = $('.color').val();
        var product_id = "{{ $product->id }}";

        $.ajax({
            url: '{{ route("get-variant-product-price") }}',
            type: 'GET',
            data: {
                size: size,
                color: color,
                product_id: product_id
            },
            success: function(response) {

                if (response.price) {
                    $('#p_price').text(response.price);
                    $('#total_vp_price').val(response.price);
                    $('.variant_id').attr('id', response.variant_id);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });

    }
</script>
