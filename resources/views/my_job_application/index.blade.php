<x-layout>
    <x-breadcrumbs class="mb-4" :links="['My Applications' => '#']"></x-breadcrumbs>
    @forelse ($applications as $application)
        <x-job-card :job="$application->job">
            <div class="flex items-center justify-between text-xs text-slate-500">
                <div>
                    <div>Applied {{ $application->created_at->diffForHumans() }}</div>
                    <div>Ohter applicatnts: {{ $application->job->job_applications_count }}</div>
                    <div>Your asking salary ${{ number_format($application->expected_salary) }}</div>
                    <div>Average asking salary
                        {{ number_format($application->job->job_applications_avg_expected_salary) }}</div>
                </div>
                {{-- <div class=""> --}}
                <form action="{{ route('my-job-applications.destroy', ['my_job_application' => $application]) }}"
                    method="POST">
                    @csrf
                    @method('delete')
                    <x-button class="self-end text-base">
                        Cancil Application
                    </x-button>
                </form>
                {{-- </div> --}}
            </div>
        </x-job-card>
    @empty
        <x-card class="flex items-center flex-col py-10">
            <div class="text-l font-medium">You Have Not Applied To Any Job</div>
            <div class="text-base text-slate-500">Apply for jobs
                <a class="text-blue-800 underline" href="{{ route('jobs.index') }}">here</a>
            </div>
        </x-card>
    @endforelse
</x-layout>
