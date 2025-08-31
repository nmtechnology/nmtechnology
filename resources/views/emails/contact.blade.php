<!DOCTYPE html>
<html>
<head>
    <title>Contact Form Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #15a34a;
            color: white;
            padding: 15px;
            border-radius: 5px 5px 0 0;
        }
        .content {
            padding: 20px;
            border: 1px solid #ddd;
            border-top: none;
            border-radius: 0 0 5px 5px;
        }
        .field {
            margin-bottom: 15px;
        }
        .label {
            font-weight: bold;
            color: #555;
        }
        .message-box {
            background-color: #f9f9f9;
            padding: 15px;
            border-left: 4px solid #15a34a;
            margin: 15px 0;
        }
        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #777;
            border-top: 1px solid #eee;
            padding-top: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>New Contact Form Submission</h2>
    </div>
    <div class="content">
        <div class="field">
            <span class="label">Name:</span> {{ $details['firstName'] }} {{ $details['lastName'] }}
        </div>
        <div class="field">
            <span class="label">Email:</span> <a href="mailto:{{ $details['email'] }}">{{ $details['email'] }}</a>
        </div>
        <div class="field">
            <span class="label">Phone:</span> {{ $details['phoneNumber'] }}
        </div>
        <div class="field">
            <span class="label">Message:</span>
            <div class="message-box">
                {{ $details['message'] }}
            </div>
        </div>
        <div class="footer">
            <p>This message was sent from the contact form on <a href="https://nmtechnology.us">nmtechnology.us</a></p>
            <p>To reply directly to the sender, use their email address: {{ $details['email'] }}</p>
        </div>
    </div>
</body>
</html>
