@extends('userpanel.master')
@section('title', 'Dashboard')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/animate.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/owlcarousel.css')}}">

@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Doctors <i class="fas fa-user-md"></i></h3>
@endsection

@section('breadcrumb-items')

@endsection

@section('content')

    

    <div class="card mt-3 ">
        <div class="card-header"><h4 class="h4 text-dark">Doctor Profile <i class="fas fa-user-md"></i> : </h4></div>
        <div class="card-body row justify-content-center">
            <div class="col-md-10">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="">
                            <div class="card-profile text-center"><img class="rounded-circle" src="/{{$doctor->image}}" width="170px"  alt=""></div>
                            <div class="text-center profile-details">
                                <h4 class="text-danger">Dr. {{strtoupper($doctor->name)}}</h4>
                                <h6 class="text-secondary">{{strtoupper($doctor->specialist)}}</h6>
                            </div>
                            <div class="card-footer row">
                                <div class="col-4 col-sm-4">
                                    <h6>Exp.</h6>
                                    <h5><span class="badge badge-light text-danger">{{$doctor->experience}} years</span></h5>
                                </div>
                                <div class="col-4 col-sm-4">
                                    <h6>Patients</h6>
                                    <h5><span class="badge badge-light text-danger">200+</span></h5>
                                </div>
                                <div class="col-4 col-sm-4">
                                    <h6>Visits</h6>
                                    <h5><span class="badge badge-light text-danger">{{$doctor->visit_frequency}}</span></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 justify-content-center">
                        <div class="">
                         @php($centre = \App\Models\Centre::find(json_decode($doctor->centre_id_json,true)[0]))
                            <div class="card-body row">
                                <div class="row bg-light text-primary p-2">
                                    <p class="text-primary"><i class="fas fa-clinic-medical"></i> {{$centre->name}}</p>
                                    <p class="text-primary"><i class="fas fa-map-marker-alt"></i> {{$centre->address}}</p>
                                    <p class="text-primary"><i class="fas fa-clock"></i> {{json_decode($doctor->visits->others_json)->from_time}}-{{json_decode($doctor->visits->others_json)->to_time}}</p>
                                </div>
                                <div class="row text-dark   mt-4 mb-4">
                                    <div class="col-6">Fees: <strong><i class="fas fa-inr"></i> {{$doctor->full_charge}}</strong></div>
                                    <div class="col-6"> Booking: <strong><i class="fas fa-inr"></i> {{$doctor->booking_charge}}</strong></div>
                                </div>
                                <h6>Upcoming Dates of Visits</h6>
                                <div class="owl-carousel owl-theme owl-carousel-15" id="">
                             @foreach($doctor->slots->take(7) as $slot)
                                    <div class="item">
                                        <h5>
                                            <div class="badge badge-light text-primary rounded-pill  ">{{date('l, d M',strtotime($slot->date))}} </div>
                                        </h5>
                                    </div>
                                    @endforeach
                                </div>
                                <div class=" row p-3 justify-content-center"> <button class="btn btn-dark btn-pill btn-lg"><i class="far fa-calendar-check"></i> Book Appointment</button></div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-12"><h6 class="h6 text-primary">Medical History <span class="bg-light badge  text-primary small pull-right"><i class="icon-angle-up"></i></span></h6>
                <p>{{$doctor->medical_history}}</p>
                </div>
                </div>
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
            "{{ asset('assets/images/dashboard-2')}}/";

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
@endsection

@section('script')
<script src="{{asset('assets/js/owlcarousel/owl.carousel.js')}}"></script>
<script>
    var owl_carousel_custom = {
    init: function() {
      var owl = $('#owl-carousel-13');
        owl.owlCarousel({
            items:3,
            loop:true,
            margin:30,
            autoplay:true,
            autoplayTimeout:2000,
            autoplayHoverPause:true,
            nav: false,
            dots: false,
          
        });
        var owl = $('.owl-carousel-15');
        owl.owlCarousel({
            items:2,
            dots:false,
            loop:true,
            nav:false,  
            autoplay:true,  
            autoplayTimeout:2000,
            autoplayHoverPause:true,       
            margin:30,           
        }), owl.on('mousewheel', '.owl-stage', function (e) {
            if (e.deltaY>0) {
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

$("#search_doctor").select2({
    
})
</script>
@endsection