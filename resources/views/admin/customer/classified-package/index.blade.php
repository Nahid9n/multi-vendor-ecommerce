@extends('admin.master')
@section('title','Classified Package page')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Classified Package</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Classified Package</li>
            </ol>
        </div>

    </div>
    <!-- PAGE-HEADER END -->
    <div class="row my-2">
        <div class="text-end">
            <a href="{{route('classifiedPackage.create')}}" class="btn btn-success my-1 float-end mx-2 text-center">Create New Package</a>
        </div>
    </div>
    <!--row-->
    <div class="row d-flex justify-content-center">
        @forelse($packages as $package)
            <div class="col-lg-8 text-center col-xl-4 col-md-8 col-sm-12">
                <div class="card p-3 {{$package->status == 1 ? '':'bg-danger-transparent'}} pricing-card ">
                    <div class="card-header d-block text-justified pt-2">
                        <div class="text-center my-2 bg-secondary-gradient">
                            <img class="mx-auto" src="{{asset($package->package_logo)}}" width="100" height="100" alt="">
                            <p class="font-weight-semibold my-2 fs-2 text-white">{{$package->package_name}}</p>
                        </div>
                        <p class="text-justify font-weight-semibold mb-1"> <span class="text-30 me-2">{{$currency->symbol ?? ''}}</span><span class="text-30 me-1">{{$package->amount}}.00</span></p>
                    </div>
                    <div class="card-body pt-2">
                        <ul class="text-justify pricing-body ps-0">
                            <li class="mb-4">
                                <span class="text-warning me-2 p-1 bg-warning-transparent rounded-pill text-10-f"><i class="fa fa-check"></i></span>
                                <strong> Product Upload : {{$package->product_upload}}</strong> </li>
                            <li class="mb-6 text-muted ">
                                <span class="text-gray text-warning me-2 p-1 bg-warning-transparent rounded-pill text-10-f"><i class="fa fa-check"></i></span>
                                <strong class=""> {{$package->status == 1 ? 'Active':'Inactive'}}</strong></li>
                        </ul>
                        <div class="d-flex justify-content-center">
                            <a href="{{route('classifiedPackage.edit',$package->id)}}" class="btn btn-sm mx-1 px-5 rounded-2 btn-success">
                                <span class="ms-4 me-4">Edit</span>
                            </a>
                            <a href="#" class="rounded-2 {{$package->status == 1 ? 'btn-outline-warning btn-danger':'btn-danger'}}">
                                <form class="" action="{{route('classifiedPackage.destroy',$package->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('are you sure to delete ? ')" class="btn text-white  px-5">Delete</button>
                                </form>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-lg-4 text-center col-xl-4 col-md-8 col-sm-12 fw-bold">
                <table class="table table-responsive table-striped">
                    <tr class="form-control">
                        <td>No Package Found</td>
                    </tr>
                </table>
            </div>
        @endforelse

    </div>
    <!--/row-->


@endsection


