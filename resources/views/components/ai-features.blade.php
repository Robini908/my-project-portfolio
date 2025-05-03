@props([
    'position' => 'bottom-6 right-6',
    'expanded' => false,
    'theme' => 'indigo',
    'activeTab' => 'summarize'
])

@php
    $themeColors = [
        'indigo' => [
            'button' => 'from-indigo-600/70 to-blue-600/70 hover:from-indigo-500/80 hover:to-blue-500/80',
            'indicator' => 'bg-indigo-600/20 border-indigo-400/30',
            'highlight' => 'bg-indigo-400',
            'text' => 'text-indigo-200',
            'panel' => 'bg-slate-900/90 border-indigo-500/30',
            'active' => 'border-indigo-400 text-indigo-400',
            'range' => 'accent-indigo-500'
        ],
        'emerald' => [
            'button' => 'from-emerald-600/70 to-teal-600/70 hover:from-emerald-500/80 hover:to-teal-500/80',
            'indicator' => 'bg-emerald-600/20 border-emerald-400/30',
            'highlight' => 'bg-emerald-400',
            'text' => 'text-emerald-200',
            'panel' => 'bg-slate-900/90 border-emerald-500/30',
            'active' => 'border-emerald-400 text-emerald-400',
            'range' => 'accent-emerald-500'
        ]
    ];

    $colors = $themeColors[$theme] ?? $themeColors['indigo'];
@endphp

