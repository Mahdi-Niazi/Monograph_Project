 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
    
<!--Meta Dat -->

 @yield('style')
 <title>@yield('title')</title>