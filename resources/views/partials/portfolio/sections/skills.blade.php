<!-- Enhanced Skills Section with Futuristic Design -->
<section id="skills"
         x-data="skillsSection()"
         x-init="init()"
         class="py-20 relative overflow-hidden bg-gradient-to-b from-slate-900 via-slate-800 to-slate-900">

    <!-- Add Tippy.js Dependencies -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/tippy.js@6"></script>
    <link rel="stylesheet" href="https://unpkg.com/tippy.js@6/themes/translucent.css">

    @php
        // Default skills data if not provided
        $defaultSkillCategories = [
            [
                'title' => 'Frontend Development',
                'description' => 'Building responsive and interactive web applications',
                'icon' => '<svg class="w-8 h-8 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>',
                'items' => [
                    [
                        'name' => 'React.js',
                        'logo' => '/images/skills/react.svg',
                        'link' => 'https://reactjs.org/',
                        'description' => 'A JavaScript library for building user interfaces'
                    ],
                    [
                        'name' => 'Vue.js',
                        'logo' => '/images/skills/vue.svg',
                        'link' => 'https://vuejs.org/',
                        'description' => 'Progressive JavaScript Framework'
                    ],
                    [
                        'name' => 'Next.js',
                        'logo' => '/images/skills/nextjs.svg',
                        'link' => 'https://nextjs.org/',
                        'description' => 'The React Framework for Production'
                    ],
                    [
                        'name' => 'TailwindCSS',
                        'logo' => '/images/skills/tailwind.svg',
                        'link' => 'https://tailwindcss.com/',
                        'description' => 'A utility-first CSS framework'
                    ],
                    [
                        'name' => 'TypeScript',
                        'logo' => '/images/skills/typescript.svg',
                        'link' => 'https://www.typescriptlang.org/',
                        'description' => 'JavaScript with syntax for types'
                    ],
                    [
                        'name' => 'JavaScript',
                        'logo' => '/images/skills/javascript.svg',
                        'link' => 'https://developer.mozilla.org/en-US/docs/Web/JavaScript',
                        'description' => 'The language of the web'
                    ]
                ]
            ],
            [
                'title' => 'Backend Development',
                'description' => 'Building scalable and secure server-side applications',
                'icon' => '<svg class="w-8 h-8 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"></path></svg>',
                'items' => [
                    [
                        'name' => 'Laravel',
                        'logo' => '/images/skills/laravel.svg',
                        'link' => 'https://laravel.com/',
                        'description' => 'The PHP Framework for Web Artisans'
                    ],
                    [
                        'name' => 'Node.js',
                        'logo' => '/images/skills/nodejs.svg',
                        'link' => 'https://nodejs.org/',
                        'description' => 'JavaScript runtime built on Chrome\'s V8'
                    ],
                    [
                        'name' => 'Express.js',
                        'logo' => '/images/skills/express.svg',
                        'link' => 'https://expressjs.com/',
                        'description' => 'Fast, unopinionated web framework for Node.js'
                    ],
                    [
                        'name' => 'PostgreSQL',
                        'logo' => '/images/skills/postgresql.svg',
                        'link' => 'https://www.postgresql.org/',
                        'description' => 'The World\'s Most Advanced Open Source Database'
                    ],
                    [
                        'name' => 'MongoDB',
                        'logo' => '/images/skills/mongodb.svg',
                        'link' => 'https://www.mongodb.com/',
                        'description' => 'The Application Data Platform'
                    ],
                    [
                        'name' => 'Redis',
                        'logo' => '/images/skills/redis.svg',
                        'link' => 'https://redis.io/',
                        'description' => 'Open source in-memory data store'
                    ]
                ]
            ],
            [
                'title' => 'DevOps & Tools',
                'description' => 'Tools and technologies for modern development',
                'icon' => '<svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>',
                'items' => [
                    [
                        'name' => 'Docker',
                        'logo' => '/images/skills/docker.svg',
                        'link' => 'https://www.docker.com/',
                        'description' => 'Containerization platform'
                    ],
                    [
                        'name' => 'Git',
                        'logo' => '/images/skills/git.svg',
                        'link' => 'https://git-scm.com/',
                        'description' => 'Distributed version control system'
                    ],
                    [
                        'name' => 'AWS',
                        'logo' => '/images/skills/aws.svg',
                        'link' => 'https://aws.amazon.com/',
                        'description' => 'Cloud computing services'
                    ],
                    [
                        'name' => 'GitHub Actions',
                        'logo' => '/images/skills/github-actions.svg',
                        'link' => 'https://github.com/features/actions',
                        'description' => 'Automate your workflow'
                    ],
                    [
                        'name' => 'Linux',
                        'logo' => '/images/skills/linux.svg',
                        'link' => 'https://www.linux.org/',
                        'description' => 'Open-source operating system'
                    ],
                    [
                        'name' => 'Nginx',
                        'logo' => '/images/skills/nginx.svg',
                        'link' => 'https://www.nginx.com/',
                        'description' => 'Web server and reverse proxy'
                    ]
                ]
            ]
        ];

        $skills = [
            [
                'name' => 'Frontend Development',
                'percentage' => 90,
                'progress' => 237.6,
                'color' => 'text-indigo-500'
            ],
            [
                'name' => 'Backend Development',
                'percentage' => 85,
                'progress' => 224.4,
                'color' => 'text-purple-500'
            ],
            [
                'name' => 'DevOps & Cloud',
                'percentage' => 80,
                'progress' => 211.2,
                'color' => 'text-blue-500'
            ],
            [
                'name' => 'System Design',
                'percentage' => 85,
                'progress' => 224.4,
                'color' => 'text-emerald-500'
            ]
        ];

        // Use provided variables or defaults
        $skillCategories = $skillCategories ?? $defaultSkillCategories;
    @endphp

    <!-- Animated Background -->
    <x-portfolio.components.animated-background />

    <div class="container mx-auto px-6">
        <!-- Section Header -->
        <x-portfolio.components.section-header
            title="My Skills"
            :tagline="$tagline ?? 'Here are the technologies and tools I\'m proficient with.'"
        />

        <!-- Skills Overview -->
        <x-portfolio.components.skills-overview :skills="$skills" />

        <!-- Skills Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($skillCategories as $index => $category)
                <x-portfolio.components.skill-card :category="$category" :index="$index" />
            @endforeach
        </div>
    </div>

    <style>
        .text-gradient {
            @apply bg-clip-text text-transparent bg-gradient-to-r from-indigo-500 via-purple-500 to-blue-500;
        }

        /* Futuristic Grid Background */
        .futuristic-grid {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image:
                linear-gradient(rgba(255, 255, 255, 0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.05) 1px, transparent 1px);
            background-size: 50px 50px;
            pointer-events: none;
            z-index: 1;
        }

        /* Glowing Border Effect */
        .glow-border {
            position: relative;
            overflow: hidden;
        }

        .glow-border::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, #6366f1, #8b5cf6, #3b82f6);
            z-index: -1;
            border-radius: inherit;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .glow-border:hover::before {
            opacity: 1;
        }

        /* Skill Item Styling */
        .skill-item {
            position: relative;
            transition: all 0.3s ease;
            background: rgba(30, 41, 59, 0.5);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 1rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.5rem;
        }

        .skill-item:hover {
            transform: translateY(-5px);
            background: rgba(30, 41, 59, 0.7);
            border-color: rgba(255, 255, 255, 0.2);
        }

        .skill-logo {
            width: 48px;
            height: 48px;
            object-fit: contain;
            filter: grayscale(100%) brightness(0.8);
            transition: all 0.3s ease;
        }

        .skill-item:hover .skill-logo {
            filter: none;
            transform: scale(1.1);
        }

        .skill-name {
            font-size: 0.875rem;
            color: rgba(255, 255, 255, 0.7);
            text-align: center;
            transition: all 0.3s ease;
        }

        .skill-item:hover .skill-name {
            color: white;
        }

        /* Tooltip Styling */
        .skill-tooltip {
            position: absolute;
            bottom: 100%;
            left: 50%;
            transform: translateX(-50%) translateY(-10px);
            background: rgba(0, 0, 0, 0.9);
            color: white;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            font-size: 0.875rem;
            white-space: nowrap;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 10;
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .skill-tooltip::after {
            content: '';
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%);
            border-width: 6px;
            border-style: solid;
            border-color: rgba(0, 0, 0, 0.9) transparent transparent transparent;
        }

        .skill-item:hover .skill-tooltip {
            opacity: 1;
            visibility: visible;
            transform: translateX(-50%) translateY(-15px);
        }

        /* Tippy Custom Styles */
        .tippy-box[data-theme~='translucent'] {
            background-color: rgba(15, 23, 42, 0.98);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(148, 163, 184, 0.1);
            border-radius: 12px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
        }

        .tippy-box[data-theme~='translucent'] .tippy-content {
            padding: 1.25rem;
        }

        .tippy-custom-content h3 {
            color: #fff;
            border-bottom: 1px solid rgba(148, 163, 184, 0.1);
            padding-bottom: 0.75rem;
            margin-bottom: 0.75rem;
        }

        .tippy-custom-content p {
            color: #cbd5e1;
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        .tippy-custom-content a {
            transition: all 0.3s ease;
        }

        .tippy-custom-content a:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.2);
        }

        /* Remove old tooltip styles since we're using Tippy.js now */
        .skill-tooltip {
            display: none;
        }
    </style>

    <!-- Alpine.js Component Logic -->
    <script>
        function skillsSection() {
            return {
                sectionTitle: 'My Skills',
                titleVisible: false,
                skillCategories: @json($skillCategories),
                activeCategory: null,
                hoveredSkill: null,
                activeFilter: 'all',

                init() {
                    this.animateProgressRings();
                    this.setupIntersectionObserver();
                },

                animateProgressRings() {
                    const rings = document.querySelectorAll('.progress-ring');
                    rings.forEach(ring => {
                        const length = ring.getTotalLength();
                        if (length) {
                            ring.style.strokeDasharray = length;
                            ring.style.strokeDashoffset = length;

                            // Force a reflow
                            ring.getBoundingClientRect();

                            // Define the animation
                            ring.style.transition = 'stroke-dashoffset 2s ease-in-out';
                            ring.style.strokeDashoffset = ring.getAttribute('stroke-dashoffset');
                        }
                    });
                },

                setupIntersectionObserver() {
                    const observer = new IntersectionObserver((entries) => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                entry.target.classList.add('animate__animated', 'animate__fadeInUp');
                                observer.unobserve(entry.target);
                            }
                        });
                    }, { threshold: 0.1 });

                    document.querySelectorAll('.skill-card').forEach(card => {
                        observer.observe(card);
                    });
                }
            }
        }
    </script>
</section>
