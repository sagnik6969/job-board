<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Jobs' => route('jobs.index'), $job->title => '#']"></x-bredcrumbs>
        <x-job-card :job="$job">
            <p class="text-sm text-slate-500">{{ $job->description }}</p>
        </x-job-card>
</x-layout>
