<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="{{ asset('emailcss/contactus.css') }}" rel="stylesheet">

</head>
<body>

<div class="email-container">
    <h2 class="text-center">Contact Us</h2>
    <p>Dear {{ $details['username'] }},</p>
    <p>Thank you for reaching out to us! We have received your message and will get back to you as soon as possible.</p>
    <p>Here are the details of your submission:</p>

    <table class="table table-bordered">
        <tr>
            <th>Name:</th>
            <td>{{ $details['username'] }}</td>
        </tr>
        <tr>
            <th>Email:</th>
            <td>{{ $details['email'] }}</td>
        </tr>
        <tr>
            <th>Subject:</th>
            <td>{{ $details['subject'] }}</td>
        </tr>
        <tr>
            <th>Message:</th>
            <td>{{ $details['message'] }}</td>
        </tr>
    </table>

    <p>If you have any additional information or questions, please feel free to reply to this email.</p>

    <p>Best regards,</p>
</div>

@php
$year = date('Y')
@endphp

<div class="footer">
    <p>&copy; {{$year}} ekas. All rights reserved.</p>
</div>

</body>
</html>
