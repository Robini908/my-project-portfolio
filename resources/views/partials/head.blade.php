<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="color-scheme" content="light dark">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>{{ $title ?? 'Personal Portfolio' }}</title>

<!-- Mobile Detection and Fix Loading -->
<script>
    // Simple mobile detection
    window.isMobileDevice = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
    if (window.isMobileDevice) {
        document.documentElement.classList.add('is-mobile-device');

        // Load mobile fix script immediately
        const script = document.createElement('script');
        script.src = '/mobile-fix.js?v=' + Date.now();
        script.async = true;
        document.head.appendChild(script);

        // Load fallback CSS immediately
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
        .lg\:hidden { display: none !important; }
        html, body {
            width: 100%;
            overflow-x: hidden;
            font-size: 16px;
        }
        * {
            box-sizing: border-box;
        }
    }
</style>

@vite(['resources/css/app.css', 'resources/js/app.js'])
@fluxAppearance

<!-- Mobile viewport optimization -->
<style>
    /* Enhanced mobile styles */
    @media (max-width: 768px) {
        html, body {
            width: 100% !important;
            overflow-x: hidden !important;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        /* Ensure responsive classes work */
        .md\:hidden { display: none !important; }
        .sm\:block { display: block !important; }
        .lg\:hidden { display: none !important; }

        /* Fix common mobile layout issues */
        .container, .max-w-7xl, .max-w-6xl, .max-w-5xl {
            max-width: 100% !important;
            padding-left: 1rem !important;
            padding-right: 1rem !important;
        }
    }
</style>
