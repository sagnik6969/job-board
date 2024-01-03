<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Jobs' => route('jobs.index')]" />
    <x-card class="pb-5 mb-4">
        <form action="{{ route('jobs.index') }}" method="GET">
            <div class="grid grid-cols-2 gap-2">
                <div>
                    <div class="mb-1 font-semibold">Search</div>
                    <x-text-input name="search" value="{{ request('search') }}"
                        placeholder="Search for any text"></x-text-input>
                </div>
                <div>
                    <div class="mb-1 font-semibold">Search</div>
                    <div class="flex space-x-2">
                        <x-text-input name="min_salary" value="{{ request('min_salary') }}"
                            placeholder="From"></x-text-input>
                        <x-text-input name="max_salary" value="{{ request('max_salary') }}"
                            placeholder="To"></x-text-input>
                    </div>
                </div>
                <div>
                    <div class="mb-1 font-semibold">Experience</div>
                    <x-radio-group name="experience" :options="array_combine(
                        array_map(fn($value) => Str::title($value), \App\Models\Job::$experiences),
                        \App\Models\Job::$experiences,
                    )"></x-radio-group>
                    {{-- Array map => similar to js array.map() --}}
                </div>
                <div>
                    <div class="mb-1 font-semibold">Category</div>
                    <x-radio-group name="category" :options="\App\Models\Job::$category"></x-radio-group>
                </div>
            </div>
            <x-button class="w-full mt-2">Filter</x-button>
        </form>
    </x-card>
    @foreach ($jobs as $job)
        <x-job-card :job="$job">
            <div class="mt-4">
                <x-link-button :href="route('jobs.show', ['job' => $job])">
                    Show
                </x-link-button>
            </div>
        </x-job-card>
    @endforeach
</x-layout>
