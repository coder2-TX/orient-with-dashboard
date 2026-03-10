@extends('site.layouts.app')

@section('title', 'منتجاتنا | Orient Yemen')

@push('styles')
  <link rel="stylesheet" href="{{ asset('assets/css/pages/products/hero.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/pages/products/section2.css') }}">
@endpush

@section('content')
  @include('site.pages.products.partials.hero')
  @include('site.pages.products.partials.section-2')
@endsection

@push('scripts')
  <script src="{{ asset('assets/js/pages/products.js') }}" defer></script>
@endpush