@extends('website.layout.app')
@section('title','Product Details')
@section('body')
<style>
    .sold_cht {
        text-align: center;
    }

    .sold_cht button {
        background: transparent;
        border: none;
        color: #fff;
        padding: 0;
        margin: 0;
        width: 100%;
    }

    .addToWish i {
        font-size: 12px;
        color: #ffffff;
        padding: 0;
    }

    .addToWish:hover i{
        color: #fff;
    }

</style>
<section class="home_all">
    <div class="container">
        <div class="row">
            <div class="home_alls">
                <ul>
                    <li><a target="blank" href="index.html">Home</a></li>
                    <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    <li><a target="blank" href="product.html">{{$product->name}}</a></li>
                    <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!--product_detailes_section start-->
<section class="pro_detailes_part">
    <div class="container-fluid">
        <form action="{{route('cart.store')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6 col-sm-6 fanledf">
                    <div class="">
                        <img class="img-fluid w-100 active" src="{{asset($product->product_image)}}" alt="image" id="bgimg">
                    </div>
                    <div class="pro_small_img">
                        @if(isset($otherImages))
                        @foreach($otherImages as $productImage)
                        <div class="pro_sm_group">
                            <img src="{{asset($productImage)}}" width="100" class="sm_imge mx-1" alt="image">
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 fanled">
                    <div class="pro_price_part">
                        <input hidden type="text" name="id" value="{{$product->id}}">
                        <h5>{{$product->name}}</h5>
                        <div class=" align-items-center">
                            <div class="">
                                <span class="rating_pro">
                                    <i class='fa fa-star'></i>
                                    <i class='fa fa-star'></i>
                                    <i class='fa fa-star'></i>
                                    <i class='fa fa-star'></i>
                                    <i class='fa fa-star-o'></i>
                                </span>
                                <span class="ml-1">(0 Reviews)</span>
                            </div>
                            <div class="">
                                <input type="hidden" name="price" value="{{$product->product_price}}" readonly>
                                <h5 class="text-dark">Price : <span id="p_price">{{$product->product_price}} .{{$currency->symbol ?? ''}}</span></h5>
                            </div>
                        </div>
                    </div>
                    <div class="pro_det_all">
                        <div style="margin-top: 10px; margin-bottom: 10px;" class="ml">
                            <span class="mr-2 opacity-50">Type :</span>{{(str_replace('_',' ',ucwords($product->product_type))) ?? ''}}
                        </div>
                        <div style="margin-bottom: 10px;" class="ml">
                            <span class="mr-2 opacity-50">Brand :</span>{{$product->brand->name ?? ''}}
                        </div>
                        <div style="margin-bottom: 10px;" class="ml">
                            <span class="mr-2 opacity-50">{{$product->short_description ?? ''}}</span>
                        </div>
                    </div>
                    <div class="pro_det_all1"> <!-- pro_det_all -->
                        <div style="margin-bottom: 10px;" class="ml mt-2">
                            <span class="mr-2 opacity-50">Protection :</span>{{$product->refund == 1 ? "Refundable":'Not Refundable'}}
                        </div>
                        <div style="margin-bottom: 10px;" class="ml">
                            <span class="mr-2 opacity-50">Delivery :</span>{{$product->cash_on == 1 ? 'cash on':'online'}}
                        </div>
                        <div style="margin-bottom: 10px;" class="ml">
                            <span class="mr-2 opacity-50">Shipping :</span>{{$product->shipping_cost}}.Tk
                        </div>
                    </div>

                    <div class="cl_sz_part">

                        <div style=" display: grid; grid-template-columns: repeat(2,1fr);">

                        @if ($product->choice_options != null)
                            @foreach (json_decode($product->choice_options) as $key => $choice)
                                <div class="row mb-3">
                                    <div class="col-sm-12">
                                    <select name="size" class="form-control size">
                                        @foreach (json_decode($product->choice_options) as $choice)
                                               <option>{{ get_single_attribute_name($choice->attribute_id) }}</option>
                                                @foreach ($choice->values as $value)
                                                    <option value="{{ $value }}">{{ $value }}</option>
                                                @endforeach
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                        @if ($product->colors != null && count(json_decode($product->colors)) > 0)
                            <div class="row no-gutters mb-3">
                                <div class="col-sm-12">
                                    <select name="color" class="form-control color">
                                        <option value="">Color </option>
                                        @foreach (json_decode($product->colors) as $color)
                                            <option value="{{ get_single_color_name($color) }}">{{ get_single_color_name($color) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endif
                        </div>

                        <div class="row">
                            <div class=" p-2 shadow-none shadow-0 border-0">
                                <div class="decrease unit3 col-lg-3 col-md-3 col-sm-4 col-xs-4">
                                    <div class="pro_qun pro-ratee " style="display: none;">
                                        <p>Quantity</p>
                                    </div>
                                    <div class="pro_counter">
                                        <span style="border-radius: 4px 0px 0px 4px;" class="down" onClick='decreaseCount(event, this)'>-</span>
                                        <input type="number" name="qty" value="1" class="form-control" min="1" placeholder="0">
                                        <span class="qty-increase" class="up" onClick='increaseCount(event, this, 2)'>+</span>
                                        @if($product->product_select == 'product_variation')
                                        <button onclick="productAddToWishlistVariant({{$product->id}})" class="btn btn-sm mx-1" type="button"><i class="fa fa-heart"></i></button>
                                        @else
                                            <a href="{{ route('add-to-wishlist', $product->id )}}" class="btn btn-sm mx-1 addToWish"><i class="fa fa-heart"></i></a>
                                        @endif
                                        <button class="btn btn-sm" type="submit"><i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="but_part">
                            <a href="#">Buy Now</a>
                        </div>
                    </div>

                </div>

                <div class="col-xl-3 col-lg-3 sell_profff">
                    <div class="check_icon_right"><a href="#"><img src="{{asset('/')}}website/assets/img/gp.png" alt="img"></a></div>
                    <div class="pro_right_part">
                        <div class="sell_prof">
                            <div class="sold_by">
                                <img src="{{asset('/')}}website/assets/img/Rectangle 246.png" alt="img">
                                <div class="sold_by_tx">
                                    <span>Sold by: </span><br>
                                    <span>Ashik Trading</span>
                                </div>
                            </div>
                            <div class="sold_add">
                                <div class="bog_ban d-flex">
                                    <img src="{{asset('/')}}website/assets/img/flag.png" alt="img">
                                    <p>Bogura, Bangladesh</p>
                                </div>
                                <div class="ver_sel d-flex">
                                    <img src="{{asset('/')}}website/assets/img/verified_user.png" alt="img">
                                    <p>Verified Seller</p>
                                </div>
                                <div class="ent_shi d-flex">
                                    <img src="{{asset('/')}}website/assets/img/language.png" alt="img">
                                    <p>Entire Bangladesh Shipping</p>
                                </div>
                            </div>
                            <div class="sold_cht">
                                <!-- <a id="chatModalBTN" href="javascript:void(0)" data-toggle="modal" data-target="#chatModal" data-id="{{ $product->user_id; }}">Chat</a> -->
                                <button type="button" onclick="openChat('{{ $product->user_id }}')">Message Seller</button>
                            </div>
                            <div class="sold_prf">
                                <a href="#">Seller’s profile</a>
                            </div>
                        </div>
                        <div class="pro_re_dely">
                            <div class="free-dlv d-flex">
                                <img src="{{asset('/')}}website/assets/img/icon-delivery.png" alt="icon">
                                <div class="retu_dlv_text">
                                    <h6>Free Delivery</h6>
                                    <p>Enter your postal code <br> for Delivery Availability</p>
                                </div>
                            </div>
                            <div class="retu_dlv d-flex">
                                <img src="{{asset('/')}}website/assets/img/Icon-return.png" alt="icon">
                                <div class="retu_dlv_text">
                                    <h6>Return Delivery</h6>
                                    <p>Free 30 Days Delivery Returns. <br> Details</p>
                                </div>
                            </div>
                        </div>
                        <div class="pro_right_social d-flex">
                            <span class="mr-2 opacity-50">Share :</span>
                            <ul class="d-flex">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
</section>
<!--product_detailes_section start-->
<!--product_all section start-->
<section class="">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-lg-3 proo_display">
                <div class="pro_all_sidebarss pro_all_sidebar ml-3">
                    <div class="catt_sidebar">
                        <span class="border-bottom">Sold by:</span>
                        <span style="float: right; color:#FBD303; font-size: 25px; margin-right: 5px;" class=""><i class="fa fa-star"></i></span>
                        <p style="border-top: 1px solid #ccc;">SEBL</p>
                        <div class="location">ঢাকা-বাংলাদেশ</div>
                        <div class="text-center">
                            <div class="rating mt-3">
                                <i class='fa fa-star'></i>
                                <i class='fa fa-star'></i>
                                <i class='fa fa-star'></i>
                                <i class='fa fa-star'></i>
                                <i class='fa fa-star-o'></i>
                            </div>
                            <div class="mb-2">(0 Customer reviews)</div>
                        </div>
                        <div class="col btn-vis">
                            <a href="#" class="  ">Visit Store</a>
                        </div>
                        <div class="colll">
                            <ul class="social list-inline mb-0">
                                <li class="list-inline-item mr-0">
                                    <a href="#" class="facebook" target="_blank">
                                        <i class="fa fa-facebook-f opacity-60"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item mr-0">
                                    <a href="#" class="twitter" target="_blank">
                                        <i class="fa fa-twitter opacity-60"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item mr-0">
                                    <a href="#" class="linkedin" target="_blank">
                                        <i class="fa fa-linkedin opacity-60"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="instagram" target="_blank">
                                        <i class="fa fa-instagram opacity-60"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="envelope" target="_blank">
                                        <i class="fa fa-envelope opacity-60"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class=" pl-3 mt-4">
                        <h3>Related Products</h3>
                        <!--                            --><?php //dd($relatedProducts)
                                                            ?>
                        @foreach($relatedProducts as $relatedProduct)
                        <div class=" pt-2">
                            <div class="">
                                <img width="100" height="100" src="{{asset($relatedProduct->image)}}" alt="">
                                <div>
                                    <i class=" fa fa-star"></i>
                                    <i class=" fa fa-star"></i>
                                    <i class=" fa fa-star"></i>
                                    <i class=" fa fa-star"></i>
                                    <i class=" fa fa-star-o"></i>
                                </div>
                            </div>
                            <div class="">
                                <p>{{$relatedProduct->name}}</p>
                                <div class="fdl"><a href="#">{{$relatedProduct->cash_on == 1 ? 'cash on':''}}</a></div>
                                <h5>{{$currency->symbol ?? ''}}{{$relatedProduct->selling_price}}</h5>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9">
                <!---section gallery top sell part3 start--->
                <div class="" style="margin-bottom: 20px;">
                    <div class=" col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-md-12 ">
                                        <div class="dashboard-menu">
                                            <ul class="nav flex-column " role="tablist">
                                                <li class="nav-item d-flex">
                                                    <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="fi-rs-settings-sliders mr-10"></i>Description</a>
                                                    <a class="nav-link" id="question-tab" data-bs-toggle="tab" href="#question" role="tab" aria-controls="question" aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>Customer Questions & Answer</a>
                                                    <a class="nav-link" id="track-orders-tab" data-bs-toggle="tab" href="#track-orders" role="tab" aria-controls="track-orders" aria-selected="false"><i class="fi-rs-shopping-cart-check mr-10"></i>Seller</a>
                                                    <a class="nav-link" id="track-orders-tab" data-bs-toggle="tab" href="#review-rating" role="tab" aria-controls="review-rating" aria-selected="false"><i class="fi-rs-shopping-cart-check mr-10"></i>Review & Ratings</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="tab-content dashboard-content">
                                            <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="mb-0">Product Description</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <p>{!! $product->long_description; !!}</p>
                                                    </div>
                                                    <div class="col-4">
                                                        <table class="table table-responsive table-striped">
                                                            <tr class="">
                                                                <th>Brand</th>
                                                                <td></td>
                                                            </tr>
                                                        </table>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="question" role="tabpanel" aria-labelledby="orders-tab">
                                                <div class="card p-3">
                                                {{--                                                        <h3 class="section-title style-1 mb-30 mt-30">Reviews ({{count($queires)}})</h3>--}}
                                                <!--Comments-->
                                                    <div class="comments-area style-2">
                                                        <div class="row">
                                                            <div class="col-lg-8">
                                                                <h4 class="mb-30">Customer questions & answers</h4>
                                                                <div class="comment-list">
                                                                    @foreach($queries as $key=>$query)
                                                                        <div class="border border-secondary-base my-1 bg-soft-secondary-base p-sm-4">
                                                                            <div class="row align-items-center">
                                                                                <div class="col-md-8">
                                                                                    <div class="col-md-8">
                                                                                        <div class="w-100 w-sm-auto">
                                                                                            <span class="fs-36 fw-bold mr-3">{{$query->user->name}}</span>
                                                                                        </div>
                                                                                        <p class="my-2">{{$query->question ?? ''}}</p>
                                                                                        <span class="my-2">{{date_format($query->created_at,'d M, Y h:m a')}}</span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-4 text-right">
                                                                                    @if(auth()->user())
                                                                                        @if($query->user_id == auth()->user()->id)
                                                                                            <div class="d-flex justify-content-end">
                                                                                                    <a class="mx-3 text-primary" href="#" data-bs-toggle="modal" data-bs-target="#queryEdit{{$key}}"><i class="fa fa-edit"></i></a>
                                                                                                    <a href="javascript:void(0);" class="text-success " data-bs-toggle="modal" data-bs-target="#queryReplyModal{{$key}}">
                                                                                                        <span class="d-md-inline-block"><i class="fa-solid fa-comment-dots"></i></span>
                                                                                                    </a>
                                                                                                    <a href="javascript:void(0);">
                                                                                                        <form style="padding: 0;" class="" action="{{route('customer.delete.queries',$query->id)}}" method="post">
                                                                                                            @csrf
                                                                                                            @method('delete')
                                                                                                            <button type="submit" class="border-0 shadow-none mx-3 bg-white text-danger" onclick="return confirm('are you sure to delete ? ')"><i class="fa fa-trash-o"></i></button>
                                                                                                        </form>
                                                                                                    </a>

                                                                                            </div>

                                                                                        @else
                                                                                            @if($product->user_id == auth()->user()->id)
                                                                                                <a href="javascript:void(0);" class="btn btn-secondary-base fw-400 rounded-0 text-white" data-bs-toggle="modal" data-bs-target="#queryReplyModal{{$key}}">
                                                                                                    <span class="d-md-inline-block">reply</span>
                                                                                                </a>
                                                                                            @elseif($query->user_id == $product->user_id)
                                                                                                <a href="javascript:void(0);" class="btn btn-secondary-base fw-400 rounded-0 text-white" data-bs-toggle="modal" data-bs-target="#queryReplyModal{{$key}}">
                                                                                                    <span class="d-md-inline-block">reply</span>
                                                                                                </a>
                                                                                            @endif
                                                                                        @endif
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            @foreach($query->replies as $reply)
                                                                            <div class="row my-2">
                                                                                <div class="col-md-1"></div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="w-100 w-sm-auto">
                                                                                            <img src="{{asset($reply->user->image)}}" alt="">
                                                                                            <span class="fs-36 fw-bold mr-3">{{$reply->user->name}}</span>
                                                                                        </div>
                                                                                        <p class="my-2">{{$reply->reply}}</p>
                                                                                        <span class="my-2">{{date_format($query->created_at,'d M, Y h:m a')}}</span>
                                                                                    </div>
                                                                                <div class="col-md-3 text-right">
                                                                                    @if(auth()->user())
                                                                                        @if($reply->user_id == auth()->user()->id)
                                                                                            <div class="menuthreedot">
                                                                                                <ul class="top-left-bar-ul">
                                                                                                    <li>
                                                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#queryReplyEdit{{$key}}">Edit</a>
                                                                                                    </li>
                                                                                                    <li>
                                                                                                        <form style="padding: 0;" class="nav-link text-light" action="{{route('customer.product.queries.delete',$reply->id)}}" method="post">
                                                                                                            @csrf
                                                                                                            @method('delete')
                                                                                                            <button type="submit" class="logioutBtn" onclick="return confirm('are you sure to delete ? ')">Delete</button>
                                                                                                        </form>
                                                                                                    </li>
                                                                                                </ul>
                                                                                            </div>
                                                                                        @endif
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                                <div class="modal fade" id="queryReplyEdit{{$key}}" tabindex="-1" role="dialog" aria-labelledby="queryReplyEditModalLabel{{$key}}" aria-hidden="true">
                                                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <h5 class="modal-title" id="queryReplyEditModalLabel{{$key}}">{{$product->name}}</h5>
                                                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                                    <span aria-hidden="true">&times;</span>
                                                                                                </button>
                                                                                            </div>
                                                                                            <div class="modal-body text-left">
                                                                                                <div class="container type_message">
                                                                                                    <div class="chat-container">
                                                                                                        <form id="review-form{{$key}}" action="{{route('customer.update.reply',$reply->id)}}" method="post">
                                                                                                            @csrf
                                                                                                            <input type="hidden" name="user_id" value="{{ auth()->user()->id ?? '' }}">
                                                                                                            <input type="hidden" name="product_id" value="{{$product->id}}">
                                                                                                            <input type="hidden" name="queries_id" value="{{$query->id}}">
                                                                                                            <div class="form-group">
                                                                                                                <textarea class="form-control" name="reply" placeholder="Type message..." required>{{$reply->reply}}</textarea>
                                                                                                            </div>
                                                                                                            <button type="submit" class="btn btn-primary">Send</button>
                                                                                                        </form>
                                                                                                    </div>
                                                                                                </div>

                                                                                            </div>
                                                                                            <div class="modal-footer">
                                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach

                                                                        </div>
                                                                        <div class="modal fade" id="queryEdit{{$key}}" tabindex="-1" role="dialog" aria-labelledby="queryEditModalLabel{{$key}}" aria-hidden="true">
                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="queryEditModalLabel{{$key}}">{{$product->name}}</h5>
                                                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body text-left">
                                                                                        <div class="container type_message">
                                                                                            <div class="chat-container">
                                                                                                <form id="review-form{{$key}}" action="{{route('customer.update.queries',$query->id)}}" method="post">
                                                                                                    @csrf
                                                                                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id ?? '' }}">
                                                                                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                                                                                    <div class="form-group">
                                                                                                        <textarea class="form-control" name="question" placeholder="Type message..." required>{{$query->question}}</textarea>
                                                                                                    </div>
                                                                                                    <button type="submit" class="btn btn-primary">Send</button>
                                                                                                </form>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal fade" id="queryReplyModal{{$key}}" tabindex="-1" role="dialog" aria-labelledby="reviewEditModalLabel{{$key}}" aria-hidden="true">
                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="reviewModalLabel{{$key}}">
                                                                                            Reply to : {{$query->question}}
                                                                                        </h5>
                                                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body text-left">
                                                                                        <div class="container type_message">
                                                                                            <div class="chat-container">
                                                                                                <form id="review-form" action="{{ route('customer.reply.queries') }}" method="post" enctype="multipart/form-data">
                                                                                                    @csrf
                                                                                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id ?? '' }}">
                                                                                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                                                                                    <input type="hidden" name="queries_id" value="{{$query->id}}">
                                                                                                    <div class="form-group">
                                                                                                        <textarea class="form-control" name="reply" placeholder="Type message..." required></textarea>
                                                                                                    </div>
                                                                                                    <button type="submit" class="btn btn-primary">Send</button>
                                                                                                </form>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                <!--single-comment -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--comment form-->
                                                    <div class="comment-form" id="reviews">
                                                        <div class="row">
                                                            <div class="col-lg-8 col-md-12">
                                                                <form class="form-contact comment_form" action="{{route('customer.store.queries')}}" id="commentForm" method="post">
                                                                    @csrf
                                                                    <input type="hidden" class="form-control" name="product_id" value="{{$product->id ??''}}" readonly>
                                                                    <input type="hidden" class="form-control" name="user_id" value="{{auth()->user()->id ?? ''}}" readonly>
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <textarea class="form-control w-100" name="question" id="question" cols="30" rows="9" placeholder="Write Comment" required></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <button type="submit" class="button button-contactForm">Send</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="track-orders" role="tabpanel" aria-labelledby="track-orders-tab">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="mb-0">Seller</h5>
                                                    </div>
                                                    <div class="card-body contact-from-area">
                                                        <div class="row justify-content-center">
                                                            <div class="col-lg-11">
                                                                <div class="row">
                                                                    <div class="col-md-4 d-flex align-items-center justify-content-center">
                                                                        <div class="comment-list">
                                                                            <div class="single-comment justify-content-between d-flex">
                                                                                <div class="user justify-content-between d-flex">
                                                                                    <div class="thumb border-0 text-center">
                                                                                        @if($sellerShop != '')
                                                                                            <img src="{{asset($sellerShop->logo)}}" alt="Shop Logo" width="150" class="rounded-circle my-2">
                                                                                            <h6><a href="#">{{$seller->shop_name}}</a></h6>
                                                                                            <p class="font-xxs">Since :  {{date_format($seller->created_at,'d M, Y')}}</p>
                                                                                        @else
                                                                                            @if($product->user->image != '')
                                                                                                <img src="{{asset($product->user->image)}}" alt="Shop Logo" width="150" class="rounded-circle my-2">
                                                                                            @else
                                                                                                <img src="{{asset('/')}}uploads/avatars/profile.png" alt="Shop Logo" width="150" class="rounded-circle my-2">
                                                                                            @endif
                                                                                            <h6><a href="#">{{$product->user->name}}</a></h6>
                                                                                            <p class="font-xxs">Since :  {{date_format($product->user->created_at,'d M, Y')}}</p>
                                                                                        @endif
                                                                                    </div>
                                                                                    <div class="desc">
                                                                                        <div class="product-rate d-inline-block">
                                                                                            <div class="product-rating" style="width:90%">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!--single-comment -->
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <h4 class="mb-30">Shop reviews</h4>
                                                                        <div class="d-flex mb-30">
                                                                            <div class="product-rate d-inline-block mr-15">
                                                                                <div class="product-rating" style="width:90%">
                                                                                </div>
                                                                            </div>
                                                                            <h6>4.8 out of 5</h6>
                                                                        </div>
                                                                        <div class="progress">
                                                                            <span>5 star</span>
                                                                            <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                                                                        </div>
                                                                        <div class="progress">
                                                                            <span>4 star</span>
                                                                            <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                                                        </div>
                                                                        <div class="progress">
                                                                            <span>3 star</span>
                                                                            <div class="progress-bar" role="progressbar" style="width: 45%;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">45%</div>
                                                                        </div>
                                                                        <div class="progress">
                                                                            <span>2 star</span>
                                                                            <div class="progress-bar" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">65%</div>
                                                                        </div>
                                                                        <div class="progress mb-30">
                                                                            <span>1 star</span>
                                                                            <div class="progress-bar" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">85%</div>
                                                                        </div>
                                                                        <a href="#" class="font-xs text-muted">How are ratings calculated?</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="review-rating" role="tabpanel" aria-labelledby="review-rating-tab">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="mb-0">Review and Ratings</h5>
                                                    </div>
                                                    <div class="card-body contact-from-area">
                                                        <div class="row">
                                                            <div class="col-lg-8">
                                                                <div class="px-3 px-sm-4">

                                                                    <div class="border border-secondary-base bg-soft-secondary-base p-sm-4">
                                                                            @if($ProductReview != '')
                                                                                @if($review != '')
                                                                                    <div class="border border-secondary-base bg-soft-secondary-base p-sm-4">
                                                                                        <div class="row align-items-center">
                                                                                                <div class="col-md-8">
                                                                                                    <div class="w-100 w-sm-auto">
                                                                                                        <span class="fs-36 fw-bold mr-3">{{$review->user->name}}</span>
                                                                                                    </div>
                                                                                                    <p class="my-2">{{$review->comment ?? ''}}</p>
                                                                                                    @if($review->images != '')
                                                                                                        @foreach(json_decode($review->images) as $image)
                                                                                                            <img src="{{asset($image)}}" alt="" class="w-25" width="100" height="100">
                                                                                                        @endforeach
                                                                                                    @endif
                                                                                                </div>
                                                                                            <div class="col-md-4 text-right">
                                                                                                @if(auth()->user())
                                                                                                        @if($review->user_id == auth()->user()->id)
                                                                                                            <div class="menuthreedot">
                                                                                                                <ul class="top-left-bar-ul">
                                                                                                                    <li>
                                                                                                                        <a href="#"  data-bs-toggle="modal" data-bs-target="#reviewEdit">Edit</a>
                                                                                                                    </li>
                                                                                                                    <li>
                                                                                                                        <form style="padding: 0;" class="nav-link text-light" action="{{route('customer.delete.review',$review->id)}}" method="post">
                                                                                                                            @csrf
                                                                                                                            @method('delete')
                                                                                                                            <button type="submit" class="logioutBtn" onclick="return confirm('are you sure to delete ? ') ? this.form.submit():''">Delete</button>
                                                                                                                        </form>
                                                                                                                    </li>
                                                                                                                </ul>
                                                                                                            </div>
                                                                                                        <div class="d-flex align-items-center justify-content-between justify-content-md-start">
                                                                                                            <div class="w-100 w-sm-auto">
                                                                                                                <span class="fs-36 mr-3">{{$review->rating ?? '0'}}</span>
                                                                                                                <span class="fs-14 mr-3">{{$review->rating ?? '0'}} out of 5.0</span>
                                                                                                            </div>
                                                                                                            <div class="mt-sm-3 w-100 w-sm-auto d-flex flex-wrap justify-content-end justify-content-md-start">
                                                                                                            <span class="rating rating-mr-1">
                                                                                                                @if(isset($review))
                                                                                                                    @if($review->rating == 1)
                                                                                                                        <i class = 'fa fa-star '></i>
                                                                                                                    @elseif($review->rating == 2)
                                                                                                                        <i class = 'fa fa-star '></i>
                                                                                                                        <i class = 'fa fa-star'></i>
                                                                                                                    @elseif($review->rating == 3)
                                                                                                                        <i class = 'fa fa-star '></i>
                                                                                                                        <i class = 'fa fa-star'></i>
                                                                                                                        <i class = 'fa fa-star'></i>
                                                                                                                    @elseif($review->rating == 4)
                                                                                                                        <i class = 'fa fa-star '></i>
                                                                                                                        <i class = 'fa fa-star'></i>
                                                                                                                        <i class = 'fa fa-star'></i>
                                                                                                                        <i class = 'fa fa-star'></i>
                                                                                                                    @elseif($review->rating == 5)
                                                                                                                        <i class = 'fa fa-star '></i>
                                                                                                                        <i class = 'fa fa-star'></i>
                                                                                                                        <i class = 'fa fa-star'></i>
                                                                                                                        <i class = 'fa fa-star'></i>
                                                                                                                        <i class = 'fa fa-star'></i>
                                                                                                                    @endif
                                                                                                                @endif

                                                                                                            </span>
                                                                                                                <span class="ml-1 fs-14">({{$review->rating ?? '0'}} reviews)</span>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        @else
                                                                                                        <a  href="javascript:void(0);" class="btn btn-secondary-base fw-400 rounded-0 text-white" data-bs-toggle="modal" data-bs-target="#reviewModal">
                                                                                                            <span class="d-md-inline-block">Rate this Product</span>
                                                                                                        </a>
                                                                                                        @endif
                                                                                                @endif
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="modal fade" id="reviewEdit" tabindex="-1" role="dialog" aria-labelledby="reviewEditModalLabel" aria-hidden="true">
                                                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <h5 class="modal-title" id="reviewModalLabel">{{$product->name}}</h5>
                                                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                                    <span aria-hidden="true">&times;</span>
                                                                                                </button>
                                                                                            </div>
                                                                                            <div class="modal-body text-left">
                                                                                                <div class="container type_message">
                                                                                                    <div class="chat-container">
                                                                                                        <form id="review-form" action="{{ route('customer.update.review',$review->id) }}" method="post" enctype="multipart/form-data">
                                                                                                            @csrf
                                                                                                            <input type="hidden" name="user_id" value="{{ auth()->user()->id ?? '' }}">
                                                                                                            <input type="hidden" name="seller_id" value="{{$product->user_id}}">
                                                                                                            <input type="hidden" name="product_id" value="{{$product->id}}">

                                                                                                            <div class="form-group rating rating-mr-1">
                                                                                                                <label>
                                                                                                                    <input type="radio" name="rating" {{$review->rating == 1 ? 'checked':''}} {{$review->rating == 2 ? 'checked':''}} {{$review->rating == 3 ? 'checked':''}} {{$review->rating == 4 ? 'checked':''}} {{$review->rating == 5 ? 'checked':''}} class="form-control" value="1" required="">
                                                                                                                    <i class="fa fa-star"></i>
                                                                                                                </label>
                                                                                                                <label>
                                                                                                                    <input type="radio" class="form-control" {{$review->rating == 2 ? 'checked':''}} {{$review->rating == 3 ? 'checked':''}} {{$review->rating == 4 ? 'checked':''}} {{$review->rating == 5 ? 'checked':''}} name="rating" value="2" required="">
                                                                                                                    <i class="fa fa-star"></i>
                                                                                                                </label>
                                                                                                                <label>
                                                                                                                    <input type="radio" class="form-control" {{$review->rating == 3 ? 'checked':''}} {{$review->rating == 4 ? 'checked':''}} {{$review->rating == 5 ? 'checked':''}} name="rating" value="3" required="">
                                                                                                                    <i class="fa fa-star "></i>
                                                                                                                </label>
                                                                                                                <label>
                                                                                                                    <input type="radio" class="form-control" name="rating" {{$review->rating == 4 ? 'checked':''}} {{$review->rating == 5 ? 'checked':''}} value="4" required="">
                                                                                                                    <i class="fa fa-star"></i>
                                                                                                                </label>
                                                                                                                <label>
                                                                                                                    <input type="radio" class="form-control" name="rating" {{$review->rating == 5 ? 'checked':''}} value="5" required="">
                                                                                                                    <i class="fa fa-star "></i>
                                                                                                                </label>
                                                                                                            </div>
                                                                                                            <div class="form-group">
                                                                                                                <textarea class="form-control" name="comment" placeholder="Type message..." required>{{$review->comment}}</textarea>
                                                                                                            </div>
                                                                                                            <div class="form-group">
                                                                                                                <input type="file" class="form-control" name="images[]" multiple>
                                                                                                                @if($review->images != '')
                                                                                                                    @foreach(json_decode($review->images) as $image)
                                                                                                                        <img src="{{asset($image)}}" alt="" class="w-25">
                                                                                                                    @endforeach
                                                                                                                @endif
                                                                                                            </div>

                                                                                                            <button type="submit" class="btn btn-primary">Send</button>
                                                                                                        </form>
                                                                                                    </div>
                                                                                                </div>

                                                                                            </div>
                                                                                            <div class="modal-footer">
                                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                @else
                                                                                    <div class="border border-secondary-base bg-soft-secondary-base p-3 p-sm-4">
                                                                                    <div class="row align-items-center">
                                                                                    <div class="col-md-8 mb-3">
                                                                                        <div class="d-flex align-items-center justify-content-between justify-content-md-start">
                                                                                            <div class="w-100 w-sm-auto">
                                                                                                <span class="fs-36 mr-3">0</span>
                                                                                                <span class="fs-14 mr-3">0 out of 5.0</span>
                                                                                            </div>
                                                                                            <div class="mt-sm-3 w-100 w-sm-auto d-flex flex-wrap justify-content-end justify-content-md-start">
                                                                                            <span class="rating rating-mr-1">
                                                                                                        <i class = 'fa fa-star '></i>
                                                                                                        <i class = 'fa fa-star'></i>
                                                                                                        <i class = 'fa fa-star'></i>
                                                                                                        <i class = 'fa fa-star'></i>
                                                                                                        <i class = 'fa fa-star'></i>
                                                                                            </span>
                                                                                                <span class="ml-1 fs-14">(0 reviews)</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-4 text-right">
                                                                                        <a  href="javascript:void(0);" class="btn btn-secondary-base fw-400 rounded-0 text-white" data-bs-toggle="modal" data-bs-target="#reviewModal">
                                                                                            <span class="d-md-inline-block">Rate this Product</span>
                                                                                        </a>
                                                                                    </div>
                                                                                @endif
                                                                               @else
                                                                                            <div class="text-center">
                                                                                                <i class = 'fa fa-star text-secondary'></i>
                                                                                                <i class = 'fa fa-star text-secondary'></i>
                                                                                                <i class = 'fa fa-star text-secondary'></i>
                                                                                                <i class = 'fa fa-star text-secondary'></i>
                                                                                                <i class = 'fa fa-star text-secondary'></i>
                                                                                                <p class="my-2">No Reviews</p>
                                                                                            </div>
                                                                            @endif

                                                                        @if(isset($reviews))
                                                                            @foreach($reviews as $review)
                                                                                  <div class="border my-1 border-secondary-base bg-soft-secondary-base p-3 p-sm-4">
                                                                                            <div class="row align-items-center">
                                                                                                <div class="col-md-8 mb-3">
                                                                                                    <div class="">
                                                                                                        <div class="w-100 w-sm-auto">
                                                                                                            <span class="fs-36 fw-bold mr-3">{{$review->user->name}}</span>
                                                                                                        </div>
                                                                                                        <p class="my-2">{{$review->comment ?? ''}}</p>
                                                                                                        @if($review->images != '')
                                                                                                            @foreach(json_decode($review->images) as $image)
                                                                                                                <img src="{{asset($image)}}" alt="" class="w-25" width="100" height="100">
                                                                                                            @endforeach
                                                                                                        @endif
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-4 mb-3">
                                                                                                    <div class="w-100 w-sm-auto">
                                                                                                        <span class="fs-36 mr-3">{{$review->rating ?? '0'}}</span>
                                                                                                        <span class="fs-14 mr-3">{{$review->rating ?? '0'}} out of 5.0</span>
                                                                                                    </div>
                                                                                                    <div class="mt-sm-3 w-100 w-sm-auto d-flex flex-wrap justify-content-end justify-content-md-start">
                                                                                                            <span class="rating rating-mr-1">
                                                                                                @if(isset($review))
                                                                                                                    @if($review->rating == 1)
                                                                                                                        <i class = 'fa fa-star '></i>
                                                                                                                    @elseif($review->rating == 2)
                                                                                                                        <i class = 'fa fa-star '></i>
                                                                                                                        <i class = 'fa fa-star'></i>
                                                                                                                    @elseif($review->rating == 3)
                                                                                                                        <i class = 'fa fa-star '></i>
                                                                                                                        <i class = 'fa fa-star'></i>
                                                                                                                        <i class = 'fa fa-star'></i>
                                                                                                                    @elseif($review->rating == 4)
                                                                                                                        <i class = 'fa fa-star '></i>
                                                                                                                        <i class = 'fa fa-star'></i>
                                                                                                                        <i class = 'fa fa-star'></i>
                                                                                                                        <i class = 'fa fa-star'></i>
                                                                                                                    @elseif($review->rating == 5)
                                                                                                                        <i class = 'fa fa-star '></i>
                                                                                                                        <i class = 'fa fa-star'></i>
                                                                                                                        <i class = 'fa fa-star'></i>
                                                                                                                        <i class = 'fa fa-star'></i>
                                                                                                                        <i class = 'fa fa-star'></i>
                                                                                                                    @endif
                                                                                                                @endif
                                                                                            </span>
                                                                                                        <span class="ml-1 fs-14">({{$review->rating ?? '0'}} reviews)</span>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                            @endforeach
                                                                        @else
                                                                                  <div class="text-center">
                                                                                      <i class = 'fa fa-star text-secondary'></i>
                                                                                      <i class = 'fa fa-star text-secondary'></i>
                                                                                      <i class = 'fa fa-star text-secondary'></i>
                                                                                      <i class = 'fa fa-star text-secondary'></i>
                                                                                      <i class = 'fa fa-star text-secondary'></i>
                                                                                      <p class="my-2">No Reviews</p>
                                                                                  </div>
                                                                        @endif
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-md-4">
                                                                <h4 class="mb-30">Customer reviews</h4>
                                                                <div class="d-flex mb-30">
                                                                    <div class="product-rate d-inline-block mr-15">
                                                                        <div class="product-rating" style="width:90%">
                                                                        </div>
                                                                    </div>
                                                                    <h6>4.8 out of 5</h6>
                                                                </div>
                                                                <div class="progress">
                                                                    <span>5 star</span>
                                                                    <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                                                                </div>
                                                                <div class="progress">
                                                                    <span>4 star</span>
                                                                    <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                                                </div>
                                                                <div class="progress">
                                                                    <span>3 star</span>
                                                                    <div class="progress-bar" role="progressbar" style="width: 45%;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">45%</div>
                                                                </div>
                                                                <div class="progress">
                                                                    <span>2 star</span>
                                                                    <div class="progress-bar" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">65%</div>
                                                                </div>
                                                                <div class="progress mb-30">
                                                                    <span>1 star</span>
                                                                    <div class="progress-bar" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">85%</div>
                                                                </div>
                                                                <a href="#" class="font-xs text-muted">How are ratings calculated?</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="row">
                            @foreach($relatedProducts as $relatedProduct)
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4">
                                <div class="card card-body text-center">
                                    <div class="m-0 justify-content-center">
                                        <a href="{{route('product.details',$relatedProduct->id)}}" target="blank">
                                            <img src="{{asset($relatedProduct->image)}}" width="150" height="120" class="m-0" alt="a" />
                                        </a>
                                        <h6>{{$currency->symbol ?? ''}}{{$relatedProduct->selling_price}}</h6>
                                        <p><a href="{{route('product.details',$relatedProduct->id)}}">{{$relatedProduct->name}}</a></p>
                                        <div class="d-grid text-end float-end">
                                            <a href=""><i class="mr-3  fa fa-heart"></i></a>
                                            <a href=""><i class=" fa fa-shopping-cart"></i></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<!--icon section start-->
