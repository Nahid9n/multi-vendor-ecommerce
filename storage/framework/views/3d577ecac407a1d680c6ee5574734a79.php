<?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
<div class="col-xl-3 my-2 col-lg-4 col-md-6 col-sm-12 colsm6 cart_item" title="<?php echo e($product->name); ?>">
    <div class="card" style="height: 470px">
        <div class="card-header border-0 p-0 m-0 text-center">
            <a href="<?php echo e(route('product.details',$product->slug )); ?>">
                <?php if($product->product_image != ''): ?>
                    <img src="<?php echo e(asset($product->product_image)); ?>" class="p-0" width="200" height="200" alt="a" />
                <?php else: ?>
                    <img src="<?php echo e(asset('/no_image.jpg')); ?>" class="p-0" width="200" height="200" alt="a" />
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
    <?php echo $__env->make('empty-space', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php /**PATH F:\Project\Seo Mutlivendor Home\seo_multivendor_ecommerce\resources\views/website/home/ajaxFilter.blade.php ENDPATH**/ ?>