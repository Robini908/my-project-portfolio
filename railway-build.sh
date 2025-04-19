#!/bin/bash

# Exit on error
set -e

echo "Starting Railway build process..."

# Install Composer dependencies
composer install --no-interaction --prefer-dist --optimize-autoloader --no-dev

# Install NPM dependencies and build assets
npm ci
npm run build

# Set up storage directories
mkdir -p storage/app/public
mkdir -p storage/framework/cache
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views
mkdir -p storage/logs
chmod -R 755 storage

# Create symbolic link for storage
php artisan storage:link

# Generate application key if it doesn't exist
php artisan key:generate --force

# Cache configuration
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Build completed successfully!"
