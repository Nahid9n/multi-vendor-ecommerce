<ul class="nav flex-column" role="tablist">
    <li class="nav-item">
        <a href="{{ route('customer.dashboard') }}" class="nav-link {{ (Route::currentRouteName() == 'customer.dashboard')? 'active' : '' }}"><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('customer.wallet') }}" class="nav-link {{ (Route::currentRouteName() == 'customer.wallet')? 'active' : '' }}"><i class="fi-rs-settings-sliders mr-10"></i>My Wallet</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('customer.orders') }}" class="nav-link {{ (Route::currentRouteName() == 'customer.orders')? 'active' : '' }}"><i class="fi-rs-shopping-bag mr-10"></i>Orders</a>
    </li>    
    <li class="nav-item">
        <a href="{{ route('customer.cancel') }}" class="nav-link {{ (Route::currentRouteName() == 'customer.cancel')? 'active' : '' }}"><i class="fi-rs-shopping-cart-check mr-10"></i>Cancel Order</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('customer.conversations')}}" class="nav-link {{ (Route::currentRouteName() == 'customer.conversations')? 'active' : '' }}"><i class="fi-rs-user mr-10"></i>Conversations</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('customer.support.ticket')}}" class="nav-link {{ (Route::currentRouteName() == 'customer.support.ticket')? 'active' : '' }}"><i class="fi-rs-user mr-10"></i>Support Ticket</a>
    </li> 
    <li class="nav-item">
        <a href="{{ route('customer.account.details')}}" class="nav-link {{ (Route::currentRouteName() == 'customer.account.details')? 'active' : '' }}"><i class="fi-rs-user mr-10"></i>Account details</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('customer.address') }}" class="nav-link {{ (Route::currentRouteName() == 'customer.address')? 'active' : '' }}"><i class="fi-rs-marker mr-10"></i>My Address</a>
    </li>    
    <li class="nav-item">
        <a href="{{ route('customer.change.password')}}" class="nav-link {{ (Route::currentRouteName() == 'customer.change.password')? 'active' : '' }}"><i class="fi-rs-user mr-10"></i>Change Password</a>
    </li>       
    <li class="nav-item">
        <form class="nav-link text-light" action="{{route('customer.logout')}}" method="post">
            @csrf
            <button type="submit" style="background: transparent; padding: 3px 25px;" class="logioutBtn" onclick="return confirm('are you sure to logout ? ')">Logout</button>
        </form>
    </li>
</ul>

