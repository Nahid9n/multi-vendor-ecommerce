<?php $__env->startSection('title','Upload File'); ?>
<?php $__env->startSection('body'); ?>
    <div class="row mt-5">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title text-bold">Drag & drop your files</h3>
                    <a href="<?php echo e(route('admin.file.manage')); ?>" class="btn btn-primary my-1 mx-2 text-center">All Uploads</a>
                </div>
                <div class="card-body text-center">
                    <form action="<?php echo e(route('admin.file.store')); ?>" class="dropzone" id="myDropzone" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <div class="gallery mt-2">
                                    <input type="hidden" name="uploaded_by" value="<?php echo e(auth()->user()->name); ?>" readonly>
                                    <input type="file" name="files[]" id="gallery-photo-add" class="dropify form-control" multiple required>

                                </div>
                                <div class="my-2">
                                    <button class="btn btn-success btn-lg" type="submit">Upload</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<script>
    $(document).ready(function() {
        Dropzone.autoDiscover = false;

        $("#myDropzone").dropzone({
            url: "<?php echo e(route('admin.file.store')); ?>",
            maxFilesize: 2, // MB
            maxFiles: 5,
            acceptedFiles: 'image/*',
            addRemoveLinks: true,
            init: function() {
                this.on("addedfile", function(file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#preview').append('<img src="' + e.target.result + '">');
                    };
                    reader.readAsDataURL(file);
                });

                this.on("removedfile", function(file) {
                    $('#preview img[src="' + file.dataURL + '"]').remove();
                });
            }
        });
    });
</script>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Project\Seo Mutlivendor Home\seo_multivendor_ecommerce\resources\views/admin/file-upload/create.blade.php ENDPATH**/ ?>