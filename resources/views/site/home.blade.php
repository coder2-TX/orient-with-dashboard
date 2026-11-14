@extends('site.layouts.app')

@section('title', 'Orient Yemen')

@section('oy_home_css', '1')

@push('scripts_head')
  <script src="{{ asset('assets/js/hero.js') }}" defer></script>
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
