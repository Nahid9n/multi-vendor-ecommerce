<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Single File Selection </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <?php if(auth()->user()->role == 'seller'): ?>
            <form action="<?php echo e(route('seller.file.save.selection.single')); ?>" method="POST" id="singleFileForm">
            <?php else: ?>
               <form action="<?php echo e(route('admin.file.save.selection.single')); ?>" method="POST" id="singleFileForm">
            <?php endif; ?>
            <?php echo csrf_field(); ?>
            <input type="hidden" name="input_name" value="<?php echo e($name ?? null); ?>">
            <div class="modal-body">
                <div class="row">
                <?php $__empty_1 = true; $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="card col-md-2">
                    <div class="card-header my-2">
                        <input class="form-check-input item-checkbox btn-checkbox checked_btn" name="single_image" value="<?php echo e($file->id); ?>"
                            type="checkbox">
                        <div class="dropdown-file btn-lg">
                            <a class="dropdown-link" data-bs-toggle="dropdown">
                                <i class="fa fa-solid fa-bars"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="http://127.0.0.1:8000/<?php echo e($file->file); ?>" target="_blank"
                                    download="<?php echo e($file->file_name); ?>" class="dropdown-item">
                                    <i class="fa fa-download mr-2"></i>
                                    <span>Download</span>
                                </a>
                                <a href="javascript:void(0)" class="dropdown-item" onclick="copyUrl(this)"
                                    data-url="http://127.0.0.1:8000/<?php echo e($file->file); ?>">
                                    <i class="fa fa-clipboard mr-2"></i>
                                    <span>Copy Link</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0 m-0">
                        <a class="fileCheck" href="#" id="<?php echo e($file->id); ?>">
                            <img class="p-0 m-0" src="<?php echo e(asset($file->file)); ?>" alt="" width="250">
                        </a>
                    </div>
                    <div class="card-footer ps-0 text-start">
                        <p class="py-0 my-0"><?php echo e($file->file_name); ?></p>
                        <small><?php echo e(round($file->file_size, 2)); ?> KB</small>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-12 text-center">
                    <p>No Files Found</p>
                </div>
                <?php endif; ?>

                <div class="col-12 text-center">
                    <div class="pagination-links">
                        <?php echo e($files->links()); ?>

                    </div>
                </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm">Save</button>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).on('click', '.fileCheck', function(e) {
        $('.checked_btn').not(this).prop('checked', false);
        $(this).parent().parent().find('input').prop('checked', true);
    });

    $(document).on('change', '.checked_btn', function(e) {
        $('.checked_btn').not(this).prop('checked', false);
        $(this).parent().parent().find('input').prop('checked', true);
    });

</script>
<?php /**PATH D:\NAHID\seo_multivendor_ecommerce\resources\views/seller/product/single_file_modal.blade.php ENDPATH**/ ?>