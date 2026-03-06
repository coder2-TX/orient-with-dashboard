@extends('site.layouts.app')

@section('title', 'من نحن | Orient Yemen')

@push('styles')
  <link rel="stylesheet" href="{{ asset('assets/css/about.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/pages/about/section2.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/pages/about/section3.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/pages/about/section4.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/pages/about/section5.css') }}">
@endpush

@push('scripts_head')

@endpush

@section('content')
  @include('site.pages.about.partials.section-2')
  @include('site.pages.about.partials.section-3')
  @include('site.pages.about.partials.section-4')
  @include('site.pages.about.partials.section-5')
@endsection
