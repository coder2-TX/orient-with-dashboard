@extends('site.layouts.app')

@section('title', 'شركائنا | Orient Yemen')

@push('styles')
  <link rel="stylesheet" href="{{ asset('assets/css/partners.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/pages/partners/hero.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/pages/partners/section2.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/pages/partners/section3.css') }}">
@endpush

@push('scripts_head')

@endpush

@section('content')
  @include('site.pages.partners.partials.hero')
  @include('site.pages.partners.partials.section-2')
  @include('site.pages.partners.partials.section-3')
@endsection
