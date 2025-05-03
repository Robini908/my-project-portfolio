<?php

// Get requested format or default to PDF
$format = $_GET['format'] ?? 'pdf';

// Set content type based on format
$contentType = 'application/pdf';
$filename = 'Abraham_Opuba_Resume.pdf';

if ($format === 'docx') {
    $contentType = 'application/vnd.openxmlformats-officedocument.wordprocessingml.document';
    $filename = 'Abraham_Opuba_Resume.docx';
} elseif ($format === 'txt') {
    $contentType = 'text/plain';
    $filename = 'Abraham_Opuba_Resume.txt';
}

// Set headers for download
header('Content-Type: ' . $contentType);
header('Content-Disposition: attachment; filename="' . $filename . '"');
header('Cache-Control: public, max-age=86400');
header('X-Content-Type-Options: nosniff');

// Look for resume files in expected locations
$resumeLocations = [
    'pdf' => [
        __DIR__ . '/../public/resume.pdf',
        __DIR__ . '/../public/assets/resume.pdf',
        __DIR__ . '/../public/documents/resume.pdf',
        __DIR__ . '/../storage/app/public/resume.pdf',
    ],
    'docx' => [
        __DIR__ . '/../public/resume.docx',
        __DIR__ . '/../public/assets/resume.docx',
        __DIR__ . '/../public/documents/resume.docx',
        __DIR__ . '/../storage/app/public/resume.docx',
    ],
    'txt' => [
        __DIR__ . '/../public/resume.txt',
        __DIR__ . '/../public/assets/resume.txt',
        __DIR__ . '/../public/documents/resume.txt',
        __DIR__ . '/../storage/app/public/resume.txt',
    ]
];

// Try to find the requested format
$resumeFile = null;

if (isset($resumeLocations[$format])) {
    foreach ($resumeLocations[$format] as $location) {
        if (file_exists($location)) {
            $resumeFile = $location;
            break;
        }
    }
}

// If no resume found in the requested format, try to find any format
if (!$resumeFile) {
    $publicDir = __DIR__ . '/../public';
    $pattern = '/**/*resume*.' . ($format === 'pdf' ? 'pdf' : ($format === 'docx' ? 'docx' : 'txt'));
    $files = glob($publicDir . $pattern, GLOB_BRACE);

    if (!empty($files)) {
        $resumeFile = $files[0];
    } else {
        // Try any resume file if specific format not found
        $anyFiles = glob($publicDir . '/**/*resume*.{pdf,docx,txt}', GLOB_BRACE);
        if (!empty($anyFiles)) {
            $resumeFile = $anyFiles[0];
        }
    }
}

if ($resumeFile) {
    // Output the file
    readfile($resumeFile);
    exit;
} else {
    // No resume file found
    header('HTTP/1.1 404 Not Found');
    echo "Resume file in " . strtoupper($format) . " format not found. Please try another format or contact the administrator.";
}
