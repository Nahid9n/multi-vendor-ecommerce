<?php $__env->startSection('title','Color page'); ?>
<?php $__env->startSection('body'); ?>
    <div class="row row-deck mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title text-blod">Add New Color</h3>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="<?php echo e(route('colors.store')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row mb-4">
                            <label for="name" class="col-md-3 form-label">Color Name <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" id="name" value="<?php echo e(old('name')); ?>" name="name" placeholder="Enter your Color name" type="text" required>
                                <b><span class="text-danger"><?php echo e($errors->first('name')); ?></span></b>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="code" class="col-md-3 form-label">Color Code<span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" id="code" name="code" placeholder="Color Code" type="color" required/>
                                <b><span class="text-danger"><?php echo e($errors->first('code')); ?></span></b>
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
                            <h3 class="card-title text-bold">Color Table</h3>
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
                                <th class="border-bottom-0">Color</th>
                                <th class="border-bottom-0">Status</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="text-center">
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e(str_replace("_", " ",ucfirst($color->name))); ?></td>
                                <td><?php echo e($color->code); ?></td>
                                <td style="">
                                    <div class="" style="width: 100% ; height: 25px; background-color: <?php echo e($color->code); ?>"></div>
                                </td>
                                <td><?php echo e($color->status == 1 ? 'active':'Inactive'); ?></td>
                                <td class="d-flex text-center justify-content-center">
                                    <a href="<?php echo e(route('colors.edit',$color->id)); ?>" class="btn btn-success me-1"><i class="fa fa-edit"></i></a>
                                    <form action="<?php echo e(route('colors.destroy',$color->id)); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" onclick="return confirm('are you sure to delete ? ')" class="btn btn-danger me-1 "><i class="fa fa-trash-o"></i></button>
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



<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Project\seo_multivendor_ecommerce\resources\views/admin/product/color/index.blade.php ENDPATH**/ ?>