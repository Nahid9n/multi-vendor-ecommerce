<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>DeliveryBoy - @yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    @include('deliveryBoy.layout.style')

</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="{{route('delivery-boy.dashboard')}}" class="logo d-flex align-items-center">
            <img class="img-fluid" src="{{asset($websiteInfos->logo)}}" alt="">
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->
    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="{{asset($deliveryBoy->deliveryBoy->image ?? '')}}" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2">{{auth()->user()->name}}</span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>{{auth()->user()->name}}</h6>
                        <span>{{str_replace('_',' ',ucfirst($deliveryBoy->role))}}</span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{route('delivery-boy.account.manage')}}">
                            <i class="bi text-dark bi-person"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{route('deliveryBoy.payment.info.page')}}">
                            <i class="fa-solid fa-credit-card"></i>
                            <span>Payment Account Settings</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{route('delivery-boy.wallet')}}">
                            <i class="fa-solid fa-wallet"></i>
                            <span>Wallet</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form class="dropdown-item mx-0 d-flex" action="{{route('delivery-boy.logout')}}" method="post">
                            @csrf
                            <button type="submit" class="mx-0 btn form-control btn-sm btn-danger" onclick="return confirm('are you sure to logout ? ')"> <i class="bi bi-box-arrow-right"></i> <span>Sign Out</span></button>
                        </form>
                    </li>

                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
@include('deliveryBoy.layout.sidebar')
<!-- End Sidebar-->

<main id="main" class="main">

    @yield('body')

</main><!-- End #main -->

<!-- ======= Footer ======= -->
@include('deliveryBoy.layout.footer')
<!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

@include('deliveryBoy.layout.script')
</body>

</html>
