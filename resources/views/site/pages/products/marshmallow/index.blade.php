@extends('site.layouts.app')

@section('title', 'الحلويات | Orient Yemen')

@push('styles')
  <link rel="stylesheet" href="{{ asset('assets/css/pages/products/hero.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/pages/products/section2.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/pages/products/marshmallow/section2.css') }}">
@endpush

@push('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" defer></script>
  <script src="{{ asset('assets/js/pages/products-marshmallow.js') }}" defer></script>
@endpush

@section('content')
  {{-- Hero --}}
  @include('site.pages.products.partials.hero')

  {{-- Marshmallow section --}}
  @include('site.pages.products.marshmallow.partials.section-2')
@endsection