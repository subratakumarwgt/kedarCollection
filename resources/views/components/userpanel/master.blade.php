@extends('userpanel.master')

@section('title')
<title>{{Config::get('settings.brand.brand_name')}} | {{$page->title}}</title>
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
<!-- <div class="" style="height: 200px;position:fixed;filter: blur(90px);-webkit-filter: blur(20px);background:rgba(0, 0, 0, 0.7)"><img src="/images/banner.webp" alt="" style="min-width: 900px;"></div> -->
@endsection
@section('content')
<input type="hidden" id="user_id" value="{{$user_id}}">

    @foreach($sections as $section)
   
    {!!$section !!}
    
   
    @endforeach




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