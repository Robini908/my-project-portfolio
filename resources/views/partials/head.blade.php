<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="color-scheme" content="light dark">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>{{ $title ?? 'Personal Portfolio' }}</title>

<!-- Standalone Mobile Fixes -->
<script>
    // Immediately check for mobile
    window.isMobileDevice = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
    if (window.isMobileDevice) {
        document.documentElement.classList.add('is-mobile-device');

        // Inject standalone mobile fix script
        const script = document.createElement('script');
        script.src = '/mobile-fix.js?v=' + Date.now();
        document.head.appendChild(script);

        // Add fallback CSS early
        const link = document.createElement('link');
        link.rel = 'stylesheet';
        link.href = '/mobile-fallback.css?v=' + Date.now();
        document.head.appendChild(link);
    }
</script>

<!-- Add x-cloak style for Alpine.js -->
<style>
    [x-cloak] { display: none !important; }
</style>

<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&family=Just+Another+Hand&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

<!-- Critical CSS for preventing FOUC (Flash of Unstyled Content) -->
<style>
    /* Basic mobile-first styles to prevent FOUC */
    body {
        font-family: 'instrument-sans', sans-serif;
        margin: 0;
        padding: 0;
        min-height: 100vh;
        overflow-x: hidden;
        width: 100%;
        transition: background-color 0.2s ease-in-out;
    }

    /* Default dark mode styles in case Tailwind fails to load */
    @media (prefers-color-scheme: dark) {
        body {
            background-color: #0f172a; /* dark:bg-zinc-900 equivalent */
            color: #f8fafc; /* dark:text-white equivalent */
        }
    }

    /* Mobile-specific fixes */
    @media (max-width: 768px) {
        .md\:hidden { display: none !important; }
        .sm\:block { display: block !important; }
        html, body {
            width: 100%;
            overflow-x: hidden;
        }
    }
</style>

@vite(['resources/css/app.css', 'resources/js/app.js'])
@vite(['resources/js/mobile-handler.js'])
@fluxAppearance

<!-- Mobile detection marker -->
<script>
    // Set a flag to know if we're on mobile
    window.isMobileDevice = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);

    // Add a class to the HTML element for targeting in CSS
    if (window.isMobileDevice) {
        document.documentElement.classList.add('is-mobile-device');
    }

    // Create a marker element to prevent duplicate processing
    if (!document.querySelector('[data-mobile-detection]')) {
        const marker = document.createElement('div');
        marker.setAttribute('data-mobile-detection', 'true');
        marker.style.display = 'none';
        document.head.appendChild(marker);
    }
</script>

<!-- Force mobile viewport -->
@if(isset($isMobile) && $isMobile || (isset($_SERVER['IS_MOBILE']) && $_SERVER['IS_MOBILE']))
<style>
    /* Force mobile viewport styles */
    @media (max-width: 768px) {
        html, body {
            width: 100%;
            overflow-x: hidden;
        }

        /* Ensure Tailwind classes are applied correctly */
        .md\:hidden {
            display: none !important;
        }

        .sm\:block {
            display: block !important;
        }
    }
</style>
<script>
    // Force reload of CSS if mobile detection might have failed
    document.addEventListener('DOMContentLoaded', function() {
        // Check if Tailwind hasn't loaded properly
        if (!document.querySelector('[data-tailwind-loaded]')) {
            // Add a marker that Tailwind has been handled
            const marker = document.createElement('div');
            marker.setAttribute('data-tailwind-loaded', 'true');
            marker.style.display = 'none';
            document.body.appendChild(marker);

            // Force reload of stylesheets
            const links = document.querySelectorAll('link[rel="stylesheet"]');
            links.forEach(link => {
                const url = link.href;
                link.href = url + (url.includes('?') ? '&' : '?') + 'force_reload=' + Date.now();
            });
        }
    });
</script>
@endif
