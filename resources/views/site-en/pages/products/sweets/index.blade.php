@extends('site-en.layouts.app')

@section('title', 'Sour Candy | Orient Yemen')

@push('styles')
  <link rel="stylesheet" href="{{ asset('assets/css/page-bundles/page-a4f23ab5aa1831ae.css') }}?v=a4f23ab5aa1831ae">
@endpush

@push('scripts')
  <script src="{{ asset('assets/vendor/gsap/gsap.min.js') }}?v=3.12.5" defer></script>
  <script src="{{ asset('assets/js/pages/products-sweets.js') }}" defer></script>
@endpush

@section('content')
  {{-- Hero --}}
  @include('site-en.pages.products.partials.hero')

  {{-- Sour candy section --}}
  @include('site-en.pages.products.sweets.partials.section-2')
@endsection