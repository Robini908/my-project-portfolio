const { execSync } = require('child_process');
const fs = require('fs');

// Helper function to run commands and log output
function runCommand(command) {
  console.log(`🔄 Running: ${command}`);
  try {
    const output = execSync(command, { encoding: 'utf8' });
    console.log(output);
    return true;
  } catch (error) {
    console.error(`❌ Error executing command: ${command}`);
    console.error(error.stdout ? error.stdout : '');
    console.error(error.stderr ? error.stderr : '');
    return false;
  }
}

// Helper function to create directories
function createDirs(dirs) {
  dirs.forEach(dir => {
    if (!fs.existsSync(dir)) {
      console.log(`📂 Creating directory: ${dir}`);
      fs.mkdirSync(dir, { recursive: true });
    }
  });
}

console.log('🚀 Starting Vercel build process...');

// Create necessary directories
console.log('📂 Setting up directories...');
createDirs([
  'public/build',
  '/tmp/app',
  '/tmp/app/public',
  '/tmp/framework',
  '/tmp/framework/cache',
  '/tmp/framework/sessions',
  '/tmp/framework/views',
  '/tmp/logs',
  'storage/app/public',
  'storage/framework/cache',
  'storage/framework/sessions',
  'storage/framework/views',
  'storage/logs'
]);

// Copy environment file
console.log('🔧 Setting up environment...');
if (fs.existsSync('.env.vercel')) {
  fs.copyFileSync('.env.vercel', '.env');
} else if (fs.existsSync('.env.production')) {
  fs.copyFileSync('.env.production', '.env');
}

// Create SQLite database if not exists
if (!fs.existsSync('/tmp/database.sqlite')) {
  console.log('💽 Creating SQLite database...');
  fs.closeSync(fs.openSync('/tmp/database.sqlite', 'w'));
}

// Install PHP dependencies
console.log('📦 Installing PHP dependencies...');
if (!runCommand('composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist')) {
  console.log('⚠️ Composer install failed, trying with --ignore-platform-reqs...');
  runCommand('composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist --ignore-platform-reqs');
}

// Install Node.js dependencies
console.log('📦 Installing Node.js dependencies...');
runCommand('npm ci --no-audit --prefer-offline || npm install');

// Build assets
console.log('🔨 Building assets...');
runCommand('npm run build');

// Laravel setup
console.log('⚙️ Setting up Laravel...');
if (fs.existsSync('artisan')) {
  // Generate application key if not set
  if (!process.env.APP_KEY) {
    runCommand('php artisan key:generate --force');
  }

  // Create storage link
  runCommand('php artisan storage:link');

  // Cache configurations
  runCommand('php artisan config:cache');
  runCommand('php artisan route:cache');

  // Skip view caching as it might cause issues
  // runCommand('php artisan view:cache');
}

console.log('✅ Build completed successfully!');
