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

<style>
  #toast-container > div {
    opacity: 1;
    -ms-filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100);
    filter: alpha(opacity=100);
}

#toast-container > .alert {
    background-image: none !important;
}

#toast-container > .alert:before {
    position: fixed;
    font-family: FontAwesome;
    font-size: 24px;
    float: left;
    color: black;
    padding-right: 0.5em;
    margin: auto 0.5em auto -1.5em;
}

#toast-container > .alert-info:before {
    content: "\f05a";
}
#toast-container > .alert-info:before,
#toast-container > .alert-info {
    color: #31708f;
}

#toast-container > .alert-success:before {
    content: "\f00c";
}
#toast-container > .alert-success:before,
#toast-container > .alert-success {
    color: #3c763d;
}

#toast-container > .alert-warning:before {
    content: "\f06a";
}
#toast-container > .alert-warning:before,
#toast-container > .alert-warning {
    color: #8a6d3b;
}

#toast-container > .alert-danger:before {
    content: "\f071";
}
#toast-container > .alert-danger:before,
#toast-container > .alert-danger {
    color: #a94442;
}
</style>
<?php echo $__env->yieldContent('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/scrollbar.css')); ?>">
<!-- Bootstrap css-->
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/bootstrap.css')); ?>">
<!-- App css-->
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/style.css')); ?>">
<link id="color" rel="stylesheet" href="<?php echo e(asset('assets/css/color-1.css')); ?>" media="screen">
<!-- Responsive css-->
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/responsive.css')); ?>">


<?php /**PATH C:\Users\subra\Documents\projects\rollswallah\resources\views/userpanel/css.blade.php ENDPATH**/ ?>