<!doctype html>
<html lang="en" dir="ltr">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Noa - Laravel Bootstrap 5 seller & Dashboard Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
        content="laravel seller template, bootstrap seller template, seller dashboard template, seller dashboard, seller template, seller, bootstrap 5, laravel seller, laravel seller dashboard template, laravel ui template, laravel seller panel, seller panel, laravel seller dashboard, laravel template, seller ui dashboard">

    <title>Registration</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/brand/favicon.ico" />
    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('seller') }}/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <!-- STYLE CSS -->
    <link href="{{ asset('seller') }}/assets/css/style.css" rel="stylesheet" />
    <link href="{{ asset('seller') }}/assets/css/skin-modes.css" rel="stylesheet" />
    <!--- FONT-ICONS CSS -->
    <link href="{{ asset('seller') }}/assets/plugins/icons/icons.css" rel="stylesheet" />
    <!-- INTERNAL Switcher css -->
    <link href="{{ asset('seller') }}/assets/switcher/css/switcher.css" rel="stylesheet">
    <link href="{{ asset('seller') }}/assets/switcher/demo.css" rel="stylesheet">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
</head>
<body class="">
    <div class="page">
        <div>
            <div class="col col-login mx-auto text-center">
                <a href="" class="text-center">
                    {{-- <img src="assets/images/brand/logo.png" class="header-brand-img" alt=""> --}}
                </a>
            </div>
            <div class="container-login100">
                <div class="wrap-login100 p-0">
                    <div class="card-body">
                        <form class="login100-form validate-form" action="{{ route('seller.registration') }}" method="post">
                            @csrf
                            <span class="login100-form-title text-bold">
                                Register your shop
                            </span>
                            <span class="text-bold">Personal Info</span>
                            <div class="wrap-input100 validate-input mt-2" >
                                <input class="input100" type="text" name="name" placeholder="Full Name" value="{{ old('name') }}" required>
                                <b><span class="text-danger">{{$errors->first('name')}}</span></b>
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="black" d="M12 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4m0 10c4.42 0 8 1.79 8 4v2H4v-2c0-2.21 3.58-4 8-4"/></svg>
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input">
                                <input class="input100" type="text" name="email" placeholder="Email" value="{{ old('email') }}" required>
                                <b><span class="text-danger">{{$errors->first('email')}}</span></b>
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="black" d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2m0 4l-8 5l-8-5V6l8 5l8-5z"/></svg>
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input">
                                <input class="input100" type="password" name="password" placeholder="Password" value="{{ old('password') }}" required>
                                <b><span class="text-danger">{{$errors->first('password')}}</span></b>
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="black" d="M12 17a2 2 0 0 0 2-2a2 2 0 0 0-2-2a2 2 0 0 0-2 2a2 2 0 0 0 2 2m6-9a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V10a2 2 0 0 1 2-2h1V6a5 5 0 0 1 5-5a5 5 0 0 1 5 5v2zm-6-5a3 3 0 0 0-3 3v2h6V6a3 3 0 0 0-3-3"/></svg>
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input">
                                <input class="input100" type="password" name="confirm_password" placeholder="Confirm Password" value="{{ old('confirm_password') }}" required>
                                <b><span class="text-danger">{{$errors->first('confirm_password')}}</span></b>
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="black" d="M12 17a2 2 0 0 0 2-2a2 2 0 0 0-2-2a2 2 0 0 0-2 2a2 2 0 0 0 2 2m6-9a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V10a2 2 0 0 1 2-2h1V6a5 5 0 0 1 5-5a5 5 0 0 1 5 5v2zm-6-5a3 3 0 0 0-3 3v2h6V6a3 3 0 0 0-3-3"/></svg>
                                </span>
                            </div>
                            <span class="text-bold">Basic Info</span>
                            <div class="wrap-input100 validate-input mt-2">
                                <input class="input100" type="text" name="shop_name" placeholder="Shop Name" value="{{old('shop_name')}}" required>
                                <b><span class="text-danger">{{$errors->first('shop_name')}}</span></b>
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 48 48"><g fill="none"><path fill="black" d="M39 32H13L8 12h36z"/><path stroke="black" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M3 6h3.5L8 12m0 0l5 20h26l5-20z"/><circle cx="13" cy="39" r="3" stroke="black" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"/><circle cx="39" cy="39" r="3" stroke="black" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"/></g></svg>
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input" >
                                <textarea name="address" class="input100" placeholder="Address..." id="" required>{{ old('address') }}</textarea>
                                <b><span class="text-danger">{{$errors->first('address')}}</span></b>
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.13em" height="1em" viewBox="0 0 576 512"><path fill="black" d="M528 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h480c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48m-352 96c35.3 0 64 28.7 64 64s-28.7 64-64 64s-64-28.7-64-64s28.7-64 64-64m112 236.8c0 10.6-10 19.2-22.4 19.2H86.4C74 384 64 375.4 64 364.8v-19.2c0-31.8 30.1-57.6 67.2-57.6h5c12.3 5.1 25.7 8 39.8 8s27.6-2.9 39.8-8h5c37.1 0 67.2 25.8 67.2 57.6zM512 312c0 4.4-3.6 8-8 8H360c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8zm0-64c0 4.4-3.6 8-8 8H360c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8zm0-64c0 4.4-3.6 8-8 8H360c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8z"/></svg>
                                </span>
                            </div>
                            <label class="custom-control custom-checkbox mt-4">
                                <input type="checkbox" class="custom-control-input" value="1" name="terms_policy"  {{ old('terms_policy') ? 'checked' : '' }} required>
                                <b><span class="text-danger">{{$errors->first('terms_policy')}}</span></b>
                                <span class="custom-control-label">Agree the <a href="#">terms and policy</a></span>
                            </label>
                            <div class="container-login100-form-btn">

                                   <button type="submit" class="login100-form-btn btn-primary">  Register your shop</button>

                            </div>
                            <div class="text-center pt-3">
                                <p class="text-dark mb-0">Already have account?<a href="{{ route('seller.loginForm') }}" class="text-primary ms-1">Sign In</a></p>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-center my-3">
                            <a href="javascript:void(0)" class="social-login  text-center me-4">
                                <i class="fa fa-google"></i>
                            </a>
                            <a href="javascript:void(0)" class="social-login  text-center me-4">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a href="javascript:void(0)" class="social-login  text-center">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- End PAGE -->

    <!-- JQUERY JS -->
    <script src="{{ asset('seller') }}/assets/plugins/jquery/jquery.min.js"></script>
    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('seller') }}/assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="{{ asset('seller') }}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- Perfect SCROLLBAR JS-->
    <script src="{{ asset('seller') }}/assets/plugins/p-scroll/perfect-scrollbar.js"></script>
    <!-- STICKY JS -->
    <script src="{{ asset('seller') }}/assets/js/sticky.js"></script>
    <!-- COLOR THEME JS -->
    <script src="{{ asset('seller') }}/assets/js/themeColors.js"></script>
    <!-- CUSTOM JS -->
    <script src="{{ asset('seller') }}/assets/js/custom.js"></script>
    <!-- SWITCHER JS -->
    <script src="{{ asset('seller') }}/assets/switcher/js/switcher.js"></script>
    {{-- Toastr --}}
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
</body>
</html>
