@extends('admin.master')
@section('title','Product Queries Table')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">All Product Queries</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Product Queries</a></li>
                <li class="breadcrumb-item active" aria-current="page">Product Queries</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="border-bottom m-3">
                    <div class="row">
                        <div class="">
                            <h3 class="card-title">Product Queries Table</h3>
                            <hr>
                        </div>
                    </div>
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
                                        <a href="{{route('admin.product.queries.view',$product->id)}}" class="btn btn-success my-2 me-2"><i class="fa fa-eye"></i></a>
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
