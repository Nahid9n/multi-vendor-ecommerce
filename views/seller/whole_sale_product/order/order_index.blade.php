@extends('seller.Layout.master')
@section('title','Product page')
@section('body')
    <div class="row mt-5">
        <div class="col">
            <div class="card">
                <div class="card-header ">
                    <h3 class="card-title text-bold">Product Order</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                            <tr>

                                <th class="border-bottom-0">SL No</th>
                                <th class="border-bottom-0">Order Number</th>
                                <th class="border-bottom-0">Product Name</th>
                                <th class="border-bottom-0">Quantity</th>
                                <th class="border-bottom-0">Price</th>
                                <th class="border-bottom-0">Total Price</th>
                                <th class="border-bottom-0">Total Shipping</th>
                                <th class="border-bottom-0">Payment Amount</th>
                                <th class="border-bottom-0">Payment Status</th>
                                <th class="border-bottom-0">Order Status</th>
                                <th class="border-bottom-0">Action</th>

                            </tr>
                            </thead>
                            <tbody>
                                @php
                                    $id=0;
                                @endphp
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ ++$id }}</td>
                                        <td>{{ $order->order_number }}</td>
                                        <td>{{ $order->product_name }}</td>
                                        <td>{{ $order->product_qty }}</td>
                                        <td>{{ $order->product_price }}</td>
                                        <td>{{ $order->total_price }}</td>
                                        <td>{{ $order->total_shipping }}</td>
                                        <td>{{ $order->payment_amount }}</td>
                                        <td>{{ $order->payment_status == 0 ? 'Pending': 'Aprroved' }}</td>
                                        <td>
                                            <form action="{{route('seller-product-order.confirm',$order->id)}}" method="post">
                                                @csrf
                                                @if ($order->payment_status == 0)
                                                <button type="submit" class="btn btn-success">Approved</button>
                                                @elseif ($order->payment_status == 1)
                                                <button type="submit" class="btn btn-danger">Cancel</button>
                                                @endif
                                            </form>
                                        </td>
                                        <td>
                                            <a class="btn btn-info" href="{{route('seller-product.view',$order->id)}}">Views</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


