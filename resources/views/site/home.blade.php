@extends('site.layouts.app')

@section('title', 'Orient Yemen')

@push('styles')
  <link rel="stylesheet" href="{{ asset('assets/css/hero.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/about.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/services.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/facts.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/why.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/partners.css') }}">
@endpush

@push('scripts_head')
  <script src="{{ asset('assets/js/hero.js') }}" defer></script>
  <script src="{{ asset('assets/js/facts.js') }}" defer></script>
  <script src="{{ asset('assets/js/partners.js') }}" defer></script>
@endpush

@section('content')
  @include('site.partials.hero')
  @include('site.partials.about')
  @include('site.partials.services')
  @include('site.partials.facts')
  @include('site.partials.why')
  @include('site.partials.partners')
@endsection
