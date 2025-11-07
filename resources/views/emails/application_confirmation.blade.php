<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Confirmation - NM Technology</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #e5e7eb;
            background: #0a0f1a;
            margin: 0;
            padding: 20px;
            min-height: 100vh;
        }
        .email-container {
            max-width: 650px;
            margin: 0 auto;
            background: linear-gradient(135deg, #111827 0%, #1f2937 100%);
            border-radius: 16px;
            overflow: hidden;
            border: 1px solid #22c55e;
            box-shadow: 0 25px 50px -12px rgba(34, 197, 94, 0.25);
            position: relative;
        }
        .email-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #22c55e 0%, #84cc16 50%, #22c55e 100%);
            background-size: 200% 100%;
            animation: gradientFlow 4s ease-in-out infinite;
        }
        @keyframes gradientFlow {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        .header {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            color: white;
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
            background: radial-gradient(circle, rgba(34, 197, 94, 0.15) 0%, transparent 70%);
            animation: pulse 6s ease-in-out infinite;
        }
        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 0.7; }
            50% { transform: scale(1.2); opacity: 0.4; }
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
            background: linear-gradient(135deg, #22c55e, #84cc16);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .header-title {
            font-size: 2.2rem;
            font-weight: bold;
            margin: 0 0 10px 0;
            position: relative;
            z-index: 1;
            background: linear-gradient(135deg, #22c55e, #84cc16);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .header-subtitle {
            font-size: 1.1rem;
            margin: 0;
            color: #9ca3af;
            position: relative;
            z-index: 1;
        }
        .content {
            padding: 40px 30px;
            background: #111827;
        }
        .greeting {
            font-size: 1.3rem;
            font-weight: 600;
            color: #ffffff;
            margin-bottom: 25px;
        }
        .message {
            font-size: 1rem;
            color: #d1d5db;
            margin-bottom: 30px;
            line-height: 1.7;
        }
        .info-box {
            background: linear-gradient(135deg, rgba(34, 197, 94, 0.1) 0%, rgba(132, 204, 22, 0.05) 100%);
            border: 1px solid rgba(34, 197, 94, 0.3);
            border-radius: 12px;
            padding: 25px;
            margin: 30px 0;
            position: relative;
            overflow: hidden;
        }
        .info-box::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(180deg, #22c55e 0%, #84cc16 100%);
        }
        .info-box h3 {
            color: #22c55e;
            font-size: 1.2rem;
            font-weight: 700;
            margin: 0 0 20px 0;
            display: flex;
            align-items: center;
        }
        .info-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 15px;
            color: #e5e7eb;
        }
        .info-item:last-child {
            margin-bottom: 0;
        }
        .info-icon {
            font-size: 1.2rem;
            margin-right: 12px;
            min-width: 30px;
            font-weight: bold;
            color: #84cc16;
        }
        .timeline {
            background: linear-gradient(135deg, rgba(55, 65, 81, 0.5) 0%, rgba(75, 85, 99, 0.3) 100%);
            border: 1px solid rgba(75, 85, 99, 0.5);
            border-radius: 12px;
            padding: 25px;
            margin: 25px 0;
        }
        .timeline-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #ffffff;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }
        .timeline-item {
            display: flex;
            align-items: center;
            margin-bottom: 12px;
            padding: 8px 0;
        }
        .timeline-item:last-child {
            margin-bottom: 0;
        }
        .timeline-icon {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: linear-gradient(135deg, #22c55e, #16a34a);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            font-weight: bold;
            margin-right: 15px;
            flex-shrink: 0;
        }
        .timeline-text {
            font-size: 0.95rem;
            color: #d1d5db;
        }
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
            gap: 20px;
            margin: 25px 0;
        }
        .stat-card {
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
            color: white;
            padding: 20px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(34, 197, 94, 0.3);
            transition: transform 0.2s ease;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .stat-card:hover {
            transform: translateY(-2px);
        }
        .stat-value {
            font-size: 1.8rem;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .stat-label {
            font-size: 0.85rem;
            opacity: 0.9;
        }
        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, #22c55e 0%, #84cc16 100%);
            color: #000000;
            padding: 15px 30px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(34, 197, 94, 0.4);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(34, 197, 94, 0.5);
        }
        .divider {
            height: 2px;
            background: linear-gradient(90deg, transparent 0%, #22c55e 20%, #84cc16 50%, #22c55e 80%, transparent 100%);
            margin: 30px 0;
            border-radius: 1px;
        }
        .badge {
            display: inline-block;
            background: linear-gradient(135deg, #22c55e 0%, #84cc16 100%);
            color: #000000;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            margin: 3px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .footer {
            background: linear-gradient(135deg, #0f172a 0%, #111827 100%);
            color: #9ca3af;
            padding: 30px;
            text-align: center;
            font-size: 0.9rem;
            border-top: 1px solid rgba(34, 197, 94, 0.2);
        }
        .footer-title {
            color: #22c55e;
            font-weight: 600;
            margin-bottom: 15px;
            font-size: 1.1rem;
        }
        .footer-links a {
            color: #22c55e;
            text-decoration: none;
            margin: 0 10px;
            font-size: 0.85rem;
            transition: color 0.2s ease;
        }
        .footer-links a:hover {
            color: #84cc16;
        }
        @media only screen and (max-width: 600px) {
            body {
                padding: 10px;
            }
            .email-container {
                border-radius: 8px;
            }
            .content, .header, .footer {
                padding: 25px 20px;
            }
            .header-title {
                font-size: 1.8rem;
            }
            .logo {
                height: 50px;
            }
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        @include('components.nmlogo', ['variant' => 'email', 'size' => 'medium', 'showBorder' => true])
        
        <div class="header">
            <div class="header-icon">🎯</div>
            <h1 class="header-title">Application Received!</h1>
            <p class="header-subtitle">Thank you for your interest in joining our team</p>
        </div>
        
        <div class="content">
            <p class="greeting">Hello {{ $applicantName }}! 👋</p>
            
            <p class="message">
                Thank you for submitting your application for <strong>{{ $position }}</strong> at <strong>NM Technology</strong>! 
                We've successfully received your application and our HR team is already reviewing your qualifications.
            </p>
            
            <div class="info-box">
                <h3>📋 What Happens Next?</h3>
                <div class="info-item">
                    <span class="info-icon">1️⃣</span>
                    <span>Our HR team reviews your application and qualifications</span>
                </div>
                <div class="info-item">
                    <span class="info-icon">2️⃣</span>
                    <span>If your profile matches our needs, we'll contact you within <strong>5-7 business days</strong></span>
                </div>
                <div class="info-item">
                    <span class="info-icon">3️⃣</span>
                    <span>We'll schedule an initial phone/video interview to discuss the opportunity</span>
                </div>
                <div class="info-item">
                    <span class="info-icon">4️⃣</span>
                    <span>Successful candidates will be invited for an in-person interview and facility tour</span>
                </div>
            </div>

            <div class="timeline">
                <div class="timeline-title">
                    🕒 Application Timeline
                </div>
                <div class="timeline-item">
                    <div class="timeline-icon">✓</div>
                    <div class="timeline-text"><strong>Application Submitted</strong> - {{ $submissionTime }}</div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-icon">⏳</div>
                    <div class="timeline-text"><strong>Under Review</strong> - HR team evaluation (1-3 business days)</div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-icon">📞</div>
                    <div class="timeline-text"><strong>Initial Contact</strong> - Phone/video screening (if selected)</div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-icon">🏢</div>
                    <div class="timeline-text"><strong>Final Interview</strong> - In-person meeting and facility tour</div>
                </div>
            </div>

            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-value">&lt;24h</div>
                    <div class="stat-label">Response Time</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value">100%</div>
                    <div class="stat-label">Confidential</div>
                </div>
            </div>

            <div class="divider"></div>

            <p class="message">
                While you wait, feel free to learn more about our company and the exciting security projects we work on:
            </p>

            <div style="text-align: center;">
                <a href="https://nmtechnology.us/cctv" class="cta-button">🔒 Explore Our Security Solutions</a>
            </div>

            <div class="info-box" style="margin-top: 30px;">
                <h3>💼 Why Choose NM Technology?</h3>
                <div style="display: flex; flex-wrap: wrap; gap: 8px; margin-top: 15px;">
                    <span class="badge">🏆 Industry Leaders</span>
                    <span class="badge">📈 Career Growth</span>
                    <span class="badge">💰 Competitive Pay</span>
                    <span class="badge">🏥 Health Benefits</span>
                    <span class="badge">🎓 Training Programs</span>
                    <span class="badge">🤝 Team Environment</span>
                    <span class="badge">🚀 Innovation Focus</span>
                    <span class="badge">📍 Local Company</span>
                </div>
            </div>

            <div class="divider"></div>

            <p class="message" style="font-size: 0.95rem; color: #9ca3af;">
                <strong>Questions about your application?</strong><br>
                📞 Call us: <a href="tel:+15054453322" style="color: #22c55e; text-decoration: none; font-weight: 600;">(505) 445-3322</a><br>
                ✉️ Email us: <a href="mailto:hr@nmtechnology.us" style="color: #22c55e; text-decoration: none; font-weight: 600;">hr@nmtechnology.us</a><br>
                🌐 Visit: <a href="https://nmtechnology.us" style="color: #22c55e; text-decoration: none; font-weight: 600;">nmtechnology.us</a>
            </p>
        </div>
        
        <div class="footer">
            <p class="footer-title">NM Technology HR Department</p>
            <p>Your application was submitted on {{ $submissionTime }}</p>
            <div class="footer-links">
                <a href="https://nmtechnology.us/cctv">Security Solutions</a>
                <a href="https://nmtechnology.us">Company Website</a>
                <a href="mailto:hr@nmtechnology.us">Contact HR</a>
            </div>
            <p style="margin-top: 20px; font-size: 0.8rem; opacity: 0.8;">
                This is an automated confirmation. Please do not reply to this email.<br>
                If you need assistance, contact us at hr@nmtechnology.us
            </p>
        </div>
    </div>
</body>
</html>
        
        <div class="content">
            <p class="greeting">Hello {{ $applicantName }}! 👋</p>
            
            <p class="message">
                Thank you for submitting your application for <strong>{{ $position }}</strong> at <strong>NM Technology</strong>! 
                We've successfully received your application and our HR team is already reviewing your qualifications.
            </p>
            
            <div class="info-box">
                <h3>📋 What Happens Next?</h3>
                <div class="info-item">
                    <span class="info-icon">1️⃣</span>
                    <span>Our HR team reviews your application and qualifications</span>
                </div>
                <div class="info-item">
                    <span class="info-icon">2️⃣</span>
                    <span>If your profile matches our needs, we'll contact you within <strong>5-7 business days</strong></span>
                </div>
                <div class="info-item">
                    <span class="info-icon">3️⃣</span>
                    <span>We'll schedule an initial phone/video interview to discuss the opportunity</span>
                </div>
                <div class="info-item">
                    <span class="info-icon">4️⃣</span>
                    <span>Successful candidates will be invited for an in-person interview and facility tour</span>
                </div>
            </div>

            <div class="timeline">
                <div class="timeline-title">
                    🕒 Application Timeline
                </div>
                <div class="timeline-item">
                    <div class="timeline-icon">✓</div>
                    <div class="timeline-text"><strong>Application Submitted</strong> - {{ $submissionTime }}</div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-icon">⏳</div>
                    <div class="timeline-text"><strong>Under Review</strong> - HR team evaluation (1-3 business days)</div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-icon">📞</div>
                    <div class="timeline-text"><strong>Initial Contact</strong> - Phone/video screening (if selected)</div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-icon">🏢</div>
                    <div class="timeline-text"><strong>Final Interview</strong> - In-person meeting and facility tour</div>
                </div>
            </div>

            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-value">5-7</div>
                    <div class="stat-label">Business Days</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value">100%</div>
                    <div class="stat-label">Confidential</div>
                </div>
            </div>

            <div class="divider"></div>

            <p class="message">
                While you wait, feel free to learn more about our company culture and the exciting projects we're working on:
            </p>

            <div style="text-align: center;">
                <a href="https://nmtechnology.us/cctv" class="cta-button">🔒 Explore Our Security Solutions</a>
            </div>

            <div class="info-box" style="margin-top: 30px;">
                <h3>💼 Why Join NM Technology?</h3>
                <div style="display: flex; flex-wrap: wrap; gap: 8px; margin-top: 15px;">
                    <span class="badge">🏆 Industry Leaders</span>
                    <span class="badge">📈 Career Growth</span>
                    <span class="badge">💰 Competitive Pay</span>
                    <span class="badge">🏥 Health Benefits</span>
                    <span class="badge">🎓 Training Programs</span>
                    <span class="badge">🤝 Team Environment</span>
                    <span class="badge">🚀 Innovation Focus</span>
                    <span class="badge">📍 Local Company</span>
                </div>
            </div>

            <div class="divider"></div>

            <p class="message" style="font-size: 0.95rem; color: #9ca3af;">
                <strong>Questions about your application?</strong><br>
                📞 Call us: <a href="tel:+15054453322" style="color: #22c55e; text-decoration: none; font-weight: 600;">(505) 445-3322</a><br>
                ✉️ Email us: <a href="mailto:hr@nmtechnology.us" style="color: #22c55e; text-decoration: none; font-weight: 600;">hr@nmtechnology.us</a><br>
                🌐 Visit: <a href="https://nmtechnology.us" style="color: #22c55e; text-decoration: none; font-weight: 600;">nmtechnology.us</a>
            </p>
        </div>
        
        <div class="footer">
            <p class="footer-title">NM Technology HR Department</p>
            <p>Your application was submitted on {{ $submissionTime }}</p>
            <p>
                <a href="https://nmtechnology.us/cctv">Security Solutions</a>
                <a href="https://nmtechnology.us">Company Website</a>
                <a href="mailto:hr@nmtechnology.us">Contact HR</a>
            </p>
            <p style="margin-top: 20px; font-size: 0.8rem; opacity: 0.8;">
                This is an automated confirmation. Please do not reply to this email.<br>
                If you need assistance, contact us at hr@nmtechnology.us
            </p>
        </div>
    </div>
</body>
</html>