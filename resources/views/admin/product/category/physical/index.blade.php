@extends('admin.master')
@section('title','physical category page')
@section('body')
    <div class="row row-sm mt-5">
        <div class="col-lg-12">
            <div class="card">
                <div class="border-bottom m-3">
                    <div class="row">
                        <div class="card-header border-bottom justify-content-between">
                            <h3 class="card-title text-bold">Physical Category Table</h3>
                            <a href="{{route('physicals.create')}}" class="btn btn-primary my-1 text-center">+ADD</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive export-table">
                        <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom  w-100">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">SL No</th>
                                <th class="border-bottom-0">Name</th>
                                {{-- <th class="border-bottom-0">Ordering Number</th> --}}
                                <th class="border-bottom-0">Banner</th>
                                <th class="border-bottom-0">Icon</th>
                                <th class="border-bottom-0">Cover</th>
                                <th class="text-center border-bottom-0">Featured Status</th>
                                <th class="border-bottom-0">Status</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $key=>$category)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$category->name}}</td>
                                    {{-- <td>{{$category->orderNumber}}</td> --}}
                                    <td><img width="50" height="50" src="{{asset($category->banner)}}" alt=""></td>
                                    <td><img width="50" height="50" class="img-fluid" src="{{asset($category->icon)}}" alt=""></td>
                                    <td><img width="50" height="50" src="{{asset($category->cover)}}" alt=""></td>
                                    <td class="text-center ">
                                        <form action="{{route('admin.category.featured.status.update',$category->id)}}" class="main-toggle-group" method="post">
                                            @csrf
                                            <div class="row  justify-content-center">
                                                <div class="text-center col-4 p-2 rounded-5">
                                                    <input id="feature_product{{$key}}" value="1" class="toggle toggle-secondary my-1 on " name="featured_status" {{$category->featured_status == 1 ? 'checked':''}} onclick="this.form.submit()" type="checkbox"/>
                                                    <label for="feature_product{{$key}}" class="label-primary"></label>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                    <td>{{$category->status == 1 ? 'active':'Inactive'}}</td>
                                    <td class="d-flex text-center ">
                                        <a href="{{route('physicals.edit',$category->id)}}" class="btn btn-success my-2 me-1"><i class="fa fa-edit"></i></a>
                                        <form action="{{route('physicals.destroy',$category->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('are you sure to delete ? ')" class="btn btn-danger my-2 me-1"><i class="fa fa-trash-o"></i></button>
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



