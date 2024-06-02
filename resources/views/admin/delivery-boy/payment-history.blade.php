@extends('admin.master')
@section('title','Manage Delivery Boy Payments Page')
@section('body')
@include('modal.common')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            @if(Request::route()->getName() == 'deliveryBoy.allPayment')
                <h3 class="fw-bold text-center">All Payment List</h3>
            @elseif(Request::route()->getName() == 'deliveryBoy.pendingPayment')
                <h3 class="fw-bold text-center">Pending Payment List</h3>
            @elseif(Request::route()->getName() == 'deliveryBoy.completePayment')
                <h3 class="fw-bold text-center">Complete Payment List</h3>
            @elseif(Request::route()->getName() == 'deliveryBoy.cancelRequests')
                <h3 class="fw-bold text-center">Cancel Payment List</h3>
            @endif
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
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
                            @if(Request::route()->getName() == 'deliveryBoy.allPayment')
                            <h3 class="fw-bold text-center">All Payment List</h3>
                            @elseif(Request::route()->getName() == 'deliveryBoy.pendingPayment')
                                <h3 class="fw-bold text-center">Pending Payment List</h3>
                            @elseif(Request::route()->getName() == 'deliveryBoy.completePayment')
                                <h3 class="fw-bold text-center">Complete Payment List</h3>
                            @elseif(Request::route()->getName() == 'deliveryBoy.cancelRequests')
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
                                <th class="border-bottom-0">Delivery Boy</th>
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
                            @foreach($deliveryBoys as $key=>$deliveryBoy)
                                <tr class="text-center">
                                    <td>{{$deliveryBoy->user->name}}</td>
                                    <td>{{$deliveryBoy->withdrawal_amount}} .{{$currency->symbol ?? ''}}</td>
                                    <td>{{$deliveryBoy->payment_method}}</td>
                                    <td>{{$deliveryBoy->account_number}}</td>
                                    <td>{{$deliveryBoy->account_holder_name}}</td>
                                    <td>
                                        <a href="" data-bs-toggle="modal" data-bs-target="#attachment{{$key}}">Add Attachment</a>
                                        @if($deliveryBoy->image != '')
                                        <img width="100" height="100" src="{{asset($deliveryBoy->image)}}" alt="">
                                        @endif
                                    </td>
                                    <td>
                                        @if(Request::route()->getName() == 'deliveryBoy.allPayment')
                                            <span class="p-2 rounded-3 {{$deliveryBoy->status == 0 ? 'bg-warning text-dark':''}}{{$deliveryBoy->status == 1 ? 'bg-success text-black':''}}{{$deliveryBoy->status == 2 ? 'bg-danger text-white':''}}">
                                                {{$deliveryBoy->status == 0 ? 'Pending':''}}
                                                {{$deliveryBoy->status == 1 ? 'Done':''}}
                                                {{$deliveryBoy->status == 2 ? 'Cancel':''}}
                                            </span>
                                        @else
                                            <form action="{{route('admin.deliveryBoy.payment.status.change',$deliveryBoy->id)}}" method="post">
                                            @csrf
                                            <!-- order->order_status -->
                                                <select onchange="this.form.submit()" class="form-select status_change rounded-3 text-center p-1 {{$deliveryBoy->status == 0 ? 'bg-warning text-dark':''}}{{$deliveryBoy->status == 1 ? 'bg-success text-dark':''}}{{$deliveryBoy->status == 2 ? 'bg-danger text-white':''}}" name="status">
                                                    <option label="select one" disabled selected>select one</option>
                                                    <option value="0" {{$deliveryBoy->status == 0 ? 'selected':''}} >Pending</option>
                                                    <option value="1" {{$deliveryBoy->status == 1 ? 'selected':''}}>Done</option>
                                                    <option value="2" {{$deliveryBoy->status == 2 ? 'selected':''}}>Cancel</option>
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
                                                <form action="{{route('admin.deliveryBoy.payment.add.attachment',$deliveryBoy->id)}}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="image" class="my-2"> </label>
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
                                    <td>{{$deliveryBoy->created_at}}</td>
                                    <td><a href="{{route('admin.deliveryBoy.withdraw.details',$deliveryBoy->id)}}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a></td>

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

