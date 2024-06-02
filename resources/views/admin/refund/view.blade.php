@extends('admin.master')
@section('title','Refund Detail')
@section('body')
    <div class="row mt-5">
        <div class="col">
            <div class="card">
                <div class="card-header row border-bottom">
                    <div class="col-6">
                        <h3 class="card-title">Refund Table</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-12 text-center shadow">
                            <img src="{{asset($refund->product->product_image ?? '')}}" alt="" class="img-fluid" width="300">
                            <p class="text-center">Product Image</p>
                            <h4 class="text-center"><span class="fw-bold">Product Name : </span>{{$refund->product->name ?? "N/A"}}</h4>
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
                                        <th>Customer Name</th>
                                        <td>{{$refund->customer->user->name ?? "N/A"}}</td>
                                    </tr>
                                    <tr>
                                        <th>Order</th>
                                        <td>#{{$refund->order_code ?? "N/A"}}</td>
                                    </tr>
                                    <tr>
                                        <th>Product Name</th>
                                        <td>{{$refund->product->name ?? "N/A"}}</td>
                                    </tr>

                                    <tr>
                                        <th>Product Refund Status</th>
                                        <td>{{$refund->product->refund == 1 ? 'Refundable':'NonRefundable'}}</td>
                                    </tr>
                                    <tr>
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
                                                <form action="{{route('refund.seller.status.change',$refund->id)}}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <select onchange="this.form.submit()" name="seller_approval" class="p-2 {{$refund->seller_approval == 0 ? "bg-warning" : ""}}{{$refund->seller_approval == 1 ? "bg-success text-white" : ""}}{{$refund->seller_approval == 2 ? "bg-danger text-white" : ""}}" id="">
                                                        <option label="" disabled selected>Select One</option>
                                                        <option value="0" {{$refund->seller_approval == 0 ? "selected" : ""}}>Pending</option>
                                                        <option value="1" {{$refund->seller_approval == 1 ? "selected" : ""}}>Complete</option>
                                                        <option value="2" {{$refund->seller_approval == 2 ? "selected" : ""}}>Cancel</option>
                                                    </select>
                                                </form>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Refund Status</th>
                                            <td>
                                                <form action="{{route('refund.status.change',$refund->id)}}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <select onchange="this.form.submit()" name="refund_status" class="p-2 {{$refund->refund_status == 0 ? "bg-warning" : ""}}{{$refund->refund_status == 1 ? "bg-success text-white" : ""}}{{$refund->refund_status == 2 ? "bg-danger text-white" : ""}}" id="">
                                                        <option label="" disabled selected>Select One</option>
                                                        <option value="0" {{$refund->refund_status == 0 ? "selected" : ""}}>Pending</option>
                                                        <option value="1" {{$refund->refund_status == 1 ? "selected" : ""}}>Complete</option>
                                                        <option value="2" {{$refund->refund_status == 2 ? "selected" : ""}}>Cancel</option>
                                                    </select>
                                                </form>
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


