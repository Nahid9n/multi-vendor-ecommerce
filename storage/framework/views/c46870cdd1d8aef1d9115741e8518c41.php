<!doctype html>
<html lang="en" dir="ltr">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta name="csrf-token" id="csrf-token" content="<?php echo e(csrf_token()); ?>">
<head>

    <?php echo $__env->make('admin.Layout.meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- TITLE -->
    <title>Ecom - <?php echo $__env->yieldContent('title'); ?></title>

    <?php echo $__env->make('admin.Layout.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- JQUERY JS -->

</head>

<body class="ltr app sidebar-mini">

    <!-- GLOBAL-LOADER -->

    <!-- /GLOBAL-LOADER -->

    <!-- PAGE -->
    <div class="page">
        <div class="page-main">

            <!-- app-Header -->
            <?php echo $__env->make('admin.Layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- /app-Header -->

            <!--APP-SIDEBAR-->
            <?php echo $__env->make('admin.Layout.side-bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!--/APP-SIDEBAR-->

            <!--app-content open-->
            <div class="app-content main-content mt-0">
                <div class="side-app">
                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">
                        <?php echo $__env->yieldContent('body'); ?>
                    </div>
                </div>
            </div>
            <!-- CONTAINER CLOSED -->
        </div>

        <!-- Country-selector modal-->
        <div class="modal fade" id="country-selector">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content country-select-modal">
                    <div class="modal-header">
                        <h6 class="modal-title">Choose Country</h6><button aria-label="Close" class="btn-close"
                            data-bs-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <ul class="row row-sm p-3">
                            <li class="col-lg-4 mb-2">
                                <a class="btn btn-country btn-lg btn-block active">
                                    <span class="country-selector"><img alt="unitedstates"
                                            src="<?php echo e(asset('/')); ?>admin/assets/images/flags/us_flag.jpg"
                                            class="me-2 language"></span>United States
                                </a>
                            </li>
                            <li class="col-lg-4 mb-2">
                                <a class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt="italy"
                                            src="<?php echo e(asset('/')); ?>admin/assets/images/flags/italy_flag.jpg"
                                            class="me-2 language"></span>Italy
                                </a>
                            </li>
                            <li class="col-lg-4 mb-2">
                                <a class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt="spain"
                                            src="<?php echo e(asset('/')); ?>admin/assets/images/flags/spain_flag.jpg"
                                            class="me-2 language"></span>Spain
                                </a>
                            </li>
                            <li class="col-lg-4 mb-2">
                                <a class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt="india"
                                            src="<?php echo e(asset('/')); ?>admin/assets/images/flags/india_flag.jpg"
                                            class="me-2 language"></span>India
                                </a>
                            </li>
                            <li class="col-lg-4 mb-2">
                                <a class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt="french"
                                            src="<?php echo e(asset('/')); ?>admin/assets/images/flags/french_flag.jpg"
                                            class="me-2 language"></span>French
                                </a>
                            </li>
                            <li class="col-lg-4 mb-2">
                                <a class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt="russia"
                                            src="<?php echo e(asset('/')); ?>admin/assets/images/flags/russia_flag.jpg"
                                            class="me-2 language"></span>Russia
                                </a>
                            </li>
                            <li class="col-lg-4 mb-2">
                                <a class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt="germany"
                                            src="<?php echo e(asset('/')); ?>admin/assets/images/flags/germany_flag.jpg"
                                            class="me-2 language"></span>Germany
                                </a>
                            </li>
                            <li class="col-lg-4 mb-2">
                                <a class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt="argentina"
                                            src="<?php echo e(asset('/')); ?>admin/assets/images/flags/argentina_flag.jpg"
                                            class="me-2 language"></span>Argentina
                                </a>
                            </li>
                            <li class="col-lg-4 mb-2">
                                <a class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt="uae"
                                            src="<?php echo e(asset('/')); ?>admin/assets/images/flags/uae_flag.jpg"
                                            class="me-2 language"></span>UAE
                                </a>
                            </li>
                            <li class="col-lg-4 mb-2">
                                <a class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt="austria"
                                            src="<?php echo e(asset('/')); ?>admin/assets/images/flags/austria_flag.jpg"
                                            class="me-2 language"></span>Austria
                                </a>
                            </li>
                            <li class="col-lg-4 mb-2">
                                <a class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt="mexico"
                                            src="<?php echo e(asset('/')); ?>admin/assets/images/flags/mexico_flag.jpg"
                                            class="me-2 language"></span>Mexico
                                </a>
                            </li>
                            <li class="col-lg-4 mb-2">
                                <a class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt="china"
                                            src="<?php echo e(asset('/')); ?>admin/assets/images/flags/china_flag.jpg"
                                            class="me-2 language"></span>China
                                </a>
                            </li>
                            <li class="col-lg-4 mb-2">
                                <a class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt="poland"
                                            src="<?php echo e(asset('/')); ?>admin/assets/images/flags/poland_flag.jpg"
                                            class="me-2 language"></span>Poland
                                </a>
                            </li>
                            <li class="col-lg-4 mb-2">
                                <a class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt="canada"
                                            src="<?php echo e(asset('/')); ?>admin/assets/images/flags/canada_flag.jpg"
                                            class="me-2 language"></span>Canada
                                </a>
                            </li>
                            <li class="col-lg-4 mb-2">
                                <a class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt="malaysia"
                                            src="<?php echo e(asset('/')); ?>admin/assets/images/flags/malaysia_flag.jpg"
                                            class="me-2 language"></span>Malaysia
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Country-selector modal-->

        <!-- Modal -->
        <?php echo $__env->make('admin.Layout.modals.exampleModalScrollable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('admin.Layout.modals.exampleModalScrollable2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- FOOTER -->
        <?php echo $__env->make('admin.Layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- FOOTER CLOSED -->

    </div>
    <!-- page -->

    <!-- BACK-TO-TOP -->
    <a href="#top" id="back-to-top"><i class="fa fa-long-arrow-up"></i></a>

    <?php echo $__env->make('admin.Layout.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.Layout.file-upload-ajax', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script>
    /* wholeSale Product Status Change*/
    $(document).ready(function() {

        $('.color_multiple').select2();
        $('.size_multiple').select2();

        toastr.options = {
            "closeButton": true,
            "newestOnTop": true,
            "positionClass": "toast-top-right"
        };

        $('.wholeSaleProductStatus').on('change', function() {

            var id = $(this).closest('tr').prop('id');

            $.ajax({
                url: "<?php echo e(route('whole-sale-product-type.update_status')); ?>",
                type: 'post',
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    'status': this.value,
                    'id': id
                },
                dataType: 'json',
                success: function(res) {
                    if (res.message) {
                        toastr.success(res.message);
                    }

                    if (res.error) {
                        toastr.error(res.error);
                    }

                }
            });
        });


        $('#searchTerm').on('keyup', function() {
            var searchTerm = $(this).val().trim();
            console.log(searchTerm);
            if (searchTerm.length >= 1) {
                $.ajax({
                    url: "<?php echo e(route('admin.file.search')); ?>",
                    type: 'GET',
                    data: {
                        search: searchTerm
                    },
                    success: function(response) {
                        $('.ajax_data').html(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });

        $('#searchTerm2').on('keyup', function() {
            var searchTerm = $(this).val().trim();
            console.log(searchTerm);
            if (searchTerm.length >= 1) {
                $.ajax({
                    url: "<?php echo e(route('admin.file.search')); ?>",
                    type: 'GET',
                    data: {
                        search: searchTerm
                    },
                    success: function(response) {
                        $('.ajax_data').html(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });

        $('#searchTerm3').on('keyup', function() {
            var searchTerm = $(this).val().trim();
            console.log(searchTerm);
            if (searchTerm.length >= 1) {
                $.ajax({
                    url: "<?php echo e(route('admin.file.search')); ?>",
                    type: 'GET',
                    data: {
                        search: searchTerm
                    },
                    success: function(response) {
                        $('.ajax_data').html(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });

        $('#searchTerm4').on('keyup', function() {
            var searchTerm = $(this).val().trim();
            console.log(searchTerm);
            if (searchTerm.length >= 1) {
                $.ajax({
                    url: "<?php echo e(route('admin.file.search')); ?>",
                    type: 'GET',
                    data: {
                        search: searchTerm
                    },
                    success: function(response) {
                        $('.ajax_data').html(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });

        $('#searchTerm5').on('keyup', function() {
            var searchTerm = $(this).val().trim();
            console.log(searchTerm);
            if (searchTerm.length >= 1) {
                $.ajax({
                    url: "<?php echo e(route('admin.file.search')); ?>",
                    type: 'GET',
                    data: {
                        search: searchTerm
                    },
                    success: function(response) {
                        $('.ajax_data').html(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });

        $('#searchTerm6').on('keyup', function() {
            var searchTerm = $(this).val().trim();
            console.log(searchTerm);
            if (searchTerm.length >= 1) {
                $.ajax({
                    url: "<?php echo e(route('admin.file.search')); ?>",
                    type: 'GET',
                    data: {
                        search: searchTerm
                    },
                    success: function(response) {
                        $('.ajax_data').html(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });

    });
    </script>

    <script>
    function productSelect(e) {
        if (e.value == 'product_variation') {
            $('#sku_combination').html('');
            $('#product_color').show();
            $('#product_attribute').show();
            $('#product_stock').hide();
            $('#product_stock_change').val("");
            $('#product_option').show();
            $('#prouduct_combination').show();
        }

        if (e.value == 'single_product') {
            $('#product_color').hide();
            $('#colors').val("");
            $('#choice_attributes').val("");
            $('#customer_choice_options').html(null)
            $('#product_attribute').hide();
            $('#product_stock').show();
            $('#product_stock_change').val("");
            $('#product_option').hide();
            $('#prouduct_combination').hide();
        }
    }
    </script>

</body>

</html>
<?php /**PATH F:\Project\Seo Mutlivendor Home\seo_multivendor_ecommerce\resources\views/admin/master.blade.php ENDPATH**/ ?>