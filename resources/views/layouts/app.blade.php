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
    <nav  class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="background-color:aliceblue;">
        <div class="container" >
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="images/logo.png" style="height: 150px"/>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav ml-auto ">
                    @auth
                        <li class="nav-item" style="margin:5px 5px 5px 5px;">
                            <a class="nav-link btn btn-success font-weight-bold" href="{{ route('dispatch') }}" style="color:white">Tableau de bord</a>
                        </li>

                        <li class="nav-item" style="margin:5px 5px 5px 5px;color: white">
                            <a class="nav-link btn btn-success font-weight-bold" href="{{route('annonceGuestIndex')}}" style="color:white">Annonces</a>
                        </li>

                    @endauth







                    <!-- Authentication Links -->
                    @guest
                        <!-- Afficher pour les guest  -->
                            <li class="nav-item" style="margin:5px 5px 5px 5px;color: white">
                                <a class="nav-link btn btn-success font-weight-bold" href="{{url('contact')}}" style="color:white">Contactez-nous</a>
                            </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-success font-weight-bold" href="{{ route('login') }}" style="margin:5px 5px 5px 5px;color: white">{{ __('Se Connecter') }}</a>
                        </li>
                            <li class="nav-item" style="margin:5px 5px 5px 5px;color: white">
                                <a class="nav-link btn btn-success font-weight-bold" href="{{route('annonceGuestIndex')}}" style="color:white">Annonces</a>
                            </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link btn btn-success font-weight-bold" href="{{ route('register') }}" style="margin:5px 5px 5px 5px;color: white">{{ __('Inscription') }}</a>
                            </li>
                        @endif
                    @else

                            @if(auth()->user()->is_admin==0)
                                <li class="nav-item" style="margin:5px 5px 5px 5px;color: white">
                                    <a class="nav-link btn btn-success font-weight-bold" href="{{url('contact')}}" style="color:white">Contactez-nous</a>
                                </li>
                            @endif
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle btn btn-success font-weight-bold" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="margin:5px 5px 5px 5px;color: white">
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
                        </li>

                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">

        @yield('content')
    </main>
</div>
</body>
</html>
