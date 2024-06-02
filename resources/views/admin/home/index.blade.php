@extends('admin.master')
@section('title','Dashboard')
@section('body')
    <div class="page-header">
        <div class="col-md-6">
            <h1 class="bg-primary text-white p-2 fs-5">Welcome to your dashboard!</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="" hidden>
                                @php($sum = 0)
                                @foreach($totalRevenue as $price)
                                    {{$sum = $sum + $price->payment_amount}}
                                @endforeach
                            </div>
                            <h3 class="mb-2 fw-semibold"> {{ number_format($sum)}} {{$currency->symbol ?? ''}}</h3>
                            <p class="text-muted fs-13 mb-0">Total Revenue</p>
                            <p class="text-muted mb-0 mt-2 fs-12">
                                <span class="icn-box text-success fw-semibold fs-13 me-1">
                                </span>
                            </p>
                        </div>
                        <div class="col col-auto top-icn dash">
                            <div class="counter-icon bg-success dash ms-auto">
                                <i class="fa-solid text-white fa-sack-dollar"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="row">
                        <div class="col">

                            <h3 class="mb-2 fw-semibold"> {{ $totalOrder }}</h3>
                            <p class="text-muted fs-13 mb-0">Total Orders</p>
                            <p class="text-muted mb-0 mt-2 fs-12">
                                <span class="icn-box text-success fw-semibold fs-13 me-1">
                                </span>
                            </p>
                        </div>
                        <div class="col col-auto top-icn dash">
                            <div class="counter-icon bg-success dash ms-auto">
                                <i class="fa-solid text-white fa-first-order"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="row">
                        <div class="col">

                            <h3 class="mb-2 fw-semibold"> {{ $pendingOrder }}</h3>
                            <p class="text-muted fs-13 mb-0">Pending Orders</p>
                            <p class="text-muted mb-0 mt-2 fs-12">
                                <span class="icn-box text-success fw-semibold fs-13 me-1">
                                </span>
                            </p>
                        </div>
                        <div class="col col-auto top-icn dash">
                            <div class="counter-icon bg-success dash ms-auto">
                                <i class="fa-solid text-white fa-clock-o"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="row">
                        <div class="col">

                            <h3 class="mb-2 fw-semibold"> {{ $acceptedOrder }}</h3>
                            <p class="text-muted fs-13 mb-0">Accept Orders</p>
                            <p class="text-muted mb-0 mt-2 fs-12">
                                <span class="icn-box text-success fw-semibold fs-13 me-1">
                                </span>
                            </p>
                        </div>
                        <div class="col col-auto top-icn dash">
                            <div class="counter-icon bg-success dash ms-auto">
                                <i class="fa-solid text-white fa-thumbs-o-up"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h3 class="mb-2 fw-semibold">{{$completeOrder}}</h3>
                            {{--                            <h3 class="mb-2 fw-semibold">{{ number_format($t_plan_order) }}</h3>--}}
                            <p class="text-muted fs-13 mb-0">Complete Order</p>
                            <p class="text-muted mb-0 mt-2 fs-12">
                                <span class="icn-box text-success fw-semibold fs-13 me-1">
                                </span>
                            </p>
                        </div>
                        <div class="col col-auto top-icn dash">
                            <div class="counter-icon bg-success dash ms-auto">
                                <i class="fa-solid text-white fa-circle-check"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            {{--                            <h3 class="mb-2 fw-semibold">{{ number_format($complete_order) }}</h3>--}}
                            <h3 class="mb-2 fw-semibold">{{$cancelOrder}}</h3>
                            <p class="text-muted fs-13 mb-0">Cancel Order</p>
                            <p class="text-muted mb-0 mt-2 fs-12">
                                <span class="icn-box text-success fw-semibold fs-13 me-1">
                                </span>
                            </p>
                        </div>
                        <div class="col col-auto top-icn dash">
                            <div class="counter-icon bg-primary dash ms-auto">
                                <i class="fa-solid text-white fa-rectangle-xmark"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h3 class="mb-2 fw-semibold">{{ $sellers }}</h3>
                            <p class="text-muted fs-13 mb-0">Total Shop</p>
                            <p class="text-muted mb-0 mt-2 fs-12">
                                <span class="icn-box text-success fw-semibold fs-13 me-1"></span>
                            </p>
                        </div>
                        <div class="col col-auto top-icn dash">
                            <div class="counter-icon bg-primary dash ms-auto">
                                <i class="fa-solid fa-shop text-white fa-layer-group"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h3 class="mb-2 fw-semibold">{{$customer}}</h3>
                            <p class="text-muted fs-13 mb-0">Total Customer</p>
                            <p class="text-muted mb-0 mt-2 fs-12">
                                <span class="icn-box text-success fw-semibold fs-13 me-1">
                                </span>
                            </p>
                        </div>
                        <div class="col col-auto top-icn dash">
                            <div class="counter-icon bg-info dash ms-auto">
                                <i class="fa text-white fa-user"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h3 class="mb-2 fw-semibold">{{$product}}</h3>
                            <p class="text-muted fs-13 mb-0">Total Products</p>
                            <p class="text-muted mb-0 mt-2 fs-12">
                                <span class="icn-box text-success fw-semibold fs-13 me-1">
                                </span>
                            </p>
                        </div>
                        <div class="col col-auto top-icn dash">
                            <div class="counter-icon bg-secondary dash ms-auto box-shadow-success">
                                <i class="fa-solid text-white fa-store"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->

    <!-- ROW-2 -->
    {{--<div class="row">
        <div class="col-sm-12 col-md-12 col-xl-4 col-lg-6">
            <div class="row">
                <div class="col-lg-12 col-xl-12 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-body pb-2">
                            <div class="title-head mb-3">
                                <h3 class="mb-5 card-title">Revenue By channel</h3>
                                <div class="storage-percent">
                                    <div class="progress fileprogress h-auto ps-0 shadow1">
                                        <span class="progress-bar progress-bar-xs wd-15p received" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></span>
                                        <span class="progress-bar progress-bar-xs wd-15p download" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></span>
                                        <span class="progress-bar progress-bar-xs wd-15p shared" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></span>
                                        <span class="progress-bar progress-bar-xs wd-15p my-images" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></span>
                                    </div>
                                    <div class="remaining-storage">
                                        <div class="text-muted fs-13 mb-1 mt-3">Total Revenue Earned</div>
                                        <div class="fw-semibold fs-14 mb-1 mt-3">${{ number_format($sum) }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="content-main mt-5">
                                <ul class="task-list1 row mx-auto">
                                    <li class="col-xl-6">
                                        <span class="mb-0 fs-13 me-1"><i class="task-icon1 bg-primary me-3"></i>Direct From Seller</span>
                                        <span class="text-success fw-semibold fs-12">
                                                                    <span class="mx-1"><i class="fa fa-caret-up"></i></span>
                                                                    <span class="">(42.34%)</span>
                                                                </span>
                                    </li>
                                    <li class="col-xl-6">
                                        <span class="mb-0 fs-13 me-1"><i class="task-icon1 bg-secondary"></i>Referral</span>
                                        <span class="text-danger fw-semibold fs-12">
                                                                    <span class="mx-1"><i class="fa fa-caret-down"></i></span>
                                                                    <span class="">(13%)</span>
                                                                </span>
                                    </li>
                                    <li class="col-xl-6">
                                        <span class="mb-0 fs-13 me-1"><i class="task-icon1 bg-custom-yellow"></i>Social</span>
                                        <span class="text-success fw-semibold fs-12">
                                                                    <span class="mx-1"><i class="fa fa-caret-up"></i></span>
                                                                    <span class="">(62%)</span>
                                                                </span>
                                    </li>
                                    <li class="col-xl-6 mb-xl-0">
                                        <span class="mb-0 fs-13 me-1"><i class="task-icon1 bg-teritary"></i>Organic Search</span>
                                        <span class="text-success fw-semibold fs-12">
                                                                    <span class="mx-1"><i class="fa fa-caret-up"></i></span>
                                                                    <span class="">(22.46%)</span>
                                                                </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12">
                    <div class="card overflow-hidden">
                        <div class="card-header border-bottom">
                            <h4 class="card-title fw-semibold">Latest Transactions</h4>
                            <a href="#" class="ms-auto">View All</a>
                        </div>
                        <div class="card-body p-0 customers mt-1">
                            <div class="list-group py-1">
                                @forelse($totalRevenue as $transaction)
                                <a href="javascript:void(0);" class="border-0">
                                    <div class="list-group-item border-0">
                                        <div class="media mt-0 align-items-center">
                                            <div class="transaction-icon"><i class="fe fe-dollar-sign"></i>
                                            </div>
                                            <div class="media-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="mt-0">
                                                        <h5 class="mb-1 fs-13 fw-normal text-dark">{{$transaction->transaction_id}}</h5>
                                                        <p class="mb-0 fs-12 text-muted">Payment {{$transaction->updated_at}}</p>
                                                    </div>
                                                    <span class="ms-auto fs-13">
                                                        <span class="float-end text-dark">${{$transaction->payment_amount}}</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                @empty
                                    <a href="javascript:void(0);" class="border-0">
                                        <div class="list-group-item border-0">
                                            <div class="media mt-0 align-items-center">
                                                <div class="transaction-icon"><i class="fe fe-dollar-sign"></i>
                                                </div>
                                                <div class="media-body">
                                                    <div class="d-flex align-items-center">
                                                        <div class="mt-0">
                                                            <p>No Transaction Found</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-8">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Sales</h3>
                    <div class="ms-auto">
                        <div class="btn-group p-0 ms-auto">
                            <button class="btn btn-primary-light btn-sm disabled" type="button">2021</button>
                            <button class="btn btn-primary-light btn-sm" type="button">2022</button>
                            <button class="btn btn-primary-light btn-sm disabled" type="button">2023</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="sales-stats d-flex">
                        <div>
                            <div class="text-muted fs-13">Total Sales
                                <span class="p-2 br-5 text-success"><i class="fe fe-arrow-up-right"></i></span>
                            </div>
                            <h3 class="fw-semibold">${{ number_format($sum) }}</h3>
                            <div><span class="text-success fs-13 me-1">32%</span>Increase Since last Year</div>
                        </div>
                    </div>
                    <div id="chartD"></div>
                </div>
            </div>
        </div>
    </div>--}}
    <!-- ROW-2 END -->
    <!-- Row -->
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
                                <th class="border-bottom-0">Order</th>
                                <th class="border-bottom-0">Order total</th>
                                <th class="border-bottom-0">Customer</th>
                                <th class="border-bottom-0">Order Date</th>
                                <th class="border-bottom-0">Order Time</th>
                                <th class="border-bottom-0">Payment Status</th>
                                <th class="border-bottom-0">Order Status</th>
                                <th class="border-bottom-0">Delivery Status</th>
                                <th class="border-bottom-0">Delivery Boy</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $key => $order)
                                <tr>
                                    <td><a href="{{route('orders.show',$order->id)}}">{{$order->order_code}}</a></td>
                                    <td>{{number_format($order->total_price)}} Tk.</td>
                                    <td>{{ucfirst($order->user->name)}}</td>
                                    <td>{{$order->created_at->format('d-m-Y')}}</td>
                                    <td>{{$order->created_at->format('h:i A')}}</td>
                                    <td>
                                        <form action="{{route('admin.order.update.payment.status',$order->id)}}" method="post">
                                        @csrf
                                        <!-- order->order_status -->
                                            <select onchange="this.form.submit()" class="form-select status_change {{$order->payment_status == 0 ? 'bg-warning':''}}{{$order->payment_status == 1 ? 'bg-success':''}}{{$order->payment_status == 2 ? 'bg-danger text-white':''}}" name="payment_status">
                                                <option value="0" {{$order->payment_status == 0 ? 'selected':''}}>Pending</option>
                                                <option value="1" {{$order->payment_status == 1 ? 'selected':''}}>Completed</option>
                                                <option value="2" {{$order->payment_status == 2 ? 'selected':''}}>Canceled</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{route('admin.order.update.order.status',$order->id)}}" method="post">
                                        @csrf
                                        <!-- order->order_status -->
                                            <select onchange="this.form.submit()" class="form-select status_change {{$order->order_status == 0 ? 'bg-warning':''}}{{$order->order_status == 3 ? 'bg-primary':''}}{{$order->order_status == 1 ? 'bg-success':''}}{{$order->order_status == 2 ? 'bg-danger text-white':''}}" name="order_status">
                                                <option value="0" {{$order->order_status == 0 ? 'selected':''}}>Pending</option>
                                                <option value="3" {{$order->order_status == 3 ? 'selected':''}}>Accept</option>
                                                <option value="1" {{$order->order_status == 1 ? 'selected':''}}>Completed</option>
                                                <option value="2" {{$order->order_status == 2 ? 'selected':''}}>Canceled</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{route('admin.order.update.delivery.status',$order->id)}}" method="post">
                                        @csrf
                                        <!-- order->order_status -->
                                            <select onchange="this.form.submit()" class="form-select status_change {{$order->delivery_status == 0 ? 'bg-warning':''}}{{$order->delivery_status == 1 ? 'bg-info':''}}{{$order->delivery_status == 2 ? 'bg-primary':''}}{{$order->delivery_status == 3 ? 'bg-success':''}}{{$order->delivery_status == 4 ? 'bg-danger text-white':''}}" name="delivery_status">
                                                <option value="0" {{$order->delivery_status == 0 ? 'selected':''}}>Pending</option>
                                                <option value="1" {{$order->delivery_status == 1 ? 'selected':''}}>Accepted</option>
                                                <option value="2" {{$order->delivery_status == 2 ? 'selected':''}}>Shipping</option>
                                                <option value="3" {{$order->delivery_status == 3 ? 'selected':''}}>Delivered</option>
                                                <option value="4" {{$order->delivery_status == 4 ? 'selected':''}}>Canceled</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td><span class="bg-success-transparent p-1 text-dark rounded-2">{{$order->deliveryBoy->name ?? 'N/A'}}</span></td>
                                    <td class="d-flex">
                                        <a href="{{route('orders.show',$order->id)}}" class="btn btn-sm btn-success mx-1" title="Order Show"><i class="fa fa-eye"></i></a>
                                        <a href="{{route('admin.order.invoice',$order->id)}}" class="btn btn-sm btn-primary mx-1" title="Order Invoice"><i class="fa fa-info-circle"></i></a>
                                        <a class="btn btn-sm {{$order->deliveryBoy_id != '' ? 'btn-secondary disabled':'btn-warning'}} mx-1" data-bs-target="#modalInput{{$key}}" data-bs-toggle="modal" href="javascript:void(0)"title="Assign Delivery Boy"><i class="fa-solid fa-person-digging" ></i></a>

                                    <!-- <a href="{{route('blogs.edit',$order->id)}}" class="btn btn-success mx-2"><i class="fa fa-edit"></i></a> -->
                                        {{--<form action="{{route('sales.order.delete',$order->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('are you sure to delete ? ')" class="btn btn-sm btn-danger mx-1" title="Delete Order"><i class="fa fa-trash-o"></i></button>
                                        </form>--}}
                                    </td>
                                </tr><!-- INPUT MODAL -->
                                <div class="modal fade" id="modalInput{{$key}}">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <form action="{{route('delivery.boy.assign',$order->id)}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="my-2">
                                                        <p>Deliver Address : {{$order->delivery_address}}</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Delivery Boy</label>
                                                        <ul>
                                                            <li class="select-client">
                                                                <select class="form-control" data-placeholder="Choose One" name="deliveryBoy_id">
                                                                    <option label="Choose one"></option>
                                                                    @foreach($deliveryBoys as $deliveryBoy)
                                                                        <option value="{{$deliveryBoy->user_id}}" {{$deliveryBoy->user_id == $order->deliveryBoy_id ? 'selected':''}}>
                                                                            <span>{{$deliveryBoy->name}}</span>
                                                                            @if($deliveryBoy->present_address != '')
                                                                                <span>({{$deliveryBoy->present_address}})</span>
                                                                            @endif
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="datepickerNoOfMonths{{$key}}">Delivery Date</label>
                                                        <div class="input-group">
                                                            <div class="input-group-text bg-primary-transparent text-primary">
                                                                <i class="fe fe-calendar text-20"></i>
                                                            </div>
                                                            <input class="form-control" value="{{$order->delivery_date}}" name="delivery_date" placeholder="" type="date">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Assign</button>
                                                    <a class="btn btn-danger" data-bs-dismiss="modal">Close</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

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
