<?php $__currentLoopData = $cart_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<li class="list-group-item d-flex justify-content-between lh-condensed cart_row_item">
                        <div>
                            <img src="/<?php echo e($cart_item->product->image); ?>" class="img-fluid" width="100px">
                        </div>
                        <div class="text-left pl-2">
                            <h6 class="my-0"><?php echo e($cart_item->product->title); ?></h6>
                            <small class="text-muted"><strong>X</strong><?php echo e($cart_item->quantity); ?></small>
                        </div>

                        <span class="text-muted"><i class="fa fa-inr"></i> <?php echo e($cart_item->quantity* (!empty($cart_item->product->on_offer) ?  $cart_item->product->price : $cart_item->product->pre_price)); ?></span>
                    </li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\Users\subra\Documents\projects\rollswallah\resources\views/userpanel/components/checkoutcart.blade.php ENDPATH**/ ?>