# Mobile Deployment Guide

This document provides guidance on handling mobile-specific issues in the production environment, particularly with Vercel deployment.

## Common Issues and Fixes

### 1. PHP Code Visible on Mobile

If raw PHP code is visible on mobile devices in production, this indicates that PHP code is not being properly processed by the server. This can happen due to several reasons:

- **Content-Type Issues**: Ensure all responses have the correct `Content-Type: text/html` header.
- **Mobile User-Agent Detection**: Some CDNs may handle mobile requests differently.
- **JavaScript Cleanup**: The `mobile-handler.js` script will automatically remove any visible PHP code on the client side.

### 2. Tailwind CSS Not Applied Correctly

When Tailwind styles don't apply correctly in production:

- **Cache Issues**: Mobile browsers may cache old CSS files. Force a cache refresh with query parameters.
- **Missing Files**: Check if all CSS files are being properly loaded in the browser network tab.
- **Content-Type Headers**: Ensure CSS files have the correct `Content-Type: text/css` header.
- **Fallback CSS**: A basic fallback CSS is provided at `/mobile-fallback.css` to ensure minimal styling.

### 3. Production Deployment Steps

When deploying to production:

1. Run `./production-deploy.sh` for a complete build with mobile optimizations.
2. Verify in the browser dev tools that all assets are loading correctly.
3. Use Chrome DevTools' "Mobile Emulation" to test different mobile devices.
4. Clear browser caches with `Ctrl+F5` or by adding a cache-busting parameter.

### 4. Vercel-Specific Configuration

Vercel uses serverless functions that require special handling:

- The `api/index.php` file has been enhanced to properly handle mobile requests.
- The `vercel.json` file contains specific routes for handling different file types.
- Mobile detection is implemented through the PHP middleware and JavaScript.

### 5. Troubleshooting

If mobile issues persist:

1. **Clear Vercel Edge Cache**: Go to Vercel Dashboard > Project > Settings > Domains > Clear Edge Cache.
2. **Inspect Network Requests**: Check the network tab for any failed/pending requests.
3. **Add Debug Logging**: Temporarily enable additional logging in `mobile-handler.js`.
4. **Test on Multiple Devices**: Issues may be device or browser-specific.

### 6. Developer Tips

- Use the mobile middleware to check if the request is from a mobile device.
- Add mobile-specific views when necessary.
- Test with a variety of mobile devices and screen sizes.
- Consider implementing service workers for better offline experience.

## Future Improvements

- Implement proper HTTP caching headers for all routes.
- Add better error handling for mobile network conditions.
- Implement lazy loading for images and heavy content.
- Consider implementing responsive images for different screen sizes.
- Use content delivery networks (CDNs) for static assets.

Remember to test any changes thoroughly across multiple devices before deploying to production. 
