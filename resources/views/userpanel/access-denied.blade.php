@extends('userpanel.master')
@section('title', 'My Bookings')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/animate.css')}}">
@endsection

@section('style')
@endsection


@section('content')

<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-7">
         <h3 class="text-danger h3"> Access denied. You don't have permission to view this page</h3>
         <p> <a href="/">Get back to Home Page</a></p>
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
