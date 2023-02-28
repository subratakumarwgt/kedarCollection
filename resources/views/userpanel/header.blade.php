@php($cart_rows = new App\View\Components\userpanel\cartRows)
<div class="header">
    <header class="navbar navbar-expand-sm navbar-fixed header_main " >
        <div class="container">
            <div class="navbar-nav-wrap align-items-center justify-content-between">
                <a class="site-brand p-1" href="/">
                <img src="/images/logosmall.png" width="45" />
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
                        <li class="nav-item dropdown">
                      
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">COLLECTIONS</a>
                            <div class="dropdown-menu">                              
                                @foreach($collections as $collection)
                                <a class="dropdown-item" href="{{route('shop-by-collection',['id'=>$collection->id])}}">{{$collection->name}}</a>
                                @endforeach
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                       
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">CATEGORIES</a>
                            <div class="dropdown-menu">                                
                                @foreach($categories as $category)
                                <a class="dropdown-item" href="{{route('shop-by-category',['id'=>$category->id])}}">{{$category->name}}</a>
                                @endforeach
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
                            <li class="nav-item dropdown notification">
                                <a href="#" class="nav-link mini_cart dropdown-toggle" data-toggle="dropdown">
                                    <span class="notification_ind"></span><small><strong id="cart_count">({{$cart_rows->cart_items_count}})</strong></small>
                                    <img src="/images/cart.svg" width="25" height="25" />
                                </a>
                                <div class="dropdown-menu" id="cart_row">
                                    <x-userpanel.cart_rows />
                                </div>
                            </li>
                            @if(Auth::check())
                            <li class="nav-item dropdown notification">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                    <span class="notification_ind"></span><small><strong>({{Auth::user()->notifications->count()}})</strong></small>
                                    <img src="/images/bell-solid.svg" width="25" height="25" />
                                </a>
                                <div class="dropdown-menu">
                                    @foreach(Auth::user()->notifications as $notification)
                                    @if(is_array($notification->data))
                                    @php($data = $notification->data)
                                    
                                    <a href="#" class="notification_item d-flex pl-2 pt-2 bg-light">
                                        <div class="notification_image">
                                            <img width="40" height="40" src="/images/prod2.webp" class="img-fluid rounded-circle">
                                        </div>
                                        <div class="notification_text">
                                            <h4 class="text-primary">{{$data["title"]}}</h4>
                                            <p>{{$data["body"]}} <small class="pull-right">{{"on ".date("H:i, d M",strtotime($notification->created_at)) }}</small></p>
                                            
                                        </div>
                                    </a>
                                    @endif
                                    @endforeach
                                </div>
                            </li>
                            @endif
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                    <img src="/images/user.svg" width="25" height="25" />
                                    <span>Hi {{Auth::check() ? Auth::User()->name : "user"}}</span>
                                </a>
                                <div class="dropdown-menu">    
                                    @if(Auth::check())                                
                                    <a href="{{route('profile-password')}}"   class="dropdown-item"><i data-feather="user"></i><span>Account </span></a>
                                    <a href="/log-out"  class="dropdown-item"><i data-feather="log-in"> </i><span>Log Out</span></a>
                                    @else
                                    <a href="{{route('login')}}"  class="dropdown-item"><i data-feather="log-in"> </i><span>Log In</span></a>
                                    <a href="{{route('sign-up')}}"  class="dropdown-item"><i data-feather="log-in"> </i><span>Sign Up</span></a>
                                    @endif
                                </div>
                            </li>
                    </ul>
                </div>
            </div>
        </div>
</div>
</header>
</div>
