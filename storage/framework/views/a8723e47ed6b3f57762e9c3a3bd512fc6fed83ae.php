

<?php $__env->startSection('title'); ?>
<title><?php echo e(Config::get('settings.brand.brand_name')); ?> | Shop</title>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/animate.css')); ?>">

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/owlcarousel.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<style>
    .banner_heading {
        position: absolute !important;
        padding-top: 5%;
        width: inherit;
        text-align: center;
    }

    .product_img_wrapper {
        height: 260px;
        overflow: hidden;
    }

    @media(max-width:800px) {
        .product_img_wrapper {
            height: 60px;
            overflow: hidden;
        }
    }

    @media(max-width:700px) {
        .product_img_wrapper {
            height: 230px !important;
            overflow: hidden;
        }
    }

    @media(max-width:600px) {
        .product_img_wrapper {
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
<div class="mt-5"></div>
<div class="row mt-5  justify-content-center">
    <div class="mt-4 col-md-12 ">
    <?php if (isset($component)) { $__componentOriginale8fa9d39f20309bd9fda2f797b8abc237ac658da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SingleProduct::class, ['product' => $product]); ?>
<?php $component->withName('single-product'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale8fa9d39f20309bd9fda2f797b8abc237ac658da)): ?>
<?php $component = $__componentOriginale8fa9d39f20309bd9fda2f797b8abc237ac658da; ?>
<?php unset($__componentOriginale8fa9d39f20309bd9fda2f797b8abc237ac658da); ?>
<?php endif; ?>
    </div>

</div>

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
                autoWidth: true,
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
                autoWidth: true,
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
                autoWidth: true,
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
    $.each($(".product_title_1"), function() {
        $(this).html(truncate($(this).html(), 35));
    })
</script>
<script>
    $(".shop_by .see_all").on("click",async function(e){
        e.preventDefault();
        let url = $(this).prop("href");
        let container = $(this).closest(".shop").find(".product_container")
        loadoverlay(container)
        await $.get(url,function(response){
        console.log(response)
        $(container).html(response)
        })
        .fail(()=>{
            $.notify({
                message: "Something went wrong please try later."
            }, {
                type: 'danger',
                z_index: 10000,
                timer: 2000,
            })
        })
        hideoverlay(container)
    })
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('userpanel.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\subra\Documents\projects\kedarCollection\resources\views/userpanel/singleproduct.blade.php ENDPATH**/ ?>