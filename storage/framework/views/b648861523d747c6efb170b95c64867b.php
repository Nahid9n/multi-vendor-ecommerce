<?php $__env->startSection('title', 'Customer Order'); ?>
<?php $__env->startSection('content'); ?>

    <style>
        .status_change {
            border: 1px solid #dee2e6;
            padding: 10px 6px;
            margin-bottom: 13px;
        }
    </style>

    <div class="col-md-8">
        <div class="tab-content dashboard-content">
            <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Your Coupons</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <?php if(count($coupons) > 0): ?>
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Coupon Code</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="">
                                                <td><?php echo e($coupon->coupon->coupon_code); ?></td>
                                                <td><?php echo e(date_format($coupon->created_at,'d M,Y H:s A')); ?></td>
                                                <td><?php echo e($coupon->status == 1 ? 'Active':'Inactive'); ?></td>
                                                <td>
                                                    <a class="btn-small  d-block" href="<?php echo e(route('customer.coupon.view', $coupon->coupon->coupon_code)); ?>">View</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                <?php else: ?>
                                    <div class="text-center"><?php echo $__env->make('empty-space', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('customer.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Project\seo_multivendor_ecommerce\resources\views/customer/coupon/index.blade.php ENDPATH**/ ?>