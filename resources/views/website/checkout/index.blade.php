@extends('website.layout.app')
@section('title','Checkout Page')
@section('body')
    <!--home_all section start-->
    <section class="home_all">
        <div class="container">
            <div class="row">
                <div class="home_alls">
                    <ul>
                        <li><a target="blank" href="{{route('home')}}">Home</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                        <li><a target="blank" href="{{route('cart.index')}}">Cart</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                        <li><a href="#">Check Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--billing_all section start-->
    <section class="billing_details">
        <div class="container">
            <form action="{{route('order')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="name" value="">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="bill_form">
                            <h2>Billing Details</h2>
                                <div class="1st_input">
                                    <div><label for="fist">Name</label></div>
                                    <input id="fist" type="text" name="name" class="form-control" value="{{ auth()->user()->name }}" readonly required>
                                </div>
                                <div class="7st_input">
                                    <div><label for="email">Email Address</label></div>
                                    <input id="email" type="email" name="email" class="form-control" value="{{ auth()->user()->email }}" readonly required>
                                </div>
                                <div class="3st_input">
                                    <div><label for="stree">Delivery address</label></div>
                                    <input id="stree" type="text" name="delivery_address" class="form-control" required>
                                </div>
                                <div class="6st_input">
                                    <div><label for="num">Phone Number</label></div>
                                    <input id="num" type="number" class="form-control" name="phone" required>
                                </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 ">
                        <div class="billings">
                            @php($shipping_cost = 0)
                            @php($sum = 0)
                            @php($discount = 0)
                            @php($discountTotal = 0)
                            @foreach($cartContent as $product)
                            <div class="row mb-5">
                                <div class="unit1 col-lg-6 col-md-6 col-sm-6 col-sm-6 ">
                                    <div class="pro-imge d-flex"><img src="{{asset($product->image)}}" width="50" height="50" alt="image">
                                        <div class="protx prootx ml-3">
                                            <p>{{$product->name}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="unit2 col-lg-6 col-md-6 col-sm-6 col-sm-6 ">
                                    @if($product->product_id == (Session::get('productProduct_id')))
                                        @if(Session::has('discount'))
                                                <p hidden>{{$discount = ( Session::get('discount') ) * $product->qty }}</p>
                                                <div class="pro-rate"><p>{{$currency->symbol ?? '' }} {{$price =(($product->price - (Session::get('discount'))) * $product->qty)}}</p></div>
                                        @else
                                            <div class="pro-rate"><p>{{$currency->symbol ?? '' }}  {{$price = ($product->price * $product->qty)}}</p></div>
                                        @endif
                                    @else
                                        <p hidden>{{$discount = 0 }}</p>
                                        <div class="pro-rate"><p>{{$currency->symbol ?? '' }}  {{$price = ($product->price * $product->qty)}}</p></div>
                                    @endif
                                    <div class="pro-rate"><p>quantity : {{number_format($product->qty)}}</p></div>
                                </div>
                            </div>
                                @php($shipping_cost = $shipping_cost+ $product->shipping_cost)
                                @php($sum = $sum + $price)
                                @php($discountTotal = $discountTotal + $discount)
                            @endforeach
                            <div class="row" style="border-bottom: 2px solid lightgray;">
                                <div class="Subtotals col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="shiping">
                                        <p>Subtotal :</p>
                                    </div>
                                </div>
                                <div class="Subtotals col-lg-6 col-md-6 col-sm-6 col-xs-6" >
                                    <div class="shiping-t">
                                        <p>{{$currency->symbol ?? '' }}  {{number_format($sum)}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="order-summary" style=" margin-top: 20px;">
                                <div class="row mb-3" style="border-bottom: 2px solid lightgray;">
                                    <div class="Subtotals col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="shiping">
                                            <p>Shipping :</p>
                                        </div>
                                    </div>
                                    <div class="Subtotal col-lg-6 col-md-6 col-sm-6 col-xs-6" >
                                        <div class="shiping-t">
                                            <p>{{$currency->symbol ?? '' }}  {{number_format($shipping_cost) ?? 'Free'}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3" style="border-bottom: 2px solid lightgray;">
                                    <div class="Subtotals col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="shiping">
                                            <p>tax (5%) : </p>
                                        </div>
                                    </div>
                                    <div class="Subtotal col-lg-6 col-md-6 col-sm-6 col-xs-6" >
                                        <div class="shiping-t">
                                            <p>{{$currency->symbol ?? '' }}  {{$tax = round ($sum * 0.05) ?? 'No Tax'}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="shiping">
                                            <p>Total : </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="shiping">
                                            <p>{{$currency->symbol ?? '' }} {{ $orderTotal = $sum + $tax + $shipping_cost }}</p>
                                        </div>
                                    </div>
                                </div>

                                @if(Session::has('discount'))
                                    <div class="row mb-3">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <div class="shiping">
                                                @if(Session::get('couponType') == 'product')
                                                <p>Discount Amount (product base): </p>
                                                @else
                                                    <p>Discount Amount (Total Order): </p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <div class="shiping">
                                                @if(Session::has('discount'))
                                                    @if(Session::get('couponType') == 'product')
                                                        <p>{{$currency->symbol ?? '' }} {{ $discountTotal }} (deducted from the product price)</p>
                                                    @else
                                                        <p> - {{$currency->symbol ?? '' }} {{ Session::get('discount') }}</p>
                                                    @endif

                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <div class="shiping-tt">
                                                <p>Sub Total : </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <div class="shiping-tt">
                                                @if(Session::get('couponType') == 'product')
                                                    <p>{{$currency->symbol ?? '' }} {{ $orderTotal = ($sum + $tax + $shipping_cost)}}</p>
                                                @else
                                                    <p>{{$currency->symbol ?? '' }} {{ $orderTotal = ($sum + $tax + $shipping_cost) - Session::get('discount') }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="row mb-3">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <div class="shiping-tt">
                                                <p>Sub Total : </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <div class="shiping-tt">
                                                <p>{{$currency->symbol ?? '' }} {{ $orderTotal = $sum + $tax + $shipping_cost }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif




                                <div class="row">
                                    <div class="bill_pay col-lg-6 col-md-6 col-sm-6 col-xs-6">

                                        <div class="input-group mb-5">
                                            <div class="row">
                                                <div class="col-md-3 payment_types_content">
                                                    <input type="radio" class=" radio-btn mt-2" name="payment" value="wallet" required>
                                                </div>
                                                <div class="col-md-9 d-flex align-items-center">
                                                    <p class="text-dark align-items-center">Wallet</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="input-group mb-5">
                                            <div class="row">
                                                <div class="col-md-3 payment_types_content">
                                                    <input type="radio" class=" radio-btn mt-2" name="payment" value="cash_on_delivery" required>
                                                </div>
                                                <div class="col-md-9 d-flex align-items-center">
                                                    <p class="text-dark align-items-center">Cash on delivery</p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="bill_pay col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="shiiping-tt">
                                            <img src="{{asset('/')}}website/assets/img/Frame 834.png" alt="payment method">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="text-center border-0" >
                                            <button class="btn" type="submit">Place Order</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if(Session::has('cartTotal'))
                    <input type="hidden" class="form-control" name="order_total" value="{{ Session::get('cartTotal') }}">
                @else
                    <input type="hidden" class="form-control" name="order_total" value="{{$orderTotal}}">
                @endif
                <input type="hidden" class="form-control" name="shipping_total" value="{{$shipping_cost}}">
                <input type="hidden" class="form-control" name="tax_total" value="{{$tax}}">
                <input type="hidden" class="form-control" name="usedCoupon_id" value="{{ Session::get('usedCoupon_id')}}">
                <input type="hidden" class="form-control" name="usedUser_id" value="{{ Session::get('usedUser_id')}}">
                <input type="hidden" class="form-control" name="discount" value="{{ $discount }}">
                <input type="hidden" class="form-control" name="single_discount" value="{{ (Session::get('discount')) }}">
                <input type="hidden" class="form-control" name="productProduct_id" value="{{ Session::get('productProduct_id') }}">
            </form>
            @php($orderTotalAmount = 0)
            @foreach($cartContent as $product)
                <p hidden>{{$orderTotalAmount = $orderTotalAmount + ($product->price * $product->qty)}}</p>
            @endforeach

            <div class="mb-3">
                <div class="row">
                    <div class="col-lg-6">
                        <form action="{{route('coupon.apply')}}" class="" method="post">
                            @csrf
                            <input type="hidden" class="form-control" name="order_total" value="{{ $orderTotalAmount }}">
                            <div class="input-group text-dark">
                                <button class="btn text-white btn-outline-primary">Apply Coupon (optional)</button>
                                <input type="text" class="form-control" name="coupon" placeholder="Coupon Code" required>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--popup section start-->
    <section>
        <div class="modal fade pop_up" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body ">
                        <img src="img/boxs.png" alt="">
                        <h5>Your Order is Confirmed!</h5>
                        <h6>Thanks For Your Order</h6>
                    </div>
                    <div class="modal-footer border-top-0 pop_btn">
                        <button type="button" class="btn close bg-light">Done</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
