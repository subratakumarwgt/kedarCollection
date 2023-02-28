<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="All Is Well is solution for all of your medical queries including checkup, appointments, diagnosis medicine and non medical supliments at one roof">
    <meta name="keywords" content="All Is Well is solution for all of your medical queries including checkup, appointments, diagnosis medicine and non medical supliments at one roof">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="<?php echo e(asset('/assets/images/favico.ico')); ?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo e(asset('/assets/images/favico.ico')); ?>" type="image/x-icon">
    <title>Rollswallah - Have some rolls</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/font-awesome.css')); ?>">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/icofont.css')); ?>">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/themify.css')); ?>">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/flag-icon.css')); ?>">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/feather-icon.css')); ?>">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/animate.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/owlcarousel.css')); ?>">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/bootstrap.css')); ?>">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/style.css')); ?>">
    <link id="color" rel="stylesheet" href="<?php echo e(asset('assets/css/color-1.css')); ?>" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/responsive.css')); ?>">
    <link rel="stylesheet" href="https://rawcdn.githack.com/rafaelbotazini/floating-whatsapp/3d18b26d5c7d430a1ab0b664f8ca6b69014aed68/floating-wpp.min.css">
    <style type="text/css">
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
  .img-height-200{
    height: 200px !important;
  }
    </style>
  </head>

  <body class="landing-page">
    <!-- page-wrapper Start-->
    <div class="page-wrapper landing-page">
      <!-- Page Body Start            -->
      <div class="landing-home">
        <ul class="decoration">
          <li class="one"><img class="img-fluid" src="<?php echo e(asset('assets/images/landing/decore/1.png')); ?>" alt=""></li>
          <li class="two"><img class="img-fluid" src="<?php echo e(asset('assets/images/landing/decore/veg.png')); ?>" alt=""></li>
          <li class="three"><img class="img-fluid" src="<?php echo e(asset('assets/images/landing/decore/4.png')); ?>" alt=""></li>
          <li class="four"><img class="img-fluid" src="<?php echo e(asset('assets/images/landing/decore/3.png')); ?>" alt=""></li>
          <li class="five"><img class="img-fluid" src="<?php echo e(asset('assets/images/landing/veg.png')); ?>" alt=""></li>
          <li class="six"><img class="img-fluid" src="<?php echo e(asset('assets/images/landing/decore/food.png')); ?>" alt=""></li>
          <li class="seven"><img class="img-fluid" src="<?php echo e(asset('assets/images/landing/veg.png')); ?>" alt=""></li>
        </ul>
        <div class="container-fluid">
          <div class="sticky-header">
            <header>                       
              <nav class="navbar navbar-b navbar-trans navbar-expand-xl fixed-top nav-padding" id="sidebar-menu"><a class="navbar-brand p-0" href="#"><img class="img-fluid" src="<?php echo e(asset('assets/images/rollswallah.png')); ?>" alt=""></a>
                <button class="navbar-toggler navabr_btn-set custom_nav" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation"><span></span><span></span><span></span></button>
                <div class="navbar-collapse justify-content-end collapse hidenav" id="navbarDefault">
                  <ul class="navbar-nav navbar_nav_modify" id="scroll-spy">
                    <li class="nav-item"><a class="nav-link" href="/menu?category=ice_cream">Ice Creams</a></li>
                    <li class="nav-item"><a class="nav-link" href="/menu?category=fast_food">Fast Food</a></li>
                    <li class="nav-item"><a class="nav-link" href="/party-orders">Party Orders</a></li>
                    <li class="nav-item"><a class="nav-link" href="/contact-us">Contact Us</a></li>
                    <?php if(!Auth::check()): ?>
                    <li class="nav-item buy-btn"><a class="nav-link js-scroll" href="/login" target="_blank">Login/Signup</a></li>
                    <?php else: ?>
                    <li class="nav-item buy-btn"><a class="nav-link js-scroll" href="/user-dashboard" target="_blank">Dashboard</a></li>
                    <?php endif; ?>
                  </ul>
                </div>
              </nav>
            </header>
          </div>
          <div class="row">
          
            <div class="col-xl-3 col-lg-3">
              <div class="content"> 
                <div>
                  <h1 class="wow fadeIn">Rollswallah</h1>
                  <h2 class="txt-secondary wow fadeIn">Pure Veg Food Corner & Ice Cream Parlour</h2>
                 
                  <!-- <h2 class="txt-secondary wow fadeIn">Healthy, Best Ice Cream Parlour, in-town </h2>
                  <p class="mt-3 wow fadeIn">All Is Well is solution for all of your medical queries including checkup, appointments, diagnosis medicine and non medical supliments at one roof</p> -->
                  <button class="btn btn-pill btn-dark btn-lg btn-gradient shadow"><i class="fa fa-cutlery"></i> See menu!</button>
                  
                 </div> 
              </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-sm-12">                 
              <div class="wow fadeIn"><img class="screen1" src="<?php echo e(asset('assets/images/rollsbg1.png')); ?>" alt="" width="600px" style="opacity: 0.7;"></div>
              <div class="wow fadeIn"><img class="screen2" src="<?php echo e(asset('assets/images/rollsbg.png')); ?>" alt="" width="600px" style="opacity: 0.8;"></div>
            </div>
           
          </div>
        </div>
      </div>
      <section class="section-space cuba-demo-section layout " id="layout">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 wow pulse">
              <div class="cuba-demo-content">
                <div class="couting">
                  <h2 class="mb-2 txt-secondary">50+ Ice Cream Rolls </h2>                 
                  <p>Get the best ice cream in the city</p>
                  <p> <button class="btn btn-pill btn-dark  btn-outline-primary-2x btn-air-primary text-white btn-lg"><i class="fa fa-eye"></i> See all the Ice Creams</button></p>
                </div>
                
              </div>
              <div class="owl-carousel owl-theme owl-carousel-deal" id="owl-carousel-12">
                <?php $__currentLoopData = $ice_creams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if (isset($component)) { $__componentOriginal0ecba0329182f047873cd449c4fc8c739c8c5e7d = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Offers\RoundSlider::class, ['item' => $item]); ?>
