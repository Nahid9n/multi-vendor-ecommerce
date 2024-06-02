<?php $__env->startSection('title',' category page'); ?>
<?php $__env->startSection('body'); ?>
    <div class="row row-sm mt-5">
        <div class="col-lg-12">
            <div class="card">
                <div class="border-bottom m-3">
                    <div class="row">
                        <div class="card-header border-bottom justify-content-between">
                            <h3 class="card-title text-bold">Category Table</h3>
                            <a href="<?php echo e(route('digitals.create')); ?>" class="btn btn-primary my-1 text-center">+ADD</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive export-table">
                        <table id="file-datatable" class="table table-bordered text-nowrap text-center key-buttons border-bottom  w-100">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">SL No</th>
                                <th class="border-bottom-0">Name</th>
                                <th class="border-bottom-0">Banner</th>
                                <th class="border-bottom-0">Icon</th>
                                <th class="border-bottom-0">Cover</th>
                                <th class="text-center border-bottom-0">Featured Status</th>
                                <th class="border-bottom-0">Status</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($category->name); ?></td>
                                    <td><img width="50" height="50" src="<?php echo e(asset($category->banner)); ?>" alt=""></td>
                                    <td><img width="50" height="50" class="img-fluid" src="<?php echo e(asset($category->icon)); ?>" alt=""></td>
                                    <td><img width="50" height="50" src="<?php echo e(asset($category->cover)); ?>" alt=""></td>
                                    <td class="text-center">
                                        <form action="<?php echo e(route('admin.category.featured.status.update',$category->id)); ?>" class="main-toggle-group" method="post">
                                            <?php echo csrf_field(); ?>
                                            <div class="row justify-content-center">
                                                <div class=" text-center col-4 p-2 rounded-5">
                                                    <input id="feature_product<?php echo e($key); ?>" class="toggle toggle-secondary my-1 on " value="1" name="featured_status" <?php echo e($category->featured_status == 1 ? 'checked':''); ?> onclick="this.form.submit()" type="checkbox"/>
                                                    <label for="feature_product<?php echo e($key); ?>" class="label-primary"></label>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                    <td><?php echo e($category->status == 1 ? 'active':'Inactive'); ?></td>
                                    <td class="d-flex text-center">
                                        <a href="<?php echo e(route('digitals.edit',$category->id)); ?>" class="btn btn-success my-2 me-1"><i class="fa fa-edit"></i></a>
                                        <form action="<?php echo e(route('digitals.destroy',$category->id)); ?>" method="post">
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
    <!-- End Row -->

<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Project\seo_multivendor_ecommerce\resources\views/admin/product/category/digital/index.blade.php ENDPATH**/ ?>