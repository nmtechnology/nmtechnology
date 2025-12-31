@php
    $themeColor = '#10b981';
    $bgColor = '#222';
    $textColor = '#fff';
    $borderColor = '#10b981';
    $additionalData = $additionalData ?? [];
@endphp
<div style="background:{{ $bgColor }};color:{{ $textColor }};font-family:sans-serif;padding:2rem;border-radius:12px;max-width:700px;margin:auto;">
    @include('components.nm-logo', ['variant' => 'email', 'size' => 'medium', 'showBorder' => false])
    <h2 style="color:{{ $themeColor }};font-size:2rem;text-align:center;margin-bottom:1rem;">🚨 New Website Visitor</h2>
    
    <!-- Primary Information -->
    <div style="background:#1a1a1a;border:2px solid {{ $themeColor }};border-radius:8px;padding:1rem;margin-bottom:1.5rem;">
        <h3 style="color:{{ $themeColor }};margin-top:0;font-size:1.3rem;border-bottom:1px solid {{ $themeColor }};padding-bottom:0.5rem;">📍 Primary Info</h3>
        <table style="width:100%;border-collapse:collapse;">
            <tr><td style="color:{{ $themeColor }};font-weight:bold;padding:6px;width:35%;">⏰ Time</td><td style="padding:6px;">{{ now()->toDateTimeString() }}</td></tr>
            <tr><td style="color:{{ $themeColor }};font-weight:bold;padding:6px;">🌐 IP Address</td><td style="padding:6px;font-family:monospace;">{{ $ip }}</td></tr>
            <tr><td style="color:{{ $themeColor }};font-weight:bold;padding:6px;">📍 Location</td><td style="padding:6px;">{{ $location }}</td></tr>
            <tr><td style="color:{{ $themeColor }};font-weight:bold;padding:6px;">✅ Verification Status</td><td style="padding:6px;"><strong style="color:{{ $mathStatus === 'success' ? '#10b981' : '#ef4444' }}">{{ strtoupper($mathStatus) }}</strong></td></tr>
            <tr><td style="color:{{ $themeColor }};font-weight:bold;padding:6px;">🔢 Attempts</td><td style="padding:6px;">{{ $attempts ?? 'Unknown' }}</td></tr>
            <tr><td style="color:{{ $themeColor }};font-weight:bold;padding:6px;">⏱️ Time on Page</td><td style="padding:6px;">{{ $timeSpent ?? 'Unknown' }}s</td></tr>
            <tr><td style="color:{{ $themeColor }};font-weight:bold;padding:6px;">🚪 Visit Type</td><td style="padding:6px;">{{ $visitType ?? 'Unknown' }}</td></tr>
            <tr><td style="color:{{ $themeColor }};font-weight:bold;padding:6px;">🎯 Landing Page</td><td style="padding:6px;word-break:break-all;">{{ $landingPage ?? 'Unknown' }}</td></tr>
            <tr><td style="color:{{ $themeColor }};font-weight:bold;padding:6px;">🔗 Referer</td><td style="padding:6px;word-break:break-all;">{{ $referer ?? 'Direct' }}</td></tr>
        </table>
    </div>

    <!-- Browser & Device Information -->
    @if(!empty($additionalData))
    <div style="background:#1a1a1a;border:2px solid {{ $themeColor }};border-radius:8px;padding:1rem;margin-bottom:1.5rem;">
        <h3 style="color:{{ $themeColor }};margin-top:0;font-size:1.3rem;border-bottom:1px solid {{ $themeColor }};padding-bottom:0.5rem;">💻 Browser & Device</h3>
        <table style="width:100%;border-collapse:collapse;">
            @if(isset($additionalData['browser']))
                <tr><td style="color:{{ $themeColor }};font-weight:bold;padding:6px;width:35%;">🌐 Browser</td><td style="padding:6px;">{{ $additionalData['browser'] }} {{ $additionalData['browser_version'] ?? '' }}</td></tr>
            @endif
            @if(isset($additionalData['os']))
                <tr><td style="color:{{ $themeColor }};font-weight:bold;padding:6px;">💿 Operating System</td><td style="padding:6px;">{{ $additionalData['os'] }}</td></tr>
            @endif
            @if(isset($additionalData['device_type']))
                <tr><td style="color:{{ $themeColor }};font-weight:bold;padding:6px;">📱 Device Type</td><td style="padding:6px;">{{ $additionalData['device_type'] }}</td></tr>
            @endif
            @if(isset($additionalData['is_mobile']))
                <tr><td style="color:{{ $themeColor }};font-weight:bold;padding:6px;">📲 Mobile</td><td style="padding:6px;">{{ $additionalData['is_mobile'] ? 'Yes' : 'No' }}</td></tr>
            @endif
            @if(isset($additionalData['screen_resolution']))
                <tr><td style="color:{{ $themeColor }};font-weight:bold;padding:6px;">🖥️ Screen Resolution</td><td style="padding:6px;">{{ $additionalData['screen_resolution'] }}</td></tr>
            @endif
            @if(isset($additionalData['viewport_size']))
                <tr><td style="color:{{ $themeColor }};font-weight:bold;padding:6px;">📐 Viewport Size</td><td style="padding:6px;">{{ $additionalData['viewport_size'] }}</td></tr>
            @endif
            @if(isset($additionalData['timezone']))
                <tr><td style="color:{{ $themeColor }};font-weight:bold;padding:6px;">🕐 Timezone</td><td style="padding:6px;">{{ $additionalData['timezone'] }}</td></tr>
            @endif
            @if(isset($additionalData['language']))
                <tr><td style="color:{{ $themeColor }};font-weight:bold;padding:6px;">🌍 Language</td><td style="padding:6px;">{{ $additionalData['language'] }}</td></tr>
            @endif
            @if(isset($additionalData['platform']))
                <tr><td style="color:{{ $themeColor }};font-weight:bold;padding:6px;">⚙️ Platform</td><td style="padding:6px;">{{ $additionalData['platform'] }}</td></tr>
            @endif
            @if(isset($additionalData['connection_type']))
                <tr><td style="color:{{ $themeColor }};font-weight:bold;padding:6px;">📶 Connection</td><td style="padding:6px;">{{ $additionalData['connection_type'] }}</td></tr>
            @endif
        </table>
    </div>
    @endif

    <!-- User Agent String -->
    <div style="background:#1a1a1a;border:1px solid #444;border-radius:8px;padding:1rem;margin-bottom:1.5rem;">
        <h3 style="color:{{ $themeColor }};margin-top:0;font-size:1.1rem;">🔍 User Agent</h3>
        <p style="font-size:0.85rem;color:#aaa;word-break:break-all;margin:0;font-family:monospace;">{{ $userAgent ?? 'Unknown' }}</p>
    </div>

    <!-- Visitor Actions -->
    @if($actions && count($actions) > 0)
    <div style="background:#1a1a1a;border:2px solid {{ $themeColor }};border-radius:8px;padding:1rem;margin-bottom:1.5rem;">
        <h3 style="color:{{ $themeColor }};margin-top:0;font-size:1.3rem;border-bottom:1px solid {{ $themeColor }};padding-bottom:0.5rem;">📊 Visitor Actions</h3>
        <table style="width:100%;border-collapse:collapse;background:#0a0a0a;border-radius:4px;overflow:hidden;">
            <thead>
                <tr style="background:{{ $themeColor }};color:#fff;">
                    <th style="padding:10px;text-align:left;">Page</th>
                    <th style="padding:10px;text-align:left;">Timestamp</th>
                    <th style="padding:10px;text-align:left;">Details</th>
                </tr>
            </thead>
            <tbody>
                @foreach($actions as $action)
                    <tr style="border-bottom:1px solid #333;">
                        <td style="padding:10px;">{{ is_array($action) ? $action['page'] : $action->page }}</td>
                        <td style="padding:10px;font-size:0.85rem;">{{ is_array($action) ? $action['timestamp'] : $action->timestamp }}</td>
                        <td style="padding:10px;font-size:0.85rem;color:#aaa;">{{ is_array($action) ? ($action['details'] ?? 'N/A') : $action->details }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
        <div style="background:#1a1a1a;border:1px solid #444;border-radius:8px;padding:1rem;margin-bottom:1.5rem;text-align:center;">
            <p style="color:#888;margin:0;">📭 No page actions recorded yet</p>
        </div>
    @endif

    <div style="text-align:center;color:{{ $themeColor }};font-size:0.9rem;margin-top:2rem;padding-top:1rem;border-top:1px solid #444;">&copy; {{ now()->year }} NM Technology. All rights reserved.</div>
</div>
