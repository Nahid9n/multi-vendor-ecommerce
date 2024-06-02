<?php $__env->startSection('title', 'Edit Coupon Page'); ?>
<?php $__env->startSection('body'); ?>
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Coupon Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Coupon</li>
            </ol>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-12 shadow">
            <div class="card shadow">
                <div class="card-header justify-content-between border-bottom">
                    <h3 class="card-title text-bold">Edit Coupon Form</h3>
                    <a href="<?php echo e(route('admin-coupon.index')); ?>" class="btn text-white px-5 btn-primary">All Coupon</a>
                </div>
                <div class="card-body">
                    <div class="row mb-5">
                        <h4 class="col-md-8 offset-md-2 text-center">Coupon Information Update</h4>
                        <div class="col-md-8 offset-md-2">
                            <select name="coupon_type" class="form-control" required>
                                <option value="blank" disabled>Select One</option>
                                <option value="product" <?php echo e($coupon->coupon_type == 'product' ? 'selected':'hidden'); ?>>For Products</option>
                                <option value="total_order" <?php echo e($coupon->coupon_type == 'total_order' ? 'selected':'hidden'); ?>>For Total Orders</option>
                            </select>
                        </div>
                    </div>
                    <div class="coupon-item" id="blank-tab"></div>
                    <?php if($coupon->coupon_type == 'product'): ?>
                    <div class="" id="product-tab">
                        <form action="<?php echo e(route('admin-coupon.product.update',$coupon->id)); ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('put'); ?>
                        <h4>Add Product Coupon</h4>
                        <hr class="mt-3">
                        <input type="hidden" name="coupon_type" value="product" readonly>
                            <div class="row mb-4">
                            <label for="coupon_code" class="col-md-3 form-label">Coupon Code <span
                                class="text-danger">*</span></label>
                                <div class="col-md-9">
                                    <input class="form-control" value="<?php echo e($coupon->coupon_code); ?>" name="coupon_code"
                                        id="coupon_code" placeholder="Coupon Number" required type="text">
                                    <b></b><span class="text-danger"><?php echo e($errors->first('coupon_code')); ?></span></b>
                                </div>
                            </div>
                            <div class="row mb-4 d-flex form-group">
                                <div class="col-md-3">
                                    <label class="form-label" for="type">Product <span
                                            class="text-danger">*</span></label>
                                </div>
                                <div class="col-md-9">
                                    <select class="form-control select2 select2-show-search form-select" data-placeholder="Select Product" name="product_id" required>
                                        <option class="form-control" label="Choose one" disabled selected>Select Prodcut</option>
                                        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <option value="<?php echo e($product->id); ?>" <?php echo e($coupon->product_id == $product->id ? 'selected' : ''); ?>><?php echo e($product->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <option class="text-center text-danger"> --No Product--</option>
                                        <?php endif; ?>
                                    </select>
                                    <b><span class="text-danger"><?php echo e($errors->first('product')); ?></span></b>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="date" class="col-md-3 form-label">Date Range<span
                                        class="text-danger">*</span></label>
                                <div class="col-md-9">
                                    <input class="form-control" value="<?php echo e($coupon->date_range); ?>" type="text" name="daterange"
                                         id="date" required>
                                    <b></b><span class="text-danger"><?php echo e($errors->first('daterange')); ?></span></b>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="discount" class="col-md-3 form-label">Discount<span
                                        class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <input class="form-control" value="<?php echo e($coupon->discount); ?>" name="discount" id="discount"
                                        placeholder="discount" required type="number">
                                    <b></b><span class="text-danger"><?php echo e($errors->first('discount')); ?></span></b>
                                </div>
                                <div class="col-md-3">
                                    <select name="discount_status" id="" class="form-control">
                                        <option value="0" <?php echo e($coupon->discount_status ==  0 ?  'selected':''); ?>>Amount</option>
                                        <option value="1" <?php echo e($coupon->discount_status ==  1 ?  'selected':''); ?>>Percent</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4 d-flex form-group">
                                <div class="col-md-3">
                                    <label class="form-label" for="type">Publication Status</label>
                                </div>
                                <div class="col-md-9">
                                    <select class="form-control select2 form-select" name="status">
                                        <option value="1" <?php echo e($coupon->status ==  1 ?  'selected':''); ?>>Active</option>
                                        <option value="0" <?php echo e($coupon->status ==  0 ?  'selected':''); ?>>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="radio" class="col-md-3 form-label"></label>
                                <div class="col-md-9">
                                    <button class="btn btn-primary float-end" type="submit">Submit</button>
                                </div>
                            </div>
                     </form>
                    </div>
                    <?php endif; ?>
                    <?php if($coupon->coupon_type == 'total_order'): ?>
                    <div class="" id="totalOrder-tab">
                        <form action="<?php echo e(route('admin-coupon.orders.update',$coupon->id)); ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('put'); ?>
                            <h4>Add Total Orders Coupon</h4>
                            <hr class="mt-3">
                            <input type="hidden" name="coupon_type" value="total_order" readonly>
                            <div class="row mb-4">
                                <label for="coupon_code" class="col-md-3 form-label">Coupon Code <span
                                        class="text-danger">*</span></label>
                                <div class="col-md-9">
                                    <input class="form-control" value="<?php echo e($coupon->coupon_code); ?>" name="coupon_code"
                                        id="coupon_code" placeholder="Coupon Number" required type="text">
                                    <b></b><span class="text-danger"><?php echo e($errors->first('coupon_code')); ?></span></b>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="min_shopping" class="col-md-3 form-label">Minimum Shopping<span
                                        class="text-danger">*</span></label>
                                <div class="col-md-9">
                                    <input type="number" class="form-control" value="<?php echo e($coupon->min_shopping); ?>" name="min_shopping"
                                        id="min_shopping" placeholder="Minimum Shopping"   required>
                                    <b></b><span class="text-danger"><?php echo e($errors->first('min_shopping')); ?></span></b>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="discount" class="col-md-3 form-label">Discount<span
                                        class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <input class="form-control" value="<?php echo e($coupon->discount); ?>" name="discount" id="discount"
                                        placeholder="discount" required type="number">
                                    <b></b><span class="text-danger"><?php echo e($errors->first('discount')); ?></span></b>
                                </div>
                                <div class="col-md-3">
                                    <select name="discount_status" id="" class="form-control">
                                        <option value="0" <?php echo e($coupon->discount_status ==  0 ?  'selected':''); ?>>Amount</option>
                                        <option value="1" <?php echo e($coupon->discount_status ==  1 ?  'selected':''); ?>>Percent</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="min_shopping" class="col-md-3 form-label">Maximum Discount Amount<span
                                        class="text-danger">*</span></label>
                                <div class="col-md-9">
                                    <input type="number" class="form-control" value="<?php echo e($coupon->max_discount_amount); ?>" name="max_discount_amount"
                                        id="min_shopping" placeholder="Maximum Discount Amount" required>
                                    <b></b><span class="text-danger"><?php echo e($errors->first('max_discount_amount')); ?></span></b>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="date" class="col-md-3 form-label">Date Range<span
                                        class="text-danger">*</span></label>
                                <div class="col-md-9">
                                    <input class="form-control" value="<?php echo e($coupon->date_range); ?>" type="text" name="daterange"
                                      id="date" required>
                                    <b></b><span class="text-danger"><?php echo e($errors->first('daterange')); ?></span></b>
                                </div>
                            </div>
                            <div class="row mb-4 d-flex form-group">
                                <div class="col-md-3">
                                    <label class="form-label" for="type">Publication Status</label>
                                </div>
                                <div class="col-md-9">
                                    <select class="form-control select2 form-select" name="status">
                                        <option value="1" <?php echo e($coupon->status ==  1 ?  'selected':''); ?>>Active</option>
                                        <option value="0" <?php echo e($coupon->status ==  0 ?  'selected':''); ?>>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="radio" class="col-md-3 form-label"></label>
                                <div class="col-md-9">
                                    <button class="btn btn-primary float-end" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script>
        $(function() {
            $('input[name="daterange"]').daterangepicker({
                opens: 'left'
            }, function(start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end
                    .format('YYYY-MM-DD'));
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Project\seo_multivendor_ecommerce\resources\views/admin/marketing/coupon/edit.blade.php ENDPATH**/ ?>