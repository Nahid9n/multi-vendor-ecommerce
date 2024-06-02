@extends('website.layout.app')
@section('title','Customer Refund Details')
@section('body')

    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('customer.dashboard') }}"> Home </a> / <a href="{{ route('customer.refund.requests') }}"> Refund</a> / details
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row mt-5 justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header row border-bottom">
                    <div class="col-6">
                        <h3 class="card-title">Refund Table</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-6 text-center shadow">
                            <img src="{{asset($refund->product->product_image ?? '')}}" alt="" class="img-fluid" width="300">
                            <p class="text-center">Product Image</p>
                            <h4 class="text-center my-4"><span class="fw-bold">Product Name : </span>{{$refund->product->name ?? "N/A"}}</h4>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header text-bold">Product Details</div>
                        <div class="card-body">
                            @if (isset($refund))
                                <table class="table table-bordered table-hover">

                                    @if($refund->user_id == 1)
                                        <tr>
                                            <th>Seller Name</th>
                                            <td>{{$refund->user->name ?? "N/A"}}</td>
                                        </tr>
                                    @else
                                        <tr>
                                            <th>Shop Name</th>
                                            <td>{{$refund->user->seller->shop_name ?? "N/A"}}</td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <th>Order</th>
                                        <td>#{{$refund->order_code ?? "N/A"}}</td>
                                    </tr>
                                    <tr>
                                        <th>Product Name</th>
                                        <td>{{$refund->product->name ?? "N/A"}}</td>
                                    </tr>
                                    <tr>
                                        <th>Price</th>
                                        <td>{{$refund->price ?? "N/A"}} {{$currency->symbol ?? 'n/a'}}</td>
                                    </tr>
                                    <tr>
                                        <th> Reason</th>
                                        <td>{{ $refund->reason ?? "N/A"}}</td>
                                    </tr>
                                        <tr>
                                            <th>Seller Approval</th>
                                            <td>
                                                <span class="p-2 {{$refund->seller_approval == 0 ? "bg-warning" : ""}}
                                                {{$refund->seller_approval == 1 ? "bg-success text-white" : ""}}
                                                {{$refund->seller_approval == 2 ? "bg-danger text-white" : ""}}">
                                                    {{$refund->seller_approval == 0 ? "Pending" : ""}}
                                                    {{$refund->seller_approval == 1 ? "Complete" : ""}}
                                                    {{$refund->seller_approval == 2 ? "Cancel" : ""}}
                                                </span>
                                            </td>

                                        </tr>
                                        <tr>
                                            <th>Refund Status</th>
                                            <td>
                                                <span class="p-2 {{$refund->refund_status == 0 ? "bg-warning" : ""}}
                                                {{$refund->refund_status == 1 ? "bg-success text-white" : ""}}
                                                {{$refund->refund_status == 2 ? "bg-danger text-white" : ""}}">
                                                    {{$refund->refund_status == 0 ? "Pending" : ""}}
                                                    {{$refund->refund_status == 1 ? "Complete" : ""}}
                                                    {{$refund->refund_status == 2 ? "Cancel" : ""}}
                                                </span>
                                            </td>
                                        </tr>

                                </table>

                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


