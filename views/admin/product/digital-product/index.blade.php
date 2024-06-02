@extends('admin.master')
@section('title','Digital Product page')
@section('body')
    <div class="row mt-5">
        <div class="col">
            <div class="card">
                <div class="border-bottom m-3">
                    <div class="row">
                        <div class="card-header border-bottom justify-content-between">
                            <h3 class="card-title">All Digital Product</h3>
                            <a href="{{route('admin.digital.product.create')}}" class="btn btn-primary my-1 text-center">+ADD</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="table table-bordered text-nowrap text-center border-bottom">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">SL NO</th>
                                <th class="border-bottom-0">Name</th>
                                <th class="border-bottom-0">Category</th>
                                <th class="border-bottom-0">Brand </th>
                                <th class="border-bottom-0">Featured Status</th>
                                <th class="border-bottom-0">Product Status </th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $id=>$product)
                                <tr class="text-center">
                                    <td>{{$id+1}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->category->name ?? 'N/A'}}</td>
                                    <td>{{$product->brand->name ?? 'N/A'}}</td>
                                    <td >
                                        <form action="{{route('admin.product.featured.status.update',$product->id)}}" class="main-toggle-group" method="post">
                                            @csrf
                                            <div class="row justify-content-center">
                                                <div class=" text-center col-4 p-2 rounded-5">
                                                    <input id="feature_product{{$id}}" class="toggle toggle-secondary my-1 on " value="1" name="featured_status" {{$product->featured_status == 1 ? 'checked':''}} onclick="this.form.submit()" type="checkbox"/>
                                                    <label for="feature_product{{$id}}" class="label-primary"></label>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{route('admin.products.status.change',$product->id)}}" method="post">
                                            @csrf
                                            <select class="form-control text-center {{$product->status == 1 ? 'bg-success text-white' : 'bg-warning text-dark'}}" onchange="this.form.submit()" name="status" id="">
                                                <option value="1" {{$product->status == 1 ? 'selected' : ''}}>Active</option>
                                                <option value="0" {{$product->status == 0 ? 'selected' : ''}}>Inactive</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td class="d-flex justify-content-center">
                                        <a href="{{route('admin.digital.product.show', $product->id)}}" class="btn btn-success btn-sm me-1">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{route('admin.digital.product.edit', $product->id)}}" class="btn btn-success btn-sm me-1">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{route('admin.digital.product.destroy', $product->id)}}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this');">
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

