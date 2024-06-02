@extends('seller.Layout.master')
@section('title','Show Digital Product ')
@section('body')
    <div class="row mt-5">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title text-bold">Digital Product Table Details</h3>
                    <a href="{{route('digital-product.index')}}" class="btn btn-primary my-1 text-center">All Digital Product</a>
                </div>
                <div class="card-body">
                    <div class="card-body">
                            @if (isset($product))
                            <table class="table table-bordered table-hover">

                                <tr>
                                    <th>File</th>
                                    @if (isset($file->file))
                                    <td>
                                        <img src="{{$file->file}}" alt="" class="img-fluid" width="200">
                                        <p class="fw-semibold">{{$file->file_name}}</p>
                                    </td>
                                    @endif

                                </tr>
                                <tr>
                                    <th>Product Name</th>
                                    <td>{{ucfirst($product->name) ?? "N/A"}}</td>
                                </tr>
                                <tr>
                                    <th>Slug</th>
                                    <td>{{$product->slug ?? "N/A"}}</td>
                                </tr>

                                <tr>
                                    <th> Product Price</th>
                                    <td>{{$product->product_price ?? "N/A"}}</td>
                                </tr>

                                <tr>
                                    <th>Shipping Cost</th>
                                    <td>{{$product->shipping_cost ?? "N/A"}}</td>
                                </tr>
                                <tr>
                                    <th>Category</th>
                                    <td>{{$product->category->name ?? "N/A"}}</td>
                                </tr>

                                <tr>
                                    <th>Brand</th>
                                    <td>{{$product->brand->name ?? "N/A"}}</td>
                                </tr>
                                <tr>
                                    <th>Unit</th>
                                    <td>{{$product->unit->name ?? "N/A"}}</td>
                                </tr>
                                <tr>
                                    <th>Unit Amount</th>
                                    <td>{{$product->unit_amount ?? "N/A"}}</td>
                                </tr>
                                <tr>
                                    <th>Bar Code</th>
                                    <td>{{$product->bar_code ?? "N/A"}}</td>
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
                                        {!!$product->long_description!!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Refund</th>
                                    <th>{{$product->refund ==1 ? 'Refundable': 'No Refundable'}}</th>
                                </tr>
                                <tr>
                                    <th> Feature Status</th>
                                    <td>{{$product->featured_status == 1 ? "Active" : "Inactive"}}</td>
                                </tr>
                                <tr>
                                    <th> Tags</th>
                                <td>{{ $product->tags ?? "N/A"}}</td>
                                </tr>

                                <tr>
                                    <th> Status</th>
                                    <td>{{$product->status == 1 ? "active" : "inactive"}}</td>
                                </tr>
                                <tr>
                                    <th> Product Image</th>
                                    <td>
                                        @if (isset($product->product_image))
                                        <img width="100" height="100" src="{{ asset($product->product_image) ?? 'N/A'}}" alt="">

                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th> Other Images</th>
                                    <td>
                                        @if (isset($other_images))
                                            @foreach ($other_images as $other_image)
                                            <img width="100" height="100" src="{{asset('/').$other_image}}" alt="">
                                            @endforeach
                                        @endif
                                    </td>
                                </tr>

                            </table>

                            @endif
                        </div>
                </div>
            </div>
        </div>
    </div>

@endsection

