<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Employment Application</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .header {
            background: linear-gradient(135deg, #22c55e 0%, #84cc16 100%);
            color: white;
            padding: 30px 25px;
            text-align: center;
            position: relative;
        }
        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(255,255,255,0.1) 0%, transparent 50%);
        }
        .header-title {
            font-size: 1.8rem;
            font-weight: bold;
            margin: 0;
            position: relative;
        }
        .header-subtitle {
            font-size: 1rem;
            margin: 8px 0 0 0;
            opacity: 0.9;
            position: relative;
        }
        .content {
            padding: 30px 25px;
        }
        .section {
            margin-bottom: 25px;
            padding: 20px;
            background-color: #f9fafb;
            border-left: 4px solid #22c55e;
            border-radius: 0 8px 8px 0;
        }
        .section-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: #1f2937;
            margin: 0 0 15px 0;
            display: flex;
            align-items: center;
        }
        .section-title::before {
            content: '●';
            color: #22c55e;
            font-size: 1.5rem;
            margin-right: 10px;
        }
        .field-group {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 15px;
            margin-bottom: 15px;
        }
        .field {
            background: white;
            padding: 12px 15px;
            border-radius: 6px;
            border: 1px solid #e5e7eb;
        }
        .field-label {
            font-weight: 600;
            color: #374151;
            font-size: 0.9rem;
            margin-bottom: 5px;
        }
        .field-value {
            color: #1f2937;
            font-size: 1rem;
        }
        .text-area-field {
            grid-column: 1 / -1;
        }
        .text-area-field .field-value {
            white-space: pre-wrap;
            line-height: 1.5;
        }
        .highlight-box {
            background: linear-gradient(135deg, #22c55e10 0%, #84cc1610 100%);
            border: 2px solid #22c55e30;
            border-radius: 8px;
            padding: 20px;
            margin: 20px 0;
            text-align: center;
        }
        .highlight-title {
            font-size: 1.3rem;
            font-weight: bold;
            color: #22c55e;
            margin-bottom: 10px;
        }
        .highlight-text {
            font-size: 1.1rem;
            color: #1f2937;
            font-weight: 500;
        }
        .footer {
            background-color: #1f2937;
            color: white;
            padding: 25px;
            text-align: center;
            font-size: 0.9rem;
        }
        .footer a {
            color: #22c55e;
            text-decoration: none;
        }
        .priority-indicator {
            display: inline-block;
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: bold;
            margin-left: 10px;
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }
        .verification-badge {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
            display: inline-block;
            margin-top: 10px;
        }
        @media only screen and (max-width: 600px) {
            .email-container {
                margin: 10px;
                border-radius: 0;
            }
            .content {
                padding: 20px 15px;
            }
            .field-group {
                grid-template-columns: 1fr;
            }
            .header-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1 class="header-title">🎯 New Employment Application</h1>
            <p class="header-subtitle">Received from {{ $applicantName }} on {{ $submissionTime }}</p>
        </div>
        
        <div class="content">
            <div class="highlight-box">
                <div class="highlight-title">{{ $applicationData['position'] ?? 'Position Not Specified' }}</div>
                <div class="highlight-text">Application for: {{ $applicantName }}</div>
                <div class="verification-badge">✓ Human Verified</div>
                <span class="priority-indicator">NEW APPLICATION</span>
            </div>

            <!-- Personal Information -->
            <div class="section">
                <h3 class="section-title">Personal Information</h3>
                <div class="field-group">
                    <div class="field">
                        <div class="field-label">Full Name</div>
                        <div class="field-value">{{ $applicationData['firstName'] }} {{ $applicationData['lastName'] }}</div>
                    </div>
                    <div class="field">
                        <div class="field-label">Email Address</div>
                        <div class="field-value">{{ $applicationData['email'] }}</div>
                    </div>
                    <div class="field">
                        <div class="field-label">Phone Number</div>
                        <div class="field-value">{{ $applicationData['phone'] }}</div>
                    </div>
                    <div class="field text-area-field">
                        <div class="field-label">Address</div>
                        <div class="field-value">{{ $applicationData['address'] }}</div>
                    </div>
                </div>
            </div>

            <!-- Position Information -->
            <div class="section">
                <h3 class="section-title">Position & Availability</h3>
                <div class="field-group">
                    <div class="field">
                        <div class="field-label">Position Applied For</div>
                        <div class="field-value">{{ $applicationData['position'] ?? 'Not specified' }}</div>
                    </div>
                    <div class="field">
                        <div class="field-label">Desired Salary Range</div>
                        <div class="field-value">{{ $applicationData['salaryRange'] ?? 'Negotiable' }}</div>
                    </div>
                    <div class="field">
                        <div class="field-label">Availability</div>
                        <div class="field-value">{{ $applicationData['availability'] ?? 'Not specified' }}</div>
                    </div>
                </div>
            </div>

            <!-- Work Experience -->
            <div class="section">
                <h3 class="section-title">Work Experience</h3>
                <div class="field-group">
                    <div class="field">
                        <div class="field-label">Years of Experience</div>
                        <div class="field-value">{{ $applicationData['experience'] ?? 'Not specified' }}</div>
                    </div>
                    <div class="field text-area-field">
                        <div class="field-label">Previous Employment Details</div>
                        <div class="field-value">{{ $applicationData['previousEmployment'] ?? 'Not provided' }}</div>
                    </div>
                </div>
            </div>

            <!-- Education & Certifications -->
            <div class="section">
                <h3 class="section-title">Education & Certifications</h3>
                <div class="field-group">
                    <div class="field">
                        <div class="field-label">Education Level</div>
                        <div class="field-value">{{ $applicationData['education'] ?? 'Not specified' }}</div>
                    </div>
                    <div class="field">
                        <div class="field-label">Certifications</div>
                        <div class="field-value">{{ $applicationData['certifications'] ?? 'None listed' }}</div>
                    </div>
                </div>
            </div>

            <!-- Cover Letter -->
            @if(!empty($applicationData['coverLetter']))
            <div class="section">
                <h3 class="section-title">Cover Letter</h3>
                <div class="field-group">
                    <div class="field text-area-field">
                        <div class="field-value">{{ $applicationData['coverLetter'] }}</div>
                    </div>
                </div>
            </div>
            @endif

            <!-- References -->
            @if(!empty($applicationData['reference1']) || !empty($applicationData['reference2']))
            <div class="section">
                <h3 class="section-title">Professional References</h3>
                <div class="field-group">
                    @if(!empty($applicationData['reference1']))
                    <div class="field text-area-field">
                        <div class="field-label">Reference 1</div>
                        <div class="field-value">{{ $applicationData['reference1'] }}</div>
                    </div>
                    @endif
                    @if(!empty($applicationData['reference2']))
                    <div class="field text-area-field">
                        <div class="field-label">Reference 2</div>
                        <div class="field-value">{{ $applicationData['reference2'] }}</div>
                    </div>
                    @endif
                </div>
            </div>
            @endif

            <!-- Legal Information -->
            <div class="section">
                <h3 class="section-title">Legal & Background Information</h3>
                <div class="field-group">
                    <div class="field">
                        <div class="field-label">Authorized to Work in US</div>
                        <div class="field-value">{{ ucfirst($applicationData['workAuthorized'] ?? 'Not answered') }}</div>
                    </div>
                    <div class="field">
                        <div class="field-label">Valid Driver's License</div>
                        <div class="field-value">{{ ucfirst($applicationData['driversLicense'] ?? 'Not answered') }}</div>
                    </div>
                    <div class="field">
                        <div class="field-label">Felony Conviction</div>
                        <div class="field-value">{{ ucfirst($applicationData['felonyConviction'] ?? 'Not answered') }}</div>
                    </div>
                </div>
            </div>

            <!-- Documents -->
            <div class="section">
                <h3 class="section-title">📄 Uploaded Documents</h3>
                <div class="field-group">
                    @if($hasResume)
                        <div class="field">
                            <div class="field-label">Resume</div>
                            <div class="field-value">
                                ✅ {{ $applicationData['resume']['originalName'] ?? 'resume.pdf' }}
                                <div style="font-size: 0.85rem; color: #10b981; margin-top: 4px;">
                                    ✓ Virus scan passed • Size: {{ number_format(($applicationData['resume']['fileSize'] ?? 0) / 1024, 1) }}KB
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="field">
                            <div class="field-label">Resume</div>
                            <div class="field-value" style="color: #ef4444;">❌ No resume uploaded</div>
                        </div>
                    @endif

                    @if($hasCoverLetter)
                        <div class="field">
                            <div class="field-label">Cover Letter</div>
                            <div class="field-value">
                                ✅ {{ $applicationData['coverLetterFile']['originalName'] ?? 'cover-letter.pdf' }}
                                <div style="font-size: 0.85rem; color: #10b981; margin-top: 4px;">
                                    ✓ Virus scan passed • Size: {{ number_format(($applicationData['coverLetterFile']['fileSize'] ?? 0) / 1024, 1) }}KB
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="field">
                            <div class="field-label">Cover Letter</div>
                            <div class="field-value" style="color: #94a3b8;">Optional - Not provided</div>
                        </div>
                    @endif
                </div>
                
                @if($hasResume || $hasCoverLetter)
                    <div style="background: #f0fdf4; border: 1px solid #22c55e; border-radius: 8px; padding: 12px; margin-top: 15px;">
                        <div style="font-size: 0.9rem; color: #15803d; font-weight: 600;">
                            🛡️ Security Notice
                        </div>
                        <div style="font-size: 0.85rem; color: #166534; margin-top: 4px;">
                            All uploaded documents have been automatically scanned for viruses and verified as safe.
                        </div>
                    </div>
                @endif

                <!-- PDF Application Summary Notice -->
                <div style="background: #eff6ff; border: 1px solid #3b82f6; border-radius: 8px; padding: 12px; margin-top: 15px;">
                    <div style="font-size: 0.9rem; color: #1d4ed8; font-weight: 600;">
                        📋 Application Summary
                    </div>
                    <div style="font-size: 0.85rem; color: #1e40af; margin-top: 4px;">
                        A formatted PDF summary of this application has been automatically generated and attached for easy download, printing, and archival.
                    </div>
                </div>
            </div>
        </div>
        
        <div class="footer">
            <p><strong>NM Technology HR Department</strong></p>
            <p>This application was submitted through the company website on {{ $submissionTime }}</p>
            <p>
                <a href="mailto:{{ $applicationData['email'] }}">Reply to Applicant</a> | 
                <a href="https://nmtechnology.us">Company Website</a>
            </p>
        </div>
    </div>
</body>
</html>