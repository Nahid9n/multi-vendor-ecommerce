<?php $__env->startSection('title', 'Edit Product '); ?>
<?php $__env->startSection('body'); ?>
    <?php echo $__env->make('modal.common', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row mt-5">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title text-bold">Edit Product</h3>
                    <a href="<?php echo e(route('product.index')); ?>" class="btn btn-primary my-1 mx-2 text-center">All Product</a>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('product.update')); ?>" method="post" enctype="multipart/form-data"
                        id="choice_form">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="product_type" value="<?php echo e($product->product_type); ?>" readonly>
                        <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
                        <div class="row mb-4">
                            <label for="name" class="col-md-3 form-label">Product Name <span
                                    class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" id="name" value="<?php echo e($product->name); ?>"
                                    name="name" placeholder="Product name" />
                                <b><span class="text-danger"><?php echo e($errors->first('name')); ?></span></b>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="category_id" class="col-md-3 form-label">Category Name <span
                                    class="text-danger">*</span></label>
                            <div class="col-md-9 form-group">
                                <select name="category_id" class="form-control select2 select2-show-search form-select"
                                    data-placeholder="Select Category" id="category">
                                    <option value="" disabled selected> -- Select Category --</option>
                                    <?php $__empty_1 = true; $__currentLoopData = $parent_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <?php
                                        $dashes = '';
                                        ?>

                                        <?php for($i = 1; $i <= $parent_category->level; $i++): ?>
                                            <?php
                                            $dashes = str_repeat('-', $i);
                                            ?>
                                        <?php endfor; ?>
                                        <option value="<?php echo e($parent_category->id); ?>"
                                            <?php echo e($parent_category->id == $product->category_id); ?>

                                            <?php if($parent_category->id == $product->category_id): ?> <?php if(true): echo 'selected'; endif; ?> <?php endif; ?>>
                                            <?php echo e($dashes); ?> <?php echo e($parent_category->name); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <option class="text-center text-danger"> --No Category--</option>
                                    <?php endif; ?>
                                </select>
                                <b><span class="text-danger"><?php echo e($errors->first('category_id')); ?></span></b>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label">Brand Name <span
                                    class="text-danger">*</span></label>
                            <div class="col-md-9 form-group">
                                <select name="brand_id" class="form-control select2 select2-show-search form-select"
                                    data-placeholder="Select Brand">
                                    <option value="" disabled selected> -- Select Brand --</option>
                                    <?php $__empty_1 = true; $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <option value="<?php echo e($brand->id); ?>"
                                            <?php if($brand->id == $product->brand_id): ?> selected <?php endif; ?>> <?php echo e($brand->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <option class="text-center text-danger"> --No Brand--</option>
                                    <?php endif; ?>
                                </select>
                                <b><span class="text-danger"><?php echo e($errors->first('brand_id')); ?></span></b>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label">Unit Name <span
                                    class="text-danger">*</span></label>
                            <div class="col-md-9 form-group">
                                <select name="unit_id" class="form-control select2 select2-show-search form-select"
                                    data-placeholder="Select Unit">
                                    <option value="" disabled> -- Select Unit --</option>
                                    <?php $__empty_1 = true; $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <option value="<?php echo e($unit->id); ?>"
                                            <?php if($unit->id == $product->unit_id): ?> selected <?php endif; ?>> <?php echo e($unit->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <option class="text-center text-danger"> --No Unit--</option>
                                    <?php endif; ?>
                                </select>
                                <b><span class="text-danger"><?php echo e($errors->first('unit_id')); ?></span></b>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="bar_code" class="col-md-3 form-label">Bar Code <span
                                    class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" value="<?php echo e($product->bar_code); ?>" name="bar_code" id="bar_code"
                                    placeholder="Bar code" type="text" />
                                <b><span class="text-danger"><?php echo e($errors->first('bar_code')); ?></span></b>
                            </div>
                        </div>
                        <div class="row mb-4" id="product_price">
                            <label for="" class="col-md-3 form-label"> Product Price<span
                                    class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" value="<?php echo e($product->product_price); ?>" name="product_price"
                                    min="0" step=".01" placeholder="0.01" type="text" />
                                <b><span class="text-danger"><?php echo e($errors->first('product_price')); ?></span></b>
                            </div>
                        </div>
                        <?php if($product->product_select =='single_product'): ?>
                        <div class="row mb-4" id="product_stock">
                                <label for="" class="col-md-3 form-label">Product Stock</label>
                                <div class="col-md-9">
                                    <input class="form-control" name="product_stock" id="product_stock_change" value="<?php echo e($product->product_stock); ?>" placeholder="1" min="1" type="number" />
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label">Product Image</label>
                            <div class="col-md-9 test_class">
                                <div class="input-group openImageModal" data-multiple="false"
                                    data-inputname="product_image">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                    </div>
                                    <div class="form-control bannerFile-amount" id="product_imageFileAmount">Choose file
                                    </div>
                                </div>

                                <div class="row d-flex" id="product_image">
                                    <div class="position-relative d-flex">
                                        <div class="imgs m-1">
                                            <?php if($product->product_image != ''): ?>
                                                <span class="btn btn-danger btn-sm position-absolute rmSingleimg"
                                                    id="" style="float: left">&times;</span>
                                                <img width="100" height="100" class="img"
                                                    src="<?php echo e(asset($product->product_image)); ?>" alt="">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <b><span class="text-danger"><?php echo e($errors->first('product_image')); ?></span></b>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label">Select Product</label>
                            <div class="col-md-9 form-group">
                                <input type="hidden" class="form-control" name="product_select"
                                    value="<?php echo e($product->product_select); ?>" readonly>
                                <select name="product_select" class="form-control select2 select2-show-search form-select"
                                    data-placeholder="Select Product" onchange="productSelect(this)" disabled>
                                    <option value="single_product"
                                        <?php if($product->product_select == 'single_product'): ?> <?php if(true): echo 'selected'; endif; ?> <?php endif; ?>>Single
                                        Product</option>
                                    <option value="product_variation"
                                        <?php if($product->product_select == 'product_variation'): ?> <?php if(true): echo 'selected'; endif; ?> <?php endif; ?>>Product
                                        Variation</option>
                                </select>
                            </div>
                        </div>
                        <?php if($product->product_select == 'product_variation'): ?>
                            <div class="row mb-4">
                                <label for="" class="col-md-3 form-label">Product Color<span
                                        class="text-danger"></span></label>
                                <div class="col-md-9 form-group">
                                    <select class="form-control color_multiple select2 select2-show-search"
                                        data-live-search="true" name="colors[]" id="colors" multiple
                                        data-placeholder="Nothing Selected">
                                        <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($color->code); ?>"
                                                <?php if(in_array($color->code, json_decode($product->colors))): ?> selected <?php endif; ?>>
                                                <span><?php echo e($color->name); ?></span>
                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="" class="col-md-3 form-label">Product Attribute <span
                                        class="text-danger"></span></label>
                                <div class="col-md-9 form-group">
                                    <select name="choice_attributes[]" id="choice_attributes"
                                        class="form-control select2 select2-show-search"
                                        data-placeholder="Choose Attributes">
                                        <?php $__currentLoopData = \App\Models\Attribute::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($attribute->id); ?>"
                                                <?php if($product->attributes !== null && in_array($attribute->id, json_decode($product->attributes, true))): ?> selected <?php endif; ?>><?php echo e($attribute->name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <?php $__currentLoopData = json_decode($product->choice_options); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $choice_option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="customer_choice_options" id="customer_choice_options">
                                    <div class="row mb-4">
                                        <label for="" class="col-md-3 form-label">Size</label>
                                        <div class="col-md-9 form-group">
                                            <select
                                                class="form-control color_multiple attribute_choice color_multiple select2 select2-show-search"
                                                data-live-search="true"
                                                name="choice_options_<?php echo e($choice_option->attribute_id); ?>[]" multiple
                                                data-placeholder="Nothing Selected">
                                                <?php $__currentLoopData = \App\Models\AttributeValue::where('attribute_id', $choice_option->attribute_id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($row->value); ?>"
                                                        <?php if(in_array($row->value, $choice_option->values)): ?> selected <?php endif; ?>>
                                                        <?php echo e($row->value); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <input type="hidden" name="choice_no[]"
                                                value="<?php echo e($choice_option->attribute_id); ?>">
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div class="row mb-4">
                                <div class="customer_choice_options" id="customer_choice_options"></div>
                            </div>
                            <div class="row mb-4">
                                <div class="sku_combination" id="sku_combination"></div>
                            </div>
                        <?php endif; ?>
                        <div class="row mb-4">
                            <label for="shipping_cost" class="col-md-3 form-label">Shipping Cost <span
                                    class="text-danger">*</span> </label>
                            <div class="col-md-9">
                                <input class="form-control" id="shipping_cost" value="<?php echo e($product->shipping_cost); ?>"
                                    name="shipping_cost" placeholder="0.01" min="0" step=".01"
                                    type="number" required />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="description" class="col-md-3 form-label">Short Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="short_description" id="short_description" placeholder="Short Description"><?php echo e($product->short_description); ?></textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="summernote" class="col-md-3 form-label">Long Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="long_description" id="summernote" placeholder="Long Description"
                                    value=""><?php echo e($product->long_description); ?></textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label">Other Images</label>
                            <div class="col-md-9 test_class">
                                <div class="input-group openImageModal" data-multiple="true">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                    </div>
                                    <div class="form-control bannerFile-amount" id="product_imageFileAmount">Choose file
                                    </div>
                                </div>

                                <div class="row d-flex" id="multipleImgData">
                                    <div class="position-relative d-flex" id="imageContainer">
                                        <?php if($otherImages != ''): ?>
                                            <?php $__currentLoopData = $otherImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="imgs m-1">
                                                    <span class="btn btn-danger btn-sm position-absolute rmMultipleImg"
                                                        id="" style="float: left">&times;</span>
                                                    <img width="100" height="100" class="img" src="<?php echo e(asset($value->file)); ?>" alt="">
                                                    <input type="hidden" id="multipleImgItemId" name="image[]" value="" required>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row mb-4 d-flex form-group">
                            <label for="stockAmount" class="col-md-3 form-label">Tags</label>
                            <div class="example col-md-9">
                                <input type="text" data-role="tagsinput" value="<?php echo e($product->tags); ?>" name="tags"
                                    class="form-control" placeholder="type & press enter">
                            </div>
                        </div>
                        <div class="row mb-4 d-flex form-group">
                            <div class="col-md-3">
                                <label class="form-label" for="type">Refund</label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control " name="refund">
                                    <option class="form-control" label="Choose one" disabled selected></option>
                                    <option value="1" <?php echo e($product->refund == 1 ? 'selected' : ''); ?>>Refundable</option>
                                    <option value="0" <?php echo e($product->refund == 0 ? 'selected' : ''); ?>>Non-Refundable</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4 d-flex form-group">
                            <div class="col-md-3">
                                <label class="form-label" for="type">Feature Product</label>
                            </div>
                            <div class="col-md-9">
                                <div class="material-switch">
                                    <input id="feature_product" value="1"
                                        <?php echo e($product->featured_status == 1 ? 'checked' : ''); ?> name="featured_status"
                                        type="checkbox" />
                                    <label for="feature_product" class="label-primary"></label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4 d-flex form-group">
                            <div class="col-md-3">
                                <label class="form-label" for="type">Publication Status</label>
                            </div>
                            <div class="col-md-9">
                                <div class="material-switch">
                                    <input id="status" value="1" <?php echo e($product->status == 1 ? 'checked' : ''); ?>

                                        name="status" type="checkbox" />
                                    <label for="status" class="label-primary"></label>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary float-end" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            update_sku();

            $('#colors').on('change', function() {
                update_sku();
            });

            $('#choice_attributes').on('change', function() {
                $.each($("#choice_attributes option:selected"), function(j, attribute) {
                    flag = false;
                    $('input[name="choice_no[]"]').each(function(i, choice_no) {
                        if ($(attribute).val() == $(choice_no).val()) {
                            flag = true;
                        }
                    });
                    if (!flag) {
                        add_more_customer_choice_option($(attribute).val(), $(attribute).text());
                    }
                });

                var str = <?php echo $product->attributes ?>;

                $.each(str, function(index, value) {
                    flag = false;
                    $.each($("#choice_attributes option:selected"), function(j, attribute) {
                        if (value == $(attribute).val()) {
                            flag = true;
                        }
                    });
                    if (!flag) {
                        $('input[name="choice_no[]"][value="' + value + '"]').parent().parent()
                            .remove();
                    }
                });

                update_sku();
            });

            $(document).on("change", ".attribute_choice", function() {
                update_sku();
            });

            function update_sku() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: '<?php echo e(route('products-sku-combination-edit')); ?>',
                    data: $('#choice_form').serialize(),
                    success: function(data) {
                        $('#sku_combination').html(data);
                    }
                });
            }

            function add_more_customer_choice_option(i, name) {
                $.ajax({
                    // headers: {
                    //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    // },
                    type: "POST",
                    url: '<?php echo e(route('products.add-more-choice-option')); ?>',
                    data: {
                        attribute_id: i,
                        "_token": "<?php echo e(csrf_token()); ?>",

                    },
                    success: function(data) {
                        var obj = JSON.parse(data);

                        var selectHtml = `
                    <div class="row mb-4" id="product_size">
                            <label for="" class="col-md-3 form-label">Size<span class="text-danger"></span></label>
                            <div class="col-md-9 form-group">
                                <input type="hidden" name="choice_no[]" value="${i}">
                                <select id="mySelect" class="form-control size_multiple attribute_choice select2 select2-show-search" name="choice_options_${i}[]" multiple data-placeholder="Nothing Selected">
                                    <option value="">${obj}</option>
                                </select>
                            </div>
                        </div>
                    `;
                        $('#customer_choice_options').html(selectHtml);
                        $('#mySelect').select2();
                    }
                });
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('seller.Layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\NAHID\seo_multivendor_ecommerce\resources\views/seller/product/edit.blade.php ENDPATH**/ ?>