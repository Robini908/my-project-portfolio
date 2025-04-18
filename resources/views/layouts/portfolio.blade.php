<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Personal portfolio showcasing computer science projects and skills">

    <title>{{ config('app.name', 'Portfolio') }} - @yield('title', 'My Portfolio')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=space-grotesk:300,400,500,600,700|inter:300,400,500,600,700" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/css/contact.css'])
    @livewireStyles

    <!-- Scripts -->
    @vite(['resources/js/app.js', 'resources/js/contact.js'])

    <!-- Custom CSS -->
    <style>
        :root {
            --glow-primary: rgba(99, 102, 241, 0.6);
            --glow-secondary: rgba(139, 92, 246, 0.4);
            --primary-gradient: linear-gradient(135deg, #4f46e5 0%, #9333ea 100%);
        }

        .glow-effect {
            position: relative;
        }

        .glow-effect::before {
            content: '';
            position: absolute;
            top: -20px;
            left: -20px;
            right: -20px;
            bottom: -20px;
            background: var(--primary-gradient);
            filter: blur(30px);
            opacity: 0.2;
            z-index: -1;
            transition: opacity 0.3s ease;
        }

        .glow-effect:hover::before {
            opacity: 0.4;
        }

        .hover-lift {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-lift:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
        }

        .text-gradient {
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .border-gradient {
            border: 1px solid;
            border-image: var(--primary-gradient);
            border-image-slice: 1;
        }

        .animate-float {
            animation: float 4s ease-in-out infinite;
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
            100% { transform: translateY(0px); }
        }

        /* Page transition effects */
        .page-transition-enter {
            opacity: 0;
            transform: scale(0.96);
        }

        .page-transition-enter-active {
            opacity: 1;
            transform: scale(1);
            transition: opacity 300ms, transform 300ms;
        }

        .page-transition-exit {
            opacity: 1;
            transform: scale(1);
        }

        .page-transition-exit-active {
            opacity: 0;
            transform: scale(0.96);
            transition: opacity 300ms, transform 300ms;
        }

        /* Panel navigation styling */
        section[id] {
            position: absolute;
            width: 100%;
            opacity: 0;
            pointer-events: none;
            transform: translateX(100px);
            transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1),
                        opacity 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }

        section[id].panel-active,
        section[id].active {
            opacity: 1;
            pointer-events: all;
            transform: translateX(0);
            position: relative;
        }

        /* Custom navigation indicator */
        .nav-indicator {
            position: absolute;
            bottom: -2px;
            left: 0;
            height: 2px;
            background: var(--primary-gradient);
            border-radius: 2px;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        /* Futuristic dot navigation */
        .dot-nav {
            position: fixed;
            right: 2rem;
            top: 50%;
            transform: translateY(-50%);
            z-index: 20;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .dot-nav-item {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.2);
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }

        .dot-nav-item::before {
            content: '';
            position: absolute;
            top: -4px;
            left: -4px;
            right: -4px;
            bottom: -4px;
            border-radius: 50%;
            border: 1px solid rgba(255, 255, 255, 0.1);
            opacity: 0;
            transition: all 0.3s ease;
        }

        .dot-nav-item.active {
            background-color: rgb(99, 102, 241);
            box-shadow: 0 0 10px 2px rgba(99, 102, 241, 0.5);
        }

        .dot-nav-item.active::before {
            opacity: 1;
        }

        .dot-nav-tooltip {
            position: absolute;
            right: 24px;
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(8px);
            padding: 0.35rem 0.75rem;
            border-radius: 4px;
            font-size: 0.75rem;
            white-space: nowrap;
            opacity: 0;
            transform: translateX(-10px);
            transition: all 0.3s ease;
            pointer-events: none;
        }

        .dot-nav-item:hover .dot-nav-tooltip {
            opacity: 1;
            transform: translateX(0);
        }

        /* Interactive element hover effects */
        .interactive-hover {
            position: relative;
            overflow: hidden;
        }

        .interactive-hover::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary-gradient);
            transition: width 0.3s ease;
        }

        .interactive-hover:hover::after {
            width: 100%;
        }

        /* Special section transitions */
        .section-transition-slide-up {
            transform: translateY(30px);
        }

        .section-transition-slide-down {
            transform: translateY(-30px);
        }

        .section-transition-zoom {
            transform: scale(0.95);
        }

        .section-transition-rotate {
            transform: rotate(3deg);
        }

        /* Dot navigation pulse effect */
        .dot-nav-pulse {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: rgba(99, 102, 241, 0.4);
            opacity: 0;
            pointer-events: none;
            animation: pulse-dot 2s cubic-bezier(0.455, 0.03, 0.515, 0.955) infinite;
        }

        .dot-nav-item.active .dot-nav-pulse {
            opacity: 1;
        }

        @keyframes pulse-dot {
            0% {
                transform: translate(-50%, -50%) scale(1);
                opacity: 0.4;
            }
            50% {
                transform: translate(-50%, -50%) scale(2);
                opacity: 0;
            }
            100% {
                transform: translate(-50%, -50%) scale(1);
                opacity: 0.4;
            }
        }
    </style>
