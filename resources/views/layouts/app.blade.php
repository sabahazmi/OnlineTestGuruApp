<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="text/javascript">window.Laravel = { csrfToken: '{{ csrf_token() }}'}</script>
    <title>{{ config('app.name', 'Online Test Guru') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- <script src="https://cdn.jsdelivr.net/npm/artplayer/dist/artplayer.js"></script> -->



     <link href="https://vjs.zencdn.net/7.8.3/video-js.css" rel="stylesheet" />

  <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
  <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>

    <meta name="author" content="Sabah Azmi">
    <style type="text/css">
      button:focus{
        outline:none;
      }
      @media(min-width:320px) and (max-width:767px){ 
        .searchForm input {
          width: auto !important; 
        }
      }
.searchForm input {
    padding: .4rem .8rem;
    border: 1px solid #6cb2eb;
    border-radius: 100px 0 0 100px;
    color:#000;
    text-align: center;
    outline: none;
    width: 25rem;
    font-size: .9rem;
}
body{
    color: #000;
    /*background-image: linear-gradient(270deg,#17141D,#e52e71);*/
    position: relative;
}
.card-header{
    color: #fff;
    background-image: linear-gradient(270deg,#ff8a00,#e52e71);
    position: relative;
}

.searchForm button {
    /*background: #ff826b;*/
    border: 1px solid #6cb2eb;
    padding: .4rem 1rem;
    color: #fff;
    border-radius: 0 100px 100px 0;
    outline: 0;
    width: 5rem;
    font-size: .9rem;
    cursor: pointer;
    -webkit-transition: all .2s;
    transition: all .2s;
}
    </style>
  </head>
  <body class="bg-light">
      <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
          <a class="navbar-brand" href="{{ url('/') }}">
          <!-- {{ config('app.name', 'Online Test Guru') }} -->
          <img src="{{ asset('img/otg_logo2.jpeg') }}">
          </a>
          <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto text-center">
              <!-- Authentication Links -->
              
              @guest
              <li class="nav-item">
                <a class="nav-link menuList" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
              @if (Route::has('register'))
              <li class="nav-item">
                <a class="nav-link menuList" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
              @endif
              @else
              <li class="nav-item">
                <a class="nav-link menuList" href="{{ url('packages') }}">{{ __('Package') }}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link menuList" href="{{ url('category') }}">{{ __('Category') }}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link menuList" href="{{ url('course') }}">{{ __('Course') }}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link menuList" href="{{ url('video') }}">{{ __('Video') }}</a>
              </li>
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link menuList dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <i class="caret menucaret"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right p-2" aria-labelledby="navbarDropdown">
                  <a class="nav-link menuList text-center" href="
                    @if(Auth::user()->role->slug == 'instructor')
                    /instructor/dashboard
                    @elseif(Auth::user()->role->slug == 'student')
                    /student/dashboard
                    @elseif(Auth::user()->role->slug == 'admin')
                    /admin/dashboard
                    @endif
                  ">{{ __('Dashboard') }}</a>

                   <a class="nav-link menuList text-center" href="{{ url('package') }}">{{ __('My Courses') }}</a>
                  <a class="nav-link menuList text-center" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                   

                </div>
              </li>
              @endguest
            </ul>
          </div>
        </div>
      </nav>
    <div id="app">

      <main class="py-0">
        @yield('content')
      </main>

    </div>
              <!-- Site footer -->
  <footer class="site-footer">
  <div class="container">
  <div class="row">
    <div class="col-sm-12 col-md-6">
      <h6>About</h6>
      <p class="text-justify">
  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
    </div>

    {{-- <div class="col-xs-6 col-md-3">
      <h6>Categories</h6>
      <ul class="footer-links">
        <li><a href="">C</a></li>
        <li><a href="">UI Design</a></li>
        <li><a href="">PHP</a></li>
        <li><a href="">Java</a></li>
        <li><a href="">Android</a></li>
        <li><a href="">Templates</a></li>
      </ul>
    </div> --}}
    <div class="col-xs-6 col-md-3">
      <h6>Quick Links</h6>
      <ul class="footer-links">
        <li><a href="/about">About Us</a></li>
        <li><a href="/services">Services</a></li>
        <li><a href="#">Privacy Policy</a></li>
        <li><a href="#">Sitemap</a></li>
      </ul>
    </div>
    <div class="col-xs-6 col-md-3">
      <h6>Quick Links</h6>
      <ul class="footer-links">
        <li><a href="">About Us</a></li>
        <li><a href="">Contact Us</a></li>
        <li><a href="">Privacy Policy</a></li>
        <li><a href="">Sitemap</a></li>
      </ul>
    </div>
  </div>
  <hr>
  </div>
  <div class="container">
  <div class="row">
    <div class="col-md-8 col-sm-6 col-xs-12">
      <p class="copyright-text">Copyright &copy; 2017 All Rights Reserved by
   <a href="#" class="text-success">Online Test Guru</a>.
      </p>
    </div>

    <div class="col-md-4 col-sm-6 col-xs-12">
      <ul class="social-icons">
        <li><a class="facebook" href="#"><i class="fab fa-facebook"></i></a></li>
        <li><a class="twitter" href="#"><i class="fab fa-twitter"></i></a></li>
        <li><a class="youtube" href="#"><i class="fab fa-youtube"></i></a></li>
        <li><a class="linkedin" href="#"><i class="fab fa-linkedin"></i></a></li>
      </ul>
    </div>
  </div>
  </div>
  </footer>

  </body>
  @section('javascripts')
  <script>
  $('#loadData').click(function(){
      
      alert('button clicked!');
      console.log('clicked');
    });
  </script>
  @endsection
</html>