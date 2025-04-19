<!-- Professional About Section with Refined Elegant Design -->
<section id="about" class="py-24 relative overflow-hidden bg-gradient-to-b from-slate-950 via-slate-900 to-slate-950">
    <!-- Subtle Background Elements - More Refined and Less Distracting -->
    <div class="absolute inset-0 bg-slate-900/40 z-0"></div>

    <!-- Refined Subtle Pattern - Less Busy -->
    <div class="absolute inset-0 opacity-5 z-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxwYXRoIGZpbGw9IiNmZmZmZmYiIGZpbGwtb3BhY2l0eT0iLjEiIGQ9Ik00MCA0MEgwVjIwaDIwVjBoMjB2NDBaIi8+PC9nPjwvc3ZnPg==')]"></div>

    <!-- Very Subtle Accent Shapes - Lower Opacity and More Subtle Blur -->
    <div class="absolute top-40 left-20 w-96 h-96 bg-indigo-500/5 rounded-full filter blur-4xl"></div>
    <div class="absolute bottom-40 right-20 w-96 h-96 bg-blue-500/5 rounded-full filter blur-4xl"></div>

    <div class="container mx-auto px-6 relative z-10">
        <!-- Refined Section Header -->
        <div class="text-center mb-20"
             x-data
             x-intersect="$el.classList.add('opacity-100', 'translate-y-0')"
             class="opacity-0 translate-y-4 transition duration-1000">
            <h2 class="text-4xl md:text-5xl font-bold mb-4 text-white">About <span class="bg-clip-text text-transparent bg-gradient-to-r from-indigo-400 to-blue-500">Me</span></h2>
            <div class="w-28 h-0.5 mx-auto bg-gradient-to-r from-indigo-400 to-blue-500 rounded-full mb-8"></div>
            <p class="text-gray-300 max-w-3xl mx-auto text-lg">
                {{ $tagline ?? 'Crafting digital experiences that blend technical expertise with creative innovation.' }}
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <!-- Refined Content Column with Elegant Design -->
            <div class="order-2 lg:order-1 bg-slate-900/80 backdrop-blur p-10 rounded-xl border border-slate-800 shadow-2xl blackboard-container relative overflow-hidden"
                 x-data
                 x-intersect="initBlackboardEffect()"
                 class="opacity-0 -translate-x-4 transition duration-1000 delay-300">

                <!-- Subtle Corner Accents -->
                <div class="absolute top-0 left-0 w-20 h-20 border-t border-l border-indigo-500/20 rounded-tl-lg"></div>
                <div class="absolute bottom-0 right-0 w-20 h-20 border-b border-r border-blue-500/20 rounded-br-lg"></div>

                <!-- Elegant Content Header with Subtle Border -->
                <div class="flex items-center justify-between mb-8 border-b border-slate-700/30 pb-4">
                    <h3 class="text-2xl font-chalk text-white flex items-center">
                        <span class="text-yellow-200 mr-3">✨</span>
                        <span class="chalk-title">My Journey</span>
                    </h3>
                    <div class="flex items-center space-x-2">
                        <div class="w-2.5 h-2.5 rounded-full bg-red-400/70"></div>
                        <div class="w-2.5 h-2.5 rounded-full bg-yellow-400/70"></div>
                        <div class="w-2.5 h-2.5 rounded-full bg-green-400/70"></div>
                    </div>
                </div>

                <!-- Refined Text Content -->
                <div class="text-gray-100 space-y-6 leading-relaxed font-chalk chalk-text" id="blackboard-content">
                    <p class="chalk-line">
                        I'm Abraham Opuba, a passionate Full Stack Developer with a mission to transform complex problems into elegant, user-friendly solutions. With expertise in Laravel, JavaScript, and modern front-end frameworks, I specialize in building scalable web applications that deliver exceptional user experiences.
                    </p>
                    <p class="chalk-line">
                        My journey in technology is driven by continuous learning and growth. I blend technical proficiency with creative thinking to develop intuitive digital experiences that exceed expectations. Each project is an opportunity to innovate and push boundaries.
                    </p>
                    <p class="chalk-line">
                        Beyond coding, I'm deeply invested in open-source contributions, mentoring fellow developers, and staying at the forefront of emerging technologies that shape our digital landscape.
                    </p>
                </div>

                <!-- Enhanced Professional Qualities with Subtle Hover Effects -->
                <div class="grid grid-cols-2 gap-6 my-10">
                    @if(isset($qualities) && is_array($qualities))
                        @foreach($qualities as $quality)
                            <div class="flex items-center group chalk-quality hover:translate-x-1 transition duration-300">
                                <div class="w-2 h-2 bg-indigo-400/70 rounded-full mr-3 group-hover:bg-indigo-300 transition-colors duration-300"></div>
                                <span class="text-gray-200 group-hover:text-white transition-colors duration-300">{{ $quality }}</span>
                            </div>
                        @endforeach
                    @else
                        <div class="flex items-center group chalk-quality hover:translate-x-1 transition duration-300">
                            <div class="w-2 h-2 bg-indigo-400/70 rounded-full mr-3 group-hover:bg-indigo-300 transition-colors duration-300"></div>
                            <span class="text-gray-200 group-hover:text-white transition-colors duration-300">Innovative Problem Solver</span>
                        </div>
                        <div class="flex items-center group chalk-quality hover:translate-x-1 transition duration-300">
                            <div class="w-2 h-2 bg-indigo-400/70 rounded-full mr-3 group-hover:bg-indigo-300 transition-colors duration-300"></div>
                            <span class="text-gray-200 group-hover:text-white transition-colors duration-300">Continuous Learner</span>
                        </div>
                        <div class="flex items-center group chalk-quality hover:translate-x-1 transition duration-300">
                            <div class="w-2 h-2 bg-indigo-400/70 rounded-full mr-3 group-hover:bg-indigo-300 transition-colors duration-300"></div>
                            <span class="text-gray-200 group-hover:text-white transition-colors duration-300">Collaborative Team Player</span>
                        </div>
                        <div class="flex items-center group chalk-quality hover:translate-x-1 transition duration-300">
                            <div class="w-2 h-2 bg-indigo-400/70 rounded-full mr-3 group-hover:bg-indigo-300 transition-colors duration-300"></div>
                            <span class="text-gray-200 group-hover:text-white transition-colors duration-300">Detail-Oriented Perfectionist</span>
                        </div>
                    @endif
                </div>

                <!-- Elegant Resume Button -->
                <div class="mt-8 chalk-button">
                    <x-resume-button style="outline" size="lg" class="bg-gradient-to-r from-indigo-500/10 to-blue-500/10 hover:from-indigo-500/20 hover:to-blue-500/20 text-white border border-indigo-500/30 hover:border-indigo-500/50 shadow-md transition-all duration-300">
                        <span class="flex items-center">
                            View Resume
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </span>
                    </x-resume-button>
                </div>

                <!-- Subtle Particles Effect -->
                <div class="chalk-dust-container absolute pointer-events-none"></div>
            </div>

            <!-- Refined Image Column with Elegant Design -->
            <div class="order-1 lg:order-2 relative"
                 x-data
                 x-intersect="$el.classList.add('opacity-100', 'translate-x-0'); initImageEffect();"
                 class="opacity-0 translate-x-4 transition duration-1000 delay-500">

                <!-- Elegant Image Container -->
                <div class="backdrop-blur-sm bg-slate-900/40 p-8 rounded-xl shadow-xl relative notebook-container">
                    <!-- Subtle Decorative Line -->
                    <div class="absolute left-10 top-0 bottom-0 w-px bg-gradient-to-b from-indigo-400/20 via-purple-400/10 to-blue-400/20"></div>

                    <!-- Minimal Notebook Styling -->
                    <div class="absolute left-3 top-0 bottom-0 flex flex-col justify-around items-center pointer-events-none">
                        <div class="w-3 h-3 rounded-full border border-indigo-400/20 bg-indigo-400/10"></div>
                        <div class="w-3 h-3 rounded-full border border-indigo-400/20 bg-indigo-400/10"></div>
                        <div class="w-3 h-3 rounded-full border border-indigo-400/20 bg-indigo-400/10"></div>
                    </div>

                    <!-- Very Subtle Notebook Lines -->
                    <div class="absolute inset-0 bg-[repeating-linear-gradient(transparent,transparent_29px,rgba(255,255,255,0.03)_29px,rgba(255,255,255,0.03)_30px)] pointer-events-none"></div>

                    <!-- Elegant Photo Display -->
                    <div class="relative ml-6 rounded overflow-hidden shadow-xl transition-all duration-500 image-container" x-data="{ rotated: false }" @mouseover="rotated = true" @mouseout="rotated = false" :class="{ 'rotate-1': rotated }">
                        <div class="p-3 bg-white rounded">
                            <div class="overflow-hidden rounded">
                                <img src="{{ $aboutImage ?? 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1744&q=80' }}"
                                     alt="Working on code"
                                     class="w-full h-auto transition duration-700 ease-out image-zoom">
                            </div>

                            <!-- Subtle Decorative Element -->
                            <div class="absolute -top-1 left-1/2 transform -translate-x-1/2 rotate-1 w-16 h-4 bg-indigo-100/90 opacity-70"></div>

                            <!-- Simple Image Caption -->
                            <div class="pt-4 pb-1 text-center">
                                <p class="text-gray-700 font-chalk text-sm mb-1">Crafting Digital Experiences</p>
                                <div class="w-12 h-px bg-gray-300 mx-auto"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Refined Skills Annotation -->
                    <div class="absolute top-4 right-4 transform rotate-3 skills-annotation">
                        <div class="font-chalk text-gray-200 text-sm px-4 py-2 bg-slate-800/60 rounded shadow annotation-item">
                            <span class="text-indigo-300">Expert In:</span>
                            <div class="flex flex-wrap gap-2 mt-2">
                                <span class="px-2 py-1 bg-slate-700/30 rounded text-xs hover:bg-indigo-500/20 transition duration-300">Laravel</span>
                                <span class="px-2 py-1 bg-slate-700/30 rounded text-xs hover:bg-blue-500/20 transition duration-300">React</span>
                                <span class="px-2 py-1 bg-slate-700/30 rounded text-xs hover:bg-emerald-500/20 transition duration-300">Vue.js</span>
                                <span class="px-2 py-1 bg-slate-700/30 rounded text-xs hover:bg-purple-500/20 transition duration-300">Node.js</span>
                            </div>
                        </div>
                    </div>

                    <!-- Refined Experience Annotation -->
                    <div class="absolute -bottom-2 left-12 transform -rotate-2 experience-annotation">
                        <div class="font-chalk text-gray-200 flex items-center px-4 py-2 bg-slate-800/60 rounded shadow annotation-item">
                            <svg class="w-4 h-4 text-indigo-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-sm">{{ $experience ?? '5+ Years Professional Experience' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Refined CSS for Elegant Design - More Subtle Animations -->
<style>
    @import url('https://fonts.googleapis.com/css2?family=Architects+Daughter&family=Just+Another+Hand&display=swap');

    .blackboard-container {
        position: relative;
        background-size: 30px 30px;
    }

    .font-chalk {
        font-family: 'Architects Daughter', system-ui, sans-serif;
        letter-spacing: 0.2px;
    }

    .chalk-line {
        opacity: 0;
        transform: translateY(10px);
    }

    .chalk-line.visible {
        opacity: 1;
        transform: translateY(0);
        transition: opacity 0.8s ease, transform 0.8s ease;
    }

    .chalk-title, .chalk-quality, .chalk-button {
        opacity: 0;
    }

    .chalk-title.visible, .chalk-quality.visible, .chalk-button.visible {
        opacity: 1;
        transition: opacity 0.8s ease;
    }

    .chalk-dust {
        position: absolute;
        width: 2px;
        height: 2px;
        background-color: rgba(255, 255, 255, 0.5);
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
        transform: translateY(10px);
    }

    .annotation-item.visible {
        opacity: 1;
        transform: translateY(0);
        transition: opacity 0.8s ease, transform 0.8s ease;
    }

    .image-zoom {
        transform-origin: center;
        transition: transform 0.7s ease-out;
    }

    .image-container:hover .image-zoom {
        transform: scale(1.05);
    }
</style>

<!-- JavaScript for Subtle Animations -->
<script>
    function initBlackboardEffect() {
        // Make the container visible first
        document.querySelector('.blackboard-container').classList.add('opacity-100', 'translate-x-0');

        // Animate the title
        setTimeout(() => {
            document.querySelector('.chalk-title').classList.add('visible');
        }, 500);

        // Animate each line of content
        const lines = document.querySelectorAll('.chalk-line');
        lines.forEach((line, index) => {
            setTimeout(() => {
                line.classList.add('visible');
                createChalkDust();
            }, 1000 + (index * 800));
        });

        // Animate qualities
        const qualities = document.querySelectorAll('.chalk-quality');
        qualities.forEach((quality, index) => {
            setTimeout(() => {
                quality.classList.add('visible');
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
        const dustCount = Math.floor(Math.random() * 3) + 2;

        for (let i = 0; i < dustCount; i++) {
            const dust = document.createElement('div');
            dust.classList.add('chalk-dust');

            // Random position
            const top = Math.random() * 100;
            const left = Math.random() * 100;
            dust.style.top = `${top}%`;
            dust.style.left = `${left}%`;

            // Random opacity
            dust.style.opacity = (Math.random() * 0.4) + 0.2;

            // Random size
            const size = (Math.random() * 1.5) + 0.5;
            dust.style.width = `${size}px`;
            dust.style.height = `${size}px`;

            container.appendChild(dust);

            // Animate and remove
            setTimeout(() => {
                dust.style.transform = `translate(${Math.random() * 15 - 7}px, ${Math.random() * 15 - 5}px)`;
                dust.style.opacity = '0';
                setTimeout(() => {
                    dust.remove();
                }, 800);
            }, 50);
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
