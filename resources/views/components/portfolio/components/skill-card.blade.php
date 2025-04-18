@props(['category', 'index'])

<div class="skill-card"
     x-data="{ hover: false, isVisible: false }"
     x-init="$nextTick(() => {
        setTimeout(() => {
            isVisible = true;
        }, {{ $index * 150 }});
     })"
     @mouseenter="hover = true"
     @mouseleave="hover = false"
     :class="{'skill-card-visible': isVisible}">

    <!-- Modern Glassmorphism Card -->
    <div class="relative overflow-hidden rounded-2xl transition-all duration-500 transform hover:-translate-y-2 skill-card-inner">
        <!-- Card Background with Glass Effect -->
        <div class="absolute inset-0 bg-gradient-to-br from-slate-800/90 via-slate-800/80 to-slate-900/90 backdrop-blur-md"></div>

        <!-- Animated Background Grid -->
        <div class="absolute inset-0 bg-grid opacity-10"></div>

        <!-- Animated Border Glow Effect -->
        <div class="absolute inset-0 border border-indigo-500/0 rounded-2xl transition-colors duration-500 glow-border"
             :class="{'border-indigo-500/30': hover}"></div>

        <!-- Card Content -->
        <div class="relative p-8">
            <!-- Header with Icon -->
            <div class="flex items-start justify-between mb-6">
                <!-- Modern Icon with Glow -->
                <div class="icon-wrapper relative">
                    <div class="w-16 h-16 flex items-center justify-center rounded-2xl bg-gradient-to-br from-slate-700/80 to-slate-800/80 backdrop-blur-sm border border-slate-600/20 transform transition-all duration-500 hover:scale-105 icon-container"
                         :class="{'icon-active': hover}">
                        <div x-html="{{ $category['icon'] }}" class="relative z-10 skill-icon"></div>

                        <!-- Animated Background Effect for Icon -->
                        <div class="absolute inset-0 rounded-2xl overflow-hidden">
                            <div class="animate-pulse-slow absolute inset-0 bg-indigo-500/0 transition-colors duration-500"
                                 :class="{'bg-indigo-500/10': hover}"></div>
                        </div>
                    </div>

                    <!-- Animated Corner Accents -->
                    <div class="absolute -top-1 -left-1 w-4 h-4 border-t border-l border-indigo-500/0 transition-colors duration-500 rounded-tl"
                         :class="{'border-indigo-500/70': hover}"></div>
                    <div class="absolute -bottom-1 -right-1 w-4 h-4 border-b border-r border-indigo-500/0 transition-colors duration-500 rounded-br"
                         :class="{'border-indigo-500/70': hover}"></div>
                </div>

                <!-- Category Tag -->
                <div class="px-3 py-1 text-xs font-medium rounded-full bg-indigo-500/10 text-indigo-300 border border-indigo-500/20 category-tag">
                    {{ $category['title'] }}
                </div>
            </div>

            <!-- Title with Gradient Effect -->
            <h3 class="text-xl md:text-2xl font-bold mb-3 transition-all duration-500"
                :class="{'text-gradient': hover, 'text-white': !hover}">
                {{ $category['title'] }}
            </h3>

            <!-- Description with Animation -->
            <p class="text-gray-400 mb-6 transition-all duration-500 description-text"
               :class="{'text-gray-300': hover, 'opacity-90': !hover}">
                {{ $category['description'] }}
            </p>

            <!-- Skills Grid with Modern Design -->
            <div class="grid grid-cols-3 gap-4 skill-items-container">
                @foreach($category['items'] as $skillIndex => $skill)
                    <div class="skill-item"
                         x-data="{ skillHover: false }"
                         @mouseenter="skillHover = true"
                         @mouseleave="skillHover = false"
                         :style="'transition-delay: ' + ({{ $skillIndex * 50 }}ms)">

                        <!-- Skill Icon Container -->
                        <div class="relative group w-full aspect-square">
                            <!-- Container with Border and Background -->
                            <div class="absolute inset-0 flex items-center justify-center rounded-xl bg-slate-800/70 backdrop-blur-sm border border-slate-700/50 transition-all duration-300 skill-icon-bg"
                                 :class="{'active': skillHover || hover}">

                                <!-- Skill Logo -->
                                <img src="{{ $skill['logo'] }}" alt="{{ $skill['name'] }}"
                                     class="w-8 h-8 transition-all duration-300 transform skill-logo"
                                     :class="{'scale-110': skillHover}">

                                <!-- Hover Spotlight Effect -->
                                <div class="absolute inset-0 rounded-xl opacity-0 transition-opacity duration-300 overflow-hidden spotlight-effect"
                                     :class="{'opacity-100': skillHover}">
                                </div>
                            </div>

                            <!-- Skill Name Tooltip -->
                            <div class="absolute -bottom-10 left-1/2 transform -translate-x-1/2 px-3 py-1.5 bg-slate-800/90 backdrop-blur-md text-white text-xs rounded-md opacity-0 transition-all duration-300 whitespace-nowrap border border-indigo-500/30 tooltip z-20 shadow-lg"
                                 :class="{'tooltip-visible': skillHover}">
                                {{ $skill['name'] }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Skill Stats Footer -->
            <div class="mt-6 pt-6 border-t border-slate-700/50 flex justify-between items-center">
                <span class="text-sm text-gray-400">{{ count($category['items']) }} technologies</span>
                <span class="text-sm text-indigo-400 font-medium">{{ $category['title'] }} Skills</span>
            </div>
        </div>
    </div>
</div>

<style>
    /* Card Animation */
    .skill-card {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.8s cubic-bezier(0.17, 0.67, 0.83, 0.67);
    }

    .skill-card-visible {
        opacity: 1;
        transform: translateY(0);
    }

    .skill-card-inner {
        box-shadow: 0 10px 40px -15px rgba(0, 0, 0, 0.3);
    }

    .skill-card-inner:hover {
        box-shadow: 0 15px 50px -12px rgba(99, 102, 241, 0.25);
    }

    /* Grid Background */
    .bg-grid {
        background-image:
            linear-gradient(rgba(255, 255, 255, 0.05) 1px, transparent 1px),
            linear-gradient(90deg, rgba(255, 255, 255, 0.05) 1px, transparent 1px);
        background-size: 20px 20px;
        background-position: center center;
    }

    /* Gradient Text Effect */
    .text-gradient {
        @apply bg-clip-text text-transparent bg-gradient-to-r from-indigo-400 via-purple-400 to-pink-500;
    }

    /* Icon Styling and Animation */
    .icon-container {
        position: relative;
        overflow: hidden;
        z-index: 10;
    }

    .icon-active {
        transform: scale(1.05);
    }

    .skill-icon {
        transition: all 0.5s ease;
        filter: drop-shadow(0 0 3px rgba(99, 102, 241, 0.4));
    }

    .animate-pulse-slow {
        animation: pulse 3s infinite;
    }

    @keyframes pulse {
        0%, 100% { opacity: 0.1; }
        50% { opacity: 0.3; }
    }

    /* Skill Icons Grid */
    .skill-items-container {
        position: relative;
        z-index: 10;
    }

    .skill-item {
        transition: all 0.5s ease;
        transform: translateY(0);
    }

    .skill-icon-bg {
        transform: scale(1);
    }

    .skill-icon-bg.active {
        border-color: rgba(99, 102, 241, 0.5);
        background-color: rgba(30, 41, 59, 0.8);
    }

    .skill-logo {
        filter: grayscale(40%);
    }

    .skill-logo:hover {
        filter: grayscale(0%);
    }

    /* Tooltip Enhancement */
    .tooltip {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        transform: translate(-50%, 10px);
        z-index: 20;
    }

    .tooltip-visible {
        opacity: 1;
        transform: translate(-50%, 0);
    }

    /* Spotlight Effect */
    .spotlight-effect {
        background: radial-gradient(circle at center, rgba(99, 102, 241, 0.3) 0%, rgba(99, 102, 241, 0) 70%);
    }

    /* Category Tag Animation */
    .category-tag {
        transition: all 0.3s ease;
    }

    .category-tag:hover {
        background-color: rgba(99, 102, 241, 0.2);
    }

    /* Description Text Animation */
    .description-text {
        position: relative;
        transition: all 0.5s ease;
    }
</style>
