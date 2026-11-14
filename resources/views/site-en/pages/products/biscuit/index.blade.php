@extends('site-en.layouts.app')

@section('title', 'Biscuits & Wafers | Orient Yemen')

@push('styles')
  <link rel="stylesheet" href="{{ asset('assets/css/page-bundles/page-3c985a15273b18aa.css') }}?v=3c985a15273b18aa">
@endpush

@push('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" defer></script>
  <script src="{{ asset('assets/js/pages/products-biscuit.js') }}" defer></script>
@endpush

@section('content')
  {{-- Hero --}}
  @include('site-en.pages.products.partials.hero')

  {{-- Biscuit section --}}
  @include('site-en.pages.products.biscuit.partials.section-2')
@endsection