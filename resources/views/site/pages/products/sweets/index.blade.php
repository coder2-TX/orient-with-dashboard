@extends('site.layouts.app')

@section('title', 'الحلوى الحامضة | Orient Yemen')

@push('styles')
  <link rel="stylesheet" href="{{ asset('assets/css/page-bundles/page-a4f23ab5aa1831ae.css') }}?v=a4f23ab5aa1831ae">
@endpush

@push('scripts')
  <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js" defer></script>
  <script src="{{ asset('assets/js/pages/products-sweets.js') }}" defer></script>
@endpush

@section('content')
  {{-- Hero --}}
  @include('site.pages.products.partials.hero')

  {{-- Sour candy section --}}
  @include('site.pages.products.sweets.partials.section-2')
@endsection