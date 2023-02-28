<div class="page-header close_icon">
  <div class="header-wrapper row m-0">
    <form class="form-inline search-full col" action="#" method="get">
      <div class="mb-3 w-100">
        <div class="Typeahead Typeahead--twitterUsers">
          <div class="u-posRelative">
            <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search Cuba .." name="q" title="" autofocus>
            <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading...</span></div>
            <i class="close-search" data-feather="x"></i>
          </div>
          <div class="Typeahead-menu"></div>
        </div>
      </div>
    </form>
    <div class="header-logo-wrapper col-auto p-0">
      <div class="logo-wrapper"><a href="{{route('/')}}"><img class="img-fluid" src="{{asset('assets/images/logo/logo.jpg')}}" alt="" width="50px"></a></div>
      <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i></div>
    </div>
    <div class="left-header col horizontal-wrapper ps-0">
      <ul class="horizontal-menu">
      <a href="{{'/'}}"><img class="img-fluid" src="{{asset('assets/images/logo/logo.png')}}" width="50px" alt=""></a>
       <!-- <div class="col-md-6 col-10"><a href="/"><i class="fa fa-arrow-left" aria-hidden="true"></i>  Dashboard</a></div> -->
      </ul>
    </div>
    <div class="nav-right col-8 pull-right right-header p-0">
      <ul class="nav-menus">
        <li class="language-nav">
      
        </li>
        <li id="searchBtn">                         <i data-feather="search"></i></li>

        <li class="onhover-dropdown">
          <div class="notification-box"><i data-feather="bell"> </i><span class="badge rounded-pill badge-secondary">0</span></div>
          <ul class="notification-dropdown onhover-show-div">
            <li>
              <i data-feather="bell"></i>
              <h6 class="f-18 mb-0">Notitications</h6>
            </li>
           
          </ul>
        </li>
        @if(Auth::check())
        @php($cart_rows = \App\Models\Cart::where('user_id',Auth::User()->id)->get())
        @else
        @php($cart_rows = \App\Models\Cart::where('user_id',Session::getId())->get())
        @endif
       
        <li class="cart-nav onhover-dropdown">
          <div class="cart-box"><i data-feather="shopping-cart"></i><span class="badge rounded-pill badge-primary" id="cart_count">{{$cart_rows->count()}}</span></div>
          <ul class="cart-dropdown onhover-show-div" style="overflow-y: scroll;overflow-x: none;max-height: 550px !important">
            <li id="cart_row">
              <h6 class="mb-0 f-20"><i class="fa fa-shopping-cart"></i>  Food Cart</h6>
              <i data-feather="shopping-cart"></i>
            </li>
            @foreach($cart_rows as $cart)
            <li class="mt-0">
              <div class="media">
                <!-- <img class="img-fluid rounded-circle me-3 img-60" src="/{{$cart->product->image}}" alt=""> -->
                <div class="media-body">
                  <span class="text-primary product_title" data-toggle="tooltip" title="{{strtoupper($cart->product->title)}}">{{strtoupper($cart->product->title)}}</span>
                  <p><i class="fa fa-inr"></i>{{$cart->product->price}}</p>
                  <p>X {{$cart->quantity}}</p>
                  
                  <h6 class="text-end text-muted"><small>Subtotal:</small> <i class="fa fa-inr"></i> {{$cart->product->price*$cart->quantity}}</h6>
                </div>
                <div class="close-circle"><a href="#"><i class="fa fa-trash text-danger"></i></a></div>
              </div>
            </li>
            @endforeach
  
            <li>
            
            </li>
            <li><a class="btn btn-block w-100 mb-2 btn-primary view-cart" href="{{ route('cart-items') }}"><i class="fa fa-eye"></i> See Cart</a><a class="btn btn-block w-100 btn-secondary view-cart" href="{{ route('checkout') }}">Checkout</a></li>
          </ul>
        </li>
      
    
        <!-- <li>
          <div class="mode"><i class="fa fa-moon-o"></i></div>
        </li>
       -->
        <!-- <li class="maximize"><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li> -->
        <li class="profile-nav onhover-dropdown p-0 me-0">
          <div class="media profile-media">
            <img class="b-r-10" width="40px" src="/storage/{{Auth::User()->profile->image ?? 'profileimage/default.png'}}" alt="" >
            <div class="media-body">
              <span>{{Auth::User()->name ?? "Guest"}}</span>
              <p class="mb-0 font-roboto">{{Auth::User()->role ?? "Guest"}} <i class="middle fa fa-angle-down"></i></p>
            </div>
          </div>
          <ul class="profile-dropdown onhover-show-div">
            <li><a href="#"><i data-feather="user"></i><span>Account </span></a></li>
            <li><a href="/log-out"><i data-feather="log-in"> </i><span>Log Out</span></a></li>
          </ul>
        </li>
      
      </ul>
    </div>
    <script class="result-template" type="text/x-handlebars-template">
      <div class="ProfileCard u-cf">                        
      <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
      <div class="ProfileCard-details">
      <div class="ProfileCard-realName">@{{name}}</div>
      </div>
      </div>
    </script>
    <script class="empty-template" type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
  </div>
  <div class="p-4 bg-primary" style="display:none" id="searchBox"><div class="input-group input-group-air mb-3"><input type="text" class="form-control" placeholder="Search for doctors/products/medicines"> <div class="input-group-append "><button class="btn"><i class='fa fa-search text-light'></i></button></div></div>