<section class="icons_partt icons_part11 mt-5 mb-5 ">
    <div class="container">
        <div class="row ">
            <div class="col-xl-3 col-lg-3 col-md-6  col-xs-12 col-sm-6 suppp">
                <div class="icon_tt d-flex">
                    <div class="imgsvg"><img src="{{asset('/')}}noa/assets/img/icon1_.svg" alt=""></div>
                    <div>
                        <p>TERMS & CONDITIONS <br><span>Lorem ipsum dolor sit abet</span></p>

                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-xs-12 col-sm-6 suppp">
                <div class="icon_tt d-flex">
                    <div class="imgsvg"><img src="{{asset('/')}}website/assets/img/icon2_.svg" alt=""></div>
                    <div>
                        <p>RETURN & REFUND POLICY<br><span>Lorem ipsum dolor sit abet</span></p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6  col-xs-12 col-sm-6 suppp">
                <div class="icon_tt d-flex">
                    <div class="imgsvg"><img src="{{asset('/')}}website/assets/img/icon3_.svg" alt=""></div>
                    <div>
                        <p>SUPPORT POLICY<br><span>Lorem ipsum dolor sit abet</span></p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6  col-xs-12 col-sm-6 suppp">
                <div class="icon_tt d-flex">
                    <div class="imgsvg"><img src="{{asset('/')}}website/assets/img/icon4_.svg" alt=""></div>
                    <div>
                        <p>PRIVACY POLICY<br><span>Lorem ipsum dolor sit abet</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@if(auth()->user())
{{-- @include('website.layout.css-js-product-details')--}}
<!-- Modal -->
<div class="modal fade" id="chatModal" tabindex="-1" role="dialog" aria-labelledby="chatModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="chatModalLabel">Any query about this product</h5>
                <button type="button" class="close" onclick="closeChatBox()" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-left">


                <div class="container type_message">
                    <div class="chat-container">
                        <form id="chat-form" action="{{ route('converstation.data.post') }}" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id = '' }}">
                            <input type="hidden" name="receiver_id" value="{{$product->user_id}}">
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <div class="form-group">
                                <input type="text" class="form-control" name="title" placeholder="Title">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" placeholder="Type message..." required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Send</button>
                        </form>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeChatBox()">Close</button>
            </div>
        </div>
    </div>
