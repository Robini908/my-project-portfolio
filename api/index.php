<?php

// Load Vercel specific configurations
if (file_exists(__DIR__ . '/vercel.php')) {
    require __DIR__ . '/vercel.php';
}

// Check if we're running on Vercel
$isVercel = getenv('VERCEL') !== false;

if ($isVercel) {
    // Vercel environment setup
    if (file_exists(__DIR__ . '/../storage/framework/maintenance.php')) {
        require __DIR__ . '/../storage/framework/maintenance.php';
    }

    // Fix asset URL for Vercel
    $appUrl = getenv('VERCEL_URL');
    if ($appUrl) {
        putenv("APP_URL=https://$appUrl");
        $_ENV['APP_URL'] = "https://$appUrl";
    }
}

// Forward Vercel requests to normal index.php
require __DIR__ . '/../public/index.php';
