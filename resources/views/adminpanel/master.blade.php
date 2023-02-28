<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="Subrata">
    <meta name="theme-color" content="#40702A" />
    <link rel="icon" href="{{asset('/assets/images/favicon2.ico')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('/assets/images/favicon2.ico')}}" type="image/x-icon">
    <title>{{Config::get('settings.brand.brand_name')}} | Admin </title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    @include('adminpanel.css')

    @yield('style')
    <style>
    .error{
       margin:1px;
       color:red;   
       max-height:30px !important ;  
    }
    </style>

  </head>
  <body @if(Route::current()->getName() == 'user-dashboard') onload="startTime()" @endif>
    <input type="hidden" id="admin_broadcast" value="{{\App\Models\ApiKey::getApiByKey('admin_broadcast','admin')}}">
    <input type="hidden" id="user_id" value="{{Auth::User()->id}}">
  
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
   
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
      <!-- Page Header Start-->
      @include('adminpanel.header')
      <!-- Page Header Ends  -->
      <!-- Page Body Start-->
      <div class="page-body-wrapper" > 
        <div id="sidebar_space"></div>
        <!-- Page Sidebar Start-->
        @include('adminpanel.dynamic_sidebar')
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid pt-3">        
            <!-- <div class="page-title">
              <div class="row">
                <div class="col-6">
                  @yield('breadcrumb-title')
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                   
                    @yield('breadcrumb-items')
                  </ol>
                </div>
              </div>
            </div> -->
          </div>
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
        @include('adminpanel.footer') 
        
      </div>
    </div>
    <!-- latest jquery-->
    @include('adminpanel.script')  
    <!-- Plugin used-->

    <!-- <script type="text/javascript">
      if ($(".page-wrapper").hasClass("horizontal-wrapper")) {
            $(".according-menu.other" ).css( "display", "none" );
            $(".sidebar-submenu" ).css( "display", "block" );
      }
    </script> -->
    @auth
    <script src="{{ asset('js/enable-push.js') }}" defer></script>
@endauth
  </body>
</html>