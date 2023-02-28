<?php $__currentLoopData = $cart_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <img src="/<?php echo e($cart_item->product->image); ?>" class="img-fluid" width="100px">
                        </div>
                        <div>
                            <h6 class="my-0"><?php echo e($cart_item->product->title); ?></h6>
                            <small class="text-muted"><strong>X</strong><?php echo e($cart_item->quantity); ?></small>
                        </div>

                        <span class="text-muted"><i class="fa fa-inr"></i> <?php echo e($cart_item->quantity* $cart_item->product->price); ?></span>
                    </li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\Users\subra\Documents\Projects\alliswell\Cuba\resources\views/userpanel/components/checkoutcart.blade.php ENDPATH**/ ?>