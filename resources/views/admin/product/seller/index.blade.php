@extends('admin.master')
@section('title','Seller Product page')
@section('body')
    <div class="row mt-5">
        <div class="col">
            <div class="card">
                <div class="border-bottom m-3">
                    <div class="row">
                        <div class="card-header border-bottom justify-content-between">
                            <h3 class="card-title">All Product Table</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row my-2">
                        <div class="col-md-2">
                            <form  action="{{route('admin.products.bulk.status.change')}}" method="post">
                                @csrf
                                <select id="activeBulkId" class="form-control text-center hidden" onchange="this.form.submit()" name="status" required>
                                    <option label="Select One">Select One</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                                <input class="statusIds" id="productstatusIds" type="hidden" name="product_id[]" onclick="checkedAndUncheckBulkStatusProduct()" value="">
                            </form>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="example3" class="table table-bordered text-center text-nowrap border-bottom">
                            <thead>
                            <tr>
                                <th class="border-bottom-0"></th>
                                <th class="border-bottom-0">SL NO</th>
                                <th class="border-bottom-0">Seller Shop Name</th>
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
                                <tr>
                                    <td>
                                        <input class="checkboxProductId" type="checkbox" name="product_id[]" onclick="checkedAndUncheckBulkStatusProduct()" value="{{ $product->id }}">
                                    </td>

                                    <td>{{$id+1}}</td>
                                    <td>{{$product->user->seller->shop_name}}</td>
                                    <td>{{$product->user->name ?? ''}}</td>

                                    <td class="text-start">{{$product->name}}</td>
                                    <td>{{$product->category->name ?? 'N/A'}}</td>
                                    <td>{{$product->brand->name ?? 'N/A'}}</td>
                                    <td >{{$product->featured_status == 1 ? 'Published' : 'Unpublished'}}</td>
                                    <td>
                                        <form action="{{route('admin.products.status.change',$product->id)}}" method="post">
                                            @csrf
                                            <select class="form-control text-center {{$product->status == 1 ? 'bg-success text-white' : 'bg-warning text-dark'}}" onchange="this.form.submit()" name="status" id="">
                                                <option value="1" {{$product->status == 1 ? 'selected' : ''}}>Active</option>
                                                <option value="0" {{$product->status == 0 ? 'selected' : ''}}>Inactive</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td class="d-flex">
                                        <a href="{{route('products.show', $product->id)}}" class="btn btn-success btn-sm me-1">
                                            <i class="fa fa-eye"></i>
                                        </a>
{{--                                        <a href="{{route('products.edit', $product->id)}}" class="btn btn-success btn-sm me-1">--}}
{{--                                            <i class="fa fa-edit"></i>--}}
{{--                                        </a>--}}
                                        <form action="{{route('products.destroy', $product->id)}}" method="POST">
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

