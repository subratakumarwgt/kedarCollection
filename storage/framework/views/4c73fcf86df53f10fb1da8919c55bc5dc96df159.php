<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/font-awesome.css')); ?>">
<!-- ico-font-->
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/icofont.css')); ?>">
<!-- Themify icon-->
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/themify.css')); ?>">
<!-- Flag icon-->
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/flag-icon.css')); ?>">
<!-- Feather icon-->
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/feather-icon.css')); ?>">
<!-- Plugins css start-->
<link href="<?php echo e(asset('assets/css/vendors/select2.css')); ?>" rel="stylesheet" />
<?php echo $__env->yieldContent('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/scrollbar.css')); ?>">
<!-- Bootstrap css-->
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/bootstrap.css')); ?>">
<!-- App css-->
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/style.css')); ?>">
<link id="color" rel="stylesheet" href="<?php echo e(asset('assets/css/color-1.css')); ?>" media="screen">
<!-- Responsive css-->
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/responsive.css')); ?>">
<?php ($modules = \App\Models\Module::whereNull("parent_id")->get()); ?>

<div class="sidebar-wrapper">
	<div>
		<div class="logo-wrapper">
			<a href="<?php echo e('/management/dashboard'); ?>"><img class="img-fluid for-light p-0 m-0" src="<?php echo e(asset('assets/images/logo/logo.png')); ?>" alt="" width="40px"><img class="img-fluid for-dark" src="<?php echo e(asset('assets/images/logo/logo.png')); ?>" alt=""></a>
			<div class="back-btn"><i class="fa fa-angle-left"></i></div>
			<div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"></i></div>
		</div>
		<div class="logo-icon-wrapper"><a href="<?php echo e('/management/dashboard'); ?>"><img class="img-fluid" src="<?php echo e(asset('assets/images/logo/logo.png')); ?>" alt="" width="40px"></a></div>
		<nav class="sidebar-main">
			<div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
			<div id="sidebar-menu">
				<ul class="sidebar-links" id="simple-bar">
					<li class="back-btn">
						<a href="<?php echo e(route('/')); ?>"><img class="img-fluid" src="<?php echo e(asset('assets/images/logo/logo.png')); ?>" alt="" width="40px"></a>
						<div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
					</li>
                    <?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li class="sidebar-main-title">
						<div>
							<h6 class="lan-1"><?php echo e($module->name); ?> </h6>                     		
						</div>
					</li>
                    <?php ($sub_modules = \App\Models\Module::where("parent_id",$module->id)->get()); ?>

                    <?php $__currentLoopData = $sub_modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					
					<?php if(Auth::User()->can('see_module_'.$sub_module->slug)): ?>

                    <?php if(!empty($sub_module->has_child)): ?>
                    
					<li class="sidebar-list">
						<a class="sidebar-link sidebar-title <?php echo e(str_contains(url()->current(),$sub_module->prefix) ? 'active' : ''); ?>" href="#"><i class="<?php echo e($sub_module->icon); ?> text-secondary h5"></i>  <span class="lan-3"><?php echo e($sub_module->name); ?></span>
							<div class="according-menu"><i class="fa fa-angle-<?php echo e(str_contains(url()->current(),$sub_module->prefix) ? 'down' : 'right'); ?>"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: <?php echo e(str_contains(url()->current(),$sub_module->prefix) ? 'block;' : 'none;'); ?>">
                        <?php ($urls = \App\Models\Module::where("parent_id",$sub_module->id)->get()); ?>
                         <?php $__currentLoopData = $urls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li><a class="lan-4 <?php echo e(Route::currentRouteName()== $url->route_name ? 'active' : ''); ?>" href="<?php echo e(route($url->route_name)); ?>"><i class="<?php echo e($url->icon); ?>"></i> <?php echo e($url->name); ?></a></li>
                     		
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</ul>
					</li>
                    <?php else: ?>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav <?php echo e(Route::currentRouteName()== $sub_module->route_name ? 'active' : ''); ?>" href="<?php echo e(route($sub_module->route_name)); ?>"><i class="<?php echo e($sub_module->icon); ?> text-secondary h5"></i><span> <?php echo e($sub_module->name); ?></span></a></li>				
                    <?php endif; ?>
					<?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					
					<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav <?php echo e(Route::currentRouteName() == 'knowledgebase' ? 'active' : ''); ?>" href="<?php echo e(route('knowledgebase')); ?>"><i data-feather="sunrise"> </i><span><?php echo e(trans('lang.Knowledgebase')); ?></span></a></li>
					<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav <?php echo e(Route::currentRouteName()=='support-ticket' ? 'active' : ''); ?>" href="<?php echo e(route('support-ticket')); ?>"><i data-feather="users"> </i><span><?php echo e(trans('lang.Support Ticket')); ?></span></a></li>
				</ul>
			</div>
			<div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
		</nav>
	</div>
</div><?php /**PATH C:\Users\subra\Documents\projects\kedarCollection\resources\views/adminpanel/dynamic_sidebar.blade.php ENDPATH**/ ?>