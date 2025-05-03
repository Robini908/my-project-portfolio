<?php
// Include Vercel helpers to fix server variables
require __DIR__ . '/vercel.php';

// Check if the public directory and index.php exist
$publicIndex = __DIR__ . '/../public/index.php';
if (!file_exists($publicIndex)) {
    http_response_code(500);
    echo "Server configuration error: Unable to locate main application file.";
    exit;
}

// Forward Vercel requests to normal index.php
require $publicIndex;
