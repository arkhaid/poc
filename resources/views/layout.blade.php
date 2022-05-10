<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>POC</title>

    <link href="/css/app.css" rel="stylesheet">
</head>

<body class="antialiased">
    <div class="max-w-4xl mx-auto px-4 py-10 sm:px-6 lg:px-8">
        @yield('content')
    </div>
</body>

</html>