#!/bin/bash

# Exit on error
set -e

echo "🚀 Starting Vercel deployment..."

# Install dependencies
echo "📦 Installing Node.js dependencies..."
npm ci

# Build assets
echo "🔨 Building assets..."
npm run build

echo "✅ Build completed successfully!"
