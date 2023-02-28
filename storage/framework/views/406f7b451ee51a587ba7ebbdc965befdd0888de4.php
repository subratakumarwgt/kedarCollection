<div class="item">
    <div class="img-wrapper-rounded shadow-sm border-bottom border-primary">
        <div class="ribbon ribbon-danger ribbon-left">
             - <i class="fa fa-inr small"></i> <?php echo e($item->pre_price - $item->price); ?>

        </div><img src="/<?php echo e($item->image); ?>" alt="" class="img-height-200">
    </div>
        <div class="h6 text-center"><?php echo e($item->title); ?></div>
    <div class=" text-success small text-center border border-success rounded bg-white">
        <i class="fa fa-inr small"></i> <?php echo e($item->price); ?>

        <del class="text-danger"><small> </small><i class="fa fa-inr small"></i><?php echo e($item->pre_price); ?> </del> 
    </div>               
</div><?php /**PATH C:\Users\subra\Documents\projects\kedarCollection\resources\views/components/offers/round-slider.blade.php ENDPATH**/ ?>