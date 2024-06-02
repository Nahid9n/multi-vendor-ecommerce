<?php $__env->startSection('title','Category Page'); ?>
<?php $__env->startSection('body'); ?>
<section class="product_all mt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <!---section gallery top sell part3 start--->

                <div class="row justify-content-center">
                    <div class="col-xl-10 col-lg-10">
                        <section class="home_all">
                            <div class="row">
                                <div class="home_alls">
                                    <ul>
                                        <li><a target="blank" href="<?php echo e(route('home')); ?>">Home</a></li>
                                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                        <li><a target="blank" href="">All Categories</a></li>
                                    </ul>
                                </div>
                            </div>
                        </section>
                        <p class="" style="font-size: 16px; font-weight: 700; line-height: 19px; color:#000000; margin-left: 40%; margin-bottom: 10px;">ALL CATEGORIES</p>
                        <hr>
                        <!---section gallery top sell part3 start--->
                            <div class="row" style="margin-bottom: 20px;">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 colsm6">
                                    <div class="card card-body text-center mb-5" style="height: 180px;">
                                        <div class="m-0 p-0">
                                            <a href="<?php echo e(route('product.by.category',$category->name)); ?>">
                                                <?php if($category->banner !=''): ?>
                                                    <img src="<?php echo e(asset($category->banner)); ?>" width="100" height="100" class="p-0" alt="a" />
                                                <?php else: ?>
                                                    <img src="<?php echo e(asset('/no_image.jpg')); ?>" width="100" height="100" class="p-0" alt="a" />

                                                <?php endif; ?>
                                            </a>
                                        </div>
                                        <div class="info">
                                            <a class="nav-link" href="<?php echo e(route('product.by.category',$category->name)); ?>"><?php echo e($category->name); ?></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="row justify-content-center">
                                <?php echo e($categories->links()); ?>

                            </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </section>
    <!--product_all section end-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Project\seo_multivendor_ecommerce\resources\views/website/allCategories.blade.php ENDPATH**/ ?>