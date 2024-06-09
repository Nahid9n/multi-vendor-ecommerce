<?php $__env->startSection('title','Website Setting Page'); ?>
<?php $__env->startSection('body'); ?>
<?php echo $__env->make('modal.common', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Website Setting Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Update Website Setting</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header row border-bottom">
                    <div class="col-6">
                        <h3 class="card-title">Website Details Information</h3>
                    </div>
                    <div class="col-6">
                        <a href="<?php echo e(route('website-settings.show',$websiteSetting->id)); ?>" class="btn btn-success my-1 float-end mx-2 text-center">Show Details</a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="<?php echo e(route('website-settings.update',$websiteSetting->id)); ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label">Logo </label>
                            <div class="col-md-9 test_class">
                                <div class="input-group openImageModal" data-multiple="false" data-inputname="logo">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                    </div>
                                    <div class="form-control" >Choose file
                                    </div>
                                </div>

                                <div class="row d-flex" id="logo">
                                    <div class="position-relative d-flex" id="imageContainer">
                                        <div class="imgs m-1">
                                            <?php if($websiteSetting->logo != ''): ?>
                                                <span class="btn btn-danger btn-sm position-absolute rmSingleimg" id="" style="float: left">&times;</span>
                                                <img width="400" height="100" class="img" src="<?php echo e(asset($websiteSetting->logo)); ?>" alt="">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <b><span class="text-danger"><?php echo e($errors->first('banner')); ?></span></b>
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

                                <div class="row d-flex" id="banner">
                                    <div class="position-relative d-flex" id="imageContainer">
                                        <div class="imgs m-1">
                                            <?php if($websiteSetting->banner != ''): ?>
                                                <span class="btn btn-danger btn-sm position-absolute rmSingleimg" id="" style="float: left">&times;</span>
                                                <img width="400" height="100" class="img" src="<?php echo e(asset($websiteSetting->banner)); ?>" alt="">
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
                                    <div class="form-control" >Choose file
                                    </div>
                                </div>

                                <div class="row d-flex" id="icon">
                                    <div class="position-relative d-flex" id="imageContainer">
                                        <div class="imgs m-1">
                                            <?php if($websiteSetting->icon != ''): ?>
                                                <span class="btn btn-danger btn-sm position-absolute rmSingleimg" id="" style="float: left">&times;</span>
                                                <img width="400" height="100" class="img" src="<?php echo e(asset($websiteSetting->icon)); ?>" alt="">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <b><span class="text-danger"><?php echo e($errors->first('icon')); ?></span></b>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="slogan" class="col-md-3 form-label">Motto</label>
                            <div class="col-md-9">
                                <input class="form-control" value="<?php echo e($websiteSetting->slogan); ?>" id="slogan" name="slogan" placeholder="write your website slogan" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="email" class="col-md-3 form-label">Email Address</label>
                            <div class="col-md-9">
                                <input class="form-control" value="<?php echo e($websiteSetting->email); ?>" id="email" name="email" placeholder="email address" type="email">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="mobile" class="col-md-3 form-label">Mobile Number</label>
                            <div class="col-md-9">
                                <input class="form-control" value="<?php echo e($websiteSetting->mobile); ?>" name="mobile" id="mobile" placeholder="Mobile Number" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="address" class="col-md-3 form-label">Address</label>
                            <div class="col-md-9">
                                <input class="form-control" value="<?php echo e($websiteSetting->email); ?>" name="address" id="address" placeholder="type Address" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="summernote" class="col-md-3 form-label">About Us</label>
                            <div class="col-md-9">
                                <textarea name="about" class="" id="summernote" cols="30"  rows="3"><?php echo e($websiteSetting->about); ?></textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="facebook" class="col-md-3 form-label">Facebook address</label>
                            <div class="col-md-9">
                                <input class="form-control" value="<?php echo e($websiteSetting->facebook); ?>" name="facebook" id="facebook" placeholder="Facebook address" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="twitter" class="col-md-3 form-label">Twitter address</label>
                            <div class="col-md-9">
                                <input class="form-control" value="<?php echo e($websiteSetting->twitter); ?>" name="twitter" id="twitter" placeholder="Twitter address" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="LinkedIn" class="col-md-3 form-label">LinkedIn address</label>
                            <div class="col-md-9">
                                <input class="form-control" value="<?php echo e($websiteSetting->linkedIn); ?>" name="linkedIn" id="LinkedIn" placeholder="LinkedIn address" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="youtube" class="col-md-3 form-label">Youtube</label>
                            <div class="col-md-9">
                                <input class="form-control" value="<?php echo e($websiteSetting->youtube); ?>" name="youtube" id="youtube" placeholder="youtube address" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="map" class="col-md-3 form-label">Google Map</label>
                            <div class="col-md-9">
                                <input class="form-control" value="<?php echo e($websiteSetting->map); ?>" name="map" id="map" placeholder="google map link" type="text">
                            </div>
                        </div>
                        <div class="row mb-4 d-flex form-group">
                            <div class="col-md-3">
                                <label class="" for="type">Publication Status</label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control select2 form-select" name="status" data-placeholder="Choose one">
                                    <option class="form-control" label="Choose one" disabled selected></option>
                                    <option value="1" <?php echo e($websiteSetting->status == 1 ? 'selected':''); ?> >Active</option>
                                    <option value="0" <?php echo e($websiteSetting->status == 0 ? 'selected':''); ?> >Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="radio" class="col-md-3 form-label"></label>
                            <div class="col-md-9">
                                <button class="btn btn-primary" type="submit">Update Website Info</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Project\Seo Mutlivendor Home\seo_multivendor_ecommerce\resources\views/admin/website-setting/edit.blade.php ENDPATH**/ ?>