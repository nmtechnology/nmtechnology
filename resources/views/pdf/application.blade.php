<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application - {{ $application['firstName'] }} {{ $application['lastName'] }}</title>
    <style>
        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            text-align: center;
            border-bottom: 3px solid #22c55e;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .company-name {
            font-size: 24px;
            font-weight: bold;
            color: #22c55e;
            margin-bottom: 5px;
        }
        .document-title {
            font-size: 18px;
            color: #666;
        }
        .applicant-info {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 25px;
        }
        .section {
            margin-bottom: 25px;
        }
        .section-title {
            font-size: 16px;
            font-weight: bold;
            color: #22c55e;
            border-bottom: 1px solid #e5e7eb;
            padding-bottom: 5px;
            margin-bottom: 15px;
        }
        .info-row {
            display: flex;
            margin-bottom: 8px;
        }
        .label {
            font-weight: bold;
            min-width: 150px;
            color: #555;
        }
        .value {
            flex: 1;
        }
        .full-width {
            width: 100%;
            margin-bottom: 15px;
        }
        .text-area-content {
            background-color: #f8f9fa;
            padding: 10px;
            border-radius: 4px;
            border-left: 3px solid #22c55e;
            white-space: pre-wrap;
            word-wrap: break-word;
        }
        .footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
            text-align: center;
            font-size: 12px;
            color: #666;
        }
        .status-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }
        .status-yes {
            background-color: #dcfce7;
            color: #166534;
        }
        .status-no {
            background-color: #fee2e2;
            color: #991b1b;
        }
        .attached-files {
            background-color: #eff6ff;
            padding: 15px;
            border-radius: 8px;
            border-left: 4px solid #3b82f6;
        }
        .file-item {
            margin-bottom: 5px;
            padding: 5px 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="company-name">NM Technology, Inc.</div>
        <div class="document-title">Employment Application</div>
        <div style="font-size: 12px; color: #666; margin-top: 10px;">
            Submitted: {{ \Carbon\Carbon::now()->format('F j, Y \a\t g:i A') }}
        </div>
    </div>

    <div class="applicant-info">
        <h3 style="margin-top: 0; color: #22c55e;">Applicant Information</h3>
        <div class="info-row">
            <span class="label">Full Name:</span>
            <span class="value">{{ $application['firstName'] }} {{ $application['lastName'] }}</span>
        </div>
        <div class="info-row">
            <span class="label">Email:</span>
            <span class="value">{{ $application['email'] }}</span>
        </div>
        <div class="info-row">
            <span class="label">Phone:</span>
            <span class="value">{{ $application['phone'] }}</span>
        </div>
        <div class="info-row">
            <span class="label">Address:</span>
            <span class="value">{{ $application['address'] }}</span>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Position & Availability</div>
        <div class="info-row">
            <span class="label">Position Applied For:</span>
            <span class="value">{{ $application['position'] }}</span>
        </div>
        @if(!empty($application['salaryRange']))
        <div class="info-row">
            <span class="label">Salary Range:</span>
            <span class="value">{{ $application['salaryRange'] }}</span>
        </div>
        @endif
        <div class="info-row">
            <span class="label">Availability:</span>
            <span class="value">{{ $application['availability'] }}</span>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Experience & Education</div>
        <div class="info-row">
            <span class="label">Experience Level:</span>
            <span class="value">{{ $application['experience'] }}</span>
        </div>
        <div class="info-row">
            <span class="label">Education:</span>
            <span class="value">{{ $application['education'] }}</span>
        </div>
        @if(!empty($application['certifications']))
        <div class="full-width">
            <div class="label">Certifications:</div>
            <div class="text-area-content">{{ $application['certifications'] }}</div>
        </div>
        @endif
    </div>

    @if(!empty($application['previousEmployment']))
    <div class="section">
        <div class="section-title">Previous Employment</div>
        <div class="text-area-content">{{ $application['previousEmployment'] }}</div>
    </div>
    @endif

    <div class="section">
        <div class="section-title">Cover Letter</div>
        <div class="text-area-content">{{ $application['coverLetter'] }}</div>
    </div>

    @if(!empty($application['reference1']) || !empty($application['reference2']))
    <div class="section">
        <div class="section-title">References</div>
        @if(!empty($application['reference1']))
        <div class="full-width">
            <div class="label">Reference 1:</div>
            <div class="text-area-content">{{ $application['reference1'] }}</div>
        </div>
        @endif
        @if(!empty($application['reference2']))
        <div class="full-width">
            <div class="label">Reference 2:</div>
            <div class="text-area-content">{{ $application['reference2'] }}</div>
        </div>
        @endif
    </div>
    @endif

    <div class="section">
        <div class="section-title">Background Information</div>
        <div class="info-row">
            <span class="label">Work Authorized:</span>
            <span class="value">
                <span class="status-badge {{ $application['workAuthorized'] === 'yes' ? 'status-yes' : 'status-no' }}">
                    {{ ucfirst($application['workAuthorized']) }}
                </span>
            </span>
        </div>
        <div class="info-row">
            <span class="label">Driver's License:</span>
            <span class="value">
                <span class="status-badge {{ $application['driversLicense'] === 'yes' ? 'status-yes' : 'status-no' }}">
                    {{ ucfirst($application['driversLicense']) }}
                </span>
            </span>
        </div>
        <div class="info-row">
            <span class="label">Felony Conviction:</span>
            <span class="value">
                <span class="status-badge {{ $application['felonyConviction'] === 'no' ? 'status-yes' : 'status-no' }}">
                    {{ ucfirst($application['felonyConviction']) }}
                </span>
            </span>
        </div>
    </div>

    @if(!empty($attachedFiles))
    <div class="section">
        <div class="section-title">Attached Documents</div>
        <div class="attached-files">
            @foreach($attachedFiles as $file)
            <div class="file-item">
                <strong>{{ ucfirst($file['type']) }}:</strong> {{ $file['original_name'] }}
                <br><small>File ID: {{ $file['id'] }} | Size: {{ number_format($file['size'] / 1024, 1) }} KB</small>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    <div class="footer">
        <p><strong>NM Technology, Inc.</strong> - Albuquerque's Leading Security Solutions Provider</p>
        <p>This application was submitted through our secure online portal and automatically verified.</p>
        <p>Document generated: {{ \Carbon\Carbon::now()->format('F j, Y \a\t g:i A T') }}</p>
    </div>
</body>
</html>