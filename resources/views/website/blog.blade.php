@extends('website.layout.app')
@section('title','All Blogs')

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
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-10">
                <div class="row">
                    @foreach($blogs as $blog)
                    <div class="col-lg-3 blog_item">
                        <div class="card m-0 card-body" style="height: 550px;">
                            <a href="{{ route('blog-details', $blog->slug) }}">
                                @if($blog->banner != '')
                                    <img src="{{asset($blog->banner)}}" class="p-0" width="300" height="220" alt="a" />
                                @else
                                    <img src="{{asset('/no_image.jpg')}}" class="p-0" width="300" height="220" alt="a" />
                                @endif
                            </a>
                            <div>
                                <a href="{{ route('blog-details', $blog->slug) }}"><h4 class="title">{{ truncateWords($blog->title, 14) }}</h4></a>
                            </div>
                            <div>
                                <p class="description">{{ truncateWords($blog->short_description, 17) }}</p>
                                <small class="date">{{ date_format($blog->created_at,'d M, Y H:m A') }}</small>
                                <br>
                                <a href="{{ route('blog-details', $blog->slug) }}" class="category_link">{{ $blog->category->name }}</a>
                                <br>
                                <a href="{{ route('blog-details', $blog->slug) }}" class="btn read_more_btn">Read more</a>
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
