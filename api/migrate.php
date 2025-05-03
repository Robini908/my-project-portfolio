<?php

// Ensure errors are displayed
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    // Load Laravel application
    require __DIR__ . '/../vendor/autoload.php';
    $app = require_once __DIR__ . '/../bootstrap/app.php';
    
    // Get the Artisan kernel
    $kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
    
    // Run migrations
    echo "Running database migrations...\n";
    $status = $kernel->call('migrate', [
        '--force' => true,
        '--seed' => true,
    ]);
    
    echo "Migration completed with status: $status\n";
    
    // Clear caches
    echo "Optimizing application...\n";
    $kernel->call('config:cache');
    $kernel->call('route:cache');
    $kernel->call('view:cache');
    
    echo "Application setup complete!\n";
} catch (Exception $e) {
    echo "Error during migration: " . $e->getMessage() . "\n";
    // Continue anyway, don't fail the build
    echo "Continuing with deployment despite migration error.\n";
}
