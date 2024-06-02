<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">

            <a class="header-brand1" href="<?php echo e(route('dashboard')); ?>">
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
                <a class="header-brand1" href="<?php echo e(route('dashboard')); ?>">
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
            <ul class="side-menu text-dark">
                <li>
                    <h3>Menu</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="<?php echo e(route('dashboard')); ?>">
                        <i class="fa-solid fa-house mx-3 fs-5"></i>
                        <span class="side-menu__label">Dashboard</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#">
                        <i class="fa-brands fa-product-hunt mx-3 fs-5"></i>
                        <span class="side-menu__label">Products</span><i class="angle fa fa-angle-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li>
                            <a href="<?php echo e(route('digitals.index')); ?>" class="slide-item">Category</a>
                        </li>
                        <li><a href="<?php echo e(route('products.index')); ?>" class="slide-item">All Product</a></li>
                        <li><a href="<?php echo e(route('products.create')); ?>" class="slide-item">Add Product</a></li>
                        <!-- <li><a href="<?php echo e(route('admin.digital.product')); ?>" class="slide-item">Products</a></li> -->
                        <!-- <li><a href="<?php echo e(route('admin.inhouse.products')); ?>" class="slide-item">In House Products</a></li> -->
                        <li><a href="<?php echo e(route('admin.seller.products')); ?>" class="slide-item">Seller Products</a></li>
                        <li><a href="<?php echo e(route('units.index')); ?>" class="slide-item">Units</a></li>
                        <li><a href="<?php echo e(route('brands.index')); ?>" class="slide-item">Brand</a></li>
                        <li><a href="<?php echo e(route('colors.index')); ?>" class="slide-item">Colors</a></li>
                        <li><a href="<?php echo e(route('product_attribute.index')); ?>" class="slide-item">Attributes</a></li>
                        <li><a href="<?php echo e(route('product.reviews')); ?>" class="slide-item">Product Reviews</a></li>
                    </ul>
                </li>

  
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#">
                        <i class="fa-solid fa-cart-arrow-down mx-3 fs-5"></i>
                        <span class="side-menu__label">Sales</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)">Sales</a></li>
                        <li><a href="<?php echo e(route('sales.order')); ?>" class="slide-item">All Orders</a></li>
                        <li><a href="<?php echo e(route('sales.in-house-orders')); ?>" class="slide-item">In house Orders</a></li>
                        <li><a href="<?php echo e(route('sales.seller-orders')); ?>" class="slide-item">Seller Orders</a></li>

                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#">
                        <i class="fa-solid fa-person-digging mx-3 fs-5"></i>
                        <span class="side-menu__label">Delivery Boy</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)">Delivery Boy</a></li>
                        <li><a href="<?php echo e(route('delivery-boy.index')); ?>" class="slide-item">All Delivery Boy</a></li>
                        <li><a href="<?php echo e(route('delivery-boy.create')); ?>" class="slide-item">Add delivery boy</a></li>
                        <li><a href="<?php echo e(route('deliveryBoy.allPayment')); ?>" class="slide-item">All Payments</a></li>
                        <li><a href="<?php echo e(route('deliveryBoy.pendingPayment')); ?>" class="slide-item">Pending Payments</a></li>
                        <li><a href="<?php echo e(route('deliveryBoy.completePayment')); ?>" class="slide-item">complete Payment</a></li>
                        <li><a href="<?php echo e(route('deliveryBoy.cancelRequests')); ?>" class="slide-item">Cancel requests</a></li>
                        <li><a href="<?php echo e(route('deliveryBoy.collectedHistory')); ?>" class="slide-item">Collected history</a></li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#">
                        <i class="fa-solid fa-retweet mx-3 fs-5"></i>
                        <span class="side-menu__label">Refund</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)">Refund</a></li>
                        <li><a href="<?php echo e(route('product.refund.request')); ?>" class="slide-item">Request refund</a></li>
                        <li><a href="<?php echo e(route('product.refund.approve')); ?>" class="slide-item">Approve refund</a></li>
                        <li><a href="<?php echo e(route('product.refund.rejected')); ?>" class="slide-item">Rejected refund</a></li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#">
                        <i class="fa-solid fa-users mx-3 fs-5"></i>
                        <span class="side-menu__label">Customers</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)">Customers</a></li>
                        <li><a href="<?php echo e(route('customers.index')); ?>" class="slide-item">List of customer</a></li>
                        <li><a href="<?php echo e(route('customers.create')); ?>" class="slide-item">Create New Customer</a></li>
                        <li><a href="<?php echo e(route('classifiedPackage.index')); ?>" class="slide-item">Classified packages</a></li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#">
                        <i class="fa-solid fa-shop mx-3 fs-5"></i>
                        <span class="side-menu__label">Sellers</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a href="<?php echo e(route('seller.index')); ?>" class="slide-item">Seller Shop Verify</a></li>
                        <li><a href="<?php echo e(route('seller.list')); ?>" class="slide-item">All Seller</a></li>
                        <li><a href="<?php echo e(route('seller.create')); ?>" class="slide-item">Add Seller</a></li>
                        <li><a href="<?php echo e(route('admin.seller.payment.all')); ?>" class="slide-item">Payouts</a></li>
                        <li><a href="<?php echo e(route('admin.seller.payment.pending')); ?>" class="slide-item">Payout requests</a></li>
                        <li><a href="<?php echo e(route('admin.seller.payment.complete')); ?>" class="slide-item">Payout complete</a></li>
                        <li><a href="<?php echo e(route('admin.seller.payment.cancel')); ?>" class="slide-item">Payout cancel</a></li>
                        <li><a href="<?php echo e(route('admin.seller.commission')); ?>" class="slide-item">Seller Commissions</a></li>
                        <li><a href="<?php echo e(route('sellerPackage.index')); ?>" class="slide-item">Seller Packages</a></li>
                        <li><a href="<?php echo e(route('seller.payment')); ?>" class="slide-item">Order Packages</a></li>
                        <li><a href="<?php echo e(route('seller.verification.form')); ?>" class="slide-item">Verification form</a></li>
                    </ul>
                </li>

                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#">
                        <i class="fa-solid fa-blog mx-3 fs-5"></i>
                        <span class="side-menu__label">Blog System</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)">Blog System</a></li>
                        <!-- <li><a href="<?php echo e(route('blogs.create')); ?>" class="slide-item">Add Post</a></li> -->
                        <li><a href="<?php echo e(route('blogs.index')); ?>" class="slide-item">All Posts</a></li>
                        <li><a href="<?php echo e(route('blog_categories.index')); ?>" class="slide-item">Categories of blogs</a></li>
                    </ul>
                </li>
                <li class="slide">

                    <a class="side-menu__item" data-bs-toggle="slide" href="#">
                        <i class="fa-solid fa-rectangle-ad mx-3 fs-5"></i>
                        <span class="side-menu__label">Marketing</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)">Marketing</a></li>



                        <li><a href="<?php echo e(route('admin.subscriber')); ?>" class="slide-item">Subscribers</a></li>
                        <li><a href="<?php echo e(route('admin-coupon.index')); ?>" class="slide-item">Coupon</a></li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#">
                        <i class="fa-solid fa-headset mx-3 fs-5"></i>
                        <span class="side-menu__label">Support</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)">Support</a></li>
                        <li><a href="<?php echo e(route('admin.ticket.manage')); ?>" class="slide-item">Tickets</a></li>
                        <li><a href="<?php echo e(route('product.conversation')); ?>" class="slide-item">Product conversion</a></li>
                        <li><a href="<?php echo e(route('admin.product.queries')); ?>" class="slide-item">Product Queries</a></li>
                    </ul>
                </li>
                 
                 
                
                <li class="slide">
                    <a class="side-menu__item has-link text-dark" data-bs-toggle="slide" href="<?php echo e(route('admin.file.manage')); ?>">
                        <i class="fa-solid fa-photo-film mx-3 fs-5"></i>
                        <span class="side-menu__label">File Uploads</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#">
                        <i class="fa-regular fa-window-maximize mx-3 fs-5"></i>
                        <span class="side-menu__label">Website Setup</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)">Website Setup</a></li>
                        <li><a href="<?php echo e(route('website-settings.show',$website_setting->id)); ?>" class="slide-item">Manage Website Details</a></li>
                        <li><a href="<?php echo e(route('slider.index')); ?>" class="slide-item">Slider Manage</a></li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#">
                        <i class="fa-solid fa-gears mx-3 fs-5"></i>
                        <span class="side-menu__label">Setup & Configuration</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li class="sub-slide">
                            <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="<?php echo e(route('pages.index')); ?>">
                                <span class="sub-side-menu__label">Pages</span>
                            </a>
                        </li>
                        <li class="sub-slide">
                            <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="<?php echo e(route('feature.index')); ?>">
                                <span class="sub-side-menu__label">Feature Activation</span>
                            </a>
                        </li>
                        <li class="sub-slide">
                            <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="#"><span
                                    class="sub-side-menu__label">Country</span><i
                                    class="sub-angle fa fa-angle-right"></i></a>
                            <ul class="sub-slide-menu">
                                <li><a class="sub-slide-item" href="<?php echo e(route('country.index')); ?>">All Country</a></li>
                                <li><a href="<?php echo e(route('country.create')); ?>" class="sub-slide-item">Add Country</a></li>
                            </ul>
                        </li>
                        <li class="sub-slide">
                            <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="#"><span
                                    class="sub-side-menu__label">Currency</span><i
                                    class="sub-angle fa fa-angle-right"></i></a>
                            <ul class="sub-slide-menu">
                                <li><a class="sub-slide-item" href="<?php echo e(route('currency.index')); ?>">All Currency</a></li>
                                <li><a class="sub-slide-item" href="<?php echo e(route('currency.create')); ?>">Add Currency</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
               
            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg>
            </div>
        </div>
    </div>
</div>
<?php /**PATH D:\NAHID\seo_multivendor_ecommerce\resources\views/admin/Layout/side-bar.blade.php ENDPATH**/ ?>