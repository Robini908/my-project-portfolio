@extends('layouts.portfolio')

@section('title', 'Welcome')

@section('content')
    <!-- Hero Section -->
    @include('partials.portfolio.sections.hero')

    <!-- About Section -->
    @include('partials.portfolio.sections.about')

    <!-- Skills Section -->
    @include('partials.portfolio.sections.skills')

    <!-- Projects Section -->
    @include('partials.portfolio.sections.projects')

    <!-- Resume Section -->
    @include('partials.portfolio.sections.resume')

    <!-- Contact Section -->
    @include('partials.portfolio.sections.contact')
@endsection
