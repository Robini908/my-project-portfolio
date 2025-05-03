<?php

// Prevent raw PHP code from displaying in case of errors
ini_set('display_errors', '0');
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

// Include Vercel-specific bootstrap to ensure Laravel runs correctly
$bootstrapped = require_once __DIR__ . '/bootstrap.php';

// Fix for Vercel routing
$_SERVER['SCRIPT_NAME'] = '/index.php';
$_SERVER['REQUEST_URI'] = $_SERVER['REQUEST_URI'] ?? $_SERVER['PATH_INFO'] ?? '/';

// Ensure proper Content-Type header is sent for all responses
if (!headers_sent()) {
    header('Content-Type: text/html; charset=UTF-8');
}

// Enhanced mobile detection
if (isset($_SERVER['HTTP_USER_AGENT']) && (
    strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false ||
    strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false ||
    strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone') !== false ||
    strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') !== false
)) {
    $_SERVER['IS_MOBILE'] = true;
    // Set a cookie to help with client-side detection
    setcookie('is_mobile', '1', 0, '/', '', true, false);
}

// Log all requests for debugging
error_log('DEBUG REQUEST: ' . $_SERVER['REQUEST_URI'] . ' | UA: ' . ($_SERVER['HTTP_USER_AGENT'] ?? 'Unknown') . ' | Mobile: ' . (isset($_SERVER['IS_MOBILE']) ? 'Yes' : 'No'));

// Handle special favicon requests that are causing 404 errors
if ($_SERVER['REQUEST_URI'] === '/favicon.ico' || $_SERVER['REQUEST_URI'] === '/favicon.png') {
    if (file_exists(__DIR__ . '/../public' . $_SERVER['REQUEST_URI'])) {
        // Serve the actual favicon if it exists
        $contentType = $_SERVER['REQUEST_URI'] === '/favicon.ico' ? 'image/x-icon' : 'image/png';
        header('Content-Type: ' . $contentType);
        header('Cache-Control: public, max-age=86400');
        readfile(__DIR__ . '/../public' . $_SERVER['REQUEST_URI']);
    } else {
        // Return a 204 No Content for missing favicons to avoid flooding logs with 404s
        header('HTTP/1.1 204 No Content');
    }
    exit;
}

// Enhanced resume handling
if (strpos($_SERVER['REQUEST_URI'], 'resume') !== false) {
    error_log('DEBUG: Resume page requested: ' . $_SERVER['REQUEST_URI']);

    // Handle fragment identifiers (anchors)
    if ($_SERVER['REQUEST_URI'] === '/#resume') {
        $_SERVER['REQUEST_URI'] = '/resume';
    }

    // Extract resume format for download
    if (preg_match('/\/resume\/download\/(pdf|docx|txt)/', $_SERVER['REQUEST_URI'], $matches)) {
        $format = $matches[1] ?? 'pdf';
        header('Location: /api/resume-download.php?format=' . $format);
        exit;
    }

    // Handle PDF preview requests
    if ($_SERVER['REQUEST_URI'] === '/resume-preview' ||
        $_SERVER['REQUEST_URI'] === '/documents/abraham-opuba-resume.pdf') {
        error_log('DEBUG: Resume preview requested, redirecting to dedicated handler');
        header('Location: /api/resume-preview.php');
        exit;
    }
}

// Enhanced skills page handling to ensure images load
if (strpos($_SERVER['REQUEST_URI'], 'skills') !== false ||
    strpos($_SERVER['REQUEST_URI'], '/images/') !== false ||
    strpos($_SERVER['REQUEST_URI'], '/assets/') !== false) {
    error_log('DEBUG: Skills or asset request: ' . $_SERVER['REQUEST_URI']);

    // For images, try to map to the correct public path
    if (preg_match('/\.(jpe?g|png|gif|svg|webp|ico)$/', $_SERVER['REQUEST_URI'])) {
        $filePath = __DIR__ . '/../public' . $_SERVER['REQUEST_URI'];
        if (file_exists($filePath)) {
            $ext = pathinfo($filePath, PATHINFO_EXTENSION);
            $contentType = 'image/jpeg';

            switch ($ext) {
                case 'png': $contentType = 'image/png'; break;
                case 'gif': $contentType = 'image/gif'; break;
                case 'svg': $contentType = 'image/svg+xml'; break;
                case 'webp': $contentType = 'image/webp'; break;
                case 'ico': $contentType = 'image/x-icon'; break;
            }

            header('Content-Type: ' . $contentType);
            header('Cache-Control: public, max-age=86400');
            readfile($filePath);
            exit;
        }
    }
}

