<!--
<script src="<?php echo e(asset('/')); ?>website/assets/js/jquery-1.9.1.min.js"></script>
<script src="<?php echo e(asset('/')); ?>website/assets/js/jquery.mmenu.js"></script>
<script src="<?php echo e(asset('/')); ?>website/assets/js/jquery-ui.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script src="<?php echo e(asset('/')); ?>website/assets/js/vendor/bootstrap.bundle.min.js"></script>
<script src="<?php echo e(asset('/')); ?>website/assets/js/bootstrap.min.js"></script>
<!-- <script src="<?php echo e(asset('/')); ?>website/assets/js/modernizr-3.6.0.min.js"></script>
<script src="<?php echo e(asset('/')); ?>website/assets/js/owl.carousel.min.js"></script>
<script src="<?php echo e(asset('/')); ?>website/assets/js/owl.carousel.js"></script>
<script src="<?php echo e(asset('/')); ?>website/assets/js/lightslider.js"></script> -->
<script src="<?php echo e(asset('/')); ?>website/assets/js/main.js"></script>
<!-- FORM ELEMENTS JS -->
<script src="<?php echo e(asset('/')); ?>admin/assets/js/form-elements.js"></script>

<script src="<?php echo e(asset('website/assets/dist/js/image-zoom.min.js')); ?>"></script>
<script>
    $(document).ready(function() {
        $('.color-choose input').on('click', function() {
            var watchsColor = $(this).attr('data-image');

            $('.active').removeClass('active');
            $('.left-column img[data-image = ' + watchsColor + ']').addClass('active');
            $(this).addClass('active');
        });

    });
</script>

<script>
    $( ".size" ).click(function() {
        $( ".size" ).css('background-color', 'yellow');
    });
</script>






















<!-- Template  JS -->




<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.8.2/dist/alpine.min.js"></script>

<!-- FORM ELEMENTS JS -->
<script src="<?php echo e(asset('/')); ?>admin/assets/js/form-elements.js"></script>




<!-- <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script> -->
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script src="<?php echo e(asset('/')); ?>website/assets/js/toastr.min.js"></script>
<?php echo Toastr::message(); ?>


<script>

    $(document).ready(function(){
        $('.brand').slick({
            slidesToShow: 12,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows : false,
            responsive: [

                {
                breakpoint: 1920,
                settings: {
                    slidesToShow: 6,
                }
                },
                {
                breakpoint: 768,
                settings: {
                    slidesToShow: 4,
                }
                },
                {
                breakpoint: 575,
                settings: {
                    slidesToShow: 2,
                }
                },


            ]
        });

        $('.top_seling_product').slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 2000,
            arrows : true,
            responsive: [
                {
                breakpoint: 575,
                settings: {
                    slidesToShow: 2,
                }
                },
                {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                }
                },
                {
                breakpoint: 1920,
                settings: {
                    slidesToShow: 4,
                }
                },

            ]
        });
    });

</script>

<script>
    $(document).ready(function () {


        <?php if(auth()->user()): ?>
        getCartDetails();
        getCartCount();
        getWishListCount();
        <?php endif; ?>

        $(document).on('submit', '#addToCartForm', function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            var url = $(this).attr('action');
            $.ajax({
                url: url,
                type: "post",
                dataType: 'json',
                data: formData,
                success: function(res) {
                    if (res.status) {
                        toastr.success('Item Successfully Added.');
                        getCartDetails();
                        getCartCount();
                    } else {
                        toastr.error(res.error);
                    }
                },

                error: function(xhr, status, error) {
                    console.error(xhr);
                }
            });
        });

        function getCartDetails() {
            $.ajax({
                url: "<?php echo e(route('get-cart-details')); ?>",
                type: "GET",
                dataType: 'html',
                success: function(res) {
                    $('#cartDetails').html(res);
                }
            });
        }
        
        function getWishListCount() {
            $.ajax({
                url: "<?php echo e(route('wishlist-couter')); ?>",
                type: "GET",
                dataType: 'html',
                success: function(res) {
                    $('#wishcount').html(res.message);
                }
            });
        }

        function getCartCount() {
            $.ajax({
                url: "<?php echo e(route('get-cart-count')); ?>",
                type: "GET",
                dataType: 'html',
                success: function(res) {
                    $('#cart_counter').html(res);
                }
            });
        }

        $(document).on('click', '.removeBtn', function(e) {
            e.preventDefault();
            var href = $(this).attr('href');
            $.ajax({
                url: href,
                type: "GET",
                dataType: 'json',
                success: function(res) {
                    toastr.success('Item removed successfully!');
                    getCartDetails();
                    getCartCount();
                }
            });
        });
        
        $(document).on('click', '.addToWish', function(e) {
            e.preventDefault();
            var href = $(this).attr('href');
            $.ajax({
                url: href,
                type: "GET",
                dataType: 'json',
                success: function(res) {
                    getWishListCount();
                    toastr.success('Item added to wishlist successfully!');
                }
            });
        });
    });
</script>

<?php echo $__env->yieldPushContent('js'); ?>


<?php /**PATH D:\NAHID\seo_multivendor_ecommerce\resources\views/website/layout/script.blade.php ENDPATH**/ ?>