<div>
    <label for="{{ $name }}" class="mb-1 flex items-center">
        <input type="radio" name="{{ $name }}" value="" @checked(!request($name))>
        {{-- in laravel requests empty strings ("") will be automatically converted to null --}}
        <span class="ml-2">All</span>
    </label>

    @foreach ($optionsWithLabels as $label => $option)
        <label for="{{ $name }}" class="mb-1 flex items-center">
            <input type="radio" name="{{ $name }}" value="{{ $option }}" @checked(request($name) == $option)>
            <span class="ml-2">{{ $label }}</span>
        </label>
    @endforeach

</div>
