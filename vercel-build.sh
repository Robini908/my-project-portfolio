#!/bin/bash

# Exit on error
set -e

echo "🚀 Starting Vercel build process..."

# Create necessary directories
echo "📂 Setting up directories..."
mkdir -p /tmp/storage/framework/views
mkdir -p /tmp/storage/framework/cache
mkdir -p /tmp/storage/framework/sessions
mkdir -p /tmp/storage/logs
mkdir -p public/build

# Copy the environment file
echo "🔧 Setting up environment..."
cp .env.vercel .env

# Create an empty SQLite database
echo "🗃️ Setting up database..."
touch /tmp/database.sqlite

# Install dependencies
echo "📦 Installing Node.js dependencies..."
npm ci || npm install

# Build assets
echo "🔨 Building assets..."
npm run build

echo "✅ Build completed successfully!"
