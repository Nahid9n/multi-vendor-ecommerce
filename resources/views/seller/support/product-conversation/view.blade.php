@extends('admin.master')
@section('title','Product Conversation')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Product Conversation Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Product Conversation</a></li>
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
                        @foreach($conversations as $conversation)
                        <div class="media mt-0">
                            <div class="media-body overflow-hidden text-muted">
                                <div class="row">
                                    <div class="col-10">
                                        <h6 class="text-primary"><a href="#">{{$conversation->user->name ??''}} </a></h6>
                                        <p class="text-dark">{{$conversation->header }}</p>
                                        <p class="font-xs">{{$conversation->created_at}}</p>
                                    </div>
                                    <div class="col-2 d-flex justify-content-center align-items-center">
                                        <a href="{{route('product.conversation.show.details',$conversation->id)}}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                        <form class="my-1" action="{{route('product.start.conversation.delete',$conversation->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" onclick="return confirm('are you sure to delete ?')" class="btn btn-sm mx-2 btn-danger"><i class="fa fa-trash"></i></button>
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


