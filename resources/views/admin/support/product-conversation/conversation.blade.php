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
                <div class="card-header row border-bottom">
                    <div class="col-6">
                        <h3 class="card-title">{{$product->name}}</h3>
                    </div>
                    <div class="col-6">
                        <a href="{{route('product.conversation')}}" class="btn btn-success my-1 float-end mx-2 text-center">All Product Conversation</a>
                    </div>
                </div>
                <div class="card-body overflow-hidden">
                    <div class="example">
                            <div class="media mt-0">
                                <div class="media-body overflow-hidden text-muted">
                                    <h6><a href="#">{{$con->user->name ??''}} </a></h6>
                                    <p class="text-primary">{{$con->header }}</p>
                                    <p class="font-xs">{{date_format($con->created_at,'d M, Y h:m a')}}</p>
                                    <hr>
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            @foreach($conversations as $conversation)
                                                <div class="d-grid {{$conversation->sender_id == auth()->user()->id ? 'justify-content-end':'justify-content-start'}} ">
                                                    <div class="media ms-5 my-1">
                                                        <div class="media-body overflow-hidden text-muted">
                                                            <h6 class="{{$conversation->sender_id == auth()->user()->id ? 'text-end':'text-start'}}">{{ $conversation->sender->name }}</h6>
                                                            <p class="{{$conversation->sender_id == auth()->user()->id ? 'text-end':'text-start'}} text-success">{{$conversation->message}}</p>
                                                            <p class="{{$conversation->sender_id == auth()->user()->id ? 'text-end':'text-start'}}">{{date_format($conversation->created_at,'d M, Y h:m a')}}</p>
                                                        </div>
                                                    </div>
                                                    <form class="my-1 ms-5 {{$conversation->sender_id == auth()->user()->id ? 'text-end':'text-start'}}" action="{{route('product.conversation.delete',$conversation->id)}}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" onclick="return confirm('are you sure to delete ?')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                                    </form>
                                                </div>
                                                <hr class="ms-5">
                                            @endforeach
                                                <form action="{{route('product.conversation.reply')}}" class="ms-5 my-3" method="post">
                                                    @csrf
                                                    <input type="hidden" name="conversation_id" value="{{$con->id}}" readonly>
                                                    <input type="hidden" name="receiver_id" value="{{$con->user_id}}" readonly>
                                                    <textarea name="message" class="form-control" id="" cols="30" rows="3" placeholder="reply"></textarea>
                                                    <div class="mb-3 w-50">

                                                        <div class="">
                                                            <button type="submit" class="btn btn-success px-5 my-2 input-group-btn input-group-text">send reply <i class="fa mx-1 fa-arrow-circle-o-right"></i></button>
                                                        </div>
                                                    </div>
                                                </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
