<?php $__env->startSection('title','Product page'); ?>
<?php $__env->startSection('body'); ?>
    <div class="row mt-5">
        <div class="col">
            <div class="card">
                <div class="border-bottom m-3">
                    <div class="row">
                        <div class="card-header border-bottom justify-content-between">
                            <h3 class="card-title">All Product Table</h3>
                            <a href="<?php echo e(route('product.create')); ?>" class="btn btn-primary my-1 text-center">+ADD</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row my-2">
                        <div class="col-md-2">
                            <form  action="<?php echo e(route('admin.products.bulk.status.change')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <select id="activeBulkId" class="form-control text-center hidden" onchange="this.form.submit()" name="status" required>
                                    <option label="Select One">Select One</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                                <input class="statusIds" id="productstatusIds" type="hidden" name="product_id[]" onclick="checkedAndUncheckBulkStatusProduct()" value="">
                            </form>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="example3" class="table table-bordered text-nowrap text-center border-bottom">
                            <thead>
                            <tr>
                               <th class="border-bottom-0">

                               </th>
                               <th class="border-bottom-0">SL NO</th>
                                <th class="border-bottom-0">Name</th>
                                <th class="border-bottom-0">Category</th>
                                <th class="border-bottom-0">Brand </th>
                                <th class="border-bottom-0">Featured Status</th>
                                <th class="border-bottom-0">Product Status </th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id=>$product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="text-center">
                                    <td>
                                        <input class="checkboxProductId" type="checkbox" name="product_id[]" onclick="checkedAndUncheckBulkStatusProduct()" value="<?php echo e($product->id); ?>">
                                    </td>

                                    <td><?php echo e($id+1); ?></td>
                                    <td class="text-start"><?php echo e($product->name); ?></td>
                                    <td><?php echo e($product->category->name ?? 'N/A'); ?></td>
                                    <td><?php echo e($product->brand->name ?? 'N/A'); ?></td>

                                    <td ><?php echo e($product->featured_status == 1 ? 'Published' : 'Unpublished'); ?></td>
                                    <td>
                                        <span class="p-2 <?php echo e($product->status == 1 ? 'bg-success text-white' : 'bg-danger text-white'); ?>">
                                            <?php echo e($product->status == 1 ? 'Active' : 'Inactive'); ?>

                                        </span>

                                    </td>
                                    <td class="d-flex justify-content-center">
                                        <a href="<?php echo e(route('product.show', $product->id)); ?>" class="btn btn-success btn-sm me-1">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="<?php echo e(route('product.edit', $product->id)); ?>" class="btn btn-success btn-sm me-1">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="<?php echo e(route('product.delete', $product->id)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field("DELETE"); ?>
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this');">
                                                <i class="fa fa-trash"></i>
                                            </button>
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



<?php echo $__env->make('seller.Layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\NAHID\seo_multivendor_ecommerce\resources\views/seller/product/index.blade.php ENDPATH**/ ?>