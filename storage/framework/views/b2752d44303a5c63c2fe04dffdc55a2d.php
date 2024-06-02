<?php $__env->startSection('title', 'Shop Profile'); ?>
<?php $__env->startSection('body'); ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h3 class="card-title mb-0">Shop Profile</h3>
                        <a href="<?php echo e(route('seller.shop-setting.edit', $shop_setting->id)); ?>" class="btn btn-dark">Edit Profile</a>
                    </div>
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <?php if($shop_setting->logo != ''): ?>
                                <img src="<?php echo e(asset($shop_setting->logo)); ?>" class="img-fluid rounded-circle mb-3" height="150" width="150">
                            <?php else: ?>
                                <img src="<?php echo e(asset('/no_image.jpg')); ?>" class="img-fluid rounded-circle mb-3" height="150" width="150">
                            <?php endif; ?>
                            <h3 class="text-dark fw-bold"><?php echo e(ucfirst($shop_setting->shop_name)); ?></h3>
                            <p class="text-muted"><?php echo e($shop_setting->slogan ? ucfirst($shop_setting->slogan) : 'Your slogan here'); ?></p>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <h5 class="text-dark"><span class="fw-bold">Owner Name: </span><?php echo e($shop_setting->shop_setting->user->name ?? 'N/A'); ?></h5>
                                <h5 class="text-dark"><span class="fw-bold">Email: </span><?php echo e($shop_setting->shop_setting->user->email ?? 'N/A'); ?></h5>
                                <h5 class="text-dark"><span class="fw-bold">Address: </span><?php echo e($shop_setting->shop_setting->address ?? 'N/A'); ?></h5>
                            </div>
                            <div class="col-md-6">
                                <h5 class="text-dark"><span class="fw-bold">Meta: </span><?php echo e($shop_setting->meta ?? 'N/A'); ?></h5>
                                <h5 class="text-dark"><span class="fw-bold">Meta Description: </span><?php echo e($shop_setting->meta_description ?? 'N/A'); ?></h5>
                                <h5 class="text-dark"><span class="fw-bold">Map: </span><a href="<?php echo e($shop_setting->map ?? '#'); ?>"><?php echo e($shop_setting->map ?? 'View Location'); ?></a></h5>
                            </div>
                        </div>
                        <div class="text-center">
                            <h4 class="text-dark fw-bold mb-3">Follow Us</h4>
                            <a href="<?php echo e($shop_setting->facebook ?? '#'); ?>" class="btn btn-outline-primary mx-1"><i class="fab fa-facebook"></i> Facebook</a>
                            <a href="<?php echo e($shop_setting->twitter ?? '#'); ?>" class="btn btn-outline-info mx-1"><i class="fab fa-twitter"></i> Twitter</a>
                            <a href="<?php echo e($shop_setting->youtube ?? '#'); ?>" class="btn btn-outline-danger mx-1"><i class="fab fa-youtube"></i> YouTube</a>
                            <a href="<?php echo e($shop_setting->linkedIn ?? '#'); ?>" class="btn btn-outline-primary mx-1"><i class="fab fa-linkedin"></i> LinkedIn</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('seller.Layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\NAHID\seo_multivendor_ecommerce\resources\views/seller/shop_setting/index.blade.php ENDPATH**/ ?>