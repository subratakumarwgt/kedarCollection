<div class="p-3 border-bottom cart-header">
<h6 class="h6 text-primary">Cart Items <?php echo e(count($cart_rows)); ?> <i class="fa fa-shopping-basket"></i></h6>

</div>
<?php $__currentLoopData = $cart_rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<a href="#" class="notification_item d-flex ">
    <div class="notification_image">
        <img width="100" height="100" src="/<?php echo e($cart->product->image); ?>" class="img-fluid rounded-circle">
    </div>
    <div class="notification_text">
        <h4> <?php echo e(strtoupper($cart->product->name)); ?> <div class="pull-right"><i class="fa fa-trash small text-danger"></i></div></h4>
        <?php if($cart->setOf > 1): ?><small> <small class="notification_time bg-light text-primary">set of <?php echo e($cart->setOf); ?></small></small><?php endif; ?>
        <small class="notification_time">(x <?php echo e($cart->quantity); ?> ) </small>
        <small class="notification_time"><i class="fa fa-inr"></i> <?php echo e($cart->subtotal); ?> </small>
    </div>
</a>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<a href="<?php echo e(route('cart-items')); ?>" class="notification_item d-flex">
    <button class="btn btn-sm btn-primary btn-pill btn-block">Go to cart (<span class="currency">INR</span> <span class="currency_price"><?php echo e($cart_total); ?>)</span> <i class="fa fa-arrow-right"></i></button>
</a><?php /**PATH C:\Users\subra\Documents\projects\kedarCollection\resources\views/components/userpanel/cart-rows.blade.php ENDPATH**/ ?>