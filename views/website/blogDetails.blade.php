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

    .blog_item{
        margin-bottom: 30px;
    }

    .read_more_btn{
        width: max-content;
        margin-top: 15px;
    }

    .blog_item h4{
        padding: 10px 0;
    }

    .description{
        color: #000000b5;
    }

    .date{
        line-height: 46px;
        font-size: 13px;
    }

    .category_link{

    }
</style>

<section class="home_all">
    <div class="container">
        <div class="row">
            <div class="home_alls">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="{{ route('blog') }}">Blogs</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $blogDetails->title }}</li>
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
                            <li class="comon"><a href="#">Categories<i style="margin-left:40%;" class="fa fa-angle-up"></i></a></li>
                            @foreach($blogs_categories as $blogs_category)
                            <li><a href="">{{ $blogs_category->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-10 col-lg-10">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <h1>{{ $blogDetails->title }}</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 text-center">
                        <img class="img-fluid" src="{{ asset($blogDetails->banner) }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        {!! $blogDetails->long_description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection