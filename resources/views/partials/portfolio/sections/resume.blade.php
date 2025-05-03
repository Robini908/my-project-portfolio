<!-- Resume Section -->
<section id="resume" class="relative min-h-screen py-20 bg-[#0B1121] overflow-hidden">
    <!-- Animated Background with particles -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <!-- Animated Particles Background -->
        <div id="resume-particles" class="absolute inset-0"></div>

        <!-- Decorative Elements -->
        <div class="absolute bottom-0 left-0 w-full h-1/3 bg-gradient-to-t from-[#0B1121]/80 to-transparent pointer-events-none"></div>
        <div class="absolute -top-48 -right-48 w-96 h-96 bg-indigo-600/20 rounded-full filter blur-3xl opacity-50"></div>
        <div class="absolute -bottom-48 -left-48 w-96 h-96 bg-violet-600/20 rounded-full filter blur-3xl opacity-50"></div>
    </div>

    <!-- Content Container -->
    <div class="container mx-auto px-6 relative z-10">
        <!-- Section Header -->
        <div class="relative z-10 text-center mb-16">
            <!-- Section Title -->
            <div class="inline-block bg-gradient-to-r from-indigo-500 to-purple-600 rounded-full px-5 py-2 mb-4 text-white font-medium uppercase text-sm tracking-wider shadow-lg animate-pulse">
                Resume Section
            </div>

            <!-- Main Heading with Animation -->
            <div class="mb-4">
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-extrabold bg-gradient-to-r from-violet-500 to-indigo-600 bg-clip-text text-transparent">
                    Professional Resume
                </h2>
            </div>

            <!-- Descriptive Subtitle -->
            <div class="mb-8">
                <p class="text-gray-300 max-w-3xl mx-auto text-lg md:text-xl">
                    View and download my professional resume in various formats. Choose the option that best suits your needs.
                </p>
            </div>

            <!-- Decorative Line -->
            <div class="w-40 h-1 bg-gradient-to-r from-violet-500 to-indigo-600 mx-auto mb-8 rounded-full"></div>
        </div>

        <!-- Main Content -->
        <div class="max-w-5xl mx-auto" x-data="{ activeTab: 'preview' }">
            <!-- Tab Navigation -->
            <div class="flex justify-center mb-8">
                <div class="bg-slate-800/50 backdrop-blur-sm rounded-lg p-1 flex">
                    <button
                        @click="activeTab = 'preview'"
                        :class="activeTab === 'preview' ? 'bg-indigo-600 text-white' : 'bg-transparent text-gray-400 hover:text-white'"
                        class="py-2 px-4 rounded-md font-medium text-sm flex items-center gap-2 transition-colors duration-200"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        Preview
                    </button>
                    <button
                        @click="activeTab = 'download'"
                        :class="activeTab === 'download' ? 'bg-indigo-600 text-white' : 'bg-transparent text-gray-400 hover:text-white'"
                        class="py-2 px-4 rounded-md font-medium text-sm flex items-center gap-2 transition-colors duration-200"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                        Download
                    </button>
                </div>
            </div>

            <!-- Tab Content -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-xl overflow-hidden">
                <!-- Preview Tab Content -->
                <div x-show="activeTab === 'preview'" class="h-[70vh]">
                    <iframe
                        src="/resume-preview"
                        class="w-full h-full"
                        frameborder="0"
                        title="Resume Preview"
                    ></iframe>
                </div>

                <!-- Download Tab Content -->
                <div x-show="activeTab === 'download'" class="p-6 md:p-8">
                    <div class="max-w-2xl mx-auto">
                        <p class="text-gray-600 dark:text-gray-300 mb-8">
                            Choose the format that works best for your needs. Each format is optimized for different purposes.
                        </p>

                        <div class="space-y-4">
                            <!-- PDF Option -->
                            <div class="flex items-center p-4 border border-gray-200 dark:border-slate-700 rounded-lg hover:bg-gray-50 dark:hover:bg-slate-700/50 transition-colors duration-200">
                                <div class="flex-shrink-0 mr-4">
                                    <div class="w-10 h-10 rounded-full bg-red-100 dark:bg-red-900/20 flex items-center justify-center text-red-600 dark:text-red-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h3 class="text-base font-medium text-gray-900 dark:text-white">PDF Format</h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Best for submitting applications and printing</p>
                                </div>
                                <a
                                    href="{{ route('resume.download', ['format' => 'pdf']) }}"
                                    class="ml-4 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-slate-800 transition-colors duration-200"
                                >
                                    Download
                                </a>
                            </div>

                            <!-- DOCX Option -->
                            <div class="flex items-center p-4 border border-gray-200 dark:border-slate-700 rounded-lg hover:bg-gray-50 dark:hover:bg-slate-700/50 transition-colors duration-200">
                                <div class="flex-shrink-0 mr-4">
                                    <div class="w-10 h-10 rounded-full bg-blue-100 dark:bg-blue-900/20 flex items-center justify-center text-blue-600 dark:text-blue-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h3 class="text-base font-medium text-gray-900 dark:text-white">Word Format</h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Editable format for customizing to specific jobs</p>
                                </div>
                                <a
                                    href="{{ route('resume.download', ['format' => 'docx']) }}"
                                    class="ml-4 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-slate-800 transition-colors duration-200"
                                >
                                    Download
                                </a>
                            </div>

                            <!-- TXT Option -->
                            <div class="flex items-center p-4 border border-gray-200 dark:border-slate-700 rounded-lg hover:bg-gray-50 dark:hover:bg-slate-700/50 transition-colors duration-200">
                                <div class="flex-shrink-0 mr-4">
                                    <div class="w-10 h-10 rounded-full bg-green-100 dark:bg-green-900/20 flex items-center justify-center text-green-600 dark:text-green-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h3 class="text-base font-medium text-gray-900 dark:text-white">Text Format</h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Plain text for ATS compatibility</p>
                                </div>
                                <a
                                    href="{{ route('resume.download', ['format' => 'txt']) }}"
                                    class="ml-4 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-slate-800 transition-colors duration-200"
                                >
                                    Download
                                </a>
                            </div>

                            <!-- vCard Option -->
                            <div class="flex items-center p-4 border border-gray-200 dark:border-slate-700 rounded-lg hover:bg-gray-50 dark:hover:bg-slate-700/50 transition-colors duration-200">
                                <div class="flex-shrink-0 mr-4">
                                    <div class="w-10 h-10 rounded-full bg-purple-100 dark:bg-purple-900/20 flex items-center justify-center text-purple-600 dark:text-purple-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h3 class="text-base font-medium text-gray-900 dark:text-white">Contact Card</h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Digital vCard for your phone contacts</p>
                                </div>
                                <a
                                    href="{{ route('resume.download', ['format' => 'vcf']) }}"
                                    class="ml-4 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-slate-800 transition-colors duration-200"
                                >
                                    Download
                                </a>
                            </div>
                        </div>

                        <!-- Helpful Information -->
                        <div class="mt-8 bg-indigo-50 dark:bg-indigo-900/20 rounded-lg p-4 text-sm">
                            <h4 class="font-medium text-indigo-800 dark:text-indigo-300 flex items-center gap-2 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Resume Tips
                            </h4>
                            <ul class="text-indigo-700 dark:text-indigo-200 space-y-1 ml-5 list-disc">
                                <li>Use PDF for most job applications</li>
                                <li>Use DOCX to customize for specific roles</li>
                                <li>TXT format works best with application tracking systems</li>
                                <li>vCard makes it easy to save contact information</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize particles.js for the resume section background
            if (typeof particlesJS !== 'undefined') {
                particlesJS("resume-particles", {
                    "particles": {
                        "number": {
                            "value": 80,
                            "density": {
                                "enable": true,
                                "value_area": 800
                            }
                        },
                        "color": {
                            "value": "#6366f1"
                        },
                        "shape": {
                            "type": "circle",
                            "stroke": {
                                "width": 0,
                                "color": "#000000"
                            },
                            "polygon": {
                                "nb_sides": 5
                            }
                        },
                        "opacity": {
                            "value": 0.3,
                            "random": true,
                            "anim": {
                                "enable": false,
                                "speed": 1,
                                "opacity_min": 0.1,
                                "sync": false
                            }
                        },
                        "size": {
                            "value": 3,
                            "random": true,
                            "anim": {
                                "enable": false,
                                "speed": 40,
                                "size_min": 0.1,
                                "sync": false
                            }
                        },
                        "line_linked": {
                            "enable": true,
                            "distance": 150,
                            "color": "#8b5cf6",
                            "opacity": 0.2,
                            "width": 1
                        },
                        "move": {
                            "enable": true,
                            "speed": 2,
                            "direction": "none",
                            "random": false,
                            "straight": false,
                            "out_mode": "out",
                            "bounce": false,
                            "attract": {
                                "enable": false,
                                "rotateX": 600,
                                "rotateY": 1200
                            }
                        }
                    },
                    "interactivity": {
                        "detect_on": "canvas",
                        "events": {
                            "onhover": {
                                "enable": true,
                                "mode": "grab"
                            },
                            "onclick": {
                                "enable": false,
                                "mode": "push"
                            },
                            "resize": true
                        },
                        "modes": {
                            "grab": {
                                "distance": 140,
                                "line_linked": {
                                    "opacity": 0.5
                                }
                            },
                            "bubble": {
                                "distance": 400,
                                "size": 40,
                                "duration": 2,
                                "opacity": 8,
                                "speed": 3
                            },
                            "repulse": {
                                "distance": 200,
                                "duration": 0.4
                            },
                            "push": {
                                "particles_nb": 4
                            },
                            "remove": {
                                "particles_nb": 2
                            }
                        }
                    },
                    "retina_detect": true
                });
            }
        });
    </script>
    @endpush
</section>
