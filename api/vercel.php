<?php

/**
 * This file contains helper functions for Vercel deployment.
 */

/**
 * Fix the server variables for Vercel.
 */
function fixServerVars()
{
    // Fix REQUEST_URI to include query string if exists
    if (isset($_SERVER['QUERY_STRING']) && !empty($_SERVER['QUERY_STRING'])) {
        $_SERVER['REQUEST_URI'] .= '?' . $_SERVER['QUERY_STRING'];
    }

    // Fix HTTPS detection
    if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
        $_SERVER['HTTPS'] = 'on';
    }

    // Set the server name from the host header
    if (isset($_SERVER['HTTP_HOST'])) {
        $_SERVER['SERVER_NAME'] = $_SERVER['HTTP_HOST'];
    }

    // Handle CORS preflight requests
    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Accept, Authorization');
        header('Access-Control-Max-Age: 86400');
        exit(0);
    }
}

/**
 * Set up environment variables for Laravel on Vercel.
 */
function setupEnvForVercel()
{
    // Add Vercel environment variables if they exist
    $vercelEnvVars = [
        'APP_KEY',
        'DB_CONNECTION',
        'DB_HOST',
        'DB_PORT',
        'DB_DATABASE',
        'DB_USERNAME',
        'DB_PASSWORD',
        'MAIL_HOST',
        'MAIL_PORT',
        'MAIL_USERNAME',
        'MAIL_PASSWORD',
        'MAIL_FROM_ADDRESS',
        'GOOGLE_MAPS_API_KEY'
    ];

    foreach ($vercelEnvVars as $var) {
        if (!getenv($var) && isset($_ENV[$var])) {
            putenv("$var=" . $_ENV[$var]);
        }
    }

    // Set common Laravel paths to /tmp for Vercel compatibility
    $tempPaths = [
        'APP_STORAGE' => '/tmp/app',
        'VIEW_COMPILED_PATH' => '/tmp/views',
        'SESSION_DRIVER' => 'array',
        'LOG_CHANNEL' => 'stderr',
        'CACHE_DRIVER' => 'array',
    ];

    foreach ($tempPaths as $key => $value) {
        putenv("$key=$value");
        $_ENV[$key] = $value;
        $_SERVER[$key] = $value;
    }

    // Create necessary directories
    createStorageDirectories();
}

/**
 * Create necessary storage directories.
 */
function createStorageDirectories()
{
    $directories = [
        '/tmp/app',
        '/tmp/app/public',
        '/tmp/framework',
        '/tmp/framework/cache',
        '/tmp/framework/sessions',
        '/tmp/framework/views',
        '/tmp/logs',
    ];

    foreach ($directories as $directory) {
        if (!is_dir($directory)) {
            mkdir($directory, 0755, true);
        }
    }
}

/**
 * Set security headers
 */
function setSecurityHeaders()
{
    $headers = [
        'X-Content-Type-Options' => 'nosniff',
        'X-Frame-Options' => 'DENY',
        'X-XSS-Protection' => '1; mode=block',
        'Referrer-Policy' => 'strict-origin-when-cross-origin',
        'Permissions-Policy' => 'accelerometer=(), camera=(), geolocation=(), gyroscope=(), magnetometer=(), microphone=(), payment=(), usb=()'
    ];

    foreach ($headers as $key => $value) {
        header("$key: $value");
    }
}

// Apply all configurations
fixServerVars();
setupEnvForVercel();
setSecurityHeaders();
