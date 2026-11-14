@extends('site.layouts.app')

@section('title', 'الحلويات | Orient Yemen')

@push('styles')
  <link rel="stylesheet" href="{{ asset('assets/css/page-bundles/page-b399f040d91b96a0.css') }}?v=b399f040d91b96a0">
@endpush

@push('scripts')
  <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js" defer></script>
  <script src="{{ asset('assets/js/pages/products-marshmallow.js') }}" defer></script>
@endpush

@section('content')
  {{-- Hero --}}
  @include('site.pages.products.partials.hero')

  {{-- Marshmallow section --}}
  @include('site.pages.products.marshmallow.partials.section-2')
@endsection