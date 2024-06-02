<?php $__env->startSection('title','Admin Coupon Page'); ?>
<?php $__env->startSection('body'); ?>
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Coupon Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Coupon</li>
            </ol>
        </div>
    </div>
<div class="row mt-5">
    <div class="col">
        <div class="card">
            <div class="card-header border-bottom justify-content-between">
                <h3 class="card-title">Coupon Table</h3>
                <a href="<?php echo e(route('admin-coupon.create')); ?>" class="btn btn-primary my-1 mx-2 text-center">+ADD</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="" class="table table-bordered text-nowrap border-bottom">
                        <thead>
                        <tr>
                            <th class="border-bottom-0">SL No</th>
                            <th class="border-bottom-0">Type</th>
                            <th class="border-bottom-0">Coupon code</th>
                            <th class="border-bottom-0">User Name</th>
                            <th class="border-bottom-0">Date</th>
                            <th class="border-bottom-0">Status</th>
                            <th class="border-bottom-0">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                                $id=0;
                            ?>
                            <?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($coupon->coupon_type=='product' ? "Product Base": "Cart Base"); ?></td>
                                    <td><?php echo e($coupon->coupon_code); ?></td>
                                    <td><?php echo e($coupon->user->name); ?></td>
                                    <td><?php echo e($coupon->date_range); ?></td>
                                    <td><?php echo e($coupon->status ==1 ? "Active": "Inactive"); ?></td>
                                    <td class="justify-content-center d-flex text-center">
                                        <a href="<?php echo e(route('admin-coupon.edit',$coupon->id)); ?>" class="btn btn-success my-2 me-1"><i class="fa fa-edit"></i></a>
                                        <form action="<?php echo e(route('admin-coupon.delete',$coupon->id)); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" onclick="return confirm('are you sure to delete ? ')" class="btn btn-danger my-2 me-1"><i class="fa fa-trash-o"></i></button>
                                        </form>
                                    </td>

                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Project\seo_multivendor_ecommerce\resources\views/admin/marketing/coupon/index.blade.php ENDPATH**/ ?>