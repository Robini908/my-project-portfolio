<!-- Frontend Skills Card -->
<div class="skill-card group"
     data-category="frontend"
     x-show="activeCategory === null || activeCategory === 'frontend'"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 transform scale-95"
     x-transition:enter-end="opacity-100 transform scale-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100 transform scale-100"
     x-transition:leave-end="opacity-0 transform scale-95">

    <div class="relative overflow-hidden rounded-xl h-full">
        <!-- Card Background with Code Snippet -->
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-gradient-to-br from-slate-800/90 via-slate-800/80 to-indigo-900/70 backdrop-blur-sm z-10"></div>
            <pre class="text-[0.5rem] text-indigo-300/20 font-mono leading-tight p-4 overflow-hidden absolute inset-0">
&lt;div class="frontend-skills"&gt;
  const frontendSkills = [
    { name: 'HTML5', level: 90 },
    { name: 'CSS3', level: 85 },
    { name: 'JavaScript', level: 88 },
    { name: 'React', level: 82 },
    { name: 'Vue.js', level: 78 },
    { name: 'Tailwind CSS', level: 90 }
  ];

  function renderSkills() {
    return frontendSkills.map(skill => (
      &lt;div class="skill-item"&gt;
        &lt;div class="skill-name"&gt;{skill.name}&lt;/div&gt;
        &lt;div class="skill-bar"&gt;
          &lt;div
            class="skill-progress"
            style="width: calc(var(--skill-level) * 1%)"
          &gt;&lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    ));
  }
