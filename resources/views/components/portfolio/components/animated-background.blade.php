<div class="absolute inset-0 -z-10">
    <!-- Animated Blobs with increased visibility -->
    <div class="absolute top-0 left-0 w-96 h-96 bg-indigo-500/20 rounded-full mix-blend-multiply filter blur-3xl animate-blob"></div>
    <div class="absolute top-0 right-0 w-96 h-96 bg-purple-500/20 rounded-full mix-blend-multiply filter blur-3xl animate-blob animation-delay-2000"></div>
    <div class="absolute bottom-0 left-1/2 w-96 h-96 bg-blue-500/20 rounded-full mix-blend-multiply filter blur-3xl animate-blob animation-delay-4000"></div>

    <!-- Enhanced Code Snippet Background with High-Resolution Images -->
    <div class="absolute inset-0 code-background">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-6">
            <!-- JavaScript Code Snippet Image -->
            <div class="code-image-container">
                <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="JavaScript Code" class="code-image js-code">
                <div class="code-overlay js-overlay"></div>
            </div>

            <!-- Python Code Snippet Image -->
            <div class="code-image-container">
                <img src="https://images.unsplash.com/photo-1542831371-29b0f74f9713?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Python Code" class="code-image py-code">
                <div class="code-overlay py-overlay"></div>
            </div>

            <!-- HTML/CSS Code Snippet Image -->
            <div class="code-image-container">
                <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2072&q=80" alt="HTML/CSS Code" class="code-image html-code">
                <div class="code-overlay html-overlay"></div>
            </div>
        </div>
    </div>

    <!-- Matrix-like falling code effect -->
    <div class="matrix-effect"></div>
</div>

<style>
    /* Animated Blob Effect */
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

    /* Code Image Styling */
    .code-image-container {
        position: relative;
        overflow: hidden;
        border-radius: 12px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.4);
        height: 300px;
        transition: transform 0.3s ease;
    }

    .code-image-container:hover {
        transform: translateY(-5px);
    }

    .code-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        transition: all 0.5s ease;
        filter: brightness(0.7);
    }

    .code-image-container:hover .code-image {
        transform: scale(1.05);
        filter: brightness(0.8);
    }

    .code-overlay {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.6);
        mix-blend-mode: multiply;
        transition: all 0.3s ease;
    }

    .code-image-container:hover .code-overlay {
        background: rgba(0, 0, 0, 0.4);
    }

    .js-overlay {
        background: linear-gradient(rgba(99, 102, 241, 0.3), rgba(0, 0, 0, 0.7));
    }

    .py-overlay {
        background: linear-gradient(rgba(139, 92, 246, 0.3), rgba(0, 0, 0, 0.7));
    }

    .html-overlay {
        background: linear-gradient(rgba(59, 130, 246, 0.3), rgba(0, 0, 0, 0.7));
    }

    .code-background {
        opacity: 0.4;
        pointer-events: none;
        z-index: -1;
    }

    /* Matrix Effect */
    .matrix-effect {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        overflow: hidden;
        z-index: -1;
    }

    .matrix-effect::before {
        content: '';
        position: absolute;
        top: -10px;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(rgba(0, 0, 0, 0), rgba(32, 32, 32, 0.2), rgba(0, 0, 0, 0));
        background-size: 100% 3px;
        animation: matrix-scan 8s linear infinite;
        opacity: 0.3;
    }

    @keyframes matrix-scan {
        0% {
            transform: translateY(0);
        }
        100% {
            transform: translateY(100%);
        }
    }
</style>
