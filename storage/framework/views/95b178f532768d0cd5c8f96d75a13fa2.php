<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">

            <a class="header-brand1" href="">
                <img src="<?php echo e(asset($website_setting->logo)); ?>" class="header-brand-img desktop-logo"
                     alt="logo">
                <img src="<?php echo e(asset($website_setting->logo)); ?>" class="header-brand-img toggle-logo"
                     alt="logo">
                <img src="<?php echo e(asset($website_setting->logo)); ?>" class="header-brand-img light-logo"
                     alt="logo">
                <img src="<?php echo e(asset($website_setting->logo)); ?>" class="header-brand-img light-logo1"
                     alt="logo">
            </a><!-- LOGO -->
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"></svg>
                <a class="header-brand1" href="">
                    <img src="<?php echo e(asset($website_setting->logo)); ?>" class="header-brand-img desktop-logo" alt="logo">
                    <img src="<?php echo e(asset($website_setting->logo)); ?>" class="header-brand-img toggle-logo" alt="logo">
                    <img src="<?php echo e(asset($website_setting->icon)); ?>" class="header-brand-img light-logo" alt="logo">
                    <img src="<?php echo e(asset($website_setting->icon)); ?>" class="header-brand-img light-logo1" alt="logo">
                </a><!-- LOGO -->
            </div>
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">

                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg>
            </div>
            <ul class="side-menu">
                <li>
                    <h3>Menu</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="<?php echo e(route('seller.dashboard')); ?>">
                        <i class="fa-solid fa-house mx-3"></i>
                        <span class="side-menu__label">Dashboard</span>
                    </a>
                </li>
                <?php if(auth()->user()->status == 1): ?>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#">
                        <i class="fa-brands fa-product-hunt mx-3"></i>
                        <span class="side-menu__label">Products</span><i class="angle fa fa-angle-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li><a href="<?php echo e(route('product.index')); ?>" class="slide-item">All Product</a></li>
                        <li><a href="<?php echo e(route('product.create')); ?>" class="slide-item">Add Product</a></li>
                        <li><a href="<?php echo e(route('category-wise-discount.index')); ?>" class="slide-item">Category-Wise-Discount</a></li>
                        
                        
                    </ul>

                </li>

                <?php endif; ?>

                <?php if(auth()->user()->status == 1): ?>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#">
                        <i class="fa-solid fa-cart-arrow-down mx-3"></i>
                        <span class="side-menu__label">Sales</span><i class="angle fa fa-angle-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li><a href="<?php echo e(route('seller.order.manage')); ?>" class="slide-item">All Orders</a></li>
                        <li><a href="<?php echo e(route('seller.order.complete')); ?>" class="slide-item">Complete Orders</a></li>
                    </ul>
                </li>

                <?php endif; ?>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="<?php echo e(route('seller.shop-setting.index')); ?>">
                        <i class="fa-solid fa-shop mx-3"></i>
                        <span class="side-menu__label">Shop Setting</span>
                    </a>
                </li>
                <?php if(auth()->user()->status == 1): ?>

                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="<?php echo e(route('seller-coupon.index')); ?>">
                        <i class="fa-solid fa-percent mx-3"></i>
                        <span class="side-menu__label">Coupon</span>
                    </a>
                </li>
                <?php endif; ?>
                
                <?php if(auth()->user()->status == 1): ?>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="<?php echo e(route('seller.payment.info')); ?>">
                        <i class="fa-solid fa-credit-card mx-3"></i>
                        <span class="side-menu__label">Payment Info </span>
                    </a>
                </li>

                <?php endif; ?>
                <?php if(auth()->user()->status == 1): ?>

                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#">
                        <i class="fa-solid fa-headset mx-3 fs-5"></i>
                        <span class="side-menu__label">Support</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)">Support</a></li>
                        
                        
                        <li><a href="<?php echo e(route('seller.product.queries')); ?>" class="slide-item">Product Queries</a></li>
                    </ul>
                </li>
                <?php endif; ?>


                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="<?php echo e(route('seller.file.manage')); ?>">
                        <i class="fa-solid fa-file mx-3"></i>
                        <span class="side-menu__label">File Upload</span>
                    </a>
                </li>
                <?php if(auth()->user()->status == 1): ?>

                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="<?php echo e(route('seller.wallet')); ?>">
                        <i class="fa-solid fa-money-bills mx-3 text-dark"></i>
                        <span class="side-menu__label text-dark">Payout</span>
                    </a>
                <a class="side-menu__item" data-bs-toggle="slide" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon"
                            enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                            <path
                                d="M21.5,21h-19C2.223877,21,2,21.223877,2,21.5S2.223877,22,2.5,22h19c0.276123,0,0.5-0.223877,0.5-0.5S21.776123,21,21.5,21z M4.5,18.0888672h5c0.1326294,0,0.2597656-0.0527344,0.3534546-0.1465454l10-10c0.000061,0,0.0001221-0.000061,0.0001831-0.0001221c0.1951294-0.1952515,0.1950684-0.5117188-0.0001831-0.7068481l-5-5c0-0.000061-0.000061-0.0001221-0.0001221-0.0001221c-0.1951904-0.1951904-0.5117188-0.1951294-0.7068481,0.0001221l-10,10C4.0526733,12.3291016,4,12.4562378,4,12.5888672v5c0,0.0001831,0,0.0003662,0,0.0005493C4.0001831,17.8654175,4.223999,18.0890503,4.5,18.0888672z M14.5,3.2958984l4.2930298,4.2929688l-2.121582,2.121582l-4.2926025-4.293396L14.5,3.2958984z M5,12.7958984l6.671814-6.671814l4.2926025,4.293396l-6.6713867,6.6713867H5V12.7958984z" />
                        </svg>
                        <span class="side-menu__label">Profile Setting</span><i class="angle fa fa-angle-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li><a href="<?php echo e(route('seller.profile')); ?>" class="slide-item">Profile</a></li>
                        <li><a href="<?php echo e(route('seller.logout')); ?>" class="slide-item">Logout</a></li>
                    </ul>
                </li>
                <?php endif; ?>
            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg>
            </div>
        </div>
    </div>
</div>

<?php /**PATH D:\NAHID\seo_multivendor_ecommerce\resources\views/seller/Layout/side-bar.blade.php ENDPATH**/ ?>