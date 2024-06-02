@extends('deliveryBoy.layout.app')
@section('title','Dashboard Delivery Boy')
@section('body')
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('delivery-boy.dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->
<section class="section dashboard">
    <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-12">
            <div class="row">
                <div class="col-xxl-4 col-md-6 col-lg-3 my-1">
                    <div class="card bg-warning bg-opacity-75 info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Wallet Balance</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="icn-box fa fa-wallet text-dark fw-bold fs-13 me-1"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{$deliveryBoyDetail->balance ?? '0'}} .{{$currency->symbol ?? ''}}</h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xxl-4 col-md-6 col-lg-3 my-1">
                    <div class="card bg-primary bg-opacity-75 info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Total Income</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="icn-box fa fa-money text-dark fw-bold fs-13 me-1"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{$deliveryBoyDetail->earning ?? '0'}} .{{$currency->symbol ?? ''}}</h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xxl-4 col-md-6 col-lg-3 my-1">
                    <div class="card bg-success bg-opacity-75 info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Total Withdraw</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="icn-box fa fa-money text-dark fw-bold fs-13 me-1"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{$deliveryBoyDetail->total_withdraw ?? '0'}} .{{$currency->symbol ?? ''}}</h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xxl-4 col-md-6 col-lg-3 my-1">
                    <div class="card bg-info bg-opacity-75 info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title text-dark">Total Collection</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="icn-box fa fa-money text-dark fw-bold fs-13 me-1"></i>
                                </div>
                                <div class="ps-3">
                                    <h6 class="text-dark">{{$deliveryBoyDetail->total_collection ?? '0'}} .{{$currency->symbol ?? ''}}</h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xxl-4 col-md-6 col-lg-3 my-1">
                    <div class="card bg-success bg-opacity-75 info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title text-dark">Pending Delivery</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="icn-box fa fa-clock-o text-dark fw-bold fs-13 me-1"></i>
                                </div>
                                <div class="ps-3">
                                    <h6 class="text-dark">{{$deliveryBoyDetail->pending_order ?? '0'}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-md-6 col-lg-3 my-1">
                    <div class="card bg-info bg-opacity-75 info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title text-dark">Completed Delivery</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="icn-box fa fa-check-circle-o text-dark fw-bold fs-13 me-1"></i>
                                </div>
                                <div class="ps-3">
                                    <h6 class="text-dark">{{$deliveryBoyDetail->complete_order ?? '0'}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-md-6 col-lg-3 my-1">
                    <div class="card bg-danger bg-opacity-75 info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title text-white">Canceled Delivery</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="icn-box fa fa-solid fa-rectangle-xmark text-dark fw-bold fs-13 me-1"></i>
                                </div>
                                <div class="ps-3">
                                    <h6 class="text-white">{{$deliveryBoyDetail->cancel_order ?? '0'}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-md-6 col-lg-3 my-1">
                    <div class="card bg-secondary bg-opacity-75 info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title text-white">Ratings</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="icn-box fa fa-solid fa-star text-dark fw-bold fs-13 me-1"></i>
                                </div>
                                <div class="ps-3">
                                    <h4 class="mb-2 text-white fw-bold">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


{{--                <!-- Reports -->--}}
{{--                <div class="col-12">--}}
{{--                    <div class="card">--}}

{{--                        <div class="filter">--}}
{{--                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>--}}
{{--                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">--}}
{{--                                <li class="dropdown-header text-start">--}}
{{--                                    <h6>Filter</h6>--}}
{{--                                </li>--}}

{{--                                <li><a class="dropdown-item" href="#">Today</a></li>--}}
{{--                                <li><a class="dropdown-item" href="#">This Month</a></li>--}}
{{--                                <li><a class="dropdown-item" href="#">This Year</a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}

{{--                        <div class="card-body">--}}
{{--                            <h5 class="card-title">Reports <span>/Today</span></h5>--}}

{{--                            <!-- Line Chart -->--}}
{{--                            <div id="reportsChart"></div>--}}

{{--                            <script>--}}
{{--                                document.addEventListener("DOMContentLoaded", () => {--}}
{{--                                    new ApexCharts(document.querySelector("#reportsChart"), {--}}
{{--                                        series: [{--}}
{{--                                            name: 'Sales',--}}
{{--                                            data: [31, 40, 28, 51, 42, 82, 56],--}}
{{--                                        }, {--}}
{{--                                            name: 'Revenue',--}}
{{--                                            data: [11, 32, 45, 32, 34, 52, 41]--}}
{{--                                        }, {--}}
{{--                                            name: 'Customers',--}}
{{--                                            data: [15, 11, 32, 18, 9, 24, 11]--}}
{{--                                        }],--}}
{{--                                        chart: {--}}
{{--                                            height: 350,--}}
{{--                                            type: 'area',--}}
{{--                                            toolbar: {--}}
{{--                                                show: false--}}
{{--                                            },--}}
{{--                                        },--}}
{{--                                        markers: {--}}
{{--                                            size: 4--}}
{{--                                        },--}}
{{--                                        colors: ['#4154f1', '#2eca6a', '#ff771d'],--}}
{{--                                        fill: {--}}
{{--                                            type: "gradient",--}}
{{--                                            gradient: {--}}
{{--                                                shadeIntensity: 1,--}}
{{--                                                opacityFrom: 0.3,--}}
{{--                                                opacityTo: 0.4,--}}
{{--                                                stops: [0, 90, 100]--}}
{{--                                            }--}}
{{--                                        },--}}
{{--                                        dataLabels: {--}}
{{--                                            enabled: false--}}
{{--                                        },--}}
{{--                                        stroke: {--}}
{{--                                            curve: 'smooth',--}}
{{--                                            width: 2--}}
{{--                                        },--}}
{{--                                        xaxis: {--}}
{{--                                            type: 'datetime',--}}
{{--                                            categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]--}}
{{--                                        },--}}
{{--                                        tooltip: {--}}
{{--                                            x: {--}}
{{--                                                format: 'dd/MM/yy HH:mm'--}}
{{--                                            },--}}
{{--                                        }--}}
{{--                                    }).render();--}}
{{--                                });--}}
{{--                            </script>--}}
{{--                            <!-- End Line Chart -->--}}

{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div><!-- End Reports -->--}}
            </div>
        </div><!-- End Left side columns -->

{{--        <!-- Right side columns -->--}}
{{--        <div class="col-lg-4">--}}
{{--            <!-- Recent Activity -->--}}
{{--            <div class="card">--}}
{{--                <div class="filter">--}}
{{--                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>--}}
{{--                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">--}}
{{--                        <li class="dropdown-header text-start">--}}
{{--                            <h6>Filter</h6>--}}
{{--                        </li>--}}

{{--                        <li><a class="dropdown-item" href="#">Today</a></li>--}}
{{--                        <li><a class="dropdown-item" href="#">This Month</a></li>--}}
{{--                        <li><a class="dropdown-item" href="#">This Year</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}

{{--                <div class="card-body">--}}
{{--                    <h5 class="card-title">Recent Activity <span>| Today</span></h5>--}}

{{--                    <div class="activity">--}}

{{--                        <div class="activity-item d-flex">--}}
{{--                            <div class="activite-label">32 min</div>--}}
{{--                            <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>--}}
{{--                            <div class="activity-content">--}}
{{--                                Quia quae rerum <a href="#" class="fw-bold text-dark">explicabo officiis</a> beatae--}}
{{--                            </div>--}}
{{--                        </div><!-- End activity item-->--}}

{{--                        <div class="activity-item d-flex">--}}
{{--                            <div class="activite-label">56 min</div>--}}
{{--                            <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>--}}
{{--                            <div class="activity-content">--}}
{{--                                Voluptatem blanditiis blanditiis eveniet--}}
{{--                            </div>--}}
{{--                        </div><!-- End activity item-->--}}

{{--                        <div class="activity-item d-flex">--}}
{{--                            <div class="activite-label">2 hrs</div>--}}
{{--                            <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>--}}
{{--                            <div class="activity-content">--}}
{{--                                Voluptates corrupti molestias voluptatem--}}
{{--                            </div>--}}
{{--                        </div><!-- End activity item-->--}}

{{--                        <div class="activity-item d-flex">--}}
{{--                            <div class="activite-label">1 day</div>--}}
{{--                            <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>--}}
{{--                            <div class="activity-content">--}}
{{--                                Tempore autem saepe <a href="#" class="fw-bold text-dark">occaecati voluptatem</a> tempore--}}
{{--                            </div>--}}
{{--                        </div><!-- End activity item-->--}}

{{--                        <div class="activity-item d-flex">--}}
{{--                            <div class="activite-label">2 days</div>--}}
{{--                            <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>--}}
{{--                            <div class="activity-content">--}}
{{--                                Est sit eum reiciendis exercitationem--}}
{{--                            </div>--}}
{{--                        </div><!-- End activity item-->--}}

{{--                        <div class="activity-item d-flex">--}}
{{--                            <div class="activite-label">4 weeks</div>--}}
{{--                            <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>--}}
{{--                            <div class="activity-content">--}}
{{--                                Dicta dolorem harum nulla eius. Ut quidem quidem sit quas--}}
{{--                            </div>--}}
{{--                        </div><!-- End activity item-->--}}

{{--                    </div>--}}

{{--                </div>--}}
{{--            </div><!-- End Recent Activity -->--}}
{{--        </div><!-- End Right side columns -->--}}

    </div>
</section>
@endsection
