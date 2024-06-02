<?php $__env->startSection('title','Pages'); ?>
<?php $__env->startSection('body'); ?>
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Pages</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pages</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <!-- row -->
    <div class="row row-deck mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal" action="<?php echo e(route('pages.store')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row mb-4">
                            <label for="name" class="col-md-3 form-label">Page Name <sup class="text-danger">*</sup></label>
                            <div class="col-md-9">
                                <input class="form-control" id="name" required value="<?php echo e(old('name')); ?>" name="name" placeholder="Enter your page name" type="text">
                                <span class="text-danger"><?php echo e($errors->has('title') ? $errors->first('title'):''); ?></span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="summernote" class="col-md-3 form-label">Content</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="contents" id="summernote" placeholder="write content" value="<?php echo e(old('contents')); ?>"></textarea>
                            </div>
                        </div>
                        <div class="row mb-4 d-flex form-group">
                            <div class="col-md-3">
                                <label class="" for="type">Publication Status</label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control select2 form-select" name="status" data-placeholder="Choose one">
                                    <option class="form-control" label="Choose one" disabled selected></option>
                                    <option selected value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary px-4" type="submit">Create Page</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
    <div class="row row-sm mt-5">
        <div class="col-lg-12">
            <div class="card">
                <div class="border-bottom m-3">
                    <div class="row">
                        <div class="card-header border-bottom justify-content-between">
                            <h3 class="card-title text-bold">Pages Table</h3>
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
                                <th class="border-bottom-0">Status</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="text-center">
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($page->name); ?></td>
                                    <td><?php echo e($page->status == 1 ? 'active':'Inactive'); ?></td>
                                    <td class="d-flex text-center justify-content-center">
                                        <a href="<?php echo e(route('pages.show',$page->id)); ?>" class="btn btn-primary me-1"><i class="fa fa-eye"></i></a>
                                        <a href="<?php echo e(route('pages.edit',$page->id)); ?>" class="btn btn-success me-1"><i class="fa fa-edit"></i></a>
                                        <form action="<?php echo e(route('pages.destroy',$page->id)); ?>" method="post">
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

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Project\seo_multivendor_ecommerce\resources\views/admin/pages/index.blade.php ENDPATH**/ ?>