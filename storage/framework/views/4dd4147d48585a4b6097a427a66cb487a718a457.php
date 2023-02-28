<?php if (isset($component)) { $__componentOriginal00c83652693317a2a4c9e093e5b2f30163cbe299 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\TableCSS::class, []); ?>
<?php $component->withName('table-c-s-s'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal00c83652693317a2a4c9e093e5b2f30163cbe299)): ?>
<?php $component = $__componentOriginal00c83652693317a2a4c9e093e5b2f30163cbe299; ?>
<?php unset($__componentOriginal00c83652693317a2a4c9e093e5b2f30163cbe299); ?>
<?php endif; ?>
<style>
  table{
    width: 90%;
    border-bottom:solid gray 1px;
    font-size: 30px;
  }
  
  tr{
    padding: 1%;
    font-weight: bolder;
    border-bottom:solid gray 1px;
    box-shadow: 0px 2px 2px 2px rgba(0,0,0,0.2);
  }
  th{
    font-size: 20px;
  }
  td{
    padding: 1%;
  }
</style>
<div class="col-md-10" style="justify-content: center;">
    <table class="p-3  table table-stripe" style="width: 80%;
    border-bottom:solid gray 1px;
    text-align:left;
    font-size: 15px;">
   <thead>
       <tr style="padding: 1%;
    font-weight: bolder;
    border-bottom:solid gray 1px;
    box-shadow: 0px 2px 2px 2px rgba(0,0,0,0.2);">
          
            <th colspan="2">Items</th>
            <th>Price</th>
        </tr>
   </thead>
        
        <tbody>      
        <?php $__currentLoopData = $order->orderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(!empty($item->product)): ?>
        <tr style="padding: 1%;
   
    border-bottom:solid gray 1px;
    box-shadow: 0px 2px 2px 2px rgba(0,0,0,0.2);">
            <td style=" padding: 1%;"><img src="/<?php echo e($item->image); ?>" alt="product_image" width="100px"> </td>
            <td style=" padding: 1%;"><?php echo e($item->quantity); ?> x <?php echo e($item->product->title); ?></td>
            <td style=" padding: 1%;">₹ <?php echo e($item->subtotal); ?></td>
        </tr>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         
        <tr style="padding: 1%;
    font-weight: bolder;
    border-bottom:solid gray 1px;
    box-shadow: 0px 2px 2px 2px rgba(0,0,0,0.2);">
             <th></th>
            <th colspan="1">Charges</th>
            <th>Amount</th>
        </tr>
        <?php $__currentLoopData = $order->chargeDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(!empty($item->charge)): ?>
        <tr style="padding: 1%;
  
    border-bottom:solid gray 1px;
    box-shadow: 0px 2px 2px 2px rgba(0,0,0,0.2);">
        <td style=" padding: 1%;"></td>
            <td style=" padding: 1%;"><?php echo e($item->charge->title); ?></td>
            <td style=" padding: 1%;">₹ <?php echo e($item->charge->amount); ?></td>
        </tr>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <tr style="padding: 1%;
    font-weight: bolder;
    border-bottom:solid gray 1px;
    box-shadow: 0px 2px 2px 2px rgba(0,0,0,0.2);">
            <th></th>
            <th>Total</th>
            <th>₹ <?php echo e($order->total); ?></th>
        </tr>
        </tbody>       
    </table>
</div><?php /**PATH C:\Users\subra\Documents\projects\kedarCollection\resources\views/components/order-details-table.blade.php ENDPATH**/ ?>