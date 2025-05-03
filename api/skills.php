<?php

// Special handler for the skills page to ensure all resources load properly
error_log('DEBUG: Skills page requested');

// Create a symlink to the public storage if it doesn't exist
$publicStoragePath = __DIR__ . '/../public/storage';
$storagePath = __DIR__ . '/../storage/app/public';
if (!file_exists($publicStoragePath) && is_dir($storagePath)) {
    @symlink($storagePath, $publicStoragePath);
}

// Include the main API handler
require __DIR__ . '/index.php';
