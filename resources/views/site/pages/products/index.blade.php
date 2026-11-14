@extends('site.layouts.app')

@section('title', 'منتجاتنا | Orient Yemen')

@push('styles')
  <link rel="stylesheet" href="{{ asset('assets/css/page-bundles/page-59ebd9d72288a1a2.css') }}?v=59ebd9d72288a1a2">
@endpush

@section('content')
  @include('site.pages.products.partials.hero')
  @include('site.pages.products.partials.section-2')
@endsection

@push('scripts')
  <script src="{{ asset('assets/js/pages/products.js') }}" defer></script>
@endpush