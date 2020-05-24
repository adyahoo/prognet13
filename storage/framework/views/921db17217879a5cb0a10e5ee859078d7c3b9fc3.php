<!DOCTYPE html>
<html lang="en">
<head>
	<title>User Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo e(asset('assets/images/icons/favicon.ico')); ?>"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendor/bootstrap/css/bootstrap.min.css')); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css')); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendor/animate/animate.css')); ?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendor/css-hamburgers/hamburgers.min.css')); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendor/select2/select2.min.css')); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/util.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/main.css')); ?>">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<?php if(count($errors)>0): ?>
		<div class="alert alert-danger">
			<ul>
				<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<li><?php echo e($error); ?></li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</ul>
		</div>
		<?php endif; ?>
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="<?php echo e(asset('logsig/images/img-01.png')); ?>" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="POST" action="/userLogin">
					<?php echo csrf_field(); ?>
					<span class="login100-form-title">
						User Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid Email is required">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#">
							Email / Password?
						</a>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="/">
							Home |
						</a>
						<a class="txt2" href="/userRegister">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="<?php echo e(asset('assets/vendor/jquery/jquery-3.2.1.min.js')); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo e(asset('assets/vendor/bootstrap/js/popper.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/vendor/bootstrap/js/bootstrap.min.js
	')); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo e(asset('assets/vendor/select2/select2.min.js')); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo e(asset('assets/vendor/tilt/tilt.jquery.min.js')); ?>"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="<?php echo e(asset('assets/js/main.js')); ?>"></script>

</body>
</html><?php /**PATH C:\xampp\htdocs\prognet13\resources\views/auth/userlogin.blade.php ENDPATH**/ ?>