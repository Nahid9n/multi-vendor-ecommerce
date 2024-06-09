<?php $__env->startSection('title','Dashboard'); ?>
<?php $__env->startSection('body'); ?>
    <div class="page-header">
        <div class="col-md-6">
            <h1 class="bg-primary text-white p-2 fs-5">Welcome to your dashboard!</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="" hidden>
                                <?php ($sum = 0); ?>
                                <?php $__currentLoopData = $totalRevenue; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e($sum = $sum + $price->payment_amount); ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <h3 class="mb-2 fw-semibold"> <?php echo e(number_format($sum)); ?> <?php echo e($currency->symbol ?? ''); ?></h3>
                            <p class="text-muted fs-13 mb-0">Total Revenue</p>
                            <p class="text-muted mb-0 mt-2 fs-12">
                                <span class="icn-box text-success fw-semibold fs-13 me-1">
                                </span>
                            </p>
                        </div>
                        <div class="col col-auto top-icn dash">
                            <div class="counter-icon bg-success dash ms-auto">
                                <i class="fa-solid text-white fa-sack-dollar"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="row">
                        <div class="col">

                            <h3 class="mb-2 fw-semibold"> <?php echo e($totalOrder); ?></h3>
                            <p class="text-muted fs-13 mb-0">Total Orders</p>
                            <p class="text-muted mb-0 mt-2 fs-12">
                                <span class="icn-box text-success fw-semibold fs-13 me-1">
                                </span>
                            </p>
                        </div>
                        <div class="col col-auto top-icn dash">
                            <div class="counter-icon bg-success dash ms-auto">
                                <i class="fa-solid text-white fa-first-order"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="row">
                        <div class="col">

                            <h3 class="mb-2 fw-semibold"> <?php echo e($pendingOrder); ?></h3>
                            <p class="text-muted fs-13 mb-0">Pending Orders</p>
                            <p class="text-muted mb-0 mt-2 fs-12">
                                <span class="icn-box text-success fw-semibold fs-13 me-1">
                                </span>
                            </p>
                        </div>
                        <div class="col col-auto top-icn dash">
                            <div class="counter-icon bg-success dash ms-auto">
                                <i class="fa-solid text-white fa-clock-o"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="row">
                        <div class="col">

                            <h3 class="mb-2 fw-semibold"> <?php echo e($acceptedOrder); ?></h3>
                            <p class="text-muted fs-13 mb-0">Accept Orders</p>
                            <p class="text-muted mb-0 mt-2 fs-12">
                                <span class="icn-box text-success fw-semibold fs-13 me-1">
                                </span>
                            </p>
                        </div>
                        <div class="col col-auto top-icn dash">
                            <div class="counter-icon bg-success dash ms-auto">
                                <i class="fa-solid text-white fa-thumbs-o-up"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h3 class="mb-2 fw-semibold"><?php echo e($completeOrder); ?></h3>
                            
                            <p class="text-muted fs-13 mb-0">Complete Order</p>
                            <p class="text-muted mb-0 mt-2 fs-12">
                                <span class="icn-box text-success fw-semibold fs-13 me-1">
                                </span>
                            </p>
                        </div>
                        <div class="col col-auto top-icn dash">
                            <div class="counter-icon bg-success dash ms-auto">
                                <i class="fa-solid text-white fa-circle-check"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            
                            <h3 class="mb-2 fw-semibold"><?php echo e($cancelOrder); ?></h3>
                            <p class="text-muted fs-13 mb-0">Cancel Order</p>
                            <p class="text-muted mb-0 mt-2 fs-12">
                                <span class="icn-box text-success fw-semibold fs-13 me-1">
                                </span>
                            </p>
                        </div>
                        <div class="col col-auto top-icn dash">
                            <div class="counter-icon bg-primary dash ms-auto">
                                <i class="fa-solid text-white fa-rectangle-xmark"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h3 class="mb-2 fw-semibold"><?php echo e($sellers); ?></h3>
                            <p class="text-muted fs-13 mb-0">Total Shop</p>
                            <p class="text-muted mb-0 mt-2 fs-12">
                                <span class="icn-box text-success fw-semibold fs-13 me-1"></span>
                            </p>
                        </div>
                        <div class="col col-auto top-icn dash">
                            <div class="counter-icon bg-primary dash ms-auto">
                                <i class="fa-solid fa-shop text-white fa-layer-group"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h3 class="mb-2 fw-semibold"><?php echo e($customer); ?></h3>
                            <p class="text-muted fs-13 mb-0">Total Customer</p>
                            <p class="text-muted mb-0 mt-2 fs-12">
                                <span class="icn-box text-success fw-semibold fs-13 me-1">
                                </span>
                            </p>
                        </div>
                        <div class="col col-auto top-icn dash">
                            <div class="counter-icon bg-info dash ms-auto">
                                <i class="fa text-white fa-user"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h3 class="mb-2 fw-semibold"><?php echo e($product); ?></h3>
                            <p class="text-muted fs-13 mb-0">Total Products</p>
                            <p class="text-muted mb-0 mt-2 fs-12">
                                <span class="icn-box text-success fw-semibold fs-13 me-1">
                                </span>
                            </p>
                        </div>
                        <div class="col col-auto top-icn dash">
                            <div class="counter-icon bg-secondary dash ms-auto box-shadow-success">
                                <i class="fa-solid text-white fa-store"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->

    <!-- ROW-2 -->
    
    <!-- ROW-2 END -->
    <!-- Row -->
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
                                        <a class="btn btn-sm <?php echo e($order->deliveryBoy_id != '' ? 'btn-secondary disabled':'btn-warning'); ?> mx-1" data-bs-target="#modalInput<?php echo e($key); ?>" data-bs-toggle="modal" href="javascript:void(0)"title="Assign Delivery Boy"><i class="fa-solid fa-person-digging" ></i></a>

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
                                                        <p>Deliver Address : <?php echo e($order->delivery_address); ?></p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Delivery Boy</label>
                                                        <ul>
                                                            <li class="select-client">
                                                                <select class="form-control" data-placeholder="Choose One" name="deliveryBoy_id">
                                                                    <option label="Choose one"></option>
                                                                    <?php $__currentLoopData = $deliveryBoys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deliveryBoy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($deliveryBoy->user_id); ?>" <?php echo e($deliveryBoy->user_id == $order->deliveryBoy_id ? 'selected':''); ?>>
                                                                            <span><?php echo e($deliveryBoy->name); ?></span>
                                                                            <?php if($deliveryBoy->present_address != ''): ?>
                                                                                <span>(<?php echo e($deliveryBoy->present_address); ?>)</span>
                                                                            <?php endif; ?>
                                                                        </option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                            </li>
                                                        </ul>
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

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Project\Seo Mutlivendor Home\seo_multivendor_ecommerce\resources\views/admin/home/index.blade.php ENDPATH**/ ?>