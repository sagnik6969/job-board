<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Job Board</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="max-w-screen-md mx-auto mt-10">
        {{ $slot }}
    </div>
    {{-- similar to virw slots --}}
    {{-- <h1 class="text-6xl">Sagnik</h1> --}}
</body>

</html>
