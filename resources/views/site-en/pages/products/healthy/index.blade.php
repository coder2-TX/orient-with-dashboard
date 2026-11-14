@extends('site-en.layouts.app')

@section('title', 'Healthy Products | Orient Yemen')

@push('styles')
  <link rel="stylesheet" href="{{ asset('assets/css/page-bundles/page-9edba67389ed8332.css') }}?v=9edba67389ed8332">
@endpush

@push('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" defer></script>
  <script src="{{ asset('assets/js/pages/products-healthy.js') }}" defer></script>
@endpush

@section('content')
  {{-- Hero --}}
  @include('site-en.pages.products.partials.hero')

  {{-- Healthy section --}}
  @include('site-en.pages.products.healthy.partials.section-2')
@endsection