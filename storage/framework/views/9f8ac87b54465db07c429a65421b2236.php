<?php $__env->startSection('title','Show Seller '); ?>
<?php $__env->startSection('body'); ?>
    <div class="row mt-5">
        <div class="col">
            <div class="card">
                <div class="card-header row border-bottom">
                    <div class="col-6">
                        <h3 class="card-title">Product Details Table</h3>
                    </div>
                    <div class="col-6">
                        <a href="<?php echo e(route('product.index')); ?>" class="btn btn-success my-1 float-end mx-2 text-center">All Product</a>
                        <a href="<?php echo e(route('product.edit', $product->id)); ?>" class="btn btn-warning my-1 float-end mx-2 text-center">Edit</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 text-center shadow">
                            <img src="<?php echo e(asset($product->product_image ?? '')); ?>" alt="" class="img-fluid" width="300">
                            <p class="text-center">Product Image</p>
                        </div>
                        <div class="col-md-8 shadow text-center">
                            <?php if(isset($otherImages)): ?>
                            <?php $__currentLoopData = $otherImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $otherImage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <img src="<?php echo e(asset($otherImage)); ?>" alt="" class="m-1" width="200" height="200">
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            <p class="text-center my-2 fw-bold">Other Images</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header text-bold">Product variants</div>
                        <div class="card-body table-responsive">
                             <?php if($product_stocks): ?>
                             <table class="table table-bordered table-hover">
                                 <thead class="bg-info">
                                   <tr>
                                     <th scope="col">#</th>
                                     <th scope="col">Variant</th>
                                     <th scope="col">Price</th>
                                     <th scope="col">Quantity</th>
                                     <th scope="col">Photo</th>
                                   </tr>
                                 </thead>
                                 <tbody>
                                     <?php $__currentLoopData = $product_stocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id=>$variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <tr>
                                       <th scope="row"><?php echo e($id+1); ?></th>
                                       <td><?php echo e($variant->variant ?? 'N/A'); ?></td>
                                       <td><?php echo e($variant->price ?? 'N/A'); ?></td>
                                       <td><?php echo e($variant->qty); ?></td>
                                       <td><?php
                                        $c =   App\Models\Upload::find($variant->image);
                                        ?>
                                        <?php if($c != ''): ?>
                                        <img src="<?php echo e(asset($c->file)); ?>" alt="" width="80" height="80">
                                        <?php endif; ?>
                                    </td>
                                     </tr>
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </tbody>
                                </table>
                                <?php endif; ?>
                         </div>
                    </div>
                    <div class="card">
                        <div class="card-header text-bold"> Product Details</div>
                        <div class="card-body table-responsive">
                            <?php if(isset($product)): ?>

                            <table class="table table-bordered table-hover">
                                <thead class="bg-info">
                                    <tr>
                                        <th>Name</th>
                                        <th>Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th>Product Name</th>
                                    <td><?php echo e(ucfirst($product->name) ?? "N/A"); ?></td>
                                </tr>
                                <tr>
                                    <th>Slug</th>
                                    <td><?php echo e($product->slug ?? "N/A"); ?></td>
                                </tr>
                                <tr>
                                    <th>Product Type</th>
                                    <td><?php echo e($product->product_type ?? "N/A"); ?></td>
                                </tr>
                                <tr>
                                <tr>
                                    <th> Product Price</th>
                                    <td><?php echo e($product->product_price ?? "N/A"); ?></td>
                                </tr>
                                <?php if(isset($product->product_stock)): ?>
                                <tr>
                                    <th> Product Stock</th>
                                    <td><?php echo e($product->product_stock ?? "N/A"); ?></td>
                                </tr>
                                <?php endif; ?>

                                <tr>
                                    <th>Shipping Cost</th>
                                    <td><?php echo e($product->shipping_cost ?? "N/A"); ?></td>
                                </tr>
                                <tr>
                                    <th>Category</th>
                                    <td><?php echo e($product->category->name ?? "N/A"); ?></td>
                                </tr>

                                <tr>
                                    <th>Brand</th>
                                    <td><?php echo e($product->brand->name ?? "N/A"); ?></td>
                                </tr>

                                <tr>
                                    <th>Bar Code</th>
                                    <td><?php echo e($product->bar_code ?? "N/A"); ?></td>
                                </tr>
                                <tr>
                                    <th>Short Description</th>
                                    <td>
                                        <?php echo e($product->short_description ?? "N/A"); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <th>Logn Description</th>
                                    <td>
                                        <?php echo $product->long_description; ?>

                                    </td>
                                </tr>

                                <tr>
                                    <th>Refund</th>
                                    <th><?php echo e($product->refund ==1 ? 'Refundable': 'No Refundable'); ?></th>
                                </tr>
                                <tr>
                                    <th> Feature Status</th>
                                    <td><?php echo e($product->featured_status == 1 ? "Active" : "Inactive"); ?></td>
                                </tr>
                                <tr>
                                    <th> Tags</th>
                                <td><?php echo e($product->tags ?? "N/A"); ?></td>
                                </tr>

                                <tr>
                                    <th> Status</th>
                                    <td><?php echo e($product->status == 1 ? "active" : "inactive"); ?></td>
                                </tr>
                                
                            </tbody>
                            </table>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('seller.Layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\NAHID\seo_multivendor_ecommerce\resources\views/seller/product/show.blade.php ENDPATH**/ ?>