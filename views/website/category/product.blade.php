@extends('website.layout.app')
@section('title','Category Product Page')

@section('body')
    <section class="home_all">
        <div class="container">
            <div class="row">
                <div class="home_alls">
                    <ul>
                        <li><a target="blank" href="{{route('home')}}">Home</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                        <li><a target="blank" href="">All Products By Category</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--product_all section start-->
    <section class="product_all mt-4">
        <div class="container-fluid">
            <p class="" style="font-size: 16px; font-weight: 700; line-height: 19px; color:#000000; margin-left: 26%; margin-bottom: 30px;">PRODUCTS BY CATEGORY</p>
            <div class="row">
                <div class="col-xl-2 col-lg-2 pro_display">
                    <div class="pro_all_sidebar">
                        <div class="cat_sidebar">
                            <ul>
                                <li class="comon"><a href="#">Category<i style="margin-left:40%;"  class="fa fa-angle-up"></i></a></li>
                                <li><a href="#">Mobile accessory</a></li>
                                <li><a href="#">Electronics</a></li>
                                <li><a href="#">Smartphones </a></li>
                                <li><a href="#">Modern tech </a></li>
                                <li class="all"><a href="#">See all </a></li>
                            </ul>
                        </div>
                        <div class="brand_sidebar">
                            <ul>
                                <li class="comon"><a href="#">Brands<i style="margin-left:40%;"  class="fa fa-angle-up"></i></a></li>
                                <li><input type="checkbox">Samsung</li>
                                <li><input type="checkbox">Apple</li>
                                <li><input type="checkbox">Huawei</li>
                                <li><input type="checkbox">Pocco</li>
                                <li ><input type="checkbox">Lenovo</li>
                                <li class="all"><a href="#">See all </a></li>
                            </ul>
                        </div>
                        <div class="feat_sidebar brand_sidebar">
                            <ul>
                                <li class="comon"><a href="#">Features<i style="margin-left:40%;"  class="fa fa-angle-up"></i></a></li>
                                <li><input type="checkbox">Metallic</li>
                                <li><input type="checkbox">Plastic cover</li>
                                <li><input type="checkbox">8GB Ram</li>
                                <li><input type="checkbox">Super power</li>
                                <li ><input type="checkbox">Large Memory</li>
                                <li class="all"><a href="#">See all </a></li>
                            </ul>
                        </div>
                        <div class="range_sidebar mb-3">
                            <a href="#">Price range<i style="margin-left:30%;"  class="fa fa-angle-up"></i></a>
                            <div class="pro_range_slider">
                                <div class="pro_progress"></div>
                            </div>
                            <div class="pro_range_input">
                                <input type="range" class="pro_range_min" min="0" max="10000" value="2500" step="100">
                                <input type="range" class="pro_range_max" min="0" max="10000" value="7500" step="100">
                            </div>
                            <div class="pro_price_input">
                                <div class="pro_field">
                                    <span>min</span>
                                    <input type="number" class="pro_input_min mt-2" value="2500">
                                </div>
                                <div class="pro_field ml-5">
                                    <span>max</span>
                                    <input type="number" class="pro_input_max mt-2" value="7500">
                                </div>
                            </div>
                            <button class="btn btt">apply</button>
                        </div>
                        <div class="condition_sidebar brand_sidebar">
                            <ul>
                                <li class="comon"><a href="#">Condition<i style="margin-left:40%;"  class="fa fa-angle-up"></i></a></li>
                                <li><input type="radio">Any</li>
                                <li><input type="radio">Refurbished</li>
                                <li><input type="radio">Brand new</li>
                                <li><input type="radio">Old items</li>
                            </ul>
                        </div>
                        <div class="ratings_sidebar brand_sidebar">
                            <ul>
                                <li class="comon"><a href="#">Ratings<i style="margin-left:40%;"  class="text-dark fa fa-angle-up"></i></a></li>
                                <li><input type="checkbox">
                                    <i class=" fa fa-star"></i>
                                    <i class=" fa fa-star"></i>
                                    <i class=" fa fa-star"></i>
                                    <i class=" fa fa-star"></i>
                                    <i class=" fa fa-star"></i>
                                </li>
                                <li><input type="checkbox">
                                    <i class=" fa fa-star"></i>
                                    <i class=" fa fa-star"></i>
                                    <i class=" fa fa-star"></i>
                                    <i class=" fa fa-star"></i>
                                    <i class=" fa fa-star-o"></i>
                                </li>
                                <li><input type="checkbox">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </li>
                                <li><input type="checkbox">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-10 col-lg-10">
                    <!---section gallery top sell part3 start--->
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="items itemss">
                            @foreach($products as $product)
                                <div class="col-xl-3 my-2 col-lg-3 col-md-3 col-sm-6">
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
                                            <p class="">Category: {{$product->category->name}}</p>
                                            <!-- <div class="ratings d-flex justify-content-end hidden-sm">
                                                <abbr title="Add to cart" class="d-flex align-items-center"><a class="productAddToCart" id="{{ $product->id }}" href="javascript:void(0)" class="navbar-brand mx-2"><i class="price-text-color fa fa-2x fa-shopping-cart"></i></a></abbr>
                                                <abbr title="Add to Wishlist"><a href="javascript:void(0)" class="navbar-brand mx-2"><i class="price-text-color fa fa-1x fa-heart"></i></a></abbr>
                                            </div> -->
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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

    <!--icon section start-->
    <section class="icons_part icons_part1">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-2 col-lg-2  col-xs-12 col-sm-12 empty1">
                    <div class="empty"></div>
                </div>
                <div class="col-xl-2 col-lg-2  col-xs-12 col-sm-12 supp">
                    <div class="icon_t">
                        <p>TERMS & CONDITIONS</p>
                        <img src="img/icon1_.svg" alt="">
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2  col-xs-12 col-sm-12 supp">
                    <div class="icon_t">
                        <p>RETURN & REFUND POLICY</p>
                        <img src="img/icon2_.svg" alt="">
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2  col-xs-12 col-sm-12 supp">
                    <div class="icon_t">
                        <p>SUPPORT POLICY</p>
                        <img src="img/icon3_.svg" alt="">
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2  col-xs-12 col-sm-12 supp">
                    <div class="icon_t">
                        <p>PRIVACY
                            POLICY</p>
                        <img src="img/icon4_.svg" alt="">
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2  col-xs-12 col-sm-12 empty">
                    <div class="empty"></div>
                </div>
            </div>
        </div>
    </section>

@endsection
