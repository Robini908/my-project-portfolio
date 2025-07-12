<?php

// Set up the temporary storage directories
$tmpDirs = [
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/cache',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/logs',
];

foreach ($tmpDirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

// Fix for Vercel routing
$_SERVER['SCRIPT_NAME'] = '/index.php';
$_SERVER['REQUEST_URI'] = $_SERVER['REQUEST_URI'] ?? $_SERVER['PATH_INFO'] ?? '/';

// Log all requests for debugging
error_log('DEBUG REQUEST: ' . $_SERVER['REQUEST_URI']);

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

// Set security headers
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: SAMEORIGIN');
header('X-XSS-Protection: 1; mode=block');
header('Referrer-Policy: strict-origin-when-cross-origin');
header('Strict-Transport-Security: max-age=31536000; includeSubDomains');

// Forward Vercel requests to Laravel application
require __DIR__ . '/../public/index.php';
