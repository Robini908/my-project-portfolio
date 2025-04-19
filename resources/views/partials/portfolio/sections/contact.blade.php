<!-- Contact Section -->
<section id="contact" class="relative min-h-screen py-20 bg-[#0B1121] overflow-hidden">
    <!-- Animated Background -->
    @include('partials.portfolio.components.contact-animated-bg')

    <!-- Content Container -->
    <div class="container mx-auto px-6 relative z-10">
        <!-- Section Header -->
        @include('partials.portfolio.components.contact-header')

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 max-w-6xl mx-auto">
            <!-- Contact Form -->
            <div class="order-2 lg:order-1 flex items-center">
                @livewire('contact-form')
            </div>

            <!-- Contact Information -->
            <div class="order-1 lg:order-2">
                <div id="contact-info-container" class="flex items-center opacity-100 scale-100 transition-all duration-500 transform">
                    @include('partials.portfolio.components.contact-info')
                </div>

                <!-- Map Container (Hidden by Default) -->
                <div id="contact-map-container" class="hidden h-[500px] rounded-2xl overflow-hidden opacity-0 transition-all duration-500 transform scale-95">
                    @include('partials.portfolio.components.contact-map')
                </div>
            </div>
        </div>
    </div>

    <!-- Script to include particles.js if not present -->
    @push('scripts')
    <script>
        // Check if particles.js is already loaded
        if (typeof particlesJS === 'undefined') {
            const script = document.createElement('script');
            script.src = 'https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js';
            script.async = true;
            document.head.appendChild(script);
        }

        // Map toggle functionality
        document.addEventListener('DOMContentLoaded', function() {
            const toggleMapBtn = document.getElementById('toggle-map');
            const mapContainer = document.getElementById('contact-map-container');
            const infoContainer = document.getElementById('contact-info-container');
            const closeMapBtn = document.getElementById('close-map');

            // Function to hide map and show contact info
            function showContactInfo() {
                // First animate out
                mapContainer.classList.add('opacity-0', 'scale-95');

                // After animation, hide map and show contact info
                setTimeout(() => {
                    mapContainer.classList.add('hidden');
                    mapContainer.classList.remove('block');
                    infoContainer.classList.remove('hidden');

                    // Fade in contact info
                    setTimeout(() => {
                        infoContainer.classList.add('opacity-100', 'scale-100');
                        infoContainer.classList.remove('opacity-0', 'scale-95');
                    }, 50);

                    if (toggleMapBtn) {
                        toggleMapBtn.innerHTML = `
                            <span>View on Map</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        `;
                    }
                }, 300);

                return false; // map is now hidden
            }

            // Function to show map and hide contact info
            function showMap() {
                // First make the map visible but with opacity 0
                mapContainer.classList.remove('hidden');
                mapContainer.classList.add('block');

                // Hide contact info
                infoContainer.classList.add('opacity-0', 'scale-95');

                // After small delay, animate in the map
                setTimeout(() => {
                    infoContainer.classList.add('hidden');
                    mapContainer.classList.add('opacity-100', 'scale-100');
                    mapContainer.classList.remove('opacity-0', 'scale-95');

                    if (toggleMapBtn) {
                        toggleMapBtn.innerHTML = `
                            <span>Show Contact Info</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                        `;
                    }

                    // Trigger resize event to ensure map is properly rendered
                    window.dispatchEvent(new Event('resize'));
                }, 300);

                return true; // map is now visible
            }

            // Track map visibility state
            let mapVisible = false;

            // Add click handler for toggle map button
            if (toggleMapBtn) {
                toggleMapBtn.addEventListener('click', function() {
                    mapVisible = mapVisible ? showContactInfo() : showMap();
                });
            }

            // Add click handler for close map button
            if (closeMapBtn) {
                closeMapBtn.addEventListener('click', function() {
                    mapVisible = showContactInfo();
                });
            }

            // Allow pressing Escape key to close the map
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && mapVisible) {
                    mapVisible = showContactInfo();
                }
            });
        });
    </script>
    @endpush
</section>
