<?php

/**
 * Vercel-specific helpers for Laravel
 */

// Create required directories
if (!is_dir('/tmp/storage/framework/views')) {
    mkdir('/tmp/storage/framework/views', 0755, true);
}

if (!is_dir('/tmp/storage/framework/cache')) {
    mkdir('/tmp/storage/framework/cache', 0755, true);
}

if (!is_dir('/tmp/storage/framework/sessions')) {
    mkdir('/tmp/storage/framework/sessions', 0755, true);
}

if (!is_dir('/tmp/storage/logs')) {
    mkdir('/tmp/storage/logs', 0755, true);
}

// Fix URI path for Vercel
$_SERVER['REQUEST_URI'] = $_SERVER['REQUEST_URI'] ?? $_SERVER['PATH_INFO'] ?? '/';

// Fix query string if it exists
if (isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] !== '') {
        $_SERVER['REQUEST_URI'] .= '?' . $_SERVER['QUERY_STRING'];
    }

// Fix script name for routing
$_SERVER['SCRIPT_NAME'] = '/index.php';

// Fix for Laravel path_info
if (!isset($_SERVER['PATH_INFO']) && isset($_SERVER['REQUEST_URI'])) {
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $_SERVER['PATH_INFO'] = $path;
}

// Fix for HTTPS detection
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
    header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Accept, Origin, Authorization');
        header('Access-Control-Max-Age: 86400');
        exit(0);
}

// Set security headers
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
header('X-XSS-Protection: 1; mode=block');
header('Referrer-Policy: strict-origin-when-cross-origin');

// Fix env vars for Vercel
putenv('APP_CONFIG_CACHE=/tmp/config.php');
putenv('APP_EVENTS_CACHE=/tmp/events.php');
putenv('APP_PACKAGES_CACHE=/tmp/packages.php');
putenv('APP_ROUTES_CACHE=/tmp/routes.php');
putenv('APP_SERVICES_CACHE=/tmp/services.php');
putenv('VIEW_COMPILED_PATH=/tmp/views');
putenv('CACHE_DRIVER=array');
putenv('LOG_CHANNEL=stderr');
putenv('SESSION_DRIVER=array');

// Ensure storage path is set
if (!getenv('STORAGE_DIR')) {
    putenv('STORAGE_DIR=/tmp');
}

// Create database if not exists
if (!file_exists('/tmp/database.sqlite')) {
    file_put_contents('/tmp/database.sqlite', '');
}

// Handle Vercel environment issues
if (isset($_ENV['VERCEL_URL']) && !getenv('APP_URL')) {
    putenv('APP_URL=https://' . $_ENV['VERCEL_URL']);
}

// End of Vercel helpers
