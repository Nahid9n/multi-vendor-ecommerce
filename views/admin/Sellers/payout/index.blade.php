@extends('admin.master')
@section('title','Manage Seller Payments Page')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            @if(Request::route()->getName() == 'admin.seller.payment.all')
                <h3 class="fw-bold text-center">All Payment List</h3>
            @elseif(Request::route()->getName() == 'admin.seller.payment.pending')
                <h3 class="fw-bold text-center">Pending Payment List</h3>
            @elseif(Request::route()->getName() == 'admin.seller.payment.complete')
                <h3 class="fw-bold text-center">Complete Payment List</h3>
            @elseif(Request::route()->getName() == 'admin.seller.payment.cancel')
                <h3 class="fw-bold text-center">Cancel Payment List</h3>
            @endif
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">All Payment List</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="border-bottom py-5">
                    <div class="row justify-content-center">
                        <div class="col-6">
                            @if(Request::route()->getName() == 'admin.seller.payment.all')
                                <h3 class="fw-bold text-center">All Payment List</h3>
                            @elseif(Request::route()->getName() == 'admin.seller.payment.pending')
                                <h3 class="fw-bold text-center">Pending Payment List</h3>
                            @elseif(Request::route()->getName() == 'admin.seller.payment.complete')
                                <h3 class="fw-bold text-center">Complete Payment List</h3>
                            @elseif(Request::route()->getName() == 'admin.seller.payment.cancel')
                                <h3 class="fw-bold text-center">Cancel Payment List</h3>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                            <tr class="text-center">
                                <th class="border-bottom-0">Seller</th>
                                <th class="border-bottom-0">Payment Amount</th>
                                <th class="border-bottom-0">Payment Method</th>
                                <th class="border-bottom-0">Account Number</th>
                                <th class="border-bottom-0">Account Holder</th>
                                <th class="border-bottom-0">Attachment</th>
                                <th class="border-bottom-0">Status</th>
                                <th class="border-bottom-0">Date</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sellers as $key=>$seller)
                                <tr class="text-center">
                                    <td>{{$seller->user->name}}</td>
                                    <td>{{$seller->withdrawal_amount}} .{{$currency->symbol ?? ''}}</td>
                                    <td>{{$seller->payment_method}}</td>
                                    <td>{{$seller->account_number}}</td>
                                    <td>{{$seller->account_holder_name}}</td>
                                    <td>
                                        <a href="" data-bs-toggle="modal" data-bs-target="#attachment{{$key}}">Add Attachment</a>
                                        <img width="100" height="100" src="{{asset($seller->image)}}" alt="">
                                    </td>
                                    <td>
                                        @if(Request::route()->getName() == 'admin.seller.payment.all')
                                            <span class="p-2 rounded-3 {{$seller->status == 0 ? 'bg-warning text-dark':''}}{{$seller->status == 1 ? 'bg-success text-black':''}}{{$seller->status == 2 ? 'bg-danger text-white':''}}">
                                                {{$seller->status == 0 ? 'Pending':''}}
                                                {{$seller->status == 1 ? 'Done':''}}
                                                {{$seller->status == 2 ? 'Cancel':''}}
                                            </span>
                                        @else
                                            <form action="{{route('admin.seller.payment.status.change',$seller->id)}}" method="post">
                                            @csrf
                                            <!-- order->order_status -->
                                                <select onchange="this.form.submit()" class="form-select status_change rounded-3 text-center p-1 {{$seller->status == 0 ? 'bg-warning text-dark':''}}{{$seller->status == 1 ? 'bg-success text-dark':''}}{{$seller->status == 2 ? 'bg-danger text-white':''}}" name="status">
                                                    <option label="select one" disabled selected>select one</option>
                                                    <option value="0" {{$seller->status == 0 ? 'selected':''}} >Pending</option>
                                                    <option value="1" {{$seller->status == 1 ? 'selected':''}}>Done</option>
                                                    <option value="2" {{$seller->status == 2 ? 'selected':''}}>Cancel</option>
                                                </select>
                                            </form>
                                        @endif
                                    </td>
                                    <div class="modal fade" id="attachment{{$key}}" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="paymentModalLabel">Add An Attachment</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{route('admin.seller.payment.add.attachment',$seller->id)}}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="image" class="my-2">Add An Attachment <span class="text-danger">*</span></label>
                                                            <input type="file" class="form-control" id="image" name="image" placeholder="image">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit"  class="btn btn-primary">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <td>{{$seller->created_at}}</td>
                                    <td><a href="{{route('admin.seller.withdraw.details',$seller->id)}}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a></td>
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
