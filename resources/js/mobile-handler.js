/**
 * Mobile-specific handlers for fixing common issues on production
 */

document.addEventListener('DOMContentLoaded', function() {
    // Check if we're on a mobile device
    const isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);

    if (isMobile) {
        console.log('Mobile device detected, applying fixes');

        // Fix for raw PHP code showing
        document.querySelectorAll('script').forEach(script => {
            if (script.innerHTML.includes('<?php')) {
                console.log('Found unprocessed PHP code, removing element');
                script.remove();
            }
        });

        // Check for any text nodes containing PHP code
        const walker = document.createTreeWalker(
            document.body,
            NodeFilter.SHOW_TEXT,
            null,
            false
        );

        const nodesToRemove = [];
        while (walker.nextNode()) {
            const node = walker.currentNode;
            if (node.textContent.includes('<?php') || node.textContent.includes('<?=')) {
                nodesToRemove.push(node);
            }
        }

        nodesToRemove.forEach(node => {
            console.log('Removing unprocessed PHP code from text node');
            node.parentNode.removeChild(node);
        });

        // Force Tailwind classes to apply
        const tailwindClasses = [
            'hidden', 'block', 'flex', 'grid', 'inline', 'inline-block',
            'md:hidden', 'md:block', 'md:flex', 'md:grid',
            'lg:hidden', 'lg:block', 'lg:flex', 'lg:grid',
            'sm:hidden', 'sm:block', 'sm:flex', 'sm:grid'
        ];

        // Apply a small CSS tweak to force a repaint
        const style = document.createElement('style');
        style.textContent = `
            ${tailwindClasses.map(cls => `.${cls.replace(':', '\\:')}`).join(', ')} {
                transform: translateZ(0);
            }

            /* Force mobile layout */
            @media (max-width: 768px) {
                body {
                    overflow-x: hidden;
                    width: 100%;
                }

                .sm\\:block {
                    display: block !important;
                }

                .md\\:hidden {
                    display: none !important;
                }
            }
        `;
        document.head.appendChild(style);

        // Check for missing CSS files and reload them if needed
        const cssFiles = Array.from(document.querySelectorAll('link[rel="stylesheet"]'));
        if (cssFiles.length < 2) {
            console.log('Missing CSS files detected, attempting to load Tailwind');

            // Create a new link element
            const tailwindLink = document.createElement('link');
            tailwindLink.rel = 'stylesheet';
            tailwindLink.href = '/build/assets/app.css?v=' + Date.now();
            document.head.appendChild(tailwindLink);
        }
    }
});
