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
    <title><?php echo e(Config::get('settings.brand.brand_name')); ?></title>
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
  .font-a{
    font-family: FONT-A;
  }
  .font-b{
    font-family: FONT-B;
  }
  .banner{
    background: url("<?php echo e(asset('assets/images/banner/7.png')); ?>");
    background-repeat: no-repeat;
    background-size: 100%;
    min-height:600px;
   
  }
  .navbar-x{
    margin-top: 15%;
    background: none;
  }
  @media(max-width:600px){
    .navbar-x{
    margin-top: 5%;
    background: none;
  }
  .banner{
    background: url("<?php echo e(asset('assets/images/banner/7.png')); ?>");
    background-repeat: no-repeat;
    background-size: 300%; 
    overflow: none;
   
  }
  }
  @font-face {
            font-family: FONT-A;
            font-display: swap;
            src: url(https://s3.amazonaws.com/font-public.canva.com/YAEDY6_5_7w/0/Bobby_Jones_Condensed.51f7e58118280249b2.13ce7f09978d75d4671ba7b7f8f56961.woff2);
          
            font-style: italic;
        }
@font-face {
            font-family:FONT-B;
            font-display: swap;
            src: url(https://s3.amazonaws.com/font-public.canva.com/YAD0tMyTjZs/0/Blogger_Sans-Light.f11a6082bfad53c220985.17773aceb6ac5aa22c5b172b8641cbae.woff2);
            
            font-style: bolder;
        }
    </style>
  </head>
  <body>
    <div class="landing-page">
        <section class="banner">            
            <div class="sticky-header">
            <header>                       
              <nav class="navbar navbar-b navbar-dark navbar-expand-xl  nav-padding" id="sidebar-menu"><a class="navbar-brand p-1" href="#"><img class="img-fluid" src="<?php echo e(asset('assets/images/logo/logo.png')); ?>" alt="" width="40px"></a>
                <button class="navbar-toggler navabr_btn-set custom_nav btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation"><span></span><span></span><span></span></button>

                <div class="navbar-collapse justify-content-center collapse hidenav" id="navbarDefault">
                  <ul class="navbar-nav navbar_nav_modify" id="scroll-spy">
                    <li></li> 
                    <li class="nav-item border-bottom "><a class="nav-link text-white" href="/menu?category=ice_cream">Collection</a></li>
                    <li class="nav-item border-bottom "><a class="nav-link text-white" href="/menu?category=fast_food">Categories</a></li>
                    <li class="nav-item border-bottom "><a class="nav-link text-white" href="/party-orders">Shop</a></li>
                    <li class="nav-item border-bottom "><a class="nav-link text-white" href="/contact-us">Contact Us</a></li>
                    <?php if(!Auth::check()): ?>
                    <li class="nav-item text-success pull-right"><a class="nav-link js-scroll" href="/login" target="_blank"><i class="fa fa-user"></i> <small class="">Hi! User <i class="fa fa-arrow-down"></i></small></a></li>
                    <?php else: ?>
                    <li class="nav-item "><a class="nav-link js-scroll" href="/user-dashboard" target="_blank">Dashboard</a></li>
                    <?php endif; ?>
                  </ul>
                </div>
                
              </nav>
            </header>
          </div><div class="container-fluid">
    <div class="row">
        <div class="col-md-6 pt-4">
            <div class="row justify-content-center pt-5 ">
            <div class="text-center p-5 mt-5">
            <h6 class="font-b text-white">small title sample</h6>
            <h1 class="font-b text-white">small title sample</h1>
            <button class="btn btn-success btn-lg rounded"> <i class="fa fa-eye"></i> View All products</button>
            </div>
            </div>          
        </div>

        <div class="col-md-5 pt-4 mt-5">
            <div class="row justify-content-center mt-4">
                <div class="col-6  mt-4 pull-right ">
                    <img src="<?php echo e(asset('assets/images/banner/1.jpg')); ?>" alt="" height="380px" width="280px" class="navbar-x">
                </div>
                <div class="col-6 mt-4 pull-left ">
                <img src="<?php echo e(asset('assets/images/banner/1.jpg')); ?>" alt="" height="380px" width="280px" class="navbar-x">
                </div>
            </div>
        </div>
    </div>
</div>

        </section>
    </div>

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
                                 <h5 class="font-a">Free Delivery Above <i class="fa fa-inr"></i>300</h5>
                                 <p class="font-b">No delivery charge above Rs 300</p>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4 p-3 text-center">
                           <div class="media">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                              <div class="media-body">
                                 <h5 class="font-a">Quality & Taste Assured</h5>
                                 <p class="font-b">We work hard to make the tastiest dishes in the city</p>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4 p-3 text-center">
                           <div class="media">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-gift"><polyline points="20 12 20 22 4 22 4 12"></polyline><rect x="2" y="7" width="20" height="5"></rect><line x1="12" y1="22" x2="12" y2="7"></line><path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"></path><path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"></path></svg>
                              <div class="media-body">
                                 <h5 class="font-a">Festival Offer                                 </h5>
                                 <p class="font-b">Offers & Savings all time</p>
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
              <h5>Copyright (c) <?php echo e(Config::get('settings.brand.brand_name')); ?> <?php echo e(date("Y")); ?> all rights reserved</h5>
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
</html><?php /**PATH C:\Users\subra\Documents\projects\kedarCollection\resources\views/userpanel/newhomecode.blade.php ENDPATH**/ ?>