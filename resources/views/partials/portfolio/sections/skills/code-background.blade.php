<!-- Enhanced Code Snippet Background with High-Resolution Images -->
<div class="absolute inset-0 z-0 overflow-hidden">
    <!-- Code Snippet Grid -->
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 p-4 opacity-40">
        <!-- JavaScript Code Image -->
        <div class="code-image-container code-scroll-slow">
            <img src="https://wallpapercave.com/wp/wp4923992.png" alt="JavaScript Code" class="code-image">
            <div class="code-overlay js-overlay"></div>
        </div>

        <!-- Python Code Image -->
        <div class="code-image-container code-scroll-medium">
            <img src="https://wallpaperaccess.com/full/1537294.png" alt="Python Code" class="code-image">
            <div class="code-overlay py-overlay"></div>
        </div>

        <!-- HTML/CSS Code Image -->
        <div class="code-image-container code-scroll-fast">
            <img src="https://wallpaperaccess.com/full/1555170.jpg" alt="HTML/CSS Code" class="code-image">
            <div class="code-overlay html-overlay"></div>
        </div>

        <!-- Java Code Image -->
        <div class="code-image-container code-scroll-medium">
            <img src="https://wallpapercave.com/wp/wp8725088.jpg" alt="Java Code" class="code-image">
            <div class="code-overlay java-overlay"></div>
        </div>

        <!-- C++ Code Image -->
        <div class="code-image-container code-scroll-slow">
            <img src="https://wallpaperaccess.com/full/1338874.jpg" alt="C++ Code" class="code-image">
            <div class="code-overlay cpp-overlay"></div>
        </div>

        <!-- SQL Code Image -->
        <div class="code-image-container code-scroll-fast">
            <img src="https://wallpaperaccess.com/full/1886775.jpg" alt="SQL Code" class="code-image">
            <div class="code-overlay sql-overlay"></div>
        </div>
    </div>
</div>

<style>
    /* Code Image Styling */
    .code-image-container {
        position: relative;
        overflow: hidden;
        border-radius: 8px;
        height: 200px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    }

    .code-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }

    .code-overlay {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.7);
        mix-blend-mode: multiply;
    }

    .js-overlay {
        background: linear-gradient(rgba(99, 102, 241, 0.3), rgba(0, 0, 0, 0.8));
    }

    .py-overlay {
        background: linear-gradient(rgba(139, 92, 246, 0.3), rgba(0, 0, 0, 0.8));
    }

    .html-overlay {
        background: linear-gradient(rgba(59, 130, 246, 0.3), rgba(0, 0, 0, 0.8));
    }

    .java-overlay {
        background: linear-gradient(rgba(236, 72, 153, 0.3), rgba(0, 0, 0, 0.8));
    }

    .cpp-overlay {
        background: linear-gradient(rgba(234, 179, 8, 0.3), rgba(0, 0, 0, 0.8));
    }

    .sql-overlay {
        background: linear-gradient(rgba(16, 185, 129, 0.3), rgba(0, 0, 0, 0.8));
    }

    /* Scroll Animations */
    @keyframes codeScrollSlow {
        0% { transform: translateY(0); }
        100% { transform: translateY(-50%); }
    }

    @keyframes codeScrollMedium {
        0% { transform: translateY(0); }
        100% { transform: translateY(-70%); }
    }

    @keyframes codeScrollFast {
        0% { transform: translateY(0); }
        100% { transform: translateY(-60%); }
    }

    .code-scroll-slow {
        animation: codeScrollSlow 60s linear infinite;
    }

    .code-scroll-medium {
        animation: codeScrollMedium 45s linear infinite;
    }

    .code-scroll-fast {
        animation: codeScrollFast 30s linear infinite;
    }
</style>
