@extends('delivery-boy.layout.app')
@section('title','Dashboard')
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

    .btn-sm {
        padding: 2px 6px !important;
    }

    .table tr td a {
        color: #1a1a1a;
        font-weight: bold;
    }

    .table tr:hover {
        background: #0000000d;
        transition: 0.2s;
        /*color: ;*/
    }

    .table tr td a:hover {
        background: #0000000d;
        transition: 0.2s;
        color: red;
        text-decoration: none;
        /*background: transparent;*/
    }

    .table td,
    .table th {
        border-color: transparent;
        border-bottom: 1px solid #00000024;
    }
    .checked {
        color: orange;
    }

    /* Custom CSS for wallet design */
    .wallet-container {
        max-width: 500px;
        margin: 0 auto;
    }
    .wallet-header {
        background-color: #007bff;
        color: #fff;
        padding: 20px;
        text-align: center;
    }
    .wallet-body {
        padding: 20px;
    }
    .wallet-item {
        border-bottom: 1px solid #dee2e6;
        padding: 10px 0;
    }
</style>
<section class="pt-50 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-3">
                        <div class="dashboard-menu">
                            <div class="my-4 text-center">
                                <img class="rounded-circle" src="{{asset($deliveryBoy->deliveryBoy->image)}}" alt="" width="100" height="100">
                                <p class="fw-bold">{{auth()->user()->name}}</p>
                            </div>
                            <div class="">
                                <ul class="nav flex-column" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="true"><i class="fa-solid fa-house mx-2 text-dark"></i> Dashboard</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="true"><i class="fa-solid fa-calendar-check mx-2 text-dark"></i>Assigned Delivery</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pickup-tab" data-bs-toggle="tab" href="#pickup" role="tab" aria-controls="pickup" aria-selected="true"><i class="fa-solid fa-person-digging mx-2 text-dark"></i> Picked Up Delivery</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="on-the-way-tab" data-bs-toggle="tab" href="#on-the-way" role="tab" aria-controls="on-the-way" aria-selected="true"><i class="fa-solid fa-truck-fast mx-2 text-dark"></i>On The Way Delivery</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pending-tab" data-bs-toggle="tab" href="#pending" role="tab" aria-controls="pending" aria-selected="true"><i class="fa-regular fa-clock mx-2 text-dark"></i>Pending Delivery</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="complete-orders-tab" data-bs-toggle="tab" href="#complete" role="tab" aria-controls="track-orders" aria-selected="false"><i class="fa-solid fa-check-to-slot mx-2 text-dark"></i>Completed Delivery</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="cancel-orders-tab" data-bs-toggle="tab" href="#cancel-orders" role="tab" aria-controls="cancel-orders" aria-selected="false"><i class="fa-solid fa-xmark mx-2 text-dark"></i>Cancel Delivery</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="total-collection-tab" data-bs-toggle="tab" href="#total-collection" role="tab" aria-controls="total-collection" aria-selected="true"><i class="fa-solid fa-money-bill-wheat mx-2 text-dark"></i>Total Collection</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="earning-tab" data-bs-toggle="tab" href="#earning" role="tab" aria-controls="earning" aria-selected="true"><i class="fa-solid fa-money-bill-wave mx-2 text-dark"></i>Earning</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="wallet-tab" data-bs-toggle="tab" href="#wallet" role="tab" aria-controls="wallet" aria-selected="true"><i class="fa-solid fa-money-bill-wave mx-2 text-dark"></i>Wallet</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="payment-info-tab" data-bs-toggle="tab" href="#payment-info" role="tab" aria-controls="payment-info" aria-selected="true"><i class="fa-solid fa-money-bill-wave mx-2 text-dark"></i>Payment Info</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="fa-solid fa-user mx-2 text-dark"></i>Manage Profile</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="change-password-tab" data-bs-toggle="tab" href="#change-password" role="tab" aria-controls="change-password" aria-selected="true"><i class="fa-solid fa-key mx-2 text-dark"></i>Change Password</a>
                                    </li>
                                    <li class="nav-item">
                                        <form class="nav-link " action="{{route('delivery-boy.logout')}}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-sm form-control btn-success" onclick="return confirm('are you sure to logout ? ')">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content dashboard-content">
                            <div class="tab-pane fade show active" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                <div class="row">
                                    <div class="col-lg-6 col-sm-12 col-md-6 col-xl-6 my-1">
                                        <div class="card overflow-hidden bg-warning bg-opacity-75">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <h4 class="mb-2 text-dark fw-semibold">{{$deliveryBoyDetail->balance ?? '0'}} .{{$currency->symbol ?? ''}}</h4>
                                                        <p class="text-dark fs-13 mb-0">Wallet Balance</p>
                                                        <p class="mb-0 mt-2 fs-10">
                                                            <span class="icn-box fa fa-money text-dark fw-bold fs-13 me-1"></span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12 col-md-6 col-xl-6 my-1">
                                        <div class="card overflow-hidden bg-primary bg-opacity-75">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <h4 class="mb-2 text-white fw-semibold">{{$deliveryBoyDetail->earning ?? '0'}} .{{$currency->symbol ?? ''}}</h4>
                                                        <p class="text-white fs-13 mb-0">Total Income</p>
                                                        <p class="mb-0 mt-2 fs-10">
                                                            <span class="icn-box fa fa-money text-white fw-bold fs-13 me-1"></span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12 col-md-6 col-xl-6 my-1">
                                        <div class="card overflow-hidden bg-success bg-opacity-75">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <h4 class="mb-2 text-dark fw-semibold">{{$deliveryBoyDetail->total_withdraw ?? '0'}} .{{$currency->symbol ?? ''}}</h4>
                                                        <p class="text-dark fs-13 mb-0">Total Withdraw</p>
                                                        <p class="mb-0 mt-2 fs-10">
                                                            <span class="icn-box fa fa-money text-dark fw-bold fs-13 me-1"></span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-12 col-md-6 col-xl-6 my-1">
                                        <div class="card overflow-hidden bg-info bg-opacity-10">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <h4 class="mb-2 fw-semibold text-white">{{$deliveryBoyDetail->total_collection ?? '0'}} .{{$currency->symbol ?? ''}}</h4>
                                                        <p class="text-white fs-13 mb-0">Total Collection</p>
                                                        <p class="mb-0 mt-2 fs-10">
                                                            <span class="icn-box fa fa-money text-white fw-bold fs-13 me-1"></span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12 col-md-6 col-xl-6 my-1">
                                        <div class="card overflow-hidden bg-info bg-opacity-75">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col ">
                                                        <h4 class="mb-2 text-white fw-semibold">{{$deliveryBoyDetail->pending_order ?? '0'}}</h4>
                                                        <p class="text-white fs-13 mb-0">Pending Delivery</p>
                                                        <p class="text-white mb-0 mt-2 fs-12">
                                                            <span class="icn-box fa fa-check-circle-o text-white fw-bold fs-13 me-1"></span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12 col-md-6 col-xl-6 my-1">
                                        <div class="card overflow-hidden bg-success bg-opacity-10">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <h4 class="mb-2 fw-semibold">{{$deliveryBoyDetail->complete_order ?? '0'}}</h4>
                                                        <p class="text-dark fs-13 mb-0">Completed Delivery</p>
                                                        <p class="text-dark mb-0 mt-2 fs-12">
                                                            <span class="icn-box fa fa-check-circle-o text-dark fw-bold fs-13 me-1"></span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12 col-md-6 col-xl-6 my-1">
                                        <div class="card overflow-hidden bg-danger bg-opacity-75">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <h4 class="mb-2 text-white fw-semibold">{{$deliveryBoyDetail->cancel_order ?? '0'}}</h4>
                                                        <p class="text-white fs-13 mb-0">Canceled Delivery</p>
                                                        <p class="text-white mb-0 mt-2 fs-12">
                                                            <span class="icn-box fa fa-solid fa-rectangle-xmark text-white fw-semibold fs-13 me-1"></span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12 col-md-6 col-xl-6 my-1">
                                        <div class="card overflow-hidden bg-secondary bg-opacity-75">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <h4 class="mb-2 text-white fw-bold">
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star"></span>
                                                        </h4>
                                                        <p class="text-white fs-13 mb-0">Ratings</p>
                                                        <p class="text-white mb-0 mt-2 fs-12">
                                                            <span class="icn-box fa fa-crosshairs text-success fw-semibold fs-13 me-1"></span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
{{--                            <div class="tab-pane fade {{ ($id != '')? 'active show' : '' }}" id="orders" role="tabpanel" aria-labelledby="orders-tab">--}}
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">Your Orders</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            @if(count($assignedOrders) > 0)
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Order</th>
                                                        <th>Date</th>
                                                        <th>Order Status</th>
                                                        <th>Total</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($assignedOrders as $order)
                                                    <tr>
                                                        <td>#{{$order->order_code }}</td>
                                                        <td>{{$order->order_date}}</td>
                                                        <td>{{$order->order_status == 0 ? 'Pending':''}}{{$order->order_status == 1 ? 'Completed':''}}{{$order->order_status == 2 ? 'Canceled':''}}</td>
                                                        <td>{{$order->total_price}} .{{$currency->symbol ?? ''}}</td>
                                                        <td class="d-flex">
                                                            <a class="btn btn-sm btn-success text-white mx-1" href="{{ route('deliveryBoy.order.details', $order->id) }}">View</a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            @else
                                            <div class="text-center">Empty</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pickup" role="tabpanel" aria-labelledby="orders-tab">
{{--                            <div class="tab-pane fade {{ ($id != '')? 'active show' : '' }}" id="orders" role="tabpanel" aria-labelledby="orders-tab">--}}
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">Your Orders</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            @if(count($pickupOrders) > 0)
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Order</th>
                                                        <th>Date</th>
                                                        <th>Order Status</th>
                                                        <th>Total</th>
                                                        <th>Delivery Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($pickupOrders as $order)
                                                    <tr>
                                                        <td>#{{$order->order_code }}</td>
                                                        <td>{{$order->order_date}}</td>
                                                        <td>{{$order->order_status == 0 ? 'Pending':''}}{{$order->order_status == 1 ? 'Completed':''}}{{$order->order_status == 2 ? 'Canceled':''}}</td>
                                                        <td>{{$order->total_price}} .{{$currency->symbol ?? ''}}</td>
                                                        <td>
                                                            <form action="{{route('deliveryBoy.delivery.status.change',$order->id)}}" method="post">
                                                            @csrf
                                                            <!-- order->order_status -->
                                                                <select onchange="this.form.submit()" class="form-select status_change {{$order->delivery_status == 0 ? 'bg-warning':''}}{{$order->delivery_status == 1 ? 'bg-info':''}}{{$order->delivery_status == 2 ? 'bg-primary':''}}{{$order->delivery_status == 3 ? 'bg-success':''}}{{$order->delivery_status == 4 ? 'bg-danger text-white':''}}" name="delivery_status">
                                                                    <option label="select one">select one</option>
                                                                    <option value="2">Shipping</option>
                                                                    <option value="3">Delivered</option>
                                                                    <option value="4">Canceled</option>
                                                                </select>
                                                            </form>
                                                        </td>
                                                        <td class="d-flex">
                                                            <a class="btn btn-sm btn-success text-white mx-1" href="{{ route('deliveryBoy.order.details', $order->id) }}">View</a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            @else
                                            <div class="text-center">Empty</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="on-the-way" role="tabpanel" aria-labelledby="orders-tab">
{{--                            <div class="tab-pane fade {{ ($id != '')? 'active show' : '' }}" id="orders" role="tabpanel" aria-labelledby="orders-tab">--}}
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">Your Orders</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            @if(count($onTheWays) > 0)
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Order</th>
                                                        <th>Date</th>
                                                        <th>Order Status</th>
                                                        <th>Total</th>
                                                        <th>Delivery Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($onTheWays as $order)
                                                    <tr>
                                                        <td>#{{$order->order_code }}</td>
                                                        <td>{{$order->order_date}}</td>
                                                        <td>{{$order->order_status == 0 ? 'Pending':''}}{{$order->order_status == 1 ? 'Completed':''}}{{$order->order_status == 2 ? 'Canceled':''}}</td>
                                                        <td>{{$order->total_price}} .{{$currency->symbol ?? ''}}</td>
                                                        <td>
                                                            <form action="{{route('deliveryBoy.delivery.status.change',$order->id)}}" method="post">
                                                            @csrf
                                                            <!-- order->order_status -->
                                                                <select onchange="this.form.submit()" class="form-select status_change {{$order->delivery_status == 0 ? 'bg-warning':''}}{{$order->delivery_status == 1 ? 'bg-info':''}}{{$order->delivery_status == 2 ? 'bg-primary':''}}{{$order->delivery_status == 3 ? 'bg-success':''}}{{$order->delivery_status == 4 ? 'bg-danger text-white':''}}" name="delivery_status">
                                                                    <option label="select one">select one</option>
                                                                    <option value="3">Delivered</option>
                                                                    <option value="4">Canceled</option>
                                                                </select>
                                                            </form>
                                                        </td>
                                                        <td class="d-flex">
                                                            <a class="btn btn-sm btn-success text-white mx-1" href="{{ route('deliveryBoy.order.details', $order->id) }}">View</a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            @else
                                            <div class="text-center">Empty</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="pending-tab">
{{--                            <div class="tab-pane fade {{ ($id != '')? 'active show' : '' }}" id="orders" role="tabpanel" aria-labelledby="orders-tab">--}}
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">Your Orders</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Order</th>
                                                        <th>Date</th>
                                                        <th>Order Status</th>
                                                        <th>Total</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($pendingOrders as $order)
                                                    <tr>
                                                        <td>#{{$order->order_code }}</td>
                                                        <td>{{$order->order_date}}</td>
                                                        <td>{{$order->order_status == 0 ? 'Pending':''}}{{$order->order_status == 1 ? 'Completed':''}}{{$order->order_status == 2 ? 'Canceled':''}}</td>
                                                        <td>{{$order->total_price}} .{{$currency->symbol ?? ''}}</td>
                                                        <td class="d-flex">
                                                            <a class="btn btn-sm btn-success text-white mx-1" href="{{ route('deliveryBoy.order.details', $order->id) }}">View</a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="complete" role="tabpanel" aria-labelledby="orders-tab">
{{--                            <div class="tab-pane fade {{ ($id != '')? 'active show' : '' }}" id="orders" role="tabpanel" aria-labelledby="orders-tab">--}}
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">Your Orders</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Order</th>
                                                        <th>Date</th>
                                                        <th>Order Status</th>
                                                        <th>Total</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($completedOrders as $order)
                                                    <tr>
                                                        <td>#{{$order->order_code }}</td>
                                                        <td>{{$order->order_date}}</td>
                                                        <td>{{$order->order_status == 0 ? 'Pending':''}}{{$order->order_status == 1 ? 'Completed':''}}{{$order->order_status == 2 ? 'Canceled':''}}</td>
                                                        <td>{{$order->total_price}} .{{$currency->symbol ?? ''}}</td>
                                                        <td class="d-flex">
                                                            <a class="btn btn-sm btn-success text-white mx-1" href="{{ route('deliveryBoy.order.details', $order->id) }}">View</a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="cancel-orders" role="tabpanel" aria-labelledby="cancel-orders-tab">
{{--                            <div class="tab-pane fade {{ ($id != '')? 'active show' : '' }}" id="orders" role="tabpanel" aria-labelledby="orders-tab">--}}
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">Your Orders</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Order</th>
                                                        <th>Date</th>
                                                        <th>Order Status</th>
                                                        <th>Total</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($cancelOrders as $order)
                                                    <tr>
                                                        <td>#{{$order->order_code }}</td>
                                                        <td>{{$order->order_date}}</td>
                                                        <td>{{$order->order_status == 0 ? 'Pending':''}}{{$order->order_status == 1 ? 'Completed':''}}{{$order->order_status == 2 ? 'Canceled':''}}</td>
                                                        <td>{{$order->total_price}} .{{$currency->symbol ?? ''}}</td>
                                                        <td class="d-flex">
                                                            <a class="btn btn-sm btn-success text-white mx-1" href="{{ route('deliveryBoy.order.details', $order->id) }}">View</a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="total-collection" role="tabpanel" aria-labelledby="total-collection-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">Total Collection</h5>
                                    </div>
                                    <div class="card-body contact-from-area">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Order</th>
                                                                <th>Date</th>
                                                                <th>Amount</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($completedOrders as $order)
                                                            <tr>
                                                                <td>#{{$order->order_number}}</td>
                                                                <td>{{$order->order_date}}</td>
                                                                <td>{{$order->total_shipping}} .{{$currency->symbol ?? ''}}</td>
                                                                <td class="d-flex">
                                                                    <a class="btn btn-sm btn-success text-white mx-1" href="{{ route('deliveryBoy.order.details', $order->id) }}">View</a>
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
                            </div>
                            <div class="tab-pane fade" id="earning" role="tabpanel" aria-labelledby="earning-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">Earning</h5>
                                    </div>
                                    <div class="card-body contact-from-area">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="table-responsive">
                                                    <table class="table dataTable table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>Order</th>
                                                                <th>Date</th>
                                                                <th>Earning Amount</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($completedOrders as $order)
                                                            <tr>
                                                                <td>#{{$order->order_number}}</td>
                                                                <td>{{$order->order_date}}</td>
                                                                <td>{{(($order->total_shipping * 30)/100)}} .{{$currency->symbol ?? ''}}</td>
                                                                <td class="d-flex">
                                                                    <a class="btn btn-sm btn-success text-white mx-1" href="{{ route('deliveryBoy.order.details', $order->id) }}">View</a>
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
                            </div>
                            <div class="tab-pane fade" id="wallet" role="tabpanel" aria-labelledby="wallet-tab">
                                <div class="card my-2">
                                    <div class="wallet-header">
                                        <h3 class="text-white">My Wallet</h3>
                                    </div>
                                    <div class="card-body contact-from-area">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="wallet-container">
                                                    <div class="my-2 text-center">
                                                        <img class="rounded-circle" src="{{asset($deliveryBoy->deliveryBoy->image)}}" alt="" width="100" height="100">
                                                        <p class="fw-bold">{{auth()->user()->name}}</p>
                                                        <p>Payment Method : <span class="fw-bold text-primary">{{$deliveryBoyPaymentInfo->payment_method ?? 'N/A'}}</span></p>
                                                        <p>Account Holder : <span class="fw-bold text-primary">{{$deliveryBoyPaymentInfo->account_holder_name ?? 'N/A'}}</span></p>
                                                        <p>Account Number : <span class="fw-bold text-primary">{{$deliveryBoyPaymentInfo->account_number ?? 'N/A'}}</span></p>
                                                        <p>Balance: <span class="fw-bold text-primary">{{$deliveryBoyDetail->balance}} .{{$currency->symbol ?? ''}}</span></p>
                                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#withdraw">
                                                            Withdraw
                                                        </button>

                                                    </div>

                                                    <div class="modal fade" id="withdraw" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="paymentModalLabel">Withdraw</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <!-- Form to add payment information -->
                                                                    <form action="{{route('deliveryBoy.withdrawal.request')}}" method="POST">
                                                                    @csrf
                                                                    <!-- Input fields for payment information -->
                                                                        <div class="form-group">
                                                                            <label for="payment_method">Withdrawal Amount <span class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control" id="withdrawal_amount" name="withdrawal_amount" placeholder="Withdrawal Amount" required>
                                                                        </div>
                                                                        <!-- Add more fields as needed -->
                                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">Withdrawal History</h5>
                                    </div>
                                    <div class="card-body contact-from-area">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="table-responsive">
                                                    <table class="table dataTable table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Payment Method</th>
                                                                <th>Account Holder</th>
                                                                <th>Account Number</th>
                                                                <th>Amount</th>
                                                                <th>Branch</th>
                                                                <th>Status</th>
                                                                <th>Date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($deliveryBoyPaymentHistories as $payment)
                                                            <tr>
                                                                <td>{{$payment->payment_method}}</td>
                                                                <td>{{$payment->account_holder_name}}</td>
                                                                <td>{{$payment->account_number}}</td>
                                                                <td>{{$payment->withdrawal_amount}} .{{$currency->symbol ?? ''}}</td>
                                                                <td>{{$payment->branch}}</td>
                                                                <td><span class="{{$payment->status == 0 ? 'bg-warning text-dark':''}}{{$payment->status == 1 ? 'bg-success text-dark':''}}{{$payment->status == 2 ? 'bg-danger text-white':''}} p-1">{{$payment->status == 0 ? 'Pending':''}}{{$payment->status == 1 ? 'Done':''}}{{$payment->status == 2 ? 'Cancel':''}}</span></td>
                                                                <td>{{$payment->created_at}}</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="payment-info" role="tabpanel" aria-labelledby="payment-info-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Payment Info</h5>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="{{ route('deliveryBoy.payment.info',$deliveryBoy->id) }}" name="enq">
                                            @csrf
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label>Payment Method <span class="text-danger">*</span></label>
                                                    <input class="form-control square" name="payment_method" type="text" autocomplete="off" value="{{$deliveryBoyPaymentInfo->payment_method}}" placeholder="Payment Method" required>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Account Holder Name <span class="text-danger">*</span></label>
                                                    <input class="form-control square" name="account_holder_name" type="text" value="{{$deliveryBoyPaymentInfo->account_holder_name}}" placeholder="Account Holder Name" required>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Account Number <span class="text-danger">*</span></label>
                                                    <input class="form-control square" name="account_number" type="number" value="{{$deliveryBoyPaymentInfo->account_number}}" placeholder="account number" required>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Branch <span class="text-danger">(optional)</span></label>
                                                    <input class="form-control square" name="branch" type="text" value="{{$deliveryBoyPaymentInfo->branch}}" placeholder="Branch">
                                                </div>
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-fill-out px-5 submit">Save</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Account Details</h5>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="{{ route('delivery-boy.account.update' ,$deliveryBoy->deliveryBoy->id) }}" name="enq" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label>Display Name</label>
                                                    <input class="form-control square" name="name" type="text" value="{{ auth()->user()->name }}">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Image</label>
                                                    <input class="form-control square" name="image" type="file">
                                                    <img width="50" class="rounded-circle" height="50" src="{{asset($deliveryBoy->deliveryBoy->image)}}" alt="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Phone</label>
                                                    <input class="form-control square" name="mobile" type="number" value="{{ $deliveryBoy->deliveryBoy->mobile }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Designation</label>
                                                    <input class="form-control square" name="designation" type="text" value="{{ $deliveryBoy->deliveryBoy->designation }}" readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Blood</label>
                                                    <input class="form-control square" name="blood" type="text" value="{{ $deliveryBoy->deliveryBoy->blood }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Date of Birth</label>
                                                    <input class="form-control square" name="date" type="date" value="{{ $deliveryBoy->deliveryBoy->date }}">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Present Address</label>
                                                    <input class="form-control square" name="present_address" type="text" value="{{ $deliveryBoy->deliveryBoy->present_address }}">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Permanent Address</label>
                                                    <input class="form-control square" name="permanentAddress" type="text" value="{{ $deliveryBoy->deliveryBoy->permanentAddress }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Gender</label>
                                                    <select class="form-select square" name="gender">
                                                        <option value="">Select</option>
                                                        <option value="Male" {{$deliveryBoy->deliveryBoy->gender == 'Male' ? 'selected' : ''}}>Male</option>
                                                        <option value="Female" {{$deliveryBoy->deliveryBoy->gender == 'Female' ? 'selected' : ''}}>Female</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Short Description</label>
                                                    <textarea class="form-control square" name="short_description" id="" cols="30" rows="5">{{ $deliveryBoy->deliveryBoy->short_description }}</textarea>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Biography</label>
                                                    <textarea class="form-control square" name="biography" id="" cols="30" rows="5">{{ $deliveryBoy->deliveryBoy->biography }}</textarea>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Experience</label>
                                                    <input class="form-control square" name="experience" type="text" value="{{ $deliveryBoy->deliveryBoy->experience }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Facebook </label>
                                                    <input class="form-control square" name="facebook" type="text" value="{{ $deliveryBoy->deliveryBoy->facebook  }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Twitter</label>
                                                    <input class="form-control square" name="twitter" type="text" value="{{ $deliveryBoy->deliveryBoy->twitter }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>LinkedIn</label>
                                                    <input class="form-control square" name="linkedIn" type="text" value="{{ $deliveryBoy->deliveryBoy->linkedIn }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Website</label>
                                                    <input class="form-control square" name="website" type="text" value="{{ $deliveryBoy->deliveryBoy->website }}">
                                                </div>
                                                <div class="col-md-12 my-5">
                                                    <button type="submit" class="btn btn-fill-out px-5 submit">Save</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="change-password" role="tabpanel" aria-labelledby="change-password-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Change Password</h5>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="{{ route('delivery-boy.account.update.password',$deliveryBoy->deliveryBoy->user_id) }}" name="enq">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label>Current Password <span class="text-danger">*</span></label>
                                                    <input class="form-control square" name="old_password" type="password" autocomplete="off" placeholder="current password" required>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>New Password <span class="text-danger">*</span></label>
                                                    <input class="form-control square" name="new_password" type="password" placeholder="new password" required>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Confirm New Password <span class="text-danger">*</span></label>
                                                    <input class="form-control square" name="confirm_password" type="password" placeholder="confirm new password" required>
                                                </div>
                                                <div class="col-md-12">
                                                    <button type="submit" onclick="return confirm('are you sure to change password ?')" class="btn btn-fill-out px-5 submit">Save</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
