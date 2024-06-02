@extends('admin.master')
@section('title','Blog category page')
@section('body')

    <!-- row -->
    <div class="row row-deck mt-5">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title text-bold">Edit Blog Category</h3>
                    <a href="{{route('blog_categories.index')}}" class="btn btn-success my-1 float-end text-center">All Blog Category</a>
                </div>


                <div class="card-body">
                    <form class="form-horizontal" action="{{route('blog_categories.update',$blogCategory->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-4">
                            <label for="name" class="col-md-3 form-label">Blog Category Name <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" id="name" required value="{{$blogCategory->name}}" name="name" placeholder="Enter your Blog Category name" type="text">
                                <span class="text-danger">{{$errors->has('name') ? $errors->first('name'):''}}</span>
                            </div>
                        </div>
                        <div class="row mb-4 d-flex form-group">
                            <div class="col-md-3">
                                <label class="" for="type">Publication Status</label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control select2 form-select" name="status" data-placeholder="Choose one">
                                    <option class="form-control" label="Choose one" disabled selected></option>
                                    <option value="1" {{$blogCategory->status == 1 ? 'selected':''}}>Active</option>
                                    <option value="0" {{$blogCategory->status == 0 ? 'selected':''}}>Inactive</option>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary px-4" type="submit">Update Blog Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
@endsection


