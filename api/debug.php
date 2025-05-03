<?php

// Debug script to help identify routing issues
header('Content-Type: application/json');

$output = [
    'status' => 'OK',
    'timestamp' => date('Y-m-d H:i:s'),
    'server' => [
        'request_uri' => $_SERVER['REQUEST_URI'] ?? 'N/A',
        'request_method' => $_SERVER['REQUEST_METHOD'] ?? 'N/A',
        'script_name' => $_SERVER['SCRIPT_NAME'] ?? 'N/A',
        'path_info' => $_SERVER['PATH_INFO'] ?? 'N/A',
        'query_string' => $_SERVER['QUERY_STRING'] ?? 'N/A',
        'https' => isset($_SERVER['HTTPS']) ? 'on' : 'off',
        'http_host' => $_SERVER['HTTP_HOST'] ?? 'N/A',
        'http_user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? 'N/A',
        'remote_addr' => $_SERVER['REMOTE_ADDR'] ?? 'N/A',
        'vercel_url' => $_ENV['VERCEL_URL'] ?? 'N/A',
        'app_url' => $_ENV['APP_URL'] ?? 'N/A'
    ],
    'env' => [
        'app_env' => $_ENV['APP_ENV'] ?? 'N/A',
        'app_debug' => $_ENV['APP_DEBUG'] ?? 'N/A'
    ],
    'directories' => [
        '/tmp/storage' => is_dir('/tmp/storage') ? 'exists' : 'missing',
        '/tmp/storage/framework' => is_dir('/tmp/storage/framework') ? 'exists' : 'missing',
        '/tmp/storage/framework/views' => is_dir('/tmp/storage/framework/views') ? 'exists' : 'missing',
        '/tmp/storage/logs' => is_dir('/tmp/storage/logs') ? 'exists' : 'missing',
        'public' => is_dir(__DIR__ . '/../public') ? 'exists' : 'missing'
    ],
    'files' => [
        'public/index.php' => file_exists(__DIR__ . '/../public/index.php') ? 'exists' : 'missing',
        'routes/web.php' => file_exists(__DIR__ . '/../routes/web.php') ? 'exists' : 'missing'
    ]
];

echo json_encode($output, JSON_PRETTY_PRINT);
