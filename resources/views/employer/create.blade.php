<x-layout>
    <x-card>
        <form class="p-4" action="{{ route('employer.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="font-semibold block mb-2">Complny Name</label>
                <x-text-input :value="old('company_name')" type="text" name="company_name"
                    placeholder="Enter your Company Name . . . . ."></x-text-input>
                @error('company_name')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <x-button class="w-full">Submit</x-button>
        </form>
    </x-card>
</x-layout>
