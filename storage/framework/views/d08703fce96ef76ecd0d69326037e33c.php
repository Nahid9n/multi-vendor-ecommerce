<?php $__env->startSection('title', 'Add Product Page'); ?>
<?php $__env->startSection('body'); ?>
<?php echo $__env->make('modal.common', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row mt-5">
    <div class="col">
        <div class="card">
            <div class="card-header border-bottom justify-content-between">
                <h3 class="card-title text-bold">Add New Product</h3>
                <a href="<?php echo e(route('products.index')); ?>" class="btn btn-primary my-1 mx-2 text-center">All Product</a>
            </div>
            <div class="card-body">
                <form class="" action="<?php echo e(route('products.store')); ?>" method="post" enctype="multipart/form-data"
                    id="choice_form">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="product_type" value="regular-product" readonly>

                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label">Product Name <span
                                    class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" id="" value="<?php echo e(old('name')); ?>" name="name"
                                    placeholder="Product name" required/>
                                <b><span class="text-danger"><?php echo e($errors->first('name')); ?></span></b>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="category_id" class="col-md-3 form-label">Category Name <span
                                    class="text-danger">*</span></label>
                            <div class="col-md-9 form-group">
                                <select name="category_id" class="form-control select2 select2-show-search"
                                    data-placeholder="Select Category" id="category" required>
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
                                            <?php echo e(old('category_id') == $parent_category->id ? 'selected' : ''); ?>>
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
                                <select name="brand_id" class="form-control select2 select2-show-search"
                                    data-placeholder="Select Brand">
                                    <option value="" disabled selected> -- Select Brand --</option>
                                    <?php $__empty_1 = true; $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <option value="<?php echo e($brand->id); ?>"
                                        <?php echo e(old('brand_id') == $brand->id ? 'selected' : ''); ?>> <?php echo e($brand->name); ?>

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
                                <select name="unit_id" class="form-control select2 select2-show-search"
                                    data-placeholder="Select Unit">
                                    <option value="" disabled selected> -- Select Brand --</option>
                                    <?php $__empty_1 = true; $__currentLoopData = $units ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <option value="<?php echo e($unit->id); ?>" <?php echo e(old('unit_id') == $unit->id ? 'selected' : ''); ?>>
                                        <?php echo e($unit->name); ?> </option>
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
                                <input class="form-control" value="<?php echo e(old('bar_code')); ?>" name="bar_code" id="bar_code"
                                    placeholder="Bar code" type="text" />
                                <b><span class="text-danger"><?php echo e($errors->first('bar_code')); ?></span></b>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label">Select Product</label>
                            <div class="col-md-9 form-group">
                                <select name="product_select" class="form-control select2 "
                                    data-placeholder="Select Product" onchange="productSelect(this)">
                                    <option value="single_product"
                                        <?php echo e(old('product_select') == 'single_product' ? 'selected' : ''); ?>>Single Product
                                    </option>
                                    <option value="product_variation"
                                        <?php echo e(old('product_select') == 'product_variation' ? 'selected' : ''); ?>>Product
                                        Variation</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4" id="product_price">
                            <label for="" class="col-md-3 form-label">Product Price<span
                                    class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" value="<?php echo e(old('product_price')); ?>" name="product_price"
                                    id="product_price_change" placeholder="0.01" step=".01" min="0" type="number" />
                                    <b><span class="text-danger"><?php echo e($errors->first('product_price')); ?></span></b>
                                </div>
                            </div>
                            <div class="row mb-4" id="product_stock">
                                <label for="" class="col-md-3 form-label">Product Stock</label>
                                <div class="col-md-9">
                                    <input class="form-control" name="product_stock" value="1" id="product_stock_change" placeholder="1" min="1" type="number" />
                                </div>
                            </div>
                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label">Product Image</label>
                            <div class="col-md-9 test_class">
                                <div class="input-group openImageModal" data-multiple="false" data-inputname="product_image">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                    </div>
                                    <div class="form-control bannerFile-amount" id="product_imageFileAmount">Choose file
                                    </div>
                                </div>

                                <div class="row d-flex" id="product_image"> </div>
                                <b><span class="text-danger"><?php echo e($errors->first('product_image')); ?></span></b>
                            </div>
                        </div>
                        <div class="row mb-4" id="product_color" style="display: none">

                            <label for="" class="col-md-3 form-label">Product Color<span
                                    class="text-danger"></span></label>
                            <div class="col-md-9 form-group">
                                <select class="form-control color_multiple select2 select2-show-search"
                                    name="colors[]" id="colors" multiple="multiple"
                                    data-placeholder="Nothing Selected">
                                    <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($color->code); ?>"> <?php echo e($color->name); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4" id="product_attribute" style="display: none">
                            <label for="" class="col-md-3 form-label">Product Attributes <span
                                    class="text-danger"></span></label>
                            <div class="col-md-9 form-group">
                                <select name="choice_attributes[]" id="choice_attributes"
                                class="form-control select2 select2-show-search"
                                data-placeholder="Choose Attributes">  
                                <option value="">Choose Attributes</option>
                                <?php $__currentLoopData = \App\Models\Attribute::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($attribute->id); ?>"><?php echo e($attribute->name); ?>

                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="customer_choice_options" id="customer_choice_options"></div>
                    </div>

                    <div id="prouduct_combination">
                        <div class="sku_combination" id="sku_combination"></div>
                    </div>
                    <div class="row mb-4">
                        <label for="shipping_cost" class="col-md-3 form-label">Shipping Cost<span
                                class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <input class="form-control" id="shipping_cost"  name="shipping_cost" placeholder="Shipping Cost" type="number" required />
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="description" class="col-md-3 form-label">Short Description</label>
                        <div class="col-md-9">
                                <textarea class="form-control" name="short_description" id="short_description" placeholder="Short Description" ></textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="summernote" class="col-md-3 form-label">Long Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="long_description" id="summernote" placeholder="Long Description" value="<?php echo e(old('long_description')); ?>"></textarea>
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

                                </div>
                            </div>
                        </div>

                        <div class="row mb-4 d-flex form-group">
                            <label for="stockAmount" class="col-md-3 form-label">Tags</label>
                            <div class="example col-md-9">
                                <input type="text" data-role="tagsinput" name="tags" class="form-control"
                                    placeholder="type & press enter">
                            </div>
                        </div>

                        <div class="row mb-4 d-flex form-group">
                            <div class="col-md-3">
                                <label class="form-label" for="type">Refund</label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control select2 select2-show-search form-select"
                                    data-placeholder="Select One" name="refund">
                                    <option value="1">Refundable</option>
                                    <option value="0" selected>Non-Refundable</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4 d-flex form-group">
                            <div class="col-md-3">
                                <label class="form-label" for="type">Feature Product</label>
                            </div>
                            <div class="col-md-9">
                                <div class="material-switch">
                                    <input id="feature_product" value="1" name="featured_status"
                                        <?php echo e(old('featured_status') ? 'checked' : ''); ?> type="checkbox" />
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
                                    <input id="status" value="1" name="status" checked type="checkbox" />
                                    <label for="status" class="label-primary"></label>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary float-end" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>

<script>
    $(document).ready(function (){

        $('#colors').on('change', function() {
            update_sku();
        });

        $('#choice_attributes').on('change', function() {
            $('#customer_choice_options').html(null);
            $.each($("#choice_attributes option:selected"), function() {
                add_more_customer_choice_option($(this).val(), $(this).text());
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
                url: '<?php echo e(route('seller.products.sku_combination')); ?>',
                data: $('#choice_form').serialize(),
                success: function(data) {
                    // console.log(data);
                    $('#sku_combination').html(data);
                }
            });
        }

        function add_more_customer_choice_option(i, name) {
            $.ajax({
                type: "POST",
                url: '<?php echo e(route('products.add-more-choice-option')); ?>',
                data: {
                    attribute_id: i,
                    "_token": "<?php echo e(csrf_token()); ?>",
                },
                success: function(data) {
                    var obj = JSON.parse(data);

                    var selectHtml =`
                    <div class="row mb-4" id="product_size">
                            <label for="" class="col-md-3 form-label">Size<span class="text-danger"></span></label>
                            <div class="col-md-9 form-group">
                                <input type="hidden" name="choice_no[]" value="${i}">
                                <select id="mySelect" class="form-control size_multiple attribute_choice select2 select2-show-search" name="choice_options_${i}[]" multiple data-placeholder="Nothing Selected" required>
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

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Project\seo_multivendor_ecommerce\resources\views/admin/product/product_all/add.blade.php ENDPATH**/ ?>