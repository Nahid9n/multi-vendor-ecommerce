<?php $__env->startSection('title','manage Currency'); ?>
<?php $__env->startSection('body'); ?>
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Currency Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Currency</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title text-bold">Currency Table</h3>
                    <a href="<?php echo e(route('currency.create')); ?>" class="btn btn-success my-1 float-end text-center">Add New Currency</a>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="example3" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                            <tr class="text-center">
                                <th class="border-bottom-0">Name</th>
                                <th class="border-bottom-0">Symbol</th>
                                <th class="border-bottom-0">Code</th>
                                <th class="border-bottom-0">Exchange rate(1 USD = ?)</th>
                                <th class="border-bottom-0">Status</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="text-center">
                                    <td><?php echo e($currency->name); ?></td>
                                    <td><?php echo e($currency->symbol ?? '$'); ?></td>
                                    <td><?php echo e($currency->code); ?></td>
                                    <td><?php echo e($currency->exchange_rate); ?></td>
                                    <td>
                                        <form action="<?php echo e(route('currency.status',$currency->id)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <span><?php echo e($currency->status == 1 ? 'Active':'Inactive'); ?></span>
                                            <div class="material-switch ">
                                                <input class="" id="uncheckedDangerSwitch.<?php echo e($key); ?>" value="1" onchange="this.form.submit()" name="status" <?php echo e($currency->status == 1 ? 'checked':''); ?>  type="checkbox"/>
                                                <label for="uncheckedDangerSwitch.<?php echo e($key); ?>" class="label-danger"></label>
                                            </div>
                                        </form>
                                    </td>
                                    <td class="text-center d-flex justify-content-center">

                                        <a href="<?php echo e(route('currency.edit',$currency->id)); ?>" class="btn btn-primary mb-1 mx-1"><i class="fa fa-regular fa-edit"></i></a>
                                        <form action="<?php echo e(route('currency.destroy', $currency->id)); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" onclick="return confirm('are you sure to delete ?')" class="btn btn-danger"><i class="fa fa-regular fa-trash-alt"></i></button>
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
    <!-- End Row -->

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Project\seo_multivendor_ecommerce\resources\views/admin/currency/index.blade.php ENDPATH**/ ?>