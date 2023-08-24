<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Ajib Darkah Distribusi' }}</title>

    {{-- Icon --}}
    <link rel="shortcut icon" href="/favicon.png" type="image/png">
    <link rel="icon" href="/favicon.png" type="image/png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=source-sans-pro:300,400,600,700&display=swap" rel="stylesheet" />

    {{-- vite resources --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased bg-gray-50 dark:bg-gray-900">
    <main class="p-4 h-full">
        {{ $slot }}
    </main>
</body>

</html>
