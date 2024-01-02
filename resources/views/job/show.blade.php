<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Jobs' => route('jobs.index'), $job->title => '#']"></x-bredcrumbs>
        <x-job-card :job="$job"></x-job-card>
</x-layout>
