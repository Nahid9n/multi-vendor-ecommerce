@extends('admin.master')
@section('title','Product Detail')
@section('body')
<div class="row mt-5">
    <div class="col">
        <div class="card">
            <div class="card-header border-bottom justify-content-between">
                <h3 class="card-title text-bold">Whole Sale Product Details Table</h3>
                <a href="{{route('whole-sale-product.index')}}" class="btn btn-primary my-1 text-center">All Product</a>
            </div>
            <div class="card-body">
                <div class="card">
                    <div class="card-header text-bold">Product variants</div>
                    <div class="card-body">
                         @if ($product_stocks)
                         <table class="table table-bordered">
                             <thead>
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
                    <div class="card-header text-bold">Single Product Details</div>
                    <div class="card-body">
                        @if (isset($product))

                        <table class="table table-bordered table-hover">

                            <tr>
                                <th>Product Name</th>
                                <td>{{$product->name ?? "N/A"}}</td>
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
                            <tr>
                                <th> Product Quantity</th>
                                <td>{{$product->product_stock ?? "N/A"}}</td>
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
                                <th>Amount</th>
                                <td>{{$product->amount ?? "N/A"}}</td>
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
                                <th> Estimate Shipping Time</th>
                                <td>{{$product->estimate_shipping_time ?? "N/A"}}</td>
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

                        </table>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

