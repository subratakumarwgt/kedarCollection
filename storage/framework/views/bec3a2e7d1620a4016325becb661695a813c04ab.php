
<?php $__env->startSection('title', 'Dashboard'); ?>

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
<div class="" style="height: 200px;position:fixed;filter: blur(50px);-webkit-filter: blur(50px);"><img src="<?php echo e(asset('assets/images/bg_3-33.jpg')); ?>" alt="" style="min-width: 1000px;"></div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<input type="hidden" id="user_id" value="<?php echo e($user_id); ?>">
<div class="row justify-content-center">        
      
    
    <div class="col-md-11">
                  
                  <!-- <div class="card-body">
                    
                       <div class="row justify-content-center p-2 " action="#" method="get">
                    <div class="form-group col-8 p-2">
                        <input class="form-control w-100 shadow-sm" type="text" placeholder="Search by Name, Category, Specialist etc." title="" id="">
                    </div>
                    <div class="col-4 p-2">
                        <button class="btn btn-primary btn-pill shadow-sm">Search</button>
                    </div>
                </div>
               
                  </div> -->
               
                </div>
  
    <div class="col-md-11 mt-3">
           
           <div class="card-body">
              
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
           </div>
       
        <div class="container-fluid product-wrapper mt-4 col-md-11">
   <div class="product-grid">
      <div class="feature-products">
         
       
         <div class="product-wrapper-grid">
         <div class="row justify-content-center">
             <div class="col-md-12">
                 <div class="row">
               
        <?php if($products->count() > 0): ?>
       
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>      
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
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
         </div>
        <?php else: ?>
        <div class="alert alert-danger">Sorry! We could not load more products</div>
        <?php endif; ?>
        <?php if($products->hasMorePages()): ?>
        <div class="col-md-10 pull-right bg-white rounded"><a class="nav-link" href=" <?php echo e($products->nextPageUrl()); ?>">See More...</a></div>
        <?php endif; ?>
      
        </div>
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
    
//  $(document).ready(function(){
    $(".add-to-cart").on('click',function(e){
    var product_id = $(this).data('product')
    var qty_id =  $(this).data('quantity');
    e.preventDefault();
  var  button = $(this);
loadoverlay(button);
var quantity = $("#product_qty_"+qty_id).val();
if (quantity) {}else quantity = 1;
var form = new FormData();
form.append("user_id", $('#user_id').val());
form.append("product_id", product_id);
form.append("quantity",quantity);

var settings = {
  "url": "/api/add-to-cart",
  "method": "POST",
  "timeout": 0,
  "processData": false,
  "mimeType": "multipart/form-data",
  "contentType": false,
  "data": form,
  statusCode: {
                400: function(res) {
                    hideoverlay(button)
                    res = JSON.parse(res.responseText)
                button.prop('disabled', false);
                if (res.duplicate) {
                    button.prop('disabled', true);
                   
                }
               
                $.notify({
                    message: res.message
                }, {
                    type: 'danger',
                    z_index: 10000,
                    timer: 5000,
                });
                },
                500: function() {
                    hideoverlay(button)
                button.prop('disabled', false);
                $.notify({
                    message: "Something went wrong! Please try again"
                }, {
                    type: 'danger',
                    z_index: 10000,
                    timer: 5000,
                })
                }
            }
};

$.ajax(settings).done(function (response) {
    response = JSON.parse(response)
  hideoverlay(button)
  button.prop('disabled', true);
 var count =  parseInt($("#cart_count").html())
 $("#cart_count").html(++count)
 var cartComponent = $(` <li class="mt-0">
              <div class="media">
              
                <div class="media-body">
                  <a class="text-secodary product_title" data-toggle="tooltip" title="${response.data.product.title}">${truncate(response.data.product.title,27)}</a>
                  <p><i class="fa fa-inr"></i>${response.data.product.price}</p>
                  <p>X ${response.data.quantity}</p>                  
                  <h6 class="text-end text-muted"><small>Subtotal:</small> <i class="fa fa-inr"></i> ${parseInt(response.data.product.price)*parseInt(response.data.quantity)}</h6>
                </div>
                <div class="close-circle"><a href="#"><i class="fa fa-trash text-danger"></i></a></div>
              </div>
            </li>`);
            $("#cart_row").after(cartComponent);

        $.notify({
            message: response.message
        }, {
            type: 'success',
            z_index: 10000,
            timer: 5000,
        });
});

 
})

//    })
$(".varient_type").on('click',async function(){
  var product_id = $(this).data('product');
  var varient_id = $(this).data('varient');
loadoverlay($("#modal_content_"+product_id))
        await   $.get("/api/product/get/"+varient_id, function(data, status){
          $("#title_"+product_id).html(data.data.title);
           $("#price_"+product_id).html(`<i class="fa fa-inr"></i>${data.data.price}`);
            $("#pre_price_"+product_id).html(`MRP: <i class="fa fa-inr"></i>${data.data.pre_price}`);
            $("#addBtn_"+product_id).data('product',data.data.id);
          $.each($(".varient_type"),function(){
          $(this).removeClass('active');
          })
          $(this).addClass('active');
         if(data.data.image)
          $("#img_"+product_id).attr('src','/'+data.data.image);
          //window.image_src = 
        
      });
 hideoverlay($("#modal_content_"+product_id));
})

    

</script>
<script>
$.each($(".product_title_1"),function(){
  $(this).html(truncate($(this).html(),35));
})
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('userpanel.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\subra\Documents\projects\rollswallah\resources\views/userpanel/product-list.blade.php ENDPATH**/ ?>