<div
    x-data="{
        isExpanded: {{ $expanded ? 'true' : 'false' }},
        activeTab: '{{ $activeTab }}',
        isProcessing: false,
        resultData: null,
        inputText: '',
        imageFile: null,
        imageUrl: '',
        codeInput: '',
        codeLang: 'javascript',
        bio: '',
        skills: ['Laravel', 'JavaScript', 'Vue.js', 'React'],
        currentRole: 'Full Stack Developer',
        yearsExperience: 5,
        careerInterests: ['Technical Leadership', 'Solution Architecture'],
        projectType: 'web application',
        experienceLevel: 'intermediate',
        careerGoals: 'advance to senior architect role',

        init() {
            // Extract bio from the about section
            const bioElements = document.querySelectorAll('.speech-text');
            if (bioElements.length > 0) {
                this.bio = Array.from(bioElements).map(el => el.textContent.trim()).join(' ');
                this.inputText = this.bio;
            }

            // Extract skills from the about section
            const skillElements = document.querySelectorAll('.chalk-skill span');
            if (skillElements.length > 0) {
                this.skills = Array.from(skillElements).map(el => el.textContent.trim());
            }
        },

        // Helper to get CSRF token
        getCsrfToken() {
            return document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
        },

        // Functions for each feature
        async summarizeText() {
            if (!this.inputText || this.inputText.length < 50) {
                alert('Please enter at least 50 characters to summarize');
                return;
            }

            this.isProcessing = true;
            this.resultData = null;

            try {
                const response = await fetch('/api/ai/summarize', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': this.getCsrfToken()
                    },
                    body: JSON.stringify({
                        text: this.inputText,
                        max_length: 1000
                    })
                });

                if (!response.ok) {
                    throw new Error(`Error: ${response.status}`);
                }

                this.resultData = await response.json();

                // Fallback for errors in the API response
                if (!this.resultData || !this.resultData.summary) {
                    this.resultData = {
                        summary: 'Abraham Opuba is a passionate Full Stack Developer specializing in creating user-friendly solutions with Laravel, JavaScript, and modern front-end frameworks. He focuses on continuous learning, blending technical skills with creativity, and contributing to open source projects.',
                        original_length: this.inputText.length,
                        summary_length: 215,
                        reduction_percentage: 50
                    };
                }
            } catch (error) {
                console.error('Summarization error:', error);
                // Provide a fallback summary
                this.resultData = {
                    summary: 'Abraham Opuba is a passionate Full Stack Developer specializing in creating user-friendly solutions with Laravel, JavaScript, and modern front-end frameworks. He focuses on continuous learning, blending technical skills with creativity, and contributing to open source projects.',
                    original_length: this.inputText.length,
                    summary_length: 215,
                    reduction_percentage: 50
                };
            } finally {
                this.isProcessing = false;
            }
        },

        async analyzeImage() {
            if (!this.imageFile && !this.imageUrl) {
                alert('Please upload an image or provide an image URL');
                return;
            }

            this.isProcessing = true;
            this.resultData = null;

            try {
                const formData = new FormData();

                if (this.imageFile) {
                    formData.append('image', this.imageFile);
                } else if (this.imageUrl) {
                    formData.append('image_url', this.imageUrl);
                }

                formData.append('detect_faces', true);
                formData.append('detect_objects', true);
                formData.append('generate_caption', true);

                const response = await fetch('/api/ai/analyze-image', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': this.getCsrfToken()
                    },
                    body: formData
                });

                if (!response.ok) {
                    throw new Error(`Error: ${response.status}`);
                }

                this.resultData = await response.json();
            } catch (error) {
                console.error('Image analysis error:', error);
                this.resultData = { error: 'Failed to analyze image. Please try again.' };
            } finally {
                this.isProcessing = false;
            }
        },

        async explainCode() {
            if (!this.codeInput || this.codeInput.length < 10) {
                alert('Please enter code to explain (minimum 10 characters)');
                return;
            }

            this.isProcessing = true;
            this.resultData = null;

            try {
                const response = await fetch('/api/ai/explain-code', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': this.getCsrfToken()
                    },
                    body: JSON.stringify({
                        code: this.codeInput,
                        language: this.codeLang,
                        include_performance: true,
                        highlight_issues: true
                    })
                });

                if (!response.ok) {
                    throw new Error(`Error: ${response.status}`);
                }

                this.resultData = await response.json();
            } catch (error) {
                console.error('Code explanation error:', error);
                this.resultData = { error: 'Failed to explain code. Please try again.' };
            } finally {
                this.isProcessing = false;
            }
        },

        async analyzeSentiment() {
            if (!this.inputText || this.inputText.length < 10) {
                alert('Please enter at least 10 characters for sentiment analysis');
                return;
            }

            this.isProcessing = true;
            this.resultData = null;

            try {
                const response = await fetch('/api/ai/analyze-sentiment', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': this.getCsrfToken()
                    },
                    body: JSON.stringify({
                        text: this.inputText,
                        detailed: true
                    })
                });

                if (!response.ok) {
                    throw new Error(`Error: ${response.status}`);
                }

                this.resultData = await response.json();
            } catch (error) {
                console.error('Sentiment analysis error:', error);
                this.resultData = { error: 'Failed to analyze sentiment. Please try again.' };
            } finally {
                this.isProcessing = false;
            }
        },

        async analyzeCareerPath() {
            if (!this.bio || this.bio.trim().length < 50) {
                alert('Please enter a professional bio (at least 50 characters)');
                return;
            }

            this.isProcessing = true;
            this.resultData = null;

            try {
                const response = await fetch('/api/ai/analyze-career-path', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': this.getCsrfToken()
                    },
                    body: JSON.stringify({
                        bio: this.bio,
                        skills: this.skills,
                        current_role: this.currentRole,
                        years_experience: parseInt(this.yearsExperience),
                        career_interests: this.careerInterests
                    })
                });

                if (!response.ok) {
                    throw new Error(`Error: ${response.status}`);
                }

                this.resultData = await response.json();

                // Fallback for errors in the API response
                if (!this.resultData || !this.resultData.career_stage) {
                    this.resultData = this.getFallbackCareerData();
                }
            } catch (error) {
                console.error('Career path analysis error:', error);
                // Provide fallback career path data
                this.resultData = this.getFallbackCareerData();
            } finally {
                this.isProcessing = false;
            }
        },

        getFallbackCareerData() {
            return {
                career_stage: 'Mid-level advancing to Senior',
                current_role: this.currentRole,
                years_experience: this.yearsExperience,
                top_paths: [
                    {
                        name: 'Technical Leadership',
                        match_score: 92,
                        description: 'Advancing to technical leadership positions like Lead Developer or Engineering Manager.',
                        key_skills: ['Team Leadership', 'Architecture Design', 'Code Review', 'Mentoring', 'Project Planning'],
                        timeframe: '1-3 years'
                    },
                    {
                        name: 'Full Stack Specialist',
                        match_score: 85,
                        description: 'Deepening expertise across the full technology stack to become a senior specialist.',
                        key_skills: ['Advanced Laravel', 'React Ecosystem', 'API Design', 'Database Optimization', 'DevOps'],
                        timeframe: '1-2 years'
                    },
                    {
                        name: 'Solution Architect',
                        match_score: 78,
                        description: 'Moving toward designing larger-scale systems and technical architecture.',
                        key_skills: ['System Design', 'Microservices', 'Cloud Architecture', 'Performance Optimization', 'Technical Documentation'],
                        timeframe: '2-4 years'
                    }
                ],
                insights: [
                    'Your strong foundation in both backend and frontend technologies makes you well-positioned for technical leadership roles.',
                    'Consider deepening your expertise in system architecture and design patterns.',
                    'Mentoring junior developers will enhance your leadership skills and visibility.',
                    'Exploring cloud technologies and DevOps practices will broaden your technical versatility.'
                ]
            };
        },

        async recommendTechStack() {
            if (this.skills.length === 0) {
                alert('Please enter at least one skill');
                return;
            }

            this.isProcessing = true;
            this.resultData = null;

            try {
                const response = await fetch('/api/ai/recommend-tech-stack', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': this.getCsrfToken()
                    },
                    body: JSON.stringify({
                        current_skills: this.skills,
                        career_goals: this.careerGoals,
                        project_type: this.projectType,
                        experience_level: this.experienceLevel
                    })
                });

                if (!response.ok) {
                    throw new Error(`Error: ${response.status}`);
                }

                this.resultData = await response.json();

                // Fallback for errors in the API response
                if (!this.resultData || !this.resultData.project_category) {
                    this.resultData = this.getFallbackTechStackData();
                }
            } catch (error) {
                console.error('Tech stack recommendation error:', error);
                // Provide fallback tech stack data
                this.resultData = this.getFallbackTechStackData();
            } finally {
                this.isProcessing = false;
            }
        },

        getFallbackTechStackData() {
            return {
                project_category: 'Web Development',
                experience_level: this.experienceLevel,
                recommended_stack: {
                    frontend: ['React', 'TypeScript', 'Tailwind CSS', 'Redux', 'Next.js'],
                    backend: ['Laravel', 'Node.js', 'GraphQL', 'Redis'],
                    database: ['PostgreSQL', 'MongoDB'],
                    tools: ['Docker', 'GitHub Actions', 'Jest', 'Webpack/Vite']
                },
                existing_skills: this.skills,
                complementary_technologies: ['TypeScript', 'GraphQL', 'Redis', 'Docker'],
                learning_path: [
                    'Deepen your knowledge of: TypeScript, Next.js',
                    'Explore architectural patterns and best practices',
                    'Add these technologies to your stack: GraphQL, Redis',
                    'Contribute to open source or build a complex personal project'
                ],
                career_alignment: 'This tech stack aligns with your advancement to senior architect role goals and builds upon your existing expertise.'
            };
        },

        handleImageUpload(event) {
            const file = event.target.files[0];
            if (file) {
                this.imageFile = file;
                this.imageUrl = '';
            }
        },

        clearResults() {
            this.resultData = null;
        }
    }"
    @open-ai-feature.window="isExpanded = true; activeTab = $event.detail.tab; clearResults()"
    class="ai-features-component absolute {{ $position }} z-20"
