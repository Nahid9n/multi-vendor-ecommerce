@extends('admin.master')
@section('title','Blog Detail')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Blog Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Blog</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Blog</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Blog Detail Information</h3>
                </div>
                <div class="text-end">
                    <a href="{{route('blogs.index')}}" class="btn btn-success my-1 float-end mx-2 text-center">All Blog</a>
                    <a href="{{route('blogs.edit', $blog->id)}}" class="btn btn-success my-1 float-end mx-2 text-center">Edit this Blog</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5 text-center mb-2">
                            <img src="{{asset($blog->banner)}}" class="img-fluid" height="200" width="200">
                        </div>
                        <div class="col-md-7">
                            <h3 class="text-dark fw-bold">{{$blog->title}}</h3>
                            <p class="text-dark"><span class="fw-bold">Blog Type : </span>{{$blog->category->name ?? ''}}</p>
                            <h5>{{$blog->short_description}}</h5>
                        </div>
                    </div>
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Blog ID</th>
                            <th>{{$blog->id}}</th>
                        </tr>
                        <tr>
                            <th>Blog Name</th>
                            <th>{{$blog->title}}</th>
                        </tr>
                        <tr>
                            <th>Blog Other Image</th>
                            <td>
                                @foreach($blog->BlogImages as $BlogImage)
                                    <img src="{{asset($BlogImage->image)}}" height="100" width="70" alt="No Images">
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>Category Name</th>
                            <th>{{$blog->category->name ?? 'No category'}}</th>
                        </tr>
                        <tr>
                            <th>Short Description</th>
                            <th>{{$blog->short_description ?? 'No Description' }}</th>
                        </tr>
                        <tr>
                            <th>Long Description</th>
                            <th>{!! $blog->long_description  ?? 'No Long Description' !!}</th>
                        </tr>
                        <tr>
                            <th>Meta Title</th>
                            <th>{{ $blog->meta_title  ?? 'No Long Description' }}</th>
                        </tr>
                        <tr>
                            <th>Meta Image</th>
                            <th><img src="{{asset($blog->meta_image)}}" height="200" width="200" alt="No Images"></th>
                        </tr>

                        <tr>
                            <th>Meta Description</th>
                            <th>{{ $blog->meta_description  ?? 'No Long Description' }}</th>
                        </tr>
                        <tr>
                            <th> Total View</th>
                            <td>{{$blog->hit_count}}</td>
                        </tr>
                        <tr>
                            <th> Publication Status</th>
                            <td>{{$blog->status == 1 ? "Published" : "Not Published"}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

