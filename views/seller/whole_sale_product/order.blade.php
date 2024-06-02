@extends('seller.Layout.master')
@section('title','Product page')
@section('body')
    <div class="row mt-5">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title text-bold">Whole Sale Order</h3>

                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                            <tr>

                                <th class="border-bottom-0">SL No</th>
                                <th class="border-bottom-0">Total Order</th>
                                <th class="border-bottom-0">Tax Total</th>
                                <th class="border-bottom-0">Shipping Total</th>
                                <th class="border-bottom-0">Payment Status</th>
                                <th class="border-bottom-0">Order Confirm</th>
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

                                        <td>{{ $order->order_total }}</td>
                                        <td>{{ $order->tax_total }}</td>
                                        <td>{{ $order->shipping_total }}</td>
                                        <td>{{ $order->payment_status }}</td>
                                        <td>
                                            <form action="{{route('order.confirm',$order->id)}}" method="post">
                                                @csrf
                                                @if ($order->payment_status == 'Pending')
                                                <button type="submit" class="btn btn-success">Confirm</button>
                                                @elseif ($order->payment_status == 'confirm')
                                                <button type="submit" class="btn btn-danger">Cancel</button>
                                                @endif
                                            </form>
                                        </td>
                                        <td>
                                            <a href="">Order Details</a>
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


