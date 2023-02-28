<div class="sidebar-wrapper">
	<div>
		<div class="logo-wrapper">
			<a href="{{'/management/dashboard'}}"><img class="img-fluid for-light" src="{{asset('assets/images/logo/rollswallah.png')}}" alt=""><img class="img-fluid for-dark" src="{{asset('assets/images/logo/rollswallah.png')}}" alt=""></a>
			<div class="back-btn"><i class="fa fa-angle-left"></i></div>
			<div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
		</div>
		<div class="logo-icon-wrapper"><a href="{{'/management/dashboard'}}"><img class="img-fluid" src="{{asset('assets/images/logo/rollswallah.png')}}" alt=""></a></div>
		<nav class="sidebar-main">
			<div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
			<div id="sidebar-menu">
				<ul class="sidebar-links" id="simple-bar">
					<li class="back-btn">
						<a href="{{route('/')}}"><img class="img-fluid" src="{{asset('assets/images/logo/rollswallah.png')}}" alt=""></a>
						<div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
					</li>
					<li class="sidebar-main-title">
						<div>
							<h6 class="lan-1">{{ trans('lang.General') }} </h6>
                     		<p class="lan-2">{{ trans('Management tools.') }}</p>
						</div>
					</li>
					<li class="sidebar-list">
						<label class="badge badge-success">2</label><a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/dashboard' ? 'active' : '' }}" href="#"><i data-feather="home"></i><span class="lan-3">{{ trans('Static Assets') }}</span>
							<div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/dashboard' ? 'down' : 'right' }}"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/dashboard' ? 'block;' : 'none;' }}">
							<li><a class="lan-4 {{ Route::currentRouteName()=='index' ? 'active' : '' }}" href="{{route('index')}}">{{ trans('lang.Default') }}</a></li>
                     		<li><a class="lan-5 {{ Route::currentRouteName()=='dashboard-02' ? 'active' : '' }}" href="{{route('dashboard-02')}}">{{ trans('lang.Ecommerce') }}</a></li>
						</ul>
					</li>
					<li class="sidebar-list">
							<a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/widgets' ? 'active' : '' }}" href="#"><i data-feather="airplay"></i><span class="lan-6">{{ trans('lang.Widgets') }}</span>
								<div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/widgets' ? 'down' : 'right' }}"></i></div>
							</a>
							<ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/widgets' ? 'block;' : 'none;' }}">
			                    <li><a href="{{route('general-widget')}}" class="{{ Route::currentRouteName()=='general-widget' ? 'active' : '' }}">{{ trans('lang.General') }}</a></li>
			                    <li><a href="{{route('chart-widget')}}" class="{{ Route::currentRouteName()=='chart-widget' ? 'active' : '' }}">{{ trans('lang.Chart') }}</a></li>
		                  	</ul>
					</li>
					<li class="sidebar-main-title">
						<div>
							<h6 class="lan-1">Operation Tools</h6>
							<p>Slots/Bookings/Orders/</p>
                     		
						</div>
					</li>
					<li class="sidebar-list">
						<a class="sidebar-link sidebar-title {{ request()->route()->getPrefix() == '/centre' ? 'active' : '' }}" href="#"><i class="far fa-calendar-plus text-secondary h5"></i>
							<span class="lan-7">{{ "Slot Arrangement" }}</span>
							<div class="according-menu"><i class="fa fa-angle-{{ request()->route()->getPrefix() == '/slot' ? 'down' : 'right' }}"></i></div>
						</a>
	                    <ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/slot' ? 'block;' : 'none;' }}">
                          <li><a href="/operation/slot/create" class="{{ Route::currentRouteName() == 'slot-create' ? 'active' : '' }}"> <i class="far fa-plus-square"></i>  Create Slots</a></li>
                          <li><a href="/operation/slot/list" class="{{ Route::currentRouteName() == 'slot-list' ? 'active' : '' }}"><i class="far fa-list-alt"></i>  All Slots</a></li>    
						 @if(Route::currentRouteName() == 'slot-edit') <li><a href="/operation/slot/edit/{{@$slot->id}}" class="{{ Route::currentRouteName() == 'slot-edit' ? 'active' : '' }}">Edit</a></li>@endif          
                        
                      </ul>
                  	</li>
					<li class="sidebar-main-title">
						<div>
							<h6 class="lan-1">Management Tools</h6>
							<p>List/Add/Update/Delete</p>
                     		
						</div>
					</li>
					<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName()=='static-assets' ? 'active' : '' }}" href="{{route('static-assets')}}"><i class="fas fa-list text-secondary h5"></i><span> Assets Management</span></a></li>
					<li class="sidebar-list">
						<a class="sidebar-link sidebar-title {{ request()->route()->getPrefix() == '/centre' ? 'active' : '' }}" href="#"><i class="fas fa-clinic-medical text-secondary h5"></i>  </i>  
							<span class="lan-7">{{ "Centre Management" }}</span>
							<div class="according-menu"><i class="fa fa-angle-{{ request()->route()->getPrefix() == '/centre' ? 'down' : 'right' }}"></i></div>
						</a>
	                    <ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/centre' ? 'block;' : 'none;' }}">
                          <li><a href="/management/centre/list" class="{{ Route::currentRouteName() == 'centre-list' ? 'active' : '' }}"><i class="far fa-list-alt"></i>  List</a></li>
                          <li><a href="/management/centre/import" class="{{ Route::currentRouteName() == 'centre-profile' ? 'active' : '' }}"> <i class="far fa-plus-square"></i>  Add New</a></li>    
						 @if(Route::currentRouteName() == 'centre-edit') <li><a href="/management/centre/edit/{{@$centre->id}}" class="{{ Route::currentRouteName() == 'centre-edit' ? 'active' : '' }}">Edit</a></li>@endif          
                        
                      </ul>
                  	</li>
					<li class="sidebar-list">
						<a class="sidebar-link sidebar-title {{ request()->route()->getPrefix() == '/contact' ? 'active' : '' }}" href="#"><i class="fas fa-address-book text-secondary h5" ></i>
							<span class="lan-7">{{ "Contact Management" }}</span>
							<div class="according-menu"><i class="fa fa-angle-{{ request()->route()->getPrefix() == '/contact' ? 'down' : 'right' }}"></i></div>
						</a>
	                    <ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/contact' ? 'block;' : 'none;' }}">
                          <li><a href="/management/contact/list" class="{{ Route::currentRouteName() == 'contact-list' ? 'active' : '' }}"><i class="far fa-list-alt"></i>  List</a></li>
                          <li><a href="/management/contact/import" class="{{ Route::currentRouteName() == 'contact-import' ? 'active' : '' }}"><i class="far fa-plus-square"></i>  Import</a></li>   
                        
                      </ul>
                  	</li>
					  <li class="sidebar-list">
						<a class="sidebar-link sidebar-title {{ request()->route()->getPrefix() == '/doctor' ? 'active' : '' }}" href="#"><i class="fas fa-user-md text-secondary h5" >  </i>  
							<span class="lan-7">{{ "  Doctors Management" }}</span>
							<div class="according-menu"><i class="fa fa-angle-{{ request()->route()->getPrefix() == '/doctor' ? 'down' : 'right' }}"></i></div>
						</a>
	                    <ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/doctor' ? 'block;' : 'none;' }}">
                          <li><a href="/management/doctor/list" class="{{ Route::currentRouteName() == 'doctor-list' ? 'active' : '' }}"><i class="far fa-list-alt"></i>  List</a></li>
                          <li><a href="/management/doctor/import" class="{{ Route::currentRouteName() == 'doctor-import' ? 'active' : '' }}"><i class="far fa-plus-square"></i>  Add</a></li>  
						  @if(Route::currentRouteName() == 'doctor-edit') <li><a href="/management/doctor/edit/{{@$doctor->id}}" class="{{ Route::currentRouteName() == 'doctor-edit' ? 'active' : '' }}">Edit</a></li>@endif         
                        
                      </ul>
                  	</li>
					  <li class="sidebar-list">
						<a class="sidebar-link sidebar-title {{ request()->route()->getPrefix() == '/diagnosis' ? 'active' : '' }}" href="#"><i class="fas fa-vials text-secondary h5"></i>   
							<span class="lan-7">{{ "Diagnosis Management" }}</span>
							<div class="according-menu"><i class="fa fa-angle-{{ request()->route()->getPrefix() == '/diagnosis' ? 'down' : 'right' }}"></i></div>
						</a>
	                    <ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/diagnosis' ? 'block;' : 'none;' }}">
                          <li><a href="/management/diagnosis/list" class="{{ Route::currentRouteName() == 'diagnosis-list' ? 'active' : '' }}"><i class="far fa-list-alt"></i>  List</a></li>
                          <li><a href="/management/diagnosis/register" class="{{ Route::currentRouteName() == 'diagnosis-import' ? 'active' : '' }}"><i class="far fa-plus-square"></i>  Add</a></li>          
                        
                      </ul>
                  	</li>
					  <li class="sidebar-list">
						<a class="sidebar-link sidebar-title {{ request()->route()->getPrefix() == '/product' ? 'active' : '' }}" href="#"><i class="fas fa-pump-medical text-secondary h5"></i>  
							<span class="lan-7">{{ "Products Management" }}</span>
							<div class="according-menu"><i class="fa fa-angle-{{ request()->route()->getPrefix() == '/product' ? 'down' : 'right' }}"></i></div>
						</a>
	                    <ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/product' ? 'block;' : 'none;' }}">
                          <li><a href="/management/product/list" class="{{ Route::currentRouteName() == 'product-list' ? 'active' : '' }}"><i class="far fa-list-alt"></i>  List</a></li>
                          <li><a href="/management/product/import" class="{{ Route::currentRouteName() == 'product-import' ? 'active' : '' }}"><i class="far fa-plus-square"></i>  Add</a></li>          
                        
                      </ul>
                  	</li>
					  <li class="sidebar-list">
						<a class="sidebar-link sidebar-title {{ request()->route()->getPrefix() == '/user' ? 'active' : '' }}" href="#"><i class="fas fa-user-tie text-secondary h5"></i></i>  
							<span class="lan-7">{{ "Users Management" }}</span>
							<div class="according-menu"><i class="fa fa-angle-{{ request()->route()->getPrefix() == '/user' ? 'down' : 'right' }}"></i></div>
						</a>
	                    <ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/user' ? 'block;' : 'none;' }}">
                          <li><a href="/management/user/list" class="{{ Route::currentRouteName() == 'user-list' ? 'active' : '' }}"><i class="far fa-list-alt"></i>  List</a></li>
                          <li><a href="/management/user/register" class="{{ Route::currentRouteName() == 'user-import' ? 'active' : '' }}"><i class="far fa-plus-square"></i>  Add</a></li>          
                        
                      </ul>
                  	</li>
					<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName() == 'knowledgebase' ? 'active' : ''}}" href="{{ route('knowledgebase') }}"><i data-feather="sunrise"> </i><span>{{ trans('lang.Knowledgebase') }}</span></a></li>
					<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName()=='support-ticket' ? 'active' : '' }}" href="{{route('support-ticket')}}"><i data-feather="users"> </i><span>{{ trans('lang.Support Ticket') }}</span></a></li>
				</ul>
			</div>
			<div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
		</nav>
	</div>
</div>