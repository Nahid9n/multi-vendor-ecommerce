@extends('admin.master')
@section('title','Delivery Boy Collected History Page')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">All Cancel Request</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">All Cancel Request</li>
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
                            <h3 class="fw-bold text-center">Cancel Requests</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                            <tr class="text-center">
                                <th class="border-bottom-0">Code</th>
                                <th class="border-bottom-0">Request By</th>
                                <th class="border-bottom-0">Request At</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($deliveryBoys as $deliveryBoy)
                                <tr class="text-center">
                                    <td>{{$deliveryBoy->name}}</td>
                                    <td>{{$deliveryBoy->designation}}</td>
                                    <td>{{$deliveryBoy->status == 1 ? 'published':'unpublished'}}</td>
                                    <td class="text-center d-flex justify-content-center">
                                        <a href="{{route('delivery-boy.show',$deliveryBoy->id)}}" class="btn mx-1 btn-primary mb-1"><i class="fa fa-regular fa-eye"></i></a>
{{--                                        <a href="{{route('delivery-boy.edit',$deliveryBoy->id)}}" class="btn mx-1 btn-primary mb-1"><i class="fa fa-regular fa-edit"></i></a>--}}
{{--                                        <form action="{{ route('delivery-boy.destroy', $deliveryBoy->id) }}" method="post">--}}
{{--                                            @csrf--}}
{{--                                            @method('DELETE')--}}
{{--                                            <button type="submit" onclick="return confirm('are you sure to delete ?')" class="btn btn-danger"><i class="fa fa-regular fa-trash"></i></button>--}}
{{--                                        </form>--}}
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

