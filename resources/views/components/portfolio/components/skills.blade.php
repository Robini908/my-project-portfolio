@props(['skills', 'skillCategories'])

<!-- Skills Section -->
<section id="skills"
         x-data="skillsSection()"
         x-init="init()"
         class="py-20 relative overflow-hidden bg-gradient-to-b from-slate-900 to-slate-800">

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

    <script>
        function skillsSection() {
            return {
                activeCategory: null,
                skills: @json($skills),
                skillCategories: @json($skillCategories),
                init() {
                    this.animateProgressRings();
                    this.setupIntersectionObserver();
                },
                animateProgressRings() {
                    const rings = document.querySelectorAll('.progress-ring');
                    rings.forEach(ring => {
                        const length = ring.getTotalLength();
                        ring.style.strokeDasharray = length;
                        ring.style.strokeDashoffset = length;

                        // Force a reflow
                        ring.getBoundingClientRect();

                        // Define the animation
                        ring.style.transition = 'stroke-dashoffset 2s ease-in-out';
                        ring.style.strokeDashoffset = ring.getAttribute('stroke-dashoffset');
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

                    document.querySelectorAll('.skill-card, .skill-overview-card').forEach(card => {
                        observer.observe(card);
                    });
                }
            }
        }
    </script>
</section>
