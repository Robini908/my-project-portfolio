<!-- Professional About Section with Refined Elegant Design -->
<section id="about" class="py-24 relative overflow-hidden bg-gradient-to-b from-slate-950 via-slate-900 to-slate-950">
    <!-- Subtle Background Elements - More Refined and Less Distracting -->
    <div class="absolute inset-0 bg-slate-900/40 z-0"></div>

    <!-- Refined Subtle Pattern - Less Busy -->
    <div class="absolute inset-0 opacity-5 z-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxwYXRoIGZpbGw9IiNmZmZmZmYiIGZpbGwtb3BhY2l0eT0iLjEiIGQ9Ik00MCA0MEgwVjIwaDIwVjBoMjB2NDBaIi8+PC9nPjwvc3ZnPg==')]"></div>

    <!-- Enhanced Subtle Accent Shapes -->
    <div class="absolute top-40 left-20 w-96 h-96 bg-indigo-500/5 rounded-full filter blur-4xl"></div>
    <div class="absolute bottom-40 right-20 w-96 h-96 bg-blue-500/5 rounded-full filter blur-4xl"></div>
    <div class="absolute top-1/3 right-1/4 w-64 h-64 bg-purple-500/5 rounded-full filter blur-3xl"></div>

    <div class="container mx-auto px-6 relative z-10">
        <!-- Refined Section Header -->
        <div class="text-center mb-20 opacity-100 translate-y-0 transition duration-1000"
             x-data="{}"
             x-intersect="$el.classList.add('opacity-100', 'translate-y-0')">
            <h2 class="text-4xl md:text-5xl font-bold mb-4 text-white">About <span class="bg-clip-text text-transparent bg-gradient-to-r from-indigo-400 to-blue-500">Me</span></h2>
            <div class="w-28 h-0.5 mx-auto bg-gradient-to-r from-indigo-400 to-blue-500 rounded-full mb-8"></div>
            <p class="text-gray-300 max-w-3xl mx-auto text-lg">
                {{ $tagline ?? 'Crafting digital experiences that blend technical expertise with creative innovation.' }}
            </p>
        </div>

        <!-- Centered Content with Enhanced Design -->
        <div class="max-w-4xl mx-auto">
            <!-- Refined Content with Elegant Design -->
            <div class="bg-slate-900/80 backdrop-blur p-10 rounded-xl border border-slate-800 shadow-2xl blackboard-container relative overflow-hidden opacity-100 translate-y-0 transition duration-1000 delay-300"
                 x-data="{}"
                 x-intersect="initBlackboardEffect()">

                <!-- Speech Controls Component -->
                <x-speech-controls position="top-6 right-6" theme="indigo" />

                <!-- AI Features Component -->
                <x-ai-features position="top-6 left-6" theme="indigo" activeTab="career" />

                <!-- Enhanced Corner Accents -->
                <div class="absolute top-0 left-0 w-24 h-24 border-t border-l border-indigo-500/20 rounded-tl-lg"></div>
                <div class="absolute bottom-0 right-0 w-24 h-24 border-b border-r border-blue-500/20 rounded-br-lg"></div>
                <div class="absolute top-0 right-0 w-24 h-24 border-t border-r border-purple-500/20 rounded-tr-lg"></div>
                <div class="absolute bottom-0 left-0 w-24 h-24 border-b border-l border-emerald-500/20 rounded-bl-lg"></div>

                <!-- Elegant Content Header with Subtle Gradient Border -->
                <div class="flex items-center justify-between mb-8 border-b border-slate-700/30 pb-4">
                    <h3 class="text-2xl font-chalk text-white flex items-center">
                        <span class="text-yellow-200 mr-3">✨</span>
                        <span class="chalk-title visible">My Journey</span>
                    </h3>
                    <div class="flex items-center space-x-2">
                        <div class="w-2.5 h-2.5 rounded-full bg-red-400/70"></div>
                        <div class="w-2.5 h-2.5 rounded-full bg-yellow-400/70"></div>
                        <div class="w-2.5 h-2.5 rounded-full bg-green-400/70"></div>
                    </div>
                </div>

                <!-- Enhanced Text Content with Better Spacing -->
                <div class="text-gray-100 space-y-6 leading-relaxed font-chalk chalk-text" id="blackboard-content">
                    <p class="chalk-line visible speech-text">
                        I'm Abraham Opuba, a passionate Full Stack Developer with a mission to transform complex problems into elegant, user-friendly solutions. With expertise in Laravel, JavaScript, and modern front-end frameworks, I specialize in building scalable web applications that deliver exceptional user experiences.
                    </p>
                    <p class="chalk-line visible speech-text">
                        My journey in technology is driven by continuous learning and growth. I blend technical proficiency with creative thinking to develop intuitive digital experiences that exceed expectations. Each project is an opportunity to innovate and push boundaries.
                    </p>
                    <p class="chalk-line visible speech-text">
                        Beyond coding, I'm deeply invested in open-source contributions, mentoring fellow developers, and staying at the forefront of emerging technologies that shape our digital landscape.
                    </p>
                </div>

                <!-- Professional Skills Display -->
                <div class="my-10">
                    <h4 class="text-xl text-white font-chalk mb-6 chalk-title visible flex items-center">
                        <span class="text-indigo-300 mr-3">💡</span>
                        <span>Professional Qualities</span>
                    </h4>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @if(isset($qualities) && is_array($qualities))
                            @foreach($qualities as $quality)
                                <div class="flex items-center group chalk-quality visible hover:translate-x-1 transition duration-300">
                                    <div class="w-2 h-2 bg-indigo-400/70 rounded-full mr-3 group-hover:bg-indigo-300 transition-colors duration-300"></div>
                                    <span class="text-gray-200 group-hover:text-white transition-colors duration-300">{{ $quality }}</span>
                                </div>
                            @endforeach
                        @else
                            <div class="flex items-center group chalk-quality visible hover:translate-x-1 transition duration-300">
                                <div class="w-2 h-2 bg-indigo-400/70 rounded-full mr-3 group-hover:bg-indigo-300 transition-colors duration-300"></div>
                                <span class="text-gray-200 group-hover:text-white transition-colors duration-300">Innovative Problem Solver</span>
                            </div>
                            <div class="flex items-center group chalk-quality visible hover:translate-x-1 transition duration-300">
                                <div class="w-2 h-2 bg-indigo-400/70 rounded-full mr-3 group-hover:bg-indigo-300 transition-colors duration-300"></div>
                                <span class="text-gray-200 group-hover:text-white transition-colors duration-300">Continuous Learner</span>
                            </div>
                            <div class="flex items-center group chalk-quality visible hover:translate-x-1 transition duration-300">
                                <div class="w-2 h-2 bg-indigo-400/70 rounded-full mr-3 group-hover:bg-indigo-300 transition-colors duration-300"></div>
                                <span class="text-gray-200 group-hover:text-white transition-colors duration-300">Collaborative Team Player</span>
                            </div>
                            <div class="flex items-center group chalk-quality visible hover:translate-x-1 transition duration-300">
                                <div class="w-2 h-2 bg-indigo-400/70 rounded-full mr-3 group-hover:bg-indigo-300 transition-colors duration-300"></div>
                                <span class="text-gray-200 group-hover:text-white transition-colors duration-300">Detail-Oriented Perfectionist</span>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Enhanced Skills Section -->
                <div class="my-10 pt-8 border-t border-slate-700/30">
                    <h4 class="text-xl text-white font-chalk mb-6 chalk-title visible flex items-center">
                        <span class="text-blue-300 mr-3">⚙️</span>
                        <span>Technical Expertise</span>
                        <button
                            class="ml-2 text-xs text-blue-300 hover:text-blue-200 transition-all duration-300"
                            @click="$dispatch('open-ai-feature', {tab: 'tech'})"
                            title="Get AI-powered tech stack recommendations"
                        >
                            <svg class="w-4 h-4 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                            </svg>
                        </button>
                    </h4>

                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="px-3 py-2 bg-slate-800/50 rounded-lg text-center hover:bg-slate-800/80 transition-all duration-300 chalk-skill visible group">
                            <span class="text-gray-300 group-hover:text-white transition-colors duration-300">Laravel</span>
                        </div>
                        <div class="px-3 py-2 bg-slate-800/50 rounded-lg text-center hover:bg-slate-800/80 transition-all duration-300 chalk-skill visible group">
                            <span class="text-gray-300 group-hover:text-white transition-colors duration-300">React</span>
                        </div>
                        <div class="px-3 py-2 bg-slate-800/50 rounded-lg text-center hover:bg-slate-800/80 transition-all duration-300 chalk-skill visible group">
                            <span class="text-gray-300 group-hover:text-white transition-colors duration-300">Vue.js</span>
                        </div>
                        <div class="px-3 py-2 bg-slate-800/50 rounded-lg text-center hover:bg-slate-800/80 transition-all duration-300 chalk-skill visible group">
                            <span class="text-gray-300 group-hover:text-white transition-colors duration-300">Node.js</span>
                        </div>
                    </div>
                </div>

                <!-- Career Path Section -->
                <div class="my-10 pt-8 border-t border-slate-700/30">
                    <h4 class="text-xl text-white font-chalk mb-6 chalk-title visible flex items-center">
                        <span class="text-purple-300 mr-3">🚀</span>
                        <span>Career Journey</span>
                        <button
                            class="ml-2 text-xs text-purple-300 hover:text-purple-200 transition-all duration-300"
                            @click="$dispatch('open-ai-feature', {tab: 'career'})"
                            title="Get AI-powered career path analysis"
                        >
                            <svg class="w-4 h-4 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </button>
                    </h4>

                    <div class="space-y-6">
                        <div class="bg-slate-800/30 rounded-lg p-4 border border-slate-700/40 hover:bg-slate-800/50 transition-all duration-300 chalk-experience visible">
                            <div class="flex flex-wrap justify-between items-start mb-2">
                                <h5 class="text-white font-medium">Senior Full Stack Developer</h5>
                                <span class="text-indigo-300 text-sm">2021 - Present</span>
                            </div>
                            <p class="text-gray-300 text-sm">Leading development teams in creating scalable web applications using Laravel, Vue.js, and React. Implementing best practices for performance optimization and code quality.</p>
                        </div>

                        <div class="bg-slate-800/30 rounded-lg p-4 border border-slate-700/40 hover:bg-slate-800/50 transition-all duration-300 chalk-experience visible">
                            <div class="flex flex-wrap justify-between items-start mb-2">
                                <h5 class="text-white font-medium">Full Stack Developer</h5>
                                <span class="text-indigo-300 text-sm">2018 - 2021</span>
                            </div>
                            <p class="text-gray-300 text-sm">Developed robust web applications with Laravel and JavaScript frameworks. Collaborated with UX designers to create intuitive user interfaces.</p>
                        </div>
                    </div>
                </div>

                <!-- Elegant Resume Button -->
                <div class="mt-8 flex justify-center chalk-button visible">
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
        </div>
    </div>
