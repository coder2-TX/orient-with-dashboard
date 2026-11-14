@extends('site-en.layouts.app')

@section('title', 'Sweets | Orient Yemen')

@push('styles')
  <link rel="stylesheet" href="{{ asset('assets/css/page-bundles/page-b399f040d91b96a0.css') }}?v=b399f040d91b96a0">
  @if(request()->query('cls_test') === '1')
    <link rel="stylesheet" href="{{ asset('assets/css/perf/product-cls-experiment.css') }}?v=1">
  @endif
@endpush

@push('scripts')
  <script src="{{ asset('assets/vendor/gsap/gsap.min.js') }}?v=3.12.5" defer></script>
  <script src="{{ asset('assets/js/pages/products-marshmallow.js') }}" defer></script>
@endpush

@section('content')
  {{-- Hero --}}
  @include('site-en.pages.products.partials.hero')

  {{-- Marshmallow section --}}
  @include('site-en.pages.products.marshmallow.partials.section-2')
@endsection