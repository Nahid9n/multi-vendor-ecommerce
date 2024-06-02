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
                    <h3 class="card-title">{{$product->name}}</h3>
                </div>
                <div class="card-body overflow-hidden">
                    <div class="example">
                        @foreach($reviews as $review)
                        <div class="media mt-0">
                            <div class="media-body overflow-hidden text-muted">
                                <div class="row">
                                    <div class="col-11">
                                        <h6 class="text-primary fw-bold"><a href="#">{{$review->user->name ??''}} </a></h6>
                                        <p class="text-secondary">Rating :
                                            @if(isset($review))
                                                @if($review->rating == 1)
                                                    <i class = 'fa fa-star '></i>
                                                @elseif($review->rating == 2)
                                                    <i class = 'fa fa-star '></i>
                                                    <i class = 'fa fa-star'></i>
                                                @elseif($review->rating == 3)
                                                    <i class = 'fa fa-star '></i>
                                                    <i class = 'fa fa-star'></i>
                                                    <i class = 'fa fa-star'></i>
                                                @elseif($review->rating == 4)
                                                    <i class = 'fa fa-star '></i>
                                                    <i class = 'fa fa-star'></i>
                                                    <i class = 'fa fa-star'></i>
                                                    <i class = 'fa fa-star'></i>
                                                @elseif($review->rating == 5)
                                                    <i class = 'fa fa-star '></i>
                                                    <i class = 'fa fa-star'></i>
                                                    <i class = 'fa fa-star'></i>
                                                    <i class = 'fa fa-star'></i>
                                                    <i class = 'fa fa-star'></i>
                                                @endif
                                            @endif
                                        </p>
                                        <p class="font-xs">{{date_format($review->created_at,'d M, Y h:m a')}}</p>
                                    </div>
                                    <div class="col-1 d-flex justify-content-center align-items-center">
                                        <a href="{{route('product.review.show.images',$review->id)}}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                        <form class="my-1" action="{{route('product.review.delete',$review->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" onclick="return confirm('are you sure to delete ?')" class="btn btn-sm btn-danger mx-2"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


