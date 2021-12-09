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

									<span class="user-level">Super Admin</span>
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
						<li class="nav-item <?php echo e((request()->is('super-admin')) ? 'active' : ''); ?>">
							<a href="<?php echo e(route('super-admin.dashboard')); ?>">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						
						<li class="nav-item <?php echo e((request()->is('roles')) ? 'active' : ''); ?>">
							<a href="<?php echo e(route('roles.index')); ?>">
								<i class="fas fa-key"></i>
								<p>Roles</p>
							</a>
						</li>

						<li class="nav-item <?php echo e((request()->is('superadmins')) ? 'active' : ''); ?>">
							<a href="<?php echo e(route('super-admins.index')); ?>">
								<i class="fas fa-user-shield"></i>
								<p>Admins</p>
							</a>
						</li>

						<li class="nav-item <?php echo e((request()->is('regions')) || (request()->is('countries')) ? 'active' : ''); ?>">
							<a data-toggle="collapse" href="#location">
								<i class="fas fa-location-arrow"></i>
								<p>Location</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="location">
								<ul class="nav nav-collapse subnav">
									<li>
										<a href="<?php echo e(route('regions.index')); ?>">
											<span class="sub-item">Regions</span>
										</a>
									</li>
									<li>
										<a href="<?php echo e(route('countries.index')); ?>">
											<span class="sub-item">Countries</span>
										</a>
									</li>
								</ul>
							</div>
						</li>

						<li class="nav-item <?php echo e((request()->is('universities')) || (request()->is('campuses')) ? 'active' : ''); ?>">
							<a data-toggle="collapse" href="#university">
								<i class="fas fa-university"></i>
								<p>University</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="university">
								<ul class="nav nav-collapse subnav">
									<li>
										<a href="<?php echo e(route('universities.index')); ?>">
											<span class="sub-item">Universities</span>
										</a>
									</li>
									<li>
										<a href="<?php echo e(route('campuses.index')); ?>">
											<span class="sub-item">Campuses</span>
										</a>
									</li>
									<li>
										<a href="<?php echo e(route('colleges.index')); ?>">
											<span class="sub-item">Colleges</span>
										</a>
									</li>
									
								</ul>
							</div>
						</li>

						<li class="nav-item <?php echo e((request()->is('categories')) || (request()->is('subcategories')) || (request()->is('datatypes')) || (request()->is('subsubcategories')) ? 'active' : ''); ?>">
							<a data-toggle="collapse" href="#content">
								<i class="fas fa-file-alt"></i>
								<p>Content</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="content">
								<ul class="nav nav-collapse subnav">
									<li>
										<a href="<?php echo e(route('categories.index')); ?>">
											<span class="sub-item">Category</span>
										</a>
									</li>
									<li>
										<a href="<?php echo e(route('subcategories.index')); ?>">
											<span class="sub-item">Sub-Category</span>
										</a>
									</li>
									
									<li>
										<a href="<?php echo e(route('datatypes.index')); ?>">
											<span class="sub-item">Data Type</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item <?php echo e((request()->is('issue-categories')) ? 'active' : ''); ?>">
							<a href="<?php echo e(route('issue-categories.index')); ?>">
								<i class="fa fa-question"></i>
								<p>Issue Categories</p>
							</a>
						</li>
						<li class="mx-4 mt-2">
							<!-- <span class="btn-label mr-2"> <i class="fa fa-heart"></i> </span></a>  -->
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar --><?php /**PATH D:\xampp\htdocs\radaweb\resources\views/partials/super-side.blade.php ENDPATH**/ ?>