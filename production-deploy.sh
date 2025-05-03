#!/bin/bash

# Exit on error
set -e

echo "🚀 Starting production deployment build process..."

# Create necessary directories
echo "📂 Setting up directories..."
mkdir -p /tmp/storage/framework/views
mkdir -p /tmp/storage/framework/cache
mkdir -p /tmp/storage/framework/sessions
mkdir -p /tmp/storage/logs
mkdir -p public/build

# Copy the environment file
echo "🔧 Setting up environment..."
cp .env.production .env

# Skip database creation since we're using in-memory SQLite
echo "🗃️ Using in-memory SQLite database..."

# Clear only file-based caches, not database
echo "🧹 Clearing cached configs..."
php artisan config:clear
php artisan route:clear
php artisan view:clear
# Skip cache:clear as it requires database connection
# php artisan cache:clear

# Install dependencies
echo "📦 Installing Node.js dependencies..."
npm ci || npm install

# Build assets with production settings
echo "🔨 Building assets..."
NODE_ENV=production npm run build

# Check if build was successful
if [ ! -d "public/build" ] || [ ! -f "public/build/manifest.json" ]; then
    echo "❌ Asset build failed. Check for errors above."
    exit 1
fi

echo "📂 Setting up storage links..."
php artisan storage:link

# Optimize Laravel for production, skip database-related commands
echo "⚡ Optimizing Laravel..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Fix any Tailwind purging issues by ensuring critical files are included
echo "🎨 Ensuring critical CSS/JS is preserved..."
touch public/build/mobile-fix-marker

# Special mobile fixes - create fallback CSS
echo "📱 Creating mobile fallback styles..."
cat > public/mobile-fallback.css << 'EOL'
/* Mobile fallback styles in case Tailwind fails to load */
body { font-family: sans-serif; margin: 0; padding: 0; width: 100%; overflow-x: hidden; }
@media (max-width: 768px) {
    .md\:hidden { display: none !important; }
    .sm\:block { display: block !important; }
    body { font-size: 16px; line-height: 1.5; }
}
@media (prefers-color-scheme: dark) {
    body { background-color: #1e293b; color: #f8fafc; }
}
EOL

# Set proper permissions
echo "🔒 Setting permissions..."
find public -type f -exec chmod 644 {} \; 2>/dev/null || true
find public -type d -exec chmod 755 {} \; 2>/dev/null || true

echo "✅ Build completed successfully!"
echo "The application is now ready for production deployment."
