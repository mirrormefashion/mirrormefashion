<div class="custom-nav">
    <div class="header-top bg-dark">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-4 offset-md-4 col-6">
                    <div class="header-top-text">
                        <p class="text-center ml-auto mr-auto text-white header-title" id="beta"> MIRROR ME FASHION <sup>BETA</sup></p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-6">
                    <div class="top-login-menu text-right">
                        @guest
                        <div id="log-buttons">
                            <a href="{{ route('login') }}" class="signup-button">Log In</a>
                            <a href="{{ route('signup') }}" class="signup-button">Sign Up</a>
                        </div>
                        @else
                        <div id="log-buttons">
                  
                       @if(auth()->user()->user_type=='customer') 
                       <a href="{{ url('user/profile') }}" class="signup-button">Profile</a>
                       @elseif (auth()->user()->user_type=='seller') 
                       <a href="{{route('dashboard')}}" class="signup-button">Profile</a>
                       @else
                       <a href="{{route('admin.dashboard')}}" class="signup-button">Profile</a>
                       @endif 
              
                           
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" class="signup-button">Sign Out</a>
                            <form id="logout-form" style="display: none;" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-4">
                   <div class="header-middle">
                    <div class="logo">
                        <a href="{{ route('home') }}">
                            @php
                                $header_logo = get_setting('header_logo');
                            @endphp
                            @if($header_logo != null)
                                <img src="{{ uploaded_asset($header_logo) }}" alt="{{ env('APP_NAME') }}" class="logo">
                            @else
                                <img src="{{ static_asset('assets/img/logo.png') }}" alt="{{ env('APP_NAME') }}" class="logo" >
                            @endif
                        </a>
                    </div>
                    
                    <div id="menuItem" class="menu-bar d-md-none" >
                        <i class="las la-bars" ></i>
                    </div>
                   </div>
                </div>
                <div class="col-lg-8 col-md-8 primary-menu">
                    <div class="social-link text-right d-md-block d-none">
                        <ul class="social-icons social">
                            <li class="list-inline-item"> <a class="facebook" href="https://www.facebook.com/mirrormefashion"><i style="color:#900" class="lab la-facebook-f"></i></a> </li>
                            <li class="list-inline-item"> <a class="twitter" href="https://www.twitter.com/mirrormefashion"><i style="color:#900" class="lab la-twitter"></i></a> </li>
                            <li class="list-inline-item"> <a class="linkedin" href="https://www.linkedin.com/company/mirrormefashion"><i style="color:#900" class="lab la-linkedin-in"></i></a> </li>
                            <li class="list-inline-item"> <a class="instagram" href="https://www.instagram.com/mirrormefashion/"><i style="color:#900" class="lab la-instagram"></i></a> </li>
                        </ul>
                    </div>
                    <div class="main-menu">
                        <nav class="menu-item">                          
                            <ul>
                                @if (session('status'))
                                <li>
                                    <a href="{{ URL('/profile') }}">Dashboard</a>
                                </li>
                                @endif
                                <li>
                                    <a href="{{ URL('/') }}">Home</a>
                                </li>
                                <li>
                                    <a href="{{ URL('/blog') }}">Blog</a>
                                </li>
                                <li>
                                    <a href="{{ URL('/about') }}">About</a>
                                </li>
                                <li>
                                    <a href="{{ URL('/shop') }}">Shop</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
</div>
