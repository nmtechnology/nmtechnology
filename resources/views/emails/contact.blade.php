<!DOCTYPE html>
<html>
<head>
    <title>NM Technology - Contact Form Submission</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f9fafb;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #111827; /* Dark background matching website */
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #15a34a; /* Green brand color */
            text-align: center;
            padding: 20px;
        }
        .logo-container {
            background-color: #111827; /* Dark background for logo */
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
        }
        .logo {
            height: 48px;
        }
        .company-name {
            color: white;
            font-size: 14px;
            font-style: italic;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
        }
        h1, h2 {
            color: white;
            margin: 0;
        }
        .content {
            padding: 25px;
            background-color: white;
        }
        .field {
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }
        .field:last-child {
            border-bottom: none;
        }
        .label {
            font-weight: bold;
            color: #111827;
            display: block;
            margin-bottom: 5px;
        }
        .value {
            color: #4b5563;
        }
        .message-box {
            background-color: #f9f9f9;
            padding: 15px;
            border-left: 4px solid #15a34a;
            margin: 10px 0;
            border-radius: 3px;
        }
        .footer {
            padding: 20px;
            background-color: #111827;
            color: #9ca3af;
            font-size: 12px;
            text-align: center;
        }
        .footer p {
            margin: 5px 0;
        }
        .footer a {
            color: #d1d5db;
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }
        /* Make the email responsive */
        @media only screen and (max-width: 620px) {
            .email-container {
                width: 100% !important;
                margin: 0 !important;
                border-radius: 0 !important;
            }
            .content {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="logo-container">
            <div style="display: flex; align-items: center; justify-content: center; gap: 5px;">
                <img src="https://nmtechnology.us/images/nm-logo-rmbg.webp" alt="nmtechnology-logo" class="logo">
                <a href="https://nmtechnology.us" class="company-name">Technology</a>
            </div>
        </div>
        
        <div class="header">
            <h2>New Contact Form Submission</h2>
        </div>
        
        <div class="content">
            <div class="field">
                <span class="label">Name:</span>
                <span class="value">{{ $details['firstName'] }} {{ $details['lastName'] }}</span>
            </div>
            
            <div class="field">
                <span class="label">Email:</span>
                <span class="value"><a href="mailto:{{ $details['email'] }}" style="color: #15a34a; text-decoration: none;">{{ $details['email'] }}</a></span>
            </div>
            
            <div class="field">
                <span class="label">Phone:</span>
                <span class="value"><a href="tel:{{ $details['phoneNumber'] }}" style="color: #15a34a; text-decoration: none;">{{ $details['phoneNumber'] }}</a></span>
            </div>
            
            <div class="field">
                <span class="label">Message:</span>
                <div class="message-box">
                    {{ $details['message'] }}
                </div>
            </div>
        </div>
        
        <div class="footer">
            <p>This message was sent from the contact form on <a href="https://nmtechnology.us">nmtechnology.us</a></p>
            <p>To reply directly to the sender, use their email address: <a href="mailto:{{ $details['email'] }}">{{ $details['email'] }}</a></p>
            <p>© {{ date('Y') }} NM Technology. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
