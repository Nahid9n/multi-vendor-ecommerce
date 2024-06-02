<?php $__env->startSection('title','Attribute'); ?>
<?php $__env->startSection('body'); ?>
    <div class="row row-deck mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title text-bold">Add New Attribute</h3>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="<?php echo e(route('product_attribute.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="row mb-4">
                            <label for="name" class="col-md-3 form-label">Attribute Name <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" id="name" value="<?php echo e(old('name')); ?>" name="name" placeholder="Enter your attribute name" type="text" required>
                                <b><span class="text-danger"><?php echo e($errors->first('name')); ?></span></b>
                            </div>
                        </div>
                        <button class="btn btn-primary px-4 float-end" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row row-deck mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title text-bold">Attribute Value</h3>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="<?php echo e(route('product.attribute.value')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="row mb-4 d-flex form-group">
                            <div class="col-md-3">
                                <label class="form-label" for="type">Attribute Name <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control " name="attribute_id" required>
                                    <option class="form-control" label="Choose one" disabled selected></option>
                                    <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option selected value="<?php echo e($attribute->id); ?>"><?php echo e($attribute->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="value" class="col-md-3 form-label">Attribute Value <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" id="value" value="<?php echo e(old('value')); ?>" name="value" placeholder="Enter your attribute value" type="text" required>
                                <b><span class="text-danger"><?php echo e($errors->first('value')); ?></span></b>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="color_code" class="col-md-3 form-label">Color Code </label>
                            <div class="col-md-9">
                                <input class="form-control" id="color_code" value="<?php echo e(old('color_code')); ?>" name="color_code" placeholder="Enter your colorcode" type="text">
                                <b><span class="text-danger"><?php echo e($errors->first('color_code')); ?></span></b>
                            </div>
                        </div>
                        <button class="btn btn-primary px-4 float-end" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="border-bottom m-3">
                    <div class="row">
                        <div class="justify-content-between border-buttom card-header">
                            <h3 class="card-title text-bold">Attribute Table</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive export-table">
                        <table id="file-datatable" class="table table-bordered table-hover table-striped text-nowrap key-buttons border-bottom  w-100">
                            <thead>
                            <tr class="text-center">
                                <th class="border-bottom-0">SL No</th>
                                <th class="border-bottom-0">Name</th>
                                <th class="border-bottom-0">Values</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="text-center">
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($attribute->name); ?></td>
                                    <td>
                                        <?php $__currentLoopData = $attribute->attribute_values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <span class="mx-4 pt-3"><span class="fw-bold">value : </span><?php echo e($value->value); ?></span>
                                                    <span class="mx-4 pt-3"><span class="fw-bold">Color code :</span> <?php echo e($value->color_code ?? 'N/A'); ?></span>
                                                </div>
                                                <div class="col-md-3 d-flex justify-content-end">
                                                    <a href="<?php echo e(route('product.attribute.value.edit',$value->id)); ?>" class="btn btn-success btn-sm my-2 me-1"><i class="fa fa-edit"></i></a>
                                                    <form action="<?php echo e(route('product.attribute.value.destroy',$value->id)); ?>" method="post">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button type="submit" onclick="return confirm('are you sure to delete ? ')" class="btn btn-sm btn-danger my-2 me-1"><i class="fa fa-trash-o"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                            <hr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                    <td class="text-center d-flex justify-content-center">
                                        <a href="<?php echo e(route('product_attribute.edit',$attribute->id)); ?>" class="btn btn-success my-2 me-1"><i class="fa fa-edit"></i></a>
                                        <form action="<?php echo e(route('product_attribute.destroy',$attribute->id)); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" onclick="return confirm('are you sure to delete ? ')" class="btn btn-danger my-2 me-1"><i class="fa fa-trash-o"></i></button>
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
<?php $__env->startPush('js'); ?>
    <script>
        $(document).ready(function(){
            $("#my_color_code").click(function(){
                $(this).addClass('active');
                $("#my_code1").attr("type","color");
                $("#my_code").removeClass('active');
            });
            $("#my_code").click(function(){
                $(this).addClass('active');
                $("#my_code1").attr("type","text");
                $("#my_color_code").removeClass('active');
            });
        });

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Project\seo_multivendor_ecommerce\resources\views/admin/product/attribute/index.blade.php ENDPATH**/ ?>