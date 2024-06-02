@extends('website.layout.app')
@section('title','Order Details')
@section('body')

    <style>
        .status_change {
            border: 1px solid #dee2e6;
            padding: 10px 6px;
            margin-bottom: 13px;
        }

        .form-group select {
            background: #fff;
            border: 1px solid #e2e9e1;
            height: 45px;
            -webkit-box-shadow: none;
            box-shadow: none;
            padding-left: 20px;
            font-size: 13px;
            color: #1a1a1a;
            width: 100%;
        }

        .modal-body{
            margin-top: 0;
        }

        .modal-body button{
            width: initial;
        }

        .modal-body button{
            border-radius: 7px;
        }

        #error_msg{
            display: none;
            font-weight: bold;
        }

        li.breadcrumb-item{
            float: left;
        }

    </style>

    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('customer.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('customer.refund') }}">Refunds</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Details</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row  justify-content-center">
        <div class="col-md-7 my-2">
            <div class="tab-content dashboard-content">
                <div class="">
                    <div class="card">
                        <div class="card-header">
                            <div class="float-start my-4">
                                <h5 class="card-title mb-0">order code : {{$order->order_code}}</h5>
                            </div>
                            <div class="float-start">
                                <h6 class="card-title">order date: {{date_format($order->created_at,'d M, Y')}}</h6>
                            </div>
                            <div class="float-start">
                                <h6 class="card-title">
                                    order status :
                                    <span class="p-1 {{$order->order_status == 0 ? 'bg-warning text-dark ':''}}
                                    {{$order->order_status == 1 ? 'bg-success text-white ':''}}
                                    {{$order->order_status == 2 ? 'bg-danger text-white ':''}}">
                                     {{$order->order_status == 0 ? 'pending':''}}
                                        {{$order->order_status == 1 ? 'Complete':''}}
                                        {{$order->order_status == 2 ? 'Cancel':''}}
                                </span>
                                </h6>
                            </div>
                            <div class="float-start">
                                <h6 class="card-title">
                                    Payment status :
                                    <span class="p-1 {{$order->payment_status == 0 ? 'bg-warning text-dark ':''}}
                                    {{$order->payment_status == 1 ? 'bg-success text-white ':''}}
                                    {{$order->payment_status == 2 ? 'bg-danger text-white ':''}}">
                                     {{$order->payment_status == 0 ? 'pending':''}}
                                        {{$order->payment_status == 1 ? 'Complete':''}}
                                        {{$order->payment_status == 2 ? 'Cancel':''}}
                                </span>
                                </h6>
                            </div>
                            <div class="float-start">
                                <h6 class="card-title">
                                    delivery status :
                                    <span class="p-1 {{$order->delivery_status == 0 ? 'bg-warning text-dark ':''}}
                                    {{$order->delivery_status == 1 ? 'bg-primary text-white ':''}}
                                    {{$order->delivery_status == 2 ? 'bg-warning text-white ':''}}
                                    {{$order->delivery_status == 3 ? 'bg-success text-white ':''}}
                                    {{$order->delivery_status == 4 ? 'bg-danger text-white ':''}}">

                                    {{$order->delivery_status == 0 ? 'pending':''}}
                                        {{$order->delivery_status == 1 ? 'Accepted':''}}
                                        {{$order->delivery_status == 2 ? 'Shipping':''}}
                                        {{$order->delivery_status == 3 ? 'Delivered':''}}
                                        {{$order->delivery_status == 4 ? 'Cancel':''}}
                                </span>
                                </h6>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive push">
                                <table class="table table-bordered table-hover mb-0 text-nowrap border-bottom">
                                    <tbody>
                                    <tr class="text-center">
                                        <th class="text-center"></th>
                                        <th>Item</th>
                                        <th>Shop</th>
                                        <th class="text-end">Product Price</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-end">Sub Total</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                    @php($sum = 0)
                                    @php($tax = 0)
                                    @foreach($orderDetails as $key=>$orderDetail)
                                        <tr>
                                            <td class="text-center">{{$loop->iteration}}</td>
                                            <td class="text-start">
                                                <div class="row">
                                                    <div class="col-2">
                                                        <img class="mx-2" width="50" height="50" src="{{asset($orderDetail->product->product_image)}}" alt="">
                                                    </div>
                                                    <div class="text-muted col-10">
                                                        <div class="text-muted">
                                                            <p class="font-w600 fw-bold mb-1">{{$orderDetail->product_name}}</p>
                                                        </div>
                                                        <div class="text-muted ">
                                                            @if(isset($orderDetail->product_color))
                                                                <span class="fw-bold">Color : </span><span>{{$orderDetail->product_color}}</span><br>
                                                            @endif
                                                            @if(isset($orderDetail->product_size))
                                                                <span class="fw-bold">Size : </span><span>{{$orderDetail->product_size}}</span>
                                                                <br>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">{{$orderDetail->user->role == 'admin' ? $orderDetail->user->name : $orderDetail->user->seller->shop_name}}</td>
                                            <td class="text-center">{{$orderDetail->product_price}} {{$currency->symbol ?? ''}}</td>
                                            <td class="text-center">{{$orderDetail->product_qty}}</td>
                                            <td class="text-end">{{$orderDetail->product_price * $orderDetail->product_qty }} {{$currency->symbol ?? ''}}
                                            </td>
                                            <td class="text-center">
                                                @php($paymentDate = Carbon\Carbon::parse($order->payment_date))
                                                @php($now = Carbon\Carbon::now()->toDateString())

                                                @if($paymentDate->diffInDays($now) <= 7)
                                                    @if($orderDetail->product->refund != 0)
                                                        @php($refund =   App\Models\Refund::where('product_id',$orderDetail->product->id)->where('order_id',$order->id)->first())
                                                        @if($refund != '')
                                                            <span class="p-2 {{$refund->refund_status == 0 ? "bg-warning" : ""}}
                                                                {{$refund->refund_status == 1 ? "bg-success text-dark" : ""}}
                                                                {{$refund->refund_status == 2 ? "bg-danger text-white" : ""}}">
                                                                {{$refund->refund_status == 0 ? "Pending" : ""}}
                                                                    {{$refund->refund_status == 1 ? "Complete" : ""}}
                                                                    {{$refund->refund_status == 2 ? "Cancel" : ""}}
                                                            </span>
                                                        @else
                                                            <a href="javascript:void(0)" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#refund{{$key}}modal">Refund</a>
                                                        @endif
                                                    @endif
                                                @endif
                                            </td>
                                            <td hidden>{{$sum = $sum + ($orderDetail->product_price * $orderDetail->product_qty) }}</td>
                                            <td hidden>{{$tax = $tax + ($orderDetail->tax_total) }}</td>
                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal fade" id="refund{{$key}}modal" tabindex="-1" aria-labelledby="refund{{$key}}modalModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md">
                                                <form action="{{route('customer.order.refund.request')}}" method="post">
                                                    @csrf
                                                    <input class="form-control" type="hidden" name="user_id" value="{{$orderDetail->seller_id}}">
                                                    <input class="form-control" type="hidden" name="order_id" value="{{$order->id}}">
                                                    <input class="form-control" type="hidden" name="order_code" value="{{$order->order_code}}">
                                                    <input class="form-control" type="hidden" name="product_id" value="{{$orderDetail->product_id}}">
                                                    <input class="form-control" type="hidden" name="price" value="{{$orderDetail->product_price}}">
                                                    <input class="form-control" type="hidden" name="product_qty" value="{{$orderDetail->product_qty}}">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="refund{{$key}}modalModalLabel">Refund</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="col-lg-12">
                                                                <div class="row">
                                                                    <div class="col-lg-12 text-left">
                                                                        <p class="text-left"><span class="fw-bold" style="font-weight: bold">Product name : </span>{{$orderDetail->product_name}}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row row mt-10">
                                                                    <div class="col-lg-12 text-left">
                                                                        <textarea name="reason" id="" cols="30" rows="5" placeholder="type refund reason">{{old('reason')}}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                    <tr>
                                        <td colspan="5" class="fw-semibold text-uppercase text-end">Total</td>
                                        <td class="fw-semibold text-end h5">{{$sum}} {{$currency->symbol}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="fw-semibold text-uppercase text-end">Shipping</td>
                                        <td class="fw-semibold text-end h5">{{$order->total_shipping}} {{$currency->symbol ?? ''}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="fw-semibold text-uppercase text-end">Tax</td>
                                        <td class="fw-semibold text-end h5">{{$tax}} {{$currency->symbol ?? ''}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="fw-bold text-uppercase text-end">In Total</td>
                                        <td class="fw-bold text-end h4">{{$sum+$order->total_shipping+$tax}} {{$currency->symbol ?? ''}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            {{--                    <button type="button" class="btn btn-primary mb-1" onclick="javascript:window.print();"><i class="si si-wallet"></i> Back </button>--}}
                            {{--                    <button type="button" class="btn btn-success mb-1" onclick="javascript:window.print();"><i class="si si-paper-plane"></i> Send Invoice</button>--}}
                            @if($order->order_status == 3)
                                <button class="btn btn-warning btn-sm">Returns</button>
                            @endif

                            @if($order->order_status == 0)
                                <button class="btn btn-danger btn-sm" onclick="return confirm_delete('{{ $order->order->id }}')">Cancel</button>
                            @endif
                            <a href="{{route('customer.order.invoice',$order->id)}}" class="btn btn-success btn-sm"><i class="fa fa-info"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

