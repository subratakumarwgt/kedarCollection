
<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/animate.css')); ?>">

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/owlcarousel.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('banner'); ?>
<div class="" style="height: 200px;position:fixed;filter: blur(90px);-webkit-filter: blur(20px);background:rgba(0, 0, 0, 0.7)"><img src="/images/banner.webp" alt="" style="min-width: 900px;"></div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb-title'); ?>
<h5> Checkout</h5>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item"><a href="/">Home</a></li>
<li class="breadcrumb-item"><a href="/cart-items">Cart</a></li>
<li class="breadcrumb-item active"><a href="/checkout-order">Checkout</a></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php ($page = App\Models\Page::whereSlug("terms_services")->first()); ?>
<div class="container">
    <div class="row justify-content-center mt-5">
    
    <div class="card mt-5">
        <div class="card-header"><?php echo e($page->title); ?></div>
        <div class="card-body">
            <?php echo $page->content; ?>

        </div>
    </div>

    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection("script"); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('userpanel.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\subra\Documents\projects\kedarCollection\resources\views/userpanel/terms-services.blade.php ENDPATH**/ ?>