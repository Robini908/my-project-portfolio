<!-- Downloadable Skill Resume Section -->
<div class="max-w-4xl mx-auto mt-16 mb-8 px-4">
    <div class="bg-slate-800/50 backdrop-blur-sm rounded-xl border border-slate-700/50 p-6 md:p-8 skill-resume-container">
        <div class="flex flex-col md:flex-row items-center justify-between gap-6">
            <div>
                <h3 class="text-xl md:text-2xl font-semibold text-white mb-2 chalk-text">Download My Skill Resume</h3>
                <p class="text-gray-400 chalk-text-sm">Get a detailed PDF with all my skills, experience, and proficiency levels</p>
            </div>
            <div class="flex gap-4">
                <a href="#" class="inline-flex items-center px-6 py-3 rounded-lg bg-indigo-600 hover:bg-indigo-700 text-white font-medium transition-all duration-300 transform hover:scale-105">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Download PDF
                </a>
                <button 
                    class="inline-flex items-center px-6 py-3 rounded-lg bg-slate-700 hover:bg-slate-600 text-white font-medium transition-all duration-300 transform hover:scale-105"
                    @click="showSkillTimeline = !showSkillTimeline">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    <span x-text="showSkillTimeline ? 'Hide Timeline' : 'View Timeline'"></span>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Skill Timeline Section -->
<div class="max-w-4xl mx-auto mb-16 px-4 skill-timeline-container"
     x-show="showSkillTimeline"
     x-transition:enter="transition ease-out duration-500"
     x-transition:enter-start="opacity-0 transform translate-y-4"
     x-transition:enter-end="opacity-100 transform translate-y-0"
     x-transition:leave="transition ease-in duration-300"
     x-transition:leave-start="opacity-100 transform translate-y-0"
     x-transition:leave-end="opacity-0 transform translate-y-4">
    
    <div class="bg-slate-800/50 backdrop-blur-sm rounded-xl border border-slate-700/50 p-6 md:p-8">
        <h3 class="text-xl md:text-2xl font-semibold text-white mb-6 chalk-text text-center">My Skill Journey Timeline</h3>
        
        <!-- Timeline -->
        <div class="relative">
            <!-- Timeline Line -->
            <div class="absolute left-0 md:left-1/2 top-0 bottom-0 w-1 bg-indigo-500/30 transform md:translate-x-0 translate-x-4"></div>
            
            <!-- Timeline Items -->
            <div class="space-y-12">
                <!-- 2023 -->
                <div class="relative flex flex-col md:flex-row items-start md:justify-between">
                    <div class="flex items-center mb-4 md:mb-0 md:w-1/2 md:justify-end md:pr-8">
                        <div class="bg-slate-900 p-4 rounded-lg border border-indigo-500/30 timeline-card md:text-right">
                            <h4 class="text-lg font-semibold text-white mb-2">2023</h4>
                            <p class="text-gray-400 mb-3">Advanced Full-Stack Development</p>
                            <ul class="space-y-2 text-sm">
                                <li class="text-indigo-400">Mastered Next.js and React Server Components</li>
                                <li class="text-indigo-400">Advanced TypeScript patterns and practices</li>
                                <li class="text-indigo-400">Microservices architecture with Docker</li>
                            </ul>
                        </div>
                    </div>
                    <div class="absolute left-4 md:left-1/2 top-4 w-4 h-4 rounded-full bg-indigo-500 border-4 border-slate-900 transform md:translate-x-0 translate-x-0 md:-translate-x-2 timeline-dot"></div>
                    <div class="md:w-1/2 md:pl-8 pl-12"></div>
                </div>
                
                <!-- 2021 -->
                <div class="relative flex flex-col md:flex-row items-start md:justify-between">
                    <div class="md:w-1/2 md:pr-8 hidden md:block"></div>
                    <div class="absolute left-4 md:left-1/2 top-4 w-4 h-4 rounded-full bg-purple-500 border-4 border-slate-900 transform md:translate-x-0 translate-x-0 md:-translate-x-2 timeline-dot"></div>
                    <div class="flex items-center mb-4 md:mb-0 md:w-1/2 md:pl-8 pl-12">
                        <div class="bg-slate-900 p-4 rounded-lg border border-purple-500/30 timeline-card">
                            <h4 class="text-lg font-semibold text-white mb-2">2021</h4>
                            <p class="text-gray-400 mb-3">Backend & DevOps Focus</p>
                            <ul class="space-y-2 text-sm">
                                <li class="text-purple-400">Laravel advanced features and packages</li>
                                <li class="text-purple-400">CI/CD pipelines with GitHub Actions</li>
                                <li class="text-purple-400">Cloud deployment with AWS</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <!-- 2019 -->
                <div class="relative flex flex-col md:flex-row items-start md:justify-between">
                    <div class="flex items-center mb-4 md:mb-0 md:w-1/2 md:justify-end md:pr-8">
                        <div class="bg-slate-900 p-4 rounded-lg border border-blue-500/30 timeline-card md:text-right">
                            <h4 class="text-lg font-semibold text-white mb-2">2019</h4>
                            <p class="text-gray-400 mb-3">Frontend Development</p>
                            <ul class="space-y-2 text-sm">
                                <li class="text-blue-400">React.js and Vue.js frameworks</li>
                                <li class="text-blue-400">Modern CSS with Tailwind</li>
                                <li class="text-blue-400">JavaScript ES6+ and TypeScript</li>
                            </ul>
                        </div>
                    </div>
                    <div class="absolute left-4 md:left-1/2 top-4 w-4 h-4 rounded-full bg-blue-500 border-4 border-slate-900 transform md:translate-x-0 translate-x-0 md:-translate-x-2 timeline-dot"></div>
                    <div class="md:w-1/2 md:pl-8 pl-12"></div>
                </div>
                
                <!-- 2017 -->
                <div class="relative flex flex-col md:flex-row items-start md:justify-between">
                    <div class="md:w-1/2 md:pr-8 hidden md:block"></div>
                    <div class="absolute left-4 md:left-1/2 top-4 w-4 h-4 rounded-full bg-green-500 border-4 border-slate-900 transform md:translate-x-0 translate-x-0 md:-translate-x-2 timeline-dot"></div>
                    <div class="flex items-center mb-4 md:mb-0 md:w-1/2 md:pl-8 pl-12">
                        <div class="bg-slate-900 p-4 rounded-lg border border-green-500/30 timeline-card">
                            <h4 class="text-lg font-semibold text-white mb-2">2017</h4>
                            <p class="text-gray-400 mb-3">Web Development Foundations</p>
                            <ul class="space-y-2 text-sm">
                                <li class="text-green-400">HTML5, CSS3, JavaScript fundamentals</li>
                                <li class="text-green-400">PHP and MySQL basics</li>
                                <li class="text-green-400">Responsive design principles</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .timeline-card {
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    
    .timeline-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
    }
    
    .timeline-dot {
        transition: all 0.3s ease;
        z-index: 10;
    }
    
    .timeline-dot:hover {
        transform: scale(1.5) translate(-33%, 0);
    }
    
    @media (min-width: 768px) {
        .timeline-dot:hover {
            transform: scale(1.5) translate(-33%, 0);
        }
    }
    
    .skill-resume-container {
        transition: all 0.3s ease;
    }
    
    .skill-resume-container:hover {
        box-shadow: 0 0 20px rgba(99, 102, 241, 0.2);
    }
</style>
