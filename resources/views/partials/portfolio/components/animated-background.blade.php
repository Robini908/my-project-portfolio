<div class="absolute inset-0 -z-10">
    <!-- Animated Blobs -->
    <div class="absolute top-0 left-0 w-96 h-96 bg-indigo-500/10 rounded-full mix-blend-multiply filter blur-3xl animate-blob"></div>
    <div class="absolute top-0 right-0 w-96 h-96 bg-purple-500/10 rounded-full mix-blend-multiply filter blur-3xl animate-blob animation-delay-2000"></div>
    <div class="absolute bottom-0 left-1/2 w-96 h-96 bg-blue-500/10 rounded-full mix-blend-multiply filter blur-3xl animate-blob animation-delay-4000"></div>

    <!-- Code Snippet Background -->
    <div class="absolute inset-0 opacity-10">
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 p-4">
            <!-- JavaScript Code -->
            <pre class="text-xs text-indigo-400/30 font-mono">
                <code>
function skillsSection() {
    return {
        activeCategory: null,
        skills: [],
        init() {
            this.loadSkills();
            this.animateOnScroll();
        }
    }
}
                </code>
            </pre>

            <!-- CSS Code -->
            <pre class="text-xs text-purple-400/30 font-mono">
                <code>
.skill-card {
    @apply transform transition-all duration-500 hover:-translate-y-2;
}

.progress-ring {
    transition: stroke-dashoffset 2s ease-in-out;
}
                </code>
            </pre>

            <!-- HTML Code -->
            <pre class="text-xs text-blue-400/30 font-mono">
                <code>
<div class="skill-card">
    <div class="relative overflow-hidden">
        <!-- Card Content -->
    </div>
</div>
                </code>
            </pre>
        </div>
    </div>
</div>

<style>
    .animate-blob {
        animation: animate-blob 8s ease-in-out infinite;
    }

    @keyframes animate-blob {
        0%, 100% {
            transform: scale(1) translate(0, 0);
        }
        25% {
            transform: scale(1.1) translate(20px, -15px);
        }
        50% {
            transform: scale(1) translate(0, 0);
        }
        75% {
            transform: scale(1.1) translate(-20px, 15px);
        }
    }

    .animation-delay-2000 {
        animation-delay: 2s;
    }

    .animation-delay-4000 {
        animation-delay: 4s;
    }
</style>
