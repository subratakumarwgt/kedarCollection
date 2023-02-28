<section class="top_sellers section_frame sectionP_4">
        <div class="container">
          <div class="row">
            
            <div class="col-md-12 wow fadeInDown" data-wow-duration=".8s"> 
              <div class="hd_style_1 text-center">
                <h4 class="text-uppercase hd_text"><?php echo e($section->title); ?></h4>
              </div>             
             
            </div>
            <div class="col-md-12 wow fadeInRight" data-wow-duration=".8s">
              <div class="row">
                <?php if(isset($items[0])): ?>
                <?php $__currentLoopData = $items[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($key > 0 && !empty($item)): ?>
                <div class="col-xl-4 product col-md-4 col-sm-4 xl-4 pl-2 pr-2 col-12 wow <?php if($item->id%2 == 0): ?>fadeInRight <?php else: ?> fadeInLeft <?php endif; ?>   " data-wow-duration=".5s">  
                  <?php if (isset($component)) { $__componentOriginal2c1b2c59fa706cf2cddefa5ad9acf56417989ab0 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Product::class, ['product' => $item]); ?>
<?php $component->withName('product'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2c1b2c59fa706cf2cddefa5ad9acf56417989ab0)): ?>
<?php $component = $__componentOriginal2c1b2c59fa706cf2cddefa5ad9acf56417989ab0; ?>
<?php unset($__componentOriginal2c1b2c59fa706cf2cddefa5ad9acf56417989ab0); ?>
<?php endif; ?>
                </div>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </section><?php /**PATH C:\Users\subra\Documents\projects\kedarCollection\resources\views/components/userpanel/topsellers.blade.php ENDPATH**/ ?>