</div>
@else
<div class="modal fade" id="chatModal" tabindex="-1" role="dialog" aria-labelledby="chatModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header"></div>

            <div class="modal-body text-left">
                <p class="modal-title" id="chatModalLabel">To send message please login first</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeChatBox()">Close</button>
            </div>

        </div>
    </div>
</div>
@endif

@if(auth()->user())
{{-- @include('website.layout.css-js-product-details')--}}
@if(isset($ProductReview))
<!-- Modal -->
<div class="modal fade" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="reviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reviewModalLabel">{{$product->name}}</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-left">
                <div class="container type_message">
                    <div class="chat-container">
                        <form id="chat-form" action="{{route('customer.store.review')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id ?? '' }}">
                            <input type="hidden" name="seller_id" value="{{$product->user_id}}">
                            <input type="hidden" name="product_id" value="{{$product->id}}">

                            <div class="form-group rating rating-mr-1">
                                <label>
                                    <input type="radio" name="rating" class="form-control" value="1" required="">
                                    <i class="fa fa-star"></i>
                                </label>
                                <label>
                                    <input type="radio" class="form-control" name="rating" value="2" required="">
                                    <i class="fa fa-star"></i>
                                </label>
                                <label>
                                    <input type="radio" class="form-control" name="rating" value="3" required="">
                                    <i class="fa fa-star "></i>
                                </label>
                                <label>
                                    <input type="radio" class="form-control" name="rating" value="4" required="">
                                    <i class="fa fa-star"></i>
                                </label>
                                <label>
                                    <input type="radio" class="form-control" name="rating" value="5" required="">
                                    <i class="fa fa-star "></i>
                                </label>

                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="comment" placeholder="Type message..." required></textarea>
                            </div>
                            <div class="form-group">
                                <input type="file" class="form-control" name="images[]" multiple>
                            </div>

                            <button type="submit" class="btn btn-primary">Send</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-close" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@else
    <div class="modal fade" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="reviewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header"></div>

                <div class="modal-body text-left">
                    <p class="modal-title" id="reviewModalLabel">Sorry, You need to buy this product to give review.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endif
@else
<div class="modal fade" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="reviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header"></div>

            <div class="modal-body text-left">
                <p class="modal-title" id="reviewModalLabel">Please login first</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-close" data-bs-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
@endif


@endsection

@push('js')
<script>
    $(document).ready(function() {
        $(document).on('change', '.size, .color', function (e) {
            getVariantPrice();
        });
        function getVariantPrice() {
            var size = $('.size').val();
            var color = $('.color').val();
            var product_id = "{{ $product->id }}";

            $.ajax({
                url: '{{ route("get-variant-product-price") }}',
                type: 'GET',
                data: {
                    size: size,
                    color: color,
                    product_id: product_id
                },
                success: function(response) {
                    console.log(response,'aaaaaaaaaa');
                    if(response.price){
                        $('#p_price').text(response.price);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });

        }
    });
</script>
<script>
    $(document).ready(function() {
        $('#review-rating')
    });
</script>
@endpush
