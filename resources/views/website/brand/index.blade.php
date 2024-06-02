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
                <div class="col-xl-12 col-lg-12">
                    <!---section gallery top sell part3 start--->
                    <div class="row justify-content-center">
                        <div class="col-xl-10 col-lg-10">
                            <section class="home_all">
                                <div class="row">
                                    <div class="home_alls">
                                        <ul>
                                            <li><a target="blank" href="{{ route('home') }}">Home</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                            <li><a target="blank" href="">All Brands</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </section>
                            <p class="" style="font-size: 16px; font-weight: 700; line-height: 19px; color:#000000; margin-left: 40%; margin-bottom: 10px;">All Brands</p>
                            <hr>
                            <div class="row" style="margin-bottom: 20px;">
                                @foreach($brands as $brand)
                                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-6 colsm6 brand_item">
                                        <div class="card card-body text-center" style="height: 180px">
                                            <div class="m-0">
                                                <a href="{{route('product.by.brand',$brand->name)}}">
                                                    @if($brand->logo != null)
                                                        <img src="{{asset($brand->logo)}}" alt="a" width="100" height="100"/>
                                                    @else
                                                        <img src="{{ asset('/no_image.jpg') }}" alt="a" width="100" height="100"/>
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="info">
                                                {{--<div class="ratings hidden-sm ">
                                                    <i class="price-text-color fa fa-star"></i>
                                                    <i class="price-text-color fa fa-star"></i>
                                                    <i class="price-text-color fa fa-star"></i>
                                                    <i class="price-text-color fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>--}}
                                                <a class="nav-link" href="{{route('product.by.brand',$brand->name)}}">{{$brand->name}}</a>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="row d-grid justify-content-center">
                                {{$brands->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
