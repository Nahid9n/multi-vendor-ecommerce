<style>
    /*Slider Responsive start*/
    @media (min-width: 475px) {
        .sliderHeight {
            height: 20vh;
        }
        .imageResponsive {
            width: 100%;
            height: 20vh;
        }

    }
    @media (min-width: 600px) {
        .sliderHeight {
            height: 32vh;
        }
        .imageResponsive {
            width: 100%;
            height: 32vh;
        }

    }

    @media (min-width: 996px){
        .sliderHeight {
            height: 70vh;
        }
        .imageResponsive {
            width: 100%;
            height: 70vh;
        }
    }
    @media (min-width: 1134px){
        .sliderHeight {
            height: 70vh;
        }
        .imageResponsive {
            width: 100%;
            height: 70vh;
        }
    }
    /*Slider Responsive end*/

    /*Slider and category div order start*/
    @media (max-width: 1200px) {
        .sliderdiv {
            display: flex;
            /*flex-direction: column;*/
            flex-direction: row;
        }

        #item1 {
            order: 2;
        }

        #item2 {
            order: 1;
        }
    }
</style>
<section class="slider-area">
    <div class="container-fluid">
        <div class="row sliderdiv">
            <div id="item1" class="col-xl-2 catitem">
                <div class="all_category">
                    <p class="text-bold">Category</p>
                    <hr>
                    <ul>
                        @foreach($categories as $category)
                            @php
                                $c =   App\Models\Product::where('category_id',$category->id)->where('status',1)->count();
                            @endphp
                            <li class="aut"><a href="{{route('product.by.category',$category->name)}}">{{$category->name}} ({{$c}})</a></li>
                        @endforeach
                        <li target="blank" class="all"><a href="{{route('all-categories')}}">All category</a></li>
                    </ul>
                </div>
            </div>
            <div id="item2" class="col-xl-10 col-lg-12 col-md-12 padding-0">
                <div id="demo" class="carousel slide sliderHeight" data-ride="carousel">
                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        @foreach($banners as $banner)
                            <li data-target="#demo" data-slide-to="0"></li>
                        @endforeach
                    </ul>

                    <!-- The slideshow -->
                    <div class="carousel-inner sliderHeight">
                        @foreach($slider1 as $slider)
                            <div class="carousel-item active">
                                <img class="imageResponsive" src="{{asset($slider->image)}}" alt="slider">
                                <div class="ban-button">
                                    <a href="#">Shop Now</a>
                                </div>
                            </div>
                        @endforeach
                        @foreach($sliders as $slider)
                            <div class="carousel-item">
                                <img class="imageResponsive" src="{{asset($slider->image)}}" alt="slider" >
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
