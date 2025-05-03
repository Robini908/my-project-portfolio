#!/bin/bash

# Exit on error but continue on specific commands that might fail
set -e

echo "🚀 Starting Vercel deployment build process..."

# Create necessary directories
echo "📂 Setting up directories..."
mkdir -p /tmp/storage/framework/views
mkdir -p /tmp/storage/framework/cache
mkdir -p /tmp/storage/framework/sessions
mkdir -p /tmp/storage/logs
mkdir -p public/build

# Copy the environment file for Vercel
echo "🔧 Setting up environment..."
cp .env.vercel .env

# Update the cache driver to array
echo "CACHE_DRIVER=array" >> .env
echo "SESSION_DRIVER=array" >> .env

# Clear only file-based caches, not database
echo "🧹 Clearing cached configs..."
php artisan config:clear
php artisan route:clear
php artisan view:clear

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
php artisan storage:link || true

# Optimize Laravel for production, skip database-related commands
echo "⚡ Optimizing Laravel..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Create mobile fallback styles
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

# Create a temporary file for mobile detection workaround
echo "📲 Creating mobile detection helper..."
cat > public/mobile-detect.html << 'EOL'
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Mobile Redirect</title>
    <style>
        body { font-family: sans-serif; margin: 0; padding: 0; }
    </style>
    <script>
        // Detect mobile device
        const isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);

        // Set a cookie and redirect
        if (isMobile) {
            document.cookie = "is_mobile=1; path=/; max-age=86400";
        } else {
            document.cookie = "is_mobile=0; path=/; max-age=86400";
        }

        // Redirect back to the original URL
        window.location.href = "/";
    </script>
</head>
<body>
    <p>Redirecting...</p>
</body>
</html>
EOL

echo "✅ Build completed successfully!"
echo "The application is now ready for Vercel deployment."
