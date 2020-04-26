<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="<?php echo e(asset('fresh/images/favicon.ico')); ?>" type="image/x-icon">
    <link rel="apple-touch-icon" href="<?php echo e(asset('fresh/images/apple-touch-icon.png')); ?>">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('fresh/css/bootstrap.min.css')); ?>">
    <!-- Site CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('fresh/css/style.css')); ?>">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('fresh/css/responsive.css')); ?>">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('fresh/css/custom.css')); ?>">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- Start Main Top -->
    <?php echo $__env->make('layout.top', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Main Top -->

    <!-- Start Main Top -->
    <?php echo $__env->make('layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Main Top -->

    <!-- Start Top Search -->
    
    <!-- End Top Search -->

    <!-- Start Slider -->
    <?php echo $__env->yieldContent('content'); ?>
    <!-- End Blog  -->


    <!-- Start Instagram Feed  -->
    <?php echo $__env->make('layout.ins', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Instagram Feed  -->


    <!-- Start Footer  -->
    <?php echo $__env->make('layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Footer  -->

    <!-- Start copyright  -->
    <div class="footer-copyright">
        <p class="footer-company">All Rights Reserved. &copy; 2018 <a href="#">ThewayShop</a> Design By :
            <a href="<?php echo e(asset('https://html.design/')); ?>">html design</a></p>
    </div>
    <!-- End copyright  -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

    <!-- ALL JS FILES -->
    <script src="<?php echo e(asset('fresh/js/jquery-3.2.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('fresh/js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('fresh/js/bootstrap.min.js')); ?>"></script>
    <!-- ALL PLUGINS -->
    <script src="<?php echo e(asset('fresh/js/jquery.superslides.min.js')); ?>"></script>
    <script src="<?php echo e(asset('fresh/js/bootstrap-select.js')); ?>"></script>
    <script src="<?php echo e(asset('fresh/js/inewsticker.js')); ?>"></script>
    <script src="<?php echo e(asset('fresh/js/bootsnav.js')); ?>"></script>
    <script src="<?php echo e(asset('fresh/js/images-loded.min.js')); ?>"></script>
    <script src="<?php echo e(asset('fresh/js/isotope.min.js')); ?>"></script>
    <script src="<?php echo e(asset('fresh/js/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(asset('fresh/js/baguetteBox.min.js')); ?>"></script>
    <script src="<?php echo e(asset('fresh/js/form-validator.min.js')); ?>"></script>
    <script src="<?php echo e(asset('fresh/js/contact-form-script.js')); ?>"></script>
    <script src="<?php echo e(asset('fresh/js/custom.js')); ?>"></script>
</body>

</html><?php /**PATH C:\xampp\htdocs\prak_prognet\resources\views/layout/app.blade.php ENDPATH**/ ?>