<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Admin Website' }}</title>

    @include('_head')
</head>
<body>
    <div id="app">
        <main class="site-main">
            <div class="site-content">
                {{ $slot }}
            </div>
        </main>
    </div>
</body>
</html>
