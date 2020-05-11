<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Flex Sited') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') . '?ver='. date('ymdhis') }}" rel="stylesheet">
    <link href="{{ asset('css/auth.css') . '?ver='. date('ymdhis') }}" rel="stylesheet">

    @yield('css')
    @yield('head')
</head>
<body>
  @yield('body')


    @yield('js')
    <div class="container mt-3 mb-5">
      <div class="row">
        <div class="col-12 text-center pb-3">
          Need to contact? 678-741-1928, support@flexsited.com
        </div>
      </div>
    </div>
</body>
</html>
