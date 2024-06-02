@extends('admin.master')
@section('title','Show Page')
@section('body')
    <!-- row -->
    <div class="row row-deck mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="text-end">
                    <a href="{{route('pages.index')}}" class="btn btn-success my-1 mx-2 float-end text-center">All Pages</a>
                    <a href="{{route('pages.edit',$page->id)}}" class="btn btn-warning my-1 mx-2 float-end text-dark text-center">Edit Page</a>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <h4 class="fw-bold">{{$page->name}}</h4>
                        <hr>
                    </div>
                    <div class="">
                        <p class="fw-bold">page contents =>  </p>
                        <p>{!! $page->contents !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
@endsection

