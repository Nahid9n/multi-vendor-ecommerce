@extends('seller.Layout.master')
@section('title','Product page')
@section('body')
    <div class="row mt-5">
        <div class="col">
            <div class="card">
                <div class="border-bottom m-3">
                    <div class="row">
                        <div class="card-header border-bottom justify-content-between">
                            <h3 class="card-title">All Product Table</h3>
                            <a href="{{route('product.create')}}" class="btn btn-primary my-1 text-center">+ADD</a>
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
                        <table id="example3" class="table table-bordered text-nowrap text-center border-bottom">
                            <thead>
                            <tr>
                               <th class="border-bottom-0">

                               </th>
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
                                    <td>
                                        <input class="checkboxProductId" type="checkbox" name="product_id[]" onclick="checkedAndUncheckBulkStatusProduct()" value="{{ $product->id }}">
                                    </td>

                                    <td>{{$id+1}}</td>
                                    <td class="text-start">{{$product->name}}</td>
                                    <td>{{$product->category->name ?? 'N/A'}}</td>
                                    <td>{{$product->brand->name ?? 'N/A'}}</td>

                                    <td >{{$product->featured_status == 1 ? 'Published' : 'Unpublished'}}</td>
                                    <td>
                                        <span class="p-2 {{$product->status == 1 ? 'bg-success text-white' : 'bg-danger text-white'}}">
                                            {{$product->status == 1 ? 'Active' : 'Inactive'}}
                                        </span>

                                    </td>
                                    <td class="d-flex justify-content-center">
                                        <a href="{{route('product.show', $product->id)}}" class="btn btn-success btn-sm me-1">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{route('product.edit', $product->id)}}" class="btn btn-success btn-sm me-1">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{route('product.delete', $product->id)}}" method="POST">
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


