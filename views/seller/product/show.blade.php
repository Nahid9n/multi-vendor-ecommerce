
@extends('seller.Layout.master')
@section('title','Show Seller ')
@section('body')
    <div class="row mt-5">
        <div class="col">
            <div class="card">
                <div class="card-header row border-bottom">
                    <div class="col-6">
                        <h3 class="card-title">Product Details Table</h3>
                    </div>
                    <div class="col-6">
                        <a href="{{route('product.index')}}" class="btn btn-success my-1 float-end mx-2 text-center">All Product</a>
                        <a href="{{route('product.edit', $product->id)}}" class="btn btn-warning my-1 float-end mx-2 text-center">Edit</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 text-center shadow">
                            <img src="{{asset($product->product_image ?? '')}}" alt="" class="img-fluid" width="300">
                            <p class="text-center">Product Image</p>
                        </div>
                        <div class="col-md-8 shadow text-center">
                            @if(isset($otherImages))
                            @foreach($otherImages as $otherImage)
                                <img src="{{asset($otherImage)}}" alt="" class="m-1" width="200" height="200">
                            @endforeach
                            @endif
                            <p class="text-center my-2 fw-bold">Other Images</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header text-bold">Product variants</div>
                        <div class="card-body table-responsive">
                             @if ($product_stocks)
                             <table class="table table-bordered table-hover">
                                 <thead class="bg-info">
                                   <tr>
                                     <th scope="col">#</th>
                                     <th scope="col">Variant</th>
                                     <th scope="col">Price</th>
                                     <th scope="col">Quantity</th>
                                     <th scope="col">Photo</th>
                                   </tr>
                                 </thead>
                                 <tbody>
                                     @foreach ($product_stocks as $id=>$variant)
                                     <tr>
                                       <th scope="row">{{ $id+1 }}</th>
                                       <td>{{ $variant->variant ?? 'N/A' }}</td>
                                       <td>{{ $variant->price ?? 'N/A'}}</td>
                                       <td>{{ $variant->qty }}</td>
                                       <td> no </td>
                                     </tr>
                                     @endforeach
                                 </tbody>
                                </table>
                                @endif
                         </div>
                    </div>
                    <div class="card">
                        <div class="card-header text-bold"> Product Details</div>
                        <div class="card-body table-responsive">
                            @if (isset($product))

                            <table class="table table-bordered table-hover">
                                <thead class="bg-info">
                                    <tr>
                                        <th>Name</th>
                                        <th>Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th>Product Name</th>
                                    <td>{{ucfirst($product->name) ?? "N/A"}}</td>
                                </tr>
                                <tr>
                                    <th>Slug</th>
                                    <td>{{$product->slug ?? "N/A"}}</td>
                                </tr>
                                <tr>
                                    <th>Product Type</th>
                                    <td>{{$product->product_type ?? "N/A"}}</td>
                                </tr>
                                <tr>
                                <tr>
                                    <th> Product Price</th>
                                    <td>{{$product->product_price ?? "N/A"}}</td>
                                </tr>
                                @if (isset($product->product_stock))
                                <tr>
                                    <th> Product Stock</th>
                                    <td>{{$product->product_stock ?? "N/A"}}</td>
                                </tr>
                                @endif

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
                                {{-- <tr>
                                    <th> Product Image</th>
                                    <td>
                                        @if ($product->product_image)
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
                                </tr> --}}
                            </tbody>
                            </table>

                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
