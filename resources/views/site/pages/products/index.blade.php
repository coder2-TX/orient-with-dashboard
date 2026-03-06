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