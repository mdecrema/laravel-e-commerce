<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar sticky-top navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <div class="logo-box">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img id="logo-img" src="#" />
                        {{-- {{ asset('volcano-mountain-logo.webp') }} --}}
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                           <a href="{{ route('tshirt.index') }}">T-Shirt</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('hoodies.index') }}">Hoodies</a>
                        </li>
                        <li class="nav-item">
                            <a href="#">Pants</a>
                         </li>
                         <li class="nav-item">
                             <a href="#">Sneakers</a>
                         </li>
                         <li class="nav-item">
                            <a href="#">News</a>
                         </li>
                         <li class="nav-item">
                             <a href="#">Contacts</a>
                         </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Cart Icon -->
                        <li>
                            @include('header-cart')
                        </li>
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
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
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        <footer class="fondo" style="background-image: url('{{ asset('storage/footer-img.jpg') }}');background-size:cover;background-position: 0 -150px;background-repeat:no-repeat;">
            <div class="fondo-opacity"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 left">
                        <ul class="contatti">
                            <li>
                                <img id="logofooter" src={logo} alt="" />
                            </li>
                            <li>Ragione Sociale: 'Company' S.P.A.</li>
                            <li>Sede legale: Contrada Colle Delle Api, 100/A</li>
                            <li>86100 - City(--)</li>
                            <li>Pec: email@pec.it</li>
                            <li>Tel: +39 0874 4981</li>
                            <li>Fax: +39 0874 629584</li>
                            <li>info@email.it (per segnalazioni degli utenti)</li>
                            <li>commerciale@email.it</li>
                            <li>export@email.it</li>
                            <li>telefono 380-1292455</li>
                            <li class="copyright">Copyright © All rights reserved.</li>
                        </ul>
                    </div>
                    <div class="col-lg-4 central">
              <h5>COMPANY</h5>
              <ul>
                  <li>Company</li>
                  <li>xxxxxxxx</li>
                  <li>xxxxxxxx</li>
                  <li>Infos</li>
                  <li>Our Mission</li>
                  <li>Superhydrophobic</li>
                  <li>Employees</li>
              </ul>
              <h5>PRODUCTS</h5>
              <ul>
                  <li>*Tipo di materiali usati*</li>
                  <li>*Link prodotto*</li>
                  <li>*Link prodotto*</li>
                  <li>*Servizio clienti*</li>
                  <li>*Referenze*</li>
              </ul>
          </div>
          <div class="col-lg-3 right">
          <h5>JOIN US</h5>
              <div class="social-box">
                
              </div>
              <div class="newsletter-box">
                <h6>Subscribe our newsletter</h6>
                <a class="newsletter" href="#">Newsletter</a>
              </div>
          </div>
      </div>
    </div>
  </footer>
    </div>
</body>
</html>
