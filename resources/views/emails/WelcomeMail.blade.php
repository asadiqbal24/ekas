<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Email</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .email-header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 1px solid #dddddd;
        }
        .email-header h1 {
            color: #007bff;
            font-size: 28px;
            font-weight: bold;
        }
        .email-body {
            padding: 20px 0;
            text-align: center;
        }
        .email-body h2 {
            font-size: 22px;
            color: #333333;
        }
        .email-body p {
            font-size: 16px;
            color: #666666;
        }
        .email-footer {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #dddddd;
        }
        .email-footer p {
            font-size: 14px;
            color: #888888;
        }
    </style>
</head>
<body>

    <div class="email-container">
        <div class="email-header">
            <h1>Welcome to Ekas</h1>
        </div>
        
        <div class="email-body">
            <h2>Hello {{ $details['username'] }} ,</h2>
            <p>We're excited to have you onboard! Thank you for signing up with Ekas.</p>
            
        </div>
        @php
        $year = date("Y");  
        @endphp

        <div class="email-footer">
            <p>If you have any questions, feel free to <a href="">contact our support team</a>.</p>
            <p>&copy; {{$year}} Ekas. All rights reserved.</p>
        </div>
    </div>

</body>
</html>
