<?php $__env->startSection('title','Wallet'); ?>
<?php $__env->startSection('body'); ?>
    <div class="page-header">
        <div>
            <h1 class="page-title">Payout</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active" aria-current="page">Payout</li>
            </ol>
        </div>
    </div>
    <!-- End Page Title -->
    <section class="section m-0">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="wallet-header">
                        <h3 class="text-white">My Wallet</h3>
                    </div>
                    <div class="card-body contact-from-area">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="wallet-container">
                                    <div class="my-2 text-center">

                                        <?php if(auth()->user()->image !=null): ?>
                                        <img  width="120" height="120" src="<?php echo e(asset(auth()->user()->image)); ?>" alt=""
                                            class="m-0 rounded border border-3">
                                        <?php endif; ?>
                                        <?php if(auth()->user()->image == null): ?>
                                            <img width="120" height="120" src="<?php echo e(asset('avatar/avatar.png')); ?>" alt=""
                                                class="m-0 rounded border border-3">
                                        <?php endif; ?>

                                        <p class="fw-bold"><?php echo e(auth()->user()->name); ?></p>
                                        <p>Payment Method : <span class="fw-bold text-primary"><?php echo e($vendorPaymentInfo->payment_method ?? 'N/A'); ?></span></p>
                                        <p>Account Holder : <span class="fw-bold text-primary"><?php echo e($vendorPaymentInfo->account_holder_name ?? 'N/A'); ?></span></p>
                                        <p>Account Number : <span class="fw-bold text-primary"><?php echo e($vendorPaymentInfo->account_number ?? 'N/A'); ?></span></p>
                                        <p>Balance: <span class="fw-bold text-primary"><?php echo e($vendor->balance ?? '0'); ?> .<?php echo e($currency->symbol ?? ''); ?></span></p>
                                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#withdraw">
                                            Withdraw
                                        </button>
                                        <div class="modal fade" id="withdraw" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="paymentModalLabel">Withdraw</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="<?php echo e(route('seller.withdraw.request')); ?>" method="POST">
                                                        <?php echo csrf_field(); ?>
                                                        <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="payment_method" class="my-2">Withdrawal Amount <span class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control" id="withdrawal_amount" name="withdrawal_amount" placeholder="Withdrawal Amount" required>
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit"  class="btn btn-primary">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div><!-- End Basic Modal-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Withdrawal History</h5>
                    </div>
                    <div class="card-body contact-from-area">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table dataTable table-hover">
                                        <thead>
                                        <tr>
                                            <th>Payment Method</th>
                                            <th>Account Holder</th>
                                            <th>Account Number</th>
                                            <th>Amount</th>
                                            <th>Branch</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($vendor->payment_method); ?></td>
                                                <td><?php echo e($vendor->account_holder_name); ?></td>
                                                <td><?php echo e($vendor->account_number); ?></td>
                                                <td><?php echo e($vendor->withdrawal_amount); ?> .<?php echo e($currency->symbol ?? ''); ?></td>
                                                <td><?php echo e($vendor->branch); ?></td>
                                                <td><span class="<?php echo e($vendor->status == 0 ? 'bg-warning text-dark':''); ?><?php echo e($vendor->status == 1 ? 'bg-success text-dark':''); ?><?php echo e($vendor->status == 2 ? 'bg-danger text-white':''); ?> p-1"><?php echo e($vendor->status == 0 ? 'Pending':''); ?><?php echo e($vendor->status == 1 ? 'Done':''); ?><?php echo e($vendor->status == 2 ? 'Cancel':''); ?></span></td>
                                                <td><?php echo e($vendor->created_at); ?></td>
                                                <td><a href="<?php echo e(route('seller.withdraw.details',$vendor->id)); ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('seller.Layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\NAHID\seo_multivendor_ecommerce\resources\views/seller/wallet/index.blade.php ENDPATH**/ ?>