<?php

// This file is to specify PHP requirements for Vercel deployment
// It ensures that PHP 8.2 is used with vercel-php@0.6.1

// Dummy test to verify PHP version
if (version_compare(PHP_VERSION, '8.2.0', '<')) {
    echo "PHP version must be at least 8.2.0. Current version: " . PHP_VERSION;
    exit(1);
}

echo "PHP version check passed: " . PHP_VERSION;
