@extends('site.layouts.app')

@section('title', 'العصائر | Orient Yemen')

@push('styles')
  <link rel="stylesheet" href="{{ asset('assets/css/pages/products/hero.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/pages/products/section2.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/pages/products/juices/section2.css') }}">
@endpush

@push('scripts')
  <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js" defer></script>
  <script src="{{ asset('assets/js/pages/products-juices.js') }}" defer></script>
@endpush

@section('content')
  {{-- Hero --}}
  @include('site.pages.products.partials.hero')

  {{-- Juices section --}}
  @include('site.pages.products.juices.partials.section-2')
@endsection