</head>
<body class="antialiased font-sans bg-slate-950 text-gray-100 min-h-screen flex flex-col">
    <!-- Animated Background -->
    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-slate-950 via-slate-900 to-indigo-950"></div>
        <div class="absolute inset-0 opacity-30">
            <div class="absolute top-0 -left-40 w-96 h-96 bg-purple-600 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
            <div class="absolute top-0 -right-40 w-96 h-96 bg-indigo-600 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
            <div class="absolute bottom-40 left-20 w-96 h-96 bg-blue-600 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-4000"></div>
        </div>
        <div class="absolute inset-0 bg-slate-950 opacity-60"></div>
    </div>

    <!-- Header/Navigation -->
    <header class="fixed top-0 left-0 right-0 z-30 border-b border-slate-800 backdrop-blur-md bg-slate-900/70">
        <nav class="container mx-auto px-6 py-4 relative">
            <div class="flex items-center justify-between">
                <a href="{{ url('/') }}" class="text-2xl font-bold text-gradient">
                    {{ config('app.name', 'Portfolio') }}
                </a>

                <div class="hidden md:flex space-x-8 items-center relative">
                    <a href="#home" class="text-gray-300 hover:text-white transition relative px-1 py-2 interactive-hover">Home</a>
                    <a href="#about" class="text-gray-300 hover:text-white transition relative px-1 py-2 interactive-hover">About</a>
                    <a href="#skills" class="text-gray-300 hover:text-white transition relative px-1 py-2 interactive-hover">Skills</a>
                    <a href="#projects" class="text-gray-300 hover:text-white transition relative px-1 py-2 interactive-hover">Projects</a>
                    <a href="#contact" class="text-gray-300 hover:text-white transition relative px-1 py-2 interactive-hover">Contact</a>

                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="px-4 py-2 rounded-md bg-indigo-600 hover:bg-indigo-700 text-white transition">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-gray-300 hover:text-white transition">Login</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="px-4 py-2 rounded-md border border-indigo-500 text-indigo-400 hover:bg-indigo-500 hover:text-white transition">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-gray-300 hover:text-white focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden md:hidden mt-4 pb-4">
                <div class="flex flex-col space-y-4">
                    <a href="#home" class="text-gray-300 hover:text-white transition interactive-hover">Home</a>
                    <a href="#about" class="text-gray-300 hover:text-white transition interactive-hover">About</a>
                    <a href="#skills" class="text-gray-300 hover:text-white transition interactive-hover">Skills</a>
                    <a href="#projects" class="text-gray-300 hover:text-white transition interactive-hover">Projects</a>
                    <a href="#contact" class="text-gray-300 hover:text-white transition interactive-hover">Contact</a>

                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="px-4 py-2 rounded-md bg-indigo-600 hover:bg-indigo-700 text-white transition">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-gray-300 hover:text-white transition">Login</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="px-4 py-2 rounded-md border border-indigo-500 text-indigo-400 hover:bg-indigo-500 hover:text-white transition">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </nav>
    </header>

    <!-- Dot Navigation (Side) -->
    <div class="dot-nav hidden lg:flex">
        <div class="dot-nav-item" data-section="home">
            <div class="dot-nav-tooltip">Home</div>
            <span class="dot-nav-pulse"></span>
        </div>
        <div class="dot-nav-item" data-section="about">
            <div class="dot-nav-tooltip">About</div>
            <span class="dot-nav-pulse"></span>
        </div>
        <div class="dot-nav-item" data-section="skills">
            <div class="dot-nav-tooltip">Skills</div>
            <span class="dot-nav-pulse"></span>
        </div>
        <div class="dot-nav-item" data-section="projects">
            <div class="dot-nav-tooltip">Projects</div>
            <span class="dot-nav-pulse"></span>
        </div>
        <div class="dot-nav-item" data-section="contact">
            <div class="dot-nav-tooltip">Contact</div>
            <span class="dot-nav-pulse"></span>
        </div>
    </div>

    <!-- Content Wrapper for 3D Perspective -->
    <div id="main-content-wrapper" class="content-wrapper flex-grow z-10 relative mt-16 overflow-hidden min-h-screen">
        @yield('content')
    </div>

    <!-- Footer -->
    <x-portfolio.footer />

    @stack('scripts')
</body>
</html>
