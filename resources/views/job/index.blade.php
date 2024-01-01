<x-layout>
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
