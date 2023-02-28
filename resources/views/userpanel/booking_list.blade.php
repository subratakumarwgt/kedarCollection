@extends('userpanel.master')
@section('title', 'My Bookings')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/animate.css')}}">
@endsection

@section('style')
@endsection
@section('breadcrumb-title')
<h5> My Bookings</h5>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Settings</li>
<li class="breadcrumb-item active">My Bookings </li>
@endsection
@section('banner')
<div class="" style="height: 200px;position:fixed;filter: blur(12px);-webkit-filter: blur(12px);"><img src="{{asset('assets/images/bg_3-33.jpg')}}" alt="" style="min-width: 1000px;"></div>
@endsection



@section('content')

<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-7">
            @foreach($bookings as $booking)
			<div class="card">

				<div class="card-body ">
					<h6 class="text-primary">Booking info</h6>
					<p class="m-0 border-bottom p-2">Booking ID: <strong class="badge badge-warning rounded pl-3 pr-3 text-dark pull-right">{{$booking->booking_id}}</strong></p>
					<p class="m-0 border-bottom p-2">Booking for: <strong class=" text-dark rounded pl-3 pr-3 text-dark pull-right">{{$booking->booking_type}}</strong></p>
					<p class="m-0 border-bottom p-2">Charge: <strong class="text-success rounded pl-3 pr-3 text-dark pull-right"><i class="fa fa-inr "></i> {{@$booking->amount_paid}}.00</strong></p>
					<p class="m-0 border-bottom p-2">Payment details: <a class="text-success nav-link pull-right" href="#">Click here <i class="fa fa-share"></i></a></p>
					<p class="m-0 border-bottom p-2"> Date:  <strong class="bg-light pl-3 pr-3  text-dark pull-right"><i class="fa fa-calendar"></i>  {{@$booking->booking_date ?? "pending"}}</strong></p>
                    <p class="m-0 border-bottom p-2"> Time:  <strong class="bg-light pl-3 pr-3 text-dark pull-right"><i class="fa fa-clock-o"></i>  {{$booking->booking_time ?? "not set yet"}}</strong></p>
                   
					<h6 class="text-primary mt-4">Visit info</h6>
								<p class="m-0 border-bottom p-2"> Doctor: <strong class="pull-right ">Dr {{@$booking->doctor->name}}</strong></p>
								<p class="m-0 border-bottom p-2"> Doctor fees: <strong class="pull-right  text-warning text-dark"><i class="fa fa-inr "></i> {{@$booking->doctor->full_charge}}.00</strong></p>
                                <p class="m-0 border-bottom p-2"> Centre: <strong class="pull-right ">{{@$booking->centre->name}}</strong></p>
								<p class="m-0 p-2">Address:<p> <strong class=" border-bottom p-2"> {{@$booking->centre->address}}</strong></p></p>
								
				
					<!-- cd-timeline Start-->
					
					<!-- cd-timeline Ends-->
					<!-- Container-fluid ends   
				                 -->
								 <div class="p-2"><button class="btn btn-outline-danger btn-sm detailsBtn" data-id = "{{$booking->booking_id}}">Details</button><strong class="badge badge-danger  pull-right">Status: {{@$booking->booking_status}}</strong></div>
				</div>
               
			</div>
            @endforeach
		</div>
	</div>
</div>

@endsection
@section('script')
<script>
	$(".detailsBtn").on('click',function(){
		var id = $(this).data('id')
		window.open('/my-bookings/'+id,'_self')
	})
</script>
@endsection
