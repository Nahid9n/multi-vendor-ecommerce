@extends('admin.master')
@section('title','Sub Category page')
@section('body')
    <div class="row row-sm mt-5">
        <div class="col-lg-12">
            <div class="card">
                <div class="border-bottom m-3">
                    <div class="row">
                        <div class="card-header border-bottom justify-content-between">
                            <h3 class="card-title text-bold">SubCategory Table</h3>
                            <a href="{{route('sub-category.create')}}" class="btn btn-primary my-1 float-end text-center">+ADD</a>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive export-table">
                        <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom  w-100">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">SL NO</th>
                                <th class="border-bottom-0">Category Name</th>
                                <th class="border-bottom-0">Sub Category Name</th>
                                <th class="border-bottom-0">Image</th>
                                <th class="border-bottom-0">Status</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sub_categories as $sub_category)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ isset($sub_category->category->name) ? $sub_category->category->name : 'N/A' }}</td>
                                    <td>{{$sub_category->name}}</td>
                                    <td><img src="{{asset($sub_category->image)}}" alt="" height="40" width="60"/></td>
                                    <td>{{$sub_category->status == 1 ? 'Active' : 'Inactive'}}</td>
                                    <td class="d-flex text-center justify-content-center">
                                        <a href="{{route('sub-category.edit', $sub_category->id)}}" class="btn btn-success my-2 me-1">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{route('sub-category.destroy', $sub_category->id)}}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-danger my-2 me-1" onclick="return confirm('Are you sure to delete this');">
                                                <i class="fa fa-trash"></i>
                                            </button>
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
@endsection


