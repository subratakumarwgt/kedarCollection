<!DOCTYPE html>
<html lang="en">
  <head>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="All Is Well is solution for all of your medical queries including checkup, appointments, diagnosis medicine and non medical supliments at one roof">
    <meta name="keywords" content="All Is Well is solution for all of your medical queries including checkup, appointments, diagnosis medicine and non medical supliments at one roof">
    <meta name="author" content="pixelstrap">
    <link rel="shortcut icon" href="assets('images/favicon.ico')" type="image/x-icon">
    <link rel="icon" href="assets('images/favicon.ico')" type="image/x-icon">
    <title>{{Config::get('settings.brand.brand_name')}} | Home</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.css')}}">
    <!-- ico-font-->
    <!-- <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/icofont.css')}}">
     Themify icon-->
    <!-- <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/themify.css')}}"> 
    Flag icon
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/flag-icon.css')}}">
    Feather icon
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/feather-icon.css')}}"> -->
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/animate.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/owl.theme.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/owl-carousel.min.css')}}">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <!-- App css-->
    <!-- <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}"> -->
    <!-- <link id="color" rel="stylesheet" href="{{asset('assets/css/color-1.css')}}" media="screen"> -->
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/reponsive.css')}}">
    <!-- <link type="text/css" rel="stylesheet" href="{{('css/bootstrap.min.css')}}" /> -->
        <!-- <link type="text/css" rel="stylesheet" href="css/owl-carousel.min.css" /> -->
        <!-- <link type="text/css" rel="stylesheet" href="css/animate.min.css" /> -->
        <link type="text/css" rel="stylesheet" href="{{asset('css/style.css')}}" />
        <!-- <link type="text/css" rel="stylesheet" href="css/reponsive.css" />  -->
    <link rel="stylesheet" href="https://rawcdn.githack.com/rafaelbotazini/floating-whatsapp/3d18b26d5c7d430a1ab0b664f8ca6b69014aed68/floating-wpp.min.css">
    <style type="text/css">
        .img-wrapper-square {
    width: 150px;
    height: 150px;
    border-bottom: blueviolet;
    border-radius: 0.3em;
    overflow: hidden;
  }

  .img-wrapper-rounded {
    width: 150px;
    height: 150px;
    border-bottom: blueviolet;
    border-radius: 50%;
    overflow: hidden;

  }

  .img-wrapper-square img {
    height: 200px;
  }

  .img-wrapper-rounded img {
    height: 200px;
  }
  .img-height-200{
    height: 200px !important;
  }
    </style>
    @include('userpanel.css')

    @yield('style')
    <style>
    .error{
       margin:1px;
       color:red;     
    }
</style>

  </head>
  <body @if(Route::current()->getName() == 'index') onload="startTime()" @endif>
    @if(Route::current()->getName() == 'user-dashboard') 
      <div class="loader-wrapper">
        <div class="loader-index"><span></span></div>
        <svg>
          <defs></defs>
          <filter id="goo">
            <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
            <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo"> </fecolormatrix>
          </filter>
        </svg>
      </div>
     @endif
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
      <!-- Page Header Start-->
      @include('userpanel.header')
      <!-- Page Header Ends  -->
      <!-- Page Body Start-->
      <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        @include('userpanel.sidebar')
        <!-- Page Sidebar Ends-->
        <div class="page-body p-0">
        <!-- <div class="container-fluid">        
            <div class="page-title">
              <div class="row p-2">
                <div class="col-6">
                  @yield('breadcrumb-title')
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('/') }}"> <i data-feather="home"></i></a></li>
                    @yield('breadcrumb-items')
                  </ol>
                </div>
              </div>
            </div>
          </div> -->
        <!-- <div class="container-fluid">         -->
         @yield('banner')
          <!-- </div> -->

          <!-- Container-fluid starts-->
          <div class="row justify-content-center">
            <div class="col-md-11">
            @if (session('message'))
                        <div class="alert alert-info" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
         
            </div>
          </div>
          
          @yield('content')
          <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
        @include('userpanel.footer') 
        
      </div>
    </div>
    <!-- latest jquery-->
    @include('userpanel.script')  
  
  </body>
</html>