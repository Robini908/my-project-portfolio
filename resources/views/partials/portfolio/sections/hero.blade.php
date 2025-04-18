<!-- Enhanced Home Section with Alpine.js and Advanced Animations -->
<section id="home" class="py-16 md:py-0 min-h-screen flex items-center relative overflow-hidden"
    x-data="{
        heroActive: true,
        glitchEffect: false,
        typingComplete: false
    }"
    x-init="
        setTimeout(() => heroActive = true, 500);
        setInterval(() => glitchEffect = true, 5000);
        setTimeout(() => glitchEffect = false, 5300);
    ">

    <!-- Particle Effect Container with Interaction -->
    <div id="particles-bg" class="absolute inset-0 z-0"></div>

    <!-- 3D Interactive Background -->
    <div class="threejs-bg absolute inset-0 z-0"></div>

    <!-- Digital Circuit Lines (New) -->
    <div class="circuit-lines absolute inset-0 z-0 opacity-20 pointer-events-none"></div>

    <!-- Animated Decorative Elements with Enhanced Animation -->
    <div class="absolute inset-0 z-0 pointer-events-none">
        <div class="absolute top-32 right-10 w-48 h-48 bg-gradient-to-br from-indigo-600 to-purple-700 rounded-full mix-blend-overlay filter blur-3xl opacity-20 animate-blob animation-delay-2000"
             :class="{ 'animate-pulse': glitchEffect }"></div>
        <div class="absolute bottom-32 left-10 w-64 h-64 bg-gradient-to-tr from-blue-600 to-indigo-700 rounded-full mix-blend-overlay filter blur-3xl opacity-20 animate-blob"
             :class="{ 'animate-pulse': glitchEffect }"></div>
        <div class="absolute top-1/3 left-1/3 w-72 h-72 bg-gradient-to-r from-purple-600 to-pink-700 rounded-full mix-blend-overlay filter blur-3xl opacity-20 animate-blob animation-delay-4000"
             :class="{ 'animate-pulse': glitchEffect }"></div>
    </div>

    <!-- Animated Grid Lines with Scroll Reactivity -->
    <div class="grid-lines absolute inset-0 z-0 opacity-10"
         x-ref="gridLines"
         @scroll.window="$refs.gridLines.style.backgroundPositionY = (window.scrollY * 0.1) + 'px'"></div>

    <!-- Main Content with Advanced Animations -->
    <div class="container mx-auto px-6 py-12 lg:py-0 relative z-10">
        <div class="flex flex-col-reverse lg:flex-row items-center lg:items-center gap-12">
            <!-- Text Content with Enhanced Typing and Glitch Effects -->
            <div class="flex-1 text-center lg:text-left hero-content"
                :class="{ 'opacity-100 translate-y-0': heroActive, 'opacity-0 translate-y-10': !heroActive }"
                x-transition:enter="transition ease-out duration-700 delay-300"
                x-transition:enter-start="opacity-0 translate-y-10"
                x-transition:enter-end="opacity-100 translate-y-0">

                <h4 class="text-indigo-400 font-mono mb-2 tracking-widest text-sm md:text-base reveal-text glitch-text"
                    :class="{ 'text-glitch': glitchEffect }">
                    <span class="inline-block">WELCOME TO MY PORTFOLIO</span>
                </h4>

                <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-6 tracking-tight reveal-text">
                    <span class="text-white block future-text">Hi, I'm</span>
                    <span class="text-gradient hero-name relative inline-block cyberpunk-text">Abraham Opubah</span>
                </h1>

                <!-- Enhanced Typing Effect Container -->
                <div class="h-16" x-data="{ showCursor: true }" x-init="setInterval(() => showCursor = !showCursor, 500)">
                    <div class="text-2xl md:text-3xl text-indigo-300 font-light mb-8 typing-container">
                        <span class="typed-text"
                            @typing-complete="typingComplete = true"></span>
                        <span class="cursor-blink" :class="{ 'opacity-0': !showCursor, 'opacity-100': showCursor }">|</span>
                    </div>
                </div>

                <p class="text-gray-300 text-lg mb-8 max-w-2xl mx-auto lg:mx-0 reveal-text leading-relaxed holographic-text">
                    {{ $description ?? 'I create innovative digital solutions and applications, specializing in full-stack development, AI integration, and responsive design.' }}
                </p>

                <!-- Buttons with Interactive Effects -->
                <div class="flex flex-wrap gap-4 justify-center lg:justify-start reveal-buttons">
                    <a href="#projects"
                        class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-md transition hover-lift flex items-center space-x-2 group cyber-button">
                        <span>View My Work</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform transition-transform group-hover:translate-x-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#contact"
                        class="px-6 py-3 border border-indigo-500 text-indigo-300 hover:bg-indigo-500 hover:text-white rounded-md transition hover-lift flex items-center space-x-2 group backdrop-blur-sm bg-indigo-500/10 cyber-button-alt">
                        <span>Contact Me</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform transition-transform group-hover:translate-x-1" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                        </svg>
                    </a>
                </div>

                <!-- Social Media Icons with Enhanced Hover Effects -->
                <div class="mt-10 flex space-x-6 justify-center lg:justify-start reveal-icons">
                    <a href="#"
                        class="text-gray-400 hover:text-white transition-all duration-300 transform hover:scale-110 social-icon-wrapper">
                        <div class="social-icon-bg"></div>
                        <svg class="w-6 h-6 relative z-10" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">GitHub</span>
                    </a>
                    <a href="#"
                        class="text-gray-400 hover:text-white transition-all duration-300 transform hover:scale-110 social-icon-wrapper">
                        <div class="social-icon-bg"></div>
                        <svg class="w-6 h-6 relative z-10" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path>
                        </svg>
                        <span class="sr-only">Twitter</span>
                    </a>
                    <a href="#"
                        class="text-gray-400 hover:text-white transition-all duration-300 transform hover:scale-110 social-icon-wrapper">
                        <div class="social-icon-bg"></div>
                        <svg class="w-6 h-6 relative z-10" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-0.966 0-1.75-0.79-1.75-1.764s0.784-1.764 1.75-1.764 1.75 0.79 1.75 1.764-0.784 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">LinkedIn</span>
                    </a>
                </div>
            </div>

            <!-- Profile Image Section With Enhanced Interactive Elements -->
            <div class="flex-1 relative profile-container">
                <div class="glow-effect profile-wrap relative z-10"
                    :class="{ 'profile-pulse': glitchEffect }">
                    <div class="profile-frame relative w-72 h-72 md:w-96 md:h-96 mx-auto rounded-full overflow-hidden backdrop-blur-sm border-4 border-indigo-500/30 shadow-[0_0_60px_-15px_rgba(99,102,241,0.5)]">
                        <div class="profile-rotation w-full h-full animate-float">
                            <!-- Image -->
                            <div class="profile-parallax absolute inset-0">
                                <img src="{{ $image ?? 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=774&q=80' }}"
                                    alt="{{ $name ?? 'Abraham Opubah' }}"
                                    class="object-cover w-full h-full profile-img">
                            </div>
                        </div>

                        <!-- Scanning Effect -->
                        <div class="scan-line" :class="{ 'scanning': glitchEffect }"></div>

                        <!-- Animated Glowing Border -->
                        <div class="absolute inset-0 border-4 border-transparent rounded-full glow-border"></div>
                    </div>
                </div>

                <!-- Stats Display -->
                <div class="stats-hologram">
                    <div class="stat-item">
                        <div class="stat-number">5+</div>
                        <div class="stat-label">Years</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">100+</div>
                        <div class="stat-label">Projects</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">100%</div>
                        <div class="stat-label">Satisfaction</div>
                    </div>
                </div>

                <!-- Experience Indicator -->
                <div class="experience-indicator absolute -bottom-4 left-1/2 transform -translate-x-1/2 bg-white/10 backdrop-blur-md px-4 py-2 rounded-full shadow-lg cyberpunk-panel">
                    <span class="text-white font-semibold tracking-wide">{{ $experience ?? '5+ Years Experience' }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-10 left-0 right-0 flex justify-center">
        <div class="scroll-indicator flex flex-col items-center">
            <span class="text-gray-400 text-sm mb-2 digital-text">Scroll Down</span>
            <div class="w-6 h-10 border-2 border-gray-400 rounded-full flex justify-center items-start p-1 enhanced-scroll-indicator">
                <div class="w-1 h-2 bg-white rounded-full animate-bounce"></div>
            </div>
        </div>
    </div>
</section>
