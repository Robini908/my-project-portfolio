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
        <div class="relative z-10 text-center mb-20" data-aos="fade-up" data-aos-duration="800">
            <!-- Section Title -->
            <div class="inline-block bg-gradient-to-r from-indigo-500 to-purple-600 rounded-full px-6 py-3 mb-6 text-white font-semibold uppercase text-sm tracking-wider shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105">
                <span class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Professional Resume
                </span>
            </div>

            <!-- Main Heading with Animation -->
            <div class="mb-6" data-aos="fade-up" data-aos-delay="200">
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-extrabold bg-gradient-to-r from-violet-400 via-purple-500 to-indigo-600 bg-clip-text text-transparent leading-tight">
                    Download & Preview
                </h2>
                <div class="mt-2">
                    <span class="text-2xl md:text-3xl text-gray-300 font-light">My Professional Experience</span>
                </div>
            </div>

            <!-- Descriptive Subtitle -->
            <div class="mb-10" data-aos="fade-up" data-aos-delay="400">
                <p class="text-gray-300 max-w-4xl mx-auto text-lg md:text-xl leading-relaxed">
                    Explore my comprehensive professional background, technical expertise, and career achievements.
                    Available in multiple formats optimized for different use cases and ATS compatibility.
                </p>
            </div>

            <!-- Stats Row -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-3xl mx-auto mb-10" data-aos="fade-up" data-aos-delay="600">
                <div class="text-center">
                    <div class="text-2xl md:text-3xl font-bold text-indigo-400">5+</div>
                    <div class="text-sm text-gray-400 uppercase tracking-wide">Years Experience</div>
                </div>
                <div class="text-center">
                    <div class="text-2xl md:text-3xl font-bold text-purple-400">25+</div>
                    <div class="text-sm text-gray-400 uppercase tracking-wide">Projects Completed</div>
                </div>
                <div class="text-center">
                    <div class="text-2xl md:text-3xl font-bold text-violet-400">10+</div>
                    <div class="text-sm text-gray-400 uppercase tracking-wide">Technologies</div>
                </div>
                <div class="text-center">
                    <div class="text-2xl md:text-3xl font-bold text-indigo-400">3</div>
                    <div class="text-sm text-gray-400 uppercase tracking-wide">Certifications</div>
                </div>
            </div>

            <!-- Decorative Line -->
            <div class="w-40 h-1 bg-gradient-to-r from-violet-500 to-indigo-600 mx-auto mb-8 rounded-full" data-aos="fade-up" data-aos-delay="800"></div>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto" x-data="{ activeTab: 'preview' }" data-aos="fade-up" data-aos-delay="1000">
            <!-- Tab Navigation -->
            <div class="flex justify-center mb-12">
                <div class="bg-slate-800/60 backdrop-blur-lg rounded-2xl p-2 flex shadow-2xl border border-slate-700/50">
                    <button
                        @click="activeTab = 'preview'"
                        :class="activeTab === 'preview' ? 'bg-gradient-to-r from-indigo-600 to-purple-600 text-white shadow-lg' : 'bg-transparent text-gray-400 hover:text-white hover:bg-slate-700/50'"
                        class="py-3 px-6 rounded-xl font-semibold text-sm flex items-center gap-3 transition-all duration-300 relative overflow-hidden group"
                    >
                        <div class="relative z-10 flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <span>Preview Resume</span>
                        </div>
                        <div x-show="activeTab === 'preview'" class="absolute inset-0 bg-gradient-to-r from-indigo-600/20 to-purple-600/20 rounded-xl" x-transition></div>
                    </button>
                    <button
                        @click="activeTab = 'download'"
                        :class="activeTab === 'download' ? 'bg-gradient-to-r from-indigo-600 to-purple-600 text-white shadow-lg' : 'bg-transparent text-gray-400 hover:text-white hover:bg-slate-700/50'"
                        class="py-3 px-6 rounded-xl font-semibold text-sm flex items-center gap-3 transition-all duration-300 relative overflow-hidden group"
                    >
                        <div class="relative z-10 flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                            <span>Download Options</span>
                        </div>
                        <div x-show="activeTab === 'download'" class="absolute inset-0 bg-gradient-to-r from-indigo-600/20 to-purple-600/20 rounded-xl" x-transition></div>
                    </button>
                </div>
            </div>

            <!-- Tab Content -->
            <div class="bg-white/95 dark:bg-slate-800/95 backdrop-blur-lg rounded-3xl shadow-2xl overflow-hidden border border-slate-200/20 dark:border-slate-700/50">
                <!-- Preview Tab Content -->
                <div x-show="activeTab === 'preview'"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 transform scale-95"
                     x-transition:enter-end="opacity-100 transform scale-100"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100 transform scale-100"
                     x-transition:leave-end="opacity-0 transform scale-95"
                     class="h-[75vh] relative">
                    <!-- Loading State -->
                    <div class="absolute inset-0 flex items-center justify-center bg-gradient-to-br from-slate-50 to-slate-100 dark:from-slate-800 dark:to-slate-900">
                        <div class="text-center">
                            <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-indigo-600 mx-auto mb-4"></div>
                            <p class="text-gray-600 dark:text-gray-400">Loading resume preview...</p>
                        </div>
                    </div>

                    <!-- Resume Preview -->
                    <iframe
                        src="/resume-preview"
                        class="w-full h-full relative z-10"
                        frameborder="0"
                        title="Resume Preview"
                        onload="this.previousElementSibling.style.display='none'"
                    ></iframe>

                    <!-- Preview Controls -->
                    <div class="absolute top-4 right-4 z-20 flex gap-2">
                        <button onclick="document.querySelector('iframe').contentWindow.print()"
                                class="bg-white/90 dark:bg-slate-800/90 backdrop-blur-sm p-2 rounded-lg shadow-lg hover:shadow-xl transition-all duration-200 text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                            </svg>
                        </button>
                        <a href="/resume-preview" target="_blank"
                           class="bg-white/90 dark:bg-slate-800/90 backdrop-blur-sm p-2 rounded-lg shadow-lg hover:shadow-xl transition-all duration-200 text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Download Tab Content -->
                <div x-show="activeTab === 'download'"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 transform scale-95"
                     x-transition:enter-end="opacity-100 transform scale-100"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100 transform scale-100"
                     x-transition:leave-end="opacity-0 transform scale-95"
                     class="p-8 md:p-12">
                    <div class="max-w-4xl mx-auto">
                        <!-- Header -->
                        <div class="text-center mb-12">
                            <h3 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white mb-4">
                                Download My Resume
                            </h3>
                            <p class="text-gray-600 dark:text-gray-300 text-lg leading-relaxed max-w-2xl mx-auto">
                                Choose the format that works best for your needs. Each format is optimized for different purposes and use cases.
                            </p>
                        </div>

                        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <!-- PDF Option -->
                            <div class="group relative bg-gradient-to-br from-red-50 to-red-100 dark:from-red-900/10 dark:to-red-800/10 border border-red-200 dark:border-red-800/30 rounded-2xl p-6 hover:shadow-xl hover:shadow-red-500/10 transition-all duration-300 hover:-translate-y-1">
                                <div class="absolute inset-0 bg-gradient-to-br from-red-500/5 to-red-600/5 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                <div class="relative z-10">
                                    <div class="flex items-center justify-between mb-4">
                                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-red-500 to-red-600 flex items-center justify-center text-white shadow-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <span class="text-xs font-semibold text-red-600 dark:text-red-400 bg-red-100 dark:bg-red-900/30 px-2 py-1 rounded-full">RECOMMENDED</span>
                                    </div>
                                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">PDF Format</h3>
                                    <p class="text-gray-600 dark:text-gray-300 mb-6 leading-relaxed">Perfect for job applications, printing, and professional submissions. Maintains formatting across all devices.</p>
                                    <div class="flex items-center justify-between">
                                        <div class="text-sm text-gray-500 dark:text-gray-400">
                                            <span class="flex items-center gap-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                ATS Compatible
                                            </span>
                                        </div>
                                        <a href="{{ route('resume.download', ['format' => 'pdf']) }}"
                                           class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-red-500 to-red-600 text-white font-semibold rounded-xl hover:from-red-600 hover:to-red-700 transition-all duration-200 shadow-lg hover:shadow-xl">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                            </svg>
                                            Download
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- DOCX Option -->
                            <div class="group relative bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900/10 dark:to-blue-800/10 border border-blue-200 dark:border-blue-800/30 rounded-2xl p-6 hover:shadow-xl hover:shadow-blue-500/10 transition-all duration-300 hover:-translate-y-1">
                                <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-blue-600/5 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                <div class="relative z-10">
                                    <div class="flex items-center justify-between mb-4">
                                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center text-white shadow-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </div>
                                        <span class="text-xs font-semibold text-blue-600 dark:text-blue-400 bg-blue-100 dark:bg-blue-900/30 px-2 py-1 rounded-full">EDITABLE</span>
                                    </div>
                                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Word Format</h3>
                                    <p class="text-gray-600 dark:text-gray-300 mb-6 leading-relaxed">Fully editable document for customizing content to match specific job requirements and personal preferences.</p>
                                    <div class="flex items-center justify-between">
                                        <div class="text-sm text-gray-500 dark:text-gray-400">
                                            <span class="flex items-center gap-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                                Customizable
                                            </span>
                                        </div>
                                        <a href="{{ route('resume.download', ['format' => 'docx']) }}"
                                           class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white font-semibold rounded-xl hover:from-blue-600 hover:to-blue-700 transition-all duration-200 shadow-lg hover:shadow-xl">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                            </svg>
                                            Download
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- TXT Option -->
                            <div class="group relative bg-gradient-to-br from-green-50 to-green-100 dark:from-green-900/10 dark:to-green-800/10 border border-green-200 dark:border-green-800/30 rounded-2xl p-6 hover:shadow-xl hover:shadow-green-500/10 transition-all duration-300 hover:-translate-y-1">
                                <div class="absolute inset-0 bg-gradient-to-br from-green-500/5 to-green-600/5 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                <div class="relative z-10">
                                    <div class="flex items-center justify-between mb-4">
                                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-green-500 to-green-600 flex items-center justify-center text-white shadow-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                                            </svg>
                                        </div>
                                        <span class="text-xs font-semibold text-green-600 dark:text-green-400 bg-green-100 dark:bg-green-900/30 px-2 py-1 rounded-full">ATS OPTIMIZED</span>
                                    </div>
                                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Text Format</h3>
                                    <p class="text-gray-600 dark:text-gray-300 mb-6 leading-relaxed">Plain text format optimized for Applicant Tracking Systems (ATS) and automated resume parsing systems.</p>
                                    <div class="flex items-center justify-between">
                                        <div class="text-sm text-gray-500 dark:text-gray-400">
                                            <span class="flex items-center gap-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                                                </svg>
                                                Machine Readable
                                            </span>
                                        </div>
                                        <a href="{{ route('resume.download', ['format' => 'txt']) }}"
                                           class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-green-500 to-green-600 text-white font-semibold rounded-xl hover:from-green-600 hover:to-green-700 transition-all duration-200 shadow-lg hover:shadow-xl">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                            </svg>
                                            Download
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Professional Footer -->
                        <div class="mt-12 text-center">
                            <div class="bg-gradient-to-r from-slate-50 to-slate-100 dark:from-slate-800/50 dark:to-slate-700/50 rounded-2xl p-8 border border-slate-200/50 dark:border-slate-700/50">
                                <div class="flex items-center justify-center gap-3 mb-4">
                                    <div class="w-12 h-12 rounded-full bg-gradient-to-r from-indigo-500 to-purple-600 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <h4 class="text-xl font-bold text-gray-900 dark:text-white">Professional Guarantee</h4>
                                </div>
                                <p class="text-gray-600 dark:text-gray-300 mb-6 max-w-2xl mx-auto leading-relaxed">
                                    All resume formats are professionally crafted, regularly updated, and optimized for both human recruiters and automated tracking systems.
                                </p>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-sm">
                                    <div class="flex items-center justify-center gap-2 text-gray-600 dark:text-gray-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        ATS Optimized
                                    </div>
                                    <div class="flex items-center justify-center gap-2 text-gray-600 dark:text-gray-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        Print Ready
                                    </div>
                                    <div class="flex items-center justify-center gap-2 text-gray-600 dark:text-gray-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        Mobile Friendly
                                    </div>
                                    <div class="flex items-center justify-center gap-2 text-gray-600 dark:text-gray-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        Updated Monthly
                                    </div>
                                </div>
                            </div>
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
