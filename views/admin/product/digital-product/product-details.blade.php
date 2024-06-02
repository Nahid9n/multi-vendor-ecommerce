@extends('admin.master')
@section('title','Product Detail')
@section('body')
<div class="row mt-5">
    <div class="col">
        <div class="card">
            <div class="card-header row border-bottom">
                <div class="col-6">
                    <h3 class="card-title">Product Details Table</h3>
                </div>
                <div class="col-6">
                    <a href="{{route('admin.digital.product')}}" class="btn btn-success my-1 float-end mx-2 text-center"><i class="fa fa-list"></i> All Digital Product</a>
                    <a href="{{route('admin.digital.product.edit',$product->id)}}" class="btn btn-warning my-1 float-end mx-2 text-center"><i class="fa fa-edit"></i> Edit</a>
                </div>
            </div>
            <div class="card-body">
                <div class="card">
                    <div class="row">
                        <div class="col-md-4 text-center">
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
                                <th>File</th>
                                <td>
                                    @if(isset($file->file))
                                        <img src="{{asset($file->file)}}" alt="" class="img-fluid" width="200">
                                        <p class="fw-semibold">{{$file->file_name}}</p>
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <th>Product Type</th>
                                <td>{{ucfirst($product->product_type) ?? "N/A"}}</td>
                            </tr>
                            <tr>
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
                            <td>
                                <input type="text" data-role="tagsinput" value="{{ $product->tags ?? "N/A"}}" name="tags" class="form-control" placeholder="type & press enter" readonly>
                            </td>
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

