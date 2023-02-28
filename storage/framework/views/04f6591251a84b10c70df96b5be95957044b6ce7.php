<section class="cats sectionP_4">
        <div class="container">
          <div class="row">
            <div class="col-md-5 d-flex align-items-center justify-content-center bg_pattern wow fadeInLeft" data-wow-duration=".8s">
              <div class="text-center">
                <div class="hd_style_1 text-center">
                  <h4 class="text-uppercase hd_text"><?php echo e($section->title); ?></h4>
                </div>
                <a href="<?php echo e($section->redirect_url); ?>" class="btn btn-primary"><img src="images/view.png" width="30" class="img-fluid"> <?php echo e($section->redirect_text); ?></a>
              </div>
            </div>
            <div class="col-md-7 cat_right wow fadeInRight" data-wow-duration=".8s">
              <div class="row">
              <?php if(isset($items[0])): ?>
                <?php $__currentLoopData = $items[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4">              
                  <div class="cat_item">
                    <a href="<?php echo e(route('shop-by-category',['id' => $item->id])); ?>">
                      <img src="/<?php echo e($item->image); ?>" class="img-fluid">
                    </a>
                    <div class="cat_link"><a href="<?php echo e($section->redirect_url); ?>/<?php echo e($item->id); ?>"><?php echo e($item->name); ?></a></div>
                  </div>
                </div>    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>      
              <?php endif; ?>   
              </div>
            </div>
          </div>
        </div>
    </section><?php /**PATH C:\Users\subra\Documents\projects\kedarCollection\resources\views/components/userpanel/categories.blade.php ENDPATH**/ ?>