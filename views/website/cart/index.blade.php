@extends('website.layout.app')
@section('title','your cart page')
@section('body')


    <style>
        .row{align-items: center;}
        .empty_cart{
            height: 200px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
        }
    </style>


    <!--category toggle section end-->
    <section class="home_all">
        <div class="container">
            <div class="row">
                <div class="home_alls">
                    <ul>
                        <li><a target="blank" href="index.html">Home</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                        <li><a target="blank" href="">Shopping Cart</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!---section unit price   part start--->
    <section class="unit-price">
        <div class="container">

            @if(count($products) > 0)

            <div class="row">
                <div class="cl-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="all-unit">
                        <form action="{{route('cart.update')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="prod totall-units1">
                                <div class="row">
                                    <div class="unit5 col-lg-1 col-md-1 col-sm-1">
                                        <input style="display: block;width: 15px;position: relative;left: 69%;" class="form-check-input all_select" type="checkbox" value="0" id="flexCheckChecked">
                                        <button type="button" class="btn checked_del" style="padding: 5px;">Delete</button>
                                    </div>
                                    <div class=" unit1 col-lg-4 col-md-3 col-sm-3">
                                        <div class="checktype"><input type="checkbox" name=""></div>
                                        <div class=" prod pro-unit"><p>Product</p></div>
                                    </div>
                                    <div class="unit2 col-lg-2 col-md-2 col-sm-2">
                                        <div class=" punity pro-unit1"><p>Unit Price</p></div>
                                    </div>
                                    <div class="unit3 col-lg-2 col-md-3 col-sm-3">
                                        <div class=" punity pro-unit2"><p>Quantity</p></div>
                                    </div>
                                    <div class="unit4 col-lg-2 col-md-2 col-sm-2">
                                        <div class=" punity pro-unit3"><p>Total Price</p></div>
                                    </div>
                                    <div class="unit5 col-lg-1 col-md-1 col-sm-1">
                                        <div class=" punity pro-unit4"><p>Actions</p></div>
                                    </div>
                                </div>
                            </div>
                            <div class="totall-units">
                                
                                @php( $sum = 0 )
                                @php( $shipping_cost = 0 )
                                @foreach($products as $key=> $product)
                                    <div class="row" style="border-bottom: 1px solid lightgray; margin-top: 20px; margin-bottom: 20px; align-items: center; padding-bottom: 16px;">
                                        <div class="decrease unit5 col-lg-1 col-md-1 col-sm-1 col-sm-1 col-xs-1">
                                            <input id="{{$product->id}}" style="display: block;width: 15px;position: relative;left: 69%;" class="form-check-input cart_input" type="checkbox" value="0" id="flexCheckChecked">
                                        </div>
                                        <div class="unit1 col-lg-4 col-md-3 col-sm-3 col-sm-12 col-xs-12">
                                            <div class="pro-imge">
                                                <img src="{{$product->image}}" width="50" height="50" alt="image">
                                            </div>
                                            <div class="protx">
                                                <p><a class="nav-link" href="{{route('product.details',$product->id)}}">{{$product->name}}</a></p>
                                                <input type="hidden" name="name[]" class="form-control" value="{{$product->name}}">

                                                @if($product->size_id != '')
                                                <span>Size : {{$product->size_id}}</span>,
                                                @endif

                                                @if($product->color_id != '')
                                                <span>Color : {{$product->color_id}}</span>
                                                @endif
                                                
                                            </div>
                                        </div>
                                        <div class="unit2 col-lg-2 col-md-2 col-sm-2 col-sm-3 col-xs-6">
                                            <div class="pro-ratee" style="display: none;"><p>Unit Price</p></div>
                                            <div class="pro-rate">
                                                <p>$ {{$product->price}}</p>
                                            </div>
                                        </div>
                                        <div class="decrease unit3 col-lg-2 col-md-3 col-sm-3 col-sm-4 col-xs-4">
                                            <div class="pro-ratee pro_qun" style="display: none;"><p>Quantity</p></div>
                                            <div class="counter">
                                                <span class="down" id="{{$key}}" onClick='decreaseCount({{ $product->product_id }}, this)'>-</span>
                                                <input type="text" class="form-control counterQty" name="data[{{$key}}][qty]" value="{{$product->qty}}">
                                                <span class="up" id="{{$key}}" onClick='increaseCount({{ $product->product_id }}, this)'>+</span>
                                                <input type="hidden" class="form-control form-control-sm" name="data[{{$key}}][rowId]" value="{{$product->rowId}}">
                                            </div>
                                        </div>
                                        <div class="unit4 col-lg-2 col-md-2 col-sm-2 col-sm-3 col-xs-6">
                                            <div class="pro-ratee" style="display: none;"><p>Total Price</p></div>
                                            <div class="pro-rate"><p> ${{$product->price*$product->qty}}</p></div>
                                        </div>
                                        <div class="decrease unit5 col-lg-1 col-md-1 col-sm-1 col-sm-1 col-xs-1">
                                            <div class="pro-ratee" style="display: none;"><p>Actions </p></div>
                                            <div class="pro-del">
                                                <a href="{{route('cart.delete',['rowId'=>$product->id])}}" onclick="return confirm('are you sure to delete?')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                        <div class="increase col-lg-2 col-md-3 col-sm-3 col-sm-4 col-xs-6" style="display: none;">
                                            <div class="dis pro-ratee" style="display: none;"><p>Quantity</p></div>
                                            <div class="counter">
                                                <span class="down" onClick='decreaseCount(event, this)'>-</span>
                                                <input type="text" value="1">
                                                <span class="up"  onClick='increaseCount(event, this)'>+</span>
                                            </div>
                                        </div>                                        

                                    </div>
                                    @php($shipping_cost = $shipping_cost + $product->shipping_cost)
                                    @php($sum = $sum + $product->price*$product->qty)
                                @endforeach

                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-12 ms-auto my-2">
                                    <!-- <button type="submit" class="btn btn-success">Update Cart</button> -->
                                    <a href="{{route('home')}}" class="btn btn-success">Continue shopping</a>
                                </div>
                            </div>
                        </form>

                        <div class="order-summary" style="border-bottom: 1px solid lightgray; margin-top: 20px;">
                            <div class="row">
                                <div class="Summary col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <div class="Summary">
                                        <h4>Order Summary</h4>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                    <div class="Voucher">
                                        <div class="encod">
                                            <input type="text" placeholder="Enter Voucher Code">
                                        </div>
                                        <div class="enbutton">
                                            <input type="submit" value="APPLY">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="Subtotals col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <div class="shiping">
                                        <p>Subtotal ({{count($products)}} items)</p>
                                    </div>
                                </div>
                                
                                <div class="Subtotal col-lg-3 col-md-3 col-sm-3 col-xs-6" style="display: none;">
                                    <div class="shiping">
                                        <p>Shipping Fee</p>
                                    </div>
                                </div>
                                <div class="Subtotals col-lg-3 col-md-3 col-sm-3 col-xs-3" >
                                    <div class="shiping-t">
                                        <p> ${{$sum}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="Subtotals col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <div class="shiping">
                                        <p>Tax 5%</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-2 col-xs-6">
                                    <div class="shiping-t">
                                        <p>${{$tax = round ($sum * 0.05) ?? 'No Tax'}}</p>
                                    </div>
                                </div>
                            </div>                                
                            <div class="row">                                
                                <div class="Subtotals col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <div class="shiping">
                                        <p>Shipping Fee</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-2 col-xs-6">
                                    <div class="shiping-t">
                                        <p>${{$shipping_cost}}</p>
                                    </div>
                                </div>                                
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <div class="shiping-tt">
                                        <p>Total</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
                                    <div class="shiping-tt">
                                        <p> ${{$sum+$shipping_cost+$tax}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="proceed">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="proce">
                                        <a href="{{route('cart.checkout')}}">PROCEED TO CHECKOUT ({{count($products)}})</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
                <div class="empty_cart">
                    @include('empty-space')
                </div>
            @endif
        </div>
    </section>

    
@endsection

