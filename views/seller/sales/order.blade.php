@extends('seller.Layout.master')
@section('title','Seller Order Manage Page')
@section('body')
    <style>

        .status_change{
            font-size: inherit;
            color: initial;
        }

    </style>
    <!-- Row -->
    <div class="row row-sm mt-5">
        <div class="col-lg-12">
            <div class="card">


                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title text-bold">Orders Table</h3>
                </div>

                <div class="card-body">
                    <div class="table-responsive export-table">
                        <table id="file-datatable" class="table table-bordered text-nowrap text-center key-buttons border-bottom  w-100">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">order</th>
{{--                                <th class="border-bottom-0">order total</th>--}}
{{--                                <th class="border-bottom-0">Customer</th>--}}
                                <th class="border-bottom-0">Order Date</th>
                                <th class="border-bottom-0">Payment Status</th>
                                <th class="border-bottom-0">Order Status</th>
                                <th class="border-bottom-0">Delivery Status</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($sum = 0)
                            @foreach($orders as $order)
                                <tr>
                                    <td><a href="{{route('seller.order.show',$order->id)}}">#{{$order->order_code}}</a></td>
{{--                                    <td hidden>{{$sum = $sum + $order->unit_price}} Tk.</td>--}}
{{--                                    <td>{{$sum}} Tk.</td>--}}
{{--                                    <td>{{$order->user->user->name}}</td>--}}
                                    <td>{{$order->created_at}}</td>
                                    <td>
                                        <span class="{{$order->payment_status == 0 ? 'bg-warning':''}}
                                        {{$order->payment_status == 1 ? 'bg-success':''}}
                                        {{$order->payment_status == 2 ? 'bg-danger text-white':''}} p-1 rounded-3">
                                            {{$order->payment_status == 0 ? 'Pending':''}}
                                            {{$order->payment_status == 1 ? 'Completed':''}}
                                            {{$order->payment_status == 2 ? 'Canceled':''}}
                                        </span>

                                    </td>
                                    <td>
                                        <span class="{{$order->order_status == 0 ? 'bg-warning':''}}{{$order->order_status == 1 ? 'bg-success':''}}{{$order->order_status == 2 ? 'bg-primary':''}}{{$order->order_status == 3 ? 'bg-danger':''}} p-1 rounded-3">
                                            {{$order->order_status == 0 ? 'pending':''}}
                                            {{$order->order_status == 1 ? 'Accepted':''}}
                                            {{$order->order_status == 2 ? 'Delivered':''}}
                                            {{$order->order_status == 3 ? 'Canceled':''}}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="{{$order->delivery_status == 0 ? 'bg-warning':''}}{{$order->delivery_status == 1 ? 'bg-info':''}}{{$order->delivery_status == 2 ? 'bg-primary':''}}{{$order->delivery_status == 3 ? 'bg-success':''}}{{$order->delivery_status == 4 ? 'bg-danger text-white':''}} p-1 rounded-3">
                                            {{$order->delivery_status == 0 ? 'Pending':''}}
                                            {{$order->delivery_status == 1 ? 'Accepted':''}}
                                            {{$order->delivery_status == 2 ? 'Shipping':''}}
                                            {{$order->delivery_status == 3 ? 'Delivered':''}}
                                            {{$order->delivery_status == 4 ? 'Canceled':''}}
                                        </span>
                                    </td>
                                    <td class="d-flex">
                                        <a href="{{route('seller.order.show',$order->id)}}" class="btn btn-sm btn-success mx-1"><i class="fa fa-eye"></i></a>
                                        <a href="{{route('seller.order.invoice',$order->id)}}" class="btn btn-sm btn-primary mx-1"><i class="fa fa-info-circle"></i></a>
                                    <!-- <a href="{{route('blogs.edit',$order->id)}}" class="btn btn-success mx-2"><i class="fa fa-edit"></i></a> -->
{{--                                        <form action="{{route('sales.order.delete',$order->id)}}" method="post">--}}
{{--                                            @csrf--}}
{{--                                            @method('DELETE')--}}
{{--                                            <button type="submit" onclick="return confirm('are you sure to delete ? ')" class="btn btn-sm btn-danger mx-1"><i class="fa fa-trash-o"></i></button>--}}
{{--                                        </form>--}}
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
    <!-- End Row -->
@endsection
