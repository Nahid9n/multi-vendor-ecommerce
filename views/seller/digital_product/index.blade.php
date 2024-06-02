
@extends('seller.Layout.master')
@section('title','Digital Product page')
@section('body')
    <div class="row mt-5">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title text-bold">All Product Table </h3>
                    <a href="{{route('digital-product.create')}}" class="btn btn-primary my-1 text-center">+ADD</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                            <tr>

                                <th class="border-bottom-0">SL No</th>
                                <th class="border-bottom-0">Name</th>
                                <th class="border-bottom-0">Category</th>
                                <th class="border-bottom-0">Brand</th>
                                <th class="border-bottom-0">Product Status</th>
                                <th class="border-bottom-0">Feature Product</th>
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
                                        <td>{{ ucfirst($product->name) }}</td>
                                        <td>{{ ucfirst($product->category->name ?? '') }}</td>
                                        <td>{{ ucfirst($product->brand->name ?? '') }}</td>
                                        <td>{{ $product->status ==1 ? "active" : "inactive"}}</td>
                                        <td>{{ $product->featured_status ==1 ? "active" : "inactive"}}</td>
                                        <td class="d-flex">
                                            <a href="{{route('digital-product.show', $product->id)}}" class="btn btn-success btn-sm me-1">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{route('digital-product.edit', $product->id)}}" class="btn btn-success btn-sm me-1">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{route('digital-product.delete', $product->id)}}" method="POST">
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






