@extends('website.layout.app')
@section('title','Brands')

@section('body')

<style>
    .breadcrumb{
        background: initial;
    }

    .brand_item{
        margin-bottom: 30px;
    }
</style>

    <section class="home_all">
        <div class="container">
            <div class="row">
                <div class="home_alls">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Brands</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!--product_all section start-->
    <section class="product_all">
        <div class="container-fluid">
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

                    </div>
                </div>
                <div class="col-xl-10 col-lg-10">
                    <!---section gallery top sell part3 start--->
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="items itemss">
                            @foreach($brands as $brand)
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 colsm6 brand_item">
                                <div class="card card-body text-center">
                                    <div class="m-0">
                                        <a href="{{route('product.by.brand',$brand->name)}}" target="blank">
                                            <img src="{{asset($brand->logo)}}" alt="a" />
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
                                        <a class="nav-link" href="{{route('product.by.category',['id'=>$brand->id])}}">{{$brand->name}}</a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="">
                            <p>{{$brands->links()}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--product_all section end-->

@endsection
