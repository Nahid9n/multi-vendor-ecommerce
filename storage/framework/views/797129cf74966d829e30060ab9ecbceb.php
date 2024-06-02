<?php $__env->startSection('title','Add Product Page'); ?>
<?php $__env->startSection('body'); ?>
<div class="row mt-5">
    <div class="col">
        <div class="card">
            <div class="card-header border-bottom justify-content-between">
                <h3 class="card-title text-bold">Add New Digital Product</h3>
                <a href="<?php echo e(route('category-wise-discount.index')); ?>" class="btn btn-primary my-1 mx-2 text-center">All Category</a>
            </div>
            <div class="card-body">

                <form action="<?php echo e(route('category-wise-discount.store')); ?>" method="post" >
                    <?php echo csrf_field(); ?>
                    <div class="row mb-4">
                        <label for="category"  class="col-md-3 form-label">Category Name <span class="text-danger">*</span></label>
                        <div class="col-md-9 form-group">
                            <select name="category_id" class="form-control select2 select2-show-search" data-placeholder="Select Category" id="category" required>

                                <option value="" disabled selected> -- Select Category --</option>
                                <?php $__empty_1 = true; $__currentLoopData = $parent_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <?php
                                            $dashes = '';
                                        ?>

                                        <?php for($i=1; $i<=$parent_category->level; $i++): ?>

                                            <?php
                                                $dashes = str_repeat('-', $i);
                                            ?>
                                        <?php endfor; ?>
                                    <option value="<?php echo e($parent_category->id); ?>" <?php echo e(old('category_id') == $parent_category->id ? 'selected' : ''); ?>><?php echo e($dashes); ?> <?php echo e($parent_category->name); ?> </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <option class="text-center text-danger"> --No Category--</option>
                                <?php endif; ?>
                            </select>
                            <b><span class="text-danger"><?php echo e($errors->first('category_id')); ?></span></b>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for=""  class="col-md-3 form-label">Discount(%)<span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <input class="form-control" value="<?php echo e(old('discount')); ?>" name="discount" id="" placeholder="Number" type="number" min="0" required/>

                            <b><span class="text-danger"><?php echo e($errors->first('discount')); ?></span></b>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for=""  class="col-md-3 form-label">Discount Date Range<span class="text-danger">*</span></label>
                        <div class="col-md-9">

                            <input class="form-control" value="<?php echo e(old('datefilter')); ?>" name="datefilter" id=""type="text" placeholder="Select Date" required/>

                            <b><span class="text-danger"><?php echo e($errors->first('datefilter')); ?></span></b>
                        </div>
                    </div>
                    <div class="row mb-4 d-flex form-group">
                        <div class="col-md-3">
                            <label class="form-label" for="type">Status</label>
                        </div>
                        <div class="col-md-9">
                            <div class="material-switch">
                                <input id="feature_product" value="1" name="status" <?php echo e(old('featured_status') ? 'checked' : ''); ?> type="checkbox"/>
                                <label for="feature_product" class="label-primary"></label>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary float-end" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<script type="text/javascript">
    $(function() {

      $('input[name="datefilter"]').daterangepicker({
          autoUpdateInput: false,
          locale: {
              cancelLabel: 'Clear'
          }
      });

      $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
          $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
      });

      $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
          $(this).val('');
      });

    });
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('seller.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\NAHID\seo_multivendor_ecommerce\resources\views/seller/category_wise_discount/create.blade.php ENDPATH**/ ?>