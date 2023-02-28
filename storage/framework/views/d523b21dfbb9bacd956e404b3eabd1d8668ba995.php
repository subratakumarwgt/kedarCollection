<div class="banner" style="background: url(<?php if(!empty($section->background_image)): ?>/<?php echo e($section->background_image); ?> <?php else: ?> images/banner.webp <?php endif; ?>);  backgorund-repeat:no-repeat; background-size:100%;">
    <div class="container">
        <div class="row align-items-center">
        <div class="col-md-6 banner_text text-center wow fadeInLeft" data-wow-duration=".8s">
            <div class="banner_sub_title text-uppercase"><?php echo e($section->sub_title); ?></div>
            <h2 class="banner_title"><?php echo e($section->title); ?></h2>
            <a href="<?php echo e($section->redirect_url); ?>" class="btn btn-primary btn-pill"><img src="images/view.png" width="28" class="img-fluid" /> <?php echo e($section->redirect_text); ?></a>
        </div>
        <div class="col-md-6 banner_content wow fadeInRight" data-wow-duration=".8s">
            <div class="owl-carousel products_slide">
            <?php if(isset($items[0])): ?>
            <?php $__currentLoopData = $items[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="owl-item-in">
                <div class="product_slide_item">
                <img src="/<?php echo e($item->images->first()->image); ?>" class="img-fluid"/>
                <div class="products_text">
                    <div class="discount"><?php echo e($item->title); ?></div>
                    <div class="cat"><?php echo e($item->sub_title); ?></div>
                    <a href="<?php echo e(route('shop-by-offers',['id'=>$item->id])); ?>" class="btn btn-primary btn-sm rounded"><img width="15" height="15" src="images/eye.png" class="img-fluid" /> See All</a>
                </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
            <?php endif; ?>       
            </div> 
        </div>
        </div>
    </div>
</div><?php /**PATH C:\Users\subra\Documents\projects\kedarCollection\resources\views/components/userpanel/offers.blade.php ENDPATH**/ ?>