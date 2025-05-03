# Deploying Your Laravel Portfolio to Vercel

This guide covers the steps to deploy your Laravel portfolio project to Vercel.

## Prerequisites

- A [Vercel](https://vercel.com) account
- [Vercel CLI](https://vercel.com/docs/cli) installed (optional)
- Git repository with your Laravel application

## Deployment Steps

### 1. Prepare Your Project

Ensure your project is properly configured for Vercel deployment:

- The `vercel.json` file is present in your project root
- The `api/index.php` file is correctly configured
- The `.env.vercel` file contains the proper environment variables

### 2. Deploy via GitHub Integration (Recommended)

1. Push your code to GitHub
2. Log in to your Vercel account
3. Click "Add New" > "Project"
4. Select your repository
5. Configure the project:
   - Framework Preset: Other
   - Root Directory: ./
   - Build Command: node vercel-build.js
   - Output Directory: public
6. Click "Deploy"

### 3. Deploy via Vercel CLI

If you prefer using the command line:

```bash
# Install Vercel CLI if you haven't already
npm i -g vercel

# Login to Vercel
vercel login

# Deploy from the project directory
vercel
```

### 4. Set Environment Variables

After deployment, set these environment variables in the Vercel dashboard:

- APP_KEY: A Laravel application key (you can generate one with `php artisan key:generate --show`)
- APP_URL: Your Vercel deployment URL
- Any other required environment variables (e.g., database credentials)

### 5. Troubleshooting

If your deployment fails:

1. Check the deployment logs in the Vercel dashboard
2. Ensure the build script is executing correctly
3. Verify that all required environment variables are set
4. Make sure the project structure follows the requirements for Vercel deployment

Common issues:

- PHP version incompatibility: Vercel uses PHP 8.0 by default
- Missing environment variables
- Issues with the build process
- File access permissions

### 6. Maintaining Your Deployment

- Set up automatic deployments from your Git repository
- Monitor your deployment status and logs
- Update environment variables as needed

## Additional Resources

- [Vercel Documentation](https://vercel.com/docs)
- [Laravel Documentation](https://laravel.com/docs)
- [PHP on Vercel](https://vercel.com/guides/php) 
