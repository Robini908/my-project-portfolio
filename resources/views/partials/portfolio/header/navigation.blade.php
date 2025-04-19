<header class="relative z-10 border-b border-slate-800 backdrop-blur-md bg-slate-900/70">
    <nav class="container mx-auto px-6 py-4">
        <div class="flex items-center justify-between">
            <a href="{{ url('/') }}" class="text-2xl font-bold text-gradient">
                {{ config('app.name', 'Portfolio') }}
            </a>

            <div class="hidden md:flex space-x-8 items-center">
                <a href="#home" class="text-gray-300 hover:text-white transition">Home</a>
                <a href="#about" class="text-gray-300 hover:text-white transition">About</a>
                <a href="#skills" class="text-gray-300 hover:text-white transition">Skills</a>
                <a href="#projects" class="text-gray-300 hover:text-white transition">Projects</a>
                <a href="#resume" class="text-gray-300 hover:text-white transition">Resume</a>
                <a href="#contact" class="text-gray-300 hover:text-white transition">Contact</a>

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
                <a href="#home" class="text-gray-300 hover:text-white transition">Home</a>
                <a href="#about" class="text-gray-300 hover:text-white transition">About</a>
                <a href="#skills" class="text-gray-300 hover:text-white transition">Skills</a>
                <a href="#projects" class="text-gray-300 hover:text-white transition">Projects</a>
                <a href="#resume" class="text-gray-300 hover:text-white transition">Resume</a>
                <a href="#contact" class="text-gray-300 hover:text-white transition">Contact</a>

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
