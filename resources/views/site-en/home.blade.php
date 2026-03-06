@extends('site-en.layouts.app')

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
  @include('site-en.partials.hero')
  @include('site-en.partials.about')
  @include('site-en.partials.services')
  @include('site-en.partials.facts')
  @include('site-en.partials.why')
  @include('site-en.partials.partners')
@endsection
