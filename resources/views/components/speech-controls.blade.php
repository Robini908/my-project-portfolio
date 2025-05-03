@props([
    'position' => 'top-6 right-6',
    'expanded' => false,
    'theme' => 'indigo',
    'showVoiceSelector' => true,
    'showRateControl' => true,
    'showControlButtons' => true
])

@php
    $themeColors = [
        'indigo' => [
            'button' => 'from-indigo-600/70 to-blue-600/70 hover:from-indigo-500/80 hover:to-blue-500/80',
            'indicator' => 'bg-indigo-600/20 border-indigo-400/30',
            'highlight' => 'bg-indigo-400',
            'text' => 'text-indigo-200',
            'panel' => 'bg-slate-900/90 border-indigo-500/30',
            'range' => 'accent-indigo-500'
        ],
        'emerald' => [
            'button' => 'from-emerald-600/70 to-teal-600/70 hover:from-emerald-500/80 hover:to-teal-500/80',
            'indicator' => 'bg-emerald-600/20 border-emerald-400/30',
            'highlight' => 'bg-emerald-400',
            'text' => 'text-emerald-200',
            'panel' => 'bg-slate-900/90 border-emerald-500/30',
            'range' => 'accent-emerald-500'
        ],
        'amber' => [
            'button' => 'from-amber-600/70 to-orange-600/70 hover:from-amber-500/80 hover:to-orange-500/80',
            'indicator' => 'bg-amber-600/20 border-amber-400/30',
            'highlight' => 'bg-amber-400',
            'text' => 'text-amber-200',
            'panel' => 'bg-slate-900/90 border-amber-500/30',
            'range' => 'accent-amber-500'
        ],
        'rose' => [
            'button' => 'from-rose-600/70 to-pink-600/70 hover:from-rose-500/80 hover:to-pink-500/80',
            'indicator' => 'bg-rose-600/20 border-rose-400/30',
            'highlight' => 'bg-rose-400',
            'text' => 'text-rose-200',
            'panel' => 'bg-slate-900/90 border-rose-500/30',
            'range' => 'accent-rose-500'
        ]
    ];

    $colors = $themeColors[$theme] ?? $themeColors['indigo'];
@endphp

<div
    x-data="{
        isExpanded: {{ $expanded ? 'true' : 'false' }},
        isSpeaking: false,
        isPaused: false,
        rate: 1,
        pitch: 1,
        volume: 1,
        voices: [],
        selectedVoice: null,
        percentage: 0,
        initSpeech() {
            if (window.speechModule) {
                this.voices = window.speechModule.getVoices();

                window.speechModule.on('onStart', () => {
                    this.isSpeaking = true;
                    this.isPaused = false;
                });

                window.speechModule.on('onPause', () => {
                    this.isPaused = true;
                });

                window.speechModule.on('onResume', () => {
                    this.isPaused = false;
                });

                window.speechModule.on('onStop', () => {
                    this.isSpeaking = false;
                    this.isPaused = false;
                    this.percentage = 0;
                });

                window.speechModule.on('onParagraphChange', (data) => {
                    this.percentage = Math.round((data.index / data.total) * 100);
                });

                window.speechModule.on('onVoicesChanged', (voices) => {
                    this.voices = voices;
                });
            }
        },
        startSpeech() {
            if (window.speechModule) {
                window.speechModule.start();
            } else {
                console.error('Speech module not initialized');
            }
        },
        pauseSpeech() {
            if (window.speechModule) window.speechModule.pause();
        },
        resumeSpeech() {
            if (window.speechModule) window.speechModule.resume();
        },
        stopSpeech() {
            if (window.speechModule) window.speechModule.stop();
        },
        nextParagraph() {
            if (window.speechModule) window.speechModule.next();
        },
        previousParagraph() {
            if (window.speechModule) window.speechModule.previous();
        },
        updateRate() {
            if (window.speechModule) window.speechModule.setRate(this.rate);
        },
        updatePitch() {
            if (window.speechModule) window.speechModule.setPitch(this.pitch);
        },
        updateVolume() {
            if (window.speechModule) window.speechModule.setVolume(this.volume);
        },
        selectVoice(index) {
            if (window.speechModule) {
                window.speechModule.selectVoice(parseInt(index));
                this.selectedVoice = index;
            }
        }
    }"
    x-init="initSpeech()"
    class="speech-controls-component absolute {{ $position }} z-20"
