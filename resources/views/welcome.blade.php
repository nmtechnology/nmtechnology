<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="/public/images/nm-logo-rmbg.webp">

    <title>NM Technology</title>

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

</head>

<body>



    <div id="app">

    </div>

    <!-- <script src='/resources/js/views/FormValidate.js'> -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
</body>

</html>