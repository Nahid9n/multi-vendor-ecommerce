<?php $__env->startSection('title','All Products'); ?>

<?php $__env->startSection('body'); ?>
<style>
    #loader {
        height: 30px;
        width: 30px;
        display: flex;
        text-align: center;
        margin: 0 auto;
        display: none;
    }

    .modal-backdrop {
        z-index: 9999;
    }

    .breadcrumb {
        background: initial;
    }
</style>

<section class="home_all">
    <div class="container">
        <div class="row">
            <div class="home_alls">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All products</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<section class="product_all mt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-2 col-lg-3 col-4 pro_display">
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
                                            <input type="checkbox" id="<?php echo e($brand->id); ?>" onclick="filter()" class="form-check-input brandCheckBox" value="<?php echo e($brand->name); ?>">
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
            <div class="col-xl-10 col-lg-9 col-8">
                <p class="fw-bold text-center">ALL PRODUCTS</p>
                <hr>
                <!---section gallery top sell part3 start--->
                <div class="row" style="margin-bottom: 20px;">
                    <div class="items itemss">
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-xl-3 my-2 col-lg-4 col-md-6 col-sm-12" data-value="<?php echo e($product->id); ?>" title="<?php echo e($product->name); ?>">
                            <div class="card" style="height: 470px">
                                <div class="card-header border-0 p-0 m-0 text-center">
                                    <a href="<?php echo e(route('product.details',$product->slug)); ?>">
                                        <?php if($product->product_image != ''): ?>
                                        <img src="<?php echo e(asset($product->product_image)); ?>" class="p-0" width="200" height="200" alt="a" />
                                        <?php else: ?>
                                            <img src="<?php echo e(asset('/no_image.jpg')); ?>" class="p-0" width="200" height="200" alt="a" />
                                        <?php endif; ?>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <div class="ratings hidden-sm">
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
                                <?php if(isset($product->product_stock) && $product->product_select == 'single_product'): ?>
                                            <?php if($product->product_stock <=0): ?>
                                                <p class="text-danger">Out of Stock</p>
                                            <?php else: ?>
                                                <?php if($product->product_select): ?>
                                                <div class="ratings d-flex justify-content-end hidden-sm">
                                                    <!-- <abbr title="Add to cart" class="d-flex align-items-center">
                                                            <?php if($product->product_select == 'single_product'): ?>
                                                            <button onclick="productModalSingleProduct(<?php echo e($product->id); ?>)" class="productModal" id="<?php echo e($product->slug); ?>" href="javascript:void(0)" class="navbar-brand mx-2"><i class="price-text-color fa fa-2x fa-shopping-cart"></i></button>
                                                            <?php else: ?>
                                                            <button onclick="productModal(<?php echo e($product->id); ?>)" class="productModal" id="<?php echo e($product->slug); ?>" href="javascript:void(0)" class="navbar-brand mx-2"><i class="price-text-color fa fa-2x fa-shopping-cart"></i></button>
                                                            <?php endif; ?>

                                                    </abbr> -->
                                                    <!-- <abbr title="Add to Wishlist">
                                                        <?php if($product->product_select == 'single_product'): ?>
                                                            <a class="addToWish navbar-brand mx-2" href="<?php echo e(route('add-to-wishlist', $product->slug )); ?>"><i class="price-text-color fa fa-1x fa-heart"></i></a>
                                                        <?php else: ?>
                                                            <button onclick="productModalWish(<?php echo e($product->id); ?>)" class="productModal navbar-brand mx-2" id="<?php echo e($product->slug); ?>" href="javascript:void(0)"><i class="price-text-color fa fa-1x fa-heart"></i></button>
                                                        <?php endif; ?>
                                                    </abbr> -->
                                                </div>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <?php if(count($products) != 0 ): ?>
                        <div style="margin: 0 auto; width: 100%; text-align: center;">
                            <button id="see_more" class="loginBtn">See more</button>
                            <img id="loader" src="<?php echo e(asset('website/assets/image/loader.gif')); ?>">
                        </div>
                    <?php else: ?>
                        <?php echo $__env->make('empty-space', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>


                </div>
                <!---section gallery top sell part3 end--->
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\NAHID\seo_multivendor_ecommerce\resources\views/website/product/allProducts.blade.php ENDPATH**/ ?>