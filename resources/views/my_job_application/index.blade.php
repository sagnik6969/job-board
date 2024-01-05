<x-layout>
    <x-breadcrumbs class="mb-4" :links="['My Applications' => '#']"></x-breadcrumbs>
    @foreach ($applications as $application)
        <x-job-card :job="$application->job">
            <div class="flex items-center justify-between text-xs text-slate-500">
                <div>
                    <div>Applied {{ $application->created_at->diffForHumans() }}</div>
                    <div>Ohter applicatnts: {{ $application->job->job_applications_count }}</div>
                    <div>Your asking salary ${{ number_format($application->expected_salary) }}</div>
                    <div>Average asking salary
                        {{ number_format($application->job->job_applications_avg_expected_salary) }}</div>
                </div>
            </div>
        </x-job-card>
    @endforeach
</x-layout>
