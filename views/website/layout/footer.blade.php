<footer class="footer-area mt-50">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-xl-4 col-md-12 col-sm-12 col-12 footer_logo">
                <div class="f_logo">
                    <img src="{{asset('/')}}website/assets/img/logo.png" alt="logo">
                </div>
            </div>
            @if(isset(auth()->user()->id))

            @else
                <div class="col-xl-2 col-lg-4 col-md-4 col-sm-4 col-12">
                    <div class="fooer-widget fw">
                        <h4>Quick Links</h4>
                        <div class="footer-menu">
                            <ul>
                                <li><a href="#">Review </a></li>
                                <li><a href="#">Articles</a></li>
                                <li><a href="#">About us</a></li>
                                <li><a href="#">Contact us</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endif


            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="fooer-widget fw">
                    <h4>Stay In Touch</h4>
                    <div class="footer-menu">
                        <ul>
                            <li><i class="fa fa-volume-control-phone"></i><a href="#">01 00 00 00 100 100</a></li>
                            <li><i class="fa fa-envelope"></i><a href="#">info@seoexpate.com</a></li>
                            <li><i class="fa fa-map-marker"></i><a href="#">Majhira  shajahanpur, Bogura</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="fooer-widget fw">
                    <h4>Connect with</h4>
                    <div class="footer-menu">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i>Instagram</a></li>
                        </ul>
                    </div>
                </div>
                <form action="{{route('subscribe.store')}}" method="POST" style="max-width: 370px;">
                    @csrf
                    <div class="input-group my-3">
                        <input type="email" class="form-control" name="email" placeholder="Enter email for subscribe" required>
                        <div class="input-group-append">
                            <button class="subscribeBtn">Subscribe</button>
                        </div>
                    </div>
                </form>
                @if(!auth()->user())

                    <ul>
                        <li>
                            <a href="{{route('delivery-boy.login')}}">Delivery Boy Logim</a>
                        </li>
                        <li>
                            <a href="{{ route('seller.loginForm') }}">Seller Login</a>
                        </li>
                        
                    </ul>
                                        
                @endif

            </div>
        </div>
    </div>
    <div class="f_right">
        <p>Seo Expate Bangladesh © 2024. All Rights Reserved.</p>
    </div>
</footer>