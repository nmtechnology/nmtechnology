<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message</title>
</head>

<body>
    @include('components.nm-logo', ['variant' => 'email', 'size' => 'medium', 'showBorder' => false])
    
    <h1>message</h1>
    <p>name: {{ $details['firstName']}}</p>
</body>

</html>