@extends('site-en.layouts.app')

@section('title', 'Coffee | Orient Yemen')

@push('styles')
  <link rel="stylesheet" href="{{ asset('assets/css/page-bundles/page-fce3a6c113ad0744.css') }}?v=fce3a6c113ad0744">
@endpush

@push('scripts')
  <script src="{{ asset('assets/vendor/gsap/gsap.min.js') }}?v=3.12.5" defer></script>
  <script src="{{ asset('assets/js/pages/products-coffee.js') }}" defer></script>
@endpush

@section('content')
  {{-- Products Hero --}}
  @include('site-en.pages.products.partials.hero')

  {{-- Coffee Section --}}
  @include('site-en.pages.products.coffee.partials.section-2')
@endsection