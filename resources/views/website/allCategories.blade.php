@extends('website.layout.app')
@section('title','Category Page')
@section('body')
<section class="product_all mt-4">
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
                                        <li><a target="blank" href="">All Categories</a></li>
                                    </ul>
                                </div>
                            </div>
                        </section>
                        <p class="" style="font-size: 16px; font-weight: 700; line-height: 19px; color:#000000; margin-left: 40%; margin-bottom: 10px;">ALL CATEGORIES</p>
                        <hr>
                        <!---section gallery top sell part3 start--->
                            <div class="row" style="margin-bottom: 20px;">
                                @foreach($categories as $category)
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 colsm6">
                                    <div class="card card-body text-center mb-5" style="height: 180px;">
                                        <div class="m-0 p-0">
                                            <a href="{{route('product.by.category',$category->name)}}">
                                                @if ($category->banner !='')
                                                    <img src="{{asset($category->banner)}}" width="100" height="100" class="p-0" alt="a" />
                                                @else
                                                    <img src="{{ asset('/no_image.jpg') }}" width="100" height="100" class="p-0" alt="a" />

                                                @endif
                                            </a>
                                        </div>
                                        <div class="info">
                                            <a class="nav-link" href="{{route('product.by.category',$category->name)}}">{{$category->name}}</a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="row justify-content-center">
                                {{$categories->links()}}
                            </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </section>
    <!--product_all section end-->

@endsection
