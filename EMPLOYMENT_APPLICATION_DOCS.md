# Employment Application System Documentation

## Overview
A comprehensive employment application system with secure document upload capabilities, integrated into the NM Technology website.

## Features Implemented

### 1. User Interface
- **Apply Now Button**: Added to mobile menu with blue gradient styling
- **Application Modal**: 800+ line Vue component with comprehensive employment form
- **File Upload Interface**: Drag-and-drop and click-to-upload with real-time status indicators
- **Mobile Responsive**: Fully responsive design that works on all devices
- **Brand Consistency**: NM Technology logo integrated in modal header

### 2. Application Form
- **Personal Information**: Name, email, phone, address
- **Job Details**: Position, salary range, availability, experience level
- **Work History**: Previous employment details
- **Education & Certifications**: Educational background and professional certifications
- **Cover Letter**: Text-based cover letter submission
- **References**: Up to 2 professional references
- **Legal Questions**: Work authorization, driver's license, background check
- **Math Verification**: Anti-bot protection with simple math problem
- **Document Upload**: Resume (required) and cover letter file (optional)

### 3. Security Features
- **Virus Scanning**: Multi-layered approach using ClamAV when available
- **Fallback Validation**: File signature validation when ClamAV is unavailable
- **File Type Restrictions**: Only PDF, DOC, and DOCX files allowed
- **File Size Limits**: Maximum 10MB per file
- **Input Sanitization**: All form inputs are validated and sanitized
- **Fail-Secure Design**: Rejects files if scanning fails

### 4. Backend Processing
- **Document Upload Controller**: Handles file uploads with virus scanning
- **Application Controller**: Processes form submissions and sends emails
- **File Storage**: Secure file storage using Laravel Storage
- **Cache System**: Temporary file metadata storage with automatic cleanup
- **Error Handling**: Comprehensive error handling and logging

### 5. Email System
- **HR Notifications**: Detailed application emails sent to hr@nmtechnology.ca
- **Applicant Confirmations**: Professional confirmation emails with company branding
- **File Attachments**: Uploaded documents automatically attached to HR emails
- **Virus Scan Status**: Email includes virus scan confirmation for security
- **Dark Theme Design**: Emails match website styling with green/lime gradients

## Technical Implementation

### API Endpoints
```
POST /api/applications - Submit employment application
POST /api/upload-document - Upload documents with virus scanning
```

### File Upload Process
1. User selects file(s) in application modal
2. Files are uploaded to `/upload-document` endpoint
3. Server validates file type, size, and scans for viruses
4. File metadata stored in cache with unique ID
5. Client receives file ID for form submission
6. Application form includes file IDs in submission
7. Server retrieves file data and attaches to emails
8. Temporary cache data cleaned up after successful submission

### Security Layers
1. **Client-side validation**: File type and size checks
2. **Server-side validation**: Comprehensive file validation
3. **Virus scanning**: ClamAV integration with fallback validation
4. **File signature verification**: Magic number checking
5. **Secure storage**: Files stored outside web root
6. **Temporary cleanup**: Automatic file metadata cleanup

### Email Templates
- **application.blade.php**: HR notification email with dark theme
- **application_confirmation.blade.php**: Applicant confirmation with branding
- Both templates include virus scan status and security notices

## File Structure
```
app/
├── Console/Commands/
│   ├── TestApplicationEmails.php - Email testing command
│   └── TestApplicationSystem.php - System verification command
├── Http/Controllers/
│   ├── ApplicationController.php - Form processing
│   └── DocumentUploadController.php - File upload handling
└── Mail/
    ├── ApplicationMail.php - HR notification mailable
    └── ApplicationConfirmationMail.php - Applicant confirmation

resources/
├── js/components/
│   └── ApplicationModal.vue - Main application form component
└── views/emails/
    ├── application.blade.php - HR email template
    └── application_confirmation.blade.php - Confirmation template

routes/
└── api.php - API route definitions
```

## Configuration

### File Upload Settings
- **Max file size**: 10MB
- **Allowed types**: PDF, DOC, DOCX
- **Storage location**: `storage/app/documents/`
- **Cache duration**: 1 hour (3600 seconds)

### Email Configuration
- **HR email**: hr@nmtechnology.ca
- **From address**: applications@nmtechnology.us
- **SMTP settings**: Configured in .env file

### Security Settings
- **Virus scanning**: ClamAV primary, fallback validation secondary
- **File validation**: Magic number verification
- **Upload protection**: Fail-secure design

## Testing

### Available Commands
```bash
# Test email system
php artisan test:application-emails

# Test complete system
php artisan test:application-system

# Build frontend
npm run build
```

### Test Results
- ✅ File upload with validation
- ✅ Virus scanning (ClamAV + fallback)
- ✅ Secure file storage
- ✅ Email notifications (HR + applicant)
- ✅ Cache-based file metadata
- ✅ Automatic cleanup
- ✅ Mobile responsiveness
- ✅ Build system verification

## Production Deployment

### Prerequisites
1. Laravel 11+ with PHP 8.1+
2. Node.js for frontend build
3. SMTP email configuration
4. Storage directory permissions
5. Optional: ClamAV for enhanced virus scanning

### Environment Variables
```env
MAIL_MAILER=smtp
MAIL_HOST=your-smtp-host
MAIL_PORT=587
MAIL_USERNAME=your-email
MAIL_PASSWORD=your-password
MAIL_ENCRYPTION=tls
```

### Installation Steps
1. Run `composer install` for backend dependencies
2. Run `npm install && npm run build` for frontend
3. Configure email settings in `.env`
4. Set up storage directory permissions
5. Optional: Install ClamAV for enhanced security
6. Test with `php artisan test:application-system`

## Security Considerations

### File Upload Security
- All files scanned for viruses before processing
- File type validation using magic numbers
- Size limits enforced at multiple levels
- Files stored outside web-accessible directories
- Temporary metadata automatically cleaned up

### Email Security
- Virus scan status included in all notifications
- File attachments are pre-scanned
- Sender authentication configured
- Reply-to addresses properly set

### System Security
- Input validation on all form fields
- Math verification prevents automated submissions
- Error handling prevents information disclosure
- Fail-secure design rejects suspicious files

## Support and Maintenance

### Monitoring
- Check email delivery logs regularly
- Monitor storage usage for uploaded files
- Verify virus scanning functionality
- Review application submission patterns

### Maintenance Tasks
- Regular cleanup of orphaned files
- Email template updates as needed
- Security updates for virus definitions
- Performance monitoring and optimization

## Future Enhancements

### Potential Improvements
- File preview functionality
- Advanced spam detection
- Applicant tracking system integration
- Resume parsing and analysis
- Interview scheduling integration
- Document version control
- Enhanced reporting and analytics

### Scalability Considerations
- Database storage for large file volumes
- CDN integration for file delivery
- Queue system for email processing
- Load balancing for high traffic
- Microservice architecture migration

This system provides a complete, secure, and professional employment application experience that maintains the high standards of the NM Technology brand while ensuring security and usability for all users.