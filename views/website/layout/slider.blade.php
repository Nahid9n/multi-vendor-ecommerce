<section class="slider-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-2 catitem">
                <div class="all_category">
                    <ul>
                        @foreach($categories as $category)
                            @php
                                $c =   App\Models\Product::where('category_id',$category->id)->where('status',1)->count();
                            @endphp
                            <li class="aut"><a href="{{route('product.by.category',$category->name)}}">{{$category->name}} ({{$c}})</a></li>
                        @endforeach
                        <li target="blank" class="all"><a target="blank" href="{{route('category')}}">All category</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-10 col-lg-10 col-md-10 banitems padding-0">
                <div id="demo" class="carousel slide" data-ride="carousel" style="height: 70vh">
                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        @foreach($banners as $banner)
                            <li data-target="#demo" data-slide-to="0"></li>
                        @endforeach
                    </ul>

                    <!-- The slideshow -->
                    <div class="carousel-inner b_banner">
                        @foreach($slider1 as $slider)
                            <div class="carousel-item active">
                                <img class="img-fluid" width="100" src="{{asset($slider->image)}}" alt="slider">
                                <div class="ban-button">
                                    <a href="#">Shop Now</a>
                                </div>
                            </div>
                        @endforeach
                        @foreach($sliders as $slider)
                            <div class="carousel-item">
                                <img src="{{asset($slider->image)}}" alt="slider" width="100%" >
                            </div>
                        @endforeach
                    </div>

                    <!-- Left and right controls -->
                    <a class="carousel-control-prev d-flex" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next d-flex" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
