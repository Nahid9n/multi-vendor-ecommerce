<footer class="footer-area mt-50">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-xl-4 col-md-4 col-sm-12 col-12 my-2">
                <div class="">
                    <img src="<?php echo e((isset($websiteInfos->logo))? asset($websiteInfos->logo) : asset('dummy-logo.jpg')); ?>" alt="logo">
                </div>
                <div class="my-4">
                    <p><?php echo $websiteInfos->about ?? 'N/A'; ?></p>
                </div>

            </div>
            <?php if(isset(auth()->user()->id)): ?>
            <?php else: ?>
                <div class="col-xl-2 col-lg-4 col-md-4 col-sm-4 col-12">
                    <div class="fooer-widget fw">
                        <h4>Quick Links</h4>
                        <div class="footer-menu">
                            <ul>
                                <li><a href="#">Review </a></li>
                                <li><a href="#">Articles</a></li>
                                <li><a href="#">About us</a></li>
                                <li><a href="#">Contact us</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endif; ?>


            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 col-12 my-2">
                <div class="fooer-widget fw">
                    <h4>Stay In Touch</h4>
                    <div class="footer-menu">
                        <ul>
                            <li><i class="fa fa-volume-control-phone"></i><a href="#"><?php echo e($website_setting->mobile ?? 'N/A'); ?></a></li>
                            <li><i class="fa fa-envelope"></i><a href="#"><?php echo e($website_setting->email ?? 'N/A'); ?></a></li>
                            <li><i class="fa fa-map-marker"></i><a href="#"><?php echo e($website_setting->address ?? 'N/A'); ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 col-12 my-2">
                <div class="fooer-widget fw">
                    <h4>Connect with</h4>
                    <div class="footer-menu">
                        <ul>
                            <li><a href="<?php echo e($website_setting->facebook ?? '#'); ?>">Facebook</a></li>
                            <li><a href="<?php echo e($website_setting->twitter ?? '#'); ?>">Twitter</a></li>
                            <li><a href="<?php echo e($website_setting->linkedIn ?? '#'); ?>">LinkedIn</a></li>
                        </ul>
                    </div>
                </div>
                <form action="<?php echo e(route('subscribe.store')); ?>" method="POST" style="max-width: 370px;">
                    <?php echo csrf_field(); ?>
                    <div class="input-group my-3">
                        <input type="email" class="form-control" name="email" placeholder="Enter email for subscribe" required>
                        <div class="input-group-append">
                            <button class="subscribeBtn">Subscribe</button>
                        </div>
                    </div>
                </form>
                <?php if(!auth()->user()): ?>

                    <ul>
                        <li>
                            <a href="<?php echo e(route('delivery-boy.login')); ?>">Delivery Boy Logim</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('seller.loginForm')); ?>">Seller Login</a>
                        </li>

                    </ul>

                <?php endif; ?>

            </div>
        </div>
    </div>
    <div class="f_right">
        <p>Seo Expate Bangladesh © 2024. All Rights Reserved.</p>
    </div>
</footer>
<?php /**PATH F:\Project\seo_multivendor_ecommerce\resources\views/website/layout/footer.blade.php ENDPATH**/ ?>