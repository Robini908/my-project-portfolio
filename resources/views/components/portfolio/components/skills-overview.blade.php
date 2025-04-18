@props(['skills'])

<div class="max-w-5xl mx-auto mb-16 px-4">
    <!-- Enhanced Skills Header -->
    <div class="mb-10 text-center">
        <h3 class="text-2xl md:text-3xl font-bold mb-4 text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 via-purple-400 to-pink-500">Professional Proficiency</h3>
        <p class="text-gray-400 max-w-2xl mx-auto leading-relaxed">Explore my technical capabilities across different domains and technologies</p>
        <div class="w-20 h-1 bg-gradient-to-r from-indigo-500 to-purple-500 mx-auto mt-4 rounded-full"></div>
    </div>

    <!-- Modern Skills Grid with 3D Effect -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
        @foreach($skills as $index => $skill)
            <div class="skill-overview-card perspective-card"
                 x-data="{ hover: false, rotate: { x: 0, y: 0 } }"
                 x-init="$nextTick(() => {
                    setTimeout(() => {
                        $el.classList.add('animate__animated', 'animate__fadeInUp');
                    }, {{ $index * 100 }});
                 })"
                 @mouseenter="hover = true"
                 @mouseleave="hover = false"
                 @mousemove="
                    rotate.x = ((event.clientY - $el.getBoundingClientRect().top - $el.clientHeight / 2) / 10) * -1;
                    rotate.y = (event.clientX - $el.getBoundingClientRect().left - $el.clientWidth / 2) / 10;
                 "
                 :style="hover ? `transform: perspective(1000px) rotateX(${rotate.x}deg) rotateY(${rotate.y}deg)` : ''"
                 class="transition-all duration-300 ease-out opacity-0">

                <!-- Card Content with Glass Effect -->
                <div class="relative backdrop-blur-lg bg-gradient-to-br from-slate-800/90 to-slate-900/90 border border-slate-700/30 hover:border-indigo-500/50 rounded-2xl p-6 shadow-xl hover:shadow-indigo-500/20 transition-all duration-300 card-content">

                    <!-- Background Particle Effects -->
                    <div class="absolute inset-0 overflow-hidden rounded-2xl">
                        <div class="particles-bg" x-show="hover"></div>
                    </div>

                    <!-- Glowing Background Effect -->
                    <div class="absolute inset-0 glow-effect rounded-2xl" :class="{'glow-active': hover}"></div>

                    <!-- Skill Circle -->
                    <div class="relative">
                        <!-- Modern Progress Circle -->
                        <div class="skill-circle-wrapper mx-auto w-36 h-36 relative">
                            <svg class="w-full h-full transform -rotate-90" viewBox="0 0 100 100">
                                <!-- Grid Pattern Background -->
                                <defs>
                                    <linearGradient id="gradient-{{ $index }}" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" class="start-color" />
                                        <stop offset="100%" class="end-color" />
                                    </linearGradient>
                                    <pattern id="grid-pattern-{{ $index }}" width="4" height="4" patternUnits="userSpaceOnUse">
                                        <path d="M 4 0 L 0 0 0 4" fill="none" stroke="rgba(255,255,255,0.05)" stroke-width="0.5"/>
                                    </pattern>
                                </defs>

                                <!-- Background Circle -->
                                <circle class="text-slate-800/50" stroke-width="10" stroke="currentColor" fill="url(#grid-pattern-{{ $index }})" r="40" cx="50" cy="50"/>

                                <!-- Progress Track -->
                                <circle class="text-slate-700/30" stroke-width="10" stroke="currentColor" fill="transparent" r="40" cx="50" cy="50"/>

                                <!-- Progress Indicator with Gradient -->
                                <circle class="progress-ring"
                                        stroke-width="10"
                                        stroke="url(#gradient-{{ $index }})"
                                        fill="transparent"
                                        r="40"
                                        cx="50"
                                        cy="50"
                                        stroke-linecap="round"
                                        stroke-dasharray="251.2"
                                        stroke-dashoffset="{{ 251.2 - ($skill['percentage'] / 100 * 251.2) }}"
                                        :class="{'progress-hover': hover}"/>
                            </svg>

                            <!-- Percentage Display -->
                            <div class="absolute inset-0 flex flex-col items-center justify-center">
                                <span class="text-3xl font-bold percentage-text"
                                      :class="{'text-white scale-up': hover, 'text-gradient': !hover}">{{ $skill['percentage'] }}<span class="text-xl">%</span></span>
                                <div class="w-8 h-0.5 bg-gradient-to-r from-indigo-500 to-purple-500 my-1"></div>
                                <p class="text-sm skill-name"
                                   :class="{'text-indigo-300': hover, 'text-gray-400': !hover}">{{ $skill['name'] }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Accent Elements -->
                    <div class="absolute top-1 right-1 w-4 h-4 border-t border-r border-indigo-500/0 rounded-tr transition-colors duration-300" :class="{'border-indigo-500/70': hover}"></div>
                    <div class="absolute bottom-1 left-1 w-4 h-4 border-b border-l border-indigo-500/0 rounded-bl transition-colors duration-300" :class="{'border-indigo-500/70': hover}"></div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<style>
    /* Dynamic Color Setups */
    .text-gradient {
        @apply bg-clip-text text-transparent bg-gradient-to-r from-indigo-400 via-purple-400 to-pink-500;
    }

    .start-color {
        stop-color: #6366f1;
    }

    .end-color {
        stop-color: #8b5cf6;
    }

    /* Modern Card Styling with 3D Effect */
    .perspective-card {
        transform-style: preserve-3d;
        perspective: 1000px;
        will-change: transform;
    }

    .card-content {
        transform-style: preserve-3d;
        backface-visibility: hidden;
    }

    /* Progress Circle Animation */
    .progress-ring {
        transition: stroke-dashoffset 2.5s cubic-bezier(0.34, 1.56, 0.64, 1), filter 0.5s ease;
        filter: drop-shadow(0 0 3px rgba(99, 102, 241, 0.4));
    }

    .progress-hover {
        filter: drop-shadow(0 0 8px rgba(139, 92, 246, 0.7));
    }

    /* Glow Background Effect */
    .glow-effect {
        background: radial-gradient(circle at center, rgba(99, 102, 241, 0), rgba(99, 102, 241, 0));
        transition: background 0.5s ease;
    }

    .glow-active {
        background: radial-gradient(circle at center, rgba(99, 102, 241, 0.2), rgba(99, 102, 241, 0) 70%);
    }

    /* Skill Circle Wrapper */
    .skill-circle-wrapper {
        transition: transform 0.3s ease;
    }

    .skill-circle-wrapper:hover {
        transform: scale(1.05);
    }

    /* Text Animations */
    .percentage-text {
        transition: all 0.3s ease;
    }

    .scale-up {
        transform: scale(1.1);
        text-shadow: 0 0 15px rgba(99, 102, 241, 0.7);
    }

    .skill-name {
        transition: all 0.3s ease;
    }

    /* Particles Background */
    .particles-bg {
        position: absolute;
        width: 100%;
        height: 100%;
        background-image:
            radial-gradient(circle at 20% 35%, rgba(99, 102, 241, 0.15) 2px, transparent 2px),
            radial-gradient(circle at 75% 44%, rgba(139, 92, 246, 0.15) 2px, transparent 2px),
            radial-gradient(circle at 46% 87%, rgba(139, 92, 246, 0.15) 2px, transparent 2px),
            radial-gradient(circle at 64% 14%, rgba(99, 102, 241, 0.15) 2px, transparent 2px),
            radial-gradient(circle at 30% 70%, rgba(139, 92, 246, 0.15) 2px, transparent 2px);
        background-size: 150px 150px;
        opacity: 0;
        animation: fadeIn 0.5s ease forwards;
    }

    @keyframes fadeIn {
        to { opacity: 1; }
    }
</style>
