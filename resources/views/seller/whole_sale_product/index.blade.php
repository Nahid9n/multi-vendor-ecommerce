@extends('seller.Layout.master')
@section('title','Product page')
@section('body')
    <div class="row mt-5">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title text-bold">All Product Table</h3>
                    <a href="{{route('seller-whole-sale-product.create')}}" class="btn btn-primary my-1 text-center">+Add Product</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                            <tr>

                                <th class="border-bottom-0">SL No</th>
                                <th class="border-bottom-0">Image </th>
                                <th class="border-bottom-0">Name</th>
                                <th class="border-bottom-0">Regular Price</th>
                                <th class="border-bottom-0">Selling Price</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php
                                    $id=0;
                                @endphp
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ ++$id }}</td>
                                        <td>
                                            <img width="100" height="80" src="{{url('uploads/sellers/product_image/',$product->image)}}" alt="">
                                        </td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->regular_price }}</td>
                                        <td>{{ $product->selling_price }}</td>


                                        <td class="d-flex">
                                            <a href="{{route('seller-whole-sale-product.show', $product->id)}}" class="btn btn-success btn-sm me-1">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{route('seller-whole-sale-product.edit', $product->id)}}" class="btn btn-success btn-sm me-1">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{route('seller-whole-sale-product.delete', $product->id)}}" method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete?');">
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



