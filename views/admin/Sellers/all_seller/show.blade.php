@extends('admin.master')
@section('title','Show Seller ')
@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Seller Product Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Seller Product</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Seller Product</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Product Seller Details</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Image</th>
                            <td>
                               <img width="80" height="80" src="{{ url('uploads/sellers/',$seller->image) }}" alt="image">
                            </td>
                        </tr>

                        <tr>
                            <th> Name</th>
                            <th>{{$seller->full_name ??"N/A"}}</th>
                        </tr>
                        <tr>
                            <th> Shop Name</th>
                            <th>{{$seller->shop_name}}</th>
                        </tr>
                        <tr>
                            <th> Email</th>
                            <th>{{$seller->email}}</th>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <th>{{$seller->phone}}</th>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <th>{{$seller->gender }}</th>
                        </tr>
                        <tr>
                            <th>Date of Birth</th>
                            <th>{{$seller->DOB}}</th>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <th>{{$seller->address }}</th>
                        </tr>
                        <tr>
                            <th> Join Date</th>
                        <th>{{ $seller->join_date}}</th>
                        </tr>

                            <th> Added </th>
                            <th>
                               {{ $seller->added_by }}
                            </th>
                        </tr>



                            <th>  Status</th>
                            <td>{{$seller->status == 1 ? "active" : "inactive"}}</td>
                        </tr>
                        <tr>

                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

