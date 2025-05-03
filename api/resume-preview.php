<?php

// Special handler for PDF preview

// Check for mobile
$isMobile = false;
if (isset($_SERVER['HTTP_USER_AGENT']) && (
    strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false ||
    strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false ||
    strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone') !== false ||
    strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') !== false
)) {
    $isMobile = true;
}

// If on mobile, let's add more specific headers to help browsers
if ($isMobile) {
    error_log('Mobile device detected for resume preview: ' . ($_SERVER['HTTP_USER_AGENT'] ?? 'Unknown'));
}

// Set headers for inline PDF display
header('Content-Type: application/pdf');
header('Content-Disposition: inline; filename="Abraham_Opuba_Resume.pdf"');
header('Cache-Control: public, max-age=86400');
header('X-Content-Type-Options: nosniff');
header('Accept-Ranges: bytes');

// Look for resume PDF in expected locations
$resumeLocations = [
    __DIR__ . '/../public/documents/abraham-opuba-resume.pdf',
    __DIR__ . '/../public/resume.pdf',
    __DIR__ . '/../public/assets/resume.pdf',
    __DIR__ . '/../storage/app/public/resume.pdf',
];

// Try to find the resume PDF
$resumeFile = null;
foreach ($resumeLocations as $location) {
    if (file_exists($location)) {
        $resumeFile = $location;
        break;
    }
}

// If PDF not found in expected locations, try to find any PDF
if (!$resumeFile) {
    $publicDir = __DIR__ . '/../public';
    $pattern = '/**/*resume*.pdf';
    $files = glob($publicDir . $pattern, GLOB_BRACE);

    if (!empty($files)) {
        $resumeFile = $files[0];
    }
}

if ($resumeFile) {
    // Output the PDF file for inline viewing
    error_log('Serving resume PDF from: ' . $resumeFile);

    // Get file size
    $filesize = filesize($resumeFile);
    header('Content-Length: ' . $filesize);

    // Add additional mobile browser compatibility
    if ($isMobile) {
        // These headers help mobile browsers handle PDFs better
        header('Pragma: public');
        header('Expires: 0');
    }

    // Read the file and output it
    readfile($resumeFile);
    exit;
} else {
    // No resume PDF found
    header('HTTP/1.1 404 Not Found');
    include __DIR__ . '/error.php';
}
