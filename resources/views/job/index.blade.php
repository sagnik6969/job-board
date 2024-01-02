<x-layout>
    <x-card>
        <div class="grid grid-cols-2 gap-2">
            <div>
                <div class="mb-1 font-semibold">Search</div>
                <x-text-input name="search" value="" placeholder="Search for any text"></x-text-input>
            </div>
            <div>
                <div class="mb-1 font-semibold">Search</div>
                <div class="flex space-x-2">
                    <x-text-input name="min_salary" value="" placeholder="From"></x-text-input>
                    <x-text-input name="max_salary" value="" placeholder="To"></x-text-input>
                </div>
            </div>
            <div>1</div>
            <div>1</div>
        </div>
    </x-card>
    <x-breadcrumbs class="mb-4" :links="['Jobs' => route('jobs.index')]" />
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
