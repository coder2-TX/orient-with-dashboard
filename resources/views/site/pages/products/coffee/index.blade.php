@extends('site.layouts.app')

@section('title', 'القهوة | Orient Yemen')

@push('styles')
  {{-- Icons (optional but preserved from old page) --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  {{-- Global tokens / shared styles (preserved from old page) --}}
  <link rel="stylesheet" href="{{ asset('assets/css/tokens.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/global.css') }}">

  {{-- Shared styles --}}
  <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/about.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}">

  {{-- Products page hero (reuse same hero) --}}
  <link rel="stylesheet" href="{{ asset('assets/css/pages/products/hero.css') }}">

  {{-- Tabs base styles --}}
  <link rel="stylesheet" href="{{ asset('assets/css/pages/products/section2.css') }}">

  {{-- Coffee page section --}}
  <link rel="stylesheet" href="{{ asset('assets/css/pages/products/coffee/section2.css') }}">
@endpush

@push('scripts')
  {{-- Shared scripts --}}
  <script src="{{ asset('assets/js/header.js') }}" defer></script>

  {{-- GSAP --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" defer></script>

  {{-- Coffee page script --}}
  <script src="{{ asset('assets/js/pages/products-coffee.js') }}" defer></script>
@endpush

@section('content')
  {{-- Products Hero --}}
  @include('site.pages.products.partials.hero')

  {{-- Coffee Section --}}
  @include('site.pages.products.coffee.partials.section-2')
@endsection