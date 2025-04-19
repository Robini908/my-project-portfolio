<!-- Contact Animated Background -->
<div class="absolute inset-0 overflow-hidden">
    <!-- Gradient Orbs -->
    <div class="absolute top-1/4 left-1/4 w-72 h-72 bg-purple-600/20 rounded-full filter blur-3xl animate-float"></div>
    <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-indigo-600/20 rounded-full filter blur-3xl animate-float-delay"></div>

    <!-- Grid Pattern -->
    <div class="absolute inset-0 bg-grid-pattern opacity-[0.03]"></div>

    <!-- Particles -->
    <div id="particles-js" class="absolute inset-0"></div>
</div>

<!-- Add this script to your layout file if not already included -->
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof particlesJS !== 'undefined') {
            particlesJS('particles-js', {
                "particles": {
                    "number": {
                        "value": 30,
                        "density": {
                            "enable": true,
                            "value_area": 800
                        }
                    },
                    "color": {
                        "value": "#6d28d9"
                    },
                    "shape": {
                        "type": "circle",
                        "stroke": {
                            "width": 0,
                            "color": "#000000"
                        },
                        "polygon": {
                            "nb_sides": 5
                        }
                    },
                    "opacity": {
                        "value": 0.3,
                        "random": true,
                        "anim": {
                            "enable": true,
                            "speed": 0.2,
                            "opacity_min": 0.1,
                            "sync": false
                        }
                    },
                    "size": {
                        "value": 3,
                        "random": true,
                        "anim": {
                            "enable": true,
                            "speed": 2,
                            "size_min": 0.1,
                            "sync": false
                        }
                    },
                    "line_linked": {
                        "enable": true,
                        "distance": 150,
                        "color": "#8b5cf6",
                        "opacity": 0.2,
                        "width": 1
                    },
                    "move": {
                        "enable": true,
                        "speed": 1,
                        "direction": "none",
                        "random": true,
                        "straight": false,
                        "out_mode": "out",
                        "bounce": false,
                        "attract": {
                            "enable": false,
                            "rotateX": 600,
                            "rotateY": 1200
                        }
                    }
                },
                "interactivity": {
                    "detect_on": "canvas",
                    "events": {
                        "onhover": {
                            "enable": true,
                            "mode": "grab"
                        },
                        "onclick": {
                            "enable": true,
                            "mode": "push"
                        },
                        "resize": true
                    },
                    "modes": {
                        "grab": {
                            "distance": 140,
                            "line_linked": {
                                "opacity": 0.4
                            }
                        },
                        "push": {
                            "particles_nb": 3
                        }
                    }
                },
                "retina_detect": true
            });
        }
    });
</script>
@endpush

<style>
    .bg-grid-pattern {
        background-image:
            linear-gradient(to right, rgba(99, 102, 241, 0.05) 1px, transparent 1px),
            linear-gradient(to bottom, rgba(99, 102, 241, 0.05) 1px, transparent 1px);
        background-size: 40px 40px;
    }

    @keyframes float {
        0% { transform: translate(0, 0) rotate(0deg); }
        50% { transform: translate(-15px, 15px) rotate(5deg); }
        100% { transform: translate(0, 0) rotate(0deg); }
    }

    @keyframes float-delay {
        0% { transform: translate(0, 0) rotate(0deg); }
        50% { transform: translate(15px, -15px) rotate(-5deg); }
        100% { transform: translate(0, 0) rotate(0deg); }
    }

    .animate-float {
        animation: float 15s ease-in-out infinite;
    }

    .animate-float-delay {
        animation: float-delay 18s ease-in-out infinite;
    }
</style>
