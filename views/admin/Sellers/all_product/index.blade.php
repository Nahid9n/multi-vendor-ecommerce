@extends('admin.master')
@section('title','Product page')
@section('body')

    <div class="row mt-5">
        <div class="col">
            <div class="card">

                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title text-bold">All Product Table</h3>
                    <a href="{{route('product-seller.create')}}" class="btn btn-success my-1 float-end text-center">Create New Product</a>
                </div>
                
                <div class="card-body">
                    <p class="alert alert-success text-center" x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show">{{session('message')}}</p>
                    <div class="table-responsive">
                        <table id="example3" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                            <tr>

                                <th class="border-bottom-0">SL No</th>
                                <th class="border-bottom-0">Name</th>
                                <th class="border-bottom-0">Regular Price</th>
                                <th class="border-bottom-0">Selling Price </th>
                                <th class="border-bottom-0">status</th>
                                <th class="border-bottom-0">Stock </th>
                                <th class="border-bottom-0">Sale Count </th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php
                                    $id=0;
                                @endphp
                                @foreach ($seller_products as $product)
                                    <tr>
                                        <td>{{ ++$id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->regular_price }}</td>
                                        <td>{{ $product->selling_price }}</td>
                                        <td>{{ $product->status ==1 ? "active" : "inactive"}}</td>
                                        <td>{{ $product->stock }}</td>
                                        <td>{{ $product->sales_count }}</td>
                                        <td class="d-flex">
                                            <a href="{{route('product-seller.show', $product->id)}}" class="btn btn-success btn-sm me-1">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{route('product-seller.edit', $product->id)}}" class="btn btn-success btn-sm me-1">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{route('product-seller.delete', $product->id)}}" method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit" class="btn btn-danger btn-sm">
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


