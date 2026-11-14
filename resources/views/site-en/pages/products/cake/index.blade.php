@extends('site-en.layouts.app')

@section('title', 'Cake | Orient Yemen')

@push('styles')
  <link rel="stylesheet" href="{{ asset('assets/css/page-bundles/page-3dfa5897a0b0d21c.css') }}?v=3dfa5897a0b0d21c">
@endpush

@push('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" defer></script>
  <script src="{{ asset('assets/js/pages/products-cake.js') }}" defer></script>
@endpush

@section('content')
  {{-- Hero --}}
  @include('site-en.pages.products.partials.hero')

  {{-- Cake section --}}
  @include('site-en.pages.products.cake.partials.section-2')
@endsection