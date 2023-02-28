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
<input type="hidden" id="user_id" value="{{$user_id}}">
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
         @foreach(array_merge($categories,$subcategories) as $item)
         <x-slider-item :item="$item"/>
         @endforeach
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
               
               @if($products->count() > 0)
              
               @foreach($products as $product)    
               <div class="col-xl-3 product col-md-3 col-sm-6 xl-3 pl-1 pr-1 col-6 wow @if($product->id%2 == 0)fadeInRight @else fadeInLeft @endif   " data-wow-duration=".5s">  
                  <x-product  :product="$product" />
               </div>
               @endforeach
               
        </div>
        </div>
        @else
        <div class="alert alert-danger">Sorry! We could not load more products</div>
        @endif
        @if($products->hasMorePages())
        <div class="col-md-12  text-success rounded"><a class="nav-link h6 border rounded text-white pull-left" href="{{$products->nextPageUrl()}}">See More...</a></div>
        @endif
      
        </div>
        </div>
    </div>
    </div>
    </div>
</div>
<x-userpanel.topsellers />


<x-userpanel.categories />



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