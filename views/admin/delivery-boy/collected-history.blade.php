@extends('admin.master')
@section('title','Delivery Boy Collected History Page')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">All Collection List</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">All Collection List</li>
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
                            <h3 class="fw-bold text-center">Collection List</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                            <tr class="text-center">
                                <th class="border-bottom-0">Delivery Boy</th>
                                <th class="border-bottom-0">Collected Amount</th>
                                <th class="border-bottom-0">Earning Amount</th>
                                <th class="border-bottom-0">Delivery Status</th>
                                <th class="border-bottom-0">Delivery Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($deliveryBoys as $deliveryBoy)
                                <tr class="text-center">
                                    <td>{{$deliveryBoy->deliveryBoy->name}}</td>
                                    <td>{{$deliveryBoy->total_shipping}} .{{$currency->symbol ?? ''}}</td>
                                    <td>{{($deliveryBoy->total_shipping * 30) / 100}} .{{$currency->symbol ?? ''}}</td>
                                    <td><i class="fa-solid fa-circle-check"></i></td>
                                    <td>{{$deliveryBoy->delivery_date}}</td>
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

