<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Job Board</title>
    @vite('resources/js/app.js')
    @vite('resources/css/app.css')
</head>

<body class="mx-auto mt-10 max-w-2xl bg-slate-200 text-slate-700">
    <div>
        {{ auth()->user()->name ?? 'Guest' }}
        {{ $slot }}
    </div>
    {{-- similar to virw slots --}}
    {{-- <h1 class="text-6xl">Sagnik</h1> --}}
</body>

</html>
