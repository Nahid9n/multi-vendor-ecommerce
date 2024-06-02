@extends('admin.master')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Auction Product Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Auction Prodcuts </a></li>
                <li class="breadcrumb-item active" aria-current="page"> Acution Products</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Auction Prodcut Details</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Auction Product Name</th>
                            <th>{{ $auction_product->product->name ?? "N/A"}}</th>
                        </tr>
                          <tr>
                            <th>Auction Product Type</th>
                            <th>{{ $auction_product->type->type_name ??  "N/A"}}</th>
                        </tr>
                        <tr>
                            <th>Auction Product Code</th>
                            <th>{{ $auction_product->code  ?? "N/A"}}</th>
                        </tr>

                        <tr>
                            <th>Category Name</th>
                            <th>{{ $auction_product->product->category->name  ?? "N/A"}}</th>
                        </tr>
                        <tr>
                            <th>SubCategory Name</th>
                            <th>{{ $auction_product->product->subCategory->name ?? "N/A"}}</th>
                        </tr>
                        <tr>
                            <th> Brand Name </th>
                            <th>{{ $auction_product->product->brand->name ?? "N/A"}}</th>
                        </tr>
                        <tr>
                            <th> Unit Name </th>
                            <th>{{ $auction_product->product->unit->name ?? "N/A"}}</th>
                        </tr>
                        <tr>
                            <th> Auction Colors</th>
                            <th>

                             <span>{{ $auction_product->product->color->name ?? 'N/A'}}</span>

                            </th>
                        </tr>
                        <tr>
                            <th>Auction Product Sizes</th>
                            <th>
                                <span>{{ $auction_product->product->size->name ?? "N/A"}}</span>
                            </th>
                        </tr>

                        <tr>
                            <th>Short Description</th>
                            <th>{{ $auction_product->product->short_description ?? "N/A"}}</th>
                        </tr>
                        <tr>
                            <th>Long Description</th>
                            <th>{!! $auction_product->product->long_description  ?? "N/A" !!}</th>
                        </tr>
                        <tr>
                            <th> Price</th>
                            <th>
                                <span> Regular: {{ $auction_product->product->regular_price  ?? "N/A" }}</span> <br />
                                <span> Selling: {{ $auction_product->product->selling_price  ?? "N/A" }}</span>
                            </th>
                        </tr>
                        <tr>
                            <th> Stock Amount</th>
                            <td>{{ $auction_product->stock_amount  ?? "N/A"}}</td>
                        </tr>
                        <tr>
                            <th> Total View</th>
                            <td>{{ $auction_product->hit_count  ?? "N/A"}}</td>
                        </tr>
                        <tr>
                            <th> Total Sale</th>
                            <td>{{ $auction_product->sales_count ?? "N/A" }}</td>
                        </tr>
                        <tr>
                            <th> Start Date</th>
                            <td>{{ $auction_product->start_date ?? "N/A" }}</td>
                        </tr>
                        <tr>
                            <th> End Date</th>
                            <td>{{ $auction_product->end_date ?? "N/A" }}</td>
                        </tr>

                        <tr>
                            <th> Publication Status</th>
                            <td>{{ $auction_product->status == 1 ? 'Published' : 'Not Published' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
