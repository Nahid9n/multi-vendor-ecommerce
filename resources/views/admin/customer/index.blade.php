@extends('admin.master')
@section('title','All Customer page')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">All Customer Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">All Customer</a></li>
                <li class="breadcrumb-item active" aria-current="page">All Customer Module</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title text-bold">All Customer Table</h3>
                    <a href="{{route('customers.create')}}" class="btn btn-success my-1 float-end text-center">Create Customer</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive export-table">
                        <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom  w-100">
                            <thead>
                            @if(session('message'))
                            <p class="alert alert-success text-center" x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show">{{session('message')}}</p>
                            @endif
                            <tr class="text-center">
                                <th class="border-bottom-0">Name</th>
                                <th class="border-bottom-0">Email</th>
                                <th class="border-bottom-0">Status</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($customers as $customer)
                                <tr class="text-center">
                                <td>{{ucfirst($customer->name)}}</td>
                                <td>{{$customer->email}}</td>
                                <td><span class="p-1 rounded-3 {{$customer->status == 1 ? 'bg-success':'bg-danger text-white'}}">{{$customer->status == 1 ? 'Active':'Banned'}}</span></td>
                                <td class="justify-content-center d-flex">
                                    <form action="{{route('admin.customer.status',$customer->id)}}" method="post">
                                        @csrf
                                        @if($customer->status == 1)
                                            <input hidden type="email" name="status" value="0">
                                        <button type="submit" onclick="return confirm('are you sure to ban this user') ? this.form.submit():''" class="btn btn-danger mx-1 my-2">Ban this user</button>
                                        @else
                                            <input hidden type="email" name="status" value="1">
                                            <button type="submit" onclick="return confirm('are you sure to active this user') ? this.form.submit():''" class="btn btn-success mx-1 my-2">Active this user</button>
                                        @endif
                                    </form>
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


