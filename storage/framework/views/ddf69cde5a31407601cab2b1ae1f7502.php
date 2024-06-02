<ul class="nav flex-column" role="tablist">
    <li class="nav-item">
        <a href="<?php echo e(route('customer.dashboard')); ?>" class="nav-link <?php echo e((Route::currentRouteName() == 'customer.dashboard')? 'active' : ''); ?>"><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
    </li>
    <li class="nav-item">
        <a href="<?php echo e(route('customer.wallet')); ?>" class="nav-link <?php echo e((Route::currentRouteName() == 'customer.wallet')? 'active' : ''); ?>"><i class="fi-rs-settings-sliders mr-10"></i>My Wallet</a>
    </li>
    <li class="nav-item">
        <a href="<?php echo e(route('customer.orders')); ?>" class="nav-link <?php echo e((Route::currentRouteName() == 'customer.orders')? 'active' : ''); ?>"><i class="fi-rs-shopping-bag mr-10"></i>Orders</a>
    </li>
    <li class="nav-item">
        <a href="<?php echo e(route('customer.cancel')); ?>" class="nav-link <?php echo e((Route::currentRouteName() == 'customer.cancel')? 'active' : ''); ?>"><i class="fi-rs-shopping-cart-check mr-10"></i>Cancel Order</a>
    </li>
    <li class="nav-item">
        <a href="<?php echo e(route('customer.refund')); ?>" class="nav-link <?php echo e((Route::currentRouteName() == 'customer.refund')? 'active' : ''); ?>"><i class="fi-rs-shopping-cart-check mr-10"></i>Refund</a>
    </li>
    <li class="nav-item">
        <a href="<?php echo e(route('customer.refund.requests')); ?>" class="nav-link <?php echo e((Route::currentRouteName() == 'customer.refund.requests')? 'active' : ''); ?>"><i class="fi-rs-shopping-cart-check mr-10"></i>Refund Requests</a>
    </li>
    <li class="nav-item">
        <a href="<?php echo e(route('customer.conversations')); ?>" class="nav-link <?php echo e((Route::currentRouteName() == 'customer.conversations') ? 'active' : ''); ?><?php echo e((Route::currentRouteName() == 'converstation.details') ? 'active' : ''); ?>"><i class="fi-rs-user mr-10"></i>Conversations</a>
    </li>
    <li class="nav-item">
        <a href="<?php echo e(route('customer.support.ticket')); ?>" class="nav-link <?php echo e((Route::currentRouteName() == 'customer.support.ticket')? 'active' : ''); ?>"><i class="fi-rs-user mr-10"></i>Support Ticket</a>
    </li>
    <li class="nav-item">
        <a href="<?php echo e(route('customer.coupons')); ?>" class="nav-link <?php echo e((Route::currentRouteName() == 'customer.coupons')? 'active' : ''); ?>"><i class="fi-rs-user mr-10"></i>Coupons</a>
    </li>
    <li class="nav-item">
        <a href="<?php echo e(route('customer.account.details')); ?>" class="nav-link <?php echo e((Route::currentRouteName() == 'customer.account.details')? 'active' : ''); ?>"><i class="fi-rs-user mr-10"></i>Account details</a>
    </li>
    <li class="nav-item">
        <a href="<?php echo e(route('customer.address')); ?>" class="nav-link <?php echo e((Route::currentRouteName() == 'customer.address')? 'active' : ''); ?>"><i class="fi-rs-marker mr-10"></i>My Address</a>
    </li>
    <li class="nav-item">
        <a href="<?php echo e(route('customer.change.password')); ?>" class="nav-link <?php echo e((Route::currentRouteName() == 'customer.change.password')? 'active' : ''); ?>"><i class="fi-rs-user mr-10"></i>Change Password</a>
    </li>
    <li class="nav-item">
        <form class="nav-link text-light" action="<?php echo e(route('customer.logout')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <button type="submit" style="background: transparent; padding: 3px 25px;" class="logioutBtn" onclick="return confirm('are you sure to logout ? ')">Logout</button>
        </form>
    </li>
</ul>

<?php /**PATH F:\Project\seo_multivendor_ecommerce\resources\views/customer/sidebar.blade.php ENDPATH**/ ?>