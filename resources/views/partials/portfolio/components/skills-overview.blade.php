@props(['skills'])

<div class="max-w-4xl mx-auto mb-16">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        @foreach($skills as $index => $skill)
            <div class="skill-overview-card"
                 x-intersect="$el.classList.add('animate__animated', 'animate__fadeInUp')"
                 :class="{'animation-delay-' + ({{ $index }} * 200): true}">
                <div class="relative w-32 h-32 mx-auto">
                    <svg class="w-32 h-32 transform -rotate-90" viewBox="0 0 100 100">
                        <circle class="text-slate-700" stroke-width="8" stroke="currentColor" fill="transparent" r="42" cx="50" cy="50"/>
                        <circle class="progress-ring {{ $skill['color'] }}"
                                stroke-width="8"
                                stroke="currentColor"
                                fill="transparent"
                                r="42"
                                cx="50"
                                cy="50"
                                stroke-dasharray="264"
                                stroke-dashoffset="{{ $skill['progress'] }}"/>
                    </svg>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="text-center">
                            <span class="text-3xl font-bold text-white">{{ $skill['percentage'] }}%</span>
                            <p class="text-sm text-gray-400 mt-1">{{ $skill['name'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<style>
    .skill-overview-card {
        @apply backdrop-blur-sm bg-slate-800/30 rounded-xl border border-slate-700/50 p-6 transition-all duration-300 hover:shadow-lg hover:shadow-indigo-500/10 hover:border-indigo-500/50;
    }

    .progress-ring {
        transition: stroke-dashoffset 2s ease-in-out;
    }

    .animation-delay-200 {
        animation-delay: 200ms;
    }

    .animation-delay-400 {
        animation-delay: 400ms;
    }

    .animation-delay-600 {
        animation-delay: 600ms;
    }

    .animation-delay-800 {
        animation-delay: 800ms;
    }
</style>
