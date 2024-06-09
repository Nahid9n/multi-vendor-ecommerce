<div class="position-relative d-flex singleRemove" id="imageContainer">
    <div class="imgs m-1">
        <span class="btn btn-danger btn-sm position-absolute rmSingleimg" id="<?php echo e($image->id); ?>" style="float: left">&times;</span>
        <img width="100" height="100" class="img" src="<?php echo e(asset($image->file)); ?>" alt="">
        <p><small><?php echo e($image->file_name); ?></small></p>
    </div>
    <input type="hidden"  name="<?php echo e($input_name ?? null); ?>" value="<?php echo e($image->id); ?>" required>
</div>

<?php /**PATH F:\Project\Seo Mutlivendor Home\seo_multivendor_ecommerce\resources\views/admin/file-upload/single.blade.php ENDPATH**/ ?>