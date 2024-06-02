@extends('admin.master')
@section('title','Brand page')
@section('body')
    <div class="row row-sm mt-5">
        <div class="col-lg-12">
            <div class="card">
                <div class="border-bottom m-3">
                    <div class="row">
                        <div class="card-header border-bottom justify-content-between">
                            <h3 class="card-title text-bold">Brand Table</h3>
                            <a href="{{route('brands.create')}}" class="btn btn-primary my-1 text-center">+ADD</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive export-table">
                        <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom  w-100">
                            <thead>
                            <tr class="text-center">
                                <th class="border-bottom-0">SL</th>
                                <th class="border-bottom-0">Logo</th>
                                <th class="border-bottom-0">Name</th>
                                <th class="text-center border-bottom-0">Featured Status</th>
                                <th class="border-bottom-0">Status</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php
                                    $id=0;
                                @endphp
                            @foreach($brands as $key=>$brand)
                            <tr class="text-center">
                                <td>{{++$id}}</td>
                                <td><img style="max-width: 50px; heightL auto" src="{{asset($brand->logo)}}" alt=""></td>
                                <td>{{$brand->name}}</td>
                                <td class="text-center">
                                    <form action="{{route('admin.brand.featured.status.update',$brand->id)}}" class="main-toggle-group" method="post">
                                        @csrf
                                        <div class="row justify-content-center">
                                            <div class=" text-center col-4 p-2 rounded-5">
                                                <input id="feature_product{{$key}}" class="toggle toggle-danger" value="1" name="featured_status" {{$brand->featured_status == 1 ? 'checked':''}} onclick="this.form.submit()" type="checkbox"/>
                                                <label for="feature_product{{$key}}" class="label-primary"></label>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                                <td>{{$brand->status == 1 ? 'active':'Inactive'}}</td>
                                <td class="justify-content-center d-flex text-center">
                                    <a href="{{route('brands.edit',$brand->id)}}" class="btn btn-success my-2 me-1"><i class="fa fa-edit"></i></a>
                                    <form action="{{route('brands.destroy',$brand->id)}}" method="post">
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
@endsection


