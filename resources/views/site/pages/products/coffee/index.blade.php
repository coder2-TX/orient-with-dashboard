@extends('site.layouts.app')

@section('title', 'القهوة | Orient Yemen')

@push('styles')
  <link rel="stylesheet" href="{{ asset('assets/css/page-bundles/page-fce3a6c113ad0744.css') }}?v=fce3a6c113ad0744">
@endpush

@push('scripts')
  <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js" defer></script>
  <script src="{{ asset('assets/js/pages/products-coffee.js') }}" defer></script>
@endpush

@section('content')
  {{-- Products Hero --}}
  @include('site.pages.products.partials.hero')

  {{-- Coffee Section --}}
  @include('site.pages.products.coffee.partials.section-2')
@endsection