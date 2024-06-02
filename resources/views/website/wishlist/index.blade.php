@extends('website.layout.app')
@section('title','Wishlist')
@section('body')


<section class="product_all mt-4">
        <div class="container-fluid">
            <!-- ROW-1 OPEN -->
            <div class="row justify-content-center">
                <div class="col-xl-12 col-md-12">
                    <div class="card cart">
                        <div class="card-header border-bottom">
                            <h3 class="card-title p-3 text-center">My Wish List</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered border-bottom text-nowrap">
                                    <thead>
                                        <tr class="border-top">
                                            <th class="w-15">Product</th>
                                            <th class="w-5">Title</th>
                                            <th class="w-15">Price</th>
                                            <th class="w-10 text-center">Status</th>
                                            <th class="w-10 text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($products as $product)
                                        @php
                                            $pro =   App\Models\Product::find($product->product_id)
                                        @endphp
                                        <tr>
                                            <td class="col-1">
                                                <a href="{{route('product.details',$pro->slug)}}">
                                                    <img src="{{ asset($product->product->product_image) }}" class="" alt="a"/>
                                                </a>
                                            </td>
                                            <td class="d-grid align-content-center">
                                                <a class=""  style="font-size: 15px" href="{{route('product.details', $pro->slug)}}">{{$product->product->name}}</a>
                                            </td>
                                            <td  class="d-grid align-content-center"><p class="">Price : {{$product->product->product_price}} {{$currency->symbol ?? ''}}</p></td>
                                            <td class="d-grid align-content-center text-center" style="font-size: 20px">
                                                <span class="p-2 text-white {{$product->product->product_stock == 0 ? 'bg-danger':'bg-primary'}}">
                                                    {{$product->product->product_stock == 0 ? 'Stock Out':'Stock'}}
                                                </span>
                                            </td>
                                            <td class="d-grid align-content-center text-center">
                                                <a href="{{ route('add-wishlist-product-to-cart', $product->id)}}" class="btn btn-sm m-1 addWishToCart" data-bs-toggle="tooltip" title="" data-bs-original-title="add to cart" >
                                                    <i class="fa fa-shopping-cart text-white fs-13"></i>
                                                </a>
                                                <a href="{{ route('wishlist.destroy', $product->id)}}" class="btn btn-danger br-50 m-1" style="background-color: red" data-bs-toggle="tooltip" title="" data-bs-original-title="add to cart" >
                                                    <i class="fa fa-trash-o text-white fs-13"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5"><p class="text-danger text-center text-bold">No Product Found !!</p></td>
                                        </tr>

                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="float-end">
                                {{$products->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ROW-1 CLOSED -->

        </div>
    </section>

@endsection
