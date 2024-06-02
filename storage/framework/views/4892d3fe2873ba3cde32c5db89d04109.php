<?php $__env->startSection('title', 'Customer Order'); ?>
<?php $__env->startSection('content'); ?>

<style>
    .status_change {
        border: 1px solid #dee2e6;
        padding: 10px 6px;
        margin-bottom: 13px;
    }
</style>

<div class="col-md-8">
    <div class="tab-content dashboard-content">
        <div class="">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Your Orders</h5>
                </div>
                <div class="card-body">









                    <div class="table-responsive">
                        <?php if(count($orders) > 0): ?>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Order</th>
                                    <th>Date</th>
                                    <th>Order Status</th>
                                    <th>Total</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="">
                                    <td><a class="btn-small  d-block" href="<?php echo e(route('customer-order-details', $order->order_code)); ?>"><?php echo e($order->order_code); ?></a></td>
                                    <td><?php echo e($order->order_date); ?></td>
                                    <td>
                                        <span class="p-1 rounded-2 <?php echo e($order->order_status == 0 ? 'bg-warning ':''); ?>

                                        <?php echo e($order->order_status == 1 ? 'bg-success text-white':''); ?>

                                        <?php echo e($order->order_status == 2 ? 'bg-danger text-white':''); ?>

                                        <?php echo e($order->order_status == 3 ? 'bg-primary text-white':''); ?>">
                                            <?php echo e($order->order_status == 0 ? 'Pending':''); ?>

                                            <?php echo e($order->order_status == 3 ? 'Accepted':''); ?>

                                            <?php echo e($order->order_status == 1 ? 'Completed':''); ?>

                                            <?php echo e($order->order_status == 2 ? 'Canceled':''); ?>

                                        </span>

                                    </td>
                                    <td><?php echo e($order->total_price.' '.$currency->symbol); ?></td>
                                    <td>
                                        <a class="btn-small  d-block" href="<?php echo e(route('customer-order-details', $order->order_code)); ?>">View</a>

                                        <?php if($order->order_status == 'Pending'): ?>
                                        <form method="post" action="<?php echo e(route('customer-order-cancel', $order->order_code)); ?>">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PUT'); ?>
                                            <button class="btn-sm" type="submit">Cancel</button>
                                        </form>
                                        <?php endif; ?>
                                    </td>

                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <?php else: ?>
                        <div class="text-center"><?php echo $__env->make('empty-space', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="row justify-content-center">
                        <?php echo e($orders->links()); ?>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('customer.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Project\seo_multivendor_ecommerce\resources\views/customer/order/order.blade.php ENDPATH**/ ?>