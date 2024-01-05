<x-layout>
    <x-breadcrumbs class="mb-4" :links="['My Applications' => '#']"></x-breadcrumbs>
    @foreach ($applications as $application)
        <x-job-card :job="$application->job"></x-job-card>
    @endforeach
</x-layout>
