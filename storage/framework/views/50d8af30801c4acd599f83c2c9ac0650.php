<?php $__env->startSection('title','Digital Product page'); ?>
<?php $__env->startSection('body'); ?>
    <div class="row mt-5">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title text-bold"> Category Wise Discount </h3>
                    <a href="<?php echo e(route('category-wise-discount.create')); ?>" class="btn btn-primary my-1 text-center">+ADD</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">SL No</th>
                                <th class="border-bottom-0">Category</th>
                                <th class="border-bottom-0">Discount(%)</th>
                                <th class="border-bottom-0">Discount Date Range</th>
                                <th class="border-bottom-0">Status</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $discounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$discount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($key+1); ?></td>
                                        <td><?php echo e($discount->category->name ?? ''); ?></td>
                                        <td><?php echo e($discount->discount); ?></td>
                                        <td><?php echo e($discount->discount_date_range); ?></td>

                                        <td class="">
                                            <span class="badge bg-primary"><?php echo e($discount->status == 1 ? 'Active' : ''); ?></span>
                                            <span class="badge bg-info"><?php echo e($discount->status == 0 ? 'Inactive' : ''); ?></span>
                                        </td>

                                        <td class="d-flex">

                                            <a href="<?php echo e(route('category-wise-discount.edit', $discount->id)); ?>" class="btn btn-success btn-sm me-1">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="<?php echo e(route('category-wise-discount.delete', $discount->id)); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field("DELETE"); ?>
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete?');">
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

<?php echo $__env->make('seller.Layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\NAHID\seo_multivendor_ecommerce\resources\views/seller/category_wise_discount/index.blade.php ENDPATH**/ ?>