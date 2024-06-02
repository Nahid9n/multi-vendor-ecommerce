@extends('website.layout.app')
@section('title','Delivery Boy Login')

@section('body')

    <!--login section start-->
    <section class="login-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="vec-area">
                        <div class="veclogo">
                            <img src="{{asset('/')}}" alt="logo">
                        </div>
                        <div class="vec-content">
                            <h6>“The biggest and trusted <br>
                                e-commerce in Bangladesh”</h6>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="card rounded-5">
                        <div class="card-body">
                            <form action="{{route('delivery-boy.register.store')}}" method="post">
                                @csrf

                                <h4 class="fw-bold text-center">Delivery Boy Register</h4>
                                <div class="log-input">

                                <div class="form-group">
                                    <label for="name">Name<span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter name">
                                </div>

                                <div class="form-group">
                                    <label for="email">Email address<span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" autocomplete="off">
                                </div>

                                <div class="form-group">
                                    <label for="name">Password<span class="text-danger">*</span></label>
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" autocomplete="new-password">
                                </div>

                                <div class="form-group">
                                    <label for="name">Confirm Password<span class="text-danger">*</span></label>
                                    <input type="password" name="confirm_password" class="form-control" id="password" placeholder="Confirm Password">
                                </div>
                                    <div class="sub">
                                        <button class="btn btn-success" type="submit">Register</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="">
                            <div class="forgot"><a href="#">Forgot Password</a></div>
                            <div class="with"><a href="#">log in with phone number</a></div>
                        </div>
                        <div class="optional">
                            <div class="or">
                                <p>or sign up</p>
                            </div>
                            <div class="go-fac">
                                <a href="#"><i class="fa fa-google mr-5"></i></a>
                                <a href="#"><i class="fa fa-facebook ml-5"></i></a>
                            </div>
                            <div class="an">
                                <p>Already have an account ? <span><a href="{{route('delivery-boy.login')}}">sign in</a></span></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--login section end-->

@endsection
