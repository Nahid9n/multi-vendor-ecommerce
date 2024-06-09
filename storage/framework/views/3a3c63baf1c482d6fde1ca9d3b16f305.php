<?php $__env->startSection('title','Home Page'); ?>

<?php $__env->startSection('body'); ?>

<?php if(\Request::route()->getName() == 'home'): ?>

<!--slider-section start-->
<?php echo $__env->make('website.layout.slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!--slider-section end-->

<!--banner section start-->
<?php echo $__env->make('website.layout.banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!--banner section end-->

<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Project\Seo Mutlivendor Home\seo_multivendor_ecommerce\resources\views/website/home/index.blade.php ENDPATH**/ ?>