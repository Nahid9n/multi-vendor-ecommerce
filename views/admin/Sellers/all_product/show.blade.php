@extends('admin.master')
@section('title','Show Seller ')
@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Seller Product Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Seller Product</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Seller Product</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Product Seller Details</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Image</th>
                            <td>
                               <img width="80" height="80" src="{{ url('uploads/sellers/all_products',$seller->image) }}" alt="image">
                            </td>
                        </tr>

                        <tr>
                            <th> Name</th>
                            <th>{{$seller->full_name ??"N/A"}}</th>
                        </tr>
                        <tr>
                            <th> Shop Name</th>
                            <th>{{$seller->shop_name ?? "N/A"}}</th>
                        </tr>
                        <tr>
                            <th> Stock</th>
                            <th>{{$seller->stock ?? "N/A"}}</th>
                        </tr>
                        <tr>
                            <th>Sales Count</th>
                            <th>{{$seller->sales_count ?? "N/A"}}</th>
                        </tr>
                        <tr>
                            <th>Refund</th>
                            <th>{{$seller->refund ?? "N/A"}}</th>
                        </tr>
                        <tr>
                            <th>Hit Count</th>
                            <th>{{$seller->hit_count ?? "N/A"}}</th>
                        </tr>
                        <tr>
                            <th> Feature Status</th>
                            <th>{{$seller->featured_status ?? "N/A"}}</th>
                        </tr>
                        <tr>
                            <th> Tags</th>
                        <th>{{ $seller->tags ?? "N/A"}}</th>
                        </tr>
                        <tr>
                            <th>Category</th>
                            <th>{{$seller->category->name ?? "N/A"}}</th>
                        </tr>
                        <tr>
                            <th>SubCategory</th>
                            <th>{{$seller->subCategory->name ?? "N/A"}}</th>
                        </tr>
                        <tr>
                            <th>Brand</th>
                            <th>{{$seller->brand->name ?? "N/A"}}</th>
                        </tr>
                        <tr>
                            <th>Size</th>
                            <th>{{$seller->size->name ?? "N/A"}}</th>
                        </tr>
                        <tr>
                        <tr>
                            <th>Type</th>
                            <th>{{$seller->type->name ?? "N/A"}}</th>
                        </tr>
                        <tr>
                            <th> Code</th>
                            <th>
                               {{ $seller->code ?? "N/A"}}
                            </th>
                        </tr>
                        <tr>
                            <th>Short Description</th>
                            <th>
                              {{ $seller->short_description ?? "N/A"}}
                            </th>
                        </tr>
                        <tr>
                            <th>Logn Description</th>
                            <th>
                              {{ $seller->long_description ?? "N/A"}}
                            </th>
                        </tr>

                            <th>  Status</th>
                            <td>{{$seller->status == 1 ? "active" : "inactive"}}</td>
                        </tr>
                        <tr>

                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

