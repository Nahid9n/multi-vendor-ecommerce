<style>

.paddingCustom{
    padding-left: 0px;
    padding-right: 0px;
}

.card.m-0.card-body.categories{
    min-height: 153px;
    margin-bottom: 10px!important;
    background: #fbfbfb;
}

.brands{
    margin-bottom: 10px!important;
    border: 1px solid #0000001a;
    padding: 0 10px;
    border-radius: 2%;
}

.categories img{
    max-width: 100px;
}

.row_custom{
    display: grid;
    grid-template-columns: repeat(12, 1fr);
    grid-auto-rows: 1fr;
    grid-column-gap: 9px;
    grid-row-gap: 0;
    text-align: center;
}

.row_custom_two{
    display: grid;
    grid-template-columns: repeat(10, 1fr);
    grid-auto-rows: 1fr;
    grid-column-gap: 9px;
    grid-row-gap: 0;
    text-align: center;
}

.section_spacing{
    margin-top: 70px;
}


.top_seling_product .slick-prev{
    left: 40px;
    z-index: 1;
}

.top_seling_product .slick-next{
    right: 40px;
}

.slick-next{
    background: url("<?php echo e(asset('uploads/arrow-right.png')); ?>");
    background-repeat: no-repeat;
    background-size: 100%;
}

.slick-prev{
    background: url("<?php echo e(asset('uploads/arrow-left.png')); ?>");
    background-repeat: no-repeat;
    background-size: 100%;
}

.slick-prev:hover{
    background: url("<?php echo e(asset('uploads/arrow-left-hover.png')); ?>");
    background-repeat: no-repeat;
    background-size: 100%;
}

.slick-next:hover{
    background: url("<?php echo e(asset('uploads/arrow-right-hover.png')); ?>");
    background-repeat: no-repeat;
    background-size: 100%;
}

.top_seller_items{
    margin-bottom: 30px;
}

@media  (max-width: 1817px){
    .row_custom {
        grid-template-columns: repeat(10, 1fr);
    }
}
@media  (max-width: 1515px){
    .row_custom {
        grid-template-columns: repeat(8, 1fr);
    }
}

@media  (max-width: 1230px){
    .row_custom {
        grid-template-columns: repeat(4, 1fr);
    }
}

