@extends('site.layouts.app')

@section('title', 'شركائنا | Orient Yemen')

@push('styles')
  <link rel="stylesheet" href="{{ asset('assets/css/page-bundles/page-fb207686f4cb3b1d.css') }}?v=fb207686f4cb3b1d">
@endpush

@push('scripts_head')

@endpush

@section('content')
  @include('site.pages.partners.partials.hero')
  @include('site.pages.partners.partials.section-2')
  @include('site.pages.partners.partials.section-3')
@endsection
