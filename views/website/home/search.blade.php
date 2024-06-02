@extends('website.layout.app')
@section('title','Search...')

@section('body')

<style>
    #loader {
        height: 30px;
        width: 30px;
        display: flex;
        text-align: center;
        margin: 0 auto;
        display: none;
    }

    .modal-backdrop {
        z-index: 9999;
    }

    .sizeCheckBox,
    .colorCheckBox,
    .categoryCheckBox,
    .brandCheckBox {
        display: block;
        width: initial;
        height: initial;
        top: 2px;
    }

    .range_filter{
        width: calc(100% - 10px);
    }
</style>

<section class="product_all mt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-2 col-lg-2 pro_display">
                <div class="pro_all_sidebar">

                    <div class="brand_sidebar">
                        <ul>
                            <li class="comon">
                                <a data-toggle="collapse" href="#categoryContent" aria-expanded="true" aria-controls="collapseExample">Category<i style="margin-left:40%;" class="fa fa-angle-up"></i></a>
                                <div class="collapse show" id="categoryContent">
                                    @foreach($categories as $category)
                                    <div class="form-check">
                                        <input type="checkbox" id="{{ $category->id }}" onclick="filter()" class="form-check-input categoryCheckBox" value="{{ $category->name }}">
                                        <label class="form-check-label">{{ $category->name }}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="brand_sidebar">
                        <ul>
                            <li class="comon">
                                <a data-toggle="collapse" href="#brandContent" aria-expanded="true" aria-controls="collapseExample">Brand<i style="margin-left:40%;" class="fa fa-angle-up"></i></a>
                                <div class="collapse show" id="brandContent">
                                    @foreach($brands as $brand)
                                    <div class="form-check">
                                        <input type="checkbox" id="{{ $brand->id }}" onclick="filter()" class="form-check-input brandCheckBox" value="{{ $brand->name }}">
                                        <label class="form-check-label">{{ $brand->name }}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="brand_sidebar">
                        <ul>
                            <li class="comon">
                                <a data-toggle="collapse" href="#sizeContent" aria-expanded="true" aria-controls="collapseExample">Size<i style="margin-left:40%;" class="fa fa-angle-up"></i></a>
                                <div class="collapse show" id="sizeContent">
                                    @foreach($sizes as $size)
                                    <div class="form-check">
                                        <input type="checkbox" onclick="filter()" class="form-check-input sizeCheckBox" value="{{ $size->id }}">
                                        <label class="form-check-label">{{ $size->name }}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </li>
                        </ul>
                    </div>


                    <div class="brand_sidebar">
                        <ul>
                            <li class="comon">
                                <a data-toggle="collapse" href="#colorContent" aria-expanded="true" aria-controls="collapseExample">Color<i style="margin-left:40%;" class="fa fa-angle-up"></i></a>
                                <div class="collapse show" id="colorContent">
                                    @foreach($colors as $color)
                                    <div class="form-check">
                                        <input type="checkbox" onclick="filter()" class="form-check-input colorCheckBox" value="{{ $color->id }}">
                                        <label class="form-check-label">{{ $color->name }}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </li>
                        </ul>
                    </div>



                    <div class="brand_sidebar">
                        <ul>
                            <li class="comon">
                                <a data-toggle="collapse" href="#priceRangeContent" aria-expanded="true" aria-controls="collapseExample">Price Range<i style="margin-left:40%;" class="fa fa-angle-up"></i></a>
                                <div class="collapse show" id="priceRangeContent">

                                    <div class="container">
                                        <div class="form-group range_filter">
                                            <input style="display: block" type="range" class="custom-range" min="0" max="5000" step="1" onchange="filter()">
                                            <div style="display: grid; grid-template-columns: repeat(2, 1fr);">
                                                <div class="text-left">$0</div>
                                                <div class="text-right">$<span id="maxRange">5000</span></div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </li>
                        </ul>
                    </div>


                </div>
            </div>
            <div class="col-xl-10 col-lg-10">

                @if($_GET['keyword'] != null)
                <h5>Search result for"<?= (isset($_GET['keyword'])) ? $_GET['keyword'] : '' ?>"</h5>
                @endif

                <div class="row" style="margin-bottom: 20px;">
                    <div class="items itemss">
                        @if(count($products)> 0)
                        @foreach($products as $product)
                        <div class="col-lg-4 cart_item" title="{{ $loop->iteration }}">
                            <div class="card">
                                <div class="card-header border-0 p-0 m-0 text-center">
                                    <a href="{{route('product.details',$product->slug)}}">
                                        <img src="{{asset($product->product_image)}}" class="p-0 w-100" alt="a" />
                                    </a>
                                </div>
                                <div class="card-body">
                                    <div class="ratings hidden-sm ">
                                                <p>
                                                    @php
                                                        $reviews =   App\Models\ProductReview::where('product_id',$product->id)->where('status',1)->get();
                                                        $review = 0;
                                                        $starTotal = 0;
                                                        if (count($reviews) != 0 ){
                                                            $starTotal = 0;
                                                            foreach ($reviews as $review){
                                                                $starTotal = $starTotal + $review->rating;
                                                            }
                                                            $review = $starTotal / count($reviews);
                                                        }
                                                    @endphp
                                                    @if(isset($review))
                                                        @if($review == 0)
                                                            <i class="fa fa-star text-secondary"></i>
                                                            <i class="fa fa-star text-secondary"></i>
                                                            <i class="fa fa-star text-secondary"></i>
                                                            <i class="fa fa-star text-secondary"></i>
                                                            <i class="fa fa-star text-secondary"></i>
                                                        @elseif($review >= 1 && $review < 2)
                                                            <i class="fa fa-star text-danger"></i>
                                                            <i class="fa fa-star text-secondary"></i>
                                                            <i class="fa fa-star text-secondary"></i>
                                                            <i class="fa fa-star text-secondary"></i>
                                                            <i class="fa fa-star text-secondary"></i>
                                                        @elseif($review >= 2 && $review < 3)
                                                            <i class="fa fa-star text-danger"></i>
                                                            <i class="fa fa-star text-danger"></i>
                                                            <i class="fa fa-star text-secondary"></i>
                                                            <i class="fa fa-star text-secondary"></i>
                                                            <i class="fa fa-star text-secondary"></i>
                                                        @elseif($review >= 3 && $review < 4)
                                                            <i class="fa fa-star text-danger"></i>
                                                            <i class="fa fa-star text-danger"></i>
                                                            <i class="fa fa-star text-danger"></i>
                                                            <i class="fa fa-star text-secondary"></i>
                                                            <i class="fa fa-star text-secondary"></i>
                                                        @elseif($review >= 4 && $review < 5)
                                                            <i class="fa fa-star text-danger"></i>
                                                            <i class="fa fa-star text-danger"></i>
                                                            <i class="fa fa-star text-danger"></i>
                                                            <i class="fa fa-star text-danger"></i>
                                                            <i class="fa fa-star text-secondary"></i>
                                                        @elseif($review == 5)
                                                            <i class="fa fa-star text-danger"></i>
                                                            <i class="fa fa-star text-danger"></i>
                                                            <i class="fa fa-star text-danger"></i>
                                                            <i class="fa fa-star text-danger"></i>
                                                            <i class="fa fa-star text-danger"></i>
                                                        @endif
                                                    @endif
                                                    <span> ({{count($reviews) ?? 0 }})</span>
                                                </p>
                                            </div>
                                    <a class="" href="{{route('product.details',$product->slug)}}">{{ truncateWords($product->name, 14) }}</a>
                                    <p class="">Brand: {{$product->brand->name}}</p>
                                    <div class="ratings d-flex justify-content-end hidden-sm">
                                        <abbr title="Add to cart" class="d-flex align-items-center">
                                        @if($product->product_select == 'single_product')
                                            <button onclick="productModalSingleProduct({{ $product->id }})" class="productModal" id="{{ $product->id }}" href="javascript:void(0)" class="navbar-brand mx-2"><i class="price-text-color fa fa-2x fa-shopping-cart"></i></button>
                                        @else
                                            <button onclick="productModal({{ $product->id }})" class="productModal" id="{{ $product->id }}" href="javascript:void(0)" class="navbar-brand mx-2"><i class="price-text-color fa fa-2x fa-shopping-cart"></i></button>
                                        @endif
                                        </abbr>
                                        <abbr title="Add to Wishlist">
                                            @if($product->product_select == 'single_product')
                                                <a class="addToWish navbar-brand mx-2" href="{{ route('add-to-wishlist', $product->id )}}"><i class="price-text-color fa fa-1x fa-heart"></i></a>
                                            @else
                                                <button onclick="productModalWish({{ $product->id }})" class="productModal navbar-brand mx-2" id="{{ $product->id }}" href="javascript:void(0)"><i class="price-text-color fa fa-1x fa-heart"></i></button>
                                            @endif
                                        </abbr>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        @include('empty-space')
                        @endif
                    </div>


                    @if(count($products) > 0)
                        @if(isset($products))
                            <div id="seeMoreBtn" style="margin: 0 auto; width: 100%; text-align: center;">
                                <button id="seeMoreBtn" onclick="seeMoreFilter()" class="loginBtn">See More</button>
                                <img id="loader" src="{{ asset('website/assets/image/loader.gif')}}">
                            </div>
                        @endif
                    @endif
                </div>

            </div>
        </div>
    </div>
</section>


@endsection
