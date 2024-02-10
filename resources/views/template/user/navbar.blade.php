<nav id="navbar" class="navbar">
  <ul>
    <li><a href="{{ route('home') }}">Home</a></li>
    <li><a href="{{ route('konsultasi') }}">Konsultasi</a></li>
    <li><a href="#portfolio">Bookmark</a></li>
    <li><a href="{{ route('pedoman')}}">Pedoman</a></li>
    <!-- <li><a href="#contact">Contact</a></li> -->
    <!-- Authentication Links -->
    @guest
    @if (Route::has('login'))
    <li class="nav-item">
      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
    </li>
    @endif

    @if (Route::has('register'))
    <li class="nav-item">
      <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
    </li>
    @endif
    @else
    <li class="nav-item dropdown">
      <div class="nav-link nav-profile d-flex align-items-center pe-0 dropdown-toggle" href="#" data-bs-toggle="dropdown">
        <img src="admin/img/profile-img.jpg" alt="Profile" class="rounded-circle" style="width: 30px; height: 30px;">
        <a id="navbarDropdown" class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
          {{ Auth::user()->name }}
        </a>
      </div>

      <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" style="background-color: #F9F54B;">
        <a class="dropdown-item" style="color: black;" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
          {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
      </div>
    </li>
    @endguest
  </ul>
</nav><!-- .navbar -->