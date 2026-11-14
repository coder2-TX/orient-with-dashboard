<!doctype html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="utf-8">
  <link rel="preload" href="{{ asset('assets/fonts/SomarSans-Regular.woff2') }}" as="font" type="font/woff2" crossorigin>
  <link rel="preload" href="{{ asset('assets/fonts/SomarSans-Bold.woff2') }}" as="font" type="font/woff2" crossorigin>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <base href="{{ url('/') }}/">
  @stack('hero_preload')

  <title>@yield('title', 'Orient Yemen')</title>

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="{{ asset('assets/images/header/Brand_Mark.png') }}">
  <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/header/Brand_Mark.png') }}">
  <!-- Icons -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/orient-fa/css/site-icons.css') }}">

  @hasSection('oy_home_css')
  <link rel="stylesheet" href="{{ asset('assets/css/home-combined.css') }}?v={{ filemtime(public_path('assets/css/home-combined.css')) }}">
@else
<!-- Global tokens first -->
  <link rel="stylesheet" href="{{ asset('assets/css/tokens.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/global.css') }}">

  <!-- Shared section styles -->
  <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}?v={{ filemtime(public_path('assets/css/header.css')) }}">
  <link rel="stylesheet" href="{{ asset('assets/css/about.css') }}"> 
  <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}?v={{ filemtime(public_path('assets/css/footer.css')) }}">
  @stack('styles')
@endif



  <!-- Shared scripts -->
  <script src="{{ asset('assets/js/header.js') }}?v={{ filemtime(public_path('assets/js/header.js')) }}" defer></script>
  <script src="{{ asset('assets/js/facts.js') }}" defer></script>
  @stack('scripts_head')
  <script src="{{ asset('assets/js/app.js') }}" defer></script>

  
</head>

<body>
  @include('site.partials.header')

  <main>
    @yield('content')
  </main>

  @include('site.partials.footer')

  @stack('scripts')
</body>
</html>


