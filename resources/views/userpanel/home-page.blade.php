@extends('userpanel.master')

@section('title')
<title>{{Config::get('settings.brand.brand_name')}} | Shop</title>
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/animate.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/owlcarousel.css')}}">
@endsection

@section('style')
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
@endsection

@section('breadcrumb-title')

@endsection

@section('breadcrumb-items')

@endsection
@section('banner')
<div class="" style="height: 200px;position:fixed;filter: blur(90px);-webkit-filter: blur(20px);background:rgba(0, 0, 0, 0.7)"><img src="/images/banner.webp" alt="" style="min-width: 900px;"></div>
@endsection
@section('content')

     <x-userpanel.offers />

   <x-userpanel.topsellers />

  
      <x-userpanel.categories />

     <x-userpanel.collections />




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



      @endsection
      @section('script')


<script src="{{asset('assets/js/touchspin/touchspin.js')}}"></script>
<script src="{{asset('assets/js/touchspin/input-groups.min.js')}}"></script>
<script src="{{asset('assets/js/owlcarousel/owl.carousel.js')}}"></script>

<script src="{{asset('assets/js/product-tab.js')}}"></script>
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

@endsection