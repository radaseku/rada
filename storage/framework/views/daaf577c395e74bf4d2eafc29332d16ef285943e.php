<?php
 if(Auth::user()->adminRole->name != 'admin')
  {
	header("Location: /login");
	die();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Admin | <?php echo e(config('app.name')); ?></title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?php echo e(asset('assets/img/icon.ico')); ?>" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="<?php echo e(asset('assets/js/plugin/webfont/webfont.min.js')); ?>"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ["<?php echo e(asset('assets/css/fonts.min.css')); ?>"]},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/css/atlantis.min.css')); ?>">


</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="green">
				
				<a href="" class="logo">
					<span class="navbar-brand text-white"><?php echo e(config('app.name', 'RADA SEKU')); ?></span>
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="green">
				
				<div class="container-fluid">
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="<?php echo e(asset('assets/img/profile.jpg')); ?>" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg"><img src="<?php echo e(asset('assets/img/profile.jpg')); ?>" alt="image profile" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4><?php echo e(ucfirst(Auth::user()->username)); ?></h4>
												<p class="text-muted"><?php echo e(Auth::user()->email); ?></p>
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">My Profile</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="<?php echo e(route('logout')); ?>"onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
											<span class="link-collapse">
											<?php echo e(__('Logout')); ?>


											<form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
												<?php echo csrf_field(); ?>
											</form>
											</span>
										</a>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
        <?php echo $__env->make('partials.admin-side', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- /end sidebar -->
		<div class="main-panel">
			<div class="content">
                <!-- content -->
                <?php echo $__env->yieldContent('content'); ?>
                <!-- end content -->
			</div>
			<footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
						<ul class="nav">
							<li class="nav-item">
								<a class="nav-link" href="#">
									<?php echo e(config('app.name')); ?>

								</a>
							</li>
						</ul>
					</nav>
					<div class="copyright ml-auto">
						2021 All rights reserved
					</div>				
				</div>
			</footer>
		</div>
		
	</div>
	<?php if(isset($userschart)): ?>
		<?php echo $userschart->script(); ?>

	<?php endif; ?>
	<!-- Vue app.js requirement -->
	<script src="<?php echo e(asset('js/app.js')); ?>"></script>
	<!-- Chartjs -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
	<!--   Core JS Files   -->
	<script src="<?php echo e(asset('assets/js/core/jquery.3.2.1.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/js/core/popper.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/js/core/bootstrap.min.js')); ?>"></script>

	<!-- jQuery UI -->
	<script src="<?php echo e(asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')); ?>"></script>

	<!-- jQuery Scrollbar -->
	<script src="<?php echo e(asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')); ?>"></script>


	<!-- Chart JS -->
	<script src="<?php echo e(asset('assets/js/plugin/chart.js')); ?>"></script>

	<!-- jQuery Sparkline -->
	<script src="<?php echo e(asset('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js')); ?>"></script>

	<!-- Chart Circle -->
	<script src="<?php echo e(asset('assets/js/plugin/chart-circle/circles.min.js')); ?>"></script>

	<!-- Datatables -->
	<script src="<?php echo e(asset('assets/js/plugin/datatables/datatables.min.js')); ?>"></script>

	<!-- Bootstrap Notify -->
	<script src="<?php echo e(asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js')); ?>"></script>

	<!-- jQuery Vector Maps -->
	<script src="<?php echo e(asset('assets/js/plugin/jqvmap/jquery.vmap.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/js/plugin/jqvmap/maps/jquery.vmap.world.js')); ?>"></script>

	<!-- Sweet Alert -->
	<script src="<?php echo e(asset('assets/js/plugin/sweetalert/sweetalert.min.js')); ?>"></script>

	<!-- Atlantis JS -->
	<script src="<?php echo e(asset('assets/js/atlantis.min.js')); ?>"></script>
	<script>
	$(document).ready(function() {
		$('#table').DataTable({
			"order": [[ 0, "desc" ]]
		});
	});
	</script>
</body>
</html><?php /**PATH D:\xampp\htdocs\radaweb\resources\views/layouts/admin.blade.php ENDPATH**/ ?>