@extends('admin.master')
@section('title','Rejected Refund')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Rejected Refund</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Rejected Refund</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="border-bottom m-3">
                    <div class="row">
                        <div class="">
                            <h3 class="card-title my-2">Request Refund</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive export-table">
                        <table class="table text-nowrap mb-0 table-bordered table-striped" id="responsive-datatable">
                            <thead class="table-head">
                            <tr class="fw-bold bg-primary text-white text-center">
                                <th>Order Id</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Seller Name</th>
                                <th>Customer</th>
                                <th>Seller Approval</th>
                                <th>Refund Status</th>
                                <th>Date</th>
                            </tr>
                            </thead>

                            <tbody class="table-body">
                            @forelse($refunds as $refund)
                                <tr class="text-center">
                                    <td><a href="{{route('admin.refund.view',$refund->id)}}">#{{$refund->order_code}}</a></td>
                                    <td>{{$refund->product->name}}</td>
                                    <td>{{$refund->price}} {{$currency->symbol}}</td>
                                    <td>{{$refund->user->name}}</td>
                                    <td>{{$refund->customer->user->name}}</td>
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
                                    <td>{{$refund->created_at}}</td>
                                </tr>
                            @empty
                                <tr class="text-center bg-danger-transparent">
                                    <td colspan="9">No Order Found</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->
@endsection

