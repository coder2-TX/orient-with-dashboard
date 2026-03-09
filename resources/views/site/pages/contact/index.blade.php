@extends('site.layouts.app')

@section('title', 'تواصل معنا | Orient Yemen')

@push('styles')
  {{-- Page styles --}}
  <link rel="stylesheet" href="{{ asset('assets/css/hero.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/pages/contact/hero.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/pages/contact/section2.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/pages/contact/section3.css') }}">
@endpush

@push('scripts_head')
  <script src="{{ asset('assets/js/pages/contact.js') }}" defer></script>
@endpush

@section('content')
  @include('site.pages.contact.partials.hero')
  @include('site.pages.contact.partials.section-2')
  @include('site.pages.contact.partials.section-3')
@endsection