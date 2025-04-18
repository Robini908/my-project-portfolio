@props(['title', 'tagline'])

<div class="text-center mb-16 blackboard-header"
     x-data="{ hover: false }"
     x-intersect="$el.classList.add('animate__animated', 'animate__fadeInDown')"
     @mouseenter="hover = true"
     @mouseleave="hover = false">
    <!-- Chalk Dust Container -->
    <div class="absolute inset-0 chalk-dust-container"></div>

    <!-- Enhanced Title with Chalk Effect -->
    <h2 class="text-3xl md:text-4xl font-bold text-gradient inline-block mb-4 relative chalk-title">
        {{ $title }}
        <!-- Underline Effect -->
        <span class="absolute bottom-0 left-0 w-full h-1 bg-indigo-500 rounded-full opacity-70 glow-line" :class="{'glow-active': hover}"></span>
    </h2>

    <!-- Decorative Divider -->
    <div class="w-20 h-1 mx-auto bg-gradient-to-r from-indigo-500 via-purple-500 to-blue-500 rounded-full mb-6 divider-glow" :class="{'divider-active': hover}"></div>

    <!-- Tagline with Chalk Effect -->
    <p class="text-gray-300 max-w-3xl mx-auto chalk-text" :class="{'chalk-glow': hover}">{{ $tagline }}</p>
</div>

<style>
    /* Gradient Text Effect */
    .text-gradient {
        @apply bg-clip-text text-transparent bg-gradient-to-r from-indigo-500 via-purple-500 to-blue-500;
    }

    /* Chalk Text Effects */
    .chalk-title {
        font-family: 'Architects Daughter', 'Just Another Hand', cursive;
        letter-spacing: 0.5px;
        text-shadow: 0 0 3px rgba(255, 255, 255, 0.2);
        position: relative;
    }

    .chalk-text {
        font-family: 'Architects Daughter', 'Just Another Hand', cursive;
        letter-spacing: 0.3px;
        transition: all 0.5s ease;
    }

    .chalk-glow {
        text-shadow: 0 0 5px rgba(99, 102, 241, 0.4);
    }

    /* Glow Effects */
    .glow-line {
        transition: all 0.5s ease;
        box-shadow: 0 0 5px rgba(99, 102, 241, 0.3);
    }

    .glow-active {
        box-shadow: 0 0 15px rgba(99, 102, 241, 0.6);
    }

    .divider-glow {
        transition: all 0.5s ease;
        box-shadow: 0 0 5px rgba(99, 102, 241, 0.3);
    }

    .divider-active {
        box-shadow: 0 0 15px rgba(99, 102, 241, 0.6);
        transform: scaleX(1.2);
    }

    /* Blackboard Header */
    .blackboard-header {
        position: relative;
    }
</style>
