#!/bin/bash

echo "Running Vercel build script..."

# Copy the production environment file if it doesn't exist
if [ ! -f .env ]; then
  echo "Creating .env file from .env.production..."
  cp .env.production .env
fi

# Install PHP dependencies
echo "Installing PHP dependencies..."
composer install --no-dev --optimize-autoloader

# Install Node.js dependencies and build assets
echo "Installing Node.js dependencies..."
npm ci

echo "Building frontend assets..."
npm run build

# Basic Laravel setup
echo "Optimizing Laravel..."
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan storage:link

# Ensure the tmp directories exist for Vercel
echo "Setting up temporary directories..."
mkdir -p /tmp/app/public
mkdir -p /tmp/framework/cache
mkdir -p /tmp/framework/sessions
mkdir -p /tmp/framework/views
mkdir -p /tmp/logs

# Ensure the public/storage symlink exists
if [ ! -d public/storage ]; then
  echo "Creating storage symlink..."
  ln -sf ../storage/app/public public/storage
fi

echo "Build completed successfully!"
