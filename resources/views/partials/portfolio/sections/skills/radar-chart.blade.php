<!-- Skills Overview with Interactive Radar Chart -->
<div class="max-w-4xl mx-auto mb-16 blackboard-container">
    <!-- Blackboard Effect Container -->
    <div class="relative p-8 rounded-xl bg-slate-800/60 backdrop-blur-sm border border-slate-700/50 shadow-xl overflow-hidden">
        <!-- Chalk Marks -->
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute top-2 left-5 w-20 h-1 bg-white/10 rounded-full transform rotate-12"></div>
            <div class="absolute bottom-4 right-10 w-16 h-1 bg-white/10 rounded-full transform -rotate-6"></div>
            <div class="absolute top-1/3 right-1/4 w-10 h-10 border-2 border-white/5 rounded-full"></div>
            <div class="absolute bottom-1/4 left-1/3 w-6 h-6 border border-white/5 rounded-full"></div>
        </div>
        
        <!-- Skill Radar Chart -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 relative z-10">
            <div class="skill-overview-card" 
                x-show="titleVisible" 
                x-transition:enter="transition ease-out duration-500 delay-300"
                x-transition:enter-start="opacity-0 transform scale-95"
                x-transition:enter-end="opacity-100 transform scale-100">
                <div class="relative w-32 h-32 mx-auto">
                    <svg class="w-32 h-32 transform -rotate-90" viewBox="0 0 100 100">
                        <circle class="text-slate-700" stroke-width="8" stroke="currentColor" fill="transparent" r="42" cx="50" cy="50"/>
                        <circle class="text-indigo-500 progress-ring" stroke-width="8" stroke="currentColor" fill="transparent" r="42" cx="50" cy="50" stroke-dasharray="264" stroke-dashoffset="53"/>
                    </svg>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="text-center">
                            <span class="text-3xl font-bold text-white chalk-text">80%</span>
                            <p class="text-sm text-gray-400 mt-1 chalk-text-sm">Frontend</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="skill-overview-card"
                x-show="titleVisible" 
                x-transition:enter="transition ease-out duration-500 delay-400"
                x-transition:enter-start="opacity-0 transform scale-95"
                x-transition:enter-end="opacity-100 transform scale-100">
                <div class="relative w-32 h-32 mx-auto">
                    <svg class="w-32 h-32 transform -rotate-90" viewBox="0 0 100 100">
                        <circle class="text-slate-700" stroke-width="8" stroke="currentColor" fill="transparent" r="42" cx="50" cy="50"/>
                        <circle class="text-purple-500 progress-ring" stroke-width="8" stroke="currentColor" fill="transparent" r="42" cx="50" cy="50" stroke-dasharray="264" stroke-dashoffset="66"/>
                    </svg>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="text-center">
                            <span class="text-3xl font-bold text-white chalk-text">75%</span>
                            <p class="text-sm text-gray-400 mt-1 chalk-text-sm">Backend</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="skill-overview-card"
                x-show="titleVisible" 
                x-transition:enter="transition ease-out duration-500 delay-500"
                x-transition:enter-start="opacity-0 transform scale-95"
                x-transition:enter-end="opacity-100 transform scale-100">
                <div class="relative w-32 h-32 mx-auto">
                    <svg class="w-32 h-32 transform -rotate-90" viewBox="0 0 100 100">
                        <circle class="text-slate-700" stroke-width="8" stroke="currentColor" fill="transparent" r="42" cx="50" cy="50"/>
                        <circle class="text-blue-500 progress-ring" stroke-width="8" stroke="currentColor" fill="transparent" r="42" cx="50" cy="50" stroke-dasharray="264" stroke-dashoffset="40"/>
                    </svg>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="text-center">
                            <span class="text-3xl font-bold text-white chalk-text">85%</span>
                            <p class="text-sm text-gray-400 mt-1 chalk-text-sm">Design</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="skill-overview-card"
                x-show="titleVisible" 
                x-transition:enter="transition ease-out duration-500 delay-600"
                x-transition:enter-start="opacity-0 transform scale-95"
                x-transition:enter-end="opacity-100 transform scale-100">
                <div class="relative w-32 h-32 mx-auto">
                    <svg class="w-32 h-32 transform -rotate-90" viewBox="0 0 100 100">
                        <circle class="text-slate-700" stroke-width="8" stroke="currentColor" fill="transparent" r="42" cx="50" cy="50"/>
                        <circle class="text-teal-500 progress-ring" stroke-width="8" stroke="currentColor" fill="transparent" r="42" cx="50" cy="50" stroke-dasharray="264" stroke-dashoffset="79"/>
                    </svg>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="text-center">
                            <span class="text-3xl font-bold text-white chalk-text">70%</span>
                            <p class="text-sm text-gray-400 mt-1 chalk-text-sm">DevOps</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Interactive Skill Filter -->
        <div class="flex flex-wrap justify-center mt-8 gap-3"
            x-show="titleVisible" 
            x-transition:enter="transition ease-out duration-500 delay-700"
            x-transition:enter-start="opacity-0 transform translate-y-5"
            x-transition:enter-end="opacity-100 transform translate-y-0">
            <button class="px-4 py-2 rounded-full bg-slate-700/50 text-white hover:bg-indigo-600 transition-all duration-300 chalk-btn active"
                    @click="activeCategory = null"
                    :class="{'bg-indigo-600': activeCategory === null}">
                All Skills
            </button>
            <button class="px-4 py-2 rounded-full bg-slate-700/50 text-white hover:bg-indigo-600 transition-all duration-300 chalk-btn"
                    @click="activeCategory = 'frontend'"
                    :class="{'bg-indigo-600': activeCategory === 'frontend'}">
                Frontend
            </button>
            <button class="px-4 py-2 rounded-full bg-slate-700/50 text-white hover:bg-indigo-600 transition-all duration-300 chalk-btn"
                    @click="activeCategory = 'backend'"
                    :class="{'bg-indigo-600': activeCategory === 'backend'}">
                Backend
            </button>
            <button class="px-4 py-2 rounded-full bg-slate-700/50 text-white hover:bg-indigo-600 transition-all duration-300 chalk-btn"
                    @click="activeCategory = 'tools'"
                    :class="{'bg-indigo-600': activeCategory === 'tools'}">
                Tools & Others
            </button>
        </div>
    </div>
</div>
