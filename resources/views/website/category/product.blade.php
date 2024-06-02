@extends('website.layout.app')
@section('title','Category Product Page')

@section('body')

    <!--product_all section start-->
    <section class="product_all mt-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-2 col-lg-3 col-5 pro_display">
                    <div class="pro_all_sidebar">
                        <div class="brand_sidebar">
                            <ul>
                                <li class="comon">
                                    <a data-toggle="collapse" href="#categoryContent" aria-expanded="true" aria-controls="collapseExample">Category<i style="margin-left:40%;" class="fa fa-angle-up"></i></a>
                                    <div class="collapse show" id="categoryContent">
                                        @foreach($categories as $category)
                                        <div class="form-check">
                                            <input type="checkbox" id="{{ $category->id }}" onclick="filter()" class="form-check-input categoryCheckBox" {{$category->name == $slug ? 'checked':''}} value="{{ $category->name }}">
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
             {{--           <div class="brand_sidebar">
                            <ul>
                                <li class="comon">
                                    <a data-toggle="collapse" href="#sizeContent" aria-expanded="true" aria-controls="collapseExample">Size<i style="margin-left:40%;" class="fa fa-angle-up"></i></a>
                                    <div class="collapse show" id="sizeContent">
                                        @foreach($sizes as $size)
                                        <div class="form-check">
                                            <input type="checkbox" onclick="filter()" class="form-check-input sizeCheckBox" value="{{ $size->name }}">
                                            <label class="form-check-label">{{ $size->name }}</label>
                                        </div>
                                        @endforeach
                                    </div>
                                </li>
                            </ul>
                        </div>
                        --}}
                        <div class="brand_sidebar">
                            <ul>
                                <li class="comon">
                                    <a data-toggle="collapse" href="#colorContent" aria-expanded="true" aria-controls="collapseExample">Color<i style="margin-left:40%;" class="fa fa-angle-up"></i></a>
                                    <div class="collapse show" id="colorContent">
                                        @foreach($colors as $color)
                                            <div class="form-check">
                                                <input type="checkbox" onclick="filter()" class="form-check-input colorCheckBox" value="{{ $color->code }}">
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
                                                <input style="display: block" type="range" class="custom-range" min="0" max="10000" step="1" onchange="filter()">
                                                <div style="display: grid; grid-template-columns: repeat(2, 1fr);">
                                                    <div class="text-left"><span>0</span>.{{$currency->symbol ?? ''}} </div>
                                                    <div class="text-right"><span id="maxRange">10000</span> .{{$currency->symbol ?? ''}}</div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-10 col-lg-9 col-7">
                    <p class="fw-bold text-center">ALL PRODUCTS BY CATEGORY</p>
                    <hr>
                    <!---section gallery top sell part3 start--->
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="items itemss">
                            @forelse($products as $product)
                                <div class="col-xl-3 my-2 col-lg-4 col-md-6 col-sm-6 colsm6">
                                    <div class="card" style="height: 450px">
                                        <div class="card-header border-0 p-0 m-0 text-center">
                                            <a href="{{route('product.details',$product->slug)}}">
                                                @if($product->product_image != '')
                                                    <img src="{{asset($product->product_image)}}" class="p-0" width="200" height="200" alt="a" />
                                                @else
                                                    <img src="{{asset('/no_image.jpg')}}" class="p-0" width="200" height="200" alt="a" />
                                                @endif
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
                                            <p class="">Category: {{$product->category->name}}</p>
                                            <p class="">Brand: {{$product->brand->name}}</p>
                                            <p class="">Price : {{$product->product_price}} {{$currency->symbol ?? ''}}</p>

                                            <!-- <div class="ratings d-flex justify-content-end hidden-sm">
                                                <abbr title="Add to cart" class="d-flex align-items-center"><a class="productAddToCart" id="{{ $product->id }}" href="javascript:void(0)" class="navbar-brand mx-2"><i class="price-text-color fa fa-2x fa-shopping-cart"></i></a></abbr>
                                                <abbr title="Add to Wishlist"><a href="javascript:void(0)" class="navbar-brand mx-2"><i class="price-text-color fa fa-1x fa-heart"></i></a></abbr>
                                            </div> -->
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-danger text-bold">No Product Found !!</p>
                            @endforelse
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="">
                            <p>{{$products->links()}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--product_all section end-->

@endsection
