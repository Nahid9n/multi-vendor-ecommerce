@extends('website.layout.app')
@section('title','Customer Login')

@section('body')

    <!--login section start-->
    <section class="login-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-7 col-md-7 col-sm-12 col-xs-12">
                    <div class="vec-area">
                        <div class="veclogo my-3">
                            <img src="{{ (isset($websiteInfos->logo))? asset($websiteInfos->logo) : asset('dummy-logo.jpg')}}" alt="logo">
                        </div>
                        <div class="vec-content">
                            <h6>“The biggest and trusted <br>
                                e-commerce in Bangladesh”</h6>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('customer.login')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <h4 class="fw-bold text-center">Login</h4>
                                <div class="log-input">

                                <div class="form-group">
                                    <label for="email">Email address <span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" value="{{old('email')}}" required>
                                    <b><span class="text-danger">{{$errors->first('email')}}</span></b>
                                </div>

                                <div class="form-group">
                                    <label for="name">Password <span class="text-danger">*</span></label>
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" required>
                                    <b><span class="text-danger">{{$errors->first('password')}}</span></b>
                                </div>
                                    <div class="sub">
                                        <!-- <input type="submit" value="Log In"> -->
                                        <button class="loginBtn" type="submit">Login</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        {{--<div class="">
                            <div class="forgot"><a href="#">Forgot Password</a></div>
                        </div>--}}
                        <div class="">
                            {{--<div class="or">
                                <p>or sign up</p>
                            </div>--}}
                            {{--<div class="go-fac">
                                <a href="#">
                                    <i class="fa fa-google mr-5"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-facebook ml-5"></i>
                                </a>
                            </div>--}}
                            <div class="an">
                                <p>don't have an account? <span><a href="{{route('customer.register.page')}}">sign up</a></span></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--login section end-->

@endsection
