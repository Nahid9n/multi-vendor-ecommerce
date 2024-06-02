@extends('website.layout.app')
@section('title','All Categories')

@section('body')

<style>
    .breadcrumb {
        background: initial;
    }

    .brand_item {
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
                        <li class="breadcrumb-item active" aria-current="page">All Categories</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<section class="product_all mt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-2 col-lg-2 pro_display">
                <div class="pro_all_sidebar">

                    <div class="brand_sidebar">
                        <ul>
                            <li class="comon"><a href="#">Brands<i style="margin-left:40%;" class="fa fa-angle-up"></i></a></li>
                            @foreach($brands as $brand)
                            <li><a href="{{route('product.by.brand',$brand->name)}}">{{$brand->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-10 col-lg-10">
                <!---section gallery top sell part3 start--->

                <div class="row justify-content-center">
                    @foreach($categories as $category)
                    <div class="col-lg-2 col-md-2">
                        <div class="card m-0 card-body text-center">
                            <div class="">
                                <a href="{{ route('product.by.category', $category->id) }}">
                                    <img src="{{ asset($category->banner) }}" width="200" height="200" alt="no image">
                                </a>
                            </div>
                            <div>
                                <a class="category_name" href="{{ route('product.by.category', $category->id) }}"><p>{{$category->name}}</p></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row my-4 justify-content-center">
                    <div class="">
                        <p>{{$categories->links()}}</p>
                    </div>
                </div>

                <!---section gallery top sell part3 end--->
            </div>
        </div>
    </div>
</section>

@endsection
