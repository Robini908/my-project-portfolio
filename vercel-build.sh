#!/bin/bash

# Exit on error
set -e

echo "Starting Vercel build process..."

# Display versions
echo "Node version: $(node -v)"
echo "NPM version: $(npm -v)"
echo "PHP version: $(php -v | head -n 1)"

# Create environment file
echo "Creating environment file..."
cp .env.production .env

# Install PHP dependencies
echo "Installing PHP dependencies..."
composer install --no-dev --optimize-autoloader --no-interaction

# Install Node.js dependencies
echo "Installing Node.js dependencies..."
npm ci --no-audit --no-fund

# Build assets
echo "Building frontend assets..."
npm run build

# Create necessary directories
echo "Creating storage directories..."
mkdir -p storage/app/public
mkdir -p storage/framework/cache
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views
mkdir -p storage/logs
chmod -R 777 storage

# Create symbolic link
echo "Creating storage link..."
php artisan storage:link

# Generate key if not exists
if [ -z "$APP_KEY" ]; then
    echo "Generating application key..."
    php artisan key:generate --force
fi

# Optimize Laravel
echo "Optimizing Laravel..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Build completed successfully!"
