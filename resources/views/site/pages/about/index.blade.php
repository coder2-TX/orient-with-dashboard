@extends('site.layouts.app')

@section('title', 'من نحن | Orient Yemen')

@push('styles')
  <link rel="stylesheet" href="{{ asset('assets/css/page-bundles/page-1135fd35c260edf2.css') }}?v=1135fd35c260edf2">
@endpush

@push('scripts_head')

@endpush

@section('content')
  @include('site.pages.about.partials.section-2')
  @include('site.pages.about.partials.section-3')
  @include('site.pages.about.partials.section-4')
  @include('site.pages.about.partials.section-5')
@endsection
