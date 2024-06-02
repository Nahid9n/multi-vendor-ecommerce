<style>

.paddingCustom{
    padding-left: 0px;
    padding-right: 0px;
}

.card.m-0.card-body.categories{
    min-height: 153px;
    margin-bottom: 10px!important;
    background: #fbfbfb;
}

.brands{
    margin-bottom: 10px!important;
    border: 1px solid #0000001a;
    padding: 0 10px;
    border-radius: 2%;
}

.categories img{
    max-width: 100px;
}

.row_custom{
    display: grid;
    grid-template-columns: repeat(12, 1fr);
    grid-auto-rows: 1fr;
    grid-column-gap: 9px;
    grid-row-gap: 0;
    text-align: center;
}

.row_custom_two{
    display: grid;
    grid-template-columns: repeat(10, 1fr);
    grid-auto-rows: 1fr;
    grid-column-gap: 9px;
    grid-row-gap: 0;
    text-align: center;
}

.section_spacing{
    margin-top: 70px;
}


.top_seling_product .slick-prev{
    left: 40px;
    z-index: 1;
}

.top_seling_product .slick-next{
    right: 40px;
}

.slick-next{
    background: url("{{ asset('uploads/arrow-right.png') }}");
    background-repeat: no-repeat;
    background-size: 100%;
}

.slick-prev{
    background: url("{{ asset('uploads/arrow-left.png') }}");
    background-repeat: no-repeat;
    background-size: 100%;
}

.slick-prev:hover{
    background: url("{{ asset('uploads/arrow-left-hover.png') }}");
    background-repeat: no-repeat;
    background-size: 100%;
}

.slick-next:hover{
    background: url("{{ asset('uploads/arrow-right-hover.png') }}");
    background-repeat: no-repeat;
    background-size: 100%;
}

.top_seller_items{
    margin-bottom: 30px;
}

@media  (max-width: 1817px){
    .row_custom {
        grid-template-columns: repeat(10, 1fr);
    }
}
@media  (max-width: 1515px){
    .row_custom {
        grid-template-columns: repeat(8, 1fr);
    }
}

@media  (max-width: 1230px){
    .row_custom {
        grid-template-columns: repeat(4, 1fr);
    }
}