</div>
</div>
<div class="header">
        <header class="navbar navbar-expand-sm navbar-fixed header_main">
          <div class="container">
            <div class="navbar-nav-wrap align-items-center justify-content-between">
                <a class="site-brand" href="index.html">
                    <img src="images/logo.png" width="60" />
                </a> 
                <button class="menu-toggle ml-auto">
                  <span class="menu-bar"></span>
                  <span class="menu-bar"></span>
                  <span class="menu-bar"></span>
                </button>
                <div class="nav_wrap navbar-nav align-items-center">
                  <ul class="nav">
                      <li class="nav-item">
                        <a href="/" class="nav-link">HOME</a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link">COLLECTIONS</a>
                      </li>
                      <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">CATEGORIES</a>                        
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="#">Link 1</a>
                          <a class="dropdown-item" href="#">Link 2</a>
                          <a class="dropdown-item" href="#">Link 3</a>
                        </div>
                      </li> 
                      <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">SHOP</a>                        
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="#">Link 1</a>
                          <a class="dropdown-item" href="#">Link 2</a>
                          <a class="dropdown-item" href="#">Link 3</a>
                        </div>
                      </li>  
                      <li class="nav-item pull-right">
                        <a href="#" class="nav-link">CONTACT US</a>
                      </li>
                      <li class="nav-item pull-right">
                        <a href="#" class="nav-link">FEEDBACK</a>
                      </li>                
                  </ul>
                  <div class="nav_right">
                    <ul class="nav">
                      <li class="nav-item">
                        <a href="#" class="nav-link mini_cart dropdown-toggle" data-toggle="dropdown">
                          <span class="notification_ind"></span>
                          <img src="images/cart.svg" width="25" height="25" />
                        </a>
                        <div class="dropdown-menu">
       
                          <x-userpanel.cart_rows  />
                        </div>
                      </li>
                      <li class="nav-item dropdown notification">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                          <span class="notification_ind">25</span>
                          <img src="images/bell-solid.svg" width="25" height="25" />
                        </a>
                        <div class="dropdown-menu">
                          <a href="#" class="notification_item d-flex">
                            <div class="notification_image">
                              <img width="40" height="40" src="images/prod2.webp" class="img-fluid rounded-circle">
                            </div>
                            <div class="notification_text">
                              <h4>Notification title</h4>
                              <small class="notification_time">4:17PM</small>
                            </div>
                          </a>
                          <a href="#" class="notification_item d-flex">
                            <div class="notification_image">
                              <img width="40" height="40" src="images/prod2.webp" class="img-fluid rounded-circle">
                            </div>
                            <div class="notification_text">
                              <h4>Notification title</h4>
                              <small class="notification_time">4:17PM</small>
                            </div>
                          </a>
                          <a href="#" class="notification_item d-flex">
                            <div class="notification_image">
                              <img width="40" height="40" src="images/prod2.webp" class="img-fluid rounded-circle">
                            </div>
                            <div class="notification_text">
                              <h4>Notification title</h4>
                              <small class="notification_time">4:17PM</small>
                            </div>
                          </a>
                          <a href="#" class="notification_item d-flex">
                            <div class="notification_image">
                              <img width="40" height="40" src="images/prod2.webp" class="img-fluid rounded-circle">
                            </div>
                            <div class="notification_text">
                              <h4>Notification title</h4>
                              <small class="notification_time">4:17PM</small>
                            </div>
                          </a>
                          <a href="#" class="notification_item d-flex">
                            <div class="notification_image">
                              <img width="40" height="40" src="images/prod2.webp" class="img-fluid rounded-circle">
                            </div>
                            <div class="notification_text">
                              <h4>Notification title</h4>
                              <small class="notification_time">4:17PM</small>
                            </div>
                          </a>
                        </div>
                      </li>
                      <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                          <img src="images/user.svg" width="25" height="25" />
                          <span>Hi user</span>
                        </a>
                        <div class="dropdown-menu">
                        <li><a href="#"><i data-feather="user"></i><span>Account </span></a></li>
                        <li><a href="/log-out"><i data-feather="log-in"> </i><span>Log Out</span></a></li>
                        </div>
                      </li>               
                    </ul>
                  </div>
                </div>
            </div>
          </div>
        </header>
      </div>
