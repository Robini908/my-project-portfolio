<?php
// Set proper content type
header('Content-Type: text/html; charset=UTF-8');

// Get error status (default to 500)
$status = isset($_GET['status']) ? intval($_GET['status']) : 500;
$message = $_GET['message'] ?? 'Something went wrong';

// Valid status codes
$validStatuses = [400, 401, 403, 404, 500, 503];
if (!in_array($status, $validStatuses)) {
    $status = 500;
}

// Map status to title
$titles = [
    400 => 'Bad Request',
    401 => 'Unauthorized',
    403 => 'Forbidden',
    404 => 'Page Not Found',
    500 => 'Server Error',
    503 => 'Service Unavailable'
];

$title = $titles[$status] ?? 'Error';

// Set the HTTP status code
http_response_code($status);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?> | Portfolio</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: system-ui, -apple-system, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            background-color: #0f172a;
            color: #f8fafc;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            text-align: center;
        }
        .container {
            max-width: 30rem;
            width: 100%;
            margin: 0 auto;
        }
        .status {
            font-size: 5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            background: linear-gradient(to right, #6366f1, #8b5cf6);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        h1 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: #f1f5f9;
        }
        p {
            margin-bottom: 1.5rem;
            color: #cbd5e1;
            line-height: 1.6;
        }
        .btn {
            display: inline-block;
            background: linear-gradient(to right, #6366f1, #8b5cf6);
            color: white;
            font-weight: 500;
            padding: 0.75rem 1.5rem;
            border-radius: 0.375rem;
            text-decoration: none;
            transition: all 0.15s ease;
            border: none;
            cursor: pointer;
        }
        .btn:hover {
            opacity: 0.9;
            transform: translateY(-1px);
        }
        @media (max-width: 640px) {
            .status {
                font-size: 4rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="status"><?php echo $status; ?></div>
        <h1><?php echo htmlspecialchars($title); ?></h1>
        <p><?php echo htmlspecialchars($message); ?></p>
        <a href="/" class="btn">Back to Homepage</a>
    </div>
</body>
</html>
