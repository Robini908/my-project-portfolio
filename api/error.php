<?php
// Get error details from parameters or use defaults
$status = $_GET['status'] ?? 500;
$message = $_GET['message'] ?? 'An unexpected error occurred';

// Ensure proper Content-Type is set
header('Content-Type: text/html; charset=UTF-8');
header("HTTP/1.1 $status");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Error - <?php echo htmlspecialchars($status); ?></title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8fafc;
            color: #334155;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            padding: 20px;
            box-sizing: border-box;
        }
        .error-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 500px;
            width: 100%;
            text-align: center;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 16px;
            color: #1e293b;
        }
        .status-code {
            font-size: 72px;
            font-weight: bold;
            color: #0ea5e9;
            margin: 0;
        }
        p {
            margin: 16px 0;
            line-height: 1.6;
        }
        .btn {
            display: inline-block;
            background-color: #0ea5e9;
            color: white;
            padding: 10px 20px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 500;
            margin-top: 20px;
            transition: background-color 0.2s;
        }
        .btn:hover {
            background-color: #0284c7;
        }
        @media (prefers-color-scheme: dark) {
            body {
                background-color: #1e293b;
                color: #e2e8f0;
            }
            .error-container {
                background-color: #0f172a;
            }
            h1 {
                color: #f8fafc;
            }
            .status-code {
                color: #38bdf8;
            }
            .btn {
                background-color: #38bdf8;
            }
            .btn:hover {
                background-color: #0ea5e9;
            }
        }
        @media (max-width: 640px) {
            .error-container {
                padding: 20px;
            }
            .status-code {
                font-size: 48px;
            }
        }
    </style>
</head>
<body>
    <div class="error-container">
        <p class="status-code"><?php echo htmlspecialchars($status); ?></p>
        <h1><?php echo htmlspecialchars($message); ?></h1>
        <p>Sorry for the inconvenience. Please try again later or return to the homepage.</p>
        <a href="/" class="btn">Go to Homepage</a>
    </div>
</body>
</html>
