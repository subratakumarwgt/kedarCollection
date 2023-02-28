<div class="col-md-10">
    <table class="p-3  table table-stripe">
        <tr>
            <th>Items</th>
        </tr>
        <?php $__currentLoopData = $order->orderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($item->quantity); ?> x <?php echo e($item->product->title); ?></td>
            <td>₹ <?php echo e($item->subtotal); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <th>Charges</th>
        </tr>
        <?php $__currentLoopData = $order->chargeDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($item->charge->title); ?></td>
            <td>₹ <?php echo e($item->charge->amount); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <th>Total</th>
            <th>₹ <?php echo e($order->total); ?></th>
        </tr>
    
    </table>
</div><?php /**PATH C:\Users\subra\Documents\projects\rollswallah\resources\views/adminpanel/expenses/components/order_details.blade.php ENDPATH**/ ?>