@media  (max-width: 820px){
    .row_custom {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media  (max-width: 575px){
    .row_custom {
        grid-template-columns: repeat(1, 1fr);
    }
}

@media  (max-width: 768px){
    .top_seller_items{
        max-width: 77%;
        margin: 0 auto;
    }
}
@media  (max-width: 575px){
    .top_seller_items{
        max-width: 100%;
    }
}


</style>
<div class="container-fluid">
<!--Categories start-->

<section class="section_spacing">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 pb-10 paddingCustom">
                <div class="row">
                    <div class="col-lg-6 text-left"><h4>Feature Categories</h4></div>
                    <div class="col-lg-6 text-right"><a href="<?php echo e(route('all-categories')); ?>"><p>View all</p></a></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 paddingCustom">
                <div class="row_custom">

                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="">
                        <div class="card m-0 card-body" style="height: 200px">
                            <div class="">
                                <a href="<?php echo e(route('product.by.category',$category->name)); ?>">
                                    <?php if($category->banner != ''): ?>
                                        <img src="<?php echo e(asset($category->banner)); ?>" class="p-0" width="auto" height="100" alt="a" />
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('/no_image.jpg')); ?>" class="p-0" width="auto" height="100" alt="a" />
                                    <?php endif; ?>

                                </a>
                            </div>
                            <div>
                                <a class="category_name" href="<?php echo e(route('product.by.category',$category->name)); ?>"><p><?php echo e($category->name); ?></p></a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
        </div>
    </div>
</section>

<!--Categories end-->

<!--Brands start-->

<section class="section_spacing">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 pb-10 paddingCustom">
                <div class="row">
                    <div class="col-lg-6 text-left"><h4>Feature Brands</h4></div>
                    <div class="col-lg-6 text-right"><a href="<?php echo e(route('brand')); ?>"><p>View all</p></a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="brand">

        <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="paddingCustom brands m-1" >
            <div class="m-0">
                <div class="">
                    <a href="<?php echo e(route('product.by.brand',$brand->name)); ?>" class="p-2">
                        <?php if($brand->logo != ''): ?>
                            <img src="<?php echo e(asset($brand->logo)); ?>" class="p-0" width="150" height="100" alt="a" />
                        <?php else: ?>
                            <img src="<?php echo e(asset('/no_image.jpg')); ?>" class="p-0" width="150" height="100" alt="a" />
                        <?php endif; ?>
                        <p class="text-center"><?php echo e($brand->name); ?></p>
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="paddingCustom brands m-1">
            <div class="m-0">
                <div class="">
                    <a href="<?php echo e(route('product.by.brand',$brand->name)); ?>" class="p-2">
                        <?php if($brand->logo != ''): ?>
                            <img src="<?php echo e(asset($brand->logo)); ?>" class="p-0" width="150" height="100" alt="a" />
                        <?php else: ?>
                            <img src="<?php echo e(asset('/no_image.jpg')); ?>" class="p-0" width="150" height="100" alt="a" />
                        <?php endif; ?>
                        <p class="text-center mt-2"><?php echo e($brand->name); ?></p>
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
</section>

<!--Brands end-->

<!--Top Selling Product start-->

<section class="top_selling section_spacing">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 pb-10 paddingCustom">
                <div class="row">
                    <div class="col-lg-6 text-left"><h4>Top Selling Product</h4></div>
                    <div class="col-lg-6 text-right"><a href="<?php echo e(route('all-product')); ?>"><p>View all</p></a></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 paddingCustom">
                <div class="row top_seling_product">
                    <?php $__currentLoopData = $allPrducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="<?php echo e(count($allPrducts) == 1 ? 'col-md-10':''); ?><?php echo e(count($allPrducts) == 2 ? 'col-md-7':''); ?><?php echo e(count($allPrducts) == 3 ? 'col-md-4':''); ?><?php echo e(count($allPrducts) >= 4 ? 'col-md-3':''); ?>">
                            <div class="card" style="height: 450px">
                                <div class="card-header border-0 p-0 m-0 text-center">
                                    <a href="<?php echo e(route('product.details',$product->slug)); ?>">
                                        <?php if($product->product_image != ''): ?>
                                            <img src="<?php echo e(asset($product->product_image)); ?>" style="object-fit: " width="auto" height="200" alt="a" />
                                        <?php else: ?>
                                            <img src="<?php echo e(asset('/no_image.jpg')); ?>" style="object-fit: "  width="auto" height="200" alt="a" />
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
            </div>
        </div>
    </div>
</section>
<!--Top Product Selling  end-->


<!--All Products start-->

<section class="top_selling section_spacing">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 pb-10 paddingCustom">
                <div class="row">
                    <div class="col-lg-6 text-left"><h4>All Products</h4></div>
                    <div class="col-lg-6 text-right"><a href="<?php echo e(route('all-product')); ?>"><p>View all</p></a></div>
                </div>
            </div>
        </div>
        <div class="row container-fluid">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="row">
                    <?php $__currentLoopData = $allPrducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-3 col-xl-3 my-1 col-md-4 col-12" data-value="<?php echo e($product->id); ?>" title="<?php echo e($product->name); ?>">
                            <div class="card" style="height: 450px">
                                <div class="card-header border-0 p-0 m-0 text-center">
                                    <a href="<?php echo e(route('product.details',$product->slug)); ?>">
                                        <?php if($product->product_image != ''): ?>
                                            <img src="<?php echo e(asset($product->product_image)); ?>" class="p-0" width="auto" height="200" alt="a" />
                                        <?php else: ?>
                                            <img src="<?php echo e(asset('/no_image.jpg')); ?>" class="p-0" width="auto" height="200" alt="a" />
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
            </div>
        </div>
    </div>
</section>


<!--All Products end-->

</div>
<?php /**PATH D:\NAHID\seo_multivendor_ecommerce\resources\views/website/layout/banner.blade.php ENDPATH**/ ?>