<?php $component->withName('offers.round-slider'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0ecba0329182f047873cd449c4fc8c739c8c5e7d)): ?>
<?php $component = $__componentOriginal0ecba0329182f047873cd449c4fc8c739c8c5e7d; ?>
<?php unset($__componentOriginal0ecba0329182f047873cd449c4fc8c739c8c5e7d); ?>
<?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        <div class="item">
          <div class="img-wrapper-rounded shadow border-bottom border-primary  bg-light align-middle text-center text-primary pt-5" >  <h6 class=""><a href="/" class=""><i class="fa fa-eye"></i> See All Items <i class="fa fa-share"></i></a></h6></div>
         
        </div>
      </div>
            </div>
          </div>
        </div>
       
      </section>
     
    
      
      <!-- <section class="section-space cuba-demo-section bg-Widget pb-5 bg-dark">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 wow pulse">
              <div class="cuba-demo-content mt50">
                <div class="couting">
                  <h2>Veg Fast Food Items </h2>
      
                </div>
                
                <p>Variety of Veg Items at very attractive prices. </p>
                <p> <button class="btn btn-pill btn-white  btn-outline-primary-2x btn-air-primary text-white btn-lg" ><i class="fa fa-eye"></i> See all food items</button></p>
              </div>
              <div class="owl-carousel owl-theme owl-carousel-deal" id="owl-carousel-12">
              <?php $__currentLoopData = $ice_creams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="item">
          <div class="img-wrapper-square shadow-sm border-bottom border-primary"><div class="ribbon ribbon-danger ribbon-left"> - <i class="fa fa-inr small"></i> <?php echo e($item->pre_price - $item->price); ?></div><img src="/<?php echo e($item->image); ?>" alt="" class="img-height-200"></div>
          <div class="h6 text-center"><?php echo e($item->title); ?></div>
          <div class=" text-success small text-center border border-success rounded bg-white"><i class="fa fa-inr small"></i> <?php echo e($item->price); ?>

            <del class="text-danger"><small> </small><i class="fa fa-inr small"></i><?php echo e($item->pre_price); ?> </del> 
          </div>               
          </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="item">
          <div class="img-wrapper-rounded shadow border-bottom border-primary  bg-light align-middle text-center text-primary pt-5" >  <h6 class=""><a href="/" class="">See All Items <i class="fa fa-share"></i></a></h6></div>
         
        </div>
      </div>

            </div>
          </div>
        </div>
       
          
      </section> -->
     <!--  <section class="section-space cuba-demo-section email_bg">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 wow pulse">
              <div class="cuba-demo-content mt50">
                <div class="couting">
                  <h2> 30+ Diagnostic Tests</h2>
                  <p> Book your dates for tests. Get all informations here</p>
                  <p> <button class="btn btn-pill btn-dark  btn-outline-primary-2x btn-air-primary text-white btn-lg" >See all tests</button></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section> -->
