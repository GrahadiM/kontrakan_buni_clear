<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ \Setting::getSetting()->app_name }} - @yield('title')</title>

    
    <!-- Favicons -->
    <link rel="icon" href="{{ asset('images/website') ."/". \Setting::getSetting()->favicon }}" type="image/x-icon">
    {{-- <link href="{{ asset('templates/frontend') }}/img/favicon.png" rel="icon">
    <link href="{{ asset('templates/frontend') }}/img/apple-touch-icon.png" rel="apple-touch-icon"> --}}

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{ asset('templates/frontend') }}/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{ asset('templates/dashboard/sb-admin-2') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="{{ asset('templates/frontend') }}/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="{{ asset('templates/frontend') }}/lib/animate/animate.min.css" rel="stylesheet">
  <link href="{{ asset('templates/frontend') }}/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="{{ asset('templates/frontend') }}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{ asset('templates/frontend') }}/css/style.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: EstateAgency
    Theme URL: https://bootstrapmade.com/real-estate-agency-bootstrap-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>

  {{-- <div class="click-closed"></div>
  <!--/ Form Search Star /-->
  <div class="box-collapse">
    <div class="title-box-d">
      <h3 class="title-d">Search Property</h3>
    </div>
    <span class="close-box-collapse right-boxed ion-ios-close"></span>
    <div class="box-collapse-wrap form">
      <form class="form-a">
        <div class="row">
          <div class="col-md-12 mb-2">
            <div class="form-group">
              <label for="Type">Keyword</label>
              <input type="text" class="form-control form-control-lg form-control-a" placeholder="Keyword">
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="Type">Type</label>
              <select class="form-control form-control-lg form-control-a" id="Type">
                <option>All Type</option>
                <option>For Rent</option>
                <option>For Sale</option>
                <option>Open House</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="city">City</label>
              <select class="form-control form-control-lg form-control-a" id="city">
                <option>All City</option>
                <option>Alabama</option>
                <option>Arizona</option>
                <option>California</option>
                <option>Colorado</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="bedrooms">Bedrooms</label>
              <select class="form-control form-control-lg form-control-a" id="bedrooms">
                <option>Any</option>
                <option>01</option>
                <option>02</option>
                <option>03</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="garages">Garages</label>
              <select class="form-control form-control-lg form-control-a" id="garages">
                <option>Any</option>
                <option>01</option>
                <option>02</option>
                <option>03</option>
                <option>04</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="bathrooms">Bathrooms</label>
              <select class="form-control form-control-lg form-control-a" id="bathrooms">
                <option>Any</option>
                <option>01</option>
                <option>02</option>
                <option>03</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="price">Min Price</label>
              <select class="form-control form-control-lg form-control-a" id="price">
                <option>Unlimite</option>
                <option>$50,000</option>
                <option>$100,000</option>
                <option>$150,000</option>
                <option>$200,000</option>
              </select>
            </div>
          </div>
          <div class="col-md-12">
            <button type="submit" class="btn btn-b">Search Property</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!--/ Form Search End /--> --}}

  <!--/ Nav Star /-->
  <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
        aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <a class="navbar-brand text-brand" href="{{ route('index') }}">KONTRAKAN<span class="color-b">BUNI</span></a>
      {{-- <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none" data-toggle="collapse"
        data-target="#navbarTogglerDemo01" aria-expanded="false">
        <span class="fa fa-search" aria-hidden="true"></span>
      </button> --}}
      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('/') ? 'link-secondary' : 'link-dark' }}" href="{{ route('index') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('/list') ? 'link-secondary' : 'link-dark' }}" href="{{ route('list') }}">List Kamar</a>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link {{ Request::is('/') ? 'link-secondary' : 'link-dark' }}" href="blog-grid.html">Blog</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              Pages
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="property-single.html">Property Single</a>
              <a class="dropdown-item" href="blog-single.html">Blog Single</a>
              <a class="dropdown-item" href="agents-grid.html">Agents Grid</a>
              <a class="dropdown-item" href="agent-single.html">Agent Single</a>
            </div>
          </li> --}}
          <li class="nav-item">
            <a class="nav-link {{ Request::is('/') ? 'link-secondary' : 'link-dark' }}" href="{{ route('about-us') }}">Tentang Kami</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('/') ? 'link-secondary' : 'link-dark' }}" href="{{ route('contact-us') }}">Kontak Kami</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              @guest()
                Log In
              @endguest
              @auth()
                  @if (auth()->user()->role == "admin")
                      Home
                  @elseif (auth()->user()->role == "penyewa")
                      @if (auth()->user()->status == "active")
                      Home
                      {{-- @elseif (auth()->user()->status == "non-active") --}}
                      @else
                      Log Out
                      @endif
                  @endif
              @endauth
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                @if (Route::has('login'))
                    @auth
                        @if (auth()->user()->role == "admin")
                            <a class="dropdown-item" href="{{ url('/home') }}" class="btn btn-outline-primary">Home</a>
                        @elseif (auth()->user()->role == "penyewa")
                            @if (auth()->user()->status == "active")
                                <a class="dropdown-item" href="{{ url('/home') }}" class="btn btn-outline-primary">Home</a>
                            {{-- @elseif (auth()->user()->status == "non-active") --}}
                            @else
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item">Log Out</button>
                                </form>
                            @endif
                        @else
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="dropdown-item">Log Out</button>
                            </form>
                        @endif
                    @else
                        <a class="dropdown-item" href="{{ route('login') }}" class="btn btn-outline-primary me-2">Log in</a>

                        @if (Route::has('register'))
                            <a class="dropdown-item" href="{{ route('register') }}" class="ml-4 btn btn-primary">Register</a>
                        @endif
                    @endauth
                @endif
            </div>
          </li>
        </ul>
      </div>
      {{-- <button type="button" class="btn btn-b-n navbar-toggle-box-collapse d-none d-md-block" data-toggle="collapse"
        data-target="#navbarTogglerDemo01" aria-expanded="false">
        <span class="fa fa-search" aria-hidden="true"></span>
      </button> --}}
    </div>
  </nav>
  <!--/ Nav End /-->

  @yield('content')

  <!--/ footer Star /-->
  {{-- <section class="section-footer">
      <div class="container">
          <div class="row">
              <div class="col-sm-12 col-md-4">
              <div class="widget-a">
                  <div class="w-header-a">
                  <h3 class="w-title-a text-brand">EstateAgency</h3>
                  </div>
                  <div class="w-body-a">
                  <p class="w-text-a color-text-a">
                      Enim minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip exea commodo consequat duis
                      sed aute irure.
                  </p>
                  </div>
                  <div class="w-footer-a">
                  <ul class="list-unstyled">
                      <li class="color-a">
                      <span class="color-text-a">Phone .</span> contact@example.com</li>
                      <li class="color-a">
                      <span class="color-text-a">Email .</span> +54 356 945234</li>
                  </ul>
                  </div>
              </div>
              </div>
              <div class="col-sm-12 col-md-4 section-md-t3">
              <div class="widget-a">
                  <div class="w-header-a">
                  <h3 class="w-title-a text-brand">The Company</h3>
                  </div>
                  <div class="w-body-a">
                  <div class="w-body-a">
                      <ul class="list-unstyled">
                      <li class="item-list-a">
                          <i class="fa fa-angle-right"></i> <a href="#">Site Map</a>
                      </li>
                      <li class="item-list-a">
                          <i class="fa fa-angle-right"></i> <a href="#">Legal</a>
                      </li>
                      <li class="item-list-a">
                          <i class="fa fa-angle-right"></i> <a href="#">Agent Admin</a>
                      </li>
                      <li class="item-list-a">
                          <i class="fa fa-angle-right"></i> <a href="#">Careers</a>
                      </li>
                      <li class="item-list-a">
                          <i class="fa fa-angle-right"></i> <a href="#">Affiliate</a>
                      </li>
                      <li class="item-list-a">
                          <i class="fa fa-angle-right"></i> <a href="#">Privacy Policy</a>
                      </li>
                      </ul>
                  </div>
                  </div>
              </div>
              </div>
              <div class="col-sm-12 col-md-4 section-md-t3">
              <div class="widget-a">
                  <div class="w-header-a">
                  <h3 class="w-title-a text-brand">International sites</h3>
                  </div>
                  <div class="w-body-a">
                  <ul class="list-unstyled">
                      <li class="item-list-a">
                      <i class="fa fa-angle-right"></i> <a href="#">Venezuela</a>
                      </li>
                      <li class="item-list-a">
                      <i class="fa fa-angle-right"></i> <a href="#">China</a>
                      </li>
                      <li class="item-list-a">
                      <i class="fa fa-angle-right"></i> <a href="#">Hong Kong</a>
                      </li>
                      <li class="item-list-a">
                      <i class="fa fa-angle-right"></i> <a href="#">Argentina</a>
                      </li>
                      <li class="item-list-a">
                      <i class="fa fa-angle-right"></i> <a href="#">Singapore</a>
                      </li>
                      <li class="item-list-a">
                      <i class="fa fa-angle-right"></i> <a href="#">Philippines</a>
                      </li>
                  </ul>
                  </div>
              </div>
              </div>
          </div>
      </div>
  </section> --}}

  <footer>
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <div class="socials-a">
                      <ul class="list-inline">
                          <li class="list-inline-item">
                              <a href="#">
                                  <i class="fa fa-facebook" aria-hidden="true"></i>
                              </a>
                          </li>
                          <li class="list-inline-item">
                              <a href="#">
                                  <i class="fa fa-twitter" aria-hidden="true"></i>
                              </a>
                          </li>
                          <li class="list-inline-item">
                              <a href="#">
                                  <i class="fa fa-instagram" aria-hidden="true"></i>
                              </a>
                          </li>
                          <li class="list-inline-item">
                              <a href="#">
                                  <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                              </a>
                          </li>
                          <li class="list-inline-item">
                              <a href="#">
                                  <i class="fa fa-dribbble" aria-hidden="true"></i>
                              </a>
                          </li>
                      </ul>
                  </div>
                  <div class="copyright-footer">
                      <p class="copyright color-text-a">
                          &copy; Copyright
                          <span class="color-a">{{ \Setting::getSetting()->footer_left }} {{ date('Y') }}</span> All Rights Reserved.
                      </p>
                  </div>
                  <div class="credits">
                      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                  </div>
              </div>
          </div>
      </div>
  </footer>
  <!--/ Footer End /-->

  <a href="https://wa.me/085767113554" target="_blank" rel="noopener noreferrer" class="whatsapp"><i class="fab fa-whatsapp"></i></a>
  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  {{-- <div id="preloader"></div> --}}

  <!-- JavaScript Libraries -->
  <script src="{{ asset('templates/frontend') }}/lib/jquery/jquery.min.js"></script>
  <script src="{{ asset('templates/frontend') }}/lib/jquery/jquery-migrate.min.js"></script>
  <script src="{{ asset('templates/frontend') }}/lib/popper/popper.min.js"></script>
  <script src="{{ asset('templates/frontend') }}/lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="{{ asset('templates/frontend') }}/lib/easing/easing.min.js"></script>
  <script src="{{ asset('templates/frontend') }}/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="{{ asset('templates/frontend') }}/lib/scrollreveal/scrollreveal.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="{{ asset('templates/frontend') }}/contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="{{ asset('templates/frontend') }}/js/main.js"></script>

</body>
</html>