<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    {{--
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/[uikit-version]/css/uikit.min.css" rel="stylesheet"
        type="text/css"> --}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar sticky-top navbar-dark navbar-expand-lg bg-dark justify-content-between">
            @guest
                <a class="navbar-brand" href="#">Pemetaan Wisata</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        @guest
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                @if (Route::has('register'))
                                <li>
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                                @endif
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="#"> {{ Auth::user()->name }} <i class="fa fa-chevron-down"></span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                        @endguest
                    </ul>
                </div>
            @else
                <a class="navbar-brand" href="#">Pemetaan Wisata</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Data Master
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="{{ route('user.index') }}">Data User</a>
                                <a class="dropdown-item" href="{{ route('attraction-type.index') }}">Data Tipe Pariwisata</a>
                                <a class="dropdown-item" href="{{ route('attraction.index') }}">Data Pariwisatae</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown" style="float:right">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }} <i class="fa fa-chevron-down"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            @endguest
        </nav>

        {{-- <nav class="uk-navbar-container" uk-navbar> --}}
            {{-- @guest
            <div class="uk-navbar-right">
                <ul class="uk-navbar-nav">
                    @guest
                    <li>
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                    <li>
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>

                    @endif
                    </li>
                    @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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
            </div> --}}
            {{-- @else
            <nav class="navbar sticky-top navbar-dark navbar-expand-lg bg-dark justify-content-between"> --}}
                {{-- <a class="navbar-brand" href="#">Pemetaan Wisata</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Daftar Wisata <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Rute Wisata</a>
                        </li>
                        <li class="nav-item">

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="uk-navbar-left">
                <ul class="uk-navbar-nav">
                    <li>
                        <a href="{{ route('website.index') }}">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('home') }}">Dashboard</a>
                    </li>
                    <li>
                        <a href="#">Data Master <span uk-icon="icon: chevron-down"></span></a>
                        <div class="uk-navbar-dropdown">
                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                <li class="uk-active"></li>
                                <li><a href="{{ route('user.index') }}">Data User</a></li>
                                <li><a href="{{ route('attraction-type.index') }}">Data Tipe Pariwisata</a></li>
                                <li><a href="{{ route('attraction.index') }}">Data Pariwisata</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div> --}}
            {{-- <div class="uk-navbar-right">
                <ul class="uk-navbar-nav">
                    @guest
                    <li> <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                    <li>
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>

                    @endif
                    </li>
                    @else
                    <li>
                        <a href="#"> {{ Auth::user()->name }} <span uk-icon="icon: triangle-down"></span></a>
                        <div class="uk-navbar-dropdown">
                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
            @endguest
        </nav> --}}

        <main>
            @include('flash::message')
            @yield('content')
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.3/js/uikit.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.3/js/uikit-icons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            // Active tooltip
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            });
            $('div.alert').not('.alert-important').delay(4000).fadeOut();
        });

    </script>
    @stack('javascript')
</body>

</html>
