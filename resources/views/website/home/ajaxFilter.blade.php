@forelse($products as $product)
<div class="col-xl-3 my-2 col-lg-4 col-md-6 col-sm-12 colsm6 cart_item" title="{{ $product->name }}">
    <div class="card" style="height: 470px">
        <div class="card-header border-0 p-0 m-0 text-center">
            <a href="{{route('product.details',$product->slug )}}">
                @if($product->product_image != '')
                    <img src="{{asset($product->product_image)}}" class="p-0" width="200" height="200" alt="a" />
                @else
                    <img src="{{asset('/no_image.jpg')}}" class="p-0" width="200" height="200" alt="a" />
                @endif
            </a>
        </div>
        <div class="card-body">
            <div class="ratings hidden-sm ">
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
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@empty
    @include('empty-space')
@endforelse
{{--@if(count($products) > 12 )
    <div style="margin: 0 auto; width: 100%; text-align: center;">
        <button id="see_more" class="loginBtn">See more</button>
        <img id="loader" src="{{ asset('website/assets/image/loader.gif')}}">
    </div>
@else

@endif--}}
