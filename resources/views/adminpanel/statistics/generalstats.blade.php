@extends('adminpanel.master')
@section('title', 'Sample Page')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Static Assets</h3>
<button class="btn btn-primary pull-right btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-plus-circle"></i> Add New Asset</button>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">General Statistics</li>

@endsection

@section('content')
@endsection
@section('script')
<script src="{{asset('assets/js/chart/chartjs/chart.min.js')}}"></script>
<script>
    var lineGraphData = {
    labels: ["January", "February", "March", "April", "May", "June", "July"],
    datasets: [{
        label: "My First dataset",
        fillColor: "rgba(145, 46, 252, 0.3",
        strokeColor: CubaAdminConfig.primary ,
        pointColor: CubaAdminConfig.primary ,
        pointStrokeColor: "#fff",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "#000",
        data: [10, 59, 80, 81, 56, 55, 40]
    }, {
        label: "My Second dataset",
        fillColor: "rgba(247, 49, 100, 0.3)",
        strokeColor: CubaAdminConfig.secondary ,
        pointColor: CubaAdminConfig.secondary ,
        pointStrokeColor: "#fff",
        pointHighlightFill: "#000",
        pointHighlightStroke: CubaAdminConfig.secondary,
        data: [28, 48, 40, 19, 86, 27, 90]
    }]
};
var lineGraphOptions = {
    scaleShowGridLines: true,
    scaleGridLineColor: "rgba(0,0,0,.05)",
    scaleGridLineWidth: 1,
    scaleShowHorizontalLines: true,
    scaleShowVerticalLines: true,
    bezierCurve: true,
    bezierCurveTension: 0.4,
    pointDot: true,
    pointDotRadius: 4,
    pointDotStrokeWidth: 1,
    pointHitDetectionRadius: 20,
    datasetStroke: true,
    datasetStrokeWidth: 2,
    datasetFill: true,
    legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"
};
var lineCtx = document.getElementById("myGraph").getContext("2d");
var myLineCharts = new Chart(lineCtx).Line(lineGraphData, lineGraphOptions);
</script>
@endsection