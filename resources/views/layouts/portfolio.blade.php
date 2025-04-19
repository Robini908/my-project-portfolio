<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark h-full scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', config('app.name', 'Portfolio'))</title>


    <!-- Favicons -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    @include('partials.head')

    <!-- Livewire Styles -->
    @livewireStyles
</head>
<body class="min-h-screen bg-white dark:bg-black dark:text-white antialiased overflow-x-hidden">
    <!-- Navigation Header -->
    @include('partials.portfolio.header.navigation')

    <!-- Page Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <x-portfolio.footer />

    @stack('scripts')

    <!-- Livewire Scripts -->
    @livewireScripts
</body>
</html>
