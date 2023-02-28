
<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/animate.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/chartist.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/owlcarousel.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/prism.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<style>
  .img-wrapper-square {
    width: 150px;
    height: 150px;
    border-bottom: blueviolet;
    border-radius: 0.3em;
    overflow: hidden;
  }

  .img-wrapper-rounded {
    width: 150px;
    height: 150px;
    border-bottom: blueviolet;
    border-radius: 50%;
    overflow: hidden;

  }

  .img-wrapper-square img {
    height: 200px;
  }

  .img-wrapper-rounded img {
    height: 200px;
  }
  .owl-prev {
    width: 15px;
    height: 100px;
    position: absolute;
    top: 40%;
    margin-left: -20px;
    display: block !important;
    border:0px solid black !important;
}

.owl-next {
    width: 15px;
    height: 100px;
    position: absolute;
    top: 40%;
    right: -25px;
    display: block !important;
    border:0px solid black !important;
}
.owl-prev i, .owl-next i {transform : scale(1,6); color: #ccc;}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('banner'); ?>
<div class="" style="height: 200px;position:fixed;filter: blur(12px);-webkit-filter: blur(12px);"><img src="<?php echo e(asset('assets/images/bg_3-33.jpg')); ?>" alt="" style="min-width: 1000px;"></div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- <div class="row justify-content-center ">
<div class="col-md-11 h5 p-3">Doctors/Visits/Tests:</div>
<div class="col-md-11  p-2">
<div class="card-header h6 bg-danger text-light">Cardiologists in City</div>
<div class="card-header bg-light text-primary"> <a href="/" class="">See All Items <i class="fa fa-share"></i></a></div>
<div class="card-body border-bottom border-danger">
<img src="<?php echo e(asset('assets/images/other-images/bg-profile.png')); ?>" alt="" class="img-fluid">
</div>

</div>

</div> -->

<div class="row justify-content-center ">
  <div class="col-md-11 h5 p-3">Offers/Combos/Items:</div>
  <div class="col-md-11  p-2">
    <div class="card-header h6 bg-success text-light">Todays Great Deals</div>
    <div class="card-header bg-light text-primary"> <a href="/" class="">See All Items <i class="fa fa-share"></i></a></div>    
    <div class="card-body bg-white mb-4">
      <div class="owl-carousel owl-theme owl-carousel-deal" id="owl-carousel-12">
        <div class="item">
          <div class="img-wrapper-rounded shadow border-bottom border-primary"><div class="ribbon ribbon-danger ribbon-left"> - <i class="fa fa-inr small"></i> 19</div><img src="<?php echo e(asset('assets/images/product/1.png')); ?>" alt="" height="200px"></div>
          <div class="h6 text-center">BRU COFFEE GOLD</div>
          <div class=" text-success small text-center border border-success rounded"><i class="fa fa-inr small"></i> 200
            <del class="text-danger"><small>MRP </small><i class="fa fa-inr small"></i>220 </del> 
          </div>                   
                      
        </div>
        <div class="item">
          <div class="img-wrapper-rounded shadow border-bottom border-primary"><div class="ribbon ribbon-danger ribbon-left"> - <i class="fa fa-inr small"></i> 25</div><img src="<?php echo e(asset('assets/images/product/1.png')); ?>" alt="" height="200px"></div>
          <div class="h6 text-center">BRU COFFEE GOLD</div>
          <div class=" text-success small text-center border border-success rounded"><i class="fa fa-inr small"></i> 200
            <del class="text-danger"><small>MRP </small><i class="fa fa-inr small"></i>220 </del> 
          </div>
        </div>
        <div class="item">
          <div class="img-wrapper-rounded shadow border-bottom border-primary"><div class="ribbon ribbon-danger ribbon-left"> - <i class="fa fa-inr small"></i> 5</div><img src="<?php echo e(asset('assets/images/product/1.png')); ?>" alt="" height="200px"></div>
          <div class="h6 text-center">BRU COFFEE GOLD</div>
          <div class=" text-success small text-center border border-success rounded"><i class="fa fa-inr small"></i> 200
            <del class="text-danger"><small>MRP </small><i class="fa fa-inr small"></i>220 </del> 
          </div>
        </div>
        <div class="item">
          <div class="img-wrapper-rounded shadow border-bottom border-primary  bg-light align-middle text-center text-primary pt-5" >  <h6 class=""><a href="/" class="">See All Items <i class="fa fa-share"></i></a></h6></div>
         
        </div>
      </div>
    </div>
    <div class="card-header h6 bg-success text-light">Upto 10% Off On Beauty Products <small class="text-danger">(*)</small></div>
    <div class="card-header bg-light text-primary"> <a href="/" class="">See All Items <i class="fa fa-share"></i></a></div>
    <div class="card-body bg-white mb-4">
      <div class="owl-carousel owl-theme owl-carousel-12 owl-responsive" id="owl-carousel-12">
        <div class="item"><img src="<?php echo e(asset('assets/images/other-images/bg-profile.png')); ?>" alt="" height="200px"></div>
        <div class="item"><img src="<?php echo e(asset('assets/images/other-images/bg-profile.png')); ?>" alt="" height="200px"></div>        
        <!-- <div class="item">  </div> -->
      </div>
    </div>
    <div class="card-header h6 bg-success text-light">Combo Saving upto <i class="fa fa-inr small"></i>50 </div>
    <div class="card-header bg-light text-primary"> <a href="/" class="">See All Items <i class="fa fa-share"></i></a></div>

    <div class="card-body bg-white mb-4">
      <div class="owl-carousel owl-theme owl-carousel-deal" id="owl-carousel-12">
        <div class="item">
          <div class="img-wrapper-sqaure shadow border-bottom border-primary"><div class="ribbon ribbon-danger ribbon-right">Save  <i class="fa fa-inr small"></i> 50</div><img src="<?php echo e(asset('assets/images/product/1.png')); ?>" alt="" height="200px"></div>
          <div class="h6 text-center">BRU COFFEE GOLD</div>
          <div class=" text-success small text-center border border-success rounded"><i class="fa fa-inr small"></i> 200
            <del class="text-danger"><small>MRP </small><i class="fa fa-inr small"></i>220 </del> <button class="btn add-to-cart" type="button" data-product = ""><i class="fa fa-plus-circle"></i> <i class="icon-shopping-cart"></i></button>
          </div>
         
        </div>
        <div class="item">
          <div class="img-wrapper-sqaure shadow border-bottom border-primary"><div class="ribbon ribbon-danger ribbon-right">Save  <i class="fa fa-inr small"></i> 19</div><img src="<?php echo e(asset('assets/images/product/1.png')); ?>" alt="" height="200px"></div>
          <div class="h6 text-center">BRU COFFEE GOLD</div>
          <div class=" text-success small text-center border border-success rounded"><i class="fa fa-inr small"></i> 200
            <del class="text-danger"><small>MRP </small><i class="fa fa-inr small"></i>220 </del> <button class="btn add-to-cart" type="button" data-product = ""><i class="fa fa-plus-circle"></i> <i class="icon-shopping-cart"></i></button>
          </div>
        </div>
        <div class="item">
          <div class="img-wrapper-sqaure shadow border-bottom border-primary"><img src="<?php echo e(asset('assets/images/product/1.png')); ?>" alt="" height="200px"></div>
          <div class="h6 text-center">BRU COFFEE GOLD</div>
          <div class=" text-success small text-center border border-success rounded"><i class="fa fa-inr small"></i> 200
            <del class="text-danger"><small>MRP </small><i class="fa fa-inr small"></i>220 </del>  <button class="btn add-to-cart" type="button" data-product = ""><i class="fa fa-plus-circle"></i> <i class="icon-shopping-cart"></i></button>
          </div>
        </div>
        <div class="item">
          <div class="img-wrapper-square shadow border-bottom border-primary  bg-light align-middle text-center text-primary pt-5" >  <h6 class=""><a href="/" class="">See All Items <i class="fa fa-share"></i></a></h6></div>
         
        </div>
      </div>
    </div>

    <div class="card-header h6 bg-success text-light">Upto 5% Off On Health & Hygine*</div>
    <div class="card-header bg-light text-primary"> <a href="/" class="">See All Items <i class="fa fa-share"></i></a></div>
    <div class="card-body bg-white mb-4">
      <div class="owl-carousel owl-theme owl-carousel-12" id="owl-carousel-12">
        <div class="item"><img src="<?php echo e(asset('assets/images/big-masonry/3.jpg')); ?>" alt="" height="200px"></div>
        <div class="item"><img src="<?php echo e(asset('assets/images/big-masonry/3.jpg')); ?>" alt="" height="200px"></div>
      </div>
    </div>
        <div class="col-md-12 bg-white mt-3">
               <div class="card-body">
                  <div class="collection-filter-block">
                     <div class="row">
                        <div class="col-md-4 p-3 text-center">
                           <div class="media ">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-truck"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
                              <div class="media-body">
                                 <h5>Free Shipping Above <i class="fa fa-inr small"></i>500</h5>
                                 <p>Free Shipping World Wide</p>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4 p-3 text-center">
                           <div class="media">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                              <div class="media-body">
                                 <h5>24 X 7 Service                                    </h5>
                                 <p>Online Booking Service For Patients</p>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4 p-3 text-center">
                           <div class="media">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-gift"><polyline points="20 12 20 22 4 22 4 12"></polyline><rect x="2" y="7" width="20" height="5"></rect><line x1="12" y1="22" x2="12" y2="7"></line><path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"></path><path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"></path></svg>
                              <div class="media-body">
                                 <h5>Festival Offer                                 </h5>
                                 <p>Offers & Savings all time</p>
                              </div>
                           </div>
                        </div>
                       
                     </div>
                  </div>
               </div>
               <!-- silde-bar colleps block end here-->
            </div>

  </div>
</div>


<script>
  var map;

  function initMap() {
    map = new google.maps.Map(
      document.getElementById('map'), {
        center: new google.maps.LatLng(-33.91700, 151.233),
        zoom: 18
      });

    var iconBase =
      "<?php echo e(asset('assets/images/dashboard-2')); ?>/";

    var icons = {
      userbig: {
        icon: iconBase + '1.png'
      },
      library: {
        icon: iconBase + '3.png'
      },
      info: {
        icon: iconBase + '2.png'
      }
    };

    var features = [{
      position: new google.maps.LatLng(-33.91752, 151.23270),
      type: 'info'
    }, {
      position: new google.maps.LatLng(-33.91700, 151.23280),
      type: 'userbig'
    }, {
      position: new google.maps.LatLng(-33.91727341958453, 151.23348314155578),
      type: 'library'
    }];

    // Create markers.
    for (var i = 0; i < features.length; i++) {
      var marker = new google.maps.Marker({
        position: features[i].position,
        icon: icons[features[i].type].icon,
        map: map
      });
    };
  }
</script>
<script async="" defer="" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGCQvcXUsXwCdYArPXo72dLZ31WS3WQRw&amp;callback=initMap"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>



<script src="<?php echo e(asset('assets/js/owlcarousel/owl.carousel.js')); ?>"></script>

<script>
  var owl = $('.owl-carousel-12');
  owl.owlCarousel({
    items: 1,
    loop: true,
    touchDrag: true,
    mouseDrag: false,
    lazyload: true,
    margin: 30,
    autoplay: true,
    autoWidth: true,
    singleItem: true,
    autoHeight: true,
    autoplayHoverPause: true,
    nav: true,
    smartSpeed: 800,
    mergeFit: true,
    dots: true,
    responsive: {
      // breakpoint from 0 up
      0: {
        items: 1,
        loop: true,
        singleItem: true,
        autoHeight: true,
        autoWidth: false

      },
      // breakpoint from 480 up
      480: {
        items: 1,
        loop: false,
        singleItem: true,
        autoHeight: true,
      },
      // breakpoint from 768 up
      768: {
        items: 5
      }
    }

  });
  var owl = $('.owl-carousel-deal');
  owl.owlCarousel({
    items: 3,
    loop: true,
    touchDrag: true,
    mouseDrag: false,
    margin: 30,
    autoplay: true,
    autoWidth: true,
    singleItem: true,
    autoHeight: true,
    autoplayHoverPause: true,
    nav: true,
    smartSpeed: 400,
    mergeFit: true,
    dots: false,
    responsive: {
      // breakpoint from 0 up
      0: {

        loop: false,
        autoplay: false,
        autoHeight: false,
        autoWidth: true

      },
      // breakpoint from 480 up
      480: {
        items: 1,
        loop: false,
        singleItem: true,
        autoHeight: true,
      },
      // breakpoint from 768 up
      768: {
        items: 5
      }
    }

  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('userpanel.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\subra\Documents\Projects\alliswell\Cuba\resources\views/userpanel/dashboard.blade.php ENDPATH**/ ?>