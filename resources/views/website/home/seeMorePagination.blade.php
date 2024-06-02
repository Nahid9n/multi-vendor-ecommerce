@foreach($products as $product)
<div class="col-xl-3 my-2 col-lg-4 col-md-6 col-sm-12" data-value="{{ $loop->iteration + $skip }}" title="{{$product->name}}">
    <div class="card" style="height: 470px">
        <div class="card-header border-0 p-0 m-0 text-center">
            <a href="{{route('product.details',$product->slug)}}">
                @if($product->product_image != '')
                    <img src="{{asset($product->product_image)}}" class="p-0" width="200" height="200" alt="a" />
                @else
                    <img src="{{asset('/no_image.jpg')}}" class="p-0" width="200" height="200" alt="a" />
                @endif
            </a>
        </div>
        <div class="card-body">
            <div class="ratings hidden-sm">
                                                <p>
                                                    @php
                                                        $reviews =   App\Models\ProductReview::where('product_id',$product->id)->where('status',1)->get();
                                                        $review = 0;
                                                        $starTotal = 0;
                                                        if (count($reviews) != 0 ){
                                                            $starTotal = 0;
                                                            foreach ($reviews as $review){
                                                                $starTotal = $starTotal + $review->rating;
                                                            }
                                                            $review = $starTotal / count($reviews);
                                                        }
                                                    @endphp
                                                    @if(isset($review))
                                                        @if($review == 0)
                                                            <i class="fa fa-star text-secondary"></i>
                                                            <i class="fa fa-star text-secondary"></i>
                                                            <i class="fa fa-star text-secondary"></i>
                                                            <i class="fa fa-star text-secondary"></i>
                                                            <i class="fa fa-star text-secondary"></i>
                                                        @elseif($review >= 1 && $review < 2)
                                                            <i class="fa fa-star text-danger"></i>
                                                            <i class="fa fa-star text-secondary"></i>
                                                            <i class="fa fa-star text-secondary"></i>
                                                            <i class="fa fa-star text-secondary"></i>
                                                            <i class="fa fa-star text-secondary"></i>
                                                        @elseif($review >= 2 && $review < 3)
                                                            <i class="fa fa-star text-danger"></i>
                                                            <i class="fa fa-star text-danger"></i>
                                                            <i class="fa fa-star text-secondary"></i>
                                                            <i class="fa fa-star text-secondary"></i>
                                                            <i class="fa fa-star text-secondary"></i>
                                                        @elseif($review >= 3 && $review < 4)
                                                            <i class="fa fa-star text-danger"></i>
                                                            <i class="fa fa-star text-danger"></i>
                                                            <i class="fa fa-star text-danger"></i>
                                                            <i class="fa fa-star text-secondary"></i>
                                                            <i class="fa fa-star text-secondary"></i>
                                                        @elseif($review >= 4 && $review < 5)
                                                            <i class="fa fa-star text-danger"></i>
                                                            <i class="fa fa-star text-danger"></i>
                                                            <i class="fa fa-star text-danger"></i>
                                                            <i class="fa fa-star text-danger"></i>
                                                            <i class="fa fa-star text-secondary"></i>
                                                        @elseif($review == 5)
                                                            <i class="fa fa-star text-danger"></i>
                                                            <i class="fa fa-star text-danger"></i>
                                                            <i class="fa fa-star text-danger"></i>
                                                            <i class="fa fa-star text-danger"></i>
                                                            <i class="fa fa-star text-danger"></i>
                                                        @endif
                                                    @endif
                                                    <span> ({{count($reviews) ?? 0 }})</span>
                                                </p>
                                            </div>
            <a class="" href="{{route('product.details',$product->slug)}}">{{ truncateWords($product->name, 14) }}</a>
            <p class="">Category: {{$product->category->name}}</p>
            <p class="">Brand: {{$product->brand->name}}</p>
            <p class="">Price : {{$product->product_price}} {{$currency->symbol ?? ''}}</p>
                @if (isset($product->product_stock))
                        @if ($product->product_stock <=0)
                        <p class="text-danger">Out of Stock</p>
                        @endif
                @endif
            <div class="ratings d-flex justify-content-end hidden-sm">
                <!-- <abbr title="Add to cart" class="d-flex align-items-center">
                    @if($product->product_select == 'single_product')
                        <button onclick="productModalSingleProduct({{ $product->id }})" class="productModal" id="{{ $product->id }}" href="javascript:void(0)" class="navbar-brand mx-2"><i class="price-text-color fa fa-2x fa-shopping-cart"></i></button>
                    @else
                        <button onclick="productModal({{ $product->id }})" class="productModal" id="{{ $product->id }}" href="javascript:void(0)" class="navbar-brand mx-2"><i class="price-text-color fa fa-2x fa-shopping-cart"></i></button>
                    @endif
                </abbr>
                <abbr title="Add to Wishlist">
                    @if($product->product_select == 'single_product')
                        <a class="addToWish navbar-brand mx-2" href="{{ route('add-to-wishlist', $product->id )}}"><i class="price-text-color fa fa-1x fa-heart"></i></a>
                    @else
                        <button onclick="productModalWish({{ $product->id }})" class="productModal navbar-brand mx-2" id="{{ $product->id }}" href="javascript:void(0)"><i class="price-text-color fa fa-1x fa-heart"></i></button>
                    @endif
                </abbr> -->
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endforeach

