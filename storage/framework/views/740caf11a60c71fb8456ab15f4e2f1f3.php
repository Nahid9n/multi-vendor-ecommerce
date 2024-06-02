<?php $__env->startSection('title','Coupon Details'); ?>
<?php $__env->startSection('body'); ?>

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

    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('customer.dashboard')); ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('customer.coupons')); ?>">coupons</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Details</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row  justify-content-center">
        <div class="col-md-7 my-2">
            <div class="tab-content dashboard-content">
                <div class="">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            <div class="table-responsive push">
                                <table class="table table-bordered table-hover mb-0 text-nowrap border-bottom" style="font-size: 20px;">
                                    <tbody>
                                    <tr class="text-left">
                                        <th class="text-left">Coupon Type</th>
                                        <td><?php echo e(ucfirst(str_replace('_',' ',$coupon->coupon_type))); ?></td>
                                    </tr>
                                    <tr class="text-left">
                                        <th class="text-left">coupon code </th>
                                        <td><?php echo e($coupon->coupon_code); ?></td>
                                    </tr>
                                    <tr class="text-left">
                                        <th class="text-left">discount</th>
                                        <td><?php echo e($coupon->discount); ?>

                                            <?php echo e($coupon->discount_status == 1 ?  "%" : $currency->symbol); ?>

                                        </td>
                                    </tr>
                                    <tr class="text-left">
                                        <th class="text-left">discount status</th>
                                        <td><?php echo e($coupon->discount_status == 1 ? 'Percent':'Amount'); ?></td>
                                    </tr>
                                    <tr class="text-left">
                                        <th class="text-left">date range</th>
                                        <td><?php echo e($coupon->date_range); ?></td>
                                    </tr>
                                    <tr class="text-left">
                                        <th class="text-left">product</th>
                                        <td><?php echo e($coupon->product->name ?? 'N/A'); ?></td>
                                    </tr>
                                    <tr class="text-left">
                                        <th class="text-left">min shopping</th>
                                        <td><?php echo e($coupon->min_shopping.'('.$currency->symbol.')' ?? 'N/A'); ?></td>
                                    </tr>
                                    <tr class="text-left">
                                        <th class="text-left">max discount amount</th>
                                        <td><?php echo e($coupon->max_discount_amount.'('.$currency->symbol.')' ?? 'N/A'); ?></td>
                                    </tr>
                                    <tr class="text-left">
                                        <th class="text-left">status</th>
                                        <td><?php echo e($coupon->status == 1 ? 'Active':'Inactive'); ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('website.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Project\seo_multivendor_ecommerce\resources\views/customer/coupon/view.blade.php ENDPATH**/ ?>