# Free Laravel Deployment Options

This document outlines several free methods to deploy your Laravel application to production using the command line (CLI).

## Option 1: Render.com (Free Tier)

Render offers a free tier for web services that works well for Laravel applications.

### Prerequisites
- Git repository with your Laravel application
- A [Render.com](https://render.com) account

### Deployment Steps

1. Push your code to GitHub, GitLab, or another Git provider
2. Log in to your Render account
3. Click "New +" and select "Web Service"
4. Connect your repository
5. Configure the service:
   - Name: Your app name
   - Environment: PHP
   - Build Command: `./render-build.sh`
   - Start Command: `php artisan serve --host=0.0.0.0 --port=$PORT`
   - Select the Free plan
6. Click "Create Web Service"

### Using the CLI (via render-cli)

```bash
# Install render-cli
npm install -g @renderinc/cli

# Login to Render
render login

# Deploy your app
render deploy --template render.yaml
```

## Option 2: Railway.app (Free Tier)

Railway offers a free tier with usage-based pricing that works well for Laravel.

### Prerequisites
- Git repository with your Laravel application
- A [Railway.app](https://railway.app) account

### Deployment Steps

1. Install the Railway CLI:
```bash
npm i -g @railway/cli
```

2. Login to your Railway account:
```bash
railway login
```

3. Initialize a new project:
```bash
railway init
```

4. Deploy your application:
```bash
railway up
```

5. Configure environment variables through the Railway dashboard or CLI:
```bash
railway variables set APP_ENV=production APP_DEBUG=false
```

## Option 3: Fly.io (Free Tier)

Fly.io offers a generous free tier that works well for Laravel applications.

### Prerequisites
- A [Fly.io](https://fly.io) account
- Fly CLI installed

### Deployment Steps

1. Install the Fly CLI:
```bash
# On Windows with PowerShell:
iwr https://fly.io/install.ps1 -UseBsl | iex
```

2. Login to your Fly account:
```bash
fly auth login
```

3. Initialize a new Fly app:
```bash
fly launch
```

4. Deploy your application:
```bash
fly deploy
```

## Important Notes for All Deployments

1. Make sure your `.env.production` file is properly configured
2. Remove any sensitive information from public repositories
3. Ensure your database configuration works with the platform you choose
4. For SQLite, make sure the database file is writable
5. Set up proper mail configuration for contact forms

## Troubleshooting

If you encounter issues during deployment:

1. Check the deployment logs on your chosen platform
2. Verify that all environment variables are correctly set
3. Make sure storage directories are writable
4. Check for PHP version compatibility 
