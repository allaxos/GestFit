<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'GesFit') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- icone -->
    <script src="https://kit.fontawesome.com/ca4b3a032e.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-light fixed-top" style="box-shadow: 1px 1px 12px #555; background-color: #3a3a3a; color: white;">

                <a style="color: white" href="{{ url('/') }}">
                    <h1> <i class="fas fa-basketball-ball" style="margin-right: 5px"></i><strong>Ges</strong>Fit</h1>
                </a>

                <div class="ml-auto">
                    <!-- Left Side Of Navbar -->
                            @auth
                                    <a  href="{{ url('/home') }}" style="color:white">Tableau de bord</a>

                            @endauth

                                <!--<a href="{{url('contact')}}" style="color:white">Contactez-nous</a>-->

                        <!-- Authentication Links -->
                        @guest

                                <a  href="{{ route('login') }}" style="margin:5px 5px 5px 5px;color: white">{{ __('Se Connecter') }}</a>

                            @if (Route::has('register'))

                                    <a  href="{{ route('register') }}" style="margin:5px 5px 5px 5px;color: white">{{ __('Inscription') }}</a>
                            @endif

                        @else

                            <div class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle font-weight-bold" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="margin:5px 5px 5px 5px;color: white">
                                    {{ Auth::user()->name }} {{Auth::user()->lastName }}<span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item btn btn-success" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Se deconnécter') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>

                        @endguest

                </div>

        </nav>

        <div class="container">
            <div class="col-sm" style="text-align: center; margin-top: 250px; margin-bottom: 250px">
            @yield('content')
            </div>
        </div>
    </div>

    <footer class="page-footer font-small blue pt-4">
        <div class="container-fluid text-center text-md-left">
            <div class="row">
                <div class="col-md-4 mt-md-0 mt-3  text-center">
                    <h5 class="text-uppercase">Réseaux</h5>
                    <a href="#" style="color: white"><i class="fab fa-instagram"></i></a>
                    <a href="#" style="color: white"><i class="fab fa-twitter"></i></a>
                    <a href="#" style="color: white"><i class="fab fa-facebook-square"></i></a>
                </div>
                <hr class="clearfix w-100 d-md-none pb-3">
                <div class="col-md-5 mb-md-0 mb-3  text-center">
                    <h5 class="text-uppercase">GesFit</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href=" {{ url('/apropos') }} " style="color: white">A propos</a>
                        </li>
                        <li>
                            <a href=" {{ url('/politique_confidentialite') }} " style="color: white">Politique de confidentialité</a>
                        </li>
                        <li>
                            <a href="{{url('contact')}}" style="color: white">Contactez-nous</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3 mb-md-0 mb-3 text-center">
                    <i class="fas fa-map-marker-alt"></i>
                    <p>Rue de la limite 6, 1300 Wavre</p>

                    <i class="fas fa-envelope"></i>
                    <p>gesfit.info@gesfir.be</p>

                    <i class="fas fa-phone-alt"></i>
                    <p>02 000 000</p>
                </div>
            </div>
        </div>
        <div class="footer-copyright text-center py-3"><p>© 2019 Copyright IFOSupWavre</p>
        </div>
    </footer>
</body>
</html>
