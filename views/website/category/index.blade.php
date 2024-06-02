@extends('website.layout.app')
@section('title','Category Page')

@section('body')

    <section class="home_all">
        <div class="container">
            <div class="row">
                <div class="home_alls">
                    <ul>
                        <li><a target="blank" href="{{route('home')}}">Home</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                        <li><a target="blank" href="{{route('category')}}">All Categories</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--product_all section start-->
    <section class="product_all">
        <div class="container-fluid">
            <p style="font-size: 16px; font-weight: 700; line-height: 19px; color:#000000; margin-left: 26%; margin-bottom: 30px;">ALL CATEGORIES</p>
            <div class="row">
                <div class="col-xl-2 col-lg-2 pro_display">
                    <div class="pro_all_sidebar">
                        <div class="cat_sidebar">
                            <ul>
                                <li class="comon"><a href="#">Category<i style="margin-left:40%;"  class="fa fa-angle-up"></i></a></li>
                                @foreach($categories as $category)
                                    <li><a href="{{route('product',['id'=>$category->id])}}">{{$category->name}}</a></li>
                                @endforeach
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
                            @foreach($categories as $category)
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 colsm6 ">
                                <div class="card card-body">
                                    <div class="m-0 p-0">
                                        <a href="{{route('product.by.category',$category->name)}}" target="blank">
                                            <img src="{{asset($category->banner)}}" class="img-fluid w-100" alt="a" />
                                        </a>
                                    </div>
                                    <div class="info">
                                        <div class="ratings hidden-sm ">
                                            <i class="price-text-color fa fa-star"></i>
                                            <i class="price-text-color fa fa-star"></i>
                                            <i class="price-text-color fa fa-star"></i>
                                            <i class="price-text-color fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <a class="nav-link" href="{{route('product.by.category',$category->name)}}">{{$category->name}}</a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                    </div>
                    <!---section gallery top sell part3 end--->
                    <!--page pagination--->
                    <div class="row bg-white pagination">
                        <div class="product-pagination mt-5 bg-white">
                            <nav>
                                <ul class="pagination">
                                    <li class="page-item disabled " aria-disabled="true" aria-label="« Previous">
                                        <span class="page-link" aria-hidden="true">‹</span>
                                    </li>
                                    <li class="page-item active" aria-current="page">
                                        <span class="page-link ">1</span>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link text-dark" target="blank" href="{{route('home')}}">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link text-dark" target="blank" href="{{route('home')}}">3</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link text-dark" target="blank" href="{{route('home')}}">4</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link text-dark" target="blank" href="{{route('home')}}">5</a>
                                    </li>
                                    <li class="page-item pagcom">
                                        <a class="page-link text-dark" target="blank" href="{{route('home')}}">6</a>
                                    </li>
                                    <li class="page-item pagcom">
                                        <a class="page-link text-dark" target="blank" href="{{route('home')}}">7</a>
                                    </li>
                                    <li class="page-item pagcom">
                                        <a class="page-link text-dark" target="blank" href="{{route('home')}}">8</a>
                                    </li>
                                    <li class="page-item pagcom">
                                        <a class="page-link text-dark" target="blank" href="{{route('home')}}">9</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link text-dark" href="{{route('home')}}" rel="next" aria-label="Next »">›</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!--page pagination--->
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
