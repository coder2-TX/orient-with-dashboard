@extends('site.layouts.app')

@section('title', 'الكيك | Orient Yemen')

@push('styles')
  <link rel="stylesheet" href="{{ asset('assets/css/page-bundles/page-3dfa5897a0b0d21c.css') }}?v=3dfa5897a0b0d21c">
@endpush

@push('scripts')
  <script src="{{ asset('assets/vendor/gsap/gsap.min.js') }}?v=3.12.5" defer></script>
  <script src="{{ asset('assets/js/pages/products-cake.js') }}" defer></script>
@endpush

@section('content')
  {{-- Hero --}}
  @include('site.pages.products.partials.hero')

  {{-- Cake section --}}
  @include('site.pages.products.cake.partials.section-2')
@endsection