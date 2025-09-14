@php
    $themeColor = '#10b981';
    $bgColor = '#222';
    $textColor = '#fff';
    $borderColor = '#10b981';
@endphp
<div style="background:{{ $bgColor }};color:{{ $textColor }};font-family:sans-serif;padding:2rem;border-radius:12px;max-width:600px;margin:auto;">
    <div style="text-align:center;margin-bottom:2rem;">
        <img src="https://nmtechnology.net/images/nmtis-logo.png" alt="NM Technology Logo" style="height:60px;max-width:220px;display:inline-block;">
    </div>
    <h2 style="color:{{ $themeColor }};font-size:2rem;text-align:center;margin-bottom:1rem;">New Website Visitor</h2>
    <table style="width:100%;border-collapse:collapse;margin-bottom:1rem;">
        <tr><td style="color:{{ $themeColor }};font-weight:bold;padding:8px;">Time</td><td style="padding:8px;">{{ now()->toDateTimeString() }}</td></tr>
        <tr><td style="color:{{ $themeColor }};font-weight:bold;padding:8px;">IP Address</td><td style="padding:8px;">{{ $ip }}</td></tr>
        <tr><td style="color:{{ $themeColor }};font-weight:bold;padding:8px;">Location</td><td style="padding:8px;">{{ $location }}</td></tr>
        <tr><td style="color:{{ $themeColor }};font-weight:bold;padding:8px;">Math Verification Status</td><td style="padding:8px;">{{ $mathStatus }}</td></tr>
        <tr><td style="color:{{ $themeColor }};font-weight:bold;padding:8px;">Number of Attempts</td><td style="padding:8px;">{{ $attempts ?? 'Unknown' }}</td></tr>
        <tr><td style="color:{{ $themeColor }};font-weight:bold;padding:8px;">Time Spent on Page</td><td style="padding:8px;">{{ $timeSpent ?? 'Unknown' }}s</td></tr>
        <tr><td style="color:{{ $themeColor }};font-weight:bold;padding:8px;">User Agent</td><td style="padding:8px;">{{ $userAgent ?? 'Unknown' }}</td></tr>
        <tr><td style="color:{{ $themeColor }};font-weight:bold;padding:8px;">Referer</td><td style="padding:8px;">{{ $referer ?? 'Unknown' }}</td></tr>
        <tr><td style="color:{{ $themeColor }};font-weight:bold;padding:8px;">Visit Type</td><td style="padding:8px;">{{ $visitType ?? 'Unknown' }}</td></tr>
        <tr><td style="color:{{ $themeColor }};font-weight:bold;padding:8px;">Landing Page</td><td style="padding:8px;">{{ $landingPage ?? 'Unknown' }}</td></tr>
        <tr><td style="color:{{ $themeColor }};font-weight:bold;padding:8px;">Visitor Experience</td><td style="padding:8px;">{{ $experience ?? 'Unknown' }}</td></tr>
    </table>
    <h2 style="color:#10b981;margin-top:2rem;">Visitor Actions / Pages Visited</h2>
    @if($actions && count($actions))
        <table style="width:100%;border-collapse:collapse;background:#222;color:#fff;margin-bottom:2rem;">
            <thead>
                <tr style="background:#10b981;color:#fff;">
                    <th style="padding:8px;">Page</th>
                    <th style="padding:8px;">Timestamp</th>
                    <th style="padding:8px;">Details</th>
                </tr>
            </thead>
            <tbody>
                @foreach($actions as $action)
                    <tr>
                        <td style="padding:8px;">{{ $action->page }}</td>
                        <td style="padding:8px;">{{ $action->timestamp }}</td>
                        <td style="padding:8px;">{{ $action->details }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p style="color:#fff;">No page actions recorded for this visitor.</p>
    @endif
    <h2 style="color:#10b981;margin-top:2rem;">Visitor Actions / Pages Visited (This Session)</h2>
    @if($actions && count($actions))
        <table style="width:100%;border-collapse:collapse;background:#222;color:#fff;margin-bottom:2rem;">
            <thead>
                <tr style="background:#10b981;color:#fff;">
                    <th style="padding:8px;">Page</th>
                    <th style="padding:8px;">Timestamp</th>
                    <th style="padding:8px;">Details</th>
                </tr>
            </thead>
            <tbody>
                @foreach($actions as $action)
                    <tr>
                        <td style="padding:8px;">{{ is_array($action) ? $action['page'] : $action->page }}</td>
                        <td style="padding:8px;">{{ is_array($action) ? $action['timestamp'] : $action->timestamp }}</td>
                        <td style="padding:8px;">{{ is_array($action) ? $action['details'] : $action->details }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p style="color:#fff;">No page actions recorded for this visitor session.</p>
    @endif
    <div style="text-align:center;color:{{ $themeColor }};font-size:1rem;margin-top:2rem;">&copy; {{ now()->year }} NM Technology. All rights reserved.</div>
</div>
