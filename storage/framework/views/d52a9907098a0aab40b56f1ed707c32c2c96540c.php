<li class="p-2 border  mb-2 bg-light text-dark border border-bottom coupon_row">
    <div class="row border-bottom">
        <div class="col-7 p-2">
            <div class="small p-2" style="text-align: left;"><span class="badge badge-<?php echo e($order->current_status == 'pending'? 'warning text-dark border-dark' : 'primary'); ?>"><?php echo e(strtoupper($order->current_status)); ?></span></div>
            <div class="small m-2">ID: <?php echo e($order->order_id); ?></div>
        </div>
        <div class="col-5 p-1">
            <div class="small p-2" style="text-align: right;"><?php echo e(date("h:i A | d M",strtotime($order->created_at))); ?></div>
            <div class="small m-2" style="text-align: right;"><i class="fa fa-phone"></i> : <?php echo e($order->user_contact); ?></div>
        </div>
    </div>
    <div class="row">
        <div class="col-9 p-2">
            <div class="p-2">
                <ul class="list m-1 p-1">
                    <?php $__currentLoopData = $order->orderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e(@$item->quantity); ?> x <?php echo e(@$item->product->name ?? @$item->item->name); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
        <div class="col-3 p-2">

            <div class="p-1 mr-2  text-success" style="text-align: right;">
                <div class="small text-dark">total</div>
                <h6> ₹ <?php echo e(@$order->total); ?></h6>
            </div>
        </div>


    </div>
    <div class="row pt-2">
        <button class="btn  border-top btn-sm see_details" onclick="getOrderHistory(<?php echo e($order->order_id); ?>)"><i class="fa fa-eye"></i> See details</button>
    </div>
</li><?php /**PATH C:\Users\subra\Documents\projects\kedarCollection\resources\views/adminpanel/expenses/components/order_coupon.blade.php ENDPATH**/ ?>