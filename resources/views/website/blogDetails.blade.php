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
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-10">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 text-center">
                        <img style="object-fit: cover" src="{{ asset($blogDetails->banner) }}">
                    </div>
                    <div class="col-xl-5 col-lg-8">
                        <h3>Title : {{ $blogDetails->title }}</h3>
                        <p>category : {{$blogDetails->category->name}}</p>
                        <p>{{$blogDetails->short_description}}</p>
                    </div>
                    <div class="col-xl-3 col-lg-8">
                        <h3>Related Blogs</h3>
                        <hr>
                        @foreach($blogs as $blog)
                            <div class="row my-1">
                                    <div class="col-4">
                                        <a href="{{ route('blog-details', $blog->slug) }}">
                                        <img style="object-fit: cover" src="{{ asset($blog->banner) }}">
                                        </a>
                                    </div>
                                    <div class="col-8">
                                        <p><a class="text-dark" href="{{ route('blog-details', $blog->slug) }}">{{ $blog->title }}</a> </p>
                                        <p>{{$blog->category->name}}</p>
                                        <a href="{{ route('blog-details', $blog->slug) }}">Read More</a>
                                    </div>
                            </div>
                        @endforeach
                        <br>
                        <div class="row justify-content-center" >
                            <a href="{{route('blog')}}" class="btn btn-sm">See All Blogs</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        {!! $blogDetails->long_description !!}
                    </div>
                </div>

                <!-- ROW OPENED-->
                <div class="row my-3">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h3 class="card-title">Comments</h3>
                            </div>
                            <div class="card-body pb-0">
                                @if(isset($blogComments))
                                    @foreach($blogComments as $key => $comment)
                                        <div class="media border br-5 p-4 mb-5 overflow-visible">
                                            <div class="mr-3">
                                                <a href="javascript:void(0)">
                                                    <img class="media-object rounded-circle thumb-sm" alt="64x64" src="{{asset('/')}}admin/assets/images/users/5.jpg" width="40">
                                                </a>
                                            </div>
                                            <div class="media-body overflow-visible">
                                                <div class="br-5">
                                                    @if($comment->user_id == auth()->user()->id)
                                                        <nav class="nav float-right">
                                                            <div class="dropdown">
                                                                <a class="nav-link text-muted fs-16 p-2 ps-4" href="javascript:void(0)" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="fa-solid fa-traffic-light" style="font-size: 23px"></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-left">
                                                                    <a class="dropdown-item" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#commentEdit{{$key}}"><i class="fa fa-edit mr-1"></i> Edit</a>
                                                                    <a class="dropdown-item" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#commentReply{{$key}}">
                                                                        <i class="fa-solid fa-reply mr-1"></i> Reply
                                                                    </a>
                                                                    <form action="{{route('customer.delete.comment')}}" method="post" class="dropdown-item">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                                                        <button type="submit" class="border-0 bg-white" onclick="return confirm('are you sure to delete ?')">
                                                                            <i class="fa fa-trash-o mr-1"></i> Delete
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </nav>
                                                    @endif
                                                    <h5 class="mt-0">
                                                        {{$comment->user->name}}
                                                        <p class="text-muted" style="font-size: 10px">{{date_format($comment->created_at,'d M ,Y H:s A')}}</p>
                                                    </h5>
                                                    <p class="text-dark" style="font-size: 15px">{{$comment->comment}}</p>
                                                    <span class="">
                                                        <a href="javascript:void(0)"  data-bs-toggle="modal" data-bs-target="#commentReply{{$key}}">
                                                            <span class="badge btn-info-light rounded-pill py-2 px-3 my-1">
                                                                <i class="fa fa-reply mr-1"></i>Reply
                                                            </span>
                                                        </a>
                                                    </span>
                                                    @foreach($comment->replies as $k => $reply)
                                                    <div class="media mt-5 border br-5 p-2 overflow-visible d-sm-flex d-block">
                                                        <div class="mr-3">
                                                            <a href="javascript:void(0)">
                                                                <img class="media-object rounded-circle thumb-sm" alt="64x64" width="40" src="{{asset('/')}}admin/assets/images/users/2.jpg">
                                                            </a>
                                                        </div>
                                                        <div class="media-body overflow-visible br-5">
                                                            @if($reply->user_id == auth()->user()->id)
                                                                <nav class="nav float-right">
                                                                    <div class="dropdown">
                                                                        <a class="nav-link text-muted fs-16 p-2 ps-4" href="javascript:void(0)" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                                            <i class="fa-solid fa-traffic-light" style="font-size: 23px"></i>
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-start">
                                                                            <a class="dropdown-item" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#commentReplyReplyEdit{{$k}}">
                                                                                <i class="fa fa-edit mr-1"></i> Edit
                                                                            </a>
                                                                            <a class="dropdown-item" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#commentReplyReply{{$k}}">
                                                                                <i class="fa-solid fa-reply mr-1"></i> Reply
                                                                            </a>
                                                                            <form action="{{route('customer.delete.reply')}}" method="post" class="dropdown-item">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <input type="hidden" name="reply_id" value="{{$reply->id}}">
                                                                                <button type="submit" class="border-0 bg-white" onclick="return confirm('are you sure to delete ? ')">
                                                                                    <i class="fa fa-trash-o mr-1"></i> Delete
                                                                                </button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </nav>
                                                            @endif
                                                            <h5 class="mt-0">{{$reply->user->name}}
                                                                <p class="text-muted" style="font-size: 10px">{{date_format($reply->created_at,'d M ,Y H:s A')}}</p>
                                                            </h5>
                                                            <span><i class="fe fe-thumb-up text-danger"></i></span>
                                                            <p class="text-dark" style="font-size: 15px">{{$reply->reply}}</p>
                                                            <span class="reply" >
                                                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#commentReplyReply{{$k}}">
                                                                    <span class="badge btn-info-light rounded-pill py-2 px-3 my-1"><i class="fa fa-reply mr-1"></i>Reply</span></a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="modal fade" data-bs-backdrop="false" data-bs-keyboard="false"  id="commentReplyReply{{$k}}" tabindex="-1" role="dialog" aria-labelledby="commentReplyReplyModalLabel{{$k}}" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="commentReplyReplyModalLabel{{$k}}">Reply to : {{ucfirst($reply->reply)}}</h5>
                                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body text-left">
                                                                        <div class="container type_message">
                                                                            <div class="chat-container">
                                                                                <form id="review-form{{$k}}" action="{{route('customer.reply.comment')}}" method="post">
                                                                                    @csrf
                                                                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id ?? '' }}">
                                                                                    <input type="hidden" name="blog_id" value="{{$blogDetails->id}}">
                                                                                    <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                                                                    <div class="form-group">
                                                                                        <textarea class="form-control" name="reply" placeholder="Type message..." required></textarea>
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
                                                    <div class="modal fade" data-bs-backdrop="false" data-bs-keyboard="false"  id="commentReplyReplyEdit{{$k}}" tabindex="-1" role="dialog" aria-labelledby="commentReplyReplyEditModalLabel{{$k}}" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="commentReplyReplyModalLabel{{$k}}">Reply to : {{ucfirst($reply->reply)}}</h5>
                                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body text-left">
                                                                        <div class="container type_message">
                                                                            <div class="chat-container">
                                                                                <form id="review-form{{$k}}" action="{{route('customer.reply.edit.comment',$reply->id)}}" method="post">
                                                                                    @csrf
                                                                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id ?? '' }}">
                                                                                    <input type="hidden" name="blog_id" value="{{$blogDetails->id}}">
                                                                                    <input type="hidden" name="comment_id" value="{{$comment->id}}">
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
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" data-bs-backdrop="false" data-bs-keyboard="false"  id="commentReply{{$key}}" tabindex="-1" role="dialog" aria-labelledby="commentReplyModalLabel{{$key}}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="queryReplyEditModalLabel{{$key}}">Reply to : {{ucfirst($comment->comment)}}</h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-left">
                                                        <div class="container type_message">
                                                            <div class="chat-container">
                                                                <form id="review-form{{$key}}" action="{{route('customer.reply.comment')}}" method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id ?? '' }}">
                                                                    <input type="hidden" name="blog_id" value="{{$blogDetails->id}}">
                                                                    <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                                                    <div class="form-group">
                                                                        <textarea class="form-control" name="reply" placeholder="Type message..." required></textarea>
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
                                        <div class="modal fade" data-bs-backdrop="false" data-bs-keyboard="false"  id="commentEdit{{$key}}" tabindex="-1" role="dialog" aria-labelledby="commentEditModalLabel{{$key}}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="queryReplyEditModalLabel{{$key}}">Reply to : {{ucfirst($comment->comment)}}</h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-left">
                                                        <div class="container type_message">
                                                            <div class="chat-container">
                                                                <form id="review-form{{$key}}" action="{{route('customer.edit.comment',$comment->id)}}" method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="blog_id" value="{{$blogDetails->id}}">
                                                                    <div class="form-group">
                                                                        <textarea class="form-control" name="comment" placeholder="Type message..." required>{{$comment->comment}}</textarea>
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
                                    @endforeach
                                @endif
                                @if(auth()->check())
                                    <form action="{{route('customer.store.comment')}}" method="post">
                                        @csrf
                                        <input type="hidden" class="form-control" name="blog_id" value="{{$blogDetails->id}}">
                                        <div class="row mb-5 form-group-wrapper">
                                            <div class="col-md-12 mt-2">
                                                <div class="main-form-group">
                                                    <textarea name="comment" id="message" class="form-control text-area" placeholder="Message" rows="2"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-2">
                                                <button class="btn btn-success text-white float-end">Comment</button>
                                            </div>
                                        </div>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div><!--ROW CLOSED-->
            </div>
        </div>
    </div>
</section>


@endsection
