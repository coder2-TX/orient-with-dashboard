@extends('site-en.layouts.app')

@section('title', 'Sweets | Orient Yemen')

@push('styles')
  <link rel="stylesheet" href="{{ asset('assets/css/pages/products/hero.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/pages/products/section2.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/pages/products/sweets/section2.css') }}">
@endpush

@push('scripts_head')
  <script src="{{ asset('assets/js/pages/products-sweets.js') }}" defer></script>
@endpush

@section('content')
  @include('site-en.pages.products.partials.hero')
  @include('site-en.pages.products.sweets.partials.section-2')
@endsection
