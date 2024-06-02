<?php $__env->startSection('title', 'Customer Dashboard'); ?>
<?php $__env->startSection('content'); ?>

<div class="col-md-8">
    <div class="tab-content dashboard-content">
        <div class="">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Hello <?php echo e(auth()->user()->name); ?>! </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 pb-5">
                            <p>Wallet Money : <?php echo e((isset($wallet->balance))? $wallet->balance : 0); ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <p>Billing Addree: </p> <?php echo e($billings->address_one.", ".$billings->address_two." ".$billings->city." ".$billings->state." ".$billings->zip." ".$billings->country); ?>

                        </div>
                        <div class="col-lg-6">
                            <p>Shipping Addree: </p> <?php echo e($shippings->address_one." ".$shippings->address_two." ".$shippings->city." ".$shippings->state." ".$shippings->zip." ".$shippings->country); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('customer.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Project\seo_multivendor_ecommerce\resources\views/customer/home.blade.php ENDPATH**/ ?>