@extends('admin.master')
@section('title','Manage Delivery Boy Page')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Delivery Boy Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Delivery Boy</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title text-bold">Delivery Boy Table</h3>
                    <a href="{{route('delivery-boy.create')}}" class="btn btn-success my-1 float-end text-center">Add Delivery Boy</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                            <tr class="text-center">
                                <th class="border-bottom-0">Image</th>
                                <th class="border-bottom-0">Name</th>
                                <th class="border-bottom-0">Email</th>
                                <th class="border-bottom-0">Status</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($deliveryBoys as $deliveryBoy)
                                <tr class="text-center">
                                    <td><img width="60" height="40" src="{{asset($deliveryBoy->image)}}" alt=""></td>
                                    <td>{{$deliveryBoy->name}}</td>
                                    <td>{{$deliveryBoy->email}}</td>
                                    <td>{{$deliveryBoy->status == 1 ? 'active':'Banned'}}</td>

                                    <td class="text-center d-flex">
                                        <a href="{{route('delivery-boy.show',$deliveryBoy->id)}}" class="btn btn-primary mb-1 mx-1"><i class="fa fa-regular fa-eye"></i></a>
                                        <form action="{{ route('deliveryBoy.ban', $deliveryBoy->user_id) }}" method="post">
                                            @csrf
                                            <input type="hidden" value="{{$deliveryBoy->status == 1 ? '0':'1'}}" name="status" readonly>
                                            <abbr title="{{$deliveryBoy->status == 1 ? 'Ban This user':'Active this User'}}">
                                                <button type="submit" onclick="return confirm('{{$deliveryBoy->status == 1 ? 'are you sure to ban This user ?':'are you sure to active This user ?'}}')" class="btn {{$deliveryBoy->status == 1 ? 'btn-danger':'btn-success'}} ">
                                                    <i class="fa {{$deliveryBoy->status == 1 ? 'fa-solid fa-ban':'fa-solid fa-user'}} "></i>
                                                </button>
                                            </abbr>
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

