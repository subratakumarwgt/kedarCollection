<link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.css')}}">
<!-- ico-font-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/icofont.css')}}">
<!-- Themify icon-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/themify.css')}}">
<!-- Flag icon-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/flag-icon.css')}}">
<!-- Feather icon-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/feather-icon.css')}}">
<!-- Plugins css start-->
<link href="{{asset('assets/css/vendors/select2.css')}}" rel="stylesheet" />
@yield('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/scrollbar.css')}}">
<!-- Bootstrap css-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/bootstrap.css')}}">
<!-- App css-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
<link id="color" rel="stylesheet" href="{{asset('assets/css/color-1.css')}}" media="screen">
<!-- Responsive css-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/responsive.css')}}">
@php($modules = \App\Models\Module::whereNull("parent_id")->get())

<div class="sidebar-wrapper">
	<div>
		<div class="logo-wrapper">
			<a href="{{'/management/dashboard'}}"><img class="img-fluid for-light p-0 m-0" src="{{asset('assets/images/logo/logo.png')}}" alt="" width="40px"><img class="img-fluid for-dark" src="{{asset('assets/images/logo/logo.png')}}" alt=""></a>
			<div class="back-btn"><i class="fa fa-angle-left"></i></div>
			<div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"></i></div>
		</div>
		<div class="logo-icon-wrapper"><a href="{{'/management/dashboard'}}"><img class="img-fluid" src="{{asset('assets/images/logo/logo.png')}}" alt="" width="40px"></a></div>
		<nav class="sidebar-main">
			<div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
			<div id="sidebar-menu">
				<ul class="sidebar-links" id="simple-bar">
					<li class="back-btn">
						<a href="{{route('/')}}"><img class="img-fluid" src="{{asset('assets/images/logo/logo.png')}}" alt="" width="40px"></a>
						<div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
					</li>
                    @foreach($modules as $module)
					<li class="sidebar-main-title">
						<div>
							<h6 class="lan-1">{{  $module->name }} </h6>                     		
						</div>
					</li>
                    @php($sub_modules = \App\Models\Module::where("parent_id",$module->id)->get())

                    @foreach($sub_modules as $sub_module)
					
					@if(Auth::User()->can('see_module_'.$sub_module->slug))

                    @if(!empty($sub_module->has_child))
                    
					<li class="sidebar-list">
						<a class="sidebar-link sidebar-title {{str_contains(url()->current(),$sub_module->prefix) ? 'active' : '' }}" href="#"><i class="{{$sub_module->icon}} text-secondary h5"></i>  <span class="lan-3">{{ $sub_module->name }}</span>
							<div class="according-menu"><i class="fa fa-angle-{{str_contains(url()->current(),$sub_module->prefix) ? 'down' : 'right' }}"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: {{ str_contains(url()->current(),$sub_module->prefix) ? 'block;' : 'none;' }}">
                        @php($urls = \App\Models\Module::where("parent_id",$sub_module->id)->get())
                         @foreach($urls as $url)
							<li><a class="lan-4 {{ Route::currentRouteName()== $url->route_name ? 'active' : '' }}" href="{{route($url->route_name)}}"><i class="{{$url->icon}}"></i> {{ $url->name }}</a></li>
                     		
                        @endforeach
						</ul>
					</li>
                    @else
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName()== $sub_module->route_name ? 'active' : '' }}" href="{{route($sub_module->route_name)}}"><i class="{{$sub_module->icon}} text-secondary h5"></i><span> {{$sub_module->name}}</span></a></li>				
                    @endif
					@endif
                    @endforeach

                    @endforeach
					
					<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName() == 'knowledgebase' ? 'active' : ''}}" href="{{ route('knowledgebase') }}"><i data-feather="sunrise"> </i><span>{{ trans('lang.Knowledgebase') }}</span></a></li>
					<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName()=='support-ticket' ? 'active' : '' }}" href="{{route('support-ticket')}}"><i data-feather="users"> </i><span>{{ trans('lang.Support Ticket') }}</span></a></li>
				</ul>
			</div>
			<div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
		</nav>
	</div>
</div>