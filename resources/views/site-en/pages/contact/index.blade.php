@extends('site-en.layouts.app')

@section('title', 'Contact | Orient Yemen')

@push('styles')
  <link rel="stylesheet" href="{{ asset('assets/css/hero.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/pages/contact/hero.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/pages/contact/section2.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/pages/contact/section3.css') }}">
@endpush

@push('scripts_head')
  <script src="{{ asset('assets/js/pages/contact.js') }}" defer></script>
@endpush

@section('content')
  @include('site-en.pages.contact.partials.hero')
  @include('site-en.pages.contact.partials.section-2')
  @include('site-en.pages.contact.partials.section-3')
@endsection