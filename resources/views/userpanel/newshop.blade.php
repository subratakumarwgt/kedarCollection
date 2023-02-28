@extends('userpanel.master')

@section('title')
<title>{{Config::get('settings.brand.brand_name')}} | Shop</title>
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/animate.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/owlcarousel.css')}}">
@endsection

@section('style')
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
                                SHOP BY {{strtoupper($shop_by)}}
                            </h4>
                        </div>
                    </div>
                    <hr>
                    <div class="shop_by">    
                    @if($shop_by == "categories")             
                    @foreach($categories as $category)
                        @if(count($category->products) > 0)
                        <div class="shop">
                             <h5 class="text-dark">{{strtoupper($category->name)}} <small><strong>({{$category->products->count()}} Items)</strong> <small class="text-success"></small> </small> <a class="a small see_all  btn btn-outline-dark btn-sm" data-id="{{$category->id}}" data-type="category" href="{{route('shop-by-category',['id' => $category->id])}}">See all <i class="fa fa-eye"></i></a></h5>
                            <hr>
                            <div class="row   product_container">                                
                                @foreach($category->products->take(8) as $product)
                                    <div class="col-xl-3 product col-md-3 col-sm-6 xl-3 pl-1 pr-1 col-6 wow @if($product->id%2 == 0)fadeInRight @else fadeInLeft @endif   " data-wow-duration=".5s">
                                        <x-product :product="$product" />
                                    </div>
                                @endforeach                         
                            </div>
                        </div>                            
                        @endif
                    @endforeach                    
                    @elseif($shop_by == "collections")
                    @foreach($collections as $collection)
                        @if(count($collection->products) > 0)
                        <div class="shop">
                             <h5 class="text-dark">{{strtoupper($collection->name)}} <small class="text-success"> <small><strong>({{$collection->products->count()}} Items)</strong> </small> </small> <a class="a small see_all  btn btn-outline-dark btn-sm" data-id="{{$collection->id}}" data-type="collection" href="{{route('shop-by-collection',['id' => $collection->id])}}">See all <i class="fa fa-eye"></i></a></h5>
                            <hr>
                            <div class="row pl-1 pr-1 product_container">                                
                                @foreach($collection->products->take(8) as $product)
                                    <div class="col-xl-3 product col-md-3 col-sm-6 xl-3 pl-1 pr-1 col-6 wow   " data-wow-duration=".5s">
                                        <x-product :product="$product->product" />
                                    </div>
                                @endforeach                         
                            </div>
                        </div>                            
                        @endif
                    @endforeach
                    @elseif($shop_by == "offers")
                    @foreach($offers as $offer)
                        @if(count($offer->products) > 0)
                        <div class="shop">
                             <h5 class="text-dark">{{strtoupper($offer->name)}} <span class="badge badge-success">upto {{$offer->title}}</span> <small> <small><strong>({{$offer->products->count()}} Items)</strong> <small class="text-success"></small> </small></small>  <a class="a small see_all  btn btn-outline-dark btn-sm" data-id="{{$offer->id}}" data-type="offer" href="{{route('shop-by-offers',['id' => $offer->id])}}">See all <i class="fa fa-eye"></i></a></h5>
                            <hr>
                            <div class="row pl-1 pr-1 product_container">                                
                                @foreach($offer->products->take(8) as $product)
                                    <div class="col-xl-3 product col-md-3 col-sm-6 xl-3 pl-1 pr-1 col-6 wow   " data-wow-duration=".5s">
                                        <x-product :product="$product->product" />
                                    </div>
                                @endforeach                         
                            </div>
                        </div>                            
                        @endif
                    @endforeach
                    @endif
                    </div>
                </div>
            
    </div>
</div>

</div>









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

@endsection