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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.3/css/uikit.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/3.2.6/css/fixedColumns.dataTables.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
            
        <nav class="uk-navbar-container" uk-navbar>
            @guest
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
                    <li>
                        <a href="#"> {{ Auth::user()->name }} <span uk-icon="icon: triangle-down"></span></a>
                        <div class="uk-navbar-dropdown">
                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                <li> 
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
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
            @else
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
            </div>    
            <div class="uk-navbar-right">
                <ul class="uk-navbar-nav">
                    @guest
                    <li>
                        {{-- <a href="#">Login</a> --}}
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
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
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
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
        </nav>

        <main>
            @include('flash::message')
            @yield('content')
        </main>
    </div>
  
    <script src="https://datatables.yajrabox.com/js/jquery.min.js"></script>
    <script src="https://datatables.yajrabox.com/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.3/js/uikit.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.3/js/uikit-icons.min.js"></script>
    <script>
        jQuery('div.alert').not('.alert-important').delay(1000).fadeOut(500);
    </script>    
    @stack('javascript')
</body>
</html>
