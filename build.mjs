import { exec } from 'child_process';
import { promisify } from 'util';

const execAsync = promisify(exec);

async function build() {
  try {
    console.log('🚀 Starting build process...');

    // Run PHP setup script
    console.log('📂 Setting up environment...');
    await execAsync('php api/setup-vercel.php');

    // Copy environment file
    await execAsync('cp .env.production .env');

    // Install PHP dependencies
    console.log('📦 Installing PHP dependencies...');
    await execAsync('composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist');

    // Build assets with Vite
    console.log('🔨 Building assets...');
    await execAsync('vite build');

    // Laravel commands
    console.log('⚙️ Optimizing Laravel...');
    await execAsync('php artisan storage:link');
    await execAsync('php artisan config:cache');
    await execAsync('php artisan route:cache');
    await execAsync('php artisan view:cache');

    console.log('✅ Build completed successfully!');
  } catch (error) {
    console.error('❌ Build failed:', error);
    process.exit(1);
  }
}

build();
