@extends('seller.Layout.master')
@section('title','Show Seller ')
@section('body')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title">Order Details</h3>
                    <h3><a class="btn btn-primary" href="{{route('seller-product.view',$order->id)}}">Order View</a></h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">

                        <tr>
                            <th>User Name</th>
                            <th>{{$order->user_id?? "N/A"}}</th>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <th>{{$order->phone ?? "N/A"}}</th>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{$order->email ?? "N/A"}}</td>
                        </tr>
                        <tr>
                            <th> Order Date</th>
                            <td>{{$order->order_date ?? "N/A"}}</td>
                        </tr>
                        <tr>
                            <th> Total Tax</th>
                        <td>{{ $order->tax_total ?? "N/A"}}</td>
                        </tr>
                        <tr>
                            <th>Billing</th>
                            <td>{{$order->billing ?? "N/A"}}</td>
                        </tr>
                        <tr>
                            <th>Shipping</th>
                            <td>{{$order->shipping ??"N/A"}}</td>
                        </tr>
                        <tr>
                            <th>MinQty</th>
                            <td>{{$order->minQty ?? "N/A"}}</td>
                        </tr>
                        <tr>
                            <th>MaxQty</th>

                            <td>{{ $order->maxQty ?? 'N/A'}}</td>

                        </tr>

                        <tr>
                            <th>Unit Price</th>
                            <td>{{ $order->unit_price?? 'N/A'}}</td>
                        </tr>
                        <tr>
                            <th>Courier </th>
                            <td>{{ $order->courier_id?? 'N/A'}}</td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

