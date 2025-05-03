<?php
// This is a minimal file that bypasses Laravel's middleware stack
// It's used as a fallback when middleware errors occur

// Set proper headers
header('Content-Type: text/html; charset=UTF-8');

// Get status and message from query parameters
$status = isset($_GET['status']) ? (int)$_GET['status'] : 500;
$message = isset($_GET['message']) ? htmlspecialchars($_GET['message']) : 'Application Error';

// Set status code
http_response_code($status);

// Output a minimal HTML error page
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio - <?php echo $status; ?></title>
    <style>
        body {
            font-family: system-ui, -apple-system, 'Segoe UI', Roboto, sans-serif;
            background-color: #0f172a;
            color: #f8fafc;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
            text-align: center;
        }
        .container {
            max-width: 600px;
        }
        h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            background: linear-gradient(to right, #6366f1, #8b5cf6);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        .status {
            font-size: 2rem;
            margin-bottom: 1.5rem;
            font-weight: bold;
        }
        p {
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }
        .btn {
            display: inline-block;
            background: linear-gradient(to right, #6366f1, #8b5cf6);
            color: white;
            text-decoration: none;
            padding: 0.75rem 1.5rem;
            border-radius: 0.375rem;
            font-weight: 500;
            transition: all 0.15s ease;
        }
        .btn:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Abraham Opuba</h1>
        <div class="status"><?php echo $status === 500 ? 'Server Error' : 'Error'; ?></div>
        <p><?php echo $message; ?></p>
        <p>We're sorry for the inconvenience. Please try again later.</p>
        <a href="/" class="btn">Return to Homepage</a>
    </div>
</body>
</html>
