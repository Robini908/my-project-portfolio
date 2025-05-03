#!/bin/sh

# Exit on error
set -e

echo "🚀 Starting Vercel build process..."

echo "📊 Environment information:"
echo "Node version: $(node -v)"
echo "NPM version: $(npm -v)"
echo "PHP version: $(php -v | head -n 1)"

# Copy the production environment file
echo "🔧 Setting up environment..."
cp .env.production .env

# Create SQLite database
echo "🗃️ Setting up database..."
touch /tmp/database.sqlite
mkdir -p database
cp /tmp/database.sqlite database/database.sqlite

# Install dependencies
echo "📦 Installing PHP dependencies..."
composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist

echo "📦 Installing Node.js dependencies..."
npm ci --no-audit

echo "🔨 Building assets..."
npm run build

# Create storage directories
echo "📂 Setting up storage directories..."
mkdir -p storage/app/public
mkdir -p storage/framework/cache
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views
mkdir -p storage/logs

# Create tmp directories for Vercel
mkdir -p /tmp/app/public
mkdir -p /tmp/framework/cache
mkdir -p /tmp/framework/sessions
mkdir -p /tmp/framework/views
mkdir -p /tmp/logs

# Setup storage symlink
echo "🔗 Creating storage link..."
php artisan storage:link

# Generate app key if needed
if [ -z "$APP_KEY" ]; then
    echo "🔑 Generating application key..."
    php artisan key:generate --force
fi

# Create schedule endpoint for cron jobs
echo "⏰ Setting up scheduler endpoint..."
cat > api/schedule.php << 'EOL'
<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$status = $kernel->call('schedule:run');
echo "Schedule completed with status: $status";
EOL

# Optimize Laravel
echo "⚡ Optimizing Laravel..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "✅ Build completed successfully!"
