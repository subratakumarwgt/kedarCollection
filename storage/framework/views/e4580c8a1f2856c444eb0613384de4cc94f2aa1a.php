

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

     <?php if (isset($component)) { $__componentOriginal75df7be79f95455a54d0885320126a54cfbdc15d = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Userpanel\Offers::class, []); ?>
<?php $component->withName('userpanel.offers'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal75df7be79f95455a54d0885320126a54cfbdc15d)): ?>
<?php $component = $__componentOriginal75df7be79f95455a54d0885320126a54cfbdc15d; ?>
<?php unset($__componentOriginal75df7be79f95455a54d0885320126a54cfbdc15d); ?>
<?php endif; ?>

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

     <?php if (isset($component)) { $__componentOriginalb2d254a4db57684006b0a3b5f571df3b361462e6 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Userpanel\Collections::class, []); ?>
<?php $component->withName('userpanel.collections'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb2d254a4db57684006b0a3b5f571df3b361462e6)): ?>
<?php $component = $__componentOriginalb2d254a4db57684006b0a3b5f571df3b361462e6; ?>
<?php unset($__componentOriginalb2d254a4db57684006b0a3b5f571df3b361462e6); ?>
<?php endif; ?>




      <section class="customers_area text-light">
        <div class="overlay sectionP_4 section_frame_light">
          <div class="container">
            <div class="hd_style_1 text-center">
              <h2 class="hd_text font-calps">What people says...</h2>
            </div>
            <div class="row">
              <div class="col-md-6 wow fadeInLeft" data-wow-duration=".8s">
                <div class="testimonials_item">
                  <div class="d-flex flex-wrap align-items-center">
                    <div class="testimonials_image">
                      <img width="168" height="168" src="images/client1.webp" class="img-fluid rounded-circle" />
                    </div>
                    <div class="testimonials_text">
                      <h4>"All items are best in price and beautifull..."</h4>
                      <div class="client_rating">
                        <img width="15" height="15" src="images/star.png">
                        <img width="15" height="15" src="images/star.png">
                        <img width="15" height="15" src="images/star.png">
                        <img width="15" height="15" src="images/star.png">
                        <img width="15" height="15" src="images/star.png">
                      </div>
                    </div>
                  </div>
                  <div class="client_info font-calps">
                    <div class="client_name">Mr Ankit Joshi,</div>
                    <div class="client_des">Teacher</div>
                  </div>
                </div>   
              </div>
              <div class="col-md-6 wow fadeInRight" data-wow-duration=".8s">
                <div class="testimonials_item">
                  <div class="d-flex flex-wrap align-items-center">
                    <div class="testimonials_image">
                      <img width="168" height="168" src="images/client2.webp" class="img-fluid rounded-circle" />
                    </div>
                    <div class="testimonials_text">
                      <h4>"All items are best in price and beautifull..."</h4>
                      <div class="client_rating">
                        <img width="15" height="15" src="images/star.png">
                        <img width="15" height="15" src="images/star.png">
                        <img width="15" height="15" src="images/star.png">
                        <img width="15" height="15" src="images/star.png">
                        <img width="15" height="15" src="images/star.png">
                      </div>
                    </div>
                  </div>
                  <div class="client_info font-calps">
                    <div class="client_name">Mr Ankit Joshi,</div>
                    <div class="client_des">Teacher</div>
                  </div>
                </div>   
              </div>
            </div>
          </div>
        </div>
      </section>



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
<?php echo $__env->make('userpanel.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\subra\Documents\projects\kedarCollection\resources\views/userpanel/home-page.blade.php ENDPATH**/ ?>