<header class="header-area">

    {{-- desktop header--}}
    <div class="desktop-header">
        <!--header-top-->
        <div class="header-top sticky-top ">
            <div class="container-fluid">
                <div class="row nav navbar-expand-md align-items-center">
                    <div class="col-lg-6">
                        <div class="topbar-left becom d-flex">
                            <ul class="list-none text-body navbar-nav me-auto">
                                @if(!auth()->user())
                                <li class="nav-item">
                                    <a href="{{ route('seller.registrationForm') }}" class="nav-link text-secondary">Become a Seller</a>
                                </li>
                                @endif
                                <li class="nav-item">
                                    <div class="dropdown">
                                        <button onclick="langChanger()" class="langChangerDropbtn">English <i class="fa fa-angle-down" aria-hidden="true"></i></button>
                                        <div id="langDropdown" class="dropdown-content langDropdown-dropdown-content">
                                            <a class="flag_country" href=""><span class="en"></span> English</a>
                                            <a class="flag_country" href=""><span class="fr"></span> Franch</a>
                                            <a class="flag_country" href=""><span class="de"></span> German</a>
                                            <a class="flag_country" href=""><span class="ar"></span> Arabic</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <div class="dropdown">
                                        <button onclick="currencyChange()" class="currencyChangeDropbtn">U.S. Dollar <i class="fa fa-angle-down" aria-hidden="true"></i></button>
                                        <div id="currencyDropdown" class="dropdown-content currencyDropdown-dropdown-content">
                                            <a class="flag_country" href="">U.S. Dollar</a>
                                            <a class="flag_country" href="">Australian Dollar</a>
                                            <a class="flag_country" href="">Brazilian Real (R$)</a>
                                            <a class="flag_country" href="">Canadian Dollar ($)</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="">
                            <div class="navbar-nav justify-content-end">

                                <a class="nav-link text-secondary" href="{{route('customer.login.page')}}">Email: admin@example.com</a>
                                @if(!isset((auth()->user()->id)))
                                    <a class="nav-link text-secondary" href="{{route('customer.login.page')}}">Login</a>
                                    <a class="nav-link text-secondary" href="{{route('customer.register.page')}}">Sign up</a>
                                @endif
                            </div>

                            @if(auth()->user() and auth()->user()->role == 'admin')
                            <div class="top-right-bar-dropDown-admin">
                                <ul class="top-right-bar-ul">
                                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                    <li>
                                        <form style="padding: 0;" class="nav-link text-light" action="{{route('customer.logout')}}" method="post">
                                            @csrf
                                            <button type="submit" class="logioutBtn" onclick="return confirm('are you sure to logout ? ')">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            @endif

                            @if(auth()->user() and auth()->user()->role == 'seller')
                            <div class="top-right-bar-dropDown">
                                <ul class="top-right-bar-ul">
                                    <li><a href="{{ route('seller.dashboard') }}">Dashboard</a></li>
                                    <li>
                                        <form style="padding: 0;" class="nav-link text-light" action="{{route('customer.logout')}}" method="post">
                                            @csrf
                                            <button type="submit" class="logioutBtn" onclick="return confirm('are you sure to logout ? ')">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!--header-bottom-->
        <div class="sticker header-bottom">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-xl-3 col-md-3">
                        <div class="logo">
                            <a href="{{route('home')}}"><img src="{{ (isset($websiteInfos->logo))? asset($websiteInfos->logo) : asset('dummy-logo.jpg')}}" alt="logo" /></a>
                        </div>
                    </div>
                    <div class="col-lg-5 col-xl-6 col-md-6">
                        <div class="mainmenu">
                            <form action="{{ route('search.data') }}" method="get">
                                <div class="search-box">
                                    <input type="text" class="form-control" onkeyup="searchOnKeyUp(this)" name="keyword" placeholder="Search..." value="{{ (isset($_GET['keyword']))? $_GET['keyword'] : ''  }}">
                                    <button class="submit_search" type="submit">Search</button>

                                    <div class="search_result"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-3 col-md-3">
                        <div class="mini-cart pull-right">
                            <ul>
                                <li><a href="#"><i class="fa fa-bell" aria-hidden="true"></i><span id="">0</span></a>
                                    <p>Notification</p>
                                </li>
                                <li><a href="{{ route("wishList-view") }}"><img src="{{asset('/')}}website/assets/img/or.png" alt=""><span id="wishcount">{{ isset($wishlist)? $wishlist : 0 }}</span></a>
                                    <p>Wishlist</p>
                                </li>
                                <li><a href="javascript:void(0);" class="minicart-icon"><img src="{{asset('/')}}website/assets/img/cart.png" alt=""></i><span id="cart_counter">{{ (isset($cartItems))? count($cartItems) : 0 }}</span></a>
                                    <p>My cart</p>
                                    <div class="cart-dropdown" id="cart_modal">


                                        <ul id="cartDetails">
                                            @php($sum = 0)
                                            @if(count($cartItems) < 1 && auth()->user())
                                                @include('empty-space')
                                            @else
                                                @php($sum = 0)
                                                @if(count($cartItems) > 0)
                                                @foreach($cartItems as $item)
                                                @if(auth()->user()->id == $item->user_id)
                                                <li>
                                                    <div class="mini-cart-thumb {{ $item->user_id }}">
                                                        <a href="{{route('product.details',$item->id)}}"><img src="{{asset($item->image)}}" alt="Electric" /></a>
                                                    </div>
                                                    <div class="mini-cart-heading">
                                                        <span>TK {{$item->price}} x {{$item->qty}}</span>
                                                        <h5><a href="#">{{$item->name}}</a></h5>
                                                    </div>
                                                    <div class="mini-cart-remove">
                                                        <a class="removeBtn" href="{{route('cart.delete',['rowId'=> $item->id])}}" onclick="return confirm('are you sure to remove ?')"><i class="fa text-danger fa-remove"></i></a>
                                                    </div>
                                                </li>
                                                @endif
                                                @php($sum = $sum + $item->price*$item->qty)
                                                @endforeach
                                                @else
                                                @include('empty-space')
                                                @endif
                                                @endif
                                        </ul>

                                        <div class="minicart-total fix">
                                            <span class="pull-left">total:</span>
                                            <span class="pull-right">TK <span class="top_cart_price">{{ isset($sum)? $sum : 0}}</span></span>
                                        </div>
                                        <div class="mini-cart-checkout">
                                            <a href="{{route('cart.index')}}" class="btn-common view-cart">VIEW CART</a>
                                            <a href="{{route('cart.checkout')}}" class="btn-common checkout mt-10">CHECK OUT</a>
                                        </div>
                                    </div>
                                </li>


                                @if((auth()->user()) and auth()->user()->role == 'customer')

                                <li class="profile" onclick="userProfile()">

                                    @if(isset($customer_info->image) != '')
                                        <img class="user_image" src="{{ asset($customer_info->image)}}">
                                    @else
                                        <img class="user_image" src="{{asset('/')}}uploads/avatars/profile.png">
                                    @endif
                                    <div class="top-right-bar-dropDown">
                                        <ul class="top-right-bar-ul">
                                            <li><a href="{{ route('customer.dashboard') }}">Dashboard</a></li>
                                            <li><a href="#">Purchase History</a></li>
                                            <li><a href="{{ route('customer.conversations') }}">Conversation</a></li>
                                            <li><a href="{{ route('customer.support.ticket') }}">Support Ticket</a></li>
                                            <li>
                                                <form style="padding: 0;" class="nav-link text-light" action="{{route('customer.logout')}}" method="post">
                                                    @csrf
                                                    <button type="submit" class="logioutBtn" onclick="return confirm('are you sure to logout ? ')">Logout</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>

                                    <p>{{auth()->user()->name}}</p>
                                </li>
                                @endif

                                @if((auth()->user()) and auth()->user()->role == 'admin')
                                <li id="admin_li" class="profile" onclick="userProfile()">

                                    <img class="user_image" src="{{ asset('/avatar/dummy-img.jpg') }}">
                                    <div class="top-right-bar-dropDown">
                                        <ul class="top-right-bar-ul">
                                            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                            <li>
                                                <form style="padding: 0;" class="nav-link text-light" action="{{route('customer.logout')}}" method="post">
                                                    @csrf
                                                    <button type="submit" class="logioutBtn" onclick="return confirm('are you sure to logout ? ')">Logout</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                    <p>{{auth()->user()->name}}</p>
                                </li>
                                @endif


                                @if((auth()->user()) and auth()->user()->role == 'seller')
                                <li id="admin_li" class="profile" onclick="sellerProfile()">

                                    <img class="user_image" src="{{ asset('/avatar/dummy-img.jpg') }}">
                                    <div class="top-right-bar-dropDown-seller">
                                        <ul class="top-right-bar-ul">
                                            <li><a href="{{ route('seller.dashboard') }}">Dashboard</a></li>

                                            <li>
                                                <form style="padding: 0;" class="nav-link text-light" action="{{route('customer.logout')}}" method="post">
                                                    @csrf
                                                    <button type="submit" class="logioutBtn" onclick="return confirm('are you sure to logout ? ')">Logout</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                    <p>{{auth()->user()->name}}</p>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>
