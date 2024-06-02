<?php $__env->startSection('title','Currency Add Page'); ?>
<?php $__env->startSection('body'); ?>
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Currency Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Currency</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row justify-content-center">
        <div class="col-lg-12 shadow">
            <div class="card shadow">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title text-bold">Add Currency Form</h3>
                    <a href="<?php echo e(route('currency.index')); ?>" class="btn btn-success my-1 float-end text-center">Currency Manage</a>
                </div>
                <div class="card-body">

                    <form action="<?php echo e(route('currency.store')); ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        <?php echo csrf_field(); ?>
                        <div class="row mb-4">
                            <label for="name" class="col-md-3 form-label">Name <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" value="<?php echo e(old('name')); ?>" name="name" id="name" placeholder="write your currency name" required type="text">
                                <span class="text-danger"><?php echo e($errors->has('name')?$errors->first('name'):''); ?></span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="symbol" class="col-md-3 form-label">symbol</label>
                            <div class="col-md-9">
                                <input class="form-control" value="<?php echo e(old('symbol')); ?>" name="symbol" id="symbol" placeholder="write your currency symbol" type="text">
                                <span class="text-danger"><?php echo e($errors->has('symbol')?$errors->first('symbol'):''); ?></span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="code" class="col-md-3 form-label">Code<span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" value="<?php echo e(old('code')); ?>" name="code" id="code" placeholder="write your currency code" required type="text">
                                <span class="text-danger"><?php echo e($errors->has('code')?$errors->first('code'):''); ?></span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="exchange_rate" class="col-md-3 form-label">Exchange rate(1 USD = ?)<span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" value="<?php echo e(old('exchange_rate')); ?>" id="exchange_rate" name="exchange_rate" placeholder="write your currency exchange rate" type="text" required>
                            </div>
                        </div>
                        <div class="row mb-4 d-flex form-group">
                            <div class="col-md-3">
                                <label class="" for="type">Publication Status</label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control select2 form-select" name="status" data-placeholder="Choose one">
                                    <option class="form-control" label="Choose one" disabled selected></option>
                                    <option value="1" selected>Active</option>
                                    <option value="0" >Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="radio" class="col-md-3 form-label"></label>
                            <div class="col-md-9">
                                <button class="btn btn-primary" type="submit">Create currency</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Project\seo_multivendor_ecommerce\resources\views/admin/currency/add.blade.php ENDPATH**/ ?>