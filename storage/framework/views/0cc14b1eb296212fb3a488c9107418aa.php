<?php $__env->startSection('title', 'category page'); ?>
<?php $__env->startSection('body'); ?>
<?php echo $__env->make('modal.common', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="page-header">
        <div>
            <h1 class="page-title">Digital Category Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Category</li>
            </ol>
        </div>
    </div>
    <div class="row row-deck">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title">Create New Category</h3>
                    <a href="<?php echo e(route('digitals.index')); ?>" class="btn btn-success my-1 float-end mx-2 text-center">All
                        Category</a>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="<?php echo e(route('digitals.store')); ?>" method="post"
                        enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="type" value="digital">
                        <div class="row mb-4">
                            <label for="name" class="col-md-3 form-label">Category Name <span
                                    class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" id="name" value="<?php echo e(old('name')); ?>"
                                    name="name" placeholder="Enter your category name" type="text" required>
                                <b><span class="text-danger"><?php echo e($errors->first('name')); ?></span></b>
                            </div>
                        </div>
                        <div class="row mb-4 d-flex form-group">
                            <div class="col-md-3">
                                <label class="form-label" for="type">Parent Category<span
                                        class="text-danger">*</span></label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control select2 select2-show-search form-select" name="parent_id"
                                    data-placeholder="Choose one" required>
                                    <option value="0" class="form-control" >No Parent</option>


                                    <?php $__empty_1 = true; $__currentLoopData = $parent_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <?php
                                        $dashes = '';
                                    ?>

                                    <?php for($i=1; $i<=$parent_category->level; $i++): ?>

                                    <?php
                                         $dashes = str_repeat('-', $i);
                                    ?>
                                    <?php endfor; ?>
                                        <option value="<?php echo e($parent_category->id); ?>"><?php echo e($dashes); ?> <?php echo e($parent_category->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        
                                    <?php endif; ?>
                                </select>
                                <b><span class="text-danger"><?php echo e($errors->first('parent_id')); ?></span></b>

                            </div>
                        </div>

                        

                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label">Banner</label>
                            <div class="col-md-9 test_class">
                                <div class="input-group openImageModal" data-multiple="false" data-inputname="banner">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                    </div>
                                    <div class="form-control" >Choose file
                                    </div>
                                </div>

                                <div class="row d-flex" id="banner"> </div>
                                <b><span class="text-danger"><?php echo e($errors->first('banner')); ?></span></b>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label">Icon</label>
                            <div class="col-md-9 test_class">
                                <div class="input-group openImageModal" data-multiple="false" data-inputname="icon">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                    </div>
                                    <div class="form-control" >Choose file
                                    </div>
                                </div>

                                <div class="row d-flex" id="icon"> </div>
                                <b><span class="text-danger"><?php echo e($errors->first('icon')); ?></span></b>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label">Cover</label>
                            <div class="col-md-9 test_class">
                                <div class="input-group openImageModal" data-multiple="false" data-inputname="cover">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                    </div>
                                    <div class="form-control" >Choose file
                                    </div>
                                </div>

                                <div class="row d-flex" id="cover"> </div>
                                <b><span class="text-danger"><?php echo e($errors->first('cover')); ?></span></b>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="meta" class="col-md-3 form-label">Meta Title </label>
                            <div class="col-md-9">
                                <input class="form-control" value="<?php echo e(old('meta')); ?>" id="meta" name="meta"
                                    placeholder="Enter Meta Title" type="text">

                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="metaDescription" class="col-md-3 form-label">Meta Description </label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="metaDescription" name="metaDescription" placeholder="Enter Meta Description"
                                    type="text"><?php echo e(old('metaDescription')); ?></textarea>

                            </div>
                        </div>
                        <div class="row mb-4 d-flex form-group">
                            <div class="col-md-3">
                                <label class="form-label" for="type">Publication Status</label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control select2 form-select" name="status"
                                    data-placeholder="Choose one">
                                    <option class="form-control" label="Choose one" disabled selected></option>
                                    <option selected value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary px-4 float-end" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Project\seo_multivendor_ecommerce\resources\views/admin/product/category/digital/add.blade.php ENDPATH**/ ?>