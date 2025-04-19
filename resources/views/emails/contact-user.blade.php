<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Contacting Me</title>
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
        .message-summary {
            background-color: #f3f4f6;
            padding: 15px;
            border-radius: 8px;
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
        .cta-button {
            display: inline-block;
            padding: 12px 24px;
            background: linear-gradient(to right, #6d28d9, #4f46e5);
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
            margin-top: 10px;
        }
        .social-links {
            margin-top: 15px;
            text-align: center;
        }
        .social-links a {
            display: inline-block;
            margin: 0 10px;
            color: #6d28d9;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Thank You for Contacting Me</h1>
        </div>

        <p>Hello {{ $name }},</p>

        <p>Thank you for reaching out through my portfolio website. I've received your message and will get back to you as soon as possible, usually within 24-48 hours.</p>

        <p>For your records, here's a summary of your message:</p>

        <div class="message-summary">
            <p class="info-label">Subject:</p>
            <p>{{ $subject }}</p>

            <p class="info-label">Message:</p>
            <p>{{ $messageContent }}</p>

            <p class="info-label">Submitted at:</p>
            <p>{{ $submittedAt }}</p>
        </div>

        <p>If you have any additional information to share or questions in the meantime, feel free to reply to this email.</p>

        <p>In the meantime, feel free to check out more of my work and projects on my portfolio.</p>

        <div style="text-align: center; margin-top: 20px;">
            <a href="https://yourportfolio.com" class="cta-button">Visit My Portfolio</a>
        </div>

        <div class="social-links">
            <p>Connect with me:</p>
            <a href="https://linkedin.com/in/yourusername">LinkedIn</a> |
            <a href="https://github.com/yourusername">GitHub</a> |
            <a href="https://twitter.com/yourusername">Twitter</a>
        </div>

        <div class="footer">
            <p>Best regards,<br>Abraham Opuba</p>
            <p>This is an automated response to your contact form submission. Please do not reply to this email.</p>
        </div>
    </div>
</body>
</html>
