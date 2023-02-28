
<div class="sidebar-wrapper close_icon">
	<div>
		<div class="logo-wrapper">
			<a href="<?php echo e('/'); ?>"><img class="img-fluid for-light" src="<?php echo e(asset('assets/images/rollswallah.png')); ?>" width="90px" alt=""><img class="img-fluid for-dark" src="<?php echo e(asset('assets/images/logo/logo_dark.png')); ?>" alt=""></a>
			<div class="back-btn"><i class="fa fa-angle-left"></i></div>
			<div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
		</div>
		<div class="logo-icon-wrapper"><a href="<?php echo e('/'); ?>"><img class="img-fluid" src="<?php echo e(asset('assets/images/rollswallah.png')); ?>" width="30px" alt=""></a></div>
		<nav class="sidebar-main">
			<div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
			<div id="sidebar-menu">
				<ul class="sidebar-links" id="simple-bar">
					<li class="back-btn">
						<a href="<?php echo e(route('/')); ?>"><img class="img-fluid" src="<?php echo e(asset('assets/images/rollswallah.png')); ?>" width="150px" alt=""></a>
						<div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
					</li>
					<!-- <li class="sidebar-main-title">
						<div>
							<h6 class="lan-1"><i class="fas fa-store"></i> Store</h6>
							<p>Supliments/Sanitizers/Napkins/etc</p>
                     		
						</div>
					</li>
					<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav <?php echo e(Route::currentRouteName()=='medicine-dashboard' ? 'active' : ''); ?>" href="#"><i class="fas fa-capsules text-secondary h5"></i><span> Medicines</span></a></li>
					<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav <?php echo e(Route::currentRouteName()=='product-dashboard' ? 'active' : ''); ?>" href="<?php echo e(route('product-dashboard')); ?>"><i class="fas fa-pump-soap text-secondary h5"></i><span> Products</span></a></li>
					<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav <?php echo e(Route::currentRouteName()=='grocery-dashboard' ? 'active' : ''); ?>" href="#"><i class="fas fa-pump-soap text-secondary h5"></i><span> Groceries</span></a></li> -->
					<li class="sidebar-main-title">
						<div>
							<h6 class="lan-1"><i class="fas fa-store"></i> Store</h6>
							<p>Ice Creams/Shakes/Fastfood/etc</p>
                     		
						</div>
					</li>
					
					<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav <?php echo e(Route::currentRouteName()=='menu' ? 'active' : ''); ?>" href="<?php echo e(route('menu')); ?>"><i class="fa fa-cutlery text-secondary h5"></i><span>  Menu</span></a></li>
					<li class="sidebar-list "><a class="sidebar-link sidebar-title link-nav <?php echo e(Route::currentRouteName()=='diagnostic-centre' ? 'active' : ''); ?>" href="<?php echo e(route('diagnostic-centres-list')); ?>"><i class="fas fa-shopping-cart text-secondary h5"></i><span>  My Cart (1)</span></a></li>
					<li class="sidebar-list "><a class="sidebar-link sidebar-title link-nav <?php echo e(Route::currentRouteName()=='diagnostic-centre' ? 'active' : ''); ?>" href="#"><i class="fas fa-play text-secondary h5"></i><span>   Videos</span></a></li>
			
			
				<?php if(Auth::check()): ?>
					<li class="sidebar-main-title">
						<div>
							<h6 class="lan-1"><i class="fas fa-user-cog"></i> Settings</h6>
							<p>Security/Orders/Etc...</p>
                     		
						</div>
					</li>
					<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav <?php echo e(Route::currentRouteName()=='profile-password' ? 'active' : ''); ?>" href="<?php echo e(route('profile-password')); ?>"><i class="fas fa-user-lock text-secondary h5"></i><span> Profile & Password</span></a></li>
					<!-- <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav <?php echo e(Route::currentRouteName()=='my-booking-list' ? 'active' : ''); ?>" href="<?php echo e(route('my-booking-list')); ?>"><i class="fas fa-address-card text-secondary h5"></i><span> My Appointments</span></a></li> -->
					<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav <?php echo e(Route::currentRouteName()=='diagnostic-centre' ? 'active' : ''); ?>" href="<?php echo e(route('pathological-labs-list')); ?>"><i class="fas fa-user-clock text-secondary h5"></i><span> Order History</span></a></li>
					<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav <?php echo e(Route::currentRouteName()=='diagnostic-centre' ? 'active' : ''); ?>" href="<?php echo e(route('pathological-labs-list')); ?>"><i class="fas fa-inr text-secondary h5"></i><span> Payments</span></a></li>
					<?php endif; ?>
				

					<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav <?php echo e(Route::currentRouteName()=='support-ticket' ? 'active' : ''); ?>" href="<?php echo e(route('support-ticket')); ?>"><i data-feather="users"> </i><span><?php echo e("Report & Feedback"); ?></span></a></li>
				</ul>
			</div>
			<div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
		</nav>
	</div>
</div><?php /**PATH C:\Users\subra\Documents\projects\kedarCollection\resources\views/userpanel/sidebar.blade.php ENDPATH**/ ?>