</section>

<!-- Enhanced CSS for Professional Design -->
<style>
    @import url('https://fonts.googleapis.com/css2?family=Architects+Daughter&family=Just+Another+Hand&display=swap');

    [x-cloak] { display: none !important; }

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

    .chalk-title, .chalk-quality, .chalk-button, .chalk-skill, .chalk-experience {
        opacity: 0;
    }

    .chalk-title.visible, .chalk-quality.visible, .chalk-button.visible, .chalk-skill.visible, .chalk-experience.visible {
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

    .border-gradient-to-r {
        border-image: linear-gradient(to right, rgba(100, 116, 139, 0.3), rgba(99, 102, 241, 0.2)) 1;
    }

    /* Speech Animation */
    .speech-text.highlight {
        background: linear-gradient(90deg, rgba(99, 102, 241, 0.1) 0%, transparent 100%);
        border-left: 2px solid rgba(99, 102, 241, 0.5);
        padding-left: 8px;
        margin-left: -10px;
    }
</style>

<!-- Enhanced JavaScript for Animations with Fallback -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add visible class to all elements by default if no Alpine.js
        if (typeof Alpine === 'undefined') {
            document.querySelectorAll('.chalk-line, .chalk-title, .chalk-quality, .chalk-skill, .chalk-experience, .chalk-button').forEach(el => {
                el.classList.add('visible');
            });
        }
    });

    function initBlackboardEffect() {
        // Make the container visible first
        const container = document.querySelector('.blackboard-container');
        if (container) {
            container.classList.add('opacity-100', 'translate-y-0');
        }

        // Animate chalk title
        setTimeout(() => {
            const titles = document.querySelectorAll('.chalk-title');
            titles.forEach(title => title.classList.add('visible'));
        }, 300);

        // Animate chalk lines
        const lines = document.querySelectorAll('.chalk-line');
        lines.forEach((line, index) => {
            setTimeout(() => {
                line.classList.add('visible');
                // Create some chalk dust particles after each line appears
                createChalkDust(line);
            }, 600 + (index * 300));
        });

        // Animate qualities
        const qualities = document.querySelectorAll('.chalk-quality');
        qualities.forEach((quality, index) => {
            setTimeout(() => {
                quality.classList.add('visible');
            }, 1500 + (index * 150));
        });

        // Animate skills
        const skills = document.querySelectorAll('.chalk-skill');
        skills.forEach((skill, index) => {
            setTimeout(() => {
                skill.classList.add('visible');
            }, 2200 + (index * 100));
        });

        // Animate button
        setTimeout(() => {
            const button = document.querySelector('.chalk-button');
            if (button) button.classList.add('visible');
        }, 2800);
    }

    function createChalkDust(element) {
        if (!element) return;

        const container = document.querySelector('.chalk-dust-container');
        if (!container) return;

        try {
            const rect = element.getBoundingClientRect();
            const containerRect = container.getBoundingClientRect();

            for (let i = 0; i < 8; i++) {
                const dust = document.createElement('div');
                dust.classList.add('chalk-dust');

                // Position relative to the container
                const x = rect.x - containerRect.x + (Math.random() * rect.width);
                const y = rect.y - containerRect.y + (Math.random() * rect.height);

                dust.style.left = `${x}px`;
                dust.style.top = `${y}px`;

                // Random size
                const size = 1 + Math.random() * 2;
                dust.style.width = `${size}px`;
                dust.style.height = `${size}px`;

                // Animation
                dust.style.animation = `float ${2 + Math.random() * 3}s ease-out forwards`;

                container.appendChild(dust);

                // Remove after animation
                setTimeout(() => {
                    if (dust.parentNode === container) {
                        dust.remove();
                    }
                }, 5000);
            }
        } catch (e) {
            console.error('Error creating chalk dust:', e);
        }
    }

    // Add keyframes for dust animation
    try {
        const style = document.createElement('style');
        style.textContent = `
            @keyframes float {
                0% {
                    transform: translate(0, 0);
                    opacity: 0.7;
                }
                100% {
                    transform: translate(${Math.random() > 0.5 ? '+' : '-'}${10 + Math.random() * 20}px, -${20 + Math.random() * 30}px);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    } catch (e) {
        console.error('Error adding keyframes:', e);
    }

    // Fallback initialization if Alpine.js is not working
    window.addEventListener('load', function() {
        setTimeout(function() {
            const container = document.querySelector('.blackboard-container');
            if (container && !container.classList.contains('opacity-100')) {
                initBlackboardEffect();
            }
        }, 1000);
    });
</script>
