@props(['title', 'tagline'])

<div class="text-center mb-16" x-intersect="$el.classList.add('animate__animated', 'animate__fadeInDown')">
    <h2 class="text-3xl md:text-4xl font-bold text-gradient inline-block mb-4">{{ $title }}</h2>
    <div class="w-20 h-1 mx-auto bg-indigo-500 rounded-full mb-6"></div>
    <p class="text-gray-300 max-w-3xl mx-auto">{{ $tagline }}</p>
</div>

<style>
    .text-gradient {
        @apply bg-clip-text text-transparent bg-gradient-to-r from-indigo-500 via-purple-500 to-blue-500;
    }
</style>
