@props(['category', 'index'])

<div class="skill-card relative group">
    <!-- Main Card Content -->
    <div class="relative z-10 bg-slate-800/80 backdrop-blur-xl rounded-2xl p-6 border border-slate-700/30 shadow-2xl transition-all duration-300 group-hover:bg-slate-800/90">
        <!-- Header Section -->
        <div class="flex items-center space-x-4 mb-6">
            <div class="p-3 rounded-xl bg-gradient-to-br from-slate-700 to-slate-800 border border-slate-600/30">
                {!! $category['icon'] !!}
            </div>
            <div>
                <h3 class="text-xl font-bold text-white mb-1">{{ $category['title'] }}</h3>
                <p class="text-gray-400 text-sm">{{ $category['description'] }}</p>
            </div>
        </div>

        <!-- Skills Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            @foreach($category['items'] as $item)
                <a href="{{ $item['link'] }}"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="skill-item group/item"
                   data-description="{{ $item['description'] }}">
                    <!-- Card Content -->
                    <div class="relative bg-slate-900/50 hover:bg-slate-900/70 backdrop-blur-sm border border-slate-700/30 hover:border-slate-600 rounded-xl p-4 transition-all duration-300 hover:transform hover:-translate-y-1">
                        <!-- Logo Container -->
                        <div class="flex items-center justify-center mb-3">
                            <img src="{{ $item['logo'] }}"
                                 alt="{{ $item['name'] }}"
                                 class="w-12 h-12 object-contain transition-all duration-300 group-hover/item:transform group-hover/item:scale-110"
                                 loading="lazy">
                        </div>

                        <!-- Technology Name -->
                        <div class="text-center">
                            <h4 class="text-sm font-medium text-gray-300 group-hover/item:text-white transition-colors duration-300">
                                {{ $item['name'] }}
                            </h4>
                        </div>

                        <!-- Hover Tooltip -->
                        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover/item:opacity-100 transition-opacity duration-300">
                            <div class="absolute inset-0 bg-slate-900/90 backdrop-blur-sm rounded-xl"></div>
                            <div class="relative z-10 p-3 text-center">
                                <p class="text-xs text-gray-300">{{ $item['description'] }}</p>
                                <span class="inline-block mt-2 text-xs text-indigo-400">Click to learn more →</span>
                            </div>
                        </div>

                        <!-- Decorative Corner -->
                        <div class="absolute top-0 right-0 w-8 h-8 overflow-hidden">
                            <div class="absolute top-0 right-0 w-12 h-1 bg-gradient-to-r from-transparent via-indigo-500/30 to-indigo-500/50 transform rotate-45 translate-x-2 -translate-y-4"></div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <!-- Background Effects -->
    <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/5 via-purple-500/5 to-blue-500/5 rounded-2xl transform transition-transform duration-300 group-hover:scale-105 -z-10"></div>
    <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-slate-900/50 to-transparent opacity-0 group-hover:opacity-10 rounded-2xl transition-opacity duration-300 -z-10"></div>

    <!-- Animated Border -->
    <div class="absolute inset-0 rounded-2xl bg-gradient-to-r from-indigo-500/30 via-purple-500/30 to-blue-500/30 opacity-0 group-hover:opacity-100 blur-xl transition-all duration-300 -z-20"></div>
</div>

<style>
    .skill-card {
        perspective: 1000px;
    }

    @keyframes borderAnimation {
        0% {
            background-position: 0% 50%;
        }
        50% {
            background-position: 100% 50%;
        }
        100% {
            background-position: 0% 50%;
        }
    }

    .skill-item img {
        filter: grayscale(0.3) brightness(0.9);
        transition: all 0.3s ease;
    }

    .skill-item:hover img {
        filter: grayscale(0) brightness(1);
    }
</style>
