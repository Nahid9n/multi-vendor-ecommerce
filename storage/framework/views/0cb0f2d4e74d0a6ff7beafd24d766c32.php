<!doctype html>
<html lang="en">

<head>
    <?php echo $__env->make('website.layout.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script src="<?php echo e(asset('/')); ?>admin/assets/plugins/bootstrap/js/popper.min.js"></script>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background: #f5f5f5;
    }
    .invoice-container {
        max-width: 950px;
        margin: 20px auto;
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .invoice-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .invoice-header h1 {
        margin: 0;
        font-size: 24px;
    }
    .invoice-details {
        margin: 20px 0;
    }
    .invoice-details h2 {
        margin: 0 0 10px;
        font-size: 20px;
    }
    .invoice-details p {
        margin: 5px 0;
    }
    .invoice-table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
    }
    .invoice-table th, .invoice-table td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
    }
    .invoice-table th {
        background: #f5f5f5;
    }
    .invoice-summary {
        display: flex;
        justify-content: flex-end;
        margin-top: 20px;
    }
    .invoice-summary table {
        width: 300px;
        border-collapse: collapse;
    }
    .invoice-summary th, .invoice-summary td {
        border: none;
        padding: 10px;
        text-align: left;
    }
    .invoice-summary th {
        background: #f5f5f5;
    }
    .invoice-footer {
        text-align: center;
        margin-top: 20px;
        font-size: 14px;
        color: #777;
    }
</style>
<style>
    .status_change {
        border: 1px solid #dee2e6;
        padding: 10px 6px;
        margin-bottom: 13px;
    }

    .form-group select {
        background: #fff;
        border: 1px solid #e2e9e1;
        height: 45px;
        -webkit-box-shadow: none;
        box-shadow: none;
        padding-left: 20px;
        font-size: 13px;
        color: #1a1a1a;
        width: 100%;
    }

    .modal-body{
        margin-top: 0;
    }

    .modal-body button{
        width: initial;
    }

    .modal-body button{
        border-radius: 7px;
    }

    #error_msg{
        display: none;
        font-weight: bold;
    }

    li.breadcrumb-item{
        float: left;
    }

</style>
<div class="invoice-container text-dark">
    <div class="invoice-header text-dark">
        <div>
            <h1>Invoice</h1>
            <p>Invoice #: <?php echo e($order->order_code); ?></p>
            <p>Date: <?php echo e(date('d M-Y')); ?></p>
        </div>
        <div>
            <h2>
                <img src="<?php echo e(asset($website_setting->logo)); ?>" alt="">
            </h2>
            <p><?php echo e($website_setting->address); ?></p>
            <p>Email: <?php echo e($website_setting->email); ?></p>
        </div>
    </div>
    <div class="invoice-details text-dark">
        <h2>Delivery Details</h2>
        <p>Name : <?php echo e($order->user->name); ?></p>
        <p>Phone : <?php echo e($order->phone); ?></p>
        <p>Address : <?php echo e($order->delivery_address); ?></p>
        <p>Email : <?php echo e($order->user->email); ?></p>
    </div>

    <table class="invoice-table text-dark">
        <thead>
        <tr>
            <th>Product Name</th>
            <th>Shop</th>
            <th>Product Price</th>
            <th>Quantity</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>

        <?php ($sum = 0); ?>
        <?php ($tax = 0); ?>
        <?php $__currentLoopData = $order->orderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td class="text-start">
                    <div class="row">
                        <div class="col-2">
                            <img class="mx-2" width="50" height="50" src="<?php echo e(asset($orderDetail->product->product_image)); ?>" alt="">
                        </div>
                        <div class="text-muted col-10">
                            <div class="text-muted">
                                <p class="font-w600 fw-bold mb-1"><?php echo e($orderDetail->product_name); ?></p>
                            </div>
                            <div class="text-muted ">
                                <?php if(isset($orderDetail->product_color)): ?>
                                    <span class="fw-bold">Color : </span><span><?php echo e($orderDetail->product_color); ?></span><br>
                                <?php endif; ?>
                                <?php if(isset($orderDetail->product_size)): ?>
                                    <span class="fw-bold">Size : </span><span><?php echo e($orderDetail->product_size); ?></span>
                                    <br>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </td>
                <td class="text-center"><?php echo e($orderDetail->user->role == 'admin' ? $orderDetail->user->name : $orderDetail->user->seller->shop_name); ?></td>
                <td class="text-end"> <?php echo e($currency->symbol ?? ''); ?> <?php echo e($orderDetail->product_price); ?></td>
                <td class="text-center"><?php echo e($orderDetail->product_qty); ?></td>
                <td class="text-center"><?php echo e($currency->symbol ?? ''); ?> <?php echo e($orderDetail->product_price * $orderDetail->product_qty); ?> </td>
                <td hidden><?php echo e($sum = $sum + ($orderDetail->product_price * $orderDetail->product_qty)); ?></td>
                <td hidden><?php echo e($tax = $tax + ($orderDetail->tax_total)); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <div class="invoice-summary text-right text-dark">
        <table>
            <tr>
                    <th>Subtotal:</th>
                    <td class="text-end"><?php echo e($currency->symbol ?? ''); ?> <?php echo e($sum); ?></td>
                </tr>
                <tr>
                    <th>Shipping:</th>
                    <td class="text-end"> <?php echo e($currency->symbol ?? ''); ?> <?php echo e($order->total_shipping); ?></td>
                </tr>
                <tr>
                    <th>Tax (5%):</th>
                    <td class="text-end"><?php echo e($currency->symbol ?? ''); ?> <?php echo e($tax); ?></td>
                </tr>
                <tr>
                    <th>Total:</th>
                    <td class="text-end"><?php echo e($currency->symbol ?? ''); ?> <?php echo e($sum+$order->total_shipping+$tax); ?></td>
                </tr>
        </table>
    </div>

    <div class="invoice-summary text-dark">
        Payment Method : <?php echo e(str_replace('_',' ',ucfirst($order->payment_method))); ?>

    </div>

    <div class="invoice-footer text-dark">
        <p>Thank you for your orders!</p>
        <p>If you have any questions about this invoice, please contact us at <?php echo e($website_setting->email); ?></p>
    </div>
</div>
<?php /**PATH F:\Project\seo_multivendor_ecommerce\resources\views/customer/invoice/invoice-pdf.blade.php ENDPATH**/ ?>