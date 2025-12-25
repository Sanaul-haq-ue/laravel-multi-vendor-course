<nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{route('home')}}" class="{{ Request::routeIs('home') ? 'active' : '' }}">Home<br></a></li>
          <li><a href="about.html" class="{{ Request::routeIs('about') ? 'active' : '' }}">About</a></li>
          <li><a href="{{route('courses')}}" class="{{ Request::routeIs('courses') ? 'active' : '' }}">Courses</a></li>
          <li><a href="{{route('trainers')}}" class="{{ Request::routeIs('trainers') ? 'active' : '' }}">Trainers</a></li>
          <li><a href="events.html">Events</a></li>
          <li><a href="pricing.html">Pricing</a></li>
          <li><a href="contact.html">Contact</a></li>
          @if(Auth::check())
          <li class="dropdown"><a href="#"><span>{{Auth::user()->name}}</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
								@csrf
							</form>
              <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a></li>
            </ul>
          </li>
          @endif

          
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
      @if(!Auth::check())
      <a class="btn-getstarted" href="{{route('register')}}">Sign in / Sign up</a>
      @endif