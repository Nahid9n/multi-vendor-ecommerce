<?php $__env->startSection('title','Customer Login'); ?>

<?php $__env->startSection('body'); ?>

    <!--login section start-->
    <section class="login-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="vec-area">
                        <div class="veclogo my-3">
                            <img src="<?php echo e((isset($websiteInfos->logo))? asset($websiteInfos->logo) : asset('dummy-logo.jpg')); ?>" alt="logo">
                        </div>
                        <div class="vec-content">
                            <h6>“The biggest and trusted <br>
                                e-commerce in Bangladesh”</h6>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="card rounded-5">
                        <div class="card-body">
                            <form action="<?php echo e(route('customer.register.store')); ?>" method="post">
                                <?php echo csrf_field(); ?>

                                <h4 class="fw-bold text-center">Customer Register</h4>
                                <div class="log-input">

                                <div class="form-group">
                                    <label for="name">Name<span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" value="<?php echo e(old('name')); ?>" required>
                                    <b><span class="text-danger"><?php echo e($errors->first('name')); ?></span></b>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email address<span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" autocomplete="off" value="<?php echo e(old('email')); ?>" required>
                                    <b><span class="text-danger"><?php echo e($errors->first('email')); ?></span></b>
                                </div>

                                <div class="form-group">
                                    <label for="name">Password<span class="text-danger">*</span></label>
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" autocomplete="new-password" value="<?php echo e(old('password')); ?>" required>
                                    <b><span class="text-danger"><?php echo e($errors->first('password')); ?></span></b>

                                </div>

                                <div class="form-group">
                                    <label for="name">Confirm Password<span class="text-danger">*</span></label>
                                    <input type="password" name="confirm_password" class="form-control" id="password" placeholder="Confirm Password" required>
                                    <b><span class="text-danger"><?php echo e($errors->first('confirm_password')); ?></span></b>
                                </div>
                                    <div class="sub">
                                        <button class="btn" type="submit">Register</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                        <div class="">
                            
                            <div class="an">
                                <p>Already have an account? <span>
                                        <a href="<?php echo e(route('customer.login.page')); ?>">Login</a>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--login section end-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Project\seo_multivendor_ecommerce\resources\views/customer/auth/register.blade.php ENDPATH**/ ?>