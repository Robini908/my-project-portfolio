<?php

// This bootstrap file handles Vercel-specific Laravel environment setup
// It fixes issues with storage paths and middleware stack initialization

// Ensure proper tmp directory structure
$tmpDirectories = [
    '/tmp/storage/framework/cache',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/logs',
    '/tmp/bootstrap/cache',
];

foreach ($tmpDirectories as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

// Essential environment variables
$envVariables = [
    'APP_STORAGE' => '/tmp',
    'VIEW_COMPILED_PATH' => '/tmp/views',
    'SESSION_DRIVER' => 'array',
    'LOG_CHANNEL' => 'stderr',
    'APP_CONFIG_CACHE' => '/tmp/config.php',
    'APP_EVENTS_CACHE' => '/tmp/events.php',
    'APP_PACKAGES_CACHE' => '/tmp/packages.php',
    'APP_ROUTES_CACHE' => '/tmp/routes.php',
    'APP_SERVICES_CACHE' => '/tmp/services.php',
    'CACHE_DRIVER' => 'array',
];

// Set environment variables
foreach ($envVariables as $key => $value) {
    putenv("$key=$value");
    $_ENV[$key] = $value;
    $_SERVER[$key] = $value;
}

// Fix middleware stack issues
// These variables help Laravel initialize correctly in Vercel's serverless environment
$_ENV['APP_RUNNING_IN_CONSOLE'] = false;
$_ENV['APP_RUNNING_UNIT_TESTS'] = false;
$_SERVER['APP_RUNNING_IN_CONSOLE'] = false;
$_SERVER['APP_RUNNING_UNIT_TESTS'] = false;

// Fix for TrimStrings middleware
$_ENV['MIDDLEWARE_SKIP_TRIM'] = true;
$_SERVER['MIDDLEWARE_SKIP_TRIM'] = true;

// Fix for request URI
if (!isset($_SERVER['REQUEST_URI'])) {
    $_SERVER['REQUEST_URI'] = $_SERVER['PATH_INFO'] ?? '/';
}

// Fix for HTTP method
if (!isset($_SERVER['REQUEST_METHOD'])) {
    $_SERVER['REQUEST_METHOD'] = 'GET';
}

// Create a SQLite database if it doesn't exist
if (!file_exists('/tmp/database.sqlite') && isset($_ENV['DB_CONNECTION']) && $_ENV['DB_CONNECTION'] === 'sqlite') {
    file_put_contents('/tmp/database.sqlite', '');
}

// Return environment is successfully bootstrapped
return true;
