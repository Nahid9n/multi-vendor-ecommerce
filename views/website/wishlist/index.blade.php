@extends('website.layout.app')
@section('title','Wishlist')
@section('body')


<section class="product_all mt-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-2 col-lg-2 pro_display">
                    <div class="pro_all_sidebar">
                        <div class="cat_sidebar">
                            <ul>
                                <li class="comon"><a href="#">Category<i style="margin-left:40%;"  class="fa fa-angle-up"></i></a></li>
                                @foreach($categories as $category)
                                    <li><a href="{{route('product.by.category',$category->name)}}">{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="brand_sidebar">
                            <ul>
                                <li class="comon"><a href="#">Brands<i style="margin-left:40%;"  class="fa fa-angle-up"></i></a></li>
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
                                <div class="col-lg-4 cart_item" title="{{ $loop->iteration }}">
                                    <div class="card">
                                        <div class="card-header border-0 p-0 m-0 text-center">
                                            <a href="{{route('product.details',$pro->slug)}}">
                                                <img src="{{ asset($product->product->product_image) }}" class="p-0 w-100" alt="a" />
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
                                            <a class="" href="{{route('product.details',$product->slug)}}">{{$product->product->name}}</a>
                                            <p class="">Brand: {{$product->product->brand->name}}</p>

                                            @if($product->product->product_select == 'product_variation')
                                            <p>Color: {{$product->color}}</p>
                                            <p>Size: {{$product->size}}</p>
                                            @endif

                                            <div class="ratings d-flex justify-content-end hidden-sm">
                                                <abbr title="Add to cart" class="d-flex align-items-center">
                                                @if($product->product->product_select == 'single_product')
                                                    <button onclick="productModalSingleProduct({{ $product->id }})" class="productModal" id="{{ $product->id }}" href="javascript:void(0)" class="navbar-brand mx-2"><i class="price-text-color fa fa-2x fa-shopping-cart"></i></button>
                                                @else
                                                    <button onclick="productModal({{ $product->id }})" class="productModal" id="{{ $product->id }}" href="javascript:void(0)" class="navbar-brand mx-2"><i class="price-text-color fa fa-2x fa-shopping-cart"></i></button>
                                                @endif
                                                </abbr>
                                                <abbr title="Add to Wishlist">
                                                    <a class="navbar-brand mx-2" href="{{ route('wishlist.destroy', $product->id)}}"><i class="price-text-color fa fa-trash"></i></a>
                                                </abbr>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            @if(count($products) < 1)
                                @include('empty-space')
                            @endif
                        </div>
                    </div>
                    <!---section gallery top sell part3 end--->
                </div>
            </div>
        </div>
    </section>

@endsection
