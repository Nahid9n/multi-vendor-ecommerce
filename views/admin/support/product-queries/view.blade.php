@extends('admin.master')
@section('title','Product Queries')
@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Product Queries Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Product Queries</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">view</a></li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row row-deck mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title text-blod">Comment Customer</h3>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{route('customer.store.queries')}}" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <input type="hidden" name="user_id" value="{{auth()->user()->id ?? ''}}">
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <textarea class="form-control w-100" name="question" id="question" cols="30" rows="4" placeholder="Write Comment"></textarea>
                                <b><span class="text-danger">{{$errors->first('name')}}</span></b>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-sm px-4 float-end" type="submit">send Comment <i class="fa mx-1 fa-arrow-circle-o-right"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">{{$product->name}}</h3>
                </div>
                <div class="card-body overflow-hidden">
                    <div class="example">
                        @foreach($queries as $query)
                        <div class="media mt-0 {{$query->user_id == auth()->user()->id ? 'justify-content-end':'justify-content-start'}} ">
                            <img class="avatar avatar-lg rounded-circle brround me-3" src="{{asset('/')}}uploads/01703913865.jpg" alt="Generic placeholder image">
                            <div class="media-body overflow-hidden text-muted">
                                <h6><a href="#">{{$query->user->name ??''}} </a></h6>
                                <p class="text-primary">{{$query->question }}</p>
                                <p class="font-xs">{{$query->created_at}}</p>
                                <hr>
                                @foreach($query->replies as $key=>$reply)
                                <div class="media my-1">
                                    <img class="avatar avatar-lg rounded-circle me-3" src="{{asset('/')}}uploads/01703913865.jpg" alt="Generic placeholder image">
                                    <div class="media-body overflow-hidden text-muted">
                                        <h6><a href="#">{{$reply->user->name ??''}} </a></h6>
                                        <p class="text-success">{{$reply->reply}}</p>
                                        <p>{{$reply->created_at}}</p>
                                    </div>
                                    <div class="">
                                        <a class="btn btn-sm btn-primary" href="" data-bs-toggle="modal" data-bs-target="#queryReplyEdit{{$key}}"><i class="fa fa-edit"></i></a>
                                        <form class="my-1" action="{{route('admin.product.queries.delete',$reply->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" onclick="return confirm('are you sure to delete ?')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </div>
                                    <div class="modal fade" id="queryReplyEdit{{$key}}" tabindex="-1" role="dialog" aria-labelledby="queryReplyEditModalLabel{{$key}}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="queryReplyEditModalLabel{{$key}}">{{$product->name}}</h5>
                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-left">
                                                    <div class="container type_message">
                                                        <div class="chat-container">
                                                            <form id="review-form{{$key}}" action="{{route('admin.update.reply',$reply->id)}}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="user_id" value="{{ auth()->user()->id ?? '' }}">
                                                                <input type="hidden" name="product_id" value="{{$reply->product_id}}">
                                                                <input type="hidden" name="queries_id" value="{{$query->id}}">
                                                                <div class="form-group">
                                                                    <textarea class="form-control" name="reply" placeholder="Type message..." required>{{$reply->reply}}</textarea>
                                                                </div>
                                                                <button type="submit" class="btn btn-primary">Send</button>
                                                            </form>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                    <hr>
                                @endforeach
                                <form action="{{route('admin.product.queries.reply')}}" class="input-group" method="post">
                                    @csrf
                                    <input type="hidden" name="queries_id" value="{{$query->id}}" readonly>
                                    <input type="hidden" name="product_id" value="{{$product->id}}" readonly>
                                    <div class="input-group mb-3 w-50">
                                        <input type="text" class="form-control" placeholder="reply" name="reply"  aria-label="Recipient's username" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-success px-5 input-group-btn input-group-text">send reply <i class="fa mx-1 fa-arrow-circle-o-right"></i></button>
                                        </div>
                                    </div>
                                </form>
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


