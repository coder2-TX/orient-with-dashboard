@extends('site-en.layouts.app')

@section('title', 'About | Orient Yemen')

@push('styles')
  <link rel="stylesheet" href="{{ asset('assets/css/page-bundles/page-1135fd35c260edf2.css') }}?v=1135fd35c260edf2">
@endpush

@push('scripts_head')

@endpush

@section('content')
  @include('site-en.pages.about.partials.section-2')
  @include('site-en.pages.about.partials.section-3')
  @include('site-en.pages.about.partials.section-4')
  @include('site-en.pages.about.partials.section-5')
@endsection
