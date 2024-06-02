<!doctype html>
<html lang="en">

<head>

    <title>Ecommerce @yield('title')</title>

    @include('website.layout.style')

    <style>
        .modal-pop-product h2 {
            font-size: 20px;
            padding-top: 10px;
        }

        .modal-pop-product {
            display: none;
            position: fixed;
            z-index: 9999;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-pop-producth2 {
            font-size: 22px;
            padding: 10px 0;
        }

        .modal-pop-product .modal-body {
            margin-top: initial;
        }

        .modal-pop-product .modal-content {
            position: relative;
            background-color: #fefefe;
            margin: auto;
            padding: 0;
            border: 1px solid #888;
            width: 80%;
            max-width: 670px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            -webkit-animation-name: animatetop;
            -webkit-animation-duration: 0.4s;
            animation-name: animatetop;
            animation-duration: 0.4s
        }

        @-webkit-keyframes animatetop {
            from {
                top: -300px;
                opacity: 0
            }

            to {
                top: 0;
                opacity: 1
            }
        }

        @keyframes animatetop {
            from {
                top: -300px;
                opacity: 0
            }

            to {
                top: 0;
                opacity: 1
            }
        }

        .modal-pop-product .modal-body a {
            color: #fff;
        }

        .modal-pop-product .modal-body button {
            width: initial;
        }

        .modal-pop-product .modal_close {
            color: black;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            right: 5px;
            position: relative;
        }

        .modal-pop-product .modal_close:hover,
        .modal-pop-product .modal_close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        .modal-pop-product .modal-header {
            padding: 2px 16px;
            color: white;
            display: flex;
            align-items: center;
        }

        .modal-pop-product.modal-body {
            padding: 2px 16px;
        }

        .modal-pop-product .modal-footer {
            padding: 2px 16px;
            color: white;
        }

        .modal-pop-product .modal-body input {
            width: 62px;
            border-right: none;
            border-left: none;
            border-radius: inherit;
            border-color: #0000004D;
        }

        .modal-pop-product .color_part,
        .modal-pop-product .size_part {
            align-items: center;
        }

        .modal-pop-product .price_div {
            text-align: left;
            padding-top: 14px;
        }

        .modal-pop-product .price_div p {
            font-size: 20px;
            line-height: 25px;
        }
    </style>
</head>

<body>

    {{--@if(\Request::route()->getName() == 'customer.login')--}}

    <!--header-area start-->
    @include('website.layout.header')
    <!--header-area end-->
    @include('website.layout.menu')
    {{--@endif--}}

    <style>
        li.breadcrumb-item{
            float: left;
        }
    </style>

    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('customer.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?php
                        
                            if(Route::currentRouteName() == 'customer.dashboard'){
                                echo "Dashaboard";
                            }elseif(Route::currentRouteName() == 'customer.orders'){
                                echo "Orders";
                            }elseif(Route::currentRouteName() == 'customer.cancel'){
                                echo "Cancel Orders";
                            }elseif(Route::currentRouteName() == 'customer.address'){
                                echo "My Address";
                            }elseif(Route::currentRouteName() == 'customer.account.details'){
                                echo "Account Details";
                            }elseif(Route::currentRouteName() == 'customer.change.password'){
                                echo "Change Password";
                            }elseif(Route::currentRouteName() == 'customer.support.ticket'){
                                echo "Support Ticket";
                            }elseif(Route::currentRouteName() == 'customer.conversations'){
                                echo "Conversations";
                            }

                            elseif(Route::currentRouteName() == 'customer.wallet'){
                                echo "My wallet";
                            }
                            else{
                                echo "";
                            }

                        ?>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <section class="pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="dashboard-menu">
                                @include('customer.sidebar')                              
                            </div>
                        </div>
                        
                        @yield('content')
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--footer-area start-->
    @include('website.layout.footer')
    <!--footer-area end-->

    @include('website.layout.script')
    <!-- Modal -->
    <div class="modal fade" id="returnsProducts" tabindex="-1" aria-labelledby="returnsProductsLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="returnsProductslLabel">Returns Reason</h5>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
                <div class="modal-body">

                    <form id="returnsProducts" method="post" action="">
                        <div class="form-group text-left">
                            <label for="exampleInputEmail1">Reason</label>
                            <textarea id="reason"></textarea>
                        </div>
                        <p id="error_msg" class="text-danger"></p>

                        <input type="hidden" name="seller_name" value="">
                        <input type="hidden" name="order_code" value="">
                        <input type="hidden" name="product" value="">
                        <input type="hidden" name="price" value="">

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>


                </div>

            </div>
        </div>
    </div>

    <div id="productPopzUpModal" class="modal-pop-product">

        <div class="modal-content" id="productPopUpModalBody"></div>

    </div>

    <script>

        function customerOrderFilter(data){      
            var status = data.value;
            var newUrl = "/customer-order/?status="+status;
            window.location.href = newUrl;
        }

        function userProfile(){
            $('.top-right-bar-dropDown').slideToggle();
        }

        function admin(){
            $('#admin_li .top-right-bar-dropDown-admin').slideToggle();
        }

        function sellerProfile(){
            $('#admin_li .top-right-bar-dropDown-seller').slideToggle();
        }
            
        
    </script>

</body>

</html>