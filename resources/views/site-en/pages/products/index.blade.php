@extends('site-en.layouts.app')

@section('title', 'Products | Orient Yemen')

@push('styles')
  <link rel="stylesheet" href="{{ asset('assets/css/pages/products/hero.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/pages/products/section2.css') }}">
@endpush

@push('scripts_head')
  <script src="{{ asset('assets/js/pages/products.js') }}" defer></script>
@endpush

@section('content')
  @include('site-en.pages.products.partials.hero')
  @include('site-en.pages.products.partials.section-2')
@endsection
