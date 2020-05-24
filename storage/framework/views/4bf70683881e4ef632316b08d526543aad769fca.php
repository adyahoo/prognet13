<!DOCTYPE html>
<!-- <<<<<<< HEAD -->
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

</html>
<!-- ======= -->
<!-- <html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title> -->

        <!-- Fonts -->
        <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet"> -->

        <!-- Styles -->
      <!--   <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <?php if(Route::has('login')): ?>
                <div class="top-right links">
                    <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(url('/home')); ?>">Home</a>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>">Login</a>

                        <?php if(Route::has('register')): ?>
                            <a href="<?php echo e(route('register')); ?>">Register</a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html> -->
<!-- >>>>>>> master -->
<?php /**PATH C:\xampp\htdocs\prognet13\resources\views/layout/app.blade.php ENDPATH**/ ?>