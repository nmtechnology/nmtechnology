<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Crawler Alert</title>
</head>
<body style="margin:0;padding:0;background:#0a0a0a;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;color:#e5e5e5;">
    <div style="max-width:700px;margin:40px auto;background:#1a1a1a;border-radius:16px;overflow:hidden;border:2px solid #10b981;">
        
        <!-- Header -->
        <div style="text-align:center;padding:30px 20px;background:linear-gradient(135deg,#10b981,#059669);border-bottom:3px solid #10b981;">
            <div style="margin-bottom:15px;">
                <span style="font-size:48px;">🤖</span>
            </div>
            <h1 style="margin:0;color:#ffffff;font-size:28px;font-weight:800;text-shadow:2px 2px 4px rgba(0,0,0,0.3);">
                Google Crawler Detected!
            </h1>
            <p style="margin:8px 0 0 0;color:#d1fae5;font-size:14px;">
                {{ $crawl->bot_type }} visited your website
            </p>
        </div>

        <!-- Main Content -->
        <div style="padding:30px;">
            
            <!-- Verification Status -->
            <div style="margin-bottom:25px;padding:20px;background:{{ $crawl->is_verified ? '#065f46' : '#7c2d12' }};border-left:4px solid {{ $crawl->is_verified ? '#10b981' : '#f97316' }};border-radius:8px;">
                <div style="display:flex;align-items:center;">
                    <span style="font-size:24px;margin-right:12px;">{{ $crawl->is_verified ? '✓' : '⚠️' }}</span>
                    <div>
                        <strong style="color:#ffffff;font-size:16px;">
                            {{ $crawl->is_verified ? 'Verified Google Bot' : 'Unverified (Possible Spoof)' }}
                        </strong>
                        <p style="margin:4px 0 0 0;font-size:13px;color:#d1d5db;">
                            {{ $crawl->is_verified ? 'This request was verified via reverse DNS lookup' : 'Could not verify via reverse DNS - may be spoofed' }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Crawl Details -->
            <div style="background:#111;border-radius:12px;padding:25px;margin-bottom:20px;border:1px solid #333;">
                <h2 style="margin:0 0 20px 0;color:#10b981;font-size:20px;border-bottom:2px solid #10b981;padding-bottom:10px;">
                    📋 Crawl Details
                </h2>
                
                <table style="width:100%;border-collapse:collapse;">
                    <tr>
                        <td style="padding:12px 15px;border-bottom:1px solid #333;width:35%;vertical-align:top;">
                            <strong style="color:#10b981;">Bot Type:</strong>
                        </td>
                        <td style="padding:12px 15px;border-bottom:1px solid #333;color:#e5e5e5;">
                            {{ $crawl->bot_type }}
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:12px 15px;border-bottom:1px solid #333;vertical-align:top;">
                            <strong style="color:#10b981;">URL Crawled:</strong>
                        </td>
                        <td style="padding:12px 15px;border-bottom:1px solid #333;color:#60a5fa;word-break:break-all;">
                            <a href="{{ $crawl->url }}" style="color:#60a5fa;text-decoration:none;">{{ $crawl->url }}</a>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:12px 15px;border-bottom:1px solid #333;vertical-align:top;">
                            <strong style="color:#10b981;">IP Address:</strong>
                        </td>
                        <td style="padding:12px 15px;border-bottom:1px solid #333;color:#e5e5e5;font-family:monospace;">
                            {{ $crawl->ip_address }}
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:12px 15px;border-bottom:1px solid #333;vertical-align:top;">
                            <strong style="color:#10b981;">HTTP Method:</strong>
                        </td>
                        <td style="padding:12px 15px;border-bottom:1px solid #333;color:#e5e5e5;">
                            <span style="background:#10b981;color:#000;padding:3px 8px;border-radius:4px;font-weight:600;font-size:12px;">
                                {{ $crawl->method }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:12px 15px;border-bottom:1px solid #333;vertical-align:top;">
                            <strong style="color:#10b981;">Crawled At:</strong>
                        </td>
                        <td style="padding:12px 15px;border-bottom:1px solid #333;color:#e5e5e5;">
                            {{ $crawl->crawled_at->format('F j, Y \a\t g:i:s A T') }}
                        </td>
                    </tr>
                    @if($crawl->referer)
                    <tr>
                        <td style="padding:12px 15px;border-bottom:1px solid #333;vertical-align:top;">
                            <strong style="color:#10b981;">Referer:</strong>
                        </td>
                        <td style="padding:12px 15px;border-bottom:1px solid #333;color:#e5e5e5;word-break:break-all;">
                            {{ $crawl->referer }}
                        </td>
                    </tr>
                    @endif
                </table>
            </div>

            <!-- User Agent -->
            <div style="background:#111;border-radius:12px;padding:25px;margin-bottom:20px;border:1px solid #333;">
                <h2 style="margin:0 0 15px 0;color:#10b981;font-size:18px;">
                    🔍 User Agent
                </h2>
                <div style="background:#000;padding:15px;border-radius:8px;border-left:3px solid #10b981;">
                    <code style="color:#d1d5db;font-size:13px;line-height:1.6;word-break:break-all;font-family:'Courier New',monospace;">
                        {{ $crawl->user_agent }}
                    </code>
                </div>
            </div>

            <!-- Request Headers -->
            @if($crawl->headers)
            <div style="background:#111;border-radius:12px;padding:25px;margin-bottom:20px;border:1px solid #333;">
                <h2 style="margin:0 0 15px 0;color:#10b981;font-size:18px;">
                    📡 Request Headers
                </h2>
                <div style="background:#000;padding:15px;border-radius:8px;max-height:300px;overflow-y:auto;">
                    <table style="width:100%;border-collapse:collapse;">
                        @foreach($crawl->headers as $key => $values)
                        <tr>
                            <td style="padding:8px 12px 8px 0;color:#10b981;font-family:monospace;font-size:12px;vertical-align:top;border-bottom:1px solid #1a1a1a;">
                                {{ $key }}:
                            </td>
                            <td style="padding:8px 0;color:#d1d5db;font-family:monospace;font-size:12px;word-break:break-all;border-bottom:1px solid #1a1a1a;">
                                @if(is_array($values))
                                    {{ implode(', ', $values) }}
                                @else
                                    {{ $values }}
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            @endif

            <!-- Info Box -->
            <div style="background:#172554;border-left:4px solid #3b82f6;padding:20px;border-radius:8px;margin-top:25px;">
                <div style="display:flex;align-items:start;">
                    <span style="font-size:24px;margin-right:12px;">💡</span>
                    <div>
                        <strong style="color:#60a5fa;font-size:15px;">What does this mean?</strong>
                        <p style="margin:8px 0 0 0;font-size:13px;color:#bfdbfe;line-height:1.6;">
                            Google's crawler visited this page to index it for search results. This is generally a good sign that Google is discovering and crawling your content. Verified bots are legitimate Google crawlers confirmed through reverse DNS lookup.
                        </p>
                    </div>
                </div>
            </div>

        </div>

        <!-- Footer -->
        <div style="padding:25px;background:#0a0a0a;border-top:2px solid #10b981;text-align:center;">
            <p style="margin:0;color:#888;font-size:12px;">
                This is an automated notification from NM Technology Bot Monitor
            </p>
            <p style="margin:8px 0 0 0;color:#666;font-size:11px;">
                Sent on {{ now()->format('F j, Y \a\t g:i A') }}
            </p>
        </div>

    </div>
</body>
</html>
