<!-- Enhanced Projects Section with Alpine.js and Advanced Animations -->
<section id="projects" class="py-20 relative overflow-hidden"
    x-data="projectsSection()"
    x-init="initProjects()">

    <!-- Code Snippet Background -->
    @include('partials.portfolio.sections.projects.code-background')

    <!-- Blackboard Effect Overlay -->
    <div class="absolute inset-0 bg-slate-900/70 mix-blend-multiply"></div>

    <!-- Chalk Dust Particles -->
    <div id="projects-particles" class="absolute inset-0 z-0 opacity-30"></div>

    <div class="container mx-auto px-6 relative z-10">
        <!-- Section Header with Chalk Effect -->
        <div class="text-center mb-16 blackboard-header"
             x-intersect="$el.classList.add('animate__animated', 'animate__fadeInDown')">
            <h2 class="text-3xl md:text-4xl font-bold font-chalk mb-4 text-white relative inline-block">
                <span class="relative z-10">My Projects</span>
                <span class="absolute -bottom-2 left-0 right-0 h-1 bg-indigo-500 rounded-full"></span>
            </h2>
            <p class="text-gray-300 max-w-3xl mx-auto font-chalk chalk-text"
               x-intersect:enter="startTypingEffect($el)">
                {{ $tagline ?? 'Explore some of my recent work and projects.' }}
            </p>
        </div>

        <!-- Projects Grid with Animation -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @if(isset($projects) && is_array($projects) && count($projects) > 0)
                @foreach($projects as $index => $project)
                    @include('partials.portfolio.sections.projects.project-card', [
                        'project' => $project,
                        'index' => $index
                    ])
                @endforeach
            @else
                <!-- Default Projects -->
                @for($i = 0; $i < 3; $i++)
                    @include('partials.portfolio.sections.projects.project-card', [
                        'index' => $i
                    ])
                @endfor
            @endif
        </div>
    </div>

    <!-- Alpine.js Functions for Projects Section are in resources/js/alpine-init.js -->

    <!-- Blackboard Effect Styles -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Architects+Daughter&family=Just+Another+Hand&display=swap');

        .font-chalk {
            font-family: 'Architects Daughter', 'Just Another Hand', cursive;
            letter-spacing: 0.5px;
        }

        .chalk-text {
            text-shadow: 0 0 3px rgba(255, 255, 255, 0.2);
        }

        .blackboard-header h2::before {
            content: '';
            position: absolute;
            top: -10px;
            left: -20px;
            right: -20px;
            bottom: -10px;
            background-image: linear-gradient(to right, rgba(255, 255, 255, 0.05) 1px, transparent 1px),
                              linear-gradient(to bottom, rgba(255, 255, 255, 0.05) 1px, transparent 1px);
            background-size: 20px 20px;
            z-index: -1;
            border-radius: 4px;
        }

        .typing-target {
            min-height: 1.5em;
        }

        .typing-complete {
            position: relative;
        }

        .typing-complete::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100%;
            height: 1px;
            background: rgba(255, 255, 255, 0.2);
        }
    </style>
</section>
