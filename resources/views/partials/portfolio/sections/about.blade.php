<!-- Professional About Section with Blackboard Effect -->
<section id="about" class="py-20 relative overflow-hidden">
    <!-- Subtle Background Elements -->
    <div class="absolute inset-0 bg-gradient-to-b from-slate-900/20 to-slate-900/40 z-0"></div>

    <!-- Subtle Grid Pattern -->
    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxwYXRoIGZpbGw9IiMzZjhmZTUiIGZpbGwtb3BhY2l0eT0iLjAzIiBkPSJNMzYgMzRoLTJWMTZoMnYxOHptNC0yVjE2aDJ2MTZoLTJ6bS0yMyAyVjE2aC0ydjE4aDJ6bS00LTJWMTZoLTJ2MTZoMnptMTEtMTRoLTJ2MThoMlYxOHptNCAyaDJ2MTRoLTJWMjB6bS0xNyAwdjE0aC0yVjIwaDJ6bTEwIDBoMnYxNGgtMlYyMHoiLz48cGF0aCBzdHJva2U9IiMzZjhmZTUiIHN0cm9rZS1vcGFjaXR5PSIuMDUiIHN0cm9rZS13aWR0aD0iLjUiIGQ9Ik00MCAzOHYyMk0yMCAzOHYyMk0zOCAyMEgyTTM4IDQwSDJNNDAgMjBoMjBNNDAgNDBoMjAiLz48L2c+PC9zdmc+')] opacity-30 z-0"></div>

    <div class="container mx-auto px-6 relative z-10">
        <!-- Clean Section Header -->
        <div class="text-center mb-16"
             x-data
             x-intersect="$el.classList.add('opacity-100', 'translate-y-0')"
             class="opacity-0 translate-y-4 transition duration-1000">
            <h2 class="text-3xl md:text-4xl font-bold mb-4 bg-clip-text text-transparent bg-gradient-to-r from-indigo-500 to-blue-600">About Me</h2>
            <div class="w-24 h-1 mx-auto bg-gradient-to-r from-indigo-500 to-blue-600 rounded-full mb-6"></div>
            <p class="text-gray-300 max-w-3xl mx-auto">
                {{ $tagline ?? 'Get to know me and my journey in the field of computer science.' }}
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <!-- Content Column with Blackboard Effect -->
            <div class="order-2 lg:order-1 bg-slate-900/90 backdrop-blur-sm p-8 rounded-lg border border-slate-700/50 shadow-xl blackboard-container"
                 x-data
                 x-intersect="initBlackboardEffect()"
                 class="opacity-0 -translate-x-4 transition duration-1000 delay-300">

                <!-- Teacher-Style Content Header -->
                <div class="flex items-center justify-between mb-6 border-b border-slate-700/50 pb-3">
                    <h3 class="text-2xl font-chalk text-white flex items-center">
                        <span class="text-yellow-200 mr-3">📝</span>
                        <span class="chalk-title">Who Am I?</span>
                    </h3>
                    <div class="flex items-center space-x-2">
                        <div class="w-3 h-3 rounded-full bg-red-400"></div>
                        <div class="w-3 h-3 rounded-full bg-yellow-400"></div>
                        <div class="w-3 h-3 rounded-full bg-green-400"></div>
                    </div>
                </div>

                <!-- Blackboard Text Content -->
                <div class="text-gray-100 space-y-6 leading-relaxed font-chalk chalk-text" id="blackboard-content">
                    <p class="chalk-line">
                        I'm a passionate Computer Science professional with a keen interest in developing innovative solutions that bridge technology and everyday needs. My journey has equipped me with a strong foundation in both theoretical principles and practical applications.
                    </p>
                    <p class="chalk-line">
                        Through focused dedication to both personal projects and professional experiences, I've sharpened my technical skills and deepened my understanding of real-world challenges in the technology industry.
                    </p>
                </div>

                <!-- Professional Quality Indicators with Chalk Style -->
                <div class="grid grid-cols-2 gap-6 my-8">
                    @if(isset($qualities) && is_array($qualities))
                        @foreach($qualities as $quality)
                            <div class="flex items-center group chalk-quality">
                                <div class="w-2 h-2 bg-yellow-200 rounded-full mr-3 group-hover:bg-yellow-100 transition-colors duration-300"></div>
                                <span class="text-yellow-100 group-hover:text-white transition-colors duration-300">{{ $quality }}</span>
                            </div>
                        @endforeach
                    @else
                        <div class="flex items-center group chalk-quality">
                            <div class="w-2 h-2 bg-yellow-200 rounded-full mr-3 group-hover:bg-yellow-100 transition-colors duration-300"></div>
                            <span class="text-yellow-100 group-hover:text-white transition-colors duration-300">Problem Solver</span>
                        </div>
                        <div class="flex items-center group chalk-quality">
                            <div class="w-2 h-2 bg-yellow-200 rounded-full mr-3 group-hover:bg-yellow-100 transition-colors duration-300"></div>
                            <span class="text-yellow-100 group-hover:text-white transition-colors duration-300">Fast Learner</span>
                        </div>
                        <div class="flex items-center group chalk-quality">
                            <div class="w-2 h-2 bg-yellow-200 rounded-full mr-3 group-hover:bg-yellow-100 transition-colors duration-300"></div>
                            <span class="text-yellow-100 group-hover:text-white transition-colors duration-300">Team Player</span>
                        </div>
                        <div class="flex items-center group chalk-quality">
                            <div class="w-2 h-2 bg-yellow-200 rounded-full mr-3 group-hover:bg-yellow-100 transition-colors duration-300"></div>
                            <span class="text-yellow-100 group-hover:text-white transition-colors duration-300">Detail Oriented</span>
                        </div>
                    @endif
                </div>

                <!-- Resume Button with Chalk Style -->
                @if(isset($resumeLink))
                    <a href="{{ $resumeLink }}" class="mt-6 inline-flex items-center px-5 py-3 bg-yellow-600/30 hover:bg-yellow-500/40 text-white rounded-md transition duration-300 shadow-md group border border-yellow-500/30 chalk-button">
                        <span>Download Resume</span>
                        <svg class="w-5 h-5 ml-3 transform transition-transform duration-300 group-hover:translate-y-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                        </svg>
                    </a>
                @endif

                <!-- Chalk dust particles container -->
                <div class="chalk-dust-container absolute pointer-events-none"></div>
            </div>

            <!-- Classroom-Styled Image Column -->
            <div class="order-1 lg:order-2 relative"
                 x-data
                 x-intersect="$el.classList.add('opacity-100', 'translate-x-0'); initImageEffect();"
                 class="opacity-0 translate-x-4 transition duration-1000 delay-500">

                <!-- Notebook Paper Style Container -->
                <div class="backdrop-blur-sm bg-white/5 p-6 rounded-lg shadow-xl relative notebook-container">
                    <!-- Red margin line -->
                    <div class="absolute left-8 top-0 bottom-0 w-px bg-red-400/50"></div>

                    <!-- Notebook holes -->
                    <div class="absolute left-3 top-0 bottom-0 flex flex-col justify-around items-center pointer-events-none">
                        <div class="w-3 h-3 rounded-full border-2 border-slate-400/30 bg-slate-800/30"></div>
                        <div class="w-3 h-3 rounded-full border-2 border-slate-400/30 bg-slate-800/30"></div>
                        <div class="w-3 h-3 rounded-full border-2 border-slate-400/30 bg-slate-800/30"></div>
                    </div>

                    <!-- Notebook lines -->
                    <div class="absolute inset-0 bg-[repeating-linear-gradient(transparent,transparent_28px,rgba(255,255,255,0.1)_28px,rgba(255,255,255,0.1)_29px)] pointer-events-none"></div>

                    <!-- Main Image with Polaroid Style -->
                    <div class="relative ml-6 rounded-sm overflow-hidden shadow-xl transition-all duration-500 image-container" x-data="{ rotated: false }" @mouseover="rotated = true" @mouseout="rotated = false" :class="{ 'rotate-2': rotated }">
                        <div class="p-3 bg-gray-100 rounded-sm">
                            <div class="overflow-hidden rounded-sm">
                                <img src="{{ $aboutImage ?? 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1744&q=80' }}"
                                     alt="Working on code"
                                     class="w-full h-auto transition duration-700 ease-out image-zoom">
                            </div>

                            <!-- Masking tape -->
                            <div class="absolute -top-1 left-1/2 transform -translate-x-1/2 rotate-3 w-16 h-6 bg-yellow-100/80 opacity-70"></div>

                            <!-- Image Caption -->
                            <div class="pt-4 pb-1 text-center">
                                <p class="text-gray-700 font-chalk text-sm mb-1">Developing Solutions</p>
                                <div class="w-12 h-px bg-gray-300 mx-auto"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Skills Annotations with Handwritten Style -->
                    <div class="absolute top-4 right-4 transform rotate-6 skills-annotation">
                        <div class="font-chalk text-yellow-200 text-sm px-4 py-2 bg-slate-800/70 rounded-md shadow annotation-item">
                            <span class="underline decoration-wavy decoration-yellow-500/50">Tech Stack:</span>
                            <div class="flex gap-2 mt-2">
                                <span class="px-2 py-1 bg-slate-700/50 rounded text-xs">React</span>
                                <span class="px-2 py-1 bg-slate-700/50 rounded text-xs">Node.js</span>
                                <span class="px-2 py-1 bg-slate-700/50 rounded text-xs">MongoDB</span>
                            </div>
                        </div>
                    </div>

                    <!-- Experience Annotation -->
                    <div class="absolute -bottom-3 left-12 transform -rotate-3 experience-annotation">
                        <div class="font-chalk text-gray-100 flex items-center px-4 py-2 bg-slate-800/70 rounded-md shadow annotation-item">
                            <svg class="w-5 h-5 text-yellow-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-sm">{{ $experience ?? '5+ Years Experience' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Add Blackboard Effect CSS -->
<style>
    @import url('https://fonts.googleapis.com/css2?family=Architects+Daughter&family=Just+Another+Hand&display=swap');

    .blackboard-container {
        background-image: linear-gradient(to right, rgba(0, 0, 0, 0.2) 1px, transparent 1px),
                          linear-gradient(to bottom, rgba(255, 255, 255, 0.1) 1px, transparent 1px);
        background-size: 20px 20px;
        position: relative;
    }

    .font-chalk {
        font-family: 'Architects Daughter', 'Just Another Hand', cursive;
        letter-spacing: 0.5px;
    }

    .chalk-line {
        opacity: 0;
        transform: translateY(10px);
    }

    .chalk-line.visible {
        opacity: 1;
        transform: translateY(0);
        transition: opacity 0.5s ease, transform 0.5s ease;
    }

    .chalk-title, .chalk-quality, .chalk-button {
        opacity: 0;
    }

    .chalk-title.visible, .chalk-quality.visible, .chalk-button.visible {
        opacity: 1;
        transition: opacity 0.5s ease;
    }

    .chalk-dust {
        position: absolute;
        width: 3px;
        height: 3px;
        background-color: rgba(255, 255, 255, 0.7);
        border-radius: 50%;
        pointer-events: none;
    }

    /* Notebook styling */
    .notebook-container {
        transform-style: preserve-3d;
        perspective: 1000px;
    }

    .annotation-item {
        opacity: 0;
        transform: translateY(20px);
    }

    .annotation-item.visible {
        opacity: 1;
        transform: translateY(0);
        transition: opacity 0.5s ease, transform 0.5s ease;
    }

    .image-zoom {
        transform-origin: center;
        transition: transform 0.7s ease-out;
    }

    .image-container:hover .image-zoom {
        transform: scale(1.05);
    }
</style>

<!-- Add JavaScript for Blackboard Writing Effect -->
<script>
    function initBlackboardEffect() {
        // Make the container visible first
        document.querySelector('.blackboard-container').classList.add('opacity-100', 'translate-x-0');

        // Animate the title
        setTimeout(() => {
            document.querySelector('.chalk-title').classList.add('visible');
            createChalkDust();
        }, 500);

        // Animate each line of content
        const lines = document.querySelectorAll('.chalk-line');
        lines.forEach((line, index) => {
            setTimeout(() => {
                line.classList.add('visible');
                createChalkDust();
                playChalkSound();
            }, 1000 + (index * 800));
        });

        // Animate qualities
        const qualities = document.querySelectorAll('.chalk-quality');
        qualities.forEach((quality, index) => {
            setTimeout(() => {
                quality.classList.add('visible');
                createChalkDust();
            }, 2600 + (index * 300));
        });

        // Animate button
        setTimeout(() => {
            document.querySelector('.chalk-button').classList.add('visible');
        }, 3800);
    }

    function initImageEffect() {
        // Animate the annotations
        const annotations = document.querySelectorAll('.annotation-item');
        annotations.forEach((item, index) => {
            setTimeout(() => {
                item.classList.add('visible');
            }, 500 + (index * 400));
        });
    }

    function createChalkDust() {
        const container = document.querySelector('.chalk-dust-container');
        const dustCount = Math.floor(Math.random() * 5) + 3;

        for (let i = 0; i < dustCount; i++) {
            const dust = document.createElement('div');
            dust.classList.add('chalk-dust');

            // Random position
            const top = Math.random() * 100;
            const left = Math.random() * 100;
            dust.style.top = `${top}%`;
            dust.style.left = `${left}%`;

            // Random opacity
            dust.style.opacity = (Math.random() * 0.5) + 0.3;

            // Random size
            const size = (Math.random() * 2) + 1;
            dust.style.width = `${size}px`;
            dust.style.height = `${size}px`;

            container.appendChild(dust);

            // Animate and remove
            setTimeout(() => {
                dust.style.transform = `translate(${Math.random() * 20 - 10}px, ${Math.random() * 20 - 5}px)`;
                dust.style.opacity = '0';
                setTimeout(() => {
                    dust.remove();
                }, 1000);
            }, 50);
        }
    }

    function playChalkSound() {
        // Create a simple audio context for chalk writing sound
        try {
            const audioContext = new (window.AudioContext || window.webkitAudioContext)();
            const oscillator = audioContext.createOscillator();
            const gainNode = audioContext.createGain();

            oscillator.type = 'sawtooth';
            oscillator.frequency.setValueAtTime(Math.random() * 200 + 800, audioContext.currentTime);

            gainNode.gain.setValueAtTime(0.05, audioContext.currentTime);
            gainNode.gain.exponentialRampToValueAtTime(0.0001, audioContext.currentTime + 0.2);

            oscillator.connect(gainNode);
            gainNode.connect(audioContext.destination);

            oscillator.start();
            oscillator.stop(audioContext.currentTime + 0.2);
        } catch (e) {
            console.log('Audio context not supported or user interaction required');
        }
    }

    // Check if Alpine.js is available to make this compatible
    document.addEventListener('alpine:init', () => {
        Alpine.data('blackboardData', () => ({
            init() {
                this.$nextTick(() => {
                    initBlackboardEffect();
                });
            }
        }));
    });

    // Fallback if Alpine.js init event is not triggered
    window.addEventListener('load', () => {
        if (document.querySelector('.blackboard-container') &&
            !document.querySelector('.chalk-title.visible')) {
            setTimeout(initBlackboardEffect, 500);
        }
    });
</script>
