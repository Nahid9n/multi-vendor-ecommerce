@extends('admin.master')
@section('title','Delivery Boy Details')
@section('body')
    @include('modal.common')
    <style>
        .checked {
            color: orange;
        }
    </style>


    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Delivery Boy Profile</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Delivery Boy</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- ROW-1 OPEN -->
    <div class="row" id="user-profile">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-lg-12 col-md-12 col-xl-6">
                            <div class="d-flex flex-wrap align-items-center">
                                <div class="profile-img-main rounded">
                                    <img src="{{asset($deliveryBoy->image)}}" alt="img" class="m-0 p-1 rounded hrem-6">
                                </div>
                                <div class="ms-4">
                                    <h4>{{$deliveryBoy->name}}</h4>
                                    <p class="text-muted mb-2">Member Since: {{$deliveryBoy->created_at}}</p>
                                    <a href="{{$deliveryBoy->facebook}}" class="btn btn-primary btn-sm"><i class="fa fa-facebook"></i> facebook</a>
                                    <a target="_blank" href="mailto:{{$deliveryBoy->email}}"  class="btn btn-secondary btn-sm"><i class="fa fa-envelope"></i> E-mail</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-xl-6">
                            <div class="d-md-flex flex-wrap justify-content-end">
                                <div class="col-5 text-end me-1">
                                    <a href="{{route('delivery-boy.index')}}" class="btn text-white px-5 btn-success">All Delivery Boy</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-top">
                    <div class="wideget-user-tab">
                        <div class="tab-menu-heading">
                            <div class="tabs-menu1">
                                <ul class="nav">
                                    <li><a href="#profileMain" class="active show" data-bs-toggle="tab">Profile</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane active show" id="profileMain">
                    <h3 class="card-title">Statistics</h3>
                    <div class="row d-flex">
                        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
                            <div class="card overflow-hidden">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h3 class="mb-2 fw-semibold">{{$deliveryBoyDetail->complete_order}}</h3>
                                            <p class="text-muted fs-13 mb-0">Complete Order</p>
                                        </div>
                                        <div class="col col-auto top-icn dash">
                                            <div class="counter-icon bg-success dash ms-auto">
                                                <i class="fa-solid icn-box fa fa-check-circle-o  text-white fa-circle-check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
                            <div class="card overflow-hidden">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h3 class="mb-2 fw-semibold">{{$deliveryBoyDetail->pending_order}}</h3>
                                            <p class="text-muted fs-13 mb-0">Pending Work</p>
                                        </div>
                                        <div class="col col-auto top-icn dash">
                                            <div class="counter-icon bg-success dash ms-auto">
                                                <i class="fa-solid  text-white icn-box fa fa-clock-o"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
                            <div class="card overflow-hidden">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h3 class="mb-2 fw-semibold">{{$deliveryBoyDetail->cancel_order}}</h3>
                                            <p class="text-muted fs-13 mb-0">Cancel Work</p>
                                        </div>
                                        <div class="col col-auto top-icn dash">
                                            <div class="counter-icon bg-success dash ms-auto">
                                                <i class="fa-solid text-white icn-box fa fa-solid fa-rectangle-xmark"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
                            <div class="card overflow-hidden">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h3 class="mb-2 fw-semibold">{{$deliveryBoyDetail->request_cancel_order}}</h3>
                                            <p class="text-muted fs-13 mb-0">Request To Cancel Work</p>
                                        </div>
                                        <div class="col col-auto top-icn dash">
                                            <div class="counter-icon bg-success dash ms-auto">
                                                <i class="fa-solid text-white icn-box fa fa-solid fa-rectangle-xmark"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
                            <div class="card overflow-hidden">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h3 class="mb-2 fw-semibold">{{$deliveryBoyDetail->balance}} .{{$currency->symbol ?? ''}}</h3>
                                            <p class="text-muted fs-13 mb-0">Balance</p>
                                        </div>
                                        <div class="col col-auto top-icn dash">
                                            <div class="counter-icon bg-success dash ms-auto">
                                                <i class="fa-solid text-white icn-box fa fa-money"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
                            <div class="card overflow-hidden">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h3 class="mb-2 fw-semibold">{{$deliveryBoyDetail->total_collection}} .{{$currency->symbol ?? ''}}</h3>
                                            <p class="text-muted fs-13 mb-0">Total Collection</p>
                                        </div>
                                        <div class="col col-auto top-icn dash">
                                            <div class="counter-icon bg-success dash ms-auto">
                                                <i class="fa-solid text-white icn-box fa fa-money"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
                            <div class="card overflow-hidden">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h3 class="mb-2 fw-semibold">{{$deliveryBoyDetail->earning}} .{{$currency->symbol ?? ''}}</h3>
                                            <p class="text-muted fs-13 mb-0">Earning</p>
                                        </div>
                                        <div class="col col-auto top-icn dash">
                                            <div class="counter-icon bg-success dash ms-auto">
                                                <i class="fa-solid text-white icn-box fa fa-money"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
                            <div class="card overflow-hidden">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h3 class="mb-2 fw-semibold">{{$deliveryBoyDetail->total_withdraw}} .{{$currency->symbol ?? ''}}</h3>
                                            <p class="text-muted fs-13 mb-0">Total Withdraw</p>
                                        </div>
                                        <div class="col col-auto top-icn dash">
                                            <div class="counter-icon bg-success dash ms-auto">
                                                <i class="fa-solid text-white fa-money-bill-transfer"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
                            <div class="card overflow-hidden">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h4 class="mb-2 text-dark fw-bold">
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star"></span>
                                            </h4>
                                            <p class="text-dark fs-13 mb-0">Ratings</p>
                                        </div>
                                        <div class="col col-auto top-icn dash">
                                            <div class="counter-icon bg-success dash ms-auto">
                                                <i class="text-white fa fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="p-5">
                                <h3 class="card-title">Biodata</h3>
                                <p class="text-dark-light">{{$deliveryBoy->biography}}</p>
                            </div>
                            <div class="border-top"></div>
                            <div class="table-responsive p-5">
                                <h3 class="card-title">Personal Info</h3>
                                <table class="table row table-borderless">
                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                    <tr>
                                        <td><strong>Full Name :</strong> {{$deliveryBoy->name}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Location :</strong> {{$deliveryBoy->permanentAddress}}</td>
                                    </tr>

                                    </tbody>
                                    <tbody class="col-lg-12 col-xl-6 p-0 border-top-0">
                                    <tr>
                                        <td><strong>Website :</strong> {{$deliveryBoy->website}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Email :</strong> {{$deliveryBoy->email}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Phone :</strong> {{$deliveryBoy->mobile}} </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="border-top"></div>
                            <div class="border-top"></div>
                            <div class="p-5">
                                <h3 class="card-title">Contact</h3>
                                <div class="d-sm-flex">
                                    <div>
                                        <div class="main-profile-contact-list">
                                            <div class="media mx-2">
                                                <div class="media-icon bg-primary-transparent text-primary"> <i class="fe fe-phone fs-21"></i> </div>
                                                <div class="media-body ms-1">
                                                    <span class="text-muted">Mobile</span>
                                                    <p class="mb-0"> {{$deliveryBoy->mobile}} </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="main-profile-contact-list">
                                            <div class="media mx-2">
                                                <div class="media-icon bg-success-transparent text-success"> <i class="fe fe-slack fs-21"></i> </div>
                                                <div class="media-body ms-2">
                                                    <span class="text-muted">Blood Gorup</span>
                                                    <p class="mb-0"> {{$deliveryBoy->blood}} </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="main-profile-contact-list">
                                            <div class="media mx-2">
                                                <div class="media-icon bg-info-transparent text-info"> <i class="fe fe-map-pin fs-21"></i> </div>
                                                <div class="media-body ms-2">
                                                    <span class="text-muted">Current Address</span>
                                                    <p class="mb-0"> {{$deliveryBoy->present_address}} </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border-top"></div>
                            <div class="p-5">
                                <h3 class="card-title">Social</h3>
                                <div class="d-md-flex">
                                    <div>
                                        <div class="main-profile-contact-list">
                                            <div class="media mx-2">
                                                <div class="media-icon bg-primary-transparent text-primary"> <i class="fa fa-facebook fs-21"></i> </div>
                                                <div class="media-body ms-1">
                                                    <span class="text-muted">Facebook</span>
                                                    <p class="mb-0"> <a href="javascript:void(0)" class="text-default">{{$deliveryBoy->facebook}}</a> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="main-profile-contact-list">
                                            <div class="media mx-2">
                                                <div class="media-icon bg-success-transparent text-success"> <i class="fe fe-twitter fs-21"></i> </div>
                                                <div class="media-body ms-2">
                                                    <span class="text-muted">Twitter</span>
                                                    <p class="mb-0"> <a href="javascript:void(0)" class="text-default">{{$deliveryBoy->twitter}}</a> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="main-profile-contact-list">
                                            <div class="media mx-2">
                                                <div class="media-icon bg-info-transparent text-info"> <i class="fe fe-linkedin fs-21"></i> </div>
                                                <div class="media-body ms-2">
                                                    <span class="text-muted">Linkedin</span>
                                                    <p class="mb-0"> <a href="javascript:void(0)" class="text-default">{{$deliveryBoy->linkedIn}}</a> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="main-profile-contact-list">
                                            <div class="media mx-2">
                                                <div class="media-icon bg-info-transparent text-info"> <i class="fa fa-globe fs-21"></i> </div>
                                                <div class="media-body ms-2">
                                                    <span class="text-muted">Website</span>
                                                    <p class="mb-0"> <a href="javascript:void(0)" class="text-default">{{$deliveryBoy->website}}</a> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div><!-- COL-END -->
    </div>
    <!-- ROW-1 CLOSED -->
@endsection


