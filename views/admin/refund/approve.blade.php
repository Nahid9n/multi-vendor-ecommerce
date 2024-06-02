@extends('admin.master')
@section('title','Approved Refund')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Approved Refund </h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Approved Refund </li>
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
                            <h3 class="card-title my-2">Approved Refund</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive export-table">
                        @if(session('message'))
                            <p class="alert alert-success text-center" x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show">{{session('message')}}</p>
                        @endif
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
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody class="table-body">
                            @forelse($refunds as $refund)
                                <tr class="text-center">
                                    <td>#{{$refund->order_code}}</td>
                                    <td>{{$refund->product}}</td>
                                    <td>{{$refund->price}}</td>
                                    <td>{{$refund->seller_name}}</td>
                                    <td>{{$refund->customer_id}}</td>
                                    <td>{{$refund->seller_approval == 0 ? 'Pending':''}}</td>
                                    <td>{{$refund->refund_status == 1 ? 'Approved':''}}</td>
                                    <td>{{$refund->created_at}}</td>
                                    <td class="text-center d-flex justify-content-center">
                                        <abbr title="Pending">
                                            <form action="{{route('product-seller.refund.status',$refund->id)}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="refund_status" class="" value="0">
                                                <button type="submit" onclick="return confirm('are you sure to Confirm Pending?')" class="btn btn-warning mb-1 mx-1"><i class="fa fa-solid fa-spinner"></i></button>
                                            </form>
                                        </abbr>
                                        <abbr title="Reject">
                                            <form action="{{route('product-seller.refund.status',$refund->id)}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="refund_status" class="" value="2">
                                                <button type="submit" onclick="return confirm('are you sure to Confirm Reject?')" class="btn btn-danger mb-1 mx-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z"/></svg>
                                                </button>
                                            </form>
                                        </abbr>
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-center bg-danger-transparent">
                                    <td colspan="9">No Order Found</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        <div class="d-grid justify-content-center my-2">
                                                        {{$refunds->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->
@endsection

