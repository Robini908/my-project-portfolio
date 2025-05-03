<?php

/**
 * Set up environment variables for Laravel on Vercel.
 */
function setupVercelRuntime()
{
    // Create necessary directories if they don't exist
    $directories = [
        '/tmp/app',
        '/tmp/app/public',
        '/tmp/framework',
        '/tmp/framework/cache',
        '/tmp/framework/sessions',
        '/tmp/framework/views',
        '/tmp/logs',
        '/tmp/cache',
        '/tmp/views'
    ];

    foreach ($directories as $directory) {
        if (!is_dir($directory)) {
            @mkdir($directory, 0755, true);
        }
    }

    // Set up environment variables
    $vercelEnvVars = [
        'APP_KEY',
        'DB_CONNECTION',
        'DB_DATABASE',
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

    // Make sure the database exists and is writable
    if (getenv('DB_CONNECTION') === 'sqlite') {
        $dbPath = getenv('DB_DATABASE') ?: '/tmp/database.sqlite';
        if (!file_exists($dbPath)) {
            @touch($dbPath);
            @chmod($dbPath, 0666);
        }
    }
}

// Run the setup
setupVercelRuntime();
