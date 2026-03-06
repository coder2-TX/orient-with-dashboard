@extends('site.layouts.app')

@section('title', 'الكيك | Orient Yemen')

@push('styles')
  {{-- Icons --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  {{-- Global / shared styles --}}
  <link rel="stylesheet" href="{{ asset('assets/css/tokens.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/global.css') }}">

  {{-- Shared layout styles --}}
  <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/about.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}">

  {{-- Products shared styles --}}
  <link rel="stylesheet" href="{{ asset('assets/css/pages/products/hero.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/pages/products/section2.css') }}">

  {{-- Cake page styles --}}
  <link rel="stylesheet" href="{{ asset('assets/css/pages/products/cake/section2.css') }}">
@endpush

@push('scripts')
  {{-- Shared scripts --}}
  <script src="{{ asset('assets/js/header.js') }}" defer></script>

  {{-- GSAP --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" defer></script>

  {{-- Cake page script --}}
  <script src="{{ asset('assets/js/pages/products-cake.js') }}" defer></script>
@endpush

@section('content')
  {{-- Hero --}}
  @include('site.pages.products.partials.hero')

  {{-- Cake section --}}
  @include('site.pages.products.cake.partials.section-2')
@endsection