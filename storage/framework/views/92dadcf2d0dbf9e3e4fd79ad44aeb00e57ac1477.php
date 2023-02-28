<?php ($cart_rows = new App\View\Components\userpanel\cartRows); ?>
<div class="header">
    <header class="navbar navbar-expand-sm navbar-fixed header_main " >
        <div class="container">
            <div class="navbar-nav-wrap align-items-center justify-content-between">
                <a class="site-brand p-1" href="/">
                <img src="/images/logosmall.png" width="45" />
                </a>
                <button class="menu-toggle ml-auto">
                    <span class="menu-bar"></span>
                    <span class="menu-bar"></span>
                    <span class="menu-bar"></span>
                </button>
                <div class="nav_wrap navbar-nav align-items-center">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="/" class="nav-link">HOME</a>
                        </li>
                        <li class="nav-item dropdown">
                      
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">COLLECTIONS</a>
                            <div class="dropdown-menu">                              
                                <?php $__currentLoopData = $collections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $collection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a class="dropdown-item" href="<?php echo e(route('shop-by-collection',['id'=>$collection->id])); ?>"><?php echo e($collection->name); ?></a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                       
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">CATEGORIES</a>
                            <div class="dropdown-menu">                                
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a class="dropdown-item" href="<?php echo e(route('shop-by-category',['id'=>$category->id])); ?>"><?php echo e($category->name); ?></a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">SHOP</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Link 1</a>
                                <a class="dropdown-item" href="#">Link 2</a>
                                <a class="dropdown-item" href="#">Link 3</a>
                            </div>
                        </li>
                        <li class="nav-item pull-right">
                            <a href="#" class="nav-link">CONTACT US</a>
                        </li>
                        <li class="nav-item pull-right">
                            <a href="#" class="nav-link">FEEDBACK</a>
                        </li>
                    </ul>
                    <div class="nav_right">
                        <ul class="nav">
                            <li class="nav-item dropdown notification">
                                <a href="#" class="nav-link mini_cart dropdown-toggle" data-toggle="dropdown">
                                    <span class="notification_ind"></span><small><strong id="cart_count">(<?php echo e($cart_rows->cart_items_count); ?>)</strong></small>
                                    <img src="/images/cart.svg" width="25" height="25" />
                                </a>
                                <div class="dropdown-menu" id="cart_row">
                                    <?php if (isset($component)) { $__componentOriginalf22f1ae2e64c8523e2aa6c8ff4440c43d78dd3a1 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Userpanel\CartRows::class, []); ?>
<?php $component->withName('userpanel.cart_rows'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf22f1ae2e64c8523e2aa6c8ff4440c43d78dd3a1)): ?>
<?php $component = $__componentOriginalf22f1ae2e64c8523e2aa6c8ff4440c43d78dd3a1; ?>
<?php unset($__componentOriginalf22f1ae2e64c8523e2aa6c8ff4440c43d78dd3a1); ?>
<?php endif; ?>
                                </div>
                            </li>
                            <?php if(Auth::check()): ?>
                            <li class="nav-item dropdown notification">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                    <span class="notification_ind"></span><small><strong>(<?php echo e(Auth::user()->notifications->count()); ?>)</strong></small>
                                    <img src="/images/bell-solid.svg" width="25" height="25" />
                                </a>
                                <div class="dropdown-menu">
                                    <?php $__currentLoopData = Auth::user()->notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(is_array($notification->data)): ?>
                                    <?php ($data = $notification->data); ?>
                                    
                                    <a href="#" class="notification_item d-flex pl-2 pt-2 bg-light">
                                        <div class="notification_image">
                                            <img width="40" height="40" src="/images/prod2.webp" class="img-fluid rounded-circle">
                                        </div>
                                        <div class="notification_text">
                                            <h4 class="text-primary"><?php echo e($data["title"]); ?></h4>
                                            <p><?php echo e($data["body"]); ?> <small class="pull-right"><?php echo e("on ".date("H:i, d M",strtotime($notification->created_at))); ?></small></p>
                                            
                                        </div>
                                    </a>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </li>
                            <?php endif; ?>
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                    <img src="/images/user.svg" width="25" height="25" />
                                    <span>Hi <?php echo e(Auth::check() ? Auth::User()->name : "user"); ?></span>
                                </a>
                                <div class="dropdown-menu">    
                                    <?php if(Auth::check()): ?>                                
                                    <a href="<?php echo e(route('profile-password')); ?>"   class="dropdown-item"><i data-feather="user"></i><span>Account </span></a>
                                    <a href="/log-out"  class="dropdown-item"><i data-feather="log-in"> </i><span>Log Out</span></a>
                                    <?php else: ?>
                                    <a href="<?php echo e(route('login')); ?>"  class="dropdown-item"><i data-feather="log-in"> </i><span>Log In</span></a>
                                    <a href="<?php echo e(route('sign-up')); ?>"  class="dropdown-item"><i data-feather="log-in"> </i><span>Sign Up</span></a>
                                    <?php endif; ?>
                                </div>
                            </li>
                    </ul>
                </div>
            </div>
        </div>
</div>
</header>
</div>
<?php /**PATH C:\Users\subra\Documents\projects\kedarCollection\resources\views/userpanel/header.blade.php ENDPATH**/ ?>