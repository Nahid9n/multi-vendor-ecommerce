@extends('admin.master')
@section('title','Blog Category page')
@section('body')

    <!-- Row -->
    <div class="row row-sm mt-5">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title text-bold">Blog Category Table</h3>
                    <a href="{{route('blog_categories.create')}}" class="btn btn-success my-1 float-end text-center">Create New Blog Category</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive export-table">
                        <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom  w-100">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">Name</th>
                                <th class="border-bottom-0">Status</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                <td>{{$category->name}}</td>
                                <td>{{$category->status == 1 ? 'active':'Inactive'}}</td>
                                <td class="d-flex">
                                    <a href="{{route('blog_categories.edit',$category->id)}}" class="btn btn-success mx-2"><i class="fa fa-edit"></i></a>
                                    <form action="{{route('blog_categories.destroy',$category->id)}}" method="post">
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


