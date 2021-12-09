		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="<?php echo e(asset('assets/img/profile.jpg')); ?>" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?php echo e(ucfirst(Auth::user()->username)); ?>

									<span class="user-level">Content Creator</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<!-- <li>
										<a href="#profile">
											<span class="link-collapse">My Profile</span>
										</a>
									</li> -->
									<li>
										<a href="<?php echo e(route('profile.index')); ?>">
											<span class="link-collapse">Edit Profile</span>
										</a>
									</li>
									<li>
										<a href="<?php echo e(route('logout')); ?>"onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
											<span class="link-collapse">
											<?php echo e(__('Logout')); ?>


											<form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
												<?php echo csrf_field(); ?>
											</form>
											</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav nav-success">
						<li class="nav-item <?php echo e((request()->is('admin')) ? 'active' : ''); ?>">
							<a href="<?php echo e(route('content-creator.dashboard')); ?>">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Components</h4>
						</li>
						
						<li class="nav-item <?php echo e((request()->is('content')) ? 'active' : ''); ?>">
							<a href="<?php echo e(route('content.index')); ?>">
								<i class="fas fa-user-check"></i>
								<p>Content</p>
							</a>
						</li>
						
						<li class="mx-4 mt-2">
							<!-- <span class="btn-label mr-2"> <i class="fa fa-heart"></i> </span></a>  -->
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar --><?php /**PATH D:\xampp\htdocs\radaweb\resources\views/partials/content-side.blade.php ENDPATH**/ ?>