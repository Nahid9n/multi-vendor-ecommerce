@extends('admin.master')
@section('title','Product Review')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Product Review Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Product Review</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">view</a></li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
{{--                    <h3 class="card-title">{{$review->name}}</h3>--}}
                </div>
                <div class="card-body overflow-hidden">
                    <div class="example">
                        <div class="media mt-0">
                            <div class="media-body overflow-hidden text-muted">
                                <div class="row">
                                    <div class="col-11">
                                        <h6 class="text-primary fw-bold"><a href="#">Name : {{$review->user->name ??''}} </a></h6>
                                        <p class="text-dark rating">Ratings : @if(isset($review))
                                                @if($review->rating == 1)
                                                    <i class = 'fa fa-star '></i>
                                                @elseif($review->rating == 2)
                                                    <i class = 'fa fa-star text-danger'></i>
                                                    <i class = 'fa fa-star text-danger'></i>
                                                @elseif($review->rating == 3)
                                                    <i class = 'fa fa-star text-danger'></i>
                                                    <i class = 'fa fa-star text-danger'></i>
                                                    <i class = 'fa fa-star text-danger'></i>
                                                @elseif($review->rating == 4)
                                                    <i class = 'fa fa-star text-danger'></i>
                                                    <i class = 'fa fa-star text-danger'></i>
                                                    <i class = 'fa fa-star text-danger'></i>
                                                    <i class = 'fa fa-star text-danger'></i>
                                                @elseif($review->rating == 5)
                                                    <i class = 'fa fa-star text-danger'></i>
                                                    <i class = 'fa fa-star text-danger'></i>
                                                    <i class = 'fa fa-star text-danger'></i>
                                                    <i class = 'fa fa-star text-danger'></i>
                                                    <i class = 'fa fa-star text-danger'></i>
                                                @endif
                                            @endif</p>
                                        <p class="text-dark">Comment : {{$review->comment }}</p>
                                        <p class="font-xs">Date : {{date_format($review->created_at,'d M, Y h:m a')}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row my-3 text-center justify-content-center">
                            <h3 class="fw-bold">Images</h3>
                            @if(isset($images))
                                @foreach($images as $image)
                                    <img src="{{asset($image)}}" alt="" class="img-fluid m-1 w-25">
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


