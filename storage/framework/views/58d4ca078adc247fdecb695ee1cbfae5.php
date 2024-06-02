<!doctype html>
<html lang="en" dir="ltr">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content=''>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <!-- TITLE -->
    <title>SEO Multivendor Ecommerce</title>
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/brand/favicon.ico" />
    <!-- BOOTSTRAP CSS -->
    <link id="style" href="<?php echo e(asset('admin')); ?>/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <!-- STYLE CSS -->
    <link href="<?php echo e(asset('admin')); ?>/assets/css/style.css" rel="stylesheet" />
    <link href="<?php echo e(asset('admin')); ?>/assets/css/skin-modes.css" rel="stylesheet" />
    <!--- FONT-ICONS CSS -->
    <link href="<?php echo e(asset('admin')); ?>/assets/plugins/icons/icons.css" rel="stylesheet" />
    <!-- INTERNAL Switcher css -->
    <link href="<?php echo e(asset('admin')); ?>/assets/switcher/css/switcher.css" rel="stylesheet">
    <link href="<?php echo e(asset('admin')); ?>/assets/switcher/demo.css" rel="stylesheet">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
</head>
<body class="ltr login-img">
    <div class="switcher-wrapper">
        <div class="demo_changer">
            <div class="form_holder sidebar-right1">
                <div class="row">
                    <div class="predefined_styles">
                        <div class="swichermainleft">
                            <h4>LTR and RTL VERSIONS</h4>
                            <div class="skin-body">
                                <div class="switch_section">
                                    <div class="switch-toggle d-flex">
                                        <span class="me-auto">LTR Version</span>
                                        <p class="onoffswitch2"><input type="radio" name="onoffswitch7"
                                                id="myonoffswitch23" class="onoffswitch2-checkbox" checked>
                                            <label for="myonoffswitch23" class="onoffswitch2-label"></label>
                                        </p>
                                    </div>
                                    <div class="switch-toggle d-flex mt-2">
                                        <span class="me-auto">RTL Version</span>
                                        <p class="onoffswitch2"><input type="radio" name="onoffswitch7"
                                                id="myonoffswitch24" class="onoffswitch2-checkbox">
                                            <label for="myonoffswitch24" class="onoffswitch2-label"></label>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swichermainleft">
                            <h4>Light Theme Style</h4>
                            <div class="skin-body">
                                <div class="switch_section">
                                    <div class="switch-toggle d-flex">
                                        <span class="me-auto">Light Theme</span>
                                        <p class="onoffswitch2"><input type="radio" name="onoffswitch1"
                                                id="myonoffswitch1" class="onoffswitch2-checkbox" checked>
                                            <label for="myonoffswitch1" class="onoffswitch2-label"></label>
                                        </p>
                                    </div>
                                    <div class="switch-toggle d-flex">
                                        <span class="me-auto">Light Primary</span>
                                        <div class="">
                                            <input class="wpx-30 h-30 input-color-picker color-primary-light"
                                                value="#8FBD56" id="colorID" type="color" data-id="bg-color"
                                                data-id1="bg-hover" data-id2="bg-border" data-id7="transparentcolor"
                                                name="lightPrimary">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swichermainleft">
                            <h4>Dark Theme Style</h4>
                            <div class="skin-body">
                                <div class="switch_section">
                                    <div class="switch-toggle d-flex mt-2">
                                        <span class="me-auto">Dark Theme</span>
                                        <p class="onoffswitch2"><input type="radio" name="onoffswitch1"
                                                id="myonoffswitch2" class="onoffswitch2-checkbox">
                                            <label for="myonoffswitch2" class="onoffswitch2-label"></label>
                                        </p>
                                    </div>
                                    <div class="switch-toggle d-flex mt-2">
                                        <span class="me-auto">Dark Primary</span>
                                        <div class="">
                                            <input class="wpx-30 h-30 input-dark-color-picker color-primary-dark"
                                                value="#8FBD56" id="darkPrimaryColorID" type="color"
                                                data-id="bg-color" data-id1="bg-hover" data-id2="bg-border"
                                                data-id3="primary" data-id8="transparentcolor" name="darkPrimary">
                                        </div>
                                    </div>
                                    <div class="switch-toggle">
                                        <span class="">Background Image</span>
                                        <div class="mt-1">
                                            <a class="bg-img bg-img1" href="javascript:void(0);"><img
                                                    src="assets/images/media/bg-img1.jpg" alt="Bg-Image"
                                                    id="bgimage1"></a>
                                            <a class="bg-img bg-img2" href="javascript:void(0);"><img
                                                    src="assets/images/media/bg-img2.jpg" alt="Bg-Image"
                                                    id="bgimage2"></a>
                                            <a class="bg-img bg-img3" href="javascript:void(0);"><img
                                                    src="assets/images/media/bg-img3.jpg" alt="Bg-Image"
                                                    id="bgimage3"></a>
                                            <a class="bg-img bg-img4" href="javascript:void(0);"><img
                                                    src="assets/images/media/bg-img4.jpg" alt="Bg-Image"
                                                    id="bgimage4"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swichermainleft">
                            <h4>Reset All Styles</h4>
                            <div class="skin-body">
                                <div class="switch_section my-4">
                                    <button class="btn btn-danger btn-block" id="customresetAll" type="button">Reset
                                        All
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Switcher -->
    <!-- Switcher-->

    <!-- GLOBAL-LOADER -->
    <div id="global-loader">
        <img src="assets/images/loader.svg" class="loader-img" alt="Loader">
    </div>
    <!-- Switcher Icon-->
    <span class="demo-icon">
        <svg class="fe-spin" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24"
            viewBox="0 0 24 24">
            <path
                d="M11.5,7.9c-2.3,0-4,1.9-4,4.2s1.9,4,4.2,4c2.2,0,4-1.9,4-4.1c0,0,0-0.1,0-0.1C15.6,9.7,13.7,7.9,11.5,7.9z M14.6,12.1c0,1.7-1.5,3-3.2,3c-1.7,0-3-1.5-3-3.2c0-1.7,1.5-3,3.2-3C13.3,8.9,14.7,10.3,14.6,12.1C14.6,12,14.6,12.1,14.6,12.1z M20,13.1c-0.5-0.6-0.5-1.5,0-2.1l1.4-1.5c0.1-0.2,0.2-0.4,0.1-0.6l-2.1-3.7c-0.1-0.2-0.3-0.3-0.5-0.2l-2,0.4c-0.8,0.2-1.6-0.3-1.9-1.1l-0.6-1.9C14.2,2.1,14,2,13.8,2H9.5C9.3,2,9.1,2.1,9,2.3L8.4,4.3C8.1,5,7.3,5.5,6.5,5.3l-2-0.4C4.3,4.9,4.1,5,4,5.2L1.9,8.8C1.8,9,1.8,9.2,2,9.4l1.4,1.5c0.5,0.6,0.5,1.5,0,2.1L2,14.6c-0.1,0.2-0.2,0.4-0.1,0.6L4,18.8c0.1,0.2,0.3,0.3,0.5,0.2l2-0.4c0.8-0.2,1.6,0.3,1.9,1.1L9,21.7C9.1,21.9,9.3,22,9.5,22h4.2c0.2,0,0.4-0.1,0.5-0.3l0.6-1.9c0.3-0.8,1.1-1.2,1.9-1.1l2,0.4c0.2,0,0.4-0.1,0.5-0.2l2.1-3.7c0.1-0.2,0.1-0.4-0.1-0.6L20,13.1z M18.6,18l-1.6-0.3c-1.3-0.3-2.6,0.5-3,1.7L13.4,21H9.9l-0.5-1.6c-0.4-1.3-1.7-2-3-1.7L4.7,18l-1.8-3l1.1-1.3c0.9-1,0.9-2.5,0-3.5L2.9,9l1.8-3l1.6,0.3c1.3,0.3,2.6-0.5,3-1.7L9.9,3h3.5l0.5,1.6c0.4,1.3,1.7,2,3,1.7L18.6,6l1.8,3l-1.1,1.3c-0.9,1-0.9,2.5,0,3.5l1.1,1.3L18.6,18z" />
        </svg>
    </span>

    <!-- PAGE -->
    <div class="page">
        <div>
            <!-- CONTAINER OPEN -->
            
            <div class="container-login100">
                <div class="wrap-login100 p-0">
                    <div class="card-body">
                        <?php if(session('message')): ?>
                            <p class="alert alert-primary text-center" x-data="{ show: true }"
                                x-init="setTimeout(() => show = false, 4000)" x-show="show"><?php echo e(session('message')); ?></p>
                        <?php endif; ?>
                        <form class="login100-form validate-form" action="<?php echo e(route('seller.login')); ?>"
                            method="post">
                            <?php echo csrf_field(); ?>
                            <span class="login100-form-title">
                                Login Your Seller Account
                            </span>
                            <div class="wrap-input100 validate-input">
                                <input class="input100" type="text" name="email" placeholder="Email"  value="<?php echo e(old('email')); ?>" required>
                                <b><span class="text-danger"><?php echo e($errors->first('email')); ?></span></b>
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="zmdi zmdi-email" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="wrap-input100 validate-input">
                                <input class="input100" type="password" name="password" placeholder="Password" value="<?php echo e(old('password')); ?>" required>
                                <b><span class="text-danger"><?php echo e($errors->first('password')); ?></span></b>
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="zmdi zmdi-lock" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="text-end pt-1">
                                <p class="mb-0"><a href="<?php echo e(route('seller.ForgotPasswordForm')); ?>"
                                        class="text-primary ms-1">Forgot Password?</a></p>
                            </div>
                            <div class="container-login100-form-btn">
                                <button type="submit" class="login100-form-btn btn-primary">Login</button>
                            </div>
                            <div class="text-center pt-3">
                                <p class="text-dark mb-0">Not a member?<a
                                        href="<?php echo e(route('seller.registrationForm')); ?>"
                                        class="text-primary ms-1">Create an Account</a></p>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-center my-3">
                            <a href="javascript:void(0)" class="social-login  text-center me-4">
                                <i class="fa fa-google"></i>
                            </a>
                            <a href="javascript:void(0)" class="social-login  text-center me-4">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a href="javascript:void(0)" class="social-login  text-center">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JQUERY JS -->
    <script src="<?php echo e(asset('admin')); ?>/assets/plugins/jquery/jquery.min.js"></script>

    <!-- BOOTSTRAP JS -->
    <script src="<?php echo e(asset('admin')); ?>/assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo e(asset('admin')); ?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="<?php echo e(asset('admin')); ?>/assets/plugins/p-scroll/perfect-scrollbar.js"></script>

    <!-- STICKY JS -->
    <script src="<?php echo e(asset('admin')); ?>/assets/js/sticky.js"></script>

    <!-- COLOR THEME JS -->
    <script src="<?php echo e(asset('admin')); ?>/assets/js/themeColors.js"></script>

    <!-- CUSTOM JS -->
    <script src="<?php echo e(asset('admin')); ?>/assets/js/custom.js"></script>

    <!-- SWITCHER JS -->
    <script src="<?php echo e(asset('admin')); ?>/assets/switcher/js/switcher.js"></script>

    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    <?php echo Toastr::message(); ?>


</body>

</html>
<?php /**PATH D:\NAHID\seo_multivendor_ecommerce\resources\views/admin/Sellers/auth/login.blade.php ENDPATH**/ ?>