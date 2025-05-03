<?php

// Ensure errors are displayed
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    // Create database
    echo "Creating database...\n";
    @touch('/tmp/database.sqlite');
    if (!is_dir('database')) {
        @mkdir('database', 0755, true);
    }

    // Make sure the database file is writable
    @copy('/tmp/database.sqlite', 'database/database.sqlite');
    @chmod('database/database.sqlite', 0666);
    @chmod('/tmp/database.sqlite', 0666);

    // Create symbolic link to ensure both paths work
    if (file_exists('database/database.sqlite') && !is_link('/tmp/database.sqlite')) {
        @unlink('/tmp/database.sqlite');
        @symlink(realpath('database/database.sqlite'), '/tmp/database.sqlite');
    }

    // Create storage directories
    echo "Creating storage directories...\n";
    $directories = [
        'storage/app/public',
        'storage/framework/cache',
        'storage/framework/sessions',
        'storage/framework/views',
        'storage/logs',
        '/tmp/app/public',
        '/tmp/framework/cache',
        '/tmp/framework/sessions',
        '/tmp/framework/views',
        '/tmp/logs',
        '/tmp/cache',
        '/tmp/views'
    ];

    foreach ($directories as $dir) {
        if (!is_dir($dir)) {
            @mkdir($dir, 0755, true);
        }
        // Make sure directories are writable
        @chmod($dir, 0755);
    }

    // Create .env file if it doesn't exist
    if (!file_exists('.env') && file_exists('.env.production')) {
        @copy('.env.production', '.env');
    }

    echo "Environment setup complete!\n";
} catch (Exception $e) {
    echo "Error during setup: " . $e->getMessage() . "\n";
    // Continue anyway, don't fail the build
}
