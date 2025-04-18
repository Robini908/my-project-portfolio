@props(['category', 'index'])

<div class="skill-card group"
     x-intersect="$el.classList.add('animate__animated', 'animate__fadeInUp')"
     :class="{'animation-delay-' + ({{ $index }} * 200): true}">
    <div class="relative overflow-hidden rounded-xl">
        <!-- Card Background -->
        <div class="absolute inset-0 bg-gradient-to-br from-slate-800/40 via-slate-800/30 to-indigo-900/20 backdrop-blur-sm"></div>

        <!-- Card Content -->
        <div class="relative p-6">
            <!-- Icon -->
            <div class="mb-6">
                <div class="w-16 h-16 bg-indigo-500/10 rounded-xl flex items-center justify-center transform group-hover:scale-110 transition-transform duration-300">
                    <div x-html="{{ $category['icon'] }}"></div>
                </div>
            </div>

            <!-- Title -->
            <h3 class="text-xl font-semibold mb-3 group-hover:text-gradient transition-colors duration-300" x-text="{{ $category['title'] }}"></h3>

            <!-- Description -->
            <p class="text-gray-400 mb-6 group-hover:text-gray-300 transition-colors duration-300" x-text="{{ $category['description'] }}"></p>

            <!-- Skills Grid with Logos -->
            <div class="grid grid-cols-3 gap-4">
                @foreach($category['items'] as $skill)
                    <div class="relative group">
                        <div class="w-12 h-12 bg-slate-800/50 rounded-lg flex items-center justify-center transform transition-transform duration-300 group-hover:scale-110">
                            <img src="{{ $skill['logo'] }}" alt="{{ $skill['name'] }}" class="w-6 h-6">
                        </div>
                        <div class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 px-2 py-1 bg-slate-800 text-white text-xs rounded opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">
                            {{ $skill['name'] }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Hover Effect Overlay -->
        <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/0 via-indigo-500/0 to-indigo-500/0 group-hover:from-indigo-500/5 group-hover:via-indigo-500/5 group-hover:to-indigo-500/5 transition-all duration-500"></div>
    </div>
</div>
