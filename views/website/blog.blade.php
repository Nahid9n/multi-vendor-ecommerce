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
                        <li class="breadcrumb-item active" aria-current="page">Blogs</li>
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

                    @foreach($blogs as $blog)
                    <div class="col-lg-3 blog_item">
                        <div class="card m-0 card-body">                            
                            <a href="{{ route('blog-details', $blog->slug) }}"><img class="img-fluid" src="{{ asset($blog->banner) }}"></a>
                            <div>
                                <a href="{{ route('blog-details', $blog->slug) }}"><h4 class="title">{{ $blog->title }}</h4></a>                             
                            </div>                                
                            <div>
                                <p class="description">{{ $blog->short_description }}</p>
                                <small class="date">{{ $blog->created_at }}</small>
                                <br>
                                <a href="{{ route('blog-details', $blog->slug) }}" class="category_link">{{ $blog->category->name }}</a>
                                <br>
                                <button class="btn read_more_btn">Read more</button>
                            </div>                                
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>


@endsection