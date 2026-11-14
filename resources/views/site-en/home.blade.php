@extends('site-en.layouts.app')

@section('title', 'Orient Yemen')

@section('oy_home_css', '1')

@push('scripts_head')
  <script src="{{ asset('assets/js/hero.js') }}" defer></script>
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
