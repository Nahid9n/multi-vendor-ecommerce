<style>
    .navbar-nav .nav-link {
        color: #fff;
    }
    .dropend .dropdown-toggle {
        color: black;
        margin-left: 1em;
    }
    .dropdown-item:hover {
        color: white;
    }
    .dropdown .dropdown-menu {
        display: none;
    }
    .dropdown:hover > .dropdown-menu,
    .dropend:hover > .dropdown-menu {
        display: block;
        margin-top: 0.125em;
        margin-left: 0.125em;
    }
    @media screen and (min-width: 769px) {
        .dropend:hover > .dropdown-menu {
            position: absolute;
            top: 0;
            left: 100%;
        }
        .dropend .dropdown-toggle {
            margin-left: 1em;
        }
    }
</style>
<section class="category_tog">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <ul>
                    <li class="nav-item dropdown">
                        <a class="" href="<?php echo e(route('all-categories')); ?>" id="dropdownMenuLink" aria-expanded="false">
                            <i style="margin-right: 10px;" class="fa fa-bars" ></i>
                            All Category
                        </a>
                        <ul class="dropdown-menu bg-white text-dark" aria-labelledby="dropdownMenuLink">
                            <?php
                                $categoriess =   App\Models\Category::where('status',1)->whereIn('parent_id',[0])->latest()->take(10)->get();
                            ?>
                            <?php $__currentLoopData = $categoriess; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="dropdown dropend bg-white text-dark" style="width: 350px;">
                                <a class="dropdown-item bg-white text-dark" href="<?php echo e(route('product.by.category',$category->name)); ?>"><?php echo e($category->name); ?></a>
                                <?php
                                    $subcategories =   App\Models\Category::where('parent_id',$category->id)->where('status',1)->get();
                                ?>
                                <?php if(isset($subcategories) != null): ?>
                                <ul class="dropdown-menu bg-secondary-transparent text-dark" aria-labelledby="multilevelDropdownMenu1">
                                    <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="bg-secondary text-white">
                                            <a class="dropdown-item bg-secondary text-white" href="<?php echo e(route('product.by.category',$subcategory->name)); ?>"><?php echo e($subcategory->name); ?></a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                                <?php endif; ?>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>

                    </li>
                    
                    <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                    <li><a href="<?php echo e(route('all-product')); ?>">All Products</a></li>
                    <li><a href="<?php echo e(route('blog')); ?>">Blog</a></li>
                    <li><a href="<?php echo e(route('brand')); ?>">Brand</a></li>
                    <li><a href="<?php echo e(route('coupons')); ?>">Coupons</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<?php /**PATH F:\Project\seo_multivendor_ecommerce\resources\views/website/layout/menu.blade.php ENDPATH**/ ?>