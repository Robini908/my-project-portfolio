<!-- Enhanced Skills Section with Alpine.js and Advanced Animations -->
<section id="skills" class="py-20 relative overflow-hidden"
    x-data="skillsSection()"
    x-init="initSkills()">

    <!-- Code Snippet Background -->
    @include('partials.portfolio.sections.skills.code-background')

    <!-- Blackboard Effect Overlay -->
    <div class="absolute inset-0 bg-slate-900/60 mix-blend-multiply"></div>

    <!-- Chalk Dust Particles -->
    <div id="chalk-particles" class="absolute inset-0 z-0 opacity-30"></div>

    <div class="container mx-auto px-6 relative z-10">
        <!-- Section Header with Typing Effect -->
        <div class="text-center mb-16">
            <div class="relative inline-block">
                <h2 class="text-3xl md:text-5xl font-bold text-gradient inline-block mb-4 chalk-text"
                    x-ref="sectionTitle"
                    x-text="sectionTitle"
                    :class="{'chalk-animation': titleVisible}">
                    My Skills
                </h2>
                <div class="absolute -bottom-2 left-0 right-0 h-1 bg-indigo-500 rounded-full"
                    x-ref="titleUnderline"
                    :class="{'animate-expand-width': titleVisible}"></div>
            </div>
            <p class="text-gray-300 max-w-3xl mx-auto mt-6 chalk-text-sm"
                x-show="titleVisible"
                x-transition:enter="transition ease-out duration-500 delay-500"
                x-transition:enter-start="opacity-0 transform translate-y-5"
                x-transition:enter-end="opacity-100 transform translate-y-0">
                {{ $tagline ?? 'Here are the technologies and tools I\'m proficient with.' }}
            </p>
        </div>

        <!-- Skill Filter Tabs -->
        <div class="max-w-4xl mx-auto mb-12 px-4"
             x-show="titleVisible"
             x-transition:enter="transition ease-out duration-500 delay-700"
             x-transition:enter-start="opacity-0 transform translate-y-4"
             x-transition:enter-end="opacity-100 transform translate-y-0">
            <div class="flex flex-wrap justify-center gap-2 md:gap-4 skill-filter-container">
                <button
                    class="px-4 py-2 rounded-full text-sm md:text-base transition-all duration-300 bg-slate-800/80 border border-slate-700/50 hover:border-indigo-500/50 skill-filter-btn relative overflow-hidden"
                    :class="{'active-filter': activeFilter === 'all'}"
                    @click="setActiveFilter('all')">
                    <span class="relative z-10">All Skills</span>
                    <div class="absolute inset-0 bg-indigo-500/20 transform scale-x-0 origin-left transition-transform duration-300" :class="{'scale-x-100': activeFilter === 'all'}"></div>
                </button>
                <button
                    class="px-4 py-2 rounded-full text-sm md:text-base transition-all duration-300 bg-slate-800/80 border border-slate-700/50 hover:border-indigo-500/50 skill-filter-btn relative overflow-hidden"
                    :class="{'active-filter': activeFilter === 'frontend'}"
                    @click="setActiveFilter('frontend')">
                    <span class="relative z-10">Frontend</span>
                    <div class="absolute inset-0 bg-indigo-500/20 transform scale-x-0 origin-left transition-transform duration-300" :class="{'scale-x-100': activeFilter === 'frontend'}"></div>
                </button>
                <button
                    class="px-4 py-2 rounded-full text-sm md:text-base transition-all duration-300 bg-slate-800/80 border border-slate-700/50 hover:border-indigo-500/50 skill-filter-btn relative overflow-hidden"
                    :class="{'active-filter': activeFilter === 'backend'}"
                    @click="setActiveFilter('backend')">
                    <span class="relative z-10">Backend</span>
                    <div class="absolute inset-0 bg-indigo-500/20 transform scale-x-0 origin-left transition-transform duration-300" :class="{'scale-x-100': activeFilter === 'backend'}"></div>
                </button>
                <button
                    class="px-4 py-2 rounded-full text-sm md:text-base transition-all duration-300 bg-slate-800/80 border border-slate-700/50 hover:border-indigo-500/50 skill-filter-btn relative overflow-hidden"
                    :class="{'active-filter': activeFilter === 'tools'}"
                    @click="setActiveFilter('tools')">
                    <span class="relative z-10">Tools & Design</span>
                    <div class="absolute inset-0 bg-indigo-500/20 transform scale-x-0 origin-left transition-transform duration-300" :class="{'scale-x-100': activeFilter === 'tools'}"></div>
                </button>
                <button
                    class="px-4 py-2 rounded-full text-sm md:text-base transition-all duration-300 bg-slate-800/80 border border-slate-700/50 hover:border-indigo-500/50 skill-filter-btn relative overflow-hidden"
                    :class="{'active-filter': activeFilter === 'compare'}"
                    @click="setActiveFilter('compare')">
                    <span class="flex items-center gap-1 relative z-10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        Compare Skills
                    </span>
                    <div class="absolute inset-0 bg-indigo-500/20 transform scale-x-0 origin-left transition-transform duration-300" :class="{'scale-x-100': activeFilter === 'compare'}"></div>
                </button>
            </div>
        </div>

        <!-- Skills Overview with Interactive Radar Chart -->
        @include('partials.portfolio.sections.skills.radar-chart')

        <!-- Skills Categories -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-16"
             x-show="activeFilter === 'all' || activeFilter === 'frontend' || activeFilter === 'backend' || activeFilter === 'tools'"
             x-transition:enter="transition ease-out duration-500"
             x-transition:enter-start="opacity-0 transform translate-y-4"
             x-transition:enter-end="opacity-100 transform translate-y-0"
             x-transition:leave="transition ease-in duration-300"
             x-transition:leave-start="opacity-100 transform translate-y-0"
             x-transition:leave-end="opacity-0 transform translate-y-4">
            <div x-show="activeFilter === 'all' || activeFilter === 'frontend'">
                @include('partials.portfolio.sections.skills.frontend-card')
            </div>
            <div x-show="activeFilter === 'all' || activeFilter === 'backend'">
                @include('partials.portfolio.sections.skills.backend-card')
            </div>
            <div x-show="activeFilter === 'all' || activeFilter === 'tools'">
                @include('partials.portfolio.sections.skills.tools-card')
            </div>
        </div>

        <!-- Skill Comparison Component -->
        @include('partials.portfolio.sections.skills.skill-comparison')

        <!-- Skill Resume & Timeline -->
        @include('partials.portfolio.sections.skills.skill-resume')
    </div>

    <!-- Alpine.js Component Logic -->
    <script>
        function skillsSection() {
            return {
                sectionTitle: 'My Skills',
                titleVisible: false,
                skillCategories: [
                    { name: 'Frontend', percentage: 80 },
                    { name: 'Backend', percentage: 75 },
                    { name: 'Design', percentage: 85 },
                    { name: 'DevOps', percentage: 70 },
                    { name: 'Mobile', percentage: 65 }
                ],
                activeCategory: null,
                hoveredSkill: null,
                activeFilter: 'all',
                comparisonSkill1: '',
                comparisonSkill2: '',
                showSkillTimeline: false,
                allSkills: [
                    { name: 'HTML5', percentage: 95, experience: 6, category: 'frontend', description: 'Semantic markup, accessibility, and modern HTML features', attributes: ['Semantic Structure', 'Accessibility', 'Forms', 'Canvas', 'Web Components'] },
                    { name: 'CSS3', percentage: 90, experience: 6, category: 'frontend', description: 'Advanced styling, animations, and responsive design', attributes: ['Flexbox', 'Grid', 'Animations', 'Media Queries', 'CSS Variables'] },
                    { name: 'JavaScript', percentage: 85, experience: 5, category: 'frontend', description: 'ES6+, DOM manipulation, and asynchronous programming', attributes: ['ES6+', 'Promises', 'Async/Await', 'DOM API', 'Web APIs'] },
                    { name: 'React', percentage: 80, experience: 4, category: 'frontend', description: 'Component-based UI development with React ecosystem', attributes: ['Hooks', 'Context API', 'Redux', 'Next.js', 'React Router'] },
                    { name: 'Vue.js', percentage: 75, experience: 3, category: 'frontend', description: 'Progressive framework for building user interfaces', attributes: ['Vue 3', 'Composition API', 'Vuex', 'Vue Router', 'Nuxt.js'] },
                    { name: 'Tailwind', percentage: 90, experience: 3, category: 'frontend', description: 'Utility-first CSS framework for rapid UI development', attributes: ['Custom Configuration', 'JIT Mode', 'Responsive Design', 'Dark Mode', 'Plugins'] },
                    { name: 'PHP', percentage: 85, experience: 5, category: 'backend', description: 'Server-side scripting language for web development', attributes: ['OOP', 'PSR Standards', 'Composer', 'PHP 8 Features', 'Error Handling'] },
                    { name: 'Laravel', percentage: 90, experience: 4, category: 'backend', description: 'PHP framework for web application development', attributes: ['Eloquent ORM', 'Blade Templates', 'Middleware', 'API Development', 'Testing'] },
                    { name: 'Node.js', percentage: 80, experience: 3, category: 'backend', description: 'JavaScript runtime for server-side applications', attributes: ['Express.js', 'REST APIs', 'Authentication', 'Middleware', 'MongoDB Integration'] },
                    { name: 'MySQL', percentage: 75, experience: 5, category: 'backend', description: 'Relational database management system', attributes: ['Query Optimization', 'Indexing', 'Stored Procedures', 'Transactions', 'Database Design'] },
                    { name: 'Figma', percentage: 85, experience: 3, category: 'tools', description: 'Collaborative interface design tool', attributes: ['UI Design', 'Prototyping', 'Components', 'Auto Layout', 'Design Systems'] },
                    { name: 'Git', percentage: 90, experience: 5, category: 'tools', description: 'Distributed version control system', attributes: ['Branching Strategies', 'Merge Conflict Resolution', 'GitHub/GitLab', 'CI/CD Integration', 'Git Hooks'] }
                ],

                initSkills() {
                    // Initialize chalk particles
                    this.initChalkParticles();

                    // Animate title when section is visible
                    this.observeSection();

                    // Initialize radar chart
                    this.initRadarChart();

                    // Initialize skill cards animation
                    this.initSkillCards();

                    // Initialize filter buttons
                    this.initFilterButtons();
                },

                // Filter and comparison functions
                setActiveFilter(filter) {
                    this.activeFilter = filter;

                    // Reset comparison skills when switching away from compare view
                    if (filter !== 'compare') {
                        this.comparisonSkill1 = '';
                        this.comparisonSkill2 = '';
                    }
                },

                initFilterButtons() {
                    // Add styles for active filter buttons
                    const style = document.createElement('style');
                    style.textContent = `
                        .active-filter {
                            border-color: rgba(99, 102, 241, 0.8) !important;
                            box-shadow: 0 0 10px rgba(99, 102, 241, 0.3);
                        }
                    `;
                    document.head.appendChild(style);
                },

                // Skill comparison helper functions
                getSkillProficiency(skillName) {
                    const skill = this.allSkills.find(s => s.name === skillName);
                    return skill ? skill.percentage : 0;
                },

                getSkillDescription(skillName) {
                    const skill = this.allSkills.find(s => s.name === skillName);
                    return skill ? skill.description : '';
                },

                getSkillExperience(skillName) {
                    const skill = this.allSkills.find(s => s.name === skillName);
                    return skill ? skill.experience : 0;
                },

                getSkillAttributes(skillName) {
                    const skill = this.allSkills.find(s => s.name === skillName);
                    return skill ? skill.attributes : [];
                },

                initChalkParticles() {
                    if (typeof particlesJS !== 'undefined') {
                        particlesJS('chalk-particles', {
                            particles: {
                                number: { value: 50, density: { enable: true, value_area: 800 } },
                                color: { value: "#ffffff" },
                                shape: { type: "circle" },
                                opacity: {
                                    value: 0.3,
                                    random: true,
                                    anim: { enable: true, speed: 1, opacity_min: 0.1, sync: false }
                                },
                                size: {
                                    value: 3,
                                    random: true,
                                    anim: { enable: true, speed: 2, size_min: 0.1, sync: false }
                                },
                                line_linked: { enable: false },
                                move: {
                                    enable: true,
                                    speed: 1,
                                    direction: "none",
                                    random: true,
                                    straight: false,
                                    out_mode: "out",
                                    bounce: false
                                }
                            },
                            interactivity: {
                                detect_on: "canvas",
                                events: {
                                    onhover: { enable: true, mode: "repulse" },
                                    onclick: { enable: true, mode: "push" },
                                    resize: true
                                }
                            },
                            retina_detect: true
                        });
                    }
                },

                observeSection() {
                    const observer = new IntersectionObserver((entries) => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                this.titleVisible = true;

                                // Animate skill cards with delay
                                const skillCards = document.querySelectorAll('.skill-card');
                                skillCards.forEach((card, index) => {
                                    setTimeout(() => {
                                        card.classList.add('skill-card-visible');
                                    }, 500 + (index * 200));
                                });

                                observer.disconnect();
                            }
                        });
                    }, { threshold: 0.2 });

                    observer.observe(document.querySelector('#skills'));
                },

                initRadarChart() {
                    // This would be implemented with a chart library like Chart.js
                    // For now, we'll use the existing circular progress indicators
                    setTimeout(() => {
                        const rings = document.querySelectorAll('.progress-ring');
                        rings.forEach(ring => {
                            const length = ring.getTotalLength();
                            ring.style.strokeDasharray = length;
                            ring.style.strokeDashoffset = length;

                            // Force a reflow
                            ring.getBoundingClientRect();

                            // Define the animation
                            ring.style.transition = 'stroke-dashoffset 2s ease-in-out';
                            ring.style.strokeDashoffset = ring.getAttribute('stroke-dashoffset');
                        });
                    }, 800);
                },

                initSkillCards() {
                    // Add hover effects and interactions to skill cards
                    const cards = document.querySelectorAll('.skill-card');
                    cards.forEach(card => {
                        card.addEventListener('mouseenter', () => {
                            this.activeCategory = card.dataset.category;
                        });

                        card.addEventListener('mouseleave', () => {
                            this.activeCategory = null;
                        });
                    });
                },

                setHoveredSkill(skill) {
                    this.hoveredSkill = skill;
                },

                clearHoveredSkill() {
                    this.hoveredSkill = null;
                }
            }
        }
    </script>

    <style>
        /* Filter Button Styles */
        .skill-filter-btn {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }

        .skill-filter-btn:hover {
            transform: translateY(-2px);
        }

        .skill-filter-btn:active {
            transform: translateY(0);
        }

        .active-filter {
            border-color: rgba(99, 102, 241, 0.8);
            box-shadow: 0 0 10px rgba(99, 102, 241, 0.3);
        }

        /* Comparison Component Styles */
        .comparison-card {
            transition: all 0.3s ease;
        }

        .comparison-card:hover {
            box-shadow: 0 0 20px rgba(99, 102, 241, 0.2);
            transform: translateY(-5px);
        }

        /* Timeline Styles */
        .timeline-card {
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .timeline-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
        }
    </style>
</section>
