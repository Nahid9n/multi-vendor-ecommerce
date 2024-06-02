<div class="app-header header sticky">
    <div class="container-fluid main-container">
        <div class="d-flex">
            <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar" href="#"></a>
            <!-- sidebar-toggle-->
            <a class="logo-horizontal " href="">
                <img src="<?php echo e(asset($website_setting->logo)); ?>" class="header-brand-img desktop-logo" alt="logo">
                <img src="<?php echo e(asset($website_setting->logo)); ?>" class="header-brand-img light-logo1" alt="logo">
            </a>
            <!-- LOGO -->
            <div class="d-flex order-lg-2 ms-auto header-right-icons">
                <button class="navbar-toggler navresponsive-toggler d-md-none ms-auto" type="button"
                        data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                        aria-controls="navbarSupportedContent-4" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fe fe-more-vertical"></span>
                </button>
                <div class="navbar navbar-collapse responsive-navbar p-0">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                        <div class="d-flex order-lg-2">
                            
                            <!-- Messages-->
                            
                            <!-- NOTIFICATIONS -->
                            <div class="dropdown d-md-flex profile-1">
                                <?php echo e(auth()->user()->name); ?>

                                <a href="#" data-bs-toggle="dropdown" class="nav-link pe-2 leading-none d-flex animate">
												<span>
                                                    <?php if(auth()->user()->image !=null): ?>
                                                    <img  width="60" height="60" src="<?php echo e(asset(auth()->user()->image)); ?>" alt=""
                                                        class="m-0 rounded border border-3">
                                                <?php endif; ?>
                                                <?php if(auth()->user()->image == null): ?>
                                                    <img width="60" height="60" src="<?php echo e(asset('avatar/avatar.png')); ?>" alt=""
                                                        class="m-0 rounded border border-3">
                                                <?php endif; ?>
												</span>
                                        <div class="text-center p-1 d-flex d-lg-none-max">
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <a class="dropdown-item" style="font-size: 15px" href="<?php echo e(route('seller.profile',auth()->user()->id)); ?>">
                                        <i class="fa-solid fa-user"></i> Profile</h2>
                                    </a>
                                    <a class="dropdown-item" style="font-size: 15px" href="<?php echo e(route('seller.wallet')); ?>">
                                        <i class="fa-solid fa-user"></i> Wallet</h2>
                                    </a>

                                    <a class="dropdown-item">
                                        <form  action="<?php echo e(route('seller.logout')); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <button style="font-size: 15px" type="submit" onclick="return confirm('are you sure to logout ?')" class="dropdown-item"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</button>
                                        </form>
                                    </a>
                                </div>
                            </div>
                            <!-- Profile -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH D:\NAHID\seo_multivendor_ecommerce\resources\views/seller/Layout/header.blade.php ENDPATH**/ ?>