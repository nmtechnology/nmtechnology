<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quote Request Received</title>
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
            background: linear-gradient(135deg, #16a34a 0%, #22c55e 50%, #84cc16 100%);
            padding: 40px 30px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, transparent 60%);
            animation: rotate 6s linear infinite;
        }
        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
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
        .header-icon {
            font-size: 3rem;
            margin-bottom: 15px;
            position: relative;
            z-index: 1;
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
        .highlight-box {
            background: linear-gradient(135deg, rgba(34, 197, 94, 0.15) 0%, rgba(132, 204, 22, 0.1) 100%);
            border: 2px solid rgba(34, 197, 94, 0.3);
            border-radius: 12px;
            padding: 25px;
            margin: 30px 0;
            text-align: center;
        }
        .highlight-number {
            font-size: 3rem;
            font-weight: 800;
            background: linear-gradient(to right, #22c55e, #84cc16);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 10px;
        }
        .highlight-text {
            color: #d1d5db;
            font-size: 1rem;
        }
        .info-box {
            background: linear-gradient(135deg, rgba(31, 41, 55, 0.8) 0%, rgba(17, 24, 39, 0.8) 100%);
            border-left: 4px solid #22c55e;
            border-radius: 8px;
            padding: 20px;
            margin: 25px 0;
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
        .timeline {
            position: relative;
            padding-left: 30px;
            margin: 25px 0;
        }
        .timeline::before {
            content: '';
            position: absolute;
            left: 8px;
            top: 0;
            bottom: 0;
            width: 2px;
            background: linear-gradient(to bottom, #22c55e, #84cc16);
        }
        .timeline-item {
            position: relative;
            margin-bottom: 20px;
            padding-left: 15px;
        }
        .timeline-item::before {
            content: '';
            position: absolute;
            left: -26px;
            top: 5px;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #22c55e;
            border: 3px solid rgba(17, 24, 39, 0.95);
        }
        .timeline-title {
            color: #22c55e;
            font-weight: 600;
            margin-bottom: 5px;
        }
        .timeline-text {
            color: #d1d5db;
            font-size: 0.95rem;
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
        .feature-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin: 25px 0;
        }
        .feature-card {
            background: linear-gradient(135deg, #1f2937, #111827);
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            border: 1px solid rgba(34, 197, 94, 0.2);
        }
        .feature-icon {
            font-size: 2rem;
            margin-bottom: 10px;
        }
        .feature-title {
            color: #22c55e;
            font-weight: 600;
            font-size: 0.9rem;
        }
        .divider {
            height: 2px;
            background: linear-gradient(to right, transparent, #22c55e, transparent);
            margin: 30px 0;
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
            .feature-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="logo-container">
            <div style="display: flex; align-items: center; justify-content: center; gap: 5px;">
                <img src="https://nmtechnology.us/images/nm-logo-rmbg.webp" alt="nmtechnology-logo" class="logo" size="16x16">
                <a href="https://nmtechnology.us" class="company-name">Technology</a>
            </div>
        </div>
        
        <div class="header">
            <div class="header-icon">🎯</div>
            <h1 class="header-title">Quote Request Received!</h1>
            <p class="header-subtitle">Your custom security solution is on the way</p>
        </div>
        
        <div class="content">
            <p class="greeting">Hello {{ $customerName }}! 👋</p>
            
            <p class="message">
                Excellent choice! We've successfully received your quote request for <strong>{{ $itemCount }} security {{ $itemCount === 1 ? 'product' : 'products' }}</strong>. Our expert team is already preparing your personalized quote.
            </p>

            <div class="highlight-box">
                <div class="highlight-number">{{ $itemCount }}</div>
                <div class="highlight-text">{{ $itemCount === 1 ? 'Product' : 'Products' }} in Your Quote Request</div>
            </div>
            
            <div class="info-box">
                <h3>🚀 Your Quote Journey</h3>
                <div class="timeline">
                    <div class="timeline-item">
                        <div class="timeline-title">✅ Request Received</div>
                        <div class="timeline-text">We've got all your details and product selections</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-title">🔍 Expert Review (1-4 hours)</div>
                        <div class="timeline-text">Our specialists analyze your needs and prepare pricing</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-title">📞 Personal Consultation</div>
                        <div class="timeline-text">We'll reach out within 24 hours to discuss your custom solution</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-title">📋 Detailed Quote</div>
                        <div class="timeline-text">Receive your comprehensive quote with installation details</div>
                    </div>
                </div>
            </div>

            <div class="feature-grid">
                <div class="feature-card">
                    <div class="feature-icon">💰</div>
                    <div class="feature-title">Competitive Pricing</div>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🛡️</div>
                    <div class="feature-title">Top-Quality Equipment</div>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">⚡</div>
                    <div class="feature-title">Fast Installation</div>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🌟</div>
                    <div class="feature-title">Expert Support</div>
                </div>
            </div>

            <div class="divider"></div>

            <p class="message">
                While we prepare your custom quote, explore more ways we can protect what matters most:
            </p>

            <div style="text-align: center;">
                <a href="https://nmtechnology.us/cctv" class="cta-button">🎥 View All Security Solutions</a>
            </div>

            <div class="info-box" style="margin-top: 30px;">
                <h3>💼 What Makes Us Different?</h3>
                <div style="display: flex; flex-wrap: wrap; gap: 8px; margin-top: 15px;">
                    <span class="badge">🏆 20+ Years Experience</span>
                    <span class="badge">👨‍🔧 Certified Technicians</span>
                    <span class="badge">🔒 Enterprise-Grade Security</span>
                    <span class="badge">📱 Smart Integration</span>
                    <span class="badge">🌐 Remote Monitoring</span>
                    <span class="badge">⚙️ Custom Solutions</span>
                    <span class="badge">💪 Lifetime Support</span>
                    <span class="badge">✨ Local Service</span>
                </div>
            </div>

            <div class="divider"></div>

            <p class="message" style="font-size: 0.95rem; color: #9ca3af;">
                <strong>Questions before we call?</strong><br>
                📞 Call us anytime: <a href="tel:+15054453322" style="color: #22c55e; text-decoration: none; font-weight: 600;">(505) 445-3322</a><br>
                📧 Email us: <a href="mailto:service@nmtechnology.us" style="color: #22c55e; text-decoration: none; font-weight: 600;">service@nmtechnology.us</a><br>
                💬 Live chat available on our website
            </p>

            <p class="message" style="font-size: 0.85rem; color: #6b7280; margin-top: 20px;">
                <em>Quote request received on {{ $submittedAt }}</em>
            </p>
        </div>

        <div class="footer">
            <p class="footer-text">
                <strong>NM Technology</strong><br>
                Protecting New Mexico Since 2005
            </p>
            <div class="footer-links">
                <a href="https://nmtechnology.us">Website</a> •
                <a href="https://nmtechnology.us/cctv">CCTV Systems</a> •
                <a href="https://nmtechnology.us/fire-alarm">Fire Alarms</a> •
                <a href="https://nmtechnology.us/access-control">Access Control</a>
            </div>
            <p class="footer-text" style="margin-top: 20px; font-size: 0.8rem;">
                &copy; {{ date('Y') }} NM Technology. All rights reserved.<br>
                Albuquerque, New Mexico | Licensed & Insured
            </p>
            <p class="footer-text" style="margin-top: 10px; font-size: 0.75rem; color: #6b7280;">
                You're receiving this email because you requested a quote on our website.<br>
                This is an automated confirmation message.
            </p>
        </div>
    </div>
</body>
</html>
