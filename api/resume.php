<?php

// Handle both direct /resume requests and #resume anchors
if (isset($_SERVER['REQUEST_URI'])) {
    // Log the request for debugging
    error_log('Resume request: ' . $_SERVER['REQUEST_URI']);

    // Redirect anchor-only requests to the full URL if needed
    if ($_SERVER['REQUEST_URI'] === '/#resume') {
        header('Location: /resume');
        exit;
    }
}

// Include the main API handler to process the request
require __DIR__ . '/index.php';
