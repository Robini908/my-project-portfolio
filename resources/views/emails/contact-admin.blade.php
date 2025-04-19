<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Form Submission</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            background: linear-gradient(to right, #6d28d9, #4f46e5);
            color: white;
            padding: 20px;
            border-radius: 8px 8px 0 0;
            text-align: center;
            margin: -20px -20px 20px;
        }
        h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 700;
        }
        .message-info {
            background-color: #f3f4f6;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .message-content {
            padding: 15px;
            border-left: 4px solid #6d28d9;
            background-color: #f9fafb;
            margin-bottom: 20px;
        }
        .info-label {
            font-weight: bold;
            color: #6d28d9;
            margin-bottom: 5px;
        }
        .footer {
            text-align: center;
            color: #6b7280;
            font-size: 14px;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>New Contact Form Submission</h1>
        </div>

        <p>Hello Abraham,</p>

        <p>You have received a new message from your portfolio website contact form.</p>

        <div class="message-info">
            <p class="info-label">From:</p>
            <p>{{ $name }} ({{ $email }})</p>

            <p class="info-label">Subject:</p>
            <p>{{ $subject }}</p>

            <p class="info-label">Submitted at:</p>
            <p>{{ $submittedAt }}</p>
        </div>

        <p class="info-label">Message:</p>
        <div class="message-content">
            <p>{{ $messageContent }}</p>
        </div>

        <p>You can reply directly to this email to respond to {{ $name }}.</p>

        <div class="footer">
            <p>This email was sent from your portfolio website contact form.</p>
        </div>
    </div>
</body>
</html>
