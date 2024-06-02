<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('body'); ?>
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title mt-2">Dashboard</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <?php if(auth()->user()->profile_verified == 1): ?>
        <?php if(auth()->user()->status == 0): ?>
            <h1>Please wait, for verifing your profile.</h1>
        <?php endif; ?>
        <?php if(auth()->user()->status == 1): ?>
            <div class="row mt-5">
                <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h3 class="mb-2 fw-semibold"><?php echo e(count($product)); ?></h3>
                                    <p class="text-muted fs-13 mb-0">Total Products</p>
                                    <p class="text-muted mb-0 mt-2 fs-12">
                                        <span class="icn-box text-success fw-semibold fs-13 me-1">
                                        </span>
                                    </p>
                                </div>
                                <div class="col col-auto top-icn dash">
                                    <div class="counter-icon bg-secondary dash ms-auto box-shadow-success">
                                        <i class="fa-solid text-white fa-store"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h3 class="mb-2 fw-semibold"><?php echo e(count($order)); ?></h3>
                                    <p class="text-muted fs-13 mb-0">Total Orders</p>
                                    <p class="text-muted mb-0 mt-2 fs-12">
                                        <span class="icn-box text-success fw-semibold fs-13 me-1">
                                        </span>
                                    </p>
                                </div>
                                <div class="col col-auto top-icn dash">
                                    <div class="counter-icon bg-secondary dash ms-auto box-shadow-success">
                                        <i class="fa-solid text-white fa-store"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        <?php endif; ?>
    <?php endif; ?>

    <?php if(auth()->user()->profile_verified == 0): ?>
        <h1 class="text-bold text-center">Please,Verify Your Account !</h1>
        <hr>
        <div class="row">
            <div class="col-lg-6 col-sm-12 col-md-6 col-xl-6 offset-md-3 offset-xl-3">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="row">
                            <div class="col text-center">
                                <h3 class="mb-2 fw-semibold"><?php echo e(auth()->user()->name); ?></h3>
                                <p class="text-muted fs-13 mb-0"><?php echo e(auth()->user()->email); ?></p>
                                <h4>Verify Your Account</h4>
                                <a class="btn btn-danger" href="<?php echo e(route('profile.verifyForm')); ?>">Verify Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('seller.Layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\NAHID\seo_multivendor_ecommerce\resources\views/seller/Layout/app.blade.php ENDPATH**/ ?>