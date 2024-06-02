<?php $__env->startSection('title','Product Details'); ?>
<?php $__env->startSection('body'); ?>
    <style>
        .sold_cht {
            text-align: center;
        }

        .sold_cht button {
            background: transparent;
            border: none;
            color: #fff;
            padding: 0;
            margin: 0;
            width: 100%;
        }

        .addToWish i {
            font-size: 12px;
            color: #ffffff;
            padding: 0;
        }

        .addToWish:hover i{
            color: #fff;
        }




    </style>

    <section class="home_all">
        <div class="container">
            <div class="row">
                <div class="home_alls">
                    <ul>
                        <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                        <li><a href="<?php echo e(route('all-product')); ?>"><?php echo e(ucfirst($product->name)); ?></a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>

    </section>
    <section class="pro_detailes_part">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6 col-sm-6 fanledf">
                    <div class="">
                        <?php if($product->product_image !=''): ?>
                            <img  class="img-fluid w-100 active" src="<?php echo e(url($product->product_image)); ?>" alt="image" id="bgimg">
                        <?php else: ?>
                            <img class="img-fluid w-100 active" src="<?php echo e(asset('avatar/no_image.png')); ?>" alt="image" id="bgimg">
                        <?php endif; ?>
                    </div>
                    <div class="pro_small_img">
                        <?php if(isset($otherImages)): ?>
                            <?php $__currentLoopData = $otherImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productImage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="pro_sm_group">
                                    <img src="<?php echo e(asset($productImage->file)); ?>" width="100" class="sm_imge mx-1" alt="image">
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 fanled">
                    <div class="pro_price_part">
                        <h5><?php echo e(ucfirst($product->name)); ?></h5>
                        <div class="my-2 align-items-center">
                            <div class="">
                                <h5 class="text-dark">Price :
                                    <span class="p_price"><?php echo e($currency->symbol ?? '$'); ?> <?php echo e(number_format($product->product_price,2)); ?></span></h5>
                            </div>
                        </div>
                    </div>
                    <div class="pro_det_all">
                        <div style="margin-top: 10px; margin-bottom: 10px;" class="ml">
                            <span class="mr-2 opacity-50">Type :</span><?php echo e((str_replace('_',' ',ucwords($product->product_type))) ?? ''); ?>

                        </div>
                        <div style="margin-bottom: 10px;" class="ml">
                            <span class="mr-2 opacity-50">Brand :</span><?php echo e($product->brand->name ?? ''); ?>

                        </div>
                        <div style="margin-bottom: 10px;" class="ml">
                            <span class="mr-2 opacity-50">Category :</span><?php echo e($product->category->name ?? ''); ?>

                        </div>
                        <div style="margin-bottom: 10px;" class="ml">
                            <?php if($product->product_select == 'single_product'): ?>
                                <span class="mr-2 opacity-50">Stock :<?php echo e(number_format($product->product_stock)); ?></span>
                            <?php elseif($product->product_select =='product_variation'): ?>
                                
                            <?php endif; ?>
                        </div>
                        <div style="margin-bottom: 10px;" class="ml">
                            <span class="mr-2 opacity-50"><?php echo e(ucfirst($product->short_description) ?? ''); ?></span>
                        </div>
                    </div>
                    <div class="pro_det_all1"> <!-- pro_det_all -->
                        <div style="margin-bottom: 10px;" class="ml mt-2">
                            <span class="mr-2 opacity-50">Protection :</span><?php echo e($product->refund == 1 ? "Refundable":'Not Refundable'); ?>

                        </div>
                        <div style="margin-bottom: 10px;" class="ml">
                            <span class="mr-2 opacity-50">Delivery :</span><?php echo e(ucfirst($product->cash_on == 1 ? 'cash on':'online')); ?>

                        </div>
                        <div style="margin-bottom: 10px;" class="ml">
                            <span class="mr-2 opacity-50">Shipping :</span> <?php echo e($currency->symbol ?? '$'); ?> <?php echo e(number_format($product->shipping_cost,2)); ?>

                        </div>
                    </div>

                    <div class="cl_sz_part">
                        <form action="<?php echo e(route('product.add.cart')); ?>" method="post" id="addToCartForm">
                            <?php echo csrf_field(); ?>
                            <input hidden type="text" name="product_id" value="<?php echo e($product->id); ?>">
                            <?php if($product->variant_product =='product_variation'): ?>
                                <input class="p_price" hidden type="text" name="price" value="">
                            <?php elseif($product->variant_product =='single_product'): ?>
                                <input hidden type="text" name="price" value="<?php echo e($product->product_price); ?>">
                            <?php endif; ?>
                            <div style=" display: grid; grid-template-columns: repeat(2,1fr);">
                                <?php if($product->choice_options != null): ?>
                                    <?php $__currentLoopData = json_decode($product->choice_options); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $choice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="row mb-3">
                                            <div class="col-sm-12">
                                                <select name="size" class="form-control size" required>
                                                    <option value="" disabled selected>No Selected </option>
                                                    <?php $__currentLoopData = json_decode($product->choice_options); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $choice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php $__currentLoopData = $choice->values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($value); ?>"><?php echo e($value); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>

                                <?php if($product->colors != null && count(json_decode($product->colors)) > 0): ?>
                                    <div class="row no-gutters mb-3">
                                        <div class="col-sm-12">
                                            <select name="color" class="form-control color" required>
                                                <option value="" disabled selected>No Selected </option>
                                                <?php $__currentLoopData = json_decode($product->colors); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e(get_single_color_name($color)); ?>"><?php echo e(get_single_color_name($color)); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="row">
                                <div class=" p-2 shadow-none shadow-0 border-0">
                                    <div class="decrease unit3 col-lg-3 col-md-3 col-sm-4 col-xs-4">
                                        <div class="pro_qun pro-ratee " style="display: none;">
                                            <p>Quantity</p>
                                        </div>
                                        <div class="pro_counter">
                                            <span style="border-radius: 4px 0px 0px 4px;" class="down" onClick='decreaseCount(event, this)'>-</span>
                                            <input type="number" name="qty" value="1" class="form-control" min="1" placeholder="0">
                                            <span class="qty-increase" class="up" onClick='increaseCount(event, this, 2)'>+</span>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 mt-3">
                                <a href="<?php echo e(route('add-to-wishlist', $product->id )); ?>" class="btn btn-sm mx-1 addToWish"><i class="fa fa-heart"></i>Add to Wishlist</a>
                                <button class="btn btn-sm btn-w" type="submit"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add to Cart</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 sell_profff">
                    <div class="check_icon_right"><a href="#"><img src="<?php echo e(asset('/')); ?>website/assets/img/gp.png" alt="img"></a></div>
                    <div class="pro_right_part">
                        <div class="sell_prof">
                            <div class="sold_by d-grid justify-content-center text-center">
                                <div class="sold_by_tx text-center">
                                    <?php if($sellerShop != ''): ?>
                                        <?php if($sellerShop->logo != ''): ?>
                                            <img src="<?php echo e(asset($sellerShop->logo)); ?>" alt="Shop Logo" width="70" class="rounded-circle">
                                        <?php else: ?>
                                            <img src="<?php echo e(asset('/')); ?>uploads/avatars/profile.png" alt="Shop Logo" width="70" class="rounded-circle">
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <?php if($product->user->image != ''): ?>
                                            <img src="<?php echo e(asset($product->user->image)); ?>" alt="Shop Logo" width="70" class="rounded-circle">
                                        <?php else: ?>
                                            <img src="<?php echo e(asset('/')); ?>uploads/avatars/profile.png" alt="Shop Logo" width="70" class="rounded-circle">
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <br><span>Sold by: </span>
                                    <?php if($product->user_id == 1): ?>
                                        <span><?php echo e($product->user->name); ?></span>
                                    <?php else: ?>
                                        <span><?php echo e($product->user->seller->shop_name); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="sold_add my-3">
                                <div class="bog_ban d-flex my-1">
                                    <img src="<?php echo e(asset('/')); ?>website/assets/img/flag.png" alt="img">
                                    <?php if($product->user_id == 1): ?>
                                        <span><?php echo e($product->user->address); ?></span>
                                    <?php else: ?>
                                        <p><?php echo e($product->user->seller->address); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="ver_sel d-flex my-1">
                                    <img src="<?php echo e(asset('/')); ?>website/assets/img/verified_user.png" alt="img">
                                    <?php if($product->user_id == 1): ?>
                                        <span>Verified Seller</span>
                                    <?php else: ?>
                                        <p><?php echo e($product->user->profile_verified == 1 ? 'Verified':'non-verified'); ?> Seller</p>
                                    <?php endif; ?>

                                </div>
                                <div class="ent_shi d-flex my-1">
                                    <img src="<?php echo e(asset('/')); ?>website/assets/img/language.png" alt="img">
                                    <p>Entire Bangladesh Shipping</p>
                                </div>
                            </div>
                            <div class="sold_cht">
                                <a id="chatModalBTN" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#chatModal" data-id="<?php echo e($product->user_id); ?>">Message Seller</a>
                                
                            </div>
                            <div class="sold_prf">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary form-control" data-bs-toggle="modal" data-bs-target="#sellerProfile">
                                    Seller' Profile
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" data-bs-backdrop="false" data-bs-keyboard="false"  id="sellerProfile" tabindex="-1" aria-labelledby="sellerProfileLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title justify-content-center" id="sellerProfileLabel">Seller Profile</h3>
                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p><?php echo e($product->user->name); ?></p>
                                                <p><?php echo e($product->user->seller->shop_name ?? ''); ?></p>
                                                <p><?php echo e($product->user->seller->address ?? ''); ?></p>
                                                <p><?php echo e($product->user->seller->shop_setting->logo ?? ''); ?></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pro_re_dely">
                            <div class="free-dlv d-flex">
                                <img src="<?php echo e(asset('/')); ?>website/assets/img/icon-delivery.png" alt="icon">
                                <div class="retu_dlv_text">
                                    <h6>Free Delivery</h6>
                                    <p>Enter your postal code <br> for Delivery Availability</p>
                                </div>
                            </div>
                            <div class="retu_dlv d-flex">
                                <img src="<?php echo e(asset('/')); ?>website/assets/img/Icon-return.png" alt="icon">
                                <div class="retu_dlv_text">
                                    <h6>Return Delivery</h6>
                                    <p>Free 30 Days Delivery Returns. <br> Details</p>
                                </div>
                            </div>
                        </div>
                        <div class="pro_right_social d-flex">
                            <span class="mr-2 opacity-50">Share :</span>
                            <ul class="d-flex">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-3 proo_display">
                    <div class="pro_all_sidebarss pro_all_sidebar ml-3">
                        <div class="pl-3 mt-4">
                            <h3>Related Products</h3>
                            <hr>
                            <?php $__empty_1 = true; $__currentLoopData = $relatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relatedProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="pt-2">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <?php if($relatedProduct->product_image !=''): ?>
                                                <img width="100" height="100" src="<?php echo e(asset($relatedProduct->product_image)); ?>" alt="">
                                            <?php else: ?>
                                                <img width="100" height="100" src="<?php echo e(asset('avatar/no_image.png')); ?>" alt="">
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="">
                                                <p><a href="<?php echo e(route('product.details', $relatedProduct->slug)); ?>">
                                                        <?php echo e($relatedProduct->name); ?>

                                                    </a></p>
                                                <p><?php echo e($currency->symbol ?? '$'); ?><?php echo e($relatedProduct->product_price); ?></p>
                                                <div class="fdl"><a href="#"><?php echo e(ucfirst($relatedProduct->cash_on == 1 ? 'cash on':'')); ?></a></div>
                                            </div>
                                            <p style="font-size: 13px">
                                                <?php
                                                    $revs =   App\Models\ProductReview::where('product_id',$relatedProduct->id)->where('status',1)->get();
                                                    $reviewcou = 0;
                                                    $starTota = 0;
                                                        if (count($revs) != 0 ){
                                                        $starTota = 0;
                                                        foreach ($revs as $rev){
                                                            $starTota = $starTota + $rev->rating;
                                                        }
                                                        $reviewcou = $starTota / count($revs);
                                                    }
                                                ?>
                                                <?php if(isset($reviewcou)): ?>
                                                    <?php if($reviewcou == 0): ?>
                                                        <i class="fa fa-star text-secondary"></i>
                                                        <i class="fa fa-star text-secondary"></i>
                                                        <i class="fa fa-star text-secondary"></i>
                                                        <i class="fa fa-star text-secondary"></i>
                                                        <i class="fa fa-star text-secondary"></i>
                                                    <?php elseif($reviewcou >= 1 && $reviewcou < 2): ?>
                                                        <i class="fa fa-star text-danger"></i>
                                                        <i class="fa fa-star text-secondary"></i>
                                                        <i class="fa fa-star text-secondary"></i>
                                                        <i class="fa fa-star text-secondary"></i>
                                                        <i class="fa fa-star text-secondary"></i>
                                                    <?php elseif($reviewcou >= 2 && $reviewcou < 3): ?>
                                                        <i class="fa fa-star text-danger"></i>
                                                        <i class="fa fa-star text-danger"></i>
                                                        <i class="fa fa-star text-secondary"></i>
                                                        <i class="fa fa-star text-secondary"></i>
                                                        <i class="fa fa-star text-secondary"></i>
                                                    <?php elseif($reviewcou >= 3 && $reviewcou < 4): ?>
                                                        <i class="fa fa-star text-danger"></i>
                                                        <i class="fa fa-star text-danger"></i>
                                                        <i class="fa fa-star text-danger"></i>
                                                        <i class="fa fa-star text-secondary"></i>
                                                        <i class="fa fa-star text-secondary"></i>
                                                    <?php elseif($reviewcou >= 4 && $reviewcou < 5): ?>
                                                        <i class="fa fa-star text-danger"></i>
                                                        <i class="fa fa-star text-danger"></i>
                                                        <i class="fa fa-star text-danger"></i>
                                                        <i class="fa fa-star text-danger"></i>
                                                        <i class="fa fa-star text-secondary"></i>
                                                    <?php elseif($reviewcou == 5): ?>
                                                        <i class="fa fa-star text-danger"></i>
                                                        <i class="fa fa-star text-danger"></i>
                                                        <i class="fa fa-star text-danger"></i>
                                                        <i class="fa fa-star text-danger"></i>
                                                        <i class="fa fa-star text-danger"></i>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                                <span> (<?php echo e(count($revs) ?? 0); ?>)</span>
                                            </p>
                                        </div>
                                        <div class="clearfix"></div>

                                    </div>

                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <?php echo $__env->make('no_product_found', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9">
                    <!---section gallery top sell part3 start--->
                    <div class="" style="margin-bottom: 20px;">
                        <div class=" col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-md-12 ">
                                            <div class="dashboard-menu">
                                                <ul class="nav " role="tablist">
                                                    <li class="nav-item d-flex">
                                                        <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="fi-rs-settings-sliders mr-10"></i>Description</a>
                                                        <a class="nav-link" id="question-tab" data-bs-toggle="tab" href="#question" role="tab" aria-controls="question" aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>Customer Questions & Answer</a>
                                                        <a class="nav-link" id="seller-tab" data-bs-toggle="tab" href="#seller" role="tab" aria-controls="seller" aria-selected="false"><i class="fi-rs-shopping-cart-check mr-10"></i>Seller</a>
                                                        <a class="nav-link" id="review-rating-tab" data-bs-toggle="tab" href="#review-rating" role="tab" aria-controls="review-rating" aria-selected="false"><i class="fi-rs-shopping-cart-check mr-10"></i>Review & Ratings</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="tab-content dashboard-content">
                                                <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h5 class="mb-0">Product Description</h5>
                                                        </div>
                                                        <div class="card-body">
                                                            <p><?php echo ucfirst($product->long_description); ?></p>
                                                        </div>
                                                        <div class="col-4">
                                                            <table class="table table-bordered">
                                                                <tr class="">
                                                                    <th>Brand</th>
                                                                    <td><a href="<?php echo e(route('product.by.brand',$product->brand->name)); ?>"><?php echo e($product->brand->name ?? ''); ?></a></td>
                                                                </tr>
                                                                <tr class="">
                                                                    <th>Category</th>
                                                                    <td><a href="<?php echo e(route('product.by.category',$product->category->name)); ?>"><?php echo e($product->category->name ?? ''); ?></a></td>
                                                                </tr>

                                                            </table>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="question" role="tabpanel" aria-labelledby="orders-tab">
                                                    <div class="card p-3">
                                                    
                                                    <!--Comments-->
                                                        <div class="comments-area style-2">
                                                            <div class="row">
                                                                <div class="col-lg-8">
                                                                    <h4 class="mb-30">Customer questions & answers</h4>
                                                                    <div class="comment-list">
                                                                        <?php $__currentLoopData = $queries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$query): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <div class="border border-secondary-base my-1 bg-soft-secondary-base p-sm-4">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-8">
                                                                                        <div class="col-md-8">
                                                                                            <div class="w-100 w-sm-auto">
                                                                                                <span class="fs-36 fw-bold mr-3"><?php echo e($query->user->name ?? ''); ?></span>
                                                                                            </div>
                                                                                            <p class="my-2"><?php echo e($query->question ?? ''); ?></p>
                                                                                            <span class="my-2"><?php echo e(date_format($query->created_at,'d M, Y h:m a')); ?></span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-4 text-right">
                                                                                        <?php if(auth()->user()): ?>
                                                                                            <?php if($query->user_id == auth()->user()->id): ?>
                                                                                                <div class="d-flex justify-content-end">
                                                                                                    <a class="mx-3 text-primary" href="#" data-bs-toggle="modal" data-bs-target="#queryEdit<?php echo e($key); ?>"><i class="fa fa-edit"></i></a>
                                                                                                    <a href="javascript:void(0);" class="text-success " data-bs-toggle="modal" data-bs-target="#queryReplyModal<?php echo e($key); ?>">
                                                                                                        <span class="d-md-inline-block"><i class="fa-solid fa-comment-dots"></i></span>
                                                                                                    </a>
                                                                                                    <a href="javascript:void(0);">
                                                                                                        <form style="padding: 0;" class="" action="<?php echo e(route('customer.delete.queries',$query->id)); ?>" method="post">
                                                                                                            <?php echo csrf_field(); ?>
                                                                                                            <?php echo method_field('delete'); ?>
                                                                                                            <button type="submit" class="border-0 shadow-none mx-3 bg-white text-danger" onclick="return confirm('are you sure to delete ? ')"><i class="fa fa-trash-o"></i></button>
                                                                                                        </form>
                                                                                                    </a>

                                                                                                </div>

                                                                                            <?php else: ?>
                                                                                                <?php if($product->user_id == auth()->user()->id): ?>
                                                                                                    <a href="javascript:void(0);" class="btn btn-secondary-base fw-400 rounded-0 text-white" data-bs-toggle="modal" data-bs-target="#queryReplyModal<?php echo e($key); ?>">
                                                                                                        <span class="d-md-inline-block">reply</span>
                                                                                                    </a>
                                                                                                <?php elseif($query->user_id == $product->user_id): ?>
                                                                                                    <a href="javascript:void(0);" class="btn btn-secondary-base fw-400 rounded-0 text-white" data-bs-toggle="modal" data-bs-target="#queryReplyModal<?php echo e($key); ?>">
                                                                                                        <span class="d-md-inline-block">reply</span>
                                                                                                    </a>
                                                                                                <?php endif; ?>
                                                                                            <?php endif; ?>
                                                                                        <?php endif; ?>
                                                                                    </div>
                                                                                </div>
                                                                                <?php $__currentLoopData = $query->replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <div class="row my-2">
                                                                                        <div class="col-md-1"></div>
                                                                                        <div class="col-md-8">
                                                                                            <div class="w-100 w-sm-auto">
                                                                                                <img src="<?php echo e(asset($reply->user->image)); ?>" alt="">
                                                                                                <span class="fs-36 fw-bold mr-3"><?php echo e($reply->user->name); ?></span>
                                                                                            </div>
                                                                                            <p class="my-2"><?php echo e($reply->reply); ?></p>
                                                                                            <span class="my-2"><?php echo e(date_format($query->created_at,'d M, Y h:m a')); ?></span>
                                                                                        </div>
                                                                                        <div class="col-md-3 text-right">
                                                                                            <?php if(auth()->user()): ?>
                                                                                                <?php if($reply->user_id == auth()->user()->id): ?>
                                                                                                    <div class="menuthreedot">
                                                                                                        <ul class="top-left-bar-ul">
                                                                                                            <li>
                                                                                                                <a href="#" data-bs-toggle="modal" data-bs-target="#queryReplyEdit<?php echo e($key); ?>">Edit</a>
                                                                                                            </li>
                                                                                                            <li>
                                                                                                                <form style="padding: 0;" class="nav-link text-light" action="<?php echo e(route('customer.product.queries.delete',$reply->id)); ?>" method="post">
                                                                                                                    <?php echo csrf_field(); ?>
                                                                                                                    <?php echo method_field('delete'); ?>
                                                                                                                    <button type="submit" class="logioutBtn" onclick="return confirm('are you sure to delete ? ')">Delete</button>
                                                                                                                </form>
                                                                                                            </li>
                                                                                                        </ul>
                                                                                                    </div>
                                                                                                <?php endif; ?>
                                                                                            <?php endif; ?>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="modal fade" data-bs-backdrop="false" data-bs-keyboard="false"  id="queryReplyEdit<?php echo e($key); ?>" tabindex="-1" role="dialog" aria-labelledby="queryReplyEditModalLabel<?php echo e($key); ?>" aria-hidden="true">
                                                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-header">
                                                                                                    <h5 class="modal-title" id="queryReplyEditModalLabel<?php echo e($key); ?>"><?php echo e(ucfirst($product->name)); ?></h5>
                                                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                                        <span aria-hidden="true">&times;</span>
                                                                                                    </button>
                                                                                                </div>
                                                                                                <div class="modal-body text-left">
                                                                                                    <div class="container type_message">
                                                                                                        <div class="chat-container">
                                                                                                            <form id="review-form<?php echo e($key); ?>" action="<?php echo e(route('customer.update.reply',$reply->id)); ?>" method="post">
                                                                                                                <?php echo csrf_field(); ?>
                                                                                                                <input type="hidden" name="user_id" value="<?php echo e(auth()->user()->id ?? ''); ?>">
                                                                                                                <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                                                                                                                <input type="hidden" name="queries_id" value="<?php echo e($query->id); ?>">
                                                                                                                <div class="form-group">
                                                                                                                    <textarea class="form-control" name="reply" placeholder="Type message..." required><?php echo e($reply->reply); ?></textarea>
                                                                                                                </div>
                                                                                                                <button type="submit" class="btn btn-primary">Send</button>
                                                                                                            </form>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                </div>
                                                                                                <div class="modal-footer">
                                                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                                            </div>
                                                                            <div class="modal fade"  data-bs-backdrop="false" data-bs-keyboard="false"  id="queryEdit<?php echo e($key); ?>" tabindex="-1" role="dialog" aria-labelledby="queryEditModalLabel<?php echo e($key); ?>" aria-hidden="true">
                                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h5 class="modal-title" id="queryEditModalLabel<?php echo e($key); ?>"><?php echo e(ucfirst($product->name)); ?></h5>
                                                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                                <span aria-hidden="true">&times;</span>
                                                                                            </button>
                                                                                        </div>
                                                                                        <div class="modal-body text-left">
                                                                                            <div class="container type_message">
                                                                                                <div class="chat-container">
                                                                                                    <form id="review-form<?php echo e($key); ?>" action="<?php echo e(route('customer.update.queries',$query->id)); ?>" method="post">
                                                                                                        <?php echo csrf_field(); ?>
                                                                                                        <input type="hidden" name="user_id" value="<?php echo e(auth()->user()->id ?? ''); ?>">
                                                                                                        <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                                                                                                        <div class="form-group">
                                                                                                            <textarea class="form-control" name="question" placeholder="Type message..." required><?php echo e($query->question); ?></textarea>
                                                                                                        </div>
                                                                                                        <button type="submit" class="btn btn-primary">Send</button>
                                                                                                    </form>
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal fade" data-bs-backdrop="false" data-bs-keyboard="false"  id="queryReplyModal<?php echo e($key); ?>" tabindex="-1" role="dialog" aria-labelledby="reviewEditModalLabel<?php echo e($key); ?>" aria-hidden="true">
                                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h5 class="modal-title" id="reviewModalLabel<?php echo e($key); ?>">
                                                                                                Reply to : <?php echo e($query->question); ?>

                                                                                            </h5>
                                                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                                <span aria-hidden="true">&times;</span>
                                                                                            </button>
                                                                                        </div>
                                                                                        <div class="modal-body text-left">
                                                                                            <div class="container type_message">
                                                                                                <div class="chat-container">
                                                                                                    <form id="review-form" action="<?php echo e(route('customer.reply.queries')); ?>" method="post" enctype="multipart/form-data">
                                                                                                        <?php echo csrf_field(); ?>
                                                                                                        <input type="hidden" name="user_id" value="<?php echo e(auth()->user()->id ?? ''); ?>">
                                                                                                        <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                                                                                                        <input type="hidden" name="queries_id" value="<?php echo e($query->id); ?>">
                                                                                                        <div class="form-group">
                                                                                                            <textarea class="form-control" name="reply" placeholder="Type message..." required></textarea>
                                                                                                        </div>
                                                                                                        <button type="submit" class="btn btn-primary">Send</button>
                                                                                                    </form>
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    <!--single-comment -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--comment form-->
                                                        <div class="comment-form" id="reviews">
                                                            <div class="row">
                                                                <div class="col-lg-8 col-md-12">
                                                                    <form class="form-contact comment_form" action="<?php echo e(route('customer.store.queries')); ?>" id="commentForm" method="post">
                                                                        <?php echo csrf_field(); ?>
                                                                        <input type="hidden" class="form-control" name="product_id" value="<?php echo e($product->id ??''); ?>" readonly>
                                                                        <input type="hidden" class="form-control" name="user_id" value="<?php echo e(auth()->user()->id ?? ''); ?>" readonly>
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div class="form-group">
                                                                                    <textarea class="form-control w-100" name="question" id="question" cols="30" rows="9" placeholder="Write Comment" required></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <button type="submit" class="button button-contactForm">Send</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="seller" role="tabpanel" aria-labelledby="track-orders-tab">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h5 class="mb-0">Seller</h5>
                                                        </div>
                                                        <div class="card-body contact-from-area">
                                                            <div class="row justify-content-center">
                                                                <div class="col-lg-11">
                                                                    <div class="row">
                                                                        <div class="col-md-5 d-flex align-items-center justify-content-center">
                                                                            <div class="comment-list">
                                                                                <div class="single-comment justify-content-between d-flex">
                                                                                    <div class="user justify-content-between d-flex">
                                                                                        <div class="thumb border-0 text-center">
                                                                                            <?php if($sellerShop != ''): ?>
                                                                                                <?php if($sellerShop->logo != ''): ?>
                                                                                                    <img src="<?php echo e(asset($sellerShop->logo)); ?>" alt="Shop Logo" width="150" class="rounded-circle my-2">
                                                                                                <?php else: ?>
                                                                                                    <img src="<?php echo e(asset('/')); ?>uploads/avatars/profile.png" alt="Shop Logo" width="150" class="rounded-circle my-2">
                                                                                                <?php endif; ?>
                                                                                                <h6><a href="#"><?php echo e($seller->shop_name); ?></a></h6>
                                                                                                <p class="font-xxs">Since :  <?php echo e(date_format($seller->created_at,'d M, Y')); ?></p>
                                                                                            <?php else: ?>
                                                                                                <?php if($product->user->image != ''): ?>
                                                                                                    <img src="<?php echo e(asset($product->user->image)); ?>" alt="Shop Logo" width="150" class="rounded-circle my-2">
                                                                                                <?php else: ?>
                                                                                                    <img src="<?php echo e(asset('/')); ?>uploads/avatars/profile.png" alt="Shop Logo" width="150" class="rounded-circle my-2">
                                                                                                <?php endif; ?>
                                                                                                <h6><a href="#"><?php echo e($product->user->name); ?></a></h6>
                                                                                                <p class="font-xxs">Since :  <?php echo e(date_format($product->user->created_at,'d M, Y')); ?></p>
                                                                                            <?php endif; ?>
                                                                                        </div>
                                                                                        <div class="desc">
                                                                                            <div class="product-rate d-inline-block">
                                                                                                <div class="product-rating" style="width:90%">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <!--single-comment -->
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-7">
                                                                            <h4 class="mb-30">Customer reviews</h4>
                                                                            <div class="d-flex mb-30">
                                                                                <div class="product-rate d-inline-block mr-15">
                                                                                    <div class="product-rating" style="width:90%">
                                                                                    </div>
                                                                                </div>
                                                                                <h6><?php echo e($reviewcount); ?> out of 5</h6>
                                                                            </div>
                                                                            <div class="progress">
                                                                                <span><?php echo e(count($review5)); ?>%</span>
                                                                                <span>5 star</span>
                                                                                <div class="progress-bar" role="progressbar" style="width: <?php echo e(count($review5)); ?>%;" aria-valuenow="<?php echo e(count($review5)); ?>" aria-valuemin="0" aria-valuemax="100">
                                                                                    <?php echo e(count($review5) ?? 0); ?>%</div>
                                                                            </div>
                                                                            <div class="progress">
                                                                                <span><?php echo e(count($review4) ?? 0); ?>%</span>
                                                                                <span>4 star</span>
                                                                                <div class="progress-bar" role="progressbar" style="width: <?php echo e(count($review4)); ?>%;" aria-valuenow="<?php echo e(count($review4)); ?>" aria-valuemin="0" aria-valuemax="100"><?php echo e(count($review4) ?? 0); ?>%</div>
                                                                            </div>
                                                                            <div class="progress">
                                                                                <span><?php echo e(count($review3)); ?>%</span>
                                                                                <span>3 star</span>
                                                                                <div class="progress-bar" role="progressbar" style="width: <?php echo e(count($review3)); ?>%;" aria-valuenow="<?php echo e(count($review3)); ?>" aria-valuemin="0" aria-valuemax="100"><?php echo e(count($review3) ?? 0); ?>%</div>
                                                                            </div>
                                                                            <div class="progress">
                                                                                <span><?php echo e(count($review2)); ?>%</span>
                                                                                <span>2 star</span>
                                                                                <div class="progress-bar" role="progressbar" style="width: <?php echo e(count($review2)); ?>%;" aria-valuenow="<?php echo e(count($review2)); ?>" aria-valuemin="0" aria-valuemax="100"><?php echo e(count($review2) ?? 0); ?>%</div>
                                                                            </div>
                                                                            <div class="progress mb-30">
                                                                                <span><?php echo e(count($review1)); ?>%</span>
                                                                                <span>1 star</span>
                                                                                <div class="progress-bar" role="progressbar" style="width: <?php echo e(count($review1)); ?>%;" aria-valuenow="<?php echo e(count($review1)); ?>" aria-valuemin="0" aria-valuemax="100"><?php echo e(count($review1) ?? 0); ?>%</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="review-rating" role="tabpanel" aria-labelledby="review-rating-tab">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h5 class="mb-0">Review and Ratings</h5>
                                                        </div>
                                                        <div class="card-body contact-from-area">
                                                            <div class="row">
                                                                <div class="col-lg-8">
                                                                    <div class="px-3 px-sm-4">

                                                                        <div class="border border-secondary-base bg-soft-secondary-base p-sm-4">
                                                                            <?php if($ProductReview != null): ?>
                                                                                <?php if($review != null): ?>
                                                                                    <div class="border border-secondary-base bg-soft-secondary-base p-sm-4">
                                                                                        <div class="row align-items-center">
                                                                                            <div class="col-md-8">
                                                                                                <div class="w-100 w-sm-auto">
                                                                                                    <span class="fs-36 fw-bold mr-3"><?php echo e($review->user->name); ?></span>
                                                                                                </div>
                                                                                                <p class="my-2"><?php echo e($review->comment ?? ''); ?></p>
                                                                                                <?php if($review->images != null): ?>
                                                                                                    <?php $__currentLoopData = json_decode($review->images); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                        <img src="<?php echo e(asset($image)); ?>" alt="" class="w-25" width="100" height="100">
                                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                                <?php endif; ?>
                                                                                            </div>
                                                                                            <div class="col-md-4 text-right">
                                                                                                <?php if(auth()->user()): ?>
                                                                                                    <?php if($review->user_id == auth()->user()->id): ?>
                                                                                                        <div class="menuthreedot">
                                                                                                            <ul class="top-left-bar-ul">
                                                                                                                <li>
                                                                                                                    <a href="#"  data-bs-toggle="modal" data-bs-target="#reviewEdit">Edit</a>
                                                                                                                </li>
                                                                                                                <li>
                                                                                                                    <form style="padding: 0;" class="nav-link text-light" action="<?php echo e(route('customer.delete.review',$review->id)); ?>" method="post">
                                                                                                                        <?php echo csrf_field(); ?>
                                                                                                                        <?php echo method_field('delete'); ?>
                                                                                                                        <button type="submit" class="logioutBtn" onclick="return confirm('are you sure to delete ? ') ? this.form.submit():''">Delete</button>
                                                                                                                    </form>
                                                                                                                </li>
                                                                                                            </ul>
                                                                                                        </div>
                                                                                                        <div class="d-flex align-items-center justify-content-between justify-content-md-start">
                                                                                                            <div class="w-100 w-sm-auto">
                                                                                                                <span class="fs-36 mr-3"><?php echo e($review->rating ?? '0'); ?></span>
                                                                                                                <span class="fs-14 mr-3"><?php echo e($review->rating ?? '0'); ?> out of 5.0</span>
                                                                                                            </div>
                                                                                                            <div class="mt-sm-3 w-100 w-sm-auto d-flex flex-wrap justify-content-end justify-content-md-start">
                                                                                                            <span class="rating rating-mr-1">
                                                                                                                <?php if(isset($review)): ?>
                                                                                                                    <?php if($review->rating == 1): ?>
                                                                                                                        <i class = 'fa fa-star '></i>
                                                                                                                    <?php elseif($review->rating == 2): ?>
                                                                                                                        <i class = 'fa fa-star '></i>
                                                                                                                        <i class = 'fa fa-star'></i>
                                                                                                                    <?php elseif($review->rating == 3): ?>
                                                                                                                        <i class = 'fa fa-star '></i>
                                                                                                                        <i class = 'fa fa-star'></i>
                                                                                                                        <i class = 'fa fa-star'></i>
                                                                                                                    <?php elseif($review->rating == 4): ?>
                                                                                                                        <i class = 'fa fa-star '></i>
                                                                                                                        <i class = 'fa fa-star'></i>
                                                                                                                        <i class = 'fa fa-star'></i>
                                                                                                                        <i class = 'fa fa-star'></i>
                                                                                                                    <?php elseif($review->rating == 5): ?>
                                                                                                                        <i class = 'fa fa-star '></i>
                                                                                                                        <i class = 'fa fa-star'></i>
                                                                                                                        <i class = 'fa fa-star'></i>
                                                                                                                        <i class = 'fa fa-star'></i>
                                                                                                                        <i class = 'fa fa-star'></i>
                                                                                                                    <?php endif; ?>
                                                                                                                <?php endif; ?>
                                                                                                            </span>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    <?php else: ?>
                                                                                                        <a  href="javascript:void(0);" class="btn btn-secondary-base fw-400 rounded-0 text-white" data-bs-toggle="modal" data-bs-target="#reviewModal">
                                                                                                            <span class="d-md-inline-block">Rate this Product</span>
                                                                                                        </a>
                                                                                                    <?php endif; ?>
                                                                                                <?php endif; ?>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="modal fade" data-bs-backdrop="false" data-bs-keyboard="false"  id="reviewEdit" tabindex="-1" role="dialog" aria-labelledby="reviewEditModalLabel" aria-hidden="true">
                                                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-header">
                                                                                                    <h5 class="modal-title" id="reviewModalLabel"><?php echo e(ucfirst($product->name)); ?></h5>
                                                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                                        <span aria-hidden="true">&times;</span>
                                                                                                    </button>
                                                                                                </div>
                                                                                                <div class="modal-body text-left">
                                                                                                    <div class="container type_message">
                                                                                                        <div class="chat-container">
                                                                                                            <form id="review-form" action="<?php echo e(route('customer.update.review',$review->id)); ?>" method="post" enctype="multipart/form-data">
                                                                                                                <?php echo csrf_field(); ?>
                                                                                                                <input type="hidden" name="user_id" value="<?php echo e(auth()->user()->id ?? ''); ?>">
                                                                                                                <input type="hidden" name="seller_id" value="<?php echo e($product->user_id); ?>">
                                                                                                                <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">

                                                                                                                <div class="form-group rating rating-mr-1">
                                                                                                                    <label>
                                                                                                                        <input type="radio" name="rating" <?php echo e($review->rating == 1 ? 'checked':''); ?> <?php echo e($review->rating == 2 ? 'checked':''); ?> <?php echo e($review->rating == 3 ? 'checked':''); ?> <?php echo e($review->rating == 4 ? 'checked':''); ?> <?php echo e($review->rating == 5 ? 'checked':''); ?> class="form-control" value="1" required="">
                                                                                                                        <i class="fa fa-star"></i>
                                                                                                                    </label>
                                                                                                                    <label>
                                                                                                                        <input type="radio" class="form-control" <?php echo e($review->rating == 2 ? 'checked':''); ?> <?php echo e($review->rating == 3 ? 'checked':''); ?> <?php echo e($review->rating == 4 ? 'checked':''); ?> <?php echo e($review->rating == 5 ? 'checked':''); ?> name="rating" value="2" required="">
                                                                                                                        <i class="fa fa-star"></i>
                                                                                                                    </label>
                                                                                                                    <label>
                                                                                                                        <input type="radio" class="form-control" <?php echo e($review->rating == 3 ? 'checked':''); ?> <?php echo e($review->rating == 4 ? 'checked':''); ?> <?php echo e($review->rating == 5 ? 'checked':''); ?> name="rating" value="3" required="">
                                                                                                                        <i class="fa fa-star "></i>
                                                                                                                    </label>
                                                                                                                    <label>
                                                                                                                        <input type="radio" class="form-control" name="rating" <?php echo e($review->rating == 4 ? 'checked':''); ?> <?php echo e($review->rating == 5 ? 'checked':''); ?> value="4" required="">
                                                                                                                        <i class="fa fa-star"></i>
                                                                                                                    </label>
                                                                                                                    <label>
                                                                                                                        <input type="radio" class="form-control" name="rating" <?php echo e($review->rating == 5 ? 'checked':''); ?> value="5" required="">
                                                                                                                        <i class="fa fa-star "></i>
                                                                                                                    </label>
                                                                                                                </div>
                                                                                                                <div class="form-group">
                                                                                                                    <textarea class="form-control" name="comment" placeholder="Type message..." required><?php echo e($review->comment); ?></textarea>
                                                                                                                </div>
                                                                                                                <div class="form-group">
                                                                                                                    <input type="file" class="form-control" name="images[]" multiple>
                                                                                                                    <?php if($review->images != ''): ?>
                                                                                                                        <?php $__currentLoopData = json_decode($review->images); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                                            <img src="<?php echo e(asset($image)); ?>" alt="" class="w-25">
                                                                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                                                    <?php endif; ?>
                                                                                                                </div>

                                                                                                                <button type="submit" class="btn btn-primary">Send</button>
                                                                                                            </form>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                </div>
                                                                                                <div class="modal-footer">
                                                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <?php else: ?>
                                                                                    <div class="border border-secondary-base bg-soft-secondary-base p-3 p-sm-4">
                                                                                        <div class="row align-items-center">
                                                                                            <div class="col-md-8 mb-3">
                                                                                                <div class="d-flex align-items-center justify-content-between justify-content-md-start">
                                                                                                    <div class="w-100 w-sm-auto">
                                                                                                        <span class="fs-36 mr-3">0</span>
                                                                                                        <span class="fs-14 mr-3">0 out of 5.0</span>
                                                                                                    </div>
                                                                                                    <div class="mt-sm-3 w-100 w-sm-auto d-flex flex-wrap justify-content-end justify-content-md-start">
                                                                                            <span class="rating rating-mr-1">
                                                                                                        <i class = 'fa fa-star '></i>
                                                                                                        <i class = 'fa fa-star'></i>
                                                                                                        <i class = 'fa fa-star'></i>
                                                                                                        <i class = 'fa fa-star'></i>
                                                                                                        <i class = 'fa fa-star'></i>
                                                                                            </span>
                                                                                                    <span class="ml-1 fs-14">(0 reviews)</span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-4 text-right">
                                                                                            <a  href="javascript:void(0);" class="btn btn-secondary-base fw-400 rounded-0 text-white" data-bs-toggle="modal" data-bs-target="#reviewModal">
                                                                                                <span class="d-md-inline-block">Rate this Product</span>
                                                                                            </a>
                                                                                        </div>
                                                                                <?php endif; ?>
                                                                            <?php endif; ?>
                                                                               <?php if($reviews != null): ?>
                                                                                   <?php $__empty_1 = true; $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                                                       <div class="border my-1 border-secondary-base bg-soft-secondary-base p-3 p-sm-4">
                                                                                                        <div class="row align-items-center">
                                                                                                            <div class="col-md-8 mb-3">
                                                                                                                <div class="">
                                                                                                                    <div class="w-100 w-sm-auto">
                                                                                                                        <span class="fs-36 fw-bold mr-3"><?php echo e($review->user->name); ?></span>
                                                                                                                    </div>
                                                                                                                    <p class="my-2"><?php echo e($review->comment ?? ''); ?></p>
                                                                                                                    <?php if($review->images != ''): ?>
                                                                                                                        <?php $__currentLoopData = json_decode($review->images); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                                            <img src="<?php echo e(asset($image)); ?>" alt="" class="w-25" width="100" height="100">
                                                                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                                                    <?php endif; ?>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-md-4 mb-3">
                                                                                                                <div class="mt-sm-3 w-100 w-sm-auto">
                                                                                                                    <p class="text-muted" style="font-size: 15px"><small><?php echo e($review->rating ?? '0'); ?> out of 5.0</small></p>
                                                                                                                    <span class="rating rating-mr-1">
                                                                                                                        <?php if(isset($review)): ?>
                                                                                                                            <?php if($review->rating == 1): ?>
                                                                                                                                <i class = 'fa fa-star'></i>
                                                                                                                            <?php elseif($review->rating == 2): ?>
                                                                                                                                <i class = 'fa fa-star '></i>
                                                                                                                                <i class = 'fa fa-star'></i>
                                                                                                                            <?php elseif($review->rating == 3): ?>
                                                                                                                                <i class = 'fa fa-star '></i>
                                                                                                                                <i class = 'fa fa-star'></i>
                                                                                                                                <i class = 'fa fa-star'></i>
                                                                                                                            <?php elseif($review->rating == 4): ?>
                                                                                                                                <i class = 'fa fa-star '></i>
                                                                                                                                <i class = 'fa fa-star'></i>
                                                                                                                                <i class = 'fa fa-star'></i>
                                                                                                                                <i class = 'fa fa-star'></i>
                                                                                                                            <?php elseif($review->rating == 5): ?>
                                                                                                                                <i class = 'fa fa-star '></i>
                                                                                                                                <i class = 'fa fa-star'></i>
                                                                                                                                <i class = 'fa fa-star'></i>
                                                                                                                                <i class = 'fa fa-star'></i>
                                                                                                                                <i class = 'fa fa-star'></i>
                                                                                                                            <?php endif; ?>
                                                                                                                        <?php endif; ?>
                                                                                                                </span>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                                                          <div class="text-center">
                                                                                              <i class = 'fa fa-star text-secondary'></i>
                                                                                              <i class = 'fa fa-star text-secondary'></i>
                                                                                              <i class = 'fa fa-star text-secondary'></i>
                                                                                              <i class = 'fa fa-star text-secondary'></i>
                                                                                              <i class = 'fa fa-star text-secondary'></i>
                                                                                              <p class="my-2">No Reviews</p>
                                                                                          </div>
                                                                                   <?php endif; ?>
                                                                               <?php else: ?>

                                                                                            <?php endif; ?>
                                                                                        </div>
                                                                                    </div>
                                                                        </div>
                                                                        <div class="col-md-4 my-3">
                                                                            <h4 class="mb-30">Customer reviews</h4>
                                                                            <div class="d-flex mb-30">
                                                                                <div class="product-rate d-inline-block mr-15">
                                                                                    <div class="product-rating" style="width:90%">
                                                                                    </div>
                                                                                </div>
                                                                                <h6><?php echo e($reviewcount); ?> out of 5</h6>
                                                                            </div>
                                                                            <div class="progress">
                                                                                <span><?php echo e(count($review5)); ?>%</span>
                                                                                <span>5 star</span>
                                                                                <div class="progress-bar" role="progressbar" style="width: <?php echo e(count($review5)); ?>%;" aria-valuenow="<?php echo e(count($review5)); ?>" aria-valuemin="0" aria-valuemax="100">
                                                                                    <?php echo e(count($review5) ?? 0); ?>%</div>
                                                                            </div>
                                                                            <div class="progress">
                                                                                <span><?php echo e(count($review4) ?? 0); ?>%</span>
                                                                                <span>4 star</span>
                                                                                <div class="progress-bar" role="progressbar" style="width: <?php echo e(count($review4)); ?>%;" aria-valuenow="<?php echo e(count($review4)); ?>" aria-valuemin="0" aria-valuemax="100"><?php echo e(count($review4) ?? 0); ?>%</div>
                                                                            </div>
                                                                            <div class="progress">
                                                                                <span><?php echo e(count($review3)); ?>%</span>
                                                                                <span>3 star</span>
                                                                                <div class="progress-bar" role="progressbar" style="width: <?php echo e(count($review3)); ?>%;" aria-valuenow="<?php echo e(count($review3)); ?>" aria-valuemin="0" aria-valuemax="100"><?php echo e(count($review3) ?? 0); ?>%</div>
                                                                            </div>
                                                                            <div class="progress">
                                                                                <span><?php echo e(count($review2)); ?>%</span>
                                                                                <span>2 star</span>
                                                                                <div class="progress-bar" role="progressbar" style="width: <?php echo e(count($review2)); ?>%;" aria-valuenow="<?php echo e(count($review2)); ?>" aria-valuemin="0" aria-valuemax="100"><?php echo e(count($review2) ?? 0); ?>%</div>
                                                                            </div>
                                                                            <div class="progress mb-30">
                                                                                <span><?php echo e(count($review1)); ?>%</span>
                                                                                <span>1 star</span>
                                                                                <div class="progress-bar" role="progressbar" style="width: <?php echo e(count($review1)); ?>%;" aria-valuenow="<?php echo e(count($review1)); ?>" aria-valuemin="0" aria-valuemax="100"><?php echo e(count($review1) ?? 0); ?>%</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 my-4">
                        <h3 class="my-3 text-center">Related Products</h3>
                                <hr>
                        <div class="row">
                            <?php $__empty_1 = true; $__currentLoopData = $relatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relatedProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4">
                                    <div class="card card-body text-center" style="height: 300px">
                                        <div class="m-0 justify-content-center">
                                            <a href="<?php echo e(route('product.details',$relatedProduct->slug)); ?>" target="blank">
                                                <?php if($relatedProduct->product_image !=''): ?>
                                                <img src="<?php echo e(asset($relatedProduct->product_image)); ?>" width="150" height="120" class="m-0" alt="a" />
                                                <?php else: ?>
                                                <img src="<?php echo e(asset('avatar/no_image.png')); ?>" width="150" height="120" class="m-0" alt="a" />
                                                <?php endif; ?>
                                            </a>
                                            <h6 class="my-2"><?php echo e($currency->symbol ?? ''); ?><?php echo e($relatedProduct->product_price); ?></h6>
                                            <p><a href="<?php echo e(route('product.details',$relatedProduct->slug)); ?>"><?php echo e($relatedProduct->name); ?></a></p>
                                            <div class="clearfix"></div>
                                            <p style="font-size: 13px">
                                            <?php
                                                $reviewss =   App\Models\ProductReview::where('product_id',$relatedProduct->id)->where('status',1)->get();
                                                $reviewcount = 0;
                                                $starTotals = 0;
                                                    if (count($reviewss) != 0 ){
                                                    $starTotals = 0;
                                                    foreach ($reviewss as $rev){
                                                        $starTotals = $starTotals + $rev->rating;
                                                    }
                                                    $reviewcount = $starTotals / count($reviewss);
                                                }
                                            ?>
                                            <?php if(isset($reviewcount)): ?>
                                                <?php if($reviewcount == 0): ?>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                <?php elseif($reviewcount >= 1 && $reviewcount < 2): ?>
                                                    <i class="fa fa-star text-danger"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                <?php elseif($reviewcount >= 2 && $reviewcount < 3): ?>
                                                    <i class="fa fa-star text-danger"></i>
                                                    <i class="fa fa-star text-danger"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                <?php elseif($reviewcount >= 3 && $reviewcount < 4): ?>
                                                    <i class="fa fa-star text-danger"></i>
                                                    <i class="fa fa-star text-danger"></i>
                                                    <i class="fa fa-star text-danger"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                <?php elseif($reviewcount >= 4 && $reviewcount < 5): ?>
                                                    <i class="fa fa-star text-danger"></i>
                                                    <i class="fa fa-star text-danger"></i>
                                                    <i class="fa fa-star text-danger"></i>
                                                    <i class="fa fa-star text-danger"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                <?php elseif($reviewcount == 5): ?>
                                                    <i class="fa fa-star text-danger"></i>
                                                    <i class="fa fa-star text-danger"></i>
                                                    <i class="fa fa-star text-danger"></i>
                                                    <i class="fa fa-star text-danger"></i>
                                                    <i class="fa fa-star text-danger"></i>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                            <span> (<?php echo e(count($reviewss) ?? 0); ?>)</span>
                                        </p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <?php echo $__env->make('no_product_found', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endif; ?>
                        </div>
                                <div class="row my-2">
                                    <?php if(isset($pages)): ?>
                                        <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-xl-2 col-lg-2 col-md-4  col-xs-12 col-sm-6">
                                                <div class="">
                                                    <a href="<?php echo e(route('product.rules',$page->slug)); ?>">
                                                        <div class="bg-dark text-center px-2 py-4">
                                                            <small class="text-white" style="font-weight: bolder"><?php echo e($page->name); ?></small>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                    </div>

                </div>
            </div>
        </div>
            </div>
        </div>
    </section>
    <?php if(auth()->user()): ?>
        
        <!-- Modal -->
        <div class="modal fade" id="chatModal" data-bs-backdrop="false" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="chatModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="chatModalLabel">Any query about this product</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-left">
                        <div class="container type_message">
                            <div class="chat-container">
                                <form id="chat-form" action="<?php echo e(route('converstation.data.post')); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="user_id" value="<?php echo e(auth()->user()->id = ''); ?>">
                                    <input type="hidden" name="receiver_id" value="<?php echo e($product->user_id); ?>">
                                    <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="title" placeholder="Title">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" name="message" placeholder="Type message..." required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="modal fade" id="chatModal" data-bs-backdrop="false" data-bs-keyboard="false"  tabindex="-1" role="dialog" aria-labelledby="chatModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header"></div>

                    <div class="modal-body text-left">
                        <p class="modal-title" id="chatModalLabel">To send message please login first</p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeChatBox()">Close</button>
                    </div>

                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if(auth()->user()): ?>
        
        <?php if(isset($ProductReview)): ?>
            <!-- Modal -->
            <div class="modal fade" id="reviewModal" data-bs-backdrop="false" data-bs-keyboard="false"  tabindex="-1" role="dialog" aria-labelledby="reviewModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="reviewModalLabel"><?php echo e(ucfirst($product->name)); ?></h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-left">
                            <div class="container type_message">
                                <div class="chat-container">
                                    <form id="chat-form" action="<?php echo e(route('customer.store.review')); ?>" method="post" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="user_id" value="<?php echo e(auth()->user()->id ?? ''); ?>">
                                        <input type="hidden" name="seller_id" value="<?php echo e($product->user_id); ?>">
                                        <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">

                                        <div class="form-group rating rating-mr-1">
                                            <label>
                                                <input type="radio" name="rating" class="form-control" value="1" required="">
                                                <i class="fa fa-star"></i>
                                            </label>
                                            <label>
                                                <input type="radio" class="form-control" name="rating" value="2" required="">
                                                <i class="fa fa-star"></i>
                                            </label>
                                            <label>
                                                <input type="radio" class="form-control" name="rating" value="3" required="">
                                                <i class="fa fa-star "></i>
                                            </label>
                                            <label>
                                                <input type="radio" class="form-control" name="rating" value="4" required="">
                                                <i class="fa fa-star"></i>
                                            </label>
                                            <label>
                                                <input type="radio" class="form-control" name="rating" value="5" required="">
                                                <i class="fa fa-star "></i>
                                            </label>

                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" name="comment" placeholder="Type message..." required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="file" class="form-control" name="images[]" multiple>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Send</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-close" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="modal fade" id="reviewModal" data-bs-backdrop="false" data-bs-keyboard="false"  tabindex="-1" role="dialog" aria-labelledby="reviewModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header"></div>

                        <div class="modal-body text-left">
                            <p class="modal-title" id="reviewModalLabel">Sorry, You need to buy this product to give review.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-close" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php else: ?>
        <div class="modal fade" id="reviewModal" data-bs-backdrop="false" data-bs-keyboard="false"  tabindex="-1" role="dialog" aria-labelledby="reviewModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header"></div>

                    <div class="modal-body text-left">
                        <p class="modal-title" id="reviewModalLabel">Please login first</p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-close" data-bs-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
    <?php endif; ?>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('js'); ?>
    <script>
        $(document).ready(function() {
            $(document).on('change', '.size, .color', function (e) {
                getVariantPrice();
            });
            function getVariantPrice() {
                var size = $('.size').val();
                var color = $('.color').val();
                var product_id = "<?php echo e($product->id); ?>";

                $.ajax({
                    url: '<?php echo e(route("get-variant-product-price")); ?>',
                    type: 'GET',
                    data: {
                        size: size,
                        color: color,
                        product_id: product_id
                    },
                    success: function(response) {
                        if(response.price){
                            $('.p_price').text(response.price);
                            $('.p_price').val(response.price);
                        }
                        if(response.qty){
                            $('#p_stock').text(response.qty);
                        }
                        // if(response.qty){
                        //     $('#bgimg').attr('src', response.image);
                        // }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });

            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#review-rating')
        });
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('website.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Project\seo_multivendor_ecommerce\resources\views/website/product/product-details.blade.php ENDPATH**/ ?>