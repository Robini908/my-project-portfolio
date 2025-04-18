// Alpine.js Initialization and Custom Components

document.addEventListener('alpine:init', () => {
    // Projects Section Component
    Alpine.data('projectsSection', () => ({
        hoveredProject: null,
        typingInstances: [],

        init() {
            this.initParticles();
            this.setupHoverEffects();
        },

        initParticles() {
            if (typeof particlesJS !== 'undefined') {
                particlesJS('projects-particles', {
                    particles: {
                        number: { value: 30, density: { enable: true, value_area: 800 } },
                        color: { value: '#ffffff' },
                        shape: { type: 'circle' },
                        opacity: {
                            value: 0.3,
                            random: true,
                            anim: { enable: true, speed: 1, opacity_min: 0.1, sync: false }
                        },
                        size: {
                            value: 3,
                            random: true,
                            anim: { enable: true, speed: 2, size_min: 0.1, sync: false }
                        },
                        move: {
                            enable: true,
                            speed: 1,
                            direction: 'none',
                            random: true,
                            straight: false,
                            out_mode: 'out',
                            bounce: false
                        }
                    },
                    interactivity: {
                        detect_on: 'canvas',
                        events: {
                            onhover: { enable: true, mode: 'repulse' },
                            onclick: { enable: true, mode: 'push' },
                            resize: true
                        }
                    },
                    retina_detect: true
                });
            }
        },

        setupHoverEffects() {
            // Add any additional hover effects initialization here
        },

        setHoveredProject(index) {
            this.hoveredProject = index;
        },

        clearHoveredProject() {
            this.hoveredProject = null;
        },

        startTypingEffect(element) {
            if (!element || typeof Typed === 'undefined') return;

            const text = element.textContent;
            element.textContent = '';
            element.classList.add('typing-target');

            const typed = new Typed(element, {
                strings: [text],
                typeSpeed: 30,
                showCursor: false,
                onComplete: (self) => {
                    element.classList.add('typing-complete');
                }
            });

            this.typingInstances.push(typed);
        }
    }));

    // Blackboard Effects Component
    Alpine.data('blackboardEffects', () => ({
        init() {
            this.initBlackboardEffects();
        },

        initBlackboardEffects() {
            document.querySelectorAll('.blackboard-container').forEach(container => {
                // Add eraser marks
                this.createEraserMarks(container);

                // Add chalk writing effect to text elements
                container.querySelectorAll('p, h1, h2, h3, h4, h5, h6').forEach(element => {
                    element.classList.add('chalk-writing');

                    // Create dust when writing animation completes
                    setTimeout(() => {
                        this.createChalkDust(element);
                    }, 1500);
                });
            });
        },

        createChalkDust(element, count = 5) {
            if (!element) return;

            const container = element.closest('.blackboard-container') || element;
            const rect = element.getBoundingClientRect();
            const containerRect = container.getBoundingClientRect();

            for (let i = 0; i < count; i++) {
                const dust = document.createElement('div');
                dust.classList.add('chalk-dust');

                // Position relative to the element
                const x = Math.random() * rect.width;

                dust.style.left = `${x + (rect.left - containerRect.left)}px`;
                dust.style.top = `${rect.bottom - containerRect.top}px`;
                dust.style.animationDelay = `${Math.random() * 0.5}s`;

                container.appendChild(dust);

                // Remove after animation completes
                setTimeout(() => {
                    dust.remove();
                }, 2000);
            }
        },

        createEraserMarks(container, count = 3) {
            if (!container) return;

            for (let i = 0; i < count; i++) {
                const mark = document.createElement('div');
                mark.classList.add('eraser-mark');

                const size = 20 + Math.random() * 60;
                const x = Math.random() * container.offsetWidth;
                const y = Math.random() * container.offsetHeight;

                mark.style.width = `${size}px`;
                mark.style.height = `${size}px`;
                mark.style.left = `${x}px`;
                mark.style.top = `${y}px`;
                mark.style.opacity = 0.1 + Math.random() * 0.1;

                container.appendChild(mark);
            }
        }
    }));
});