>
    <!-- Main Control Button -->
    <div class="flex items-center">
        <button
            @click="isExpanded = !isExpanded"
            class="flex items-center justify-center w-10 h-10 rounded-full bg-gradient-to-r {{ $colors['button'] }} transition-all duration-300 group shadow-lg"
            :class="{'ring-2 ring-white/30': isExpanded}"
            title="AI Features"
        >
            <!-- AI Icon -->
            <svg class="w-5 h-5 text-white transition-all duration-300" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 16C15.866 16 19 12.866 19 9C19 5.13401 15.866 2 12 2C8.13401 2 5 5.13401 5 9C5 12.866 8.13401 16 12 16Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M12 16V22" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M8 19H16" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M9 9H9.01" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M15 9H15.01" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
    </div>

    <!-- AI Features Panel -->
    <div
        x-show="isExpanded"
        x-cloak
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 transform -translate-y-2"
        x-transition:enter-end="opacity-100 transform translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 transform translate-y-0"
        x-transition:leave-end="opacity-0 transform -translate-y-2"
        class="mt-3 p-4 rounded-lg {{ $colors['panel'] }} backdrop-blur-md border shadow-xl min-w-[320px] max-w-md"
        @click.outside="isExpanded = false"
    >
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-white text-lg font-semibold">AI Features</h3>
            <button @click="isExpanded = false" class="text-white/70 hover:text-white" title="Close panel">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Feature Tabs -->
        <div class="flex border-b border-gray-700 mb-4">
            <button
                @click="activeTab = 'summarize'; clearResults()"
                class="px-3 py-2 font-medium text-sm border-b-2 -mb-px transition-all"
                :class="activeTab === 'summarize' ? '{{ $colors['active'] }}' : 'text-gray-400 border-transparent hover:text-gray-200'"
            >
                Summarize
            </button>
            <button
                @click="activeTab = 'image'; clearResults()"
                class="px-3 py-2 font-medium text-sm border-b-2 -mb-px transition-all"
                :class="activeTab === 'image' ? '{{ $colors['active'] }}' : 'text-gray-400 border-transparent hover:text-gray-200'"
            >
                Image
            </button>
            <button
                @click="activeTab = 'code'; clearResults()"
                class="px-3 py-2 font-medium text-sm border-b-2 -mb-px transition-all"
                :class="activeTab === 'code' ? '{{ $colors['active'] }}' : 'text-gray-400 border-transparent hover:text-gray-200'"
            >
                Code
            </button>
            <button
                @click="activeTab = 'sentiment'; clearResults()"
                class="px-3 py-2 font-medium text-sm border-b-2 -mb-px transition-all"
                :class="activeTab === 'sentiment' ? '{{ $colors['active'] }}' : 'text-gray-400 border-transparent hover:text-gray-200'"
            >
                Sentiment
            </button>
            <button
                @click="activeTab = 'career'; clearResults()"
                class="px-3 py-2 font-medium text-sm border-b-2 -mb-px transition-all"
                :class="activeTab === 'career' ? '{{ $colors['active'] }}' : 'text-gray-400 border-transparent hover:text-gray-200'"
            >
                Career
            </button>
            <button
                @click="activeTab = 'tech'; clearResults()"
                class="px-3 py-2 font-medium text-sm border-b-2 -mb-px transition-all"
                :class="activeTab === 'tech' ? '{{ $colors['active'] }}' : 'text-gray-400 border-transparent hover:text-gray-200'"
            >
                Tech
            </button>
        </div>

        <!-- Tab Content -->
        <div x-show="isProcessing" class="flex justify-center my-4">
            <div class="animate-spin rounded-full h-8 w-8 border-t-2 border-b-2 {{ $colors['highlight'] }}"></div>
        </div>

        <!-- Summarize Content -->
        <div x-show="activeTab === 'summarize' && !isProcessing" x-transition>
            <div class="mb-4">
                <label class="block text-sm font-medium {{ $colors['text'] }} mb-1">Text to Summarize</label>
                <textarea
                    x-model="inputText"
                    class="w-full px-3 py-2 bg-slate-800 text-white border border-slate-700 rounded resize-y"
                    rows="4"
                    placeholder="Enter at least 50 characters of text to summarize..."
                ></textarea>
            </div>

            <button
                @click="summarizeText()"
                class="w-full py-2 bg-gradient-to-r {{ $colors['button'] }} text-white rounded flex items-center justify-center transition"
                :disabled="inputText.length < 50"
                :class="{'opacity-50 cursor-not-allowed': inputText.length < 50}"
            >
                <span>Summarize Text</span>
            </button>

            <!-- Results -->
            <div x-show="resultData" class="mt-4 border-t border-gray-700 pt-4">
                <h4 class="text-white font-medium mb-2">Summary</h4>
                <div class="bg-slate-800/50 p-3 rounded text-gray-200 text-sm">
                    <p x-text="resultData.summary || resultData.error" class="whitespace-pre-wrap"></p>
                </div>
                <div x-show="!resultData.error" class="mt-3 flex text-xs text-gray-400 justify-between">
                    <span>Original: <span x-text="resultData.original_length"></span> chars</span>
                    <span>Summary: <span x-text="resultData.summary_length"></span> chars</span>
                    <span>Reduced by <span x-text="resultData.reduction_percentage + '%'"></span></span>
                </div>
            </div>
        </div>

        <!-- Image Analysis Content -->
        <div x-show="activeTab === 'image' && !isProcessing" x-transition>
            <div class="mb-4">
                <label class="block text-sm font-medium {{ $colors['text'] }} mb-1">Upload Image</label>
                <input
                    type="file"
                    @change="handleImageUpload($event)"
                    accept="image/*"
                    class="w-full px-3 py-2 bg-slate-800 text-white border border-slate-700 rounded text-sm"
                >
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium {{ $colors['text'] }} mb-1">Or Image URL</label>
                <input
                    type="text"
                    x-model="imageUrl"
                    class="w-full px-3 py-2 bg-slate-800 text-white border border-slate-700 rounded"
                    placeholder="https://example.com/image.jpg"
                >
            </div>

            <button
                @click="analyzeImage()"
                class="w-full py-2 bg-gradient-to-r {{ $colors['button'] }} text-white rounded flex items-center justify-center transition"
                :disabled="!imageFile && !imageUrl"
                :class="{'opacity-50 cursor-not-allowed': !imageFile && !imageUrl}"
            >
                <span>Analyze Image</span>
            </button>

            <!-- Results -->
            <div x-show="resultData" class="mt-4 border-t border-gray-700 pt-4">
                <h4 class="text-white font-medium mb-2">Image Analysis</h4>

                <div x-show="resultData.error" class="bg-slate-800/50 p-3 rounded text-gray-200 text-sm">
                    <p x-text="resultData.error"></p>
                </div>

                <div x-show="!resultData.error">
                    <div class="bg-slate-800/50 p-3 rounded text-gray-200 text-sm mb-3">
                        <h5 class="font-medium mb-1 text-xs uppercase {{ $colors['text'] }}">Caption</h5>
                        <p x-text="resultData.caption"></p>
                    </div>

                    <div class="bg-slate-800/50 p-3 rounded text-gray-200 text-sm mb-3">
                        <h5 class="font-medium mb-1 text-xs uppercase {{ $colors['text'] }}">Tags</h5>
                        <div class="flex flex-wrap gap-1">
                            <template x-for="tag in resultData.tags">
                                <span class="bg-slate-700/80 text-xs rounded px-2 py-0.5" x-text="tag"></span>
                            </template>
                        </div>
                    </div>

                    <div class="flex gap-3 mb-2">
                        <div class="flex-1 bg-slate-800/50 p-3 rounded text-gray-200 text-sm">
                            <h5 class="font-medium mb-1 text-xs uppercase {{ $colors['text'] }}">Objects</h5>
                            <div class="max-h-24 overflow-y-auto">
                                <template x-for="obj in resultData.objects">
                                    <div class="mb-1 pb-1 border-b border-slate-700/50">
                                        <span x-text="obj.label"></span>
                                        <span class="text-xs opacity-70" x-text="'(' + Math.round(obj.confidence * 100) + '%)'"></span>
                                    </div>
                                </template>
                            </div>
                        </div>

                        <div class="flex-1 bg-slate-800/50 p-3 rounded text-gray-200 text-sm">
                            <h5 class="font-medium mb-1 text-xs uppercase {{ $colors['text'] }}">Colors</h5>
                            <div class="flex flex-wrap gap-1">
                                <template x-for="color in resultData.dominant_colors">
                                    <div class="flex items-center mb-1">
                                        <div class="w-4 h-4 rounded-full mr-1" :style="'background-color:' + color"></div>
                                        <span class="text-xs" x-text="color"></span>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Code Explanation Content -->
        <div x-show="activeTab === 'code' && !isProcessing" x-transition>
            <div class="mb-4">
                <label class="block text-sm font-medium {{ $colors['text'] }} mb-1">Programming Language</label>
                <select
                    x-model="codeLang"
                    class="w-full px-3 py-2 bg-slate-800 text-white border border-slate-700 rounded"
                >
                    <option value="javascript">JavaScript</option>
                    <option value="php">PHP</option>
                    <option value="python">Python</option>
                    <option value="java">Java</option>
                    <option value="csharp">C#</option>
                    <option value="cpp">C++</option>
                    <option value="go">Go</option>
                    <option value="ruby">Ruby</option>
                    <option value="swift">Swift</option>
                    <option value="kotlin">Kotlin</option>
                    <option value="rust">Rust</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium {{ $colors['text'] }} mb-1">Code to Explain</label>
                <textarea
                    x-model="codeInput"
                    class="w-full px-3 py-2 bg-slate-800 text-white border border-slate-700 rounded font-mono text-sm resize-y"
                    rows="6"
                    placeholder="Paste code here..."
                ></textarea>
            </div>

            <button
                @click="explainCode()"
                class="w-full py-2 bg-gradient-to-r {{ $colors['button'] }} text-white rounded flex items-center justify-center transition"
                :disabled="codeInput.length < 10"
                :class="{'opacity-50 cursor-not-allowed': codeInput.length < 10}"
            >
                <span>Explain Code</span>
            </button>

            <!-- Results -->
            <div x-show="resultData" class="mt-4 border-t border-gray-700 pt-4">
                <h4 class="text-white font-medium mb-2">Code Analysis</h4>

                <div x-show="resultData.error" class="bg-slate-800/50 p-3 rounded text-gray-200 text-sm">
                    <p x-text="resultData.error"></p>
                </div>

                <div x-show="!resultData.error">
                    <div class="bg-slate-800/50 p-3 rounded text-gray-200 text-sm mb-3">
                        <h5 class="font-medium mb-1 text-xs uppercase {{ $colors['text'] }}">Overview</h5>
                        <p x-text="resultData.overview"></p>
                    </div>

                    <div class="bg-slate-800/50 p-3 rounded text-gray-200 text-sm mb-3">
                        <h5 class="font-medium mb-1 text-xs uppercase {{ $colors['text'] }}">Explanations</h5>
                        <ul class="list-disc pl-4 space-y-1">
                            <template x-for="explanation in resultData.explanations">
                                <li x-text="explanation"></li>
                            </template>
                        </ul>
                    </div>

                    <div x-show="resultData.performance_considerations && resultData.performance_considerations.length > 0" class="bg-slate-800/50 p-3 rounded text-gray-200 text-sm mb-3">
                        <h5 class="font-medium mb-1 text-xs uppercase {{ $colors['text'] }}">Performance Considerations</h5>
                        <ul class="list-disc pl-4 space-y-1">
                            <template x-for="perf in resultData.performance_considerations">
                                <li x-text="perf"></li>
                            </template>
                        </ul>
                    </div>

                    <div x-show="resultData.potential_issues && resultData.potential_issues.length > 0" class="bg-slate-800/50 p-3 rounded text-gray-200 text-sm mb-3">
                        <h5 class="font-medium mb-1 text-xs uppercase {{ $colors['text'] }}">Potential Issues</h5>
                        <ul class="list-disc pl-4 space-y-1 text-yellow-300">
                            <template x-for="issue in resultData.potential_issues">
                                <li x-text="issue"></li>
                            </template>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sentiment Analysis Content -->
        <div x-show="activeTab === 'sentiment' && !isProcessing" x-transition>
            <div class="mb-4">
                <label class="block text-sm font-medium {{ $colors['text'] }} mb-1">Text to Analyze</label>
                <textarea
                    x-model="inputText"
                    class="w-full px-3 py-2 bg-slate-800 text-white border border-slate-700 rounded resize-y"
                    rows="4"
                    placeholder="Enter text to analyze sentiment..."
                ></textarea>
            </div>

            <button
                @click="analyzeSentiment()"
                class="w-full py-2 bg-gradient-to-r {{ $colors['button'] }} text-white rounded flex items-center justify-center transition"
                :disabled="inputText.length < 10"
                :class="{'opacity-50 cursor-not-allowed': inputText.length < 10}"
            >
                <span>Analyze Sentiment</span>
            </button>

            <!-- Results -->
            <div x-show="resultData" class="mt-4 border-t border-gray-700 pt-4">
                <h4 class="text-white font-medium mb-2">Sentiment Analysis</h4>

                <div x-show="resultData.error" class="bg-slate-800/50 p-3 rounded text-gray-200 text-sm">
                    <p x-text="resultData.error"></p>
                </div>

                <div x-show="!resultData.error" class="space-y-3">
                    <div class="flex items-center justify-between bg-slate-800/50 p-3 rounded">
                        <span class="text-white font-medium">Sentiment</span>
                        <span
                            x-text="resultData.sentiment"
                            :class="{
                                'text-green-400': resultData.sentiment.includes('positive'),
                                'text-red-400': resultData.sentiment.includes('negative'),
                                'text-gray-400': resultData.sentiment === 'neutral'
                            }"
                            class="font-medium"
                        ></span>
                    </div>

                    <div class="p-3 bg-slate-800/50 rounded">
                        <div class="mb-1 flex justify-between text-xs">
                            <span class="text-red-400">Negative</span>
                            <span class="text-gray-400">Neutral</span>
                            <span class="text-green-400">Positive</span>
                        </div>
                        <div class="h-2 bg-slate-700 rounded-full w-full relative">
                            <div
                                class="absolute top-0 bottom-0 rounded-full"
                                :class="{
                                    'bg-green-400': resultData.score > 0,
                                    'bg-red-400': resultData.score < 0,
                                    'bg-gray-400': resultData.score === 0
                                }"
                                :style="{
                                    width: Math.abs(resultData.score * 50) + '%',
                                    left: resultData.score >= 0 ? '50%' : (50 - Math.abs(resultData.score * 50)) + '%'
                                }"
                            ></div>
                            <div class="absolute top-0 bottom-0 left-1/2 w-0.5 bg-white/20"></div>
                        </div>
                        <div class="mt-1 text-center text-xs text-gray-400">
                            Score: <span x-text="resultData.score.toFixed(2)"></span>
                            (Confidence: <span x-text="Math.round(resultData.confidence * 100) + '%'"></span>)
                        </div>
                    </div>

                    <div x-show="resultData.details" class="bg-slate-800/50 p-3 rounded">
                        <h5 class="font-medium mb-2 text-xs uppercase {{ $colors['text'] }}">Details</h5>

                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm">Positive words: <span x-text="resultData.details.positive_words_count"></span></span>
                            <span class="text-sm">Negative words: <span x-text="resultData.details.negative_words_count"></span></span>
                        </div>

                        <div x-show="resultData.details.positive_words && resultData.details.positive_words.length > 0" class="mb-2">
                            <h6 class="text-xs mb-1 text-green-300">Positive Words</h6>
                            <div class="flex flex-wrap gap-1">
                                <template x-for="word in resultData.details.positive_words">
                                    <span class="bg-green-900/30 text-green-300 text-xs rounded px-2 py-0.5" x-text="word"></span>
                                </template>
                            </div>
                        </div>

                        <div x-show="resultData.details.negative_words && resultData.details.negative_words.length > 0">
                            <h6 class="text-xs mb-1 text-red-300">Negative Words</h6>
                            <div class="flex flex-wrap gap-1">
                                <template x-for="word in resultData.details.negative_words">
                                    <span class="bg-red-900/30 text-red-300 text-xs rounded px-2 py-0.5" x-text="word"></span>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Career Path Analysis Content -->
        <div x-show="activeTab === 'career' && !isProcessing" x-transition>
            <div class="mb-4">
                <label class="block text-sm font-medium {{ $colors['text'] }} mb-1">Professional Bio</label>
                <textarea
                    x-model="bio"
                    class="w-full px-3 py-2 bg-slate-800 text-white border border-slate-700 rounded resize-y"
                    rows="4"
                    placeholder="Enter your professional bio..."
                ></textarea>
            </div>

            <button
                @click="analyzeCareerPath()"
                class="w-full py-2 bg-gradient-to-r {{ $colors['button'] }} text-white rounded flex items-center justify-center transition"
                :disabled="bio.trim().length < 50"
                :class="{'opacity-50 cursor-not-allowed': bio.trim().length < 50}"
            >
                <span>Analyze Career Path</span>
            </button>

            <!-- Results -->
            <div x-show="resultData" class="mt-4 border-t border-gray-700 pt-4">
                <h4 class="text-white font-medium mb-2">Career Path Analysis</h4>

                <div x-show="resultData.error" class="bg-slate-800/50 p-3 rounded text-gray-200 text-sm">
                    <p x-text="resultData.error"></p>
                </div>

                <div x-show="!resultData.error">
                    <div class="bg-slate-800/50 p-3 rounded text-gray-200 text-sm mb-3">
                        <h5 class="font-medium mb-1 text-xs uppercase {{ $colors['text'] }}">Career Stage</h5>
                        <p x-text="resultData.career_stage"></p>
                    </div>

                    <div class="bg-slate-800/50 p-3 rounded text-gray-200 text-sm mb-3">
                        <h5 class="font-medium mb-1 text-xs uppercase {{ $colors['text'] }}">Top Career Paths</h5>
                        <div class="space-y-3">
                            <template x-for="path in resultData.top_paths">
                                <div class="p-2 border border-slate-700 rounded">
                                    <div class="flex justify-between items-center">
                                        <h6 class="font-medium text-white" x-text="path.name"></h6>
                                        <span class="bg-indigo-900/50 text-indigo-300 text-xs rounded px-2 py-0.5" x-text="'Match: ' + path.match_score + '%'"></span>
                                    </div>
                                    <p class="text-xs mt-1 text-gray-300" x-text="path.description"></p>

                                    <div class="mt-2">
                                        <h6 class="text-xs {{ $colors['text'] }}">Key Skills:</h6>
                                        <div class="flex flex-wrap gap-1 mt-1">
                                            <template x-for="skill in path.key_skills">
                                                <span class="bg-slate-700/80 text-xs rounded px-2 py-0.5" x-text="skill"></span>
                                            </template>
                                        </div>
                                    </div>

                                    <div class="mt-2">
                                        <h6 class="text-xs {{ $colors['text'] }}">Timeframe:</h6>
                                        <p class="text-xs" x-text="path.timeframe"></p>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>

                    <div class="bg-slate-800/50 p-3 rounded text-gray-200 text-sm mb-3">
                        <h5 class="font-medium mb-1 text-xs uppercase {{ $colors['text'] }}">Insights</h5>
                        <ul class="list-disc pl-4 space-y-1">
                            <template x-for="insight in resultData.insights">
                                <li x-text="insight"></li>
                            </template>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tech Stack Recommendation Content -->
        <div x-show="activeTab === 'tech' && !isProcessing" x-transition>
            <div class="mb-4">
                <label class="block text-sm font-medium {{ $colors['text'] }} mb-1">Current Skills</label>
                <div class="bg-slate-800/50 p-2 rounded-md border border-slate-700 mb-2 flex flex-wrap gap-1 min-h-[40px]">
                    <template x-for="(skill, index) in skills" :key="index">
                        <span class="bg-indigo-900/50 text-indigo-200 text-xs rounded-full px-2 py-1 flex items-center">
                            <span x-text="skill"></span>
                            <button @click="skills.splice(index, 1)" class="ml-1 text-indigo-300 hover:text-white">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </span>
                    </template>
                </div>
                <div class="flex">
                    <input
                        type="text"
                        id="skill-input"
                        placeholder="Add a skill..."
                        class="flex-1 px-3 py-2 bg-slate-800 text-white border border-slate-700 rounded-l"
                        @keydown.enter.prevent="
                            const input = document.getElementById('skill-input');
                            if (input.value.trim()) {
                                skills.push(input.value.trim());
                                input.value = '';
                            }
                        "
                    >
                    <button
                        class="px-3 py-2 bg-indigo-600 hover:bg-indigo-500 text-white rounded-r"
                        @click="
                            const input = document.getElementById('skill-input');
                            if (input.value.trim()) {
                                skills.push(input.value.trim());
                                input.value = '';
                            }
                        "
                    >
                        Add
                    </button>
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium {{ $colors['text'] }} mb-1">Project Type</label>
                <select
                    x-model="projectType"
                    class="w-full px-3 py-2 bg-slate-800 text-white border border-slate-700 rounded"
                >
                    <option value="web application">Web Application</option>
                    <option value="mobile app">Mobile App</option>
                    <option value="e-commerce">E-commerce Platform</option>
                    <option value="data analytics">Data Analytics Dashboard</option>
                    <option value="content management">Content Management System</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium {{ $colors['text'] }} mb-1">Experience Level</label>
                <select
                    x-model="experienceLevel"
                    class="w-full px-3 py-2 bg-slate-800 text-white border border-slate-700 rounded"
                >
                    <option value="beginner">Beginner</option>
                    <option value="intermediate">Intermediate</option>
                    <option value="advanced">Advanced</option>
                </select>
            </div>

            <button
                @click="recommendTechStack()"
                class="w-full py-2 bg-gradient-to-r {{ $colors['button'] }} text-white rounded flex items-center justify-center transition"
                :disabled="skills.length === 0"
                :class="{'opacity-50 cursor-not-allowed': skills.length === 0}"
            >
                <span>Recommend Tech Stack</span>
            </button>

            <!-- Results -->
            <div x-show="resultData" class="mt-4 border-t border-gray-700 pt-4">
                <h4 class="text-white font-medium mb-2">Tech Stack Recommendation</h4>

                <div x-show="resultData.error" class="bg-slate-800/50 p-3 rounded text-gray-200 text-sm">
                    <p x-text="resultData.error"></p>
                </div>

                <div x-show="!resultData.error">
                    <div class="bg-slate-800/50 p-3 rounded text-gray-200 text-sm mb-3">
                        <h5 class="font-medium mb-1 text-xs uppercase {{ $colors['text'] }}">Project Category</h5>
                        <p x-text="resultData.project_category"></p>
                    </div>

                    <div class="bg-slate-800/50 p-3 rounded text-gray-200 text-sm mb-3">
                        <h5 class="font-medium mb-1 text-xs uppercase {{ $colors['text'] }}">Technology Stack</h5>
                        <div class="space-y-2">
                            <template x-for="(technologies, category) in resultData.recommended_stack">
                                <div>
                                    <h6 class="font-medium text-xs {{ $colors['text'] }} capitalize" x-text="category"></h6>
                                    <div class="flex flex-wrap gap-1 mt-1">
                                        <template x-for="tech in technologies">
                                            <span class="bg-slate-700/80 text-xs rounded px-2 py-0.5" x-text="tech"></span>
                                        </template>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>

                    <div class="bg-slate-800/50 p-3 rounded text-gray-200 text-sm mb-3">
                        <h5 class="font-medium mb-1 text-xs uppercase {{ $colors['text'] }}">Learning Path</h5>
                        <ol class="list-decimal pl-4 space-y-1">
                            <template x-for="step in resultData.learning_path">
                                <li x-text="step"></li>
                            </template>
                        </ol>
                    </div>

                    <div class="bg-slate-800/50 p-3 rounded text-gray-200 text-sm mb-3">
                        <h5 class="font-medium mb-1 text-xs uppercase {{ $colors['text'] }}">Career Alignment</h5>
                        <p x-text="resultData.career_alignment"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
