<?php $__env->startSection('title','Unit page'); ?>
<?php $__env->startSection('body'); ?>
    <div class="row row-deck mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title text-bold">Unit Table</h3>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="<?php echo e(route('units.store')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row mb-4">
                            <label for="name" class="col-md-3 form-label">Unit Name<span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" id="name" value="<?php echo e(old('name')); ?>" name="name" placeholder="Enter your Unit name" type="text" required>
                                <b><span class="text-danger"><?php echo e($errors->first('name')); ?></span></b>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="code" class="col-md-3 form-label">Unit Code<span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" value="<?php echo e(old('code')); ?>" id="code" name="code" placeholder="Enter Unit Short Code" type="text">
                            </div>
                        </div>
                        <div class="row mb-4 d-flex form-group">
                            <div class="col-md-3">
                                <label class="form-label" for="type">Publication Status</label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control" name="status">
                                    <option label="Choose one" disabled selected></option>
                                    <option selected value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary px-4 float-end" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row row-sm mt-5">
        <div class="col-lg-12">
            <div class="card">
                <div class="border-bottom m-3">
                    <div class="row">
                        <div class="card-header border-bottom justify-content-between">
                            <h3 class="card-title text-bold">Unit Table</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive export-table">
                        <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom  w-100">
                            <thead>
                            <tr class="text-center">
                                <th class="border-bottom-0">SL No</th>
                                <th class="border-bottom-0">Name</th>
                                <th class="border-bottom-0">Code</th>
                                <th class="border-bottom-0">Status</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="text-center">
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($unit->name); ?></td>
                                <td><?php echo e($unit->code); ?></td>
                                <td><?php echo e($unit->status == 1 ? 'active':'Inactive'); ?></td>
                                <td class="text-center d-flex justify-content-center">
                                    <a href="<?php echo e(route('units.edit',$unit->id)); ?>" class="btn btn-success my-2 me-1"><i class="fa fa-edit"></i></a>
                                    <form action="<?php echo e(route('units.destroy',$unit->id)); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" onclick="return confirm('are you sure to delete ? ')" class="btn btn-danger me-1 my-2"><i class="fa fa-trash-o"></i></button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Project\seo_multivendor_ecommerce\resources\views/admin/product/units/index.blade.php ENDPATH**/ ?>