// Enhanced asset handling for CSS and JS files
if (preg_match('/\.(css|js)$/i', $_SERVER['REQUEST_URI'])) {
    $filePath = __DIR__ . '/../public' . $_SERVER['REQUEST_URI'];
    // Check if file exists in public directory
    if (file_exists($filePath)) {
        $ext = pathinfo($filePath, PATHINFO_EXTENSION);
        $contentType = $ext === 'css' ? 'text/css' : 'application/javascript';

        header('Content-Type: ' . $contentType);
        header('Cache-Control: public, max-age=31536000, immutable');
        readfile($filePath);
        exit;
    }

    // Also check in the build directory as Vite might output files there
    $buildPath = __DIR__ . '/../public/build' . str_replace('/build', '', $_SERVER['REQUEST_URI']);
    if (file_exists($buildPath)) {
        $ext = pathinfo($buildPath, PATHINFO_EXTENSION);
        $contentType = $ext === 'css' ? 'text/css' : 'application/javascript';

        header('Content-Type: ' . $contentType);
        header('Cache-Control: public, max-age=31536000, immutable');
        readfile($buildPath);
        exit;
    }
}

// Block direct access to PHP files that may have leaked into public
if (preg_match('/\.php$/i', $_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] !== '/index.php') {
    header('HTTP/1.1 404 Not Found');
    echo "Page not found";
    exit;
}

// Fix query string if it exists
if (isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] !== '') {
    if (strpos($_SERVER['REQUEST_URI'], '?') === false) {
        $_SERVER['REQUEST_URI'] .= '?' . $_SERVER['QUERY_STRING'];
    }
}

// Enable HTTPS
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
    $_SERVER['HTTPS'] = 'on';
}

// Set security headers - don't set Content-Type as Laravel will handle this
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: SAMEORIGIN');
header('X-XSS-Protection: 1; mode=block');
header('Referrer-Policy: strict-origin-when-cross-origin');
header('Strict-Transport-Security: max-age=31536000; includeSubDomains');

// Additional mobile-friendly headers
header('Vary: User-Agent');

// Forward Vercel requests to Laravel application
try {
    // Before requiring the Laravel application, check for root path requests
    if ($_SERVER['REQUEST_URI'] === '/' || $_SERVER['REQUEST_URI'] === '') {
        // For the home page, set a flag to enable special handling in Laravel
        $_ENV['VERCEL_HOME_REQUEST'] = true;
        $_SERVER['VERCEL_HOME_REQUEST'] = true;
    }

    // Ensure Vite assets are correctly loaded
    if (!defined('LARAVEL_START')) {
        define('LARAVEL_START', microtime(true));
    }

    // Include Laravel's public/index.php to bootstrap the application
    require __DIR__ . '/../public/index.php';
} catch (Throwable $e) {
    error_log('Laravel Error: ' . $e->getMessage() . ' at ' . $e->getFile() . ':' . $e->getLine());
    error_log('Stack trace: ' . $e->getTraceAsString());

    // Check for middleware failures
    if (strpos($e->getMessage(), 'TrimStrings') !== false ||
        strpos($e->getMessage(), 'TransformsRequest') !== false ||
        strpos($e->getMessage(), 'HandleCors') !== false ||
        strpos($e->getMessage(), 'Pipeline') !== false) {
        error_log('Middleware error detected - sending fallback response');

        // Special recovery for middleware failures
        header('Content-Type: text/html; charset=UTF-8');
        // Redirect to a specific route that doesn't use middleware
        header('Location: /error?status=500&message=Application+Error');
        exit;
    }

    // Don't expose error details in production, show a user-friendly error page
    header('HTTP/1.1 500 Internal Server Error');
    include __DIR__ . '/error.php';
}
