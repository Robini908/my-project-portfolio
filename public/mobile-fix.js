/**
 * Professional Mobile Fix Script
 * Cleans up display issues and ensures proper mobile experience
 */

(function() {
    'use strict';

    // Detect mobile device
    const isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);

    if (!isMobile) {
        return; // Only apply fixes to mobile devices
    }

    console.log('[Mobile Fix] Initializing mobile optimizations...');

    // Function to clean up any visible PHP code
    function cleanupPHPCode() {
        console.log('[Mobile Fix] Cleaning up any visible PHP code...');

        // Remove any elements containing raw PHP code
        const elementsWithPHP = document.querySelectorAll('*');
        elementsWithPHP.forEach(element => {
            if (element.textContent && (element.textContent.includes('<?php') || element.textContent.includes('<?='))) {
                console.log('[Mobile Fix] Hiding element with PHP code:', element.tagName);
                element.style.display = 'none';
            }
        });

        // Clean up script tags with PHP
        document.querySelectorAll('script').forEach(script => {
            if (script.innerHTML.includes('<?php') || script.innerHTML.includes('<?=')) {
                console.log('[Mobile Fix] Removing script with PHP code');
                script.remove();
            }
        });
    }

    // Function to ensure proper mobile styling
    function ensureMobileStyling() {
        console.log('[Mobile Fix] Applying mobile styling fixes...');

        // Add critical mobile styles
        const style = document.createElement('style');
        style.id = 'mobile-fix-styles';
        style.textContent = `
            /* Critical mobile fixes */
            html, body {
                width: 100% !important;
                overflow-x: hidden !important;
                -webkit-text-size-adjust: 100%;
                -ms-text-size-adjust: 100%;
            }

            @media (max-width: 768px) {
                .md\\:hidden, .lg\\:hidden { display: none !important; }
                .sm\\:block { display: block !important; }
                .sm\\:flex { display: flex !important; }

                .container, .max-w-7xl, .max-w-6xl, .max-w-5xl {
                    max-width: 100% !important;
                    padding-left: 1rem !important;
                    padding-right: 1rem !important;
                }

                img { max-width: 100%; height: auto; }
            }
        `;

        if (!document.getElementById('mobile-fix-styles')) {
            document.head.appendChild(style);
        }
    }

    // Function to load fallback CSS if needed
    function loadFallbackCSS() {
        console.log('[Mobile Fix] Loading fallback CSS...');
        const link = document.createElement('link');
        link.rel = 'stylesheet';
        link.href = '/mobile-fallback.css?v=' + Date.now();
        link.onload = () => console.log('[Mobile Fix] Fallback CSS loaded');
        document.head.appendChild(link);
    }

    // Apply fixes immediately and on DOM ready
    function applyFixes() {
        console.log('[Mobile Fix] Applying all fixes...');

        // Run our fixes
        cleanupPHPCode();
        ensureMobileStyling();
        loadFallbackCSS();

        // Mark that fixes were applied
        const marker = document.createElement('div');
        marker.style.display = 'none';
        marker.id = 'mobile-fixes-applied';
        marker.dataset.timestamp = Date.now();
        document.body.appendChild(marker);

        console.log('[Mobile Fix] All fixes applied successfully');
    }

    // Apply fixes immediately if DOM is ready, otherwise wait
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', applyFixes);
    } else {
        applyFixes();
    }

    // Also apply fixes after a short delay to catch any late-loading content
    setTimeout(applyFixes, 1000);
})();
