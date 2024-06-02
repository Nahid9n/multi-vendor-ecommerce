<?php $__env->startSection('title', 'Edit Page'); ?>
<?php $__env->startSection('body'); ?>
    <?php echo $__env->make('modal.common', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row justify-content-center">
        <div class="col-lg-12 shadow">
            <div class="card shadow">
                <div class="page-header">
                    <div>
                        <h1 class="page-title">Website Setting Module</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="<?php echo e(route('seller.shop-setting.index')); ?>">Shop</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Update Shop Setting Form</li>
                        </ol>
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('seller.shop-setting.update',$shop_setting->id)); ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label" >  </label>
                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label">Logo</label>
                            <div class="col-md-9 test_class">
                                <div class="input-group openImageModal" data-multiple="false" data-inputname="logo">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                    </div>
                                    <div class="form-control bannerFile-amount" id="logoFileAmount">Choose file
                                    </div>
                                </div>

                                <div class="row d-flex" id="logo">
                                    <div class="position-relative d-flex" id="imageContainer">
                                        <div class="imgs m-1">
                                            <?php if($shop_setting->logo != ''): ?>
                                                <span class="btn btn-danger btn-sm position-absolute rmSingleimg" id="" style="float: left">&times;</span>
                                                <img width="250" height="150" class="img" src="<?php echo e(asset($shop_setting->logo)); ?>" alt="">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <b><span class="text-danger"><?php echo e($errors->first('logo')); ?></span></b>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label">Banner</label>
                            <div class="col-md-9 test_class">
                                <div class="input-group openImageModal" data-multiple="false" data-inputname="banner">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                    </div>
                                    <div class="form-control bannerFile-amount" id="bannerFileAmount">Choose file
                                    </div>
                                </div>

                                <div class="row d-flex" id="banner">
                                    <div class="position-relative d-flex" id="imageContainer">
                                        <div class="imgs m-1">
                                            <?php if($shop_setting->banner != ''): ?>
                                                <span class="btn btn-danger btn-sm position-absolute rmSingleimg" id="" style="float: left">&times;</span>
                                                <img width="250" height="150" class="img" src="<?php echo e(asset($shop_setting->banner)); ?>" alt="">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
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
                                    <div class="form-control bannerFile-amount" id="iconFileAmount">Choose file
                                    </div>
                                </div>

                                <div class="row d-flex" id="icon">
                                    <div class="position-relative d-flex" id="imageContainer">
                                        <div class="imgs m-1">
                                            <?php if($shop_setting->icon != ''): ?>
                                                <span class="btn btn-danger btn-sm position-absolute rmSingleimg" id="" style="float: left">&times;</span>
                                                <img width="250" height="150" class="img" src="<?php echo e(asset($shop_setting->icon)); ?>" alt="">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <b><span class="text-danger"><?php echo e($errors->first('icon')); ?></span></b>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="slogan" class="col-md-3 form-label">Shop Name <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input disabled class="form-control" value="<?php echo e($shop_setting->shop_setting->shop_name); ?>" id="shop_name" name="shop_name" placeholder="Shop Name" type="text">
                                <b><span class="text-danger"><?php echo e($errors->first('colors')); ?></span></b>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="email" class="col-md-3 form-label">Email Address</label>
                            <div class="col-md-9">
                                <input disabled class="form-control" value="<?php echo e(auth()->user()->email); ?>" id="email" name="email" placeholder="email address" type="email">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="slogan" class="col-md-3 form-label">Motto</label>
                            <div class="col-md-9">
                                <input class="form-control" value="<?php echo e($shop_setting->slogan); ?>" id="slogan" name="slogan" placeholder="write your Motto" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="address" class="col-md-3 form-label">Meta Desctiption</label>
                            <div class="col-md-9">
                                <textarea name="meta_description" class="form-control" id="" placeholder="Descriptions"><?php echo e($shop_setting->meta_description); ?></textarea>
                            </div>
                            <div class="row mb-4">
                                <label for="address" class="col-md-3 form-label">Meta</label>
                                <div class="col-md-9">
                                    <input class="form-control" value="<?php echo e($shop_setting->meta); ?>" name="meta" id="address" placeholder="type Address" type="text">
                                </div>
                            </div>
                        <div class="row mb-4">
                            <label for="summernote" class="col-md-3 form-label">About Us</label>
                            <div class="col-md-9">
                                <textarea name="about" class="" id="summernote" cols="30"  rows="3"><?php echo e($shop_setting->about); ?></textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="facebook" class="col-md-3 form-label">Facebook address</label>
                            <div class="col-md-9">
                                <input class="form-control" value="<?php echo e($shop_setting->facebook); ?>" name="facebook" id="facebook" placeholder="Facebook address" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="twitter" class="col-md-3 form-label">Twitter address</label>
                            <div class="col-md-9">
                                <input class="form-control" value="<?php echo e($shop_setting->twitter); ?>" name="twitter" id="twitter" placeholder="Twitter address" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="LinkedIn" class="col-md-3 form-label">LinkedIn address</label>
                            <div class="col-md-9">
                                <input class="form-control" value="<?php echo e($shop_setting->linkedIn); ?>" name="linkedIn" id="LinkedIn" placeholder="LinkedIn address" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="youtube" class="col-md-3 form-label">Youtube</label>
                            <div class="col-md-9">
                                <input class="form-control" value="<?php echo e($shop_setting->youtube); ?>" name="youtube" id="youtube" placeholder="youtube address" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="map" class="col-md-3 form-label">Google Map</label>
                            <div class="col-md-9">
                                <input class="form-control" value="<?php echo e($shop_setting->map); ?>" name="map" id="map" placeholder="google map link" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="radio" class="col-md-3 form-label"></label>
                            <div class="col-md-9">
                                <button class="btn btn-primary float-end" type="submit">Update</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('seller.Layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\NAHID\seo_multivendor_ecommerce\resources\views/seller/shop_setting/edit.blade.php ENDPATH**/ ?>