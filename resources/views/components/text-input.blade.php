@if (!isset($type) || $type !== 'textarea')
    <input type="{{ $type ?? 'text' }}" name="{{ $name }}" id="{{ $name }}"
        placeholder="{{ $placeholder }}" value="{{ $value }}"
        class="w-full rounded-md border-0 py-1.5 px-2.5 text-sm ring-1 ring-slate-300 placeholder:text-slate-400 focus:ring-2">
@else
    <textarea name="{{ $name }} placeholder="{{ $placeholder }}"
        class="w-full h-36 rounded-md border-0 py-1.5 px-2.5 text-sm ring-1 ring-slate-300 placeholder:text-slate-400 focus:ring-2">{{ $value }}</textarea>
@endif
