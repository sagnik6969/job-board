<nav {{ $attributes }}>
    <ul class="flex space-x-2 font-medium text-slate-500">
        <li><a href="/">Home</a></li>
        @foreach ($links as $key => $link)
            <li>🡲</li>
            <li><a href="{{ $link }}">{{ $key }}</a></li>
        @endforeach
    </ul>
</nav>
