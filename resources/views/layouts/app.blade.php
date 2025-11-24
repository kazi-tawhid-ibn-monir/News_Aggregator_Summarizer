<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'News Aggregator')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
</head>
<body style="margin:0;padding:0;min-height:100vh;background:#f3f4f6;">
    @include('partials.header')
    <main style="padding:0;">
        @yield('content')
    </main>
    @include('partials.footer')
</body>
</html>