&lt;/div&gt;
            </pre>
        </div>

        <!-- Card Content -->
        <div class="relative p-6 z-20 h-full flex flex-col">
            <!-- Icon -->
            <div class="mb-6">
                <div class="w-16 h-16 bg-indigo-500/20 rounded-xl flex items-center justify-center transform group-hover:scale-110 transition-transform duration-300 border border-indigo-500/30">
                    <svg class="w-8 h-8 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
            </div>

            <!-- Title with Typing Effect -->
            <h3 class="text-xl font-semibold mb-3 group-hover:text-gradient transition-colors duration-300 chalk-text-lg">
                Frontend Development
            </h3>

            <!-- Description -->
            <p class="text-gray-400 mb-6 group-hover:text-gray-300 transition-colors duration-300 chalk-text-sm">
                Creating responsive and interactive user interfaces with modern technologies.
            </p>

            <!-- Skills Grid with Logos -->
            <div class="grid grid-cols-3 gap-4 mt-auto">
                <!-- Static Skill Icons for Frontend -->
                <div class="relative group/skill" @mouseenter="setHoveredSkill('HTML5')" @mouseleave="clearHoveredSkill()">
                    <div class="w-12 h-12 bg-slate-800/80 rounded-lg flex items-center justify-center transform transition-transform duration-300 group-hover/skill:scale-110 border border-slate-700/50 group-hover/skill:border-indigo-500/50">
                        <img src="/images/skills/html5.svg" alt="HTML5" class="w-6 h-6 transition-all duration-300 group-hover/skill:w-7 group-hover/skill:h-7">
                    </div>
                    <div class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 px-2 py-1 bg-slate-800 text-white text-xs rounded opacity-0 group-hover/skill:opacity-100 transition-opacity duration-300 whitespace-nowrap border border-indigo-500/30">
                        HTML5
                    </div>
                </div>

                <div class="relative group/skill" @mouseenter="setHoveredSkill('CSS3')" @mouseleave="clearHoveredSkill()">
                    <div class="w-12 h-12 bg-slate-800/80 rounded-lg flex items-center justify-center transform transition-transform duration-300 group-hover/skill:scale-110 border border-slate-700/50 group-hover/skill:border-indigo-500/50">
                        <img src="/images/skills/css3.svg" alt="CSS3" class="w-6 h-6 transition-all duration-300 group-hover/skill:w-7 group-hover/skill:h-7">
                    </div>
                    <div class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 px-2 py-1 bg-slate-800 text-white text-xs rounded opacity-0 group-hover/skill:opacity-100 transition-opacity duration-300 whitespace-nowrap border border-indigo-500/30">
                        CSS3
                    </div>
                </div>

                <div class="relative group/skill" @mouseenter="setHoveredSkill('JavaScript')" @mouseleave="clearHoveredSkill()">
                    <div class="w-12 h-12 bg-slate-800/80 rounded-lg flex items-center justify-center transform transition-transform duration-300 group-hover/skill:scale-110 border border-slate-700/50 group-hover/skill:border-indigo-500/50">
                        <img src="/images/skills/javascript.svg" alt="JavaScript" class="w-6 h-6 transition-all duration-300 group-hover/skill:w-7 group-hover/skill:h-7">
                    </div>
                    <div class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 px-2 py-1 bg-slate-800 text-white text-xs rounded opacity-0 group-hover/skill:opacity-100 transition-opacity duration-300 whitespace-nowrap border border-indigo-500/30">
                        JavaScript
                    </div>
                </div>

                <div class="relative group/skill" @mouseenter="setHoveredSkill('React')" @mouseleave="clearHoveredSkill()">
                    <div class="w-12 h-12 bg-slate-800/80 rounded-lg flex items-center justify-center transform transition-transform duration-300 group-hover/skill:scale-110 border border-slate-700/50 group-hover/skill:border-indigo-500/50">
                        <img src="/images/skills/react.svg" alt="React" class="w-6 h-6 transition-all duration-300 group-hover/skill:w-7 group-hover/skill:h-7">
                    </div>
                    <div class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 px-2 py-1 bg-slate-800 text-white text-xs rounded opacity-0 group-hover/skill:opacity-100 transition-opacity duration-300 whitespace-nowrap border border-indigo-500/30">
                        React
                    </div>
                </div>

                <div class="relative group/skill" @mouseenter="setHoveredSkill('Vue.js')" @mouseleave="clearHoveredSkill()">
                    <div class="w-12 h-12 bg-slate-800/80 rounded-lg flex items-center justify-center transform transition-transform duration-300 group-hover/skill:scale-110 border border-slate-700/50 group-hover/skill:border-indigo-500/50">
                        <img src="/images/skills/vue.svg" alt="Vue.js" class="w-6 h-6 transition-all duration-300 group-hover/skill:w-7 group-hover/skill:h-7">
                    </div>
                    <div class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 px-2 py-1 bg-slate-800 text-white text-xs rounded opacity-0 group-hover/skill:opacity-100 transition-opacity duration-300 whitespace-nowrap border border-indigo-500/30">
                        Vue.js
                    </div>
                </div>

                <div class="relative group/skill" @mouseenter="setHoveredSkill('Tailwind')" @mouseleave="clearHoveredSkill()">
                    <div class="w-12 h-12 bg-slate-800/80 rounded-lg flex items-center justify-center transform transition-transform duration-300 group-hover/skill:scale-110 border border-slate-700/50 group-hover/skill:border-indigo-500/50">
                        <img src="/images/skills/tailwind.svg" alt="Tailwind" class="w-6 h-6 transition-all duration-300 group-hover/skill:w-7 group-hover/skill:h-7">
                    </div>
                    <div class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 px-2 py-1 bg-slate-800 text-white text-xs rounded opacity-0 group-hover/skill:opacity-100 transition-opacity duration-300 whitespace-nowrap border border-indigo-500/30">
                        Tailwind
                    </div>
                </div>
            </div>
        </div>

        <!-- Interactive Hover Effects -->
        <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/0 via-indigo-500/0 to-indigo-500/0 group-hover:from-indigo-500/10 group-hover:via-indigo-500/5 group-hover:to-indigo-500/10 transition-all duration-500 z-10"></div>

        <!-- Glowing Border Effect -->
        <div class="absolute inset-0 rounded-xl border border-indigo-500/0 group-hover:border-indigo-500/50 transition-all duration-500 z-10 glow-border-indigo"></div>
    </div>
</div>
