@php
    $variant = $variant ?? 'default';
    $size = $size ?? 'medium';
    $showBorder = $showBorder ?? true;
    
    // Logo source - always use full URL for emails
    $logoSrc = 'https://nmtechnology.us/images/nm-logo-rmbg.webp';
    
    // Size configurations
    $sizeConfig = [
        'small' => ['height' => '32px', 'fontSize' => '12px'],
        'medium' => ['height' => '48px', 'fontSize' => '14px'],
        'large' => ['height' => '60px', 'fontSize' => '16px'],
        'xl' => ['height' => '80px', 'fontSize' => '18px']
    ];
    
    $config = $sizeConfig[$size];
@endphp

<style>
    .nm-logo-container {
        background-color: #111827;
        padding: 15px;
        text-align: center;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
    }
    
    .nm-logo-container.with-border {
        background-color: rgba(31, 41, 55, 0.3);
        border: 1px solid rgba(34, 197, 94, 0.2);
        border-radius: 16px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        margin: 10px auto;
        width: fit-content;
    }
    
    .nm-logo {
        height: {{ $config['height'] }};
        width: auto;
    }
    
    .nm-company-name {
        color: white;
        font-size: {{ $config['fontSize'] }};
        font-style: italic;
        font-weight: bold;
        text-decoration: none;
        display: inline-block;
        margin-left: -3px;
    }
</style>

<div class="nm-logo-container{{ $showBorder ? ' with-border' : '' }}">
    <div style="display: flex; align-items: center; justify-content: center; gap: 5px;">
        <img src="{{ $logoSrc }}" alt="NM Technology Logo" class="nm-logo">
        <a href="https://nmtechnology.us" class="nm-company-name">Technology</a>
    </div>
</div>