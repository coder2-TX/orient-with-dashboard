@extends('site.layouts.app')

@section('title', 'تواصل معنا | Orient Yemen')

@push('styles')
  <link rel="stylesheet" href="{{ asset('assets/css/page-bundles/page-570b6c95b54197e6.css') }}?v=570b6c95b54197e6">
@endpush

@push('scripts_head')
  <script src="{{ asset('assets/js/pages/contact.js') }}" defer></script>
@endpush

@section('content')
  @include('site.pages.contact.partials.hero')
  @include('site.pages.contact.partials.section-2')
  @include('site.pages.contact.partials.section-3')
@endsection