/**
 * Mobile Fix Script - Automatically fixes common PHP/Tailwind issues on mobile
 * This file is loaded independently and doesn't depend on any framework
 */

(function() {
    // Detect mobile device
    const isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);

    if (!isMobile) {
        return; // Only apply fixes to mobile devices
    }

    console.log('[Mobile Fix] Applying mobile fixes...');

    // Function to remove PHP code
    function cleanupPHPCode() {
        // Check for PHP code in the page
        const bodyHTML = document.body.innerHTML;
        if (bodyHTML.includes('<?php') || bodyHTML.includes('<?=')) {
            console.log('[Mobile Fix] Found PHP code in page - cleaning up');

            // Remove PHP tags and code
            document.body.innerHTML = bodyHTML.replace(/(<\?php[^?]*\?>|<\?=.*\?>)/g, '');

            // Remove script tags containing PHP
            document.querySelectorAll('script').forEach(script => {
                if (script.innerHTML.includes('<?php')) {
                    console.log('[Mobile Fix] Removing script with PHP code');
                    script.remove();
                }
            });
        }
    }

    // Function to ensure Tailwind is loaded
    function ensureTailwindLoaded() {
        // Check if we have evidence that Tailwind isn't loaded
        const hasTailwind = Array.from(document.styleSheets).some(sheet => {
            try {
                return sheet.href && sheet.href.includes('app.css');
            } catch (e) {
                return false; // CORS issue reading stylesheet
            }
        });

        if (!hasTailwind) {
            console.log('[Mobile Fix] Tailwind CSS not detected - loading fallback');

            // Add fallback CSS
            const link = document.createElement('link');
            link.rel = 'stylesheet';
            link.href = '/mobile-fallback.css?v=' + Date.now();
            document.head.appendChild(link);

            // Try to load the actual CSS again
            const mainCSS = document.createElement('link');
            mainCSS.rel = 'stylesheet';
            mainCSS.href = '/build/assets/app.css?v=' + Date.now();
            document.head.appendChild(mainCSS);
        }

        // Ensure critical classes work
        const style = document.createElement('style');
        style.textContent = `
            @media (max-width: 768px) {
                .md\\:hidden { display: none !important; }
                .sm\\:block { display: block !important; }
                body { width: 100%; overflow-x: hidden; }
            }
        `;
        document.head.appendChild(style);
    }

    // Function to check content type
    function checkContentType() {
        // If we see raw PHP, the content type may be wrong
        const metaTags = document.querySelectorAll('meta');
        let hasContentType = false;

        metaTags.forEach(meta => {
            if (meta.httpEquiv === 'Content-Type') {
                hasContentType = true;
            }
        });

        if (!hasContentType) {
            console.log('[Mobile Fix] Adding content type meta tag');
            const meta = document.createElement('meta');
            meta.httpEquiv = 'Content-Type';
            meta.content = 'text/html; charset=UTF-8';
            document.head.appendChild(meta);
        }
    }

    // Apply fixes after page is loaded
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', applyFixes);
    } else {
        applyFixes();
    }

    function applyFixes() {
        // Run our fixes
        cleanupPHPCode();
        ensureTailwindLoaded();
        checkContentType();

        // Mark that fixes were applied
        const marker = document.createElement('div');
        marker.style.display = 'none';
        marker.id = 'mobile-fixes-applied';
        marker.dataset.timestamp = Date.now();
        document.body.appendChild(marker);

        console.log('[Mobile Fix] Fixes applied successfully');
    }
})();
