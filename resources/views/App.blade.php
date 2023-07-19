<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? config('app.name') }}</title>
    <link rel="icon" href="{{ asset('img/Logo_pp.png') }}" class=" rounded-full">
    @vite('resources/css/app.css')
</head>

<body>
    @yield('content')
</body>

</html>
