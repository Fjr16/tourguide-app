<header class="section page-header">
    <!-- RD Navbar-->
    <div class="rd-navbar-wrap">
      <nav class="rd-navbar rd-navbar-corporate" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="106px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
        <div class="rd-navbar-collapse-toggle rd-navbar-fixed-element-1" data-rd-navbar-toggle=".rd-navbar-collapse"><span></span></div>
        <div class="rd-navbar-aside-outer">
          <div class="rd-navbar-aside">
            <!-- RD Navbar Panel-->
            <div class="rd-navbar-panel">
              <!-- RD Navbar Toggle-->
              <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
              <!-- RD Navbar Brand-->
              <div class="rd-navbar-brand">
                <!--Brand-->
                <a class="brand" href="{{ route('tourguide.dashboard') }}">
                    <x-application-logo-mini/> 
                </a>
              </div>
            </div>
            <div class="rd-navbar-aside-right rd-navbar-collapse">
              <ul class="rd-navbar-corporate-contacts">
                <li>
                  <div class="unit unit-spacing-xs">
                    <div class="unit-left"><span class="icon fa fa-clock-o"></span></div>
                    <div class="unit-body">
                      <p>09:00<span>am</span> — 05:00<span>pm</span></p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="unit unit-spacing-xs">
                    <div class="unit-left"><span class="icon fa fa-phone"></span></div>
                    <div class="unit-body"><a class="link-phone" href="tel:#">+1 323-913-4688</a></div>
                  </div>
                </li>
              </ul>
              @auth
              <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="button button-md button-default-outline-2 button-ujarak">Log Out</button>
              </form>
              @else    
                <a class="button button-md button-default-outline-2 button-ujarak" href="{{ route('login') }}">Login / Register</a>
              @endauth
            </div>
          </div>
        </div>
        <div class="rd-navbar-main-outer">
          <div class="rd-navbar-main">
            <div class="rd-navbar-nav-wrap">
                    <ul class="rd-navbar-submenu">
                        <li class="rd-nav-item {{ $title == 'Profile' ? 'active' : '' }}"><a class="rd-nav-link" href="{{ route('profile.edit') }}">My Profile</a></li>
                    </ul>
              <!-- RD Navbar Nav-->
              <ul class="rd-navbar-nav">
                <li class="rd-nav-item {{ $title == 'Dashboard' ? 'active' : '' }}"><a class="rd-nav-link" href="{{ route('tourguide.dashboard') }}">Home</a></li>
                <li class="rd-nav-item"><a class="rd-nav-link" href="{{ route('tourguide.about') }}">About</a></li>
                <li class="rd-nav-item {{ $title == 'Product' ? 'active' : '' }}"><a class="rd-nav-link" href="{{ route('tourguide.product') }}">Tour Package</a></li>
                <li class="rd-nav-item {{ $title == 'Order List' ? 'active' : '' }}"><a class="rd-nav-link" href="{{ route('tourguide/order.list') }}">Order Lists</a></li>
                {{-- <li class="rd-nav-item"><a class="rd-nav-link" href="typography.html">Typography</a></li>
                <li class="rd-nav-item"><a class="rd-nav-link" href="contact-us.html">Contact Us</a></li> --}}
              </ul>
            </div>
          </div>
        </div>
      </nav>
    </div>
</header>