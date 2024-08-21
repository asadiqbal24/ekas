<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session Reminder</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
        }
        p {
            color: #666;
            font-size: 16px;
            line-height: 1.5;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #777;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Session Reminder</h2>
        <p>Dear  {{$details['name']}},</p>
        <p>This is a reminder for your upcoming appointment.</p>
        <p><strong>Date:</strong> {{$details['date']}}</p>

      
        <p>If you have any questions, please feel free to contact us.</p>
        <p>Best regards,</p>
        <p>Ekas</p>
        <div class="footer">
            <p>&copy; @php $year = date('Y') @endphp {{$year}} Ekas. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
