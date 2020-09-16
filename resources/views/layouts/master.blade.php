<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.3/css/uikit.min.css" />
    <!-- Font Awesome -->
    <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet">
    <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?&region=GB&key=AIzaSyDPpj9u1EbTAyxACtlLNj5wf33-HazoSV4&libraries=geometry"></script>
    @stack('styles')
</head>
<body>
    <div id="app">
    @include('layouts.navbar')

        <main>
            @yield('content')
        </main>
    </div>

    @include('layouts.script')

    <script type="text/javascript" src="https://cdn.jsdelivr.net/gmap3/7.2.0/gmap3.min.js"></script>
    @stack('javascript')

</body>
</html>
