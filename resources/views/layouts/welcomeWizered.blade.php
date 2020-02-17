<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Flex Sited') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') . '?ver='. date('ymdhis') }}" rel="stylesheet">
    <link href="{{ asset('css/welcomeWizered.css') . '?ver='. date('ymdhis') }}" rel="stylesheet">

    @yield('css')
    @yield('head')
</head>
<body>
  @yield('body')


    @yield('js')

</body>
</html>
