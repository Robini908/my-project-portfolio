// Import Alpine.js initialization
import './alpine-init.js';

// Import Alpine.js
import Alpine from 'alpinejs';
import intersect from '@alpinejs/intersect';

// Import our modules
import './modules/speech-module.js';
import './modules/ai-features.js';

// Make Alpine available globally
window.Alpine = Alpine;
import Typed from 'typed.js';

// Configure Alpine.js
Alpine.plugin(intersect);

// Initialize Alpine
Alpine.start();

// Panel Navigation System
document.addEventListener('DOMContentLoaded', () => {
    // Get all section links in the navigation
    const navLinks = document.querySelectorAll('a[href^="#"]');
    const mainContent = document.getElementById('main-content-wrapper');
    let activeSection = 'about'; // Default section is now about

    // Mobile menu toggle
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });
    }

    // Initialize animation delay classes
    document.querySelectorAll('.animation-delay-2000').forEach(function(element) {
        element.style.animationDelay = '2s';
    });

    document.querySelectorAll('.animation-delay-4000').forEach(function(element) {
        element.style.animationDelay = '4s';
    });

    // Define animations and effects
    if (!document.querySelector('style#animation-effects')) {
        const style = document.createElement('style');
        style.id = 'animation-effects';
        style.textContent = `
            @keyframes blob {
                0% { transform: translate(0px, 0px) scale(1); }
                33% { transform: translate(30px, -50px) scale(1.1); }
                66% { transform: translate(-20px, 20px) scale(0.9); }
                100% { transform: translate(0px, 0px) scale(1); }
            }
            .animate-blob {
                animation: blob 7s infinite;
            }

            /* Panel Navigation Styles */
            .panel {
                position: absolute;
                width: 100%;
                transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1),
                            opacity 0.8s cubic-bezier(0.16, 1, 0.3, 1);
                backface-visibility: hidden;
            }

            .panel.panel-active {
                transform: translateX(0);
                opacity: 1;
                z-index: 2;
            }

            .panel.panel-prev {
                transform: translateX(-100px);
                opacity: 0;
                z-index: 1;
            }

            .panel.panel-next {
                transform: translateX(100px);
                opacity: 0;
                z-index: 1;
            }

            /* Transition effects for the progress indicator */
            .nav-indicator {
                transition: all 0.4s ease;
            }

            .nav-progress {
                transition: width 0.6s cubic-bezier(0.16, 1, 0.3, 1);
            }

            /* 3D page flip effect */
            .content-wrapper {
                perspective: 1000px;
                min-height: 100vh;
                position: relative;
                overflow: hidden;
            }

            /* SPA Content Panel Styles */
            .content-panel {
                position: absolute;
                inset: 0;
                opacity: 0;
                pointer-events: none;
                transform: translateX(30px);
                transition: all 0.6s cubic-bezier(0.16, 1, 0.3, 1);
            }

            .content-panel.active {
                opacity: 1;
                pointer-events: all;
                transform: translateX(0);
                position: relative;
            }

            /* Enhanced Hero Section Styles */
            .tech-icon {
                animation: float 6s ease-in-out infinite;
                opacity: 0;
                transform: translateY(20px);
                transition: opacity 0.6s ease, transform 0.6s ease;
            }

            .tech-icon:nth-child(1) {
                animation-delay: 0s;
                transition-delay: 0.3s;
            }

            .tech-icon:nth-child(2) {
                animation-delay: 1.5s;
                transition-delay: 0.6s;
            }

            .tech-icon:nth-child(3) {
                animation-delay: 3s;
                transition-delay: 0.9s;
            }

            .tech-icon:nth-child(4) {
                animation-delay: 4.5s;
                transition-delay: 1.2s;
            }

            .active .tech-icon {
                opacity: 1;
                transform: translateY(0);
            }

            .reveal-text {
                opacity: 0;
                transform: translateY(20px);
                transition: opacity 0.6s ease, transform 0.6s ease;
            }

            .active .reveal-text {
                opacity: 1;
                transform: translateY(0);
            }

            .hero-content h4.reveal-text {
                transition-delay: 0.2s;
            }

            .hero-content h1.reveal-text {
                transition-delay: 0.4s;
            }

            .hero-content p.reveal-text {
                transition-delay: 0.6s;
            }

            .reveal-buttons {
                opacity: 0;
                transform: translateY(20px);
                transition: opacity 0.6s ease, transform 0.6s ease;
                transition-delay: 0.8s;
            }

            .active .reveal-buttons {
                opacity: 1;
                transform: translateY(0);
            }

            .reveal-icons {
                opacity: 0;
                transform: translateY(20px);
                transition: opacity 0.6s ease, transform 0.6s ease;
                transition-delay: 1s;
            }

            .active .reveal-icons {
                opacity: 1;
                transform: translateY(0);
            }

            .profile-container {
                opacity: 0;
                transform: scale(0.95);
                transition: opacity 0.8s ease, transform 0.8s ease;
                transition-delay: 0.3s;
            }

            .active .profile-container {
                opacity: 1;
                transform: scale(1);
            }

            .experience-indicator {
                opacity: 0;
                transform: translateY(20px) translateX(-50%);
                transition: opacity 0.6s ease, transform 0.6s ease;
                transition-delay: 1.2s;
            }

            .active .experience-indicator {
                opacity: 1;
                transform: translateY(0) translateX(-50%);
            }

            .glow-border {
                box-shadow: 0 0 15px 5px rgba(99, 102, 241, 0.3);
                animation: pulse-border 2s infinite;
            }

            @keyframes pulse-border {
                0% { box-shadow: 0 0 15px 5px rgba(99, 102, 241, 0.3); }
                50% { box-shadow: 0 0 25px 10px rgba(99, 102, 241, 0.5); }
                100% { box-shadow: 0 0 15px 5px rgba(99, 102, 241, 0.3); }
            }

            .cursor-blink {
                animation: blink 1s step-end infinite;
            }

            @keyframes blink {
                from, to { opacity: 1; }
                50% { opacity: 0; }
            }

            .scroll-indicator {
                opacity: 0;
                transform: translateY(20px);
                transition: opacity 0.6s ease, transform 0.6s ease;
                transition-delay: 1.5s;
            }

            .active .scroll-indicator {
                opacity: 1;
                transform: translateY(0);
            }

            .grid-lines {
                background-image:
                    linear-gradient(to right, rgba(99, 102, 241, 0.1) 1px, transparent 1px),
                    linear-gradient(to bottom, rgba(99, 102, 241, 0.1) 1px, transparent 1px);
                background-size: 50px 50px;
            }
        `;
        document.head.appendChild(style);
    }

    // Initialize Advanced Hero Section
    function initHeroSection() {
        // Initialize Typed.js if the element exists
        const typedElement = document.querySelector('.typed-text');
        if (typedElement) {
            // Check if Typed.js is loaded
            if (typeof Typed !== 'undefined') {
                // Enhanced typing effect with more impressive options and natural typing
                const typed = new Typed('.typed-text', {
                    strings: [
                        'Full Stack Developer',
                        'Software Architect',
                        'AI Integration Specialist',
                        'UI/UX Designer',
                        'Problem Solver & Innovator',
                        'Digital Experience Creator'
                    ],
                    typeSpeed: 80,                // Base typing speed
                    backSpeed: 40,                // Speed of deleting
                    backDelay: 1500,              // Time before starting to backspace
                    startDelay: 500,              // Delay before starting
                    loop: true,                   // Loop through the strings
                    loopCount: Infinity,          // Infinite loop
                    cursorChar: '|',              // Character for cursor
                    smartBackspace: false,        // Delete entire string
                    shuffle: false,               // Don't shuffle strings
                    showCursor: true,             // Show cursor
                    autoInsertCss: true,          // Insert CSS automatically
                    fadeOut: false,               // No fade out
                    onStringTyped: function() {
                        // Pause before deleting
                        setTimeout(() => {}, 1000);
                    },
                    // Randomize typing speed to make it look more natural
                    preStringTyped: function(arrayPos, self) {
                        // Add glitch effect before typing new string
                        typedElement.classList.add('pre-type-glitch');
                        setTimeout(() => {
                            typedElement.classList.remove('pre-type-glitch');
                        }, 500);

                        // Randomize typing speed for a more realistic effect
                        const typeSpeeds = [40, 60, 80, 100, 120];
                        self.options.typeSpeed = typeSpeeds[Math.floor(Math.random() * typeSpeeds.length)];
                    }
                });
            } else {
                // Fallback if Typed.js is not available
                const roles = ['Full Stack Developer', 'UI/UX Designer', 'Machine Learning Engineer', 'Problem Solver', 'Innovation Architect'];
                let currentIndex = 0;

                const updateText = () => {
                    typedElement.textContent = roles[currentIndex];
                    currentIndex = (currentIndex + 1) % roles.length;
                };

                updateText();
                setInterval(updateText, 3000);
            }
        }

        // Initialize particles background if particles.js is available
        const particlesContainer = document.getElementById('particles-bg');
        if (particlesContainer) {
            if (typeof particlesJS !== 'undefined') {
                particlesJS('particles-bg', {
                    particles: {
                        number: { value: 100, density: { enable: true, value_area: 800 } },
                        color: { value: ['#6366f1', '#8b5cf6', '#3b82f6'] },
                        shape: {
                            type: ['circle', 'triangle', 'polygon'],
                            polygon: { nb_sides: 6 }
                        },
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
                        line_linked: {
                            enable: true,
                            distance: 150,
                            color: '#6366f1',
                            opacity: 0.2,
                            width: 1
                        },
                        move: {
                            enable: true,
                            speed: 1.5,
                            direction: 'none',
                            random: true,
                            straight: false,
                            out_mode: 'out',
                            bounce: false,
                            attract: { enable: true, rotateX: 600, rotateY: 1200 }
                        }
                    },
                    interactivity: {
                        detect_on: 'canvas',
                        events: {
                            onhover: { enable: true, mode: 'grab' },
                            onclick: { enable: true, mode: 'push' },
                            resize: true
                        },
                        modes: {
                            grab: { distance: 180, line_linked: { opacity: 0.6 } },
                            push: { particles_nb: 4 }
                        }
                    },
                    retina_detect: true
                });
            } else {
                // Fallback if particles.js is not available - add a simple effect
                particlesContainer.innerHTML = '';
                for (let i = 0; i < 70; i++) {
                    const particle = document.createElement('div');
                    particle.className = 'absolute rounded-full bg-indigo-500/20';
                    particle.style.width = `${Math.random() * 6 + 2}px`;
                    particle.style.height = particle.style.width;
                    particle.style.left = `${Math.random() * 100}%`;
                    particle.style.top = `${Math.random() * 100}%`;
                    particle.style.animation = `float ${Math.random() * 6 + 3}s ease-in-out infinite`;
                    particle.style.animationDelay = `${Math.random() * 5}s`;
                    particlesContainer.appendChild(particle);
                }
            }
        }

        // Initialize Three.js background if Three.js is available
        const threeJSBg = document.querySelector('.threejs-bg');
        if (threeJSBg && typeof THREE !== 'undefined') {
            let scene, camera, renderer;
            let geometry, material, mesh;
            let time = 0;

            const init = () => {
                scene = new THREE.Scene();
                camera = new THREE.PerspectiveCamera(70, window.innerWidth / window.innerHeight, 0.1, 1000);

                renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
                renderer.setSize(window.innerWidth, window.innerHeight);
                renderer.setClearColor(0x000000, 0);
                threeJSBg.appendChild(renderer.domElement);

                // Create a more complex mesh - futuristic grid
                geometry = new THREE.IcosahedronGeometry(8, 1);

                // More impressive glowing material
                material = new THREE.MeshPhongMaterial({
                    color: 0x6366f1,
                    wireframe: true,
                    transparent: true,
                    opacity: 0.15,
                    emissive: 0x3b82f6,
                    emissiveIntensity: 0.4,
                    shininess: 50
                });

                mesh = new THREE.Mesh(geometry, material);
                scene.add(mesh);

                // Add a second mesh for layered effect
                const geometry2 = new THREE.OctahedronGeometry(5, 0);
                const material2 = new THREE.MeshPhongMaterial({
                    color: 0x8b5cf6,
                    wireframe: true,
                    transparent: true,
                    opacity: 0.1
                });
                const mesh2 = new THREE.Mesh(geometry2, material2);
                scene.add(mesh2);

                // Add lighting
                const light = new THREE.DirectionalLight(0xffffff, 1);
                light.position.set(1, 1, 1).normalize();
                scene.add(light);

                // Add ambient light for better visibility
                const ambientLight = new THREE.AmbientLight(0x404040, 0.5);
                scene.add(ambientLight);

                // Add point light with color
                const pointLight = new THREE.PointLight(0x6366f1, 1, 100);
                pointLight.position.set(10, 10, 10);
                scene.add(pointLight);

                camera.position.z = 15;

                window.addEventListener('resize', onWindowResize, false);
                animate();
            };

            const onWindowResize = () => {
                camera.aspect = window.innerWidth / window.innerHeight;
                camera.updateProjectionMatrix();
                renderer.setSize(window.innerWidth, window.innerHeight);
            };

            const animate = () => {
                requestAnimationFrame(animate);

                time += 0.005;

                // More complex animation
                if (mesh) {
                    mesh.rotation.x += 0.002;
                    mesh.rotation.y += 0.003;

                    // Pulsating effect
                    mesh.scale.x = 1 + Math.sin(time) * 0.1;
                    mesh.scale.y = 1 + Math.sin(time) * 0.1;
                    mesh.scale.z = 1 + Math.sin(time) * 0.1;
                }

                renderer.render(scene, camera);
            };

            try {
                init();
            } catch (e) {
                console.error('Three.js initialization failed:', e);
                threeJSBg.style.display = 'none';
            }
        }

        // Initialize digital circuit lines
        const circuitLines = document.querySelector('.circuit-lines');
        if (circuitLines) {
            createCircuitLines(circuitLines);
        }
    }

    // Create digital circuit lines for futuristic effect
    function createCircuitLines(container) {
        if (!container) return;

        const svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
        svg.setAttribute('width', '100%');
        svg.setAttribute('height', '100%');
        svg.style.position = 'absolute';
        svg.style.top = '0';
        svg.style.left = '0';

        const linesCount = 30;

        for (let i = 0; i < linesCount; i++) {
            const path = document.createElementNS('http://www.w3.org/2000/svg', 'path');

            // Generate random path
            const startX = Math.random() * 100;
            const startY = Math.random() * 100;

            let d = `M${startX},${startY} `;

            // Create a circuit-like path with right angles
            const segments = Math.floor(Math.random() * 5) + 2;
            let currentX = startX;
            let currentY = startY;

            for (let j = 0; j < segments; j++) {
                // Decide direction - horizontal or vertical
                if (Math.random() > 0.5) {
                    // Horizontal
                    currentX = Math.random() * 100;
                    d += `H${currentX} `;
                } else {
                    // Vertical
                    currentY = Math.random() * 100;
                    d += `V${currentY} `;
                }
            }

            path.setAttribute('d', d);
            path.setAttribute('stroke', '#6366f1');
            path.setAttribute('stroke-width', '0.5');
            path.setAttribute('fill', 'none');
            path.setAttribute('stroke-opacity', '0.3');
            path.setAttribute('stroke-dasharray', '5,3');

            // Add animation
            const animate = document.createElementNS('http://www.w3.org/2000/svg', 'animate');
            animate.setAttribute('attributeName', 'stroke-dashoffset');
            animate.setAttribute('from', '0');
            animate.setAttribute('to', '100');
            animate.setAttribute('dur', (Math.random() * 10 + 10) + 's');
            animate.setAttribute('repeatCount', 'indefinite');

            path.appendChild(animate);
            svg.appendChild(path);
        }

        container.appendChild(svg);
    }

    // Make sections function like SPA panels
    function initializePanels() {
        const sections = document.querySelectorAll('section[id]');

        sections.forEach(section => {
            // Add the content-panel class to all sections
            if (!section.classList.contains('content-panel')) {
                section.classList.add('content-panel');
            }
        });
    }

    // Add navigation event listeners
    navLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();

            const targetId = link.getAttribute('href').substring(1);

            if (targetId === activeSection) return;

            // Update navigation indicators
            updateNavigationIndicators(targetId);

            // Update URL with history API without scrolling
            window.history.pushState({ section: targetId }, '', `#${targetId}`);

            // Show the relevant section with animation
            showSection(targetId);

            // Update active section
            activeSection = targetId;

            // Close mobile menu if open
            if (mobileMenu && !mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.add('hidden');
            }
        });
    });

    // Handle browser back/forward buttons
    window.addEventListener('popstate', (event) => {
        if (event.state && event.state.section) {
            updateNavigationIndicators(event.state.section);
            showSection(event.state.section);
            activeSection = event.state.section;
        }
    });

    // Set up dot navigation
    const dotNavItems = document.querySelectorAll('.dot-nav-item');

    dotNavItems.forEach(dot => {
        dot.addEventListener('click', () => {
            const targetSection = dot.getAttribute('data-section');

            if (targetSection === activeSection) return;

            // Update navigation indicators
            updateNavigationIndicators(targetSection);

            // Update URL with history API without scrolling
            window.history.pushState({ section: targetSection }, '', `#${targetSection}`);

            // Show the relevant section with animation
            showSection(targetSection);

            // Update active section
            activeSection = targetSection;
        });
    });

    // Initial setup
    initializePanels();
    setupInitialSection();
    initProgressIndicator();
    initHeroSection();

    // Function to set up the initial section based on URL hash
    function setupInitialSection() {
        let initialSection = 'about'; // Default to about

        // Check if URL has a hash and it corresponds to a section
        const hash = window.location.hash.substring(1);
        if (hash && document.getElementById(hash)) {
            initialSection = hash;
        }

        // Set the initial state
        window.history.replaceState({ section: initialSection }, '', hash ? `#${hash}` : '');

        // Show the initial section
        showSection(initialSection);
        activeSection = initialSection;
        updateNavigationIndicators(initialSection);
    }

    // Function to show a section (SPA style)
    function showSection(sectionId) {
        const sections = document.querySelectorAll('section[id]');
        const targetSection = document.getElementById(sectionId);

        if (!targetSection) return;

        // Hide all sections first
        sections.forEach(section => {
            section.classList.remove('active', 'panel-active', 'panel-prev', 'panel-next');
        });

        // Show the target section
        targetSection.classList.add('active');

        // Add fancy reveal animations for elements within the active section
        animateContent(sectionId);

        // Announce the section change for screen readers
        announcePageChange(sectionId);
    }

    // Announce page change for accessibility
    function announcePageChange(sectionId) {
        // Find or create the announcement element
        let announcer = document.getElementById('section-announcer');

        if (!announcer) {
            announcer = document.createElement('div');
            announcer.id = 'section-announcer';
            announcer.setAttribute('aria-live', 'assertive');
            announcer.setAttribute('aria-atomic', 'true');
            announcer.className = 'sr-only';
            document.body.appendChild(announcer);
        }

        // Get a user-friendly name for the section
        let sectionName = sectionId.charAt(0).toUpperCase() + sectionId.slice(1);

        // Update the announcer
        announcer.textContent = `Navigated to ${sectionName} section`;
    }

    // Animate content within a section
    function animateContent(sectionId) {
        // Clear any existing animations
        document.querySelectorAll('.animate-item').forEach(item => {
            item.classList.remove('animate-item-visible');
        });

        // Get all animatable items in the active section and animate them
        const section = document.getElementById(sectionId);
        if (!section) return;

        const items = section.querySelectorAll('.animate-item');

        items.forEach((item, index) => {
            // Stagger the animations
            setTimeout(() => {
                item.classList.add('animate-item-visible');
            }, 100 + (index * 100));
        });
    }

    // Add animation classes to content elements
    function setupContentAnimations() {
        // Elements that should animate when a section becomes visible
        const animatableElements = document.querySelectorAll('h1, h2, h3, p, .card, .skill-item, .project-item');

        animatableElements.forEach(el => {
            if (!el.classList.contains('animate-item')) {
                el.classList.add('animate-item');
            }
        });

        // Add the animation styles if they don't exist
        if (!document.querySelector('style#content-animations')) {
            const style = document.createElement('style');
            style.id = 'content-animations';
            style.textContent = `
                .animate-item {
                    opacity: 0;
                    transform: translateY(20px);
                    transition: opacity 0.6s ease, transform 0.6s ease;
                }

                .animate-item-visible {
                    opacity: 1;
                    transform: translateY(0);
                }
            `;
            document.head.appendChild(style);
        }
    }

    // Helper function to determine if a section comes before another
    function isSectionBefore(sectionA, sectionB) {
        const sections = Array.from(document.querySelectorAll('section[id]'));
        const indexA = sections.findIndex(section => section.id === sectionA);
        const indexB = sections.findIndex(section => section.id === sectionB);

        return indexA < indexB;
    }

    // Initialize the progress indicator
    function initProgressIndicator() {
        const nav = document.querySelector('nav');

        if (!nav) return;

        // Create navigation progress container if it doesn't exist
        if (!document.querySelector('.nav-progress-container')) {
            const progressContainer = document.createElement('div');
            progressContainer.className = 'nav-progress-container h-1 bg-slate-800 mt-1 absolute bottom-0 left-0 right-0';

            const progressBar = document.createElement('div');
            progressBar.className = 'nav-progress bg-indigo-500 h-full w-0';

            progressContainer.appendChild(progressBar);
            nav.appendChild(progressContainer);
        }
    }

    // Update the navigation indicators
    function updateNavigationIndicators(activeId) {
        // Update active nav link
        navLinks.forEach(link => {
            const linkTarget = link.getAttribute('href').substring(1);

            if (linkTarget === activeId) {
                link.classList.add('text-white', 'font-medium');
                link.classList.remove('text-gray-300');
            } else {
                link.classList.remove('text-white', 'font-medium');
                link.classList.add('text-gray-300');
            }
        });

        // Update dot navigation
        dotNavItems.forEach(dot => {
            const dotTarget = dot.getAttribute('data-section');

            if (dotTarget === activeId) {
                dot.classList.add('active');
            } else {
                dot.classList.remove('active');
            }
        });

        // Update progress bar
        updateProgressBar(activeId);
    }

    // Update the progress bar
    function updateProgressBar(activeId) {
        const progressBar = document.querySelector('.nav-progress');
        if (!progressBar) return;

        const sections = Array.from(document.querySelectorAll('section[id]'));
        const activeIndex = sections.findIndex(section => section.id === activeId);

        // Calculate progress percentage
        const totalSections = sections.length;
        const progress = ((activeIndex + 1) / totalSections) * 100;

        progressBar.style.width = `${progress}%`;
    }

    // Add keyboard navigation
    document.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowRight' || e.key === 'ArrowDown') {
            navigateToNextSection();
        } else if (e.key === 'ArrowLeft' || e.key === 'ArrowUp') {
            navigateToPrevSection();
        }
    });

    // Navigate to next section
    function navigateToNextSection() {
        const sections = Array.from(document.querySelectorAll('section[id]'));
        const currentIndex = sections.findIndex(section => section.id === activeSection);

        if (currentIndex < sections.length - 1) {
            const nextSection = sections[currentIndex + 1].id;

            // Trigger the navigation
            updateNavigationIndicators(nextSection);
            window.history.pushState({ section: nextSection }, '', `#${nextSection}`);
            showSection(nextSection);
            activeSection = nextSection;
        }
    }

    // Navigate to previous section
    function navigateToPrevSection() {
        const sections = Array.from(document.querySelectorAll('section[id]'));
        const currentIndex = sections.findIndex(section => section.id === activeSection);

        if (currentIndex > 0) {
            const prevSection = sections[currentIndex - 1].id;

            // Trigger the navigation
            updateNavigationIndicators(prevSection);
            window.history.pushState({ section: prevSection }, '', `#${prevSection}`);
            showSection(prevSection);
            activeSection = prevSection;
        }
    }

    // Add touch swipe navigation
    let touchStartX = 0;
    let touchEndX = 0;

    document.addEventListener('touchstart', (e) => {
        touchStartX = e.changedTouches[0].screenX;
    }, false);

    document.addEventListener('touchend', (e) => {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipe();
    }, false);

    function handleSwipe() {
        const swipeThreshold = 100; // Minimum swipe distance

        if (touchEndX < touchStartX - swipeThreshold) {
            // Swipe left (go to next section)
            navigateToNextSection();
        } else if (touchEndX > touchStartX + swipeThreshold) {
            // Swipe right (go to previous section)
            navigateToPrevSection();
        }
    }

    // Set up animations
    setupContentAnimations();

    // Add page transition effects for initial load
    window.addEventListener('load', () => {
        // Apply initial animations to the active section
        animateContent(activeSection);
    });

    // Add a futuristic loading animation
    function addLoadingAnimation() {
        const loader = document.createElement('div');
        loader.className = 'page-loader fixed inset-0 bg-slate-950 z-50 flex items-center justify-center';

        loader.innerHTML = `
            <div class="loader-container">
                <div class="loader-ring"></div>
                <div class="loader-text text-gradient font-bold">Loading Experience</div>
            </div>
        `;

        document.body.appendChild(loader);

        // Add loader styles
        const loaderStyle = document.createElement('style');
        loaderStyle.id = 'loader-styles';
        loaderStyle.textContent = `
            .page-loader {
                transition: opacity 0.5s ease, visibility 0.5s ease;
            }

            .loader-container {
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 1.5rem;
            }

            .loader-ring {
                display: inline-block;
                width: 80px;
                height: 80px;
                position: relative;
            }

            .loader-ring:after {
                content: '';
                display: block;
                width: 64px;
                height: 64px;
                margin: 8px;
                border-radius: 50%;
                border: 6px solid transparent;
                border-top-color: #4f46e5;
                border-bottom-color: #9333ea;
                animation: loader-ring 1.2s linear infinite;
            }

            .loader-text {
                font-size: 1.25rem;
                letter-spacing: 0.05em;
                animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
            }

            @keyframes loader-ring {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }

            @keyframes pulse {
                0%, 100% { opacity: 1; }
                50% { opacity: 0.6; }
            }
        `;

        document.head.appendChild(loaderStyle);

        // Hide loader after page is fully loaded
        window.addEventListener('load', () => {
            setTimeout(() => {
                loader.style.opacity = '0';
                loader.style.visibility = 'hidden';

                // Remove loader after animation completes
                setTimeout(() => {
                    loader.remove();
                }, 500);
            }, 800); // Show loader for at least 800ms for better UX
        });
    }

    // Add the loading animation
    addLoadingAnimation();
});
