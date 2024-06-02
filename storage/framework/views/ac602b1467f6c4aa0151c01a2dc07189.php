<?php $__env->startSection('title', 'Brand Product Page'); ?>

<?php $__env->startSection('body'); ?>

    
    <!--product_all section start-->
    <section class="product_all mt-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-2 col-lg-3 col-5 pro_display">
                    <div class="pro_all_sidebar">
                        <div class="brand_sidebar">
                            <ul>
                                <li class="comon">
                                    <a data-toggle="collapse" href="#categoryContent" aria-expanded="true" aria-controls="collapseExample">Category<i style="margin-left:40%;" class="fa fa-angle-up"></i></a>
                                    <div class="collapse show" id="categoryContent">
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="form-check">
                                                <input type="checkbox" id="<?php echo e($category->id); ?>" onclick="filter()" class="form-check-input categoryCheckBox" value="<?php echo e($category->name); ?>">
                                                <label class="form-check-label"><?php echo e($category->name); ?></label>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="brand_sidebar">
                            <ul>
                                <li class="comon">
                                    <a data-toggle="collapse" href="#brandContent" aria-expanded="true" aria-controls="collapseExample">Brand<i style="margin-left:40%;" class="fa fa-angle-up"></i></a>
                                    <div class="collapse show" id="brandContent">
                                        <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="form-check">
                                                <input type="checkbox" id="<?php echo e($brand->id); ?>" onclick="filter()" class="form-check-input brandCheckBox" <?php echo e($brand->name == $name ? 'checked':''); ?> value="<?php echo e($brand->name); ?>">
                                                <label class="form-check-label"><?php echo e($brand->name); ?></label>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        
                        <div class="brand_sidebar">
                            <ul>
                                <li class="comon">
                                    <a data-toggle="collapse" href="#colorContent" aria-expanded="true" aria-controls="collapseExample">Color<i style="margin-left:40%;" class="fa fa-angle-up"></i></a>
                                    <div class="collapse show" id="colorContent">
                                        <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="form-check">
                                                <input type="checkbox" onclick="filter()" class="form-check-input colorCheckBox" value="<?php echo e($color->code); ?>">
                                                <label class="form-check-label"><?php echo e($color->name); ?></label>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="brand_sidebar">
                            <ul>
                                <li class="comon">
                                    <a data-toggle="collapse" href="#priceRangeContent" aria-expanded="true" aria-controls="collapseExample">Price Range<i style="margin-left:40%;" class="fa fa-angle-up"></i></a>
                                    <div class="collapse show" id="priceRangeContent">

                                        <div class="container">
                                            <div class="form-group range_filter">
                                                <input style="display: block" type="range" class="custom-range" min="0" max="10000" step="1" onchange="filter()">
                                                <div style="display: grid; grid-template-columns: repeat(2, 1fr);">
                                                    <div class="text-left"><span>0</span>.<?php echo e($currency->symbol ?? ''); ?> </div>
                                                    <div class="text-right"><span id="maxRange">10000</span> .<?php echo e($currency->symbol ?? ''); ?></div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-10 col-lg-9 col-7">
                    <p class="fw-bold text-center">ALL PRODUCTS BY BRAND</p>
                    <hr>
                    <!---section gallery top sell part3 start--->
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="items itemss">
                            <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="col-xl-3 my-2 col-lg-4 col-md-6 col-sm-6 colsm6">
                                    <div class="card" style="height: 450px">
                                        <div class="card-header border-0 p-0 m-0 text-center">
                                            <a href="<?php echo e(route('product.details',$product->slug)); ?>">
                                                <?php if($product->product_image != ''): ?>
                                                    <img src="<?php echo e(asset($product->product_image)); ?>" class="p-0" width="200" height="200" alt="a" />
                                                <?php else: ?>
                                                    <img src="<?php echo e(asset('/no_image.jpg')); ?>" class="p-0" width="200"
                                                        height="200" alt="a" />
                                                <?php endif; ?>
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <div class="ratings hidden-sm ">
                                                <p>
                                                    <?php
                                                        $reviews =   App\Models\ProductReview::where('product_id',$product->id)->where('status',1)->get();
                                                        $review = 0;
                                                        $starTotal = 0;
                                                        if (count($reviews) != 0 ){
                                                            $starTotal = 0;
                                                            foreach ($reviews as $review){
                                                                $starTotal = $starTotal + $review->rating;
                                                            }
                                                            $review = $starTotal / count($reviews);
                                                        }
                                                    ?>
                                                    <?php if(isset($review)): ?>
                                                        <?php if($review == 0): ?>
                                                            <i class="fa fa-star text-secondary"></i>
                                                            <i class="fa fa-star text-secondary"></i>
                                                            <i class="fa fa-star text-secondary"></i>
                                                            <i class="fa fa-star text-secondary"></i>
                                                            <i class="fa fa-star text-secondary"></i>
                                                        <?php elseif($review >= 1 && $review < 2): ?>
                                                            <i class="fa fa-star text-danger"></i>
                                                            <i class="fa fa-star text-secondary"></i>
                                                            <i class="fa fa-star text-secondary"></i>
                                                            <i class="fa fa-star text-secondary"></i>
                                                            <i class="fa fa-star text-secondary"></i>
                                                        <?php elseif($review >= 2 && $review < 3): ?>
                                                            <i class="fa fa-star text-danger"></i>
                                                            <i class="fa fa-star text-danger"></i>
                                                            <i class="fa fa-star text-secondary"></i>
                                                            <i class="fa fa-star text-secondary"></i>
                                                            <i class="fa fa-star text-secondary"></i>
                                                        <?php elseif($review >= 3 && $review < 4): ?>
                                                            <i class="fa fa-star text-danger"></i>
                                                            <i class="fa fa-star text-danger"></i>
                                                            <i class="fa fa-star text-danger"></i>
                                                            <i class="fa fa-star text-secondary"></i>
                                                            <i class="fa fa-star text-secondary"></i>
                                                        <?php elseif($review >= 4 && $review < 5): ?>
                                                            <i class="fa fa-star text-danger"></i>
                                                            <i class="fa fa-star text-danger"></i>
                                                            <i class="fa fa-star text-danger"></i>
                                                            <i class="fa fa-star text-danger"></i>
                                                            <i class="fa fa-star text-secondary"></i>
                                                        <?php elseif($review == 5): ?>
                                                            <i class="fa fa-star text-danger"></i>
                                                            <i class="fa fa-star text-danger"></i>
                                                            <i class="fa fa-star text-danger"></i>
                                                            <i class="fa fa-star text-danger"></i>
                                                            <i class="fa fa-star text-danger"></i>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                    <span> (<?php echo e(count($reviews) ?? 0); ?>)</span>
                                                </p>
                                            </div>
                                            <a class="" href="<?php echo e(route('product.details',$product->slug)); ?>"><?php echo e(truncateWords($product->name, 14)); ?></a>
                                            <p class="">Category: <?php echo e($product->category->name); ?></p>
                                            <p class="">Brand: <?php echo e($product->brand->name); ?></p>
                                            <p class="">Price : <?php echo e($product->product_price); ?> <?php echo e($currency->symbol ?? ''); ?></p>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <p class="text-danger text-bold">No Product Found !!</p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="">
                            <p><?php echo e($products->links()); ?></p>
                        </div>
                    </div>
                    <!---section gallery top sell part3 end--->
                </div>
            </div>
        </div>
    </section>
    <!--product_all section end-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Project\seo_multivendor_ecommerce\resources\views/website/brand/product.blade.php ENDPATH**/ ?>