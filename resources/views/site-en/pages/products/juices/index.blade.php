@extends('site-en.layouts.app')

@section('title', 'Juices | Orient Yemen')

@push('styles')
  <link rel="stylesheet" href="{{ asset('assets/css/page-bundles/page-b7801157f8110a52.css') }}?v=b7801157f8110a52">
@endpush

@push('scripts')
  <script src="{{ asset('assets/vendor/gsap/gsap.min.js') }}?v=3.12.5" defer></script>
  <script src="{{ asset('assets/js/pages/products-juices.js') }}" defer></script>
@endpush

@section('content')
  {{-- Hero --}}
  @include('site-en.pages.products.partials.hero')

  {{-- Juices section --}}
  @include('site-en.pages.products.juices.partials.section-2')
@endsection