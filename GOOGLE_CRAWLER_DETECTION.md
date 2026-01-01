# Google Crawler Detection & Notification System

## Overview

This system automatically detects when Google's crawlers (Googlebot) visit your website and sends you detailed email notifications about each crawl. It includes verification to ensure the crawler is legitimate and not spoofed.

## Features

✅ **Detects all Google bot types:**
- Googlebot (main web crawler)
- Googlebot-Image
- Googlebot-News
- Googlebot-Video
- Google-InspectionTool (Search Console)
- AdsBot-Google
- Mediapartners-Google
- And more...

✅ **Security verification via reverse DNS lookup**
✅ **Detailed crawl information logging**
✅ **Beautiful email notifications with full crawl details**
✅ **Database storage for crawl history**

## Setup Instructions

### 1. Run the Migration

Create the database table to store crawl data:

```bash
php artisan migrate
```

This will create the `google_crawls` table.

### 2. Configure Email Recipient

Set your admin email in `.env`:

```env
ADMIN_EMAIL=your-email@example.com
```

If not set, it defaults to `hr@nmtechnology.us`.

### 3. Ensure Mail Configuration

Make sure your mail settings are configured in `.env`:

```env
MAIL_MAILER=smtp
MAIL_HOST=your-smtp-host
MAIL_PORT=587
MAIL_USERNAME=your-username
MAIL_PASSWORD=your-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=hr@nmtechnology.us
MAIL_FROM_NAME="NM Technology"
```

## How It Works

1. **Detection**: The middleware checks the User-Agent header of every incoming request to the web routes
2. **Verification**: It performs a reverse DNS lookup to verify the IP actually belongs to Google
3. **Logging**: Stores crawl information in the database including:
   - Bot type
   - User agent string
   - IP address
   - URL that was crawled
   - HTTP method
   - Referrer (if present)
   - All request headers
   - Verification status
   - Timestamp
4. **Notification**: Sends a detailed email notification with all the crawl information

## Email Notification Contains

- ✅ Bot verification status (verified or unverified)
- 📋 Bot type (e.g., Googlebot, Googlebot-Image)
- 🔗 URL that was crawled
- 🌐 IP address of the crawler
- ⚡ HTTP method (GET, POST, etc.)
- 🕐 Exact timestamp
- 🔍 Full user agent string
- 📡 All request headers
- 💡 Explanation of what it means

## Optional: Email Throttling

If you're getting too many notifications, you can add throttling to the middleware. Open [app/Http/Middleware/DetectGoogleCrawler.php](app/Http/Middleware/DetectGoogleCrawler.php) and modify the `sendNotification` method:

```php
protected function sendNotification(GoogleCrawl $crawl, Request $request)
{
    try {
        // Only send one email per hour for the same URL
        $recentCrawl = GoogleCrawl::where('url', $crawl->url)
            ->where('crawled_at', '>=', now()->subHour())
            ->where('id', '!=', $crawl->id)
            ->exists();
            
        if ($recentCrawl) {
            return; // Skip notification
        }
        
        Mail::to(env('ADMIN_EMAIL', 'hr@nmtechnology.us'))
            ->send(new GoogleCrawlNotification($crawl, $request));
            
    } catch (\Exception $e) {
        Log::error('Error sending Google crawler notification: ' . $e->getMessage());
    }
}
```

## Viewing Crawl History

You can query the database to see your crawl history:

```php
// Get all verified Google crawls
$crawls = GoogleCrawl::verified()->get();

// Get crawls from the last 24 hours
$recentCrawls = GoogleCrawl::recent(24)->get();

// Get crawls by bot type
$imageCrawls = GoogleCrawl::byBotType('Googlebot-Image')->get();

// Get all crawls for a specific URL
$urlCrawls = GoogleCrawl::where('url', 'like', '%/your-page%')->get();
```

## Disabling Notifications

If you want to temporarily disable email notifications but keep logging:

Option 1: Comment out the notification line in the middleware:
```php
// $this->sendNotification($crawl, $request);
```

Option 2: Remove the middleware from [app/Http/Kernel.php](app/Http/Kernel.php):
```php
'web' => [
    // ... other middleware
    // \App\Http\Middleware\DetectGoogleCrawler::class,  // Comment this out
],
```

## Files Created

- `app/Http/Middleware/DetectGoogleCrawler.php` - Main detection middleware
- `app/Models/GoogleCrawl.php` - Database model
- `app/Mail/GoogleCrawlNotification.php` - Email notification class
- `resources/views/emails/google_crawl.blade.php` - Email template
- `database/migrations/2025_12_31_000000_create_google_crawls_table.php` - Database migration

## Security Notes

- The system uses reverse DNS lookup to verify crawlers are actually from Google
- Unverified crawlers are flagged in the email notification
- All crawl data is logged regardless of verification status
- This helps you detect potential malicious bots spoofing Google's user agent

## Troubleshooting

**Not receiving emails?**
1. Check your mail configuration in `.env`
2. Check Laravel logs: `storage/logs/laravel.log`
3. Verify ADMIN_EMAIL is set correctly
4. Test your mail setup with `php artisan tinker` and send a test email

**Not detecting crawls?**
1. Check that the middleware is registered in `app/Http/Kernel.php`
2. Verify the crawler is visiting web routes (not API routes)
3. Check application logs for any errors

**Database errors?**
1. Make sure you ran the migration: `php artisan migrate`
2. Check database connection in `.env`

## Need Help?

Check the Laravel logs at `storage/logs/laravel.log` for any errors related to crawler detection or email sending.
