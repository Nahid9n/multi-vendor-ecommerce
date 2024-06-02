<?php $__env->startSection('title','Customer Module'); ?>
<?php $__env->startSection('body'); ?>
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Customer Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Customer</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Customer</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <!-- row -->
    <div class="row row-deck">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title text-bold">Create New Customer</h3>
                    <a href="<?php echo e(route('customers.index')); ?>" class="btn btn-success my-1 float-end text-center">All Customer</a>
                </div>

                <div class="card-body">
                    <form class="form-horizontal" action="<?php echo e(route('customers.store')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row mb-4">
                            <label for="name" class="col-md-3 form-label">Customer Name <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" id="name" required value="<?php echo e(old('name')); ?>" name="name" placeholder="Enter your Customer name" type="text">
                                <span class="text-danger"><?php echo e($errors->has('name') ? $errors->first('name'):''); ?></span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="email" class="col-md-3 form-label">Email <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input type="email" class="form-control" value="<?php echo e(old('email')); ?>" id="email" name="email" placeholder="Enter your email" required>
                                <span class="text-danger"><?php echo e($errors->has('email') ? $errors->first('email'):''); ?></span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="password" class="col-md-3 form-label">Password <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" value="<?php echo e(old('password')); ?>" id="password" name="password" placeholder="Enter Password" type="password" required>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="confirm_password" class="col-md-3 form-label">Confirm Password <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" value="<?php echo e(old('confirm_password')); ?>" id="confirm_password" name="confirm_password" placeholder="Enter password Again" type="password" required>
                            </div>
                        </div>
                        <button class="btn btn-primary px-4" type="submit">Create Customer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Project\seo_multivendor_ecommerce\resources\views/admin/customer/add.blade.php ENDPATH**/ ?>