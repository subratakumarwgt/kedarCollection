<section class="latest_clctns sectionP_4">
        <div class="container">
          <div class="row">

            <div class="col-md-6 clctn_left wow fadeInLeft" data-wow-duration=".8s"> 
              <div class="owl-carousel clctn_slide">
              <?php if(isset($items[0])): ?>
                <?php $__currentLoopData = $items[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <div class="owl-item-in text-center">
                    <a href="#">
                      <img src="<?php echo e($item->images->first()->image); ?>" class="img-fluid">
                    </a>
                    <h2 class="collection_title text-light">
                      <a href="#"><?php echo e($item->name); ?></a>
                    </h2>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
              <?php endif; ?>           
              </div>               
            </div>
            <div class="col-md-5 offset-md-1 clctn_right bg_pattern d-flex align-items-center justify-content-center wow fadeInRight" data-wow-duration=".8s">
              <div class="text-center">
                <a href="<?php echo e($section->redirect_url); ?>" class="btn btn-primary"><img src="images/view.png" width="30" class="img-fluid"><?php echo e($section->redirect_text); ?></a>
                <div class="hd_style_1 text-center">
                  <h4 class="text-uppercase hd_text"><?php echo e($section->title); ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section><?php /**PATH C:\Users\subra\Documents\projects\kedarCollection\resources\views/components/userpanel/collections.blade.php ENDPATH**/ ?>