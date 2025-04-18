@props(['project' => null, 'index' => 0])

@php
    // Default project data if not provided
    $defaultProjects = [
        [
            'title' => 'E-commerce Platform',
            'description' => 'A modern e-commerce platform with advanced product filtering, user authentication, and payment processing.',
            'image' => 'https://images.unsplash.com/photo-1607799279861-4dd421887fb3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1740&q=80',
            'technologies' => ['Laravel', 'Vue.js', 'Tailwind'],
            'demoUrl' => '#',
            'codeUrl' => '#'
        ],
        [
            'title' => 'Task Management App',
            'description' => 'A collaborative task management application with real-time updates, task assignments, and progress tracking.',
            'image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1740&q=80',
            'technologies' => ['React', 'Node.js', 'MongoDB'],
            'demoUrl' => '#',
            'codeUrl' => '#'
        ],
        [
            'title' => 'AI-Powered Chat Bot',
            'description' => 'An intelligent chatbot leveraging natural language processing to provide contextual responses and assistance.',
            'image' => 'https://images.unsplash.com/photo-1518770660439-4636190af475?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1740&q=80',
            'technologies' => ['Python', 'TensorFlow', 'Flask'],
            'demoUrl' => '#',
            'codeUrl' => '#'
        ]
    ];

    // Use provided project or fallback to default
    $projectData = $project ?? $defaultProjects[$index % 3];
@endphp

<div class="project-card relative group"
     x-data="{ showDetails: false }"
     x-intersect="$el.classList.add('animate__animated', 'animate__fadeInUp')"
     :class="{'animation-delay-' + ({{ $index }} * 200): true}"
     @mouseenter="showDetails = true; $dispatch('project-hover', { index: {{ $index }} })"
     @mouseleave="showDetails = false; $dispatch('project-leave')">

    <!-- Card Background with Futuristic Border -->
    <div class="absolute inset-0 rounded-xl bg-gradient-to-br from-slate-800/40 via-slate-800/30 to-indigo-900/20 backdrop-blur-sm border border-slate-700/50 overflow-hidden transition-all duration-500 group-hover:border-indigo-500/50">
        <!-- Animated Glow Effect -->
        <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
            <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/10 via-purple-500/10 to-blue-500/10"></div>
            <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-indigo-500/50 to-transparent"></div>
            <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-indigo-500/50 to-transparent"></div>
            <div class="absolute left-0 top-0 bottom-0 w-px bg-gradient-to-b from-transparent via-indigo-500/50 to-transparent"></div>
            <div class="absolute right-0 top-0 bottom-0 w-px bg-gradient-to-b from-transparent via-indigo-500/50 to-transparent"></div>
        </div>
    </div>

    <!-- Project Image with Overlay -->
    <div class="relative h-48 overflow-hidden rounded-t-xl">
        <img src="{{ $projectData['image'] }}"
             alt="{{ $projectData['title'] }}"
             class="w-full h-full object-cover object-center transition-transform duration-700 ease-out group-hover:scale-110">

        <!-- Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 via-slate-900/50 to-transparent"></div>

        <!-- Technology Tags with Animation -->
        <div class="absolute bottom-4 left-4 right-4 z-10">
            <div class="flex flex-wrap gap-2">
                @foreach($projectData['technologies'] as $index => $tech)
                    <span class="px-2 py-1 text-xs bg-indigo-600/70 text-white rounded-md backdrop-blur-sm
                                 transition-all duration-300 hover:bg-indigo-500 hover:scale-105
                                 animate__animated animate__fadeInUp"
                          style="animation-delay: {{ 300 + ($index * 100) }}ms">
                        {{ $tech }}
                    </span>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Project Content -->
    <div class="relative p-6 z-10">
        <!-- Title with Animation -->
        <h3 class="text-xl font-semibold mb-2 text-white group-hover:text-indigo-300 transition-colors duration-300">
            {{ $projectData['title'] }}
        </h3>

        <!-- Description with Animation -->
        <p class="text-gray-400 mb-4 line-clamp-3 group-hover:text-gray-300 transition-colors duration-300">
            {{ $projectData['description'] }}
        </p>

        <!-- Action Links with Glow Effect -->
        <div class="flex space-x-4">
            @if(isset($projectData['demoUrl']))
                <a href="{{ $projectData['demoUrl'] }}" target="_blank"
                   class="inline-flex items-center text-indigo-400 hover:text-indigo-300 transition-all duration-300 group-hover:translate-y-0 translate-y-0 relative">
                    <span>Live Demo</span>
                    <svg class="w-4 h-4 ml-1 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                    </svg>
                    <!-- Glow Effect -->
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-indigo-500 group-hover:w-full transition-all duration-300"></span>
                </a>
            @endif

            @if(isset($projectData['codeUrl']))
                <a href="{{ $projectData['codeUrl'] }}" target="_blank"
                   class="inline-flex items-center text-indigo-400 hover:text-indigo-300 transition-all duration-300 group-hover:translate-y-0 translate-y-0 relative">
                    <span>Source Code</span>
                    <svg class="w-4 h-4 ml-1 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                    </svg>
                    <!-- Glow Effect -->
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-indigo-500 group-hover:w-full transition-all duration-300"></span>
                </a>
            @endif
        </div>
    </div>

    <!-- Futuristic Corner Accents -->
    <div class="absolute top-0 left-0 w-3 h-3 border-t border-l border-indigo-500/0 group-hover:border-indigo-500/70 transition-colors duration-500 rounded-tl-md"></div>
    <div class="absolute top-0 right-0 w-3 h-3 border-t border-r border-indigo-500/0 group-hover:border-indigo-500/70 transition-colors duration-500 rounded-tr-md"></div>
    <div class="absolute bottom-0 left-0 w-3 h-3 border-b border-l border-indigo-500/0 group-hover:border-indigo-500/70 transition-colors duration-500 rounded-bl-md"></div>
    <div class="absolute bottom-0 right-0 w-3 h-3 border-b border-r border-indigo-500/0 group-hover:border-indigo-500/70 transition-colors duration-500 rounded-br-md"></div>
</div>
