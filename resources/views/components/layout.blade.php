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
        <nav class="mb-8 text-lg font-medium flex justify-between">
            <ul>
                <li>
                    <a href="{{ route('jobs.index') }}">Home</a>
                </li>
            </ul>
            <ul>
                @auth
                    <form action="{{ route('auth.destroy') }}" method="POST">
                        @method('delete')
                        @csrf
                        <button>Logout</button>
                    </form>
                @else
                    <a href="{{ route('auth.create') }}">Login</a>
                @endauth

            </ul>
        </nav>
        {{-- {{ auth()->user()->name ?? 'Guest' }} --}}
        {{-- if user is  authenticated we can get the userlike above --}}

        @if (session('success'))
            <div role="alert"
                class="my-8 rounded-md border-l-4 border-green-300 bg-green-100 p-4 text-green-700 opacity-75">
                <p class="font-bold">Success!</p>
                <p>{{ session('success') }}</p>
            </div>
        @endif
        {{ $slot }}
    </div>
    {{-- similar to virw slots --}}
    {{-- <h1 class="text-6xl">Sagnik</h1> --}}
</body>

</html>
