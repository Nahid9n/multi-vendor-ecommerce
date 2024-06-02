@extends('admin.master')
@section('title','Blog Post page')
@section('body')
    <!-- Row -->
    <div class="row row-sm mt-5">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title text-bold">Blog Post Table</h3>
                    <a href="{{route('blogs.create')}}" class="btn btn-success my-1 float-end text-center">Create New Post</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive export-table">
                        <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom  w-100">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">Banner</th>
                                <th class="border-bottom-0">Title</th>
                                <th class="border-bottom-0">Category</th>
                                <th class="border-bottom-0">Short Description</th>
                                <th class="border-bottom-0">Status</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($blogs as $blog)
                                <tr>
                                <td><img src="{{asset($blog->banner)}}" width="100" height="80" alt=""></td>
                                <td>{{$blog->title}}</td>
                                <td>{{$blog->category->name ?? 'No Category'}}</td>
                                <td>{{$blog->short_description}}</td>
                                <td>{{$blog->status == 1 ? 'active':'Inactive'}}</td>
                                <td class="d-flex">
                                    <a href="{{route('blogs.edit',$blog->id)}}" class="btn btn-success mx-2"><i class="fa fa-edit"></i></a>
                                    <a href="{{route('blogs.show',$blog->id)}}" class="btn btn-success mx-2"><i class="fa fa-eye"></i></a>
                                    <form action="{{route('blogs.destroy',$blog->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('are you sure to delete ? ')" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->

@endsection