@media  (max-width: 820px){
    .row_custom {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media  (max-width: 575px){
    .row_custom {
        grid-template-columns: repeat(1, 1fr);
    }
}

@media  (max-width: 768px){
    .top_seller_items{
        max-width: 77%;
        margin: 0 auto;
    }
}
@media  (max-width: 575px){
    .top_seller_items{
        max-width: 100%;
    }
}

</style>
<div class="container-fluid">
<!--Categories start-->

<section class="section_spacing">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 pb-10 paddingCustom">
                <div class="row">
                    <div class="col-lg-6 text-left"><h4>Feature Categories</h4></div>
                    <div class="col-lg-6 text-right"><a href="{{ route('all-categories') }}"><p>View all</p></a></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 paddingCustom">
                <div class="row_custom">

                    @foreach($categories as $category)
                    <div class="cat_items">
                        <div class="card m-0 card-body categories">
                            <div class="">
                                <a href=""><img src="{{ asset($category->banner) }}" class="img-fluid" alt="no image"></a>
                            </div>
                            <div>
                                <a class="category_name" href=""><p>{{ $category->name }}</p></a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>

<!--Categories end-->

<!--Brands start-->

<section class="section_spacing">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 pb-10 paddingCustom">
                <div class="row">
                    <div class="col-lg-6 text-left"><h4>Feature Brands</h4></div>
                    <div class="col-lg-6 text-right"><a href="{{ route('brand')}}"><p>View all</p></a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="brand">

        @foreach($brands as $brand)
        <div class="paddingCustom brands">
            <div class="m-0">
                <div class="">
                    <a href=""><img src="{{ asset($brand->logo) }}" class="img-fluid" alt="no image"></a>
                </div>
            </div>
        </div>
        @endforeach

        @foreach($brands as $brand)
        <div class="paddingCustom brands">
            <div class="m-0">
                <div class="">
                    <a href=""><img src="{{ asset($brand->logo) }}" class="img-fluid" alt="no image"></a>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</section>

<!--Brands end-->

<!--Top Seller start-->

{{--<section class="section_spacing">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 pb-10 paddingCustom">
                <div class="row">
                    <div class="col-lg-6 text-left"><h4>Top Seller</h4></div>
                    <div class="col-lg-6 text-right"><a href=""><p>View all</p></a></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 paddingCustom">
                <div class="row">
                    <div class="col-xl-2 col-lg-3 col-md-4 col-12 top_seller_items">
                        <div class="card">
                            <div class="card-body text-center">

                                <img class="top_seller_img img-fluid" src="{{ asset('uploads/top-seller/1.jpg') }}">
                                <p class="top_seller_head">Lavish Look</p>

                                <div class="rating">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                </div>

                                <a class="visit_store" href="">
                                    <p><i class="fa fa-chevron-right" aria-hidden="true"></i>Visit Store</p>
                                </a>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-12 top_seller_items">
                        <div class="card">
                            <div class="card-body text-center">

                                <img class="top_seller_img img-fluid" src="{{ asset('uploads/top-seller/2.jpg') }}">
                                <p class="top_seller_head">Lavish Look</p>

                                <div class="rating">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                </div>

                                <a class="visit_store" href="">
                                    <p><i class="fa fa-chevron-right" aria-hidden="true"></i>Visit Store</p>
                                </a>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-12 top_seller_items">
                        <div class="card">
                            <div class="card-body text-center">

                                <img class="top_seller_img img-fluid" src="{{ asset('uploads/top-seller/3.jpg') }}">
                                <p class="top_seller_head">Lavish Look</p>

                                <div class="rating">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                </div>

                                <a class="visit_store" href="">
                                    <p><i class="fa fa-chevron-right" aria-hidden="true"></i>Visit Store</p>
                                </a>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-12 top_seller_items">
                        <div class="card">
                            <div class="card-body text-center">

                                <img class="top_seller_img img-fluid" src="{{ asset('uploads/top-seller/4.jpg') }}">
                                <p class="top_seller_head">Lavish Look</p>

                                <div class="rating">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                </div>

                                <a class="visit_store" href="">
                                    <p><i class="fa fa-chevron-right" aria-hidden="true"></i>Visit Store</p>
                                </a>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-12 top_seller_items">
                        <div class="card">
                            <div class="card-body text-center">

                                <img class="top_seller_img img-fluid" src="{{ asset('uploads/top-seller/5.jpg') }}">
                                <p class="top_seller_head">Lavish Look</p>

                                <div class="rating">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                </div>

                                <a class="visit_store" href="">
                                    <p><i class="fa fa-chevron-right" aria-hidden="true"></i>Visit Store</p>
                                </a>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-12 top_seller_items">
                        <div class="card">
                            <div class="card-body text-center">

                                <img class="top_seller_img img-fluid" src="{{ asset('uploads/top-seller/6.jpg') }}">
                                <p class="top_seller_head">Lavish Look</p>

                                <div class="rating">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                </div>

                                <a class="visit_store" href="">
                                    <p><i class="fa fa-chevron-right" aria-hidden="true"></i>Visit Store</p>
                                </a>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>--}}

<!--Top Seller  end-->

<!--Top Selling Product start-->

<section class="top_selling section_spacing">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 pb-10 paddingCustom">
                <div class="row">
                    <div class="col-lg-6 text-left"><h4>Top Selling Product</h4></div>
                    <div class="col-lg-6 text-right"><a href=""><p>View all</p></a></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 paddingCustom">
                <div class="row top_seling_product">

                    @foreach($allPrducts as $product)
                        <div class="col-lg-2">
                            <div class="card">
                                <div class="card-body text-center">
                                    <span class="discount_tag">0%</span>
                                    <div class="action_home">
                                        @if($product->product_select == 'single_product')
                                            <a class="addToWish" href="{{ route('add-to-wishlist', $product->id )}}"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                            <span onclick="productModalSingleProduct({{ $product->id }})" class="addToCart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                                        @else
                                            <span onclick="productModalWish({{ $product->id }})" class="addToWish"><i class="fa fa-heart" aria-hidden="true"></i></span>
                                            <span onclick="productModal({{ $product->id }})" class="addToCart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                                        @endif
                                    </div>
                                    <a href="{{ route('product.details', $product->id) }}"><img class="img-fluid" src="{{ asset($product->product_image) }}"></a>
                                    <a href="{{ route('product.details', $product->id) }}"><p class="product_description">{{ $product->name }}</p></a>
                                    <a href="{{ route('product.details', $product->id) }}"><p class="top_selling_price">${{ $product->product_price }}</p></a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
<!--Top Product Selling  end-->


<!--All Products start-->

<section class="top_selling section_spacing">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 pb-10 paddingCustom">
                <div class="row">
                    <div class="col-lg-6 text-left"><h4>All Products</h4></div>
                    <div class="col-lg-6 text-right"><a href="{{ route('all-product') }}"><p>View all</p></a></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 paddingCustom">
                <div class="row">
                    @foreach($allPrducts as $product)
                        <div class="col-lg-2 col-md-4 col-12 top_seller_items">
                            <div class="card">
                                <div class="card-body text-center">
                                    <span class="discount_tag">0%</span>
                                    <div class="action_home">

                                        @if($product->product_select == 'single_product')
                                            <a class="addToWish" href="{{ route('add-to-wishlist', $product->id )}}"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                            <span onclick="productModalSingleProduct({{ $product->id }})" class="addToCart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                                        @else
                                            <span onclick="productModalWish({{ $product->id }})" class="addToWish"><i class="fa fa-heart" aria-hidden="true"></i></span>
                                            <span onclick="productModal({{ $product->id }})" class="addToCart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                                        @endif

                                    </div>
                                    <div class="action">
                                        <span class="addToWish"><i class="fa fa-heart" aria-hidden="true"></i></span>
                                        <span class="addToCart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                                    </div>
                                    <a href="{{ route('product.details', $product->id) }}"><img class="img-fluid" src="{{ asset($product->product_image) }}"></a>
                                    <a href="{{ route('product.details', $product->id) }}"><p class="product_description">{{ $product->name }}</p></a>
                                    <a href="{{ route('product.details', $product->id) }}"><p class="top_selling_price">${{ $product->product_price }}</p></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>


<!--All Products end-->

</div>
