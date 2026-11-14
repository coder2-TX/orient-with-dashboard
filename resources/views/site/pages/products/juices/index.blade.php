@extends('site.layouts.app')

@section('title', 'العصائر | Orient Yemen')

@push('styles')
  <link rel="stylesheet" href="{{ asset('assets/css/page-bundles/page-b7801157f8110a52.css') }}?v=b7801157f8110a52">
@endpush

@push('scripts')
  <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js" defer></script>
  <script src="{{ asset('assets/js/pages/products-juices.js') }}" defer></script>
@endpush

@section('content')
  {{-- Hero --}}
  @include('site.pages.products.partials.hero')

  {{-- Juices section --}}
  @include('site.pages.products.juices.partials.section-2')
@endsection