@extends('website.layout.app')
@section('title')
    {{$rule->name}}
@endsection
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
                            <li class="breadcrumb-item">{{$rule->name}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>


    <section class="product_all mt-4">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <h2 class="text-center">{{ $rule->name }}</h2>
                            <hr>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-xl-12 col-lg-12">
                            <p class="text-dark">{!! $rule->contents !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

