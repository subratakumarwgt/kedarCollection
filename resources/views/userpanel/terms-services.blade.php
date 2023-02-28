@extends('userpanel.master')
@section('title', 'Dashboard')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/animate.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/owlcarousel.css')}}">

@endsection

@section('style')


@endsection
@section('banner')
<div class="" style="height: 200px;position:fixed;filter: blur(90px);-webkit-filter: blur(20px);background:rgba(0, 0, 0, 0.7)"><img src="/images/banner.webp" alt="" style="min-width: 900px;"></div>
@endsection
@section('breadcrumb-title')
<h5> Checkout</h5>
@endsection

@section('breadcrumb-items')

@endsection
@section('content')
@php($page = App\Models\Page::whereSlug("terms_services")->first())
<div class="container">
    <div class="row justify-content-center mt-5">
    
    <div class="card mt-5">
        <div class="card-header h4">{{ $page->title }}</div>
        <div class="card-body">
            {!! $page->content !!}
        </div>
    </div>

    </div>
</div>

@endsection
@section("script")

@endsection