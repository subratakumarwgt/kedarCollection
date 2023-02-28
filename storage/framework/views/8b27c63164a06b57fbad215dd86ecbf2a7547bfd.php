

<?php $__env->startSection('title'); ?>
<title><?php echo e(Config::get('settings.brand.brand_name')); ?> | Shop</title>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/animate.css')); ?>">

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/owlcarousel.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<style>
    .banner_heading{
       position: absolute !important;
       padding-top: 5%;
       width: inherit;
       text-align: center;
    }
    .product_img_wrapper{
        height: 260px;
        overflow: hidden;
    }
    @media(max-width:800px) {
        .product_img_wrapper{
        height: 60px;
        overflow: hidden;
    }
    }
    @media(max-width:700px) {
        .product_img_wrapper{
        height: 230px !important;
        overflow: hidden;
    }
     }
    @media(max-width:600px) {
        .product_img_wrapper{
        height: 130px !important;
        overflow: hidden;
    }
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('banner'); ?>
<div class="" style="height: 200px;position:fixed;filter: blur(90px);-webkit-filter: blur(20px);background:rgba(0, 0, 0, 0.7)"><img src="/images/banner.webp" alt="" style="min-width: 900px;"></div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<input type="hidden" id="user_id" value="<?php echo e($user_id); ?>">
<div class="row justify-content-center mt-5 bg-white">  
    <div class="col-md-6 mt-3 pl-3 pr-3 mt-3 p-2">            
        <div class="row justify-content-center pl-3 pr-3 " action="#" method="get">
        <div class="input-group mt-4"> 
            <input class="form-control  shadow-sm" type="text" placeholder="Search by Name, Category, Collection etc." title="" id="">
        <div class="input-group-append"><button class="btn btn-primary btn-sm btn-pill shadow-sm btn-inline"><i class="fa fa-search"></i> Search</button></div>

        </div>
  

    </div>
    </div>
               
   
  
    <div class="col-md-11 mt-4">  
        <div class="owl-carousel owl-theme col-12" id="owl-carousel-13">
         <?php $__currentLoopData = array_merge($categories,$subcategories); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <?php if (isset($component)) { $__componentOriginal1052a869877d3fbc1080fefd0723af00c18919e9 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SliderItem::class, ['item' => $item]); ?>
<?php $component->withName('slider-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1052a869877d3fbc1080fefd0723af00c18919e9)): ?>
<?php $component = $__componentOriginal1052a869877d3fbc1080fefd0723af00c18919e9; ?>
<?php unset($__componentOriginal1052a869877d3fbc1080fefd0723af00c18919e9); ?>
<?php endif; ?>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </div>             

           </div>
       
        <div class="col-md-11 pl-1 pr-1 product-wrapper mt-4 ">
   <div class="">
      <div class="">
       
         <div class="container-fluid">
         <div class="row justify-content-center ">
         
             <div class="col-md-12">
                <div class="row mt-1 p-1    ">                  
                    <div class="col-md-2 p-3 col-6">
                        <select name="" id="" class="form-control border-bottom border-light shadow text-dark" style="background:rgba(250,250,250,0.8);"> 
                        <option value=""> Categories </option>
                          </select>
                </div>
                <!-- <div class="col-md-2 p-3 col-6">
                        <select name="" id="" class="form-control border-bottom border-light shadow text-dark" style="background:rgba(250,250,250,0.8);"> 
                        <option value=""> Offers </option>
                          </select>
                </div> -->
                <div class="col-md-8 p-3 col-6 ">
                    <div class="pull-right">
                 
                    <select name="" id="" class="form-control border-bottom border-light shadow text-dark pull-right" style="background:rgba(250,250,250,0.8);"> 
                        <option value="">  Sort Products </option>
                          </select>
     
        </div>
                   
                    </div>
                        
                </div>                  
            
                </div>
              
         </div>
         <div class="container-fluid">
         <div class="row justify-content-center pl-1 pr-1">
               
               <?php if($products->count() > 0): ?>
              
               <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
               <div class="col-xl-3 product col-md-3 col-sm-6 xl-3 pl-1 pr-1 col-6 wow <?php if($product->id%2 == 0): ?>fadeInRight <?php else: ?> fadeInLeft <?php endif; ?>   " data-wow-duration=".5s">  
                  <?php if (isset($component)) { $__componentOriginal2c1b2c59fa706cf2cddefa5ad9acf56417989ab0 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Product::class, ['product' => $product]); ?>
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
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               
        </div>
        </div>
        <?php else: ?>
        <div class="alert alert-danger">Sorry! We could not load more products</div>
        <?php endif; ?>
        <?php if($products->hasMorePages()): ?>
        <div class="col-md-12  text-success rounded"><a class="nav-link h6 border rounded text-white pull-left" href="<?php echo e($products->nextPageUrl()); ?>">See More...</a></div>
        <?php endif; ?>
      
        </div>
        </div>
    </div>
    </div>
    </div>
</div>
<?php if (isset($component)) { $__componentOriginal2d72de7c638edbe1bb9f75fc3a6d0d93ebf5a815 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Userpanel\Topsellers::class, []); ?>
<?php $component->withName('userpanel.topsellers'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2d72de7c638edbe1bb9f75fc3a6d0d93ebf5a815)): ?>
<?php $component = $__componentOriginal2d72de7c638edbe1bb9f75fc3a6d0d93ebf5a815; ?>
<?php unset($__componentOriginal2d72de7c638edbe1bb9f75fc3a6d0d93ebf5a815); ?>
<?php endif; ?>


<?php if (isset($component)) { $__componentOriginala0d1c159ade289528bb8b109e9502f033c793a11 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Userpanel\Categories::class, []); ?>
<?php $component->withName('userpanel.categories'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala0d1c159ade289528bb8b109e9502f033c793a11)): ?>
<?php $component = $__componentOriginala0d1c159ade289528bb8b109e9502f033c793a11; ?>
<?php unset($__componentOriginala0d1c159ade289528bb8b109e9502f033c793a11); ?>
<?php endif; ?>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>


<script src="<?php echo e(asset('assets/js/touchspin/touchspin.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/touchspin/input-groups.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/owlcarousel/owl.carousel.js')); ?>"></script>

<script src="<?php echo e(asset('assets/js/product-tab.js')); ?>"></script>
<script>
    var owl_carousel_custom = {
        init: function() {
            var owl = $('#owl-carousel-13');
            owl.owlCarousel({
                items: 6,
                loop: true,
                margin: 30,
                autoplay: true,
                autoWidth:true,
                autoplayTimeout: 2000,
                autoplayHoverPause: true,
                nav: false,
                dots: false,

            });
            var owl = $('#owl-carousel-13-1');
            owl.owlCarousel({
                items: 6,
                loop: true,
                margin: 30,
                autoplay: true,
                autoWidth:true,
                autoplayTimeout: 2000,
                autoplayHoverPause: true,
                nav: false,
                dots: false,

            });
            var owl = $('.owl-carousel-15');
            owl.owlCarousel({
                items: 2,
                dots: false,
                loop: true,
                nav: false,
                autoplay: true,
                autoWidth:true,
                autoplayTimeout: 2000,
                autoplayHoverPause: true,
                margin: 30,
            }), owl.on('mousewheel', '.owl-stage', function(e) {
                if (e.deltaY > 0) {
                    owl.trigger('next.owl');
                } else {
                    owl.trigger('prev.owl');
                }
                e.preventDefault();
            });
        }
    };

    (function($) {
        "use strict";
        owl_carousel_custom.init();

    })(jQuery);

 
</script>

<script>
$.each($(".product_title_1"),function(){
  $(this).html(truncate($(this).html(),35));
})
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('userpanel.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\subra\Documents\projects\kedarCollection\resources\views/userpanel/product-list.blade.php ENDPATH**/ ?>