>
    <!-- Main Control Button -->
    <div class="flex items-center">
        <button
            @click="isExpanded ? (isSpeaking ? (isPaused ? resumeSpeech() : pauseSpeech()) : startSpeech()) : isExpanded = true"
            class="flex items-center justify-center w-10 h-10 rounded-full bg-gradient-to-r {{ $colors['button'] }} transition-all duration-300 group speech-control-button shadow-lg"
            :class="{'ring-2 ring-white/30': isSpeaking}"
            title="Listen to this section"
        >
            <!-- Play Icon (shows when not speaking) -->
            <svg
                x-show="!isSpeaking"
                class="w-5 h-5 text-white transition-all duration-300"
                fill="currentColor"
                viewBox="0 0 24 24"
            >
                <path d="M8 5v14l11-7z"/>
            </svg>

            <!-- Pause Icon (shows when speaking) -->
            <svg
                x-show="isSpeaking && !isPaused"
                x-cloak
                class="w-5 h-5 text-white transition-all duration-300"
                fill="currentColor"
                viewBox="0 0 24 24"
            >
                <path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/>
            </svg>

            <!-- Resume Icon (shows when paused) -->
            <svg
                x-show="isSpeaking && isPaused"
                x-cloak
                class="w-5 h-5 text-white transition-all duration-300"
                fill="currentColor"
                viewBox="0 0 24 24"
            >
                <path d="M8 5v14l11-7z"/>
            </svg>
        </button>

        <div x-show="isSpeaking" x-cloak class="ml-3 flex items-center space-x-1">
            <!-- Progress Indicator -->
            <div class="w-24 h-1 bg-gray-700 rounded-full overflow-hidden">
                <div
                    class="h-full {{ $colors['highlight'] }} transition-all duration-300"
                    :style="`width: ${percentage}%`"
                ></div>
            </div>

            <!-- Additional Controls Button when Speaking -->
            <button
                @click="isExpanded = !isExpanded"
                class="ml-2 text-white/80 hover:text-white transition p-1 rounded-full hover:bg-white/10"
                title="Show more controls"
            >
                <svg
                    class="w-4 h-4"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path x-show="!isExpanded" d="M7 10l5 5 5-5H7z"></path>
                    <path x-show="isExpanded" d="M7 14l5-5 5 5H7z"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Expanded Controls Panel -->
    <div
        x-show="isExpanded"
        x-cloak
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 transform -translate-y-2"
        x-transition:enter-end="opacity-100 transform translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 transform translate-y-0"
        x-transition:leave-end="opacity-0 transform -translate-y-2"
        class="mt-3 p-4 rounded-lg {{ $colors['panel'] }} backdrop-blur-md border shadow-xl min-w-[220px]"
        @click.outside="isExpanded = false"
    >
        <div class="flex items-center justify-between mb-3">
            <h3 class="text-white text-sm font-semibold">Speech Controls</h3>
            <button @click="isExpanded = false" class="text-white/70 hover:text-white" title="Close panel">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        @if($showControlButtons)
        <!-- Playback Controls -->
        <div class="flex items-center justify-center space-x-2 mt-3 mb-4">
            <button
                @click="previousParagraph()"
                :disabled="!isSpeaking"
                class="p-2 rounded-full hover:bg-white/10 text-white/80 hover:text-white disabled:opacity-50 disabled:cursor-not-allowed transition"
                title="Previous paragraph"
            >
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M6 6h2v12H6zm3.5 6l8.5 6V6z"></path>
                </svg>
            </button>

            <button
                @click="isSpeaking ? stopSpeech() : startSpeech()"
                class="p-2 rounded-full hover:bg-white/10 text-white/80 hover:text-white transition"
                :title="isSpeaking ? 'Stop' : 'Play'"
            >
                <svg x-show="!isSpeaking" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M8 5v14l11-7z"></path>
                </svg>
                <svg x-show="isSpeaking" x-cloak class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M6 6h12v12H6z"></path>
                </svg>
            </button>

            <button
                @click="isPaused ? resumeSpeech() : pauseSpeech()"
                :disabled="!isSpeaking"
                class="p-2 rounded-full hover:bg-white/10 text-white/80 hover:text-white disabled:opacity-50 disabled:cursor-not-allowed transition"
                :title="isPaused ? 'Resume' : 'Pause'"
            >
                <svg x-show="!isPaused" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"></path>
                </svg>
                <svg x-show="isPaused" x-cloak class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M8 5v14l11-7z"></path>
                </svg>
            </button>

            <button
                @click="nextParagraph()"
                :disabled="!isSpeaking"
                class="p-2 rounded-full hover:bg-white/10 text-white/80 hover:text-white disabled:opacity-50 disabled:cursor-not-allowed transition"
                title="Next paragraph"
            >
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M6 18l8.5-6L6 6v12zM16 6v12h2V6h-2z"></path>
                </svg>
            </button>
        </div>
        @endif

        @if($showRateControl)
        <!-- Speech Rate Control -->
        <div class="mb-4">
            <div class="flex justify-between items-center mb-1">
                <label class="text-xs {{ $colors['text'] }}">Speed</label>
                <span class="text-xs text-white" x-text="rate.toFixed(1) + 'x'"></span>
            </div>
            <input
                type="range"
                min="0.5"
                max="2"
                step="0.1"
                x-model="rate"
                @input="updateRate()"
                class="w-full h-1.5 rounded-lg {{ $colors['range'] }} appearance-none cursor-pointer"
            >
        </div>
        @endif

        @if($showVoiceSelector)
        <!-- Voice Selector -->
        <div class="mb-3">
            <label class="text-xs {{ $colors['text'] }} block mb-1">Voice</label>
            <select
                x-model="selectedVoice"
                @change="selectVoice($event.target.value)"
                class="w-full bg-slate-800 text-white border border-slate-700 rounded px-2 py-1 text-xs"
            >
                <template x-for="(voice, index) in voices" :key="index">
                    <option :value="index" x-text="voice.name"></option>
                </template>
            </select>
        </div>
        @endif

        <!-- Status Indicator (when speaking) -->
        <div x-show="isSpeaking" x-cloak class="flex items-center mt-3 justify-between">
            <div class="flex items-center">
                <div class="relative mr-2">
                    <div class="w-2 h-2 {{ $colors['highlight'] }} rounded-full animate-ping absolute"></div>
                    <div class="w-2 h-2 {{ $colors['highlight'] }} rounded-full relative"></div>
                </div>
                <span class="text-xs {{ $colors['text'] }}" x-text="isPaused ? 'Paused' : 'Speaking...'"></span>
            </div>
            <span class="text-xs text-white/70" x-text="percentage + '%'"></span>
        </div>
    </div>
</div>