<div class="row justify-content-center p-2">
    <div class="row justify-content-center">
        <div class="col-md-10 bg-white mt-3">
               <div class="card-body">
                  <div class="collection-filter-block">
                     <div class="row">
                        <div class="col-md-4 p-3 text-center">
                           <div class="media ">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-truck"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
                              <div class="media-body">
                                 <h5>Free Delivery Above <i class="fa fa-inr"></i>300</h5>
                                 <p>No delivery charge above Rs 300</p>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4 p-3 text-center">
                           <div class="media">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                              <div class="media-body">
                                 <h5>Quality & Taste Assured</h5>
                                 <p>We work hard to make the tastiest dishes in the city</p>
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
</div>
<script src="<?php echo e(asset('assets/js/jquery-3.5.1.min.js')); ?>"></script>
<!-- Bootstrap js-->
<script src="<?php echo e(asset('assets/js/bootstrap/bootstrap.bundle.min.js')); ?>"></script>
<!-- feather icon js-->
<script src="<?php echo e(asset('assets/js/icons/feather-icon/feather.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/icons/feather-icon/feather-icon.js')); ?>"></script>
<!-- scrollbar js-->
<script src="<?php echo e(asset('assets/js/scrollbar/simplebar.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/scrollbar/custom.js')); ?>"></script>
<!-- Sidebar jquery-->
<script src="<?php echo e(asset('assets/js/config.js')); ?>"></script>
<!-- Plugins JS start-->
<script id="menu" src="<?php echo e(asset('assets/js/sidebar-menu.js')); ?>"></script>

<script src="<?php echo e(asset('assets/js/datatable/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datepicker/date-picker/datepicker.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/notify/bootstrap-notify.min.js')); ?>"></script>
<script src="https://kit.fontawesome.com/568e34549e.js" crossorigin="anonymous"></script>
<script src="<?php echo e(asset('assets/js/form-validation-custom.js')); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.js"></script>
<script src="<?php echo e(asset('assets/js/select2/select2.full.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/loadingoverlay.js')); ?>"></script>
<script src="<?php echo e(asset('assets/toastr/js/toastr.min.js')); ?>"></script>

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
   
      <footer class="footer-bg">
        <div class="container">
          <div class="landing-center ptb50">
            <div class="title"><img class="img-fluid" src="<?php echo e(asset('assets/images/rollswallah.png')); ?>" alt=""></div>
            <div class="footer-content">
              <h5>Copyright (c) Rollswallah 2022-2050 all rights reserved</h5>
             </div>
          </div>
        </div>
      </footer>
    </div>
    <!-- latest jquery-->
    <script src="https://kit.fontawesome.com/568e34549e.js" crossorigin="anonymous"></script>
    <script src="<?php echo e(asset('assets/js/jquery-3.5.1.min.js')); ?>"></script>
    <!-- Bootstrap js-->
    <script src="<?php echo e(asset('assets/js/bootstrap/bootstrap.bundle.min.js')); ?>"></script>
    <!-- feather icon js-->
    <script src="<?php echo e(asset('assets/js/icons/feather-icon/feather.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/icons/feather-icon/feather-icon.js')); ?>"></script>
    <!-- scrollbar js-->
    <!-- Sidebar jquery-->
    <script src="<?php echo e(asset('assets/js/config.js')); ?>"></script>
    <!-- Plugins JS start-->
    <script src="<?php echo e(asset('assets/js/owlcarousel/owl.carousel.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/tooltip-init.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/animation/wow/wow.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/landing_sticky.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/landing.js')); ?>"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="<?php echo e(asset('assets/js/script.js')); ?>"></script>
    <!-- login js-->
    <!-- Plugin used-->
    <script type="text/javascript" src="https://rawcdn.githack.com/rafaelbotazini/floating-whatsapp/3d18b26d5c7d430a1ab0b664f8ca6b69014aed68/floating-wpp.min.js"></script>
    <script>
            $('#WAButton').floatingWhatsApp({
    phone: '917003197408', //WhatsApp Business phone number International format-
    //Get it with Toky at https://toky.co/en/features/whatsapp.
    headerTitle: 'Text us on WhatsApp!', //Popup Title
    popupMessage: 'Hello, how can we help you?', //Popup Message
    showPopup: true, //Enables popup display
    buttonImage: '<img src="https://rawcdn.githack.com/rafaelbotazini/floating-whatsapp/3d18b26d5c7d430a1ab0b664f8ca6b69014aed68/whatsapp.svg" />', //Button Image
    //headerColor: 'crimson', //Custom header color
    //backgroundColor: 'crimson', //Custom background button color
    position: "right",
   
  });
    </script>
  </body>
</html><?php /**PATH C:\Users\subra\Documents\projects\rollswallah\resources\views/userpanel/home-page.blade.php ENDPATH**/ ?>