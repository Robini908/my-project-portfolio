<!-- Skill Comparison Component -->
<div class="max-w-4xl mx-auto mb-16 skill-comparison-container"
     x-show="activeFilter === 'compare'"
     x-transition:enter="transition ease-out duration-500"
     x-transition:enter-start="opacity-0 transform translate-y-4"
     x-transition:enter-end="opacity-100 transform translate-y-0"
     x-transition:leave="transition ease-in duration-300"
     x-transition:leave-start="opacity-100 transform translate-y-0"
     x-transition:leave-end="opacity-0 transform translate-y-4">
    
    <!-- Comparison Header -->
    <div class="text-center mb-8">
        <h3 class="text-xl md:text-2xl font-semibold text-white mb-2 chalk-text">Skill Comparison</h3>
        <p class="text-gray-400 chalk-text-sm">Select skills to compare their proficiency levels</p>
    </div>
    
    <!-- Skill Selection -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-10">
        <!-- First Skill Selection -->
        <div class="bg-slate-800/50 backdrop-blur-sm rounded-xl border border-slate-700/50 p-6 comparison-card">
            <h4 class="text-lg font-medium text-white mb-4 chalk-text">First Skill</h4>
            <div class="relative">
                <select x-model="comparisonSkill1" class="w-full bg-slate-900/80 text-white border border-slate-700 rounded-lg py-3 px-4 appearance-none focus:outline-none focus:ring-2 focus:ring-indigo-500/50">
                    <option value="">Select a skill</option>
                    <template x-for="skill in allSkills" :key="skill.name">
                        <option :value="skill.name" x-text="skill.name"></option>
                    </template>
                </select>
                <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
            </div>
            
            <!-- Selected Skill Display -->
            <div class="mt-6" x-show="comparisonSkill1 !== ''">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-white font-medium" x-text="comparisonSkill1"></span>
                    <span class="text-indigo-400 font-semibold" x-text="getSkillProficiency(comparisonSkill1) + '%'"></span>
                </div>
                <div class="w-full bg-slate-700/50 rounded-full h-2.5 mb-4 overflow-hidden">
                    <div class="bg-indigo-500 h-2.5 rounded-full transition-all duration-1000 ease-out"
                         :style="'width: ' + getSkillProficiency(comparisonSkill1) + '%'"></div>
                </div>
                <div class="text-sm text-gray-400 mt-2" x-text="getSkillDescription(comparisonSkill1)"></div>
            </div>
        </div>
        
        <!-- Second Skill Selection -->
        <div class="bg-slate-800/50 backdrop-blur-sm rounded-xl border border-slate-700/50 p-6 comparison-card">
            <h4 class="text-lg font-medium text-white mb-4 chalk-text">Second Skill</h4>
            <div class="relative">
                <select x-model="comparisonSkill2" class="w-full bg-slate-900/80 text-white border border-slate-700 rounded-lg py-3 px-4 appearance-none focus:outline-none focus:ring-2 focus:ring-indigo-500/50">
                    <option value="">Select a skill</option>
                    <template x-for="skill in allSkills" :key="skill.name">
                        <option :value="skill.name" x-text="skill.name"></option>
                    </template>
                </select>
                <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
            </div>
            
            <!-- Selected Skill Display -->
            <div class="mt-6" x-show="comparisonSkill2 !== ''">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-white font-medium" x-text="comparisonSkill2"></span>
                    <span class="text-purple-400 font-semibold" x-text="getSkillProficiency(comparisonSkill2) + '%'"></span>
                </div>
                <div class="w-full bg-slate-700/50 rounded-full h-2.5 mb-4 overflow-hidden">
                    <div class="bg-purple-500 h-2.5 rounded-full transition-all duration-1000 ease-out"
                         :style="'width: ' + getSkillProficiency(comparisonSkill2) + '%'"></div>
                </div>
                <div class="text-sm text-gray-400 mt-2" x-text="getSkillDescription(comparisonSkill2)"></div>
            </div>
        </div>
    </div>
    
    <!-- Comparison Chart -->
    <div class="bg-slate-800/50 backdrop-blur-sm rounded-xl border border-slate-700/50 p-6 comparison-chart-container"
         x-show="comparisonSkill1 !== '' && comparisonSkill2 !== ''">
        <h4 class="text-lg font-medium text-white mb-6 text-center chalk-text">Skill Comparison Chart</h4>
        
        <!-- Proficiency Comparison -->
        <div class="mb-8">
            <h5 class="text-sm font-medium text-gray-400 mb-4">Proficiency Level</h5>
            <div class="relative pt-1">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-xs font-semibold inline-block text-indigo-400" x-text="comparisonSkill1"></span>
                    <span class="text-xs font-semibold inline-block text-purple-400" x-text="comparisonSkill2"></span>
                </div>
                <div class="overflow-hidden h-6 mb-4 text-xs flex rounded-full bg-slate-700/50">
                    <div class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-indigo-500 transition-all duration-1000 ease-out"
                         :style="'width: ' + getSkillProficiency(comparisonSkill1) + '%'">
                        <span class="font-bold text-xs" x-text="getSkillProficiency(comparisonSkill1) + '%'"></span>
                    </div>
                </div>
                <div class="overflow-hidden h-6 mb-4 text-xs flex rounded-full bg-slate-700/50">
                    <div class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-purple-500 transition-all duration-1000 ease-out"
                         :style="'width: ' + getSkillProficiency(comparisonSkill2) + '%'">
                        <span class="font-bold text-xs" x-text="getSkillProficiency(comparisonSkill2) + '%'"></span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Experience Comparison -->
        <div class="mb-8">
            <h5 class="text-sm font-medium text-gray-400 mb-4">Years of Experience</h5>
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-slate-900/50 rounded-lg p-4 border border-indigo-500/20">
                    <div class="text-center">
                        <span class="text-3xl font-bold text-indigo-400" x-text="getSkillExperience(comparisonSkill1)"></span>
                        <span class="text-gray-400 text-sm block mt-1" x-text="comparisonSkill1"></span>
                    </div>
                </div>
                <div class="bg-slate-900/50 rounded-lg p-4 border border-purple-500/20">
                    <div class="text-center">
                        <span class="text-3xl font-bold text-purple-400" x-text="getSkillExperience(comparisonSkill2)"></span>
                        <span class="text-gray-400 text-sm block mt-1" x-text="comparisonSkill2"></span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Skill Attributes Comparison -->
        <div>
            <h5 class="text-sm font-medium text-gray-400 mb-4">Skill Attributes</h5>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-slate-900/50 rounded-lg p-4 border border-indigo-500/20">
                    <h6 class="text-white font-medium mb-3" x-text="comparisonSkill1"></h6>
                    <ul class="space-y-2">
                        <template x-for="(attribute, index) in getSkillAttributes(comparisonSkill1)" :key="index">
                            <li class="flex items-center text-sm">
                                <svg class="w-4 h-4 text-indigo-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-gray-300" x-text="attribute"></span>
                            </li>
                        </template>
                    </ul>
                </div>
                <div class="bg-slate-900/50 rounded-lg p-4 border border-purple-500/20">
                    <h6 class="text-white font-medium mb-3" x-text="comparisonSkill2"></h6>
                    <ul class="space-y-2">
                        <template x-for="(attribute, index) in getSkillAttributes(comparisonSkill2)" :key="index">
                            <li class="flex items-center text-sm">
                                <svg class="w-4 h-4 text-purple-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-gray-300" x-text="attribute"></span>
                            </li>
                        </template>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .comparison-card {
        transition: all 0.3s ease;
    }
    
    .comparison-card:hover {
        box-shadow: 0 0 20px rgba(99, 102, 241, 0.2);
        transform: translateY(-5px);
    }
    
    .comparison-chart-container {
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
    }
</style>
