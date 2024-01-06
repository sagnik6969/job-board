<x-layout>
    <div class="mb-5 text-right">
        <x-link-button href="{{ route('my_jobs.create') }}">
            Add New Job
        </x-link-button>
    </div>
    @foreach ($jobs as $job)
        <x-job-card :job="$job">
            <div class="my-4 text-sm text-slate-600">
                @foreach ($job->jobApplications as $application)
                    <div class="flex items-center justify-between p-4 border-2 border-slate-200 rounded">
                        <div>
                            <div class="mb-1">{{ $application->user->name }}</div>
                            <div class="mb-3">{{ $application->created_at->diffForHumans() }}</div>
                            <a class="text-blue-900 underline font-semibold" href="#">Download CV</a>
                            {{-- <x-link-button href="#">Download CV</x-link-button> --}}
                        </div>
                        <div>
                            Expectede salary: {{ $application->expected_salary }}
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="flex space-x-2">
                <x-link-button href="{{ route('my_jobs.edit', ['my_job' => $job]) }}">Edit Job</x-link-buttonn>
                    <form action="{{ route('my_jobs.destroy', ['my_job' => $job]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <x-button href="">Delete Job</x-buttonn>
                    </form>
            </div>
        </x-job-card>
    @endforeach
</x-layout>
