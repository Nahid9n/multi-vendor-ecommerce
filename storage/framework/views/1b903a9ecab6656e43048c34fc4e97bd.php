<div class="position-relative d-flex">
    <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="imgs m-1">
            <span class="btn btn-danger btn-sm position-absolute rmSingleimg" id="" style="float: left">&times;</span>
            <img width="100" height="100" class="img" src="<?php echo e(asset($image->file)); ?>" alt="">
            <p><small><?php echo e($image->file_name); ?></small></p>
        </div>
        <input type="hidden" id="multipleImgItemId" name="image[]" value="<?php echo e($image->id); ?>" required>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<?php /**PATH D:\NAHID\seo_multivendor_ecommerce\resources\views/admin/file-upload/multiple.blade.php ENDPATH**/ ?>