<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Contacting Us</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background: linear-gradient(to bottom, #000000 0%, #111827 50%, #1f2937 100%);
            padding: 20px;
            line-height: 1.6;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background: rgba(17, 24, 39, 0.95);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            border: 1px solid rgba(34, 197, 94, 0.2);
        }
        .header {
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 50%, #84cc16 100%);
            padding: 40px 30px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: pulse 3s ease-in-out infinite;
        }
        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 0.5; }
            50% { transform: scale(1.1); opacity: 0.8; }
        }
        .header-title {
            color: #ffffff;
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 10px;
            position: relative;
            z-index: 1;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
        .header-subtitle {
            color: rgba(255, 255, 255, 0.95);
            font-size: 1.1rem;
            position: relative;
            z-index: 1;
        }
        .content {
            padding: 40px 30px;
            color: #ffffff;
        }
        .greeting {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            background: linear-gradient(to right, #22c55e, #84cc16);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .message {
            font-size: 1.1rem;
            color: #d1d5db;
            margin-bottom: 20px;
            line-height: 1.8;
        }
        .info-box {
            background: linear-gradient(135deg, rgba(31, 41, 55, 0.8) 0%, rgba(17, 24, 39, 0.8) 100%);
            border-left: 4px solid #22c55e;
            border-radius: 8px;
            padding: 20px;
            margin: 30px 0;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.3);
        }
        .info-box h3 {
            color: #22c55e;
            font-size: 1.2rem;
            margin-bottom: 15px;
            font-weight: 700;
        }
        .info-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 12px;
            color: #d1d5db;
        }
        .info-item:last-child {
            margin-bottom: 0;
        }
        .info-icon {
            color: #22c55e;
            font-size: 1.3rem;
            margin-right: 12px;
            flex-shrink: 0;
        }
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin: 30px 0;
        }
        .stat-card {
            background: linear-gradient(135deg, #1f2937, #111827);
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            border: 1px solid rgba(34, 197, 94, 0.2);
        }
        .stat-value {
            font-size: 2rem;
            font-weight: 800;
            background: linear-gradient(to right, #22c55e, #84cc16);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 5px;
        }
        .stat-label {
            color: #9ca3af;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .cta-button {
            display: inline-block;
            background: linear-gradient(to right, #22c55e, #16a34a);
            color: #ffffff;
            text-decoration: none;
            padding: 15px 35px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 1rem;
            margin: 20px 0;
            box-shadow: 0 4px 6px -1px rgba(34, 197, 94, 0.3);
            transition: all 0.3s ease;
        }
        .cta-button:hover {
            box-shadow: 0 10px 15px -3px rgba(34, 197, 94, 0.4);
            transform: translateY(-2px);
        }
        .social-links {
            text-align: center;
            margin: 30px 0;
        }
        .social-links a {
            display: inline-block;
            margin: 0 10px;
            color: #22c55e;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        .social-links a:hover {
            color: #84cc16;
        }
        .footer {
            background: rgba(0, 0, 0, 0.3);
            padding: 30px;
            text-align: center;
            border-top: 1px solid rgba(34, 197, 94, 0.2);
        }
        .footer-text {
            color: #9ca3af;
            font-size: 0.9rem;
            margin-bottom: 10px;
        }
        .footer-links {
            margin: 15px 0;
        }
        .footer-links a {
            color: #22c55e;
            text-decoration: none;
            margin: 0 10px;
            font-size: 0.85rem;
        }
        .footer-links a:hover {
            color: #84cc16;
        }
        .badge {
            display: inline-block;
            background: rgba(34, 197, 94, 0.15);
            color: #22c55e;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            border: 1px solid rgba(34, 197, 94, 0.3);
            margin: 5px 5px 5px 0;
        }
        .divider {
            height: 2px;
            background: linear-gradient(to right, transparent, #22c55e, transparent);
            margin: 30px 0;
        }
        @media only screen and (max-width: 600px) {
            .email-container {
                border-radius: 0;
            }
            .content {
                padding: 30px 20px;
            }
            .header {
                padding: 30px 20px;
            }
            .header-title {
                font-size: 1.5rem;
            }
            .stats-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        @include('components.nm-logo', ['variant' => 'email', 'size' => 'medium', 'showBorder' => false])
        
        <div class="header">
            <h1 class="header-title">✨ Message Received!</h1>
            <p class="header-subtitle">We're excited to help with your security needs</p>
        </div>
        
        <div class="content">
            <p class="greeting">Hello {{ $customerName }}! 👋</p>
            
            <p class="message">
                Thank you for reaching out to <strong>NM Technology</strong>! We've successfully received your message and our team is already reviewing your inquiry.
            </p>
            
            <div class="info-box">
                <h3>📋 What Happens Next?</h3>
                <div class="info-item">
                    <span class="info-icon">1️⃣</span>
                    <span>Our security specialists are reviewing your request right now</span>
                </div>
                <div class="info-item">
                    <span class="info-icon">2️⃣</span>
                    <span>A dedicated team member will reach out within <strong>24 hours</strong></span>
                </div>
                <div class="info-item">
                    <span class="info-icon">3️⃣</span>
                    <span>We'll discuss your specific needs and provide expert recommendations</span>
                </div>
                <div class="info-item">
                    <span class="info-icon">4️⃣</span>
                    <span>Get a customized solution tailored to your security requirements</span>
                </div>
            </div>

            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-value">&lt;24h</div>
                    <div class="stat-label">Response Time</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value">100%</div>
                    <div class="stat-label">Customer Focus</div>
                </div>
            </div>

            <div class="divider"></div>

            <p class="message">
                While you wait, feel free to explore our services or check out our latest security solutions:
            </p>

            <div style="text-align: center;">
                <a href="https://nmtechnology.us/products" class="cta-button">🎥 Explore Security Solutions</a>
            </div>

            <div class="info-box" style="margin-top: 30px;">
                <h3>🎯 Why Choose NM Technology?</h3>
                <div style="display: flex; flex-wrap: wrap; gap: 8px; margin-top: 15px;">
                    <span class="badge">🏆 Expert Technicians</span>
                    <span class="badge">⚡ Quick Response</span>
                    <span class="badge">💼 Professional Service</span>
                    <span class="badge">🔒 Trusted Security</span>
                    <span class="badge">🌟 5-Star Rated</span>
                    <span class="badge">📞 24/7 Support</span>
                </div>
            </div>

            <div class="divider"></div>

            <p class="message" style="font-size: 0.95rem; color: #9ca3af;">
                <strong>Need immediate assistance?</strong><br>
                📞 Call us: <a href="tel:+15056505097" style="color: #22c55e; text-decoration: none; font-weight: 600;">(505) 650-5097</a><br>
                📧 Email: <a href="mailto:service@nmtechnology.us" style="color: #22c55e; text-decoration: none; font-weight: 600;">service@nmtechnology.us</a>
            </p>

            <p class="message" style="font-size: 0.85rem; color: #6b7280; margin-top: 20px;">
                <em>Submission received on {{ $submittedAt }}</em>
            </p>
        </div>

        <div class="footer">
            <p class="footer-text">
                <strong>NM Technology</strong><br>
                Your Trusted Security Partner Since 2005
            </p>
            <div class="footer-links">
                <a href="https://nmtechnology.us">Website</a> •
                <a href="https://nmtechnology.us/products">CCTV Systems</a> •
                <a href="https://nmtechnology.us/fire-alarm">Fire Alarms</a> •
                <a href="https://nmtechnology.us/access-control">Access Control</a>
            </div>
            <div class="social-links">
                <a href="#">Facebook</a> •
                <a href="#">LinkedIn</a> •
                <a href="#">Twitter</a>
            </div>
            <p class="footer-text" style="margin-top: 20px; font-size: 0.8rem;">
                &copy; {{ date('Y') }} NM Technology. All rights reserved.<br>
                Albuquerque, New Mexico
            </p>
            <p class="footer-text" style="margin-top: 10px; font-size: 0.75rem; color: #6b7280;">
                You're receiving this email because you contacted us through our website.<br>
                This is an automated confirmation message.
            </p>
        </div>
    </div>
</body>
</html>
