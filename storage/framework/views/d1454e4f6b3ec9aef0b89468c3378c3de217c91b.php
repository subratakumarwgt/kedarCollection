<section class="sectionP_4" style="background:url('/<?php echo e($section->background_image); ?>')">
        <div class="container">
          <div class="row">
            
            <div class="col-md-12 wow fadeInDown" data-wow-duration=".8s"> 
              <div class="hd_style_1 text-center">
                <h4 class="text-uppercase hd_text"><?php echo e($section->title); ?></h4>
                <h6><?php echo e($section->sub_title); ?></h6>
              </div>             
             
            </div>
            <div class="col-md-12 wow fadeInRight" data-wow-duration=".8s">
              <div class="row">
                <?php $__currentLoopData = $resources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $resource): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($resource == "Product"): ?>
                <?php $__currentLoopData = $items[$i]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($key > 0): ?>
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
                <?php if($resource == "Category"): ?>
                <div class="col-md-12 cat_right wow fadeInRight" data-wow-duration=".8s">
                    <div class="row">
                        <?php $__currentLoopData = $items[$i]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-3">              
                        <div class="cat_item">
                            <a href="<?php echo e(route('shop-by-category',['id' => $item->id])); ?>">
                            <img src="/<?php echo e($item->image); ?>" class="img-fluid">
                            </a>
                            <div class="cat_link"><a href="<?php echo e(route('shop-by-category',['id' => $item->id])); ?>"><?php echo e($item->name); ?></a></div>
                        </div>
                        </div>    
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>         
                    </div>
                </div>
                <?php endif; ?>

                <?php if($resource == "Offer"): ?>
                <div class="col-md-12 banner_content wow fadeInRight" data-wow-duration=".8s">
                    <div class="owl-carousel products_slide">
                    <?php $__currentLoopData = $items[$i]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="owl-item-in">
                        <div class="product_slide_item">
                        <img src="/<?php echo e($item->images->first()->image); ?>" class="img-fluid"/>
                        <div class="products_text">
                            <div class="discount"><?php echo e($item->title); ?></div>
                            <div class="cat"><?php echo e($item->sub_title); ?></div>
                            <a href="<?php echo e(route('shop-by-offers',['id'=>$item->id])); ?>" class="btn btn-primary btn-sm rounded"><img width="15" height="15" src="/images/eye.png" class="img-fluid" /> See All</a>
                        </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>           
                    </div> 
                </div>
                <?php endif; ?>

                <?php if($resource == "Collection"): ?>
                <div class="col-md-12 clctn_left wow fadeInLeft" data-wow-duration=".8s"> 
                    <div class="owl-carousel clctn_slide">
                        <?php $__currentLoopData = $items[$i]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="owl-item-in text-center">
                            <a href="<?php echo e(route('shop-by-collection',['id'=>$item->id])); ?>">
                            <img src="/<?php echo e($item->images->first()->image); ?>" class="img-fluid">
                            </a>
                            <h2 class="collection_title text-light">
                            <a href="<?php echo e(route('shop-by-collection',['id'=>$item->id])); ?>"><?php echo e($item->name); ?></a>
                            </h2>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>              
                    </div>               
                </div>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            </div>
          </div>
        </div>
      </section><?php /**PATH C:\Users\subra\Documents\projects\kedarCollection\resources\views/components/userpanel/dy_section.blade.php ENDPATH**/ ?>