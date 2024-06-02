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
                            <img src="{{ (isset($websiteInfos->logo))? asset($websiteInfos->logo) : asset('dummy-logo.jpg')}}" alt="logo">
                        </div>
                        <div class="vec-content">
                            <h6>“The biggest and trusted <br>
                                e-commerce in Bangladesh”</h6>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('delivery-boy.login.done')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <h4 class="fw-bold text-center">log in</h4>
                                <div class="log-input">

                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
                                </div>

                                <div class="form-group">
                                    <label for="name">Password</label>
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
                                </div>
                                    <!-- <input type="text" placeholder="Email address" name="email"> -->
                                    <!-- <input type="password" placeholder="Password" name="password"> -->

                                    <div class="sub">
                                        <!-- <input type="submit" value="Log In"> -->
                                        <button class="btn btn-success" type="submit">Login</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="">
                            <div class="forgot"><a href="#">Forgot Password</a></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--login section end-->

@endsection
