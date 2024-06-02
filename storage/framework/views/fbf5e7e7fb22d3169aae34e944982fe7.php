<?php $__env->startSection('title','Manage Order page'); ?>
<?php $__env->startSection('body'); ?>
    <style>
        .status_change{
            font-size: inherit;
            color: initial;
        }

    </style>
    <!-- Row -->
    <div class="row row-sm mt-5">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title text-bold">Orders Table</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive export-table">
                        <table id="file-datatable" class="table table-bordered text-nowrap text-center key-buttons border-bottom  w-100">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">Order</th>
                                <th class="border-bottom-0">Order total</th>
                                <th class="border-bottom-0">Customer</th>
                                <th class="border-bottom-0">Order Date</th>
                                <th class="border-bottom-0">Order Time</th>
                                <th class="border-bottom-0">Payment Status</th>
                                <th class="border-bottom-0">Order Status</th>
                                <th class="border-bottom-0">Delivery Status</th>
                                <th class="border-bottom-0">Delivery Boy</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><a href="<?php echo e(route('orders.show',$order->id)); ?>"><?php echo e($order->order_code); ?></a></td>
                                    <td><?php echo e(number_format($order->total_price)); ?> Tk.</td>
                                    <td><?php echo e(ucfirst($order->user->name)); ?></td>
                                    <td><?php echo e($order->created_at->format('d-m-Y')); ?></td>
                                    <td><?php echo e($order->created_at->format('h:i A')); ?></td>
                                    <td>
                                        <form action="<?php echo e(route('admin.order.update.payment.status',$order->id)); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <!-- order->order_status -->
                                            <select onchange="this.form.submit()" class="form-select status_change <?php echo e($order->payment_status == 0 ? 'bg-warning':''); ?><?php echo e($order->payment_status == 1 ? 'bg-success':''); ?><?php echo e($order->payment_status == 2 ? 'bg-danger text-white':''); ?>" name="payment_status">
                                                <option value="0" <?php echo e($order->payment_status == 0 ? 'selected':''); ?>>Pending</option>
                                                <option value="1" <?php echo e($order->payment_status == 1 ? 'selected':''); ?>>Completed</option>
                                                <option value="2" <?php echo e($order->payment_status == 2 ? 'selected':''); ?>>Canceled</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="<?php echo e(route('admin.order.update.order.status',$order->id)); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <!-- order->order_status -->
                                            <select onchange="this.form.submit()" class="form-select status_change <?php echo e($order->order_status == 0 ? 'bg-warning':''); ?><?php echo e($order->order_status == 3 ? 'bg-primary':''); ?><?php echo e($order->order_status == 1 ? 'bg-success':''); ?><?php echo e($order->order_status == 2 ? 'bg-danger text-white':''); ?>" name="order_status">
                                                <option value="0" <?php echo e($order->order_status == 0 ? 'selected':''); ?>>Pending</option>
                                                <option value="3" <?php echo e($order->order_status == 3 ? 'selected':''); ?>>Accept</option>
                                                <option value="1" <?php echo e($order->order_status == 1 ? 'selected':''); ?>>Completed</option>
                                                <option value="2" <?php echo e($order->order_status == 2 ? 'selected':''); ?>>Canceled</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="<?php echo e(route('admin.order.update.delivery.status',$order->id)); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <!-- order->order_status -->
                                            <select onchange="this.form.submit()" class="form-select status_change <?php echo e($order->delivery_status == 0 ? 'bg-warning':''); ?><?php echo e($order->delivery_status == 1 ? 'bg-info':''); ?><?php echo e($order->delivery_status == 2 ? 'bg-primary':''); ?><?php echo e($order->delivery_status == 3 ? 'bg-success':''); ?><?php echo e($order->delivery_status == 4 ? 'bg-danger text-white':''); ?>" name="delivery_status">
                                                <option value="0" <?php echo e($order->delivery_status == 0 ? 'selected':''); ?>>Pending</option>
                                                <option value="1" <?php echo e($order->delivery_status == 1 ? 'selected':''); ?>>Accepted</option>
                                                <option value="2" <?php echo e($order->delivery_status == 2 ? 'selected':''); ?>>Shipping</option>
                                                <option value="3" <?php echo e($order->delivery_status == 3 ? 'selected':''); ?>>Delivered</option>
                                                <option value="4" <?php echo e($order->delivery_status == 4 ? 'selected':''); ?>>Canceled</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td><span class="bg-success-transparent p-1 text-dark rounded-2"><?php echo e($order->deliveryBoy->name ?? 'N/A'); ?></span></td>
                                    <td class="d-flex">
                                        <a href="<?php echo e(route('orders.show',$order->id)); ?>" class="btn btn-sm btn-success mx-1" title="Order Show"><i class="fa fa-eye"></i></a>
                                        <a href="<?php echo e(route('admin.order.invoice',$order->id)); ?>" class="btn btn-sm btn-primary mx-1" title="Order Invoice"><i class="fa fa-info-circle"></i></a>
                                        <a class="btn btn-sm <?php echo e($order->delivery_status == 3 ? 'btn-secondary disabled':'btn-warning'); ?> mx-1" data-bs-target="#modalInput<?php echo e($key); ?>" data-bs-toggle="modal" href="javascript:void(0)"title="Assign Delivery Boy"><i class="fa-solid fa-person-digging" ></i></a>

                                    <!-- <a href="<?php echo e(route('blogs.edit',$order->id)); ?>" class="btn btn-success mx-2"><i class="fa fa-edit"></i></a> -->
                                        
                                    </td>
                                </tr><!-- INPUT MODAL -->
                                <div class="modal fade" id="modalInput<?php echo e($key); ?>">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <form action="<?php echo e(route('delivery.boy.assign',$order->id)); ?>" method="post">
                                                <?php echo csrf_field(); ?>
                                                <div class="modal-body">
                                                    <div class="my-2">
                                                        <p>Delivery Address : <?php echo e($order->delivery_address); ?></p>
                                                    </div>
                                                    <div class="row mb-4 d-flex form-group">
                                                        <div class="col-md-3 form-label">
                                                            <label class="" for="type">Delivery Boy <span class="text-danger">*</span></label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <select class="form-control select2 select2-show-search form-select" name="deliveryBoy_id"
                                                                    data-placeholder="Choose one" required>
                                                                <option class="form-control" label="Choose one" disabled selected></option>
                                                                <?php $__currentLoopData = $deliveryBoys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deliveryBoy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($deliveryBoy->user_id); ?>" <?php echo e($deliveryBoy->user_id == $order->deliveryBoy_id ? 'selected':''); ?>>
                                                                        <?php echo e($deliveryBoy->name); ?>

                                                                        <?php if($deliveryBoy->present_address != ''): ?>
                                                                            <span>(<?php echo e($deliveryBoy->present_address); ?>)</span>
                                                                        <?php endif; ?>
                                                                    </option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="datepickerNoOfMonths<?php echo e($key); ?>">Delivery Date</label>
                                                        <div class="input-group">
                                                            <div class="input-group-text bg-primary-transparent text-primary">
                                                                <i class="fe fe-calendar text-20"></i>
                                                            </div>
                                                            <input class="form-control" value="<?php echo e($order->delivery_date); ?>" name="delivery_date" placeholder="" type="date">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Assign</button>
                                                    <a class="btn btn-danger" data-bs-dismiss="modal">Close</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Project\seo_multivendor_ecommerce\resources\views/admin/sales/order.blade.php ENDPATH**/ ?>