

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
<div class="container-fluid">
<div class="row justify-content-center mt-5">
    <div class="col-md-6 mt-3 pl-3 pr-3 mt-3 p-2">
        <div class="row justify-content-center pl-3 pr-3 " action="#" method="get">
            <div class="input-group mt-4">
                <input class="form-control  shadow-sm" type="text" placeholder="Search by Name, Category, Collection etc." title="" id="">
                <div class="input-group-append"><button class="btn btn-primary btn-sm btn-pill shadow-sm btn-inline"><i class="fa fa-search"></i> Search</button></div>

            </div>
        </div>
    </div>
    <div class="col-md-10 product-wrapper mt-4 ">
       
                <div class="container-fluid">
                    <div class="row justify-content-center ">
                        <div class="col-md-12 ">
                            <h4 class="text-white ml-2">
                                SHOP BY <?php echo e(strtoupper($shop_by)); ?>

                            </h4>
                        </div>
                    </div>
                    <hr>
                    <div class="shop_by">    
                    <?php if($shop_by == "categories"): ?>             
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(count($category->products) > 0): ?>
                        <div class="shop">
                             <h5 class="text-dark"><?php echo e(strtoupper($category->name)); ?> <small><strong>(<?php echo e($category->products->count()); ?> Items)</strong> <small class="text-success"></small> </small> <a class="a small see_all  btn btn-outline-dark btn-sm" data-id="<?php echo e($category->id); ?>" data-type="category" href="<?php echo e(route('shop-by-category',['id' => $category->id])); ?>">See all <i class="fa fa-eye"></i></a></h5>
                            <hr>
                            <div class="row   product_container">                                
                                <?php $__currentLoopData = $category->products->take(8); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                    
                    <?php elseif($shop_by == "collections"): ?>
                    <?php $__currentLoopData = $collections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $collection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(count($collection->products) > 0): ?>
                        <div class="shop">
                             <h5 class="text-dark"><?php echo e(strtoupper($collection->name)); ?> <small class="text-success"> <small><strong>(<?php echo e($collection->products->count()); ?> Items)</strong> </small> </small> <a class="a small see_all  btn btn-outline-dark btn-sm" data-id="<?php echo e($collection->id); ?>" data-type="collection" href="<?php echo e(route('shop-by-collection',['id' => $collection->id])); ?>">See all <i class="fa fa-eye"></i></a></h5>
                            <hr>
                            <div class="row pl-1 pr-1 product_container">                                
                                <?php $__currentLoopData = $collection->products->take(8); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-xl-3 product col-md-3 col-sm-6 xl-3 pl-1 pr-1 col-6 wow   " data-wow-duration=".5s">
                                        <?php if (isset($component)) { $__componentOriginal2c1b2c59fa706cf2cddefa5ad9acf56417989ab0 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Product::class, ['product' => $product->product]); ?>
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
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php elseif($shop_by == "offers"): ?>
                    <?php $__currentLoopData = $offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(count($offer->products) > 0): ?>
                        <div class="shop">
                             <h5 class="text-dark"><?php echo e(strtoupper($offer->name)); ?> <span class="badge badge-success">upto <?php echo e($offer->title); ?></span> <small> <small><strong>(<?php echo e($offer->products->count()); ?> Items)</strong> <small class="text-success"></small> </small></small>  <a class="a small see_all  btn btn-outline-dark btn-sm" data-id="<?php echo e($offer->id); ?>" data-type="offer" href="<?php echo e(route('shop-by-offers',['id' => $offer->id])); ?>">See all <i class="fa fa-eye"></i></a></h5>
                            <hr>
                            <div class="row pl-1 pr-1 product_container">                                
                                <?php $__currentLoopData = $offer->products->take(8); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-xl-3 product col-md-3 col-sm-6 xl-3 pl-1 pr-1 col-6 wow   " data-wow-duration=".5s">
                                        <?php if (isset($component)) { $__componentOriginal2c1b2c59fa706cf2cddefa5ad9acf56417989ab0 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Product::class, ['product' => $product->product]); ?>
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
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    </div>
                </div>
            
    </div>
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
<?php echo $__env->make('userpanel.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\subra\Documents\projects\kedarCollection\resources\views/userpanel/newshop.blade.php ENDPATH**/ ?>