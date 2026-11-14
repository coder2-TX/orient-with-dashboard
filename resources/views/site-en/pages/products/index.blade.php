@extends('site-en.layouts.app')

@section('title', 'Products | Orient Yemen')

@push('styles')
  <link rel="stylesheet" href="{{ asset('assets/css/page-bundles/page-59ebd9d72288a1a2.css') }}?v=59ebd9d72288a1a2">
@endpush

@push('scripts_head')
  <script src="{{ asset('assets/js/pages/products.js') }}" defer></script>
@endpush

@section('content')
  @include('site-en.pages.products.partials.hero')
  @include('site-en.pages.products.partials.section-2')
@endsection