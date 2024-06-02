<?php $__env->startSection('title','manage feature'); ?>
<?php $__env->startSection('body'); ?>
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">feature Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage feature</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <!-- Row -->
    <div class="row row-sm">
            <h3 class="text-center">System</h3>
            <hr>
            <?php $__currentLoopData = $featuresSystem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4">
                <div class="card border">
                    <div class="card-header border">
                        <h4 class="text-center"><?php echo e(ucfirst(str_replace('_', ' ', $feature->name))); ?></h4>
                    </div>
                    <div class="card-body text-center">
                        <form action="<?php echo e(route('feature.status',$feature->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="main-toggle-group">
                                <input class="toggle" id="uncheckedDangerSwitchSystem.<?php echo e($key); ?>" value="1" onchange="this.form.submit()" name="status" <?php echo e($feature->status == 1 ? 'checked':''); ?>  type="checkbox"/>
                                <label for="uncheckedDangerSwitchSystem.<?php echo e($key); ?>" class="label-danger"></label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
    <!-- End Row -->
    <!-- Row -->
    <div class="row row-sm">
            <h3 class="text-center">Business Related</h3>
            <hr>
            <?php $__currentLoopData = $featuresBusiness; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4">
                <div class="card border">
                    <div class="card-header border">
                        <h4 class="text-center"><?php echo e(ucfirst(str_replace('_', ' ', $feature->name))); ?></h4>
                    </div>
                    <div class="card-body text-center">
                        <form action="<?php echo e(route('feature.status',$feature->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="main-toggle-group">
                                <input class="toggle" id="uncheckedDangerSwitchBusiness.<?php echo e($key); ?>" value="1" onchange="this.form.submit()" name="status" <?php echo e($feature->status == 1 ? 'checked':''); ?>  type="checkbox"/>
                                <label for="uncheckedDangerSwitchBusiness.<?php echo e($key); ?>" class="label-danger"></label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
    <!-- End Row -->
    <!-- Row -->
    <div class="row row-sm">
            <h3 class="text-center">Payment Related</h3>
            <hr>
            <?php $__currentLoopData = $featuresPayment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4">
                <div class="card border">
                    <div class="card-header border">
                        <h4 class="text-center"><?php echo e(ucfirst(str_replace('_', ' ', $feature->name))); ?></h4>
                    </div>
                    <div class="card-body text-center">
                        <form action="<?php echo e(route('feature.status',$feature->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="main-toggle-group">
                                <input class="toggle" id="uncheckedDangerSwitchPayment.<?php echo e($key); ?>" value="1" onchange="this.form.submit()" name="status" <?php echo e($feature->status == 1 ? 'checked':''); ?>  type="checkbox"/>
                                <label for="uncheckedDangerSwitchPayment.<?php echo e($key); ?>" class="label-danger"></label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <!-- End Row -->
    <!-- Row -->
    <div class="row row-sm">
            <h3 class="text-center">Social Media Login</h3>
            <hr>
            <?php $__currentLoopData = $featuresSocial; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4">
                <div class="card border">
                    <div class="card-header border">
                        <h4 class="text-center"><?php echo e(ucfirst(str_replace('_', ' ', $feature->name))); ?></h4>
                    </div>
                    <div class="card-body text-center">
                        <form action="<?php echo e(route('feature.status',$feature->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="main-toggle-group">
                                <input class="toggle" id="uncheckedDangerSwitchSocial.<?php echo e($key); ?>" value="1" onchange="this.form.submit()" name="status" <?php echo e($feature->status == 1 ? 'checked':''); ?>  type="checkbox"/>
                                <label for="uncheckedDangerSwitchSocial.<?php echo e($key); ?>" class="label-danger"></label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
    <!-- End Row -->

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Project\seo_multivendor_ecommerce\resources\views/admin/feature/index.blade.php ENDPATH**/ ?>