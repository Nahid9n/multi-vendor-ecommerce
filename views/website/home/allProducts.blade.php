@extends('website.layout.app')
@section('title','All Products')

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

    .breadcrumb {
        background: initial;
    }
</style>

<section class="home_all">
    <div class="container">
        <div class="row">
            <div class="home_alls">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All products</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<section class="product_all mt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-2 col-lg-2 pro_display">
                <div class="pro_all_sidebar">
                    <div class="cat_sidebar">
                        <ul>
                            <li class="comon"><a href="#">Category<i style="margin-left:40%;" class="fa fa-angle-up"></i></a></li>
                            @foreach($categories as $category)
                            <li><a href="{{route('product.by.category',$category->name)}}">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="brand_sidebar">
                        <ul>
                            <li class="comon"><a href="#">Brands<i style="margin-left:40%;" class="fa fa-angle-up"></i></a></li>
                            @foreach($brands as $brand)
                            <li><a href="{{route('product.by.brand',$brand->name)}}">{{$brand->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-10 col-lg-10">
                <!---section gallery top sell part3 start--->
                <div class="row" style="margin-bottom: 20px;">
                    <div class="items itemss">
                        @foreach($products as $product)
                        <div class="col-lg-2 cart_item" title="{{ $loop->iteration }}">

                            <div class="card">
                                <div class="card-header border-0 p-0 m-0 text-center">
                                    <a href="{{route('product.details',$product->slug)}}">
                                        <img src="{{asset($product->product_image)}}" class="p-0 w-100" alt="a" />
                                    </a>
                                </div>
                                <div class="card-body">
                                    <div class="ratings hidden-sm">
                                        <i class="price-text-color fa fa-star"></i>
                                        <i class="price-text-color fa fa-star"></i>
                                        <i class="price-text-color fa fa-star"></i>
                                        <i class="price-text-color fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>

                                    </div>
                                    <a class="" href="{{route('product.details',$product->slug)}}">{{ truncateWords($product->name, 14) }}</a>
                                    <p class="">Brand: {{$product->brand->name}}</p>
                                        @if (isset($product->product_stock))
                                            @if ($product->product_stock <=0)
                                                <p class="text-danger">Out of Stock</p>
                                            @else
                                                @if ($product->product_select)
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
                                                @endif
                                            @endif
                                        @endif
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    @if(count($products)>0)
                    <div style="margin: 0 auto; width: 100%; text-align: center;">
                        <button id="see_more" class="loginBtn">See more</button>
                        <img id="loader" src="{{ asset('website/assets/image/loader.gif')}}">
                    </div>
                    @else
                    @include('empty-space')
                    @endif

                </div>
                <!---section gallery top sell part3 end--->
            </div>
        </div>
    </div>
</section>

@endsection
