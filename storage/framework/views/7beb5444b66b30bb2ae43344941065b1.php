<table class="table table-striped mini-cart-table">
    <thead>
        <tr>
            <th>Image</th>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Remove</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $cartContent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td class="mini-cart-thumb">
                <a href="<?php echo e(route('product.details', $item->id)); ?>">
                    <img src="<?php echo e(asset($item->image)); ?>" alt="No Image" />
                </a>
            </td>
            <td class="mini-cart-product">
                <h5><a href="<?php echo e(route('product.details', $item->id)); ?>"><?php echo e(ucfirst($item->name)); ?></a></h5>
            </td>
            <td class="mini-cart-price">
                 <?php echo e(number_format($item->price)); ?>

            </td>
            <td class="mini-cart-quantity">
                <?php echo e($item->qty); ?>

            </td>
            <td class="mini-cart-remove">
                <form action="<?php echo e(route('cart.delete', ['rowId' => $item->id])); ?>" method="POST" onsubmit="return confirm('Are you sure to remove this item?')">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-danger">
                        <i class="fa text-danger fa-remove"></i>
                    </button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<div class="minicart-total fix">
    <span class="pull-left">Total:</span>
    <span class="pull-right">TK <span class="top_cart_price"><?php echo e($prices ?? 0); ?></span></span>
</div>
<div class="mini-cart-checkout">
    <a href="<?php echo e(route('cart.index')); ?>" class="btn-common view-cart">VIEW CART</a>
    <a href="<?php echo e(route('cart.checkout')); ?>" class="btn-common checkout mt-10">CHECK OUT</a>
</div>
<?php /**PATH D:\NAHID\seo_multivendor_ecommerce\resources\views/website/cart_partial.blade.php ENDPATH**/ ?>