@extends('seller.Layout.master')
@section('title','Product Queries Table')
@section('body')

    <div class="row row-sm mt-3">
        <div class="col-lg-12">
            <div class="card mt-5">
                <div class="cart-header">
                    <h3 class="card-title px-3 mt-3">Product Queries Table</h3>
                    <hr>
                </div>

                <div class="card-body">
                    <div class="table-responsive export-table">
                        <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom  w-100">
                            <thead>
                                <tr class="text-center">
                                    <th class="border-bottom-0">Product Name</th>
                                    <th class="border-bottom-0">Replies</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr class="text-center">
                                    <td>{{$product->name}}</td>
                                    <td class="justify-content-center d-flex">
                                        <a href="{{route('seller.product.queries.view',$product->id)}}" class="btn btn-success my-2 me-2"><i class="fa fa-eye"></i></a>
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
