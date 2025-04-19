<!-- Enhanced Home Section with Alpine.js and Advanced Animations -->
<section id="home" class="py-16 md:py-0 min-h-screen flex items-center relative overflow-hidden"
    x-data="{
        heroActive: true,
        glitchEffect: false,
        typingComplete: false
    }"
    x-init="
        setTimeout(() => heroActive = true, 300);
        setInterval(() => { glitchEffect = true; setTimeout(() => glitchEffect = false, 500); }, 7000);
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
        <div class="flex flex-col-reverse lg:flex-row items-center lg:items-center gap-8 md:gap-12">
            <!-- Text Content with Enhanced Typing and Glitch Effects -->
            <div class="flex-1 text-center lg:text-left hero-content mb-8 lg:mb-0"
                :class="{ 'opacity-100 translate-y-0': heroActive, 'opacity-0 translate-y-10': !heroActive }"
                x-transition:enter="transition ease-out duration-700 delay-300"
                x-transition:enter-start="opacity-0 translate-y-10"
                x-transition:enter-end="opacity-100 translate-y-0">

                <h4 class="text-indigo-400 font-mono mb-3 tracking-widest text-sm md:text-base reveal-text glitch-text inline-block px-3 py-1 rounded bg-indigo-900/20 backdrop-blur-sm border border-indigo-500/20"
                    :class="{ 'text-glitch': glitchEffect }">
                    <span class="inline-block">WELCOME TO MY PORTFOLIO</span>
                </h4>

                <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-6 tracking-tight reveal-text">
                    <span class="text-white block future-text">Hi, I'm</span>
                    <span class="text-gradient hero-name relative inline-block cyberpunk-text">Abraham Opubah</span>
                </h1>

                <!-- Enhanced Typing Effect Container -->
                <div class="h-16 flex justify-center lg:justify-start">
                    <div class="text-2xl md:text-3xl font-light mb-8 typing-container px-4 py-2 rounded-lg backdrop-blur-sm bg-indigo-900/10 border-l-4 border-indigo-500/50 min-w-[280px] md:min-w-[350px]">
                        <span class="typed-text" @typing-complete="typingComplete = true"></span>
                    </div>
                </div>

                <p class="text-gray-300 text-lg mb-8 max-w-2xl mx-auto lg:mx-0 reveal-text leading-relaxed holographic-text">
                    {{ $description ?? 'I create innovative digital solutions and applications, specializing in full-stack development, AI integration, and responsive design with a focus on delivering exceptional user experiences.' }}
                </p>

                <!-- Buttons with Interactive Effects -->
                <div class="flex flex-wrap gap-4 justify-center lg:justify-start reveal-buttons">
                    <a href="#projects"
                        class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-md transition hover-lift flex items-center space-x-2 group cyber-button shadow-lg shadow-indigo-500/20">
                        <span>View My Work</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform transition-transform group-hover:translate-x-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#contact"
                        class="px-6 py-3 border border-indigo-500 text-indigo-300 hover:bg-indigo-500 hover:text-white rounded-md transition hover-lift flex items-center space-x-2 group backdrop-blur-sm bg-indigo-500/10 cyber-button-alt shadow-lg shadow-indigo-500/10">
                        <span>Contact Me</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform transition-transform group-hover:translate-x-1" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Profile Image Section With Enhanced Interactive Elements -->
            <div class="flex-1 relative profile-container">
                <div class="glow-effect profile-wrap relative z-10 mb-8"
                    :class="{ 'profile-pulse': glitchEffect }">
                    <div class="profile-frame relative w-72 h-72 md:w-80 md:h-80 lg:w-96 lg:h-96 mx-auto rounded-full overflow-hidden backdrop-blur-sm border-4 border-indigo-500/30 shadow-[0_0_60px_-15px_rgba(99,102,241,0.5)]">
                        <div class="profile-rotation w-full h-full animate-float">
                            <!-- Image -->
                            <div class="profile-parallax absolute inset-0">
                                <img src="{{ $image ?? 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=774&q=80' }}"
                                    alt="{{ $name ?? 'Abraham Opubah' }}"
                                    class="object-cover w-full h-full profile-img">
                            </div>

                            <!-- Overlay with holographic effect -->
                            <div class="absolute inset-0 bg-gradient-to-t from-indigo-900/40 to-transparent opacity-70"></div>
                        </div>

                        <!-- Scanning Effect -->
                        <div class="scan-line" :class="{ 'scanning': glitchEffect }"></div>

                        <!-- Animated Glowing Border -->
                        <div class="absolute inset-0 border-4 border-transparent rounded-full glow-border"></div>

                        <!-- Corner Accents -->
                        <div class="corner-accent top-left" :class="{ 'active': heroActive }"></div>
                        <div class="corner-accent top-right" :class="{ 'active': heroActive }"></div>
                        <div class="corner-accent bottom-left" :class="{ 'active': heroActive }"></div>
                        <div class="corner-accent bottom-right" :class="{ 'active': heroActive }"></div>
                    </div>
                </div>

                <!-- Stats Display - Improved for Responsiveness -->
                <div class="stats-hologram flex justify-center w-full md:w-4/5 mx-auto">
                    <div class="stat-item">
                        <div class="stat-number text-base sm:text-lg md:text-xl lg:text-2xl">2+</div>
                        <div class="stat-label text-xs sm:text-sm">Years</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number text-base sm:text-lg md:text-xl lg:text-2xl">15+</div>
                        <div class="stat-label text-xs sm:text-sm">Projects</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number text-base sm:text-lg md:text-xl lg:text-2xl">96%</div>
                        <div class="stat-label text-xs sm:text-sm">Satisfaction</div>
                    </div>
                </div>

                <!-- Experience Indicator - Modified for Better Responsiveness -->
                <div class="experience-indicator absolute -bottom-4 left-1/2 transform -translate-x-1/2 bg-white/10 backdrop-blur-md px-4 sm:px-6 py-1 sm:py-2 rounded-full shadow-lg cyberpunk-panel hidden md:block">
                    <span class="text-white text-sm sm:text-base font-semibold tracking-wide">{{ $experience ?? '2+ Years Experience' }}</span>
                </div>
            </div>
        </div>
    </div>
</section>
