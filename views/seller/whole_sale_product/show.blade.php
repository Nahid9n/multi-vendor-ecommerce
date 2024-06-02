@extends('seller.Layout.master')
@section('title','Show Seller ')
@section('body')
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
                                <img width="80" height="80" src="{{ url('uploads/sellers/product_image',$product->image) }}" alt="image">
                            </td>
                        </tr>
                        <tr>
                            <th> Name</th>
                            <td>{{$product->name ?? "N/A"}}</td>
                        </tr>
                        <tr>
                            <th> Stock</th>
                            <td>{{$product->stock_amount ?? "N/A"}}</td>
                        </tr>
                        <tr>
                            <th>Sales Count</th>
                            <th>{{$product->sales_count ?? "N/A"}}</th>
                        </tr>
                        <tr>
                            <th>Refund</th>
                            <th>{{$product->refund ?? "N/A"}}</th>
                        </tr>
                        <tr>
                            <th>Hit Count</th>
                            <td>{{$product->hit_count ?? "N/A"}}</td>
                        </tr>
                        <tr>
                            <th> Feature Status</th>
                            <td>{{$product->featured_status ?? "N/A"}}</td>
                        </tr>
                        <tr>
                            <th> Tags</th>
                        <td>{{ $product->tags ?? "N/A"}}</td>
                        </tr>
                        <tr>
                            <th>Category</th>
                            <td>{{$product->category->name ?? "N/A"}}</td>
                        </tr>
                        <tr>
                            <th>SubCategory</th>
                            <td>{{$product->subCategory->name ?? "N/A"}}</td>
                        </tr>
                        <tr>
                            <th>Brand</th>
                            <td>{{$product->brand->name ?? "N/A"}}</td>
                        </tr>
                        <tr>
                            <th>Size</th>
                            @foreach ($product_sizes as $product_size)
                                <td>{{ $product_size->size->name ?? 'N/A'}}</td>
                            @endforeach
                        </tr>

                        <tr>
                            <th>Color</th>
                            @foreach ($product_colors as $product_color)
                                <td>{{ $product_color->color->name ?? 'N/A'}}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <th>Product Other Images</th>
                            @foreach ($product_images as $product_image)
                            <td>
                                <img width="80" height="80" src="{{ url('uploads/seller/other_product_image/',$product_image->other_image) }}" alt="image">
                             </td>
                            @endforeach
                        </tr>
                        <tr>
                            <th>Type</th>
                            <td>{{$product->type->name ?? "N/A"}}</td>
                        </tr>
                        <tr>
                            <th> Code</th>
                            <td>
                               {{ $product->code ?? "N/A"}}
                            </td>
                        </tr>
                        <tr>
                            <th>Short Description</th>
                            <td>
                              {{ $product->short_description ?? "N/A"}}
                            </td>
                        </tr>
                        <tr>
                            <th>Logn Description</th>
                            <td>
                              {{$product->long_description}}
                            </td>
                        </tr>

                            <th>  Status</th>
                            <td>{{$product->status == 0 ? "active" : "inactive"}}</td>
                        </tr>
                        <tr>

                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

