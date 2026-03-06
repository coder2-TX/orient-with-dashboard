<!doctype html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <base href="{{ url('/') }}/">

  <title>@yield('title', 'Orient Yemen')</title>

  <!-- Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <!-- Global tokens first -->
  <link rel="stylesheet" href="{{ asset('assets/css/tokens.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/global.css') }}">

  <!-- Shared section styles -->
  <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/about.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}">

  @stack('styles')

  <!-- Shared scripts -->
  <script src="{{ asset('assets/js/header.js') }}" defer></script>
  <script src="{{ asset('assets/js/app.js') }}" defer></script>

  @stack('scripts_head')
</head>

<body>
  @include('site-en.partials.header')

  <main>
    @yield('content')
  </main>

  @include('site-en.partials.footer')

  @stack('scripts')
</body>
</html>
