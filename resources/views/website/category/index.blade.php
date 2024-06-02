@extends('website.layout.app')
@section('title', 'Category Page')

@section('body')
    <section class="product_all">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
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
                    <p class=""style="font-size: 16px; font-weight: 700; line-height: 19px; color:#000000; margin-left: 40%; margin-bottom: 10px;">
                        ALL CATEGORY</p>
                    <!---section gallery top sell part3 start--->
                    <div class="row" style="margin-bottom: 20px;">
                        @forelse($categories as $category)
                            <div class="col-xl-2 my-2 col-lg-3 col-md-3 col-sm-6">
                                <div class="card card-body mb-5">
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
                        @empty
                            <p class="text-danger text-bold px-2">No Categroy Found</p>
                        @endforelse
                    </div>
                </div>
                <p>{{ $categories->links() }}</p>
            </div>
    </section>
    <!--product_all section end-->
@endsection
