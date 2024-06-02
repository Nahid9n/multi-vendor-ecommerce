<?php $__env->startSection('title','Brand page'); ?>
<?php $__env->startSection('body'); ?>
    <div class="row row-sm mt-5">
        <div class="col-lg-12">
            <div class="card">
                <div class="border-bottom m-3">
                    <div class="row">
                        <div class="card-header border-bottom justify-content-between">
                            <h3 class="card-title text-bold">Brand Table</h3>
                            <a href="<?php echo e(route('brands.create')); ?>" class="btn btn-primary my-1 text-center">+ADD</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive export-table">
                        <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom  w-100">
                            <thead>
                            <tr class="text-center">
                                <th class="border-bottom-0">SL</th>
                                <th class="border-bottom-0">Logo</th>
                                <th class="border-bottom-0">Name</th>
                                <th class="text-center border-bottom-0">Featured Status</th>
                                <th class="border-bottom-0">Status</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $id=0;
                                ?>
                            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="text-center">
                                <td><?php echo e(++$id); ?></td>
                                <td><img style="max-width: 50px; heightL auto" src="<?php echo e(asset($brand->logo)); ?>" alt=""></td>
                                <td><?php echo e($brand->name); ?></td>
                                <td class="text-center">
                                    <form action="<?php echo e(route('admin.brand.featured.status.update',$brand->id)); ?>" class="main-toggle-group" method="post">
                                        <?php echo csrf_field(); ?>
                                        <div class="row justify-content-center">
                                            <div class=" text-center col-4 p-2 rounded-5">
                                                <input id="feature_product<?php echo e($key); ?>" class="toggle toggle-danger" value="1" name="featured_status" <?php echo e($brand->featured_status == 1 ? 'checked':''); ?> onclick="this.form.submit()" type="checkbox"/>
                                                <label for="feature_product<?php echo e($key); ?>" class="label-primary"></label>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                                <td><?php echo e($brand->status == 1 ? 'active':'Inactive'); ?></td>
                                <td class="justify-content-center d-flex text-center">
                                    <a href="<?php echo e(route('brands.edit',$brand->id)); ?>" class="btn btn-success my-2 me-1"><i class="fa fa-edit"></i></a>
                                    <form action="<?php echo e(route('brands.destroy',$brand->id)); ?>" method="post">
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



<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Project\seo_multivendor_ecommerce\resources\views/admin/product/brand/index.blade.php ENDPATH**/ ?>