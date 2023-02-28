@extends('adminpanel.master')
@section('title', 'Ecommerce')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/chartist.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/owlcarousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/prism.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Dashboard</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Dashboard</li>
<li class="breadcrumb-item active">Quick View</li>
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
  <div class="col-md-12 mb-3">
            <div class="row">
            <div class="col-xl-6 xl-100 box-col-12">
         <div class="widget-joins card widget-arrow">
            <div class="row">
               <div class="col-sm-6 pe-0">
                  <div class="media ">
                     <div class="align-self-center me-3 text-start">
                        <h6 class="mb-1">Expense</h6>
                        <h4 class="mb-0">Today</h4>
                     </div>
                     <div class="media-body align-self-center"><i class="font-{{$todayTotal_expense > $yesterdayTotal_expense ? 'success' : 'danger'}}" data-feather="arrow-{{$todayTotal_expense > $yesterdayTotal_expense ? 'up' : 'down'}}"></i></div>
                     <div class="media-body">
                        <h5 class="mb-0"> <i class="fa fa-inr"></i> <span class="counter">{{$todayTotal_expense}}</span></h5>
                        <span class="mb-1">{{$todayTotal_expense > $yesterdayTotal_expense ? '+' : '-'}} (yesterday) <i class="fa fa-inr"></i> {{$yesterdayTotal_expense}}</span>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 ps-0">
                  <div class="media">
                     <div class="align-self-center me-3 text-start">
                        <h6 class="mb-1">Expense</h6>
                        <h4 class="mb-0">Month</h4>
                     </div>
                     <div class="media-body align-self-center"><i class="font-{{$thisMonthTotal_expense > $lastMonthTotal_expense ? 'success' : 'danger'}}" data-feather="arrow-{{$thisMonthTotal_expense > $lastMonthTotal_expense ? 'up' : 'down'}}"></i></div>
                     <div class="media-body ps-2">
                        <h5 class="mb-0"> <i class="fa fa-inr"></i> <span class="counter">{{$thisMonthTotal_expense}}</span></h5>
                        <span class="mb-1">{{$thisMonthTotal_expense > $lastMonthTotal_expense ? '+' : '-'}} (last month) <i class="fa fa-inr"></i> {{$lastMonthTotal_expense}}</span>
                     </div>
                  </div>
               </div>
               <!-- <div class="col-sm-6 pe-0">
                  <div class="media border-after-xs">
                     <div class="align-self-center me-3 text-start">
                        <h6 class="mb-1">Expense</h6>
                        <h4 class="mb-0">Week</h4>
                     </div>
                     <div class="media-body align-self-center"><i class="font-{{$thisWeekTotal_expense > $lastWeekTotal_expense ? 'success' : 'danger'}}" data-feather="arrow-{{$thisWeekTotal_expense > $lastWeekTotal_expense ? 'up' : 'down'}}"></i></div>
                     <div class="media-body">
                        <h5 class="mb-0"> <i class="fa fa-inr"></i> <span class="counter">{{$thisWeekTotal_expense}}</span></h5>
                        <span class="mb-1">{{$thisWeekTotal_expense > $lastWeekTotal_expense ? '+' : '-'}} (last week) <i class="fa fa-inr"></i> {{$lastWeekTotal_expense}}</span>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 ps-0">
                  <div class="media">
                     <div class="align-self-center me-3 text-start">
                        <h6 class="mb-1">Expense</h6>
                        <h4 class="mb-0">Year</h4>
                     </div>
                     <div class="media-body align-self-center"><i class="font-{{$thisYearTotal_expense > $lastYearTotal_expense ? 'success' : 'danger'}}" data-feather="arrow-{{$thisYearTotal_expense > $lastYearTotal_expense ? 'up' : 'down'}}"></i></div>
                     <div class="media-body">
                        <h5 class="mb-0"> <i class="fa fa-inr"></i> <span class="counter">{{$thisYearTotal_expense}}</span></h5>
                        <span class="mb-1">{{$thisYearTotal_expense > $lastYearTotal_expense ? '+' : '-'}} (last year) <i class="fa fa-inr"></i> {{$lastYearTotal_expense}}</span>
                     </div>
                  </div>
               </div> -->
            </div>
         </div>
      </div>
            </div>
        </div>
  </div>
   <div class="col-md-12 mb-3">
            <div class="row">
            <div class="col-xl-6 xl-100 box-col-12">
         <div class="widget-joins card widget-arrow">
            <div class="row">
               <div class="col-sm-6 pe-0">
                  <div class="media ">
                     <div class="align-self-center me-3 text-start">
                        <h6 class="mb-1">Sale</h6>
                        <h4 class="mb-0">Today</h4>
                     </div>
                     <div class="media-body align-self-center"><i class="font-{{$todayTotal > $yesterdayTotal ? 'success' : 'danger'}}" data-feather="arrow-{{$todayTotal > $yesterdayTotal ? 'up' : 'down'}}"></i></div>
                     <div class="media-body">
                        <h5 class="mb-0"> <i class="fa fa-inr"></i> <span class="counter">{{$todayTotal}}</span></h5>
                        <span class="mb-1">{{$todayTotal > $yesterdayTotal ? '+' : '-'}} (yesterday) <i class="fa fa-inr"></i> {{$yesterdayTotal}}</span>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 ps-0">
                  <div class="media">
                     <div class="align-self-center me-3 text-start">
                        <h6 class="mb-1">Sale</h6>
                        <h4 class="mb-0">Month</h4>
                     </div>
                     <div class="media-body align-self-center"><i class="font-{{$thisMonthTotal > $lastMonthTotal ? 'success' : 'danger'}}" data-feather="arrow-{{$thisMonthTotal > $lastMonthTotal ? 'up' : 'down'}}"></i></div>
                     <div class="media-body ps-2">
                        <h5 class="mb-0"> <i class="fa fa-inr"></i> <span class="counter">{{$thisMonthTotal}}</span></h5>
                        <span class="mb-1">{{$thisMonthTotal > $lastMonthTotal ? '+' : '-'}} (last month) <i class="fa fa-inr"></i> {{$lastMonthTotal}}</span>
                     </div>
                  </div>
               </div>
               <!-- <div class="col-sm-6 pe-0">
                  <div class="media border-after-xs">
                     <div class="align-self-center me-3 text-start">
                        <h6 class="mb-1">Sale</h6>
                        <h4 class="mb-0">Week</h4>
                     </div>
                     <div class="media-body align-self-center"><i class="font-{{$thisWeekTotal > $lastWeekTotal ? 'success' : 'danger'}}" data-feather="arrow-{{$thisWeekTotal > $lastWeekTotal ? 'up' : 'down'}}"></i></div>
                     <div class="media-body">
                        <h5 class="mb-0"> <i class="fa fa-inr"></i> <span class="counter">{{$thisWeekTotal}}</span></h5>
                        <span class="mb-1">{{$thisWeekTotal > $lastWeekTotal ? '+' : '-'}} (last week) <i class="fa fa-inr"></i> {{$lastWeekTotal}}</span>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 ps-0">
                  <div class="media">
                     <div class="align-self-center me-3 text-start">
                        <h6 class="mb-1">Sale</h6>
                        <h4 class="mb-0">Year</h4>
                     </div>
                     <div class="media-body align-self-center"><i class="font-{{$thisYearTotal > $lastYearTotal ? 'success' : 'danger'}}" data-feather="arrow-{{$thisYearTotal > $lastYearTotal ? 'up' : 'down'}}"></i></div>
                     <div class="media-body">
                        <h5 class="mb-0"> <i class="fa fa-inr"></i> <span class="counter">{{$thisYearTotal}}</span></h5>
                        <span class="mb-1">{{$thisYearTotal > $lastYearTotal ? '+' : '-'}} (last year) <i class="fa fa-inr"></i> {{$lastYearTotal}}</span>
                     </div>
                  </div>
               </div> -->
            </div>
         </div>
      </div>
            </div>
        </div>
        <div class="row">
       
        <div class="col-sm-6 col-xl-6 box-col-6 mt-2">
			<div class="card">
         <div class="card-header">
					<h5>Top Selling Items by <span class="digits">Units </span></h5>
				</div>
				<div class="card-body chart-block">
					<div class="chart-overflow" id="unitItem"><div class="loader-box">
                     <div class="loader-2"></div>
                  </div></div>
				</div>
			</div>
		</div>
        <div class="col-sm-6 col-xl-6 box-col-6 mt-2">
			<div class="card">
         <div class="card-header">
					<h5>Top Selling Items by <span class="digits">Revenue </span></h5>
				</div>
				<div class="card-body chart-block">
					<div class="chart-overflow" id="column-chart2"><div class="loader-box">
                     <div class="loader-2"></div>
                  </div></div>
				</div>
			</div>
		</div>
      <div class="col-sm-12 col-xl-12 box-col-12">
			<div class="card">
				<div class="card-header">
					<h5>Sales Vs Expense Chart <span class="digits"> </span></h5>
				</div>
				<div class="card-body chart-block">
					<div class="chart-overflow" id="column-chart1"><div class="loader-box">
                     <div class="loader-2"></div>
                  </div></div>
				</div>
			</div>
		</div>
      <div class="col-sm-6 col-xl-6 box-col-6">
			<div class="card">
         <div class="card-header">
					<h5>Ice Creams vs. Fast Food<span class="digits"> </span></h5>
				</div>
				<div class="card-body p-0 chart-block">
					<div class="chart-overflow" id="pie-chart3"><div class="loader-box">
                     <div class="loader-2"></div>
                  </div></div>
				</div>
			</div>
		</div>
  	<div class="col-sm-6 col-xl-6 box-col-6">
			<div class="card">
         <div class="card-header">
					<h5>Sale vs Expense Timeline <span class="digits"> </span></h5>
				</div>
				<div class="card-body p-0 chart-block">
					<div class="chart-overflow" id="area-chart2"><div class="loader-box">
                     <div class="loader-2"></div>
                  </div></div>
				</div>
			</div>
		</div>
      <div class="col-sm-6 col-xl-6 box-col-6">
			<div class="card">
				<div class="card-header">
					<h5>Top 5 expenses</h5>
				</div>
				<div class="card-body chart-block">
					<div class="chart-overflow" id="column-chart50"><div class="loader-box">
                     <div class="loader-2"></div>
                  </div>
               </div>
				</div>
			</div>
		</div>
      <div class="col-sm-6 col-xl-6 box-col-6">
			<div class="card">
				<div class="card-header">
					<h5>Orders Timeline <span class="digits"> </span></h5>
				</div>
				<div class="card-body chart-block">
					<div class="chart-overflow" id="column-chart10"><div class="loader-box">
                     <div class="loader-2"></div>
                  </div></div>
				</div>
			</div>
		</div>

	

        </div>
      
</div>
 
<script>
  var map;
  function initMap() {
    map = new google.maps.Map(
      document.getElementById('map'),
      {center: new google.maps.LatLng(-33.91700, 151.233), zoom: 18});
  
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
  
    var features = [
      {
        position: new google.maps.LatLng(-33.91752, 151.23270),
        type: 'info'
      }, {
        position: new google.maps.LatLng(-33.91700, 151.23280),
        type: 'userbig'
      },  {
        position: new google.maps.LatLng(-33.91727341958453, 151.23348314155578),
        type: 'library'
      }
    ];
  
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
<script>

</script>
<script src="{{asset('assets/js/chart/google/google-chart-loader.js')}}"></script>
<script src="{{asset('assets/js/chart/google/google-chart.js')}}"></script>

@endsection

