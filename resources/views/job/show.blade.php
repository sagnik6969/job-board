<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Jobs' => route('jobs.index'), $job->title => '#']"></x-bredcrumbs>
        <x-job-card :job="$job">
            <p class="mb-4 text-sm text-slate-500">{{ $job->description }}</p>

            @can('apply', $job)
                {{-- uses policies (jobPolicy) to suthorise the user --}}
                <x-link-button :href="route('jobs.application.create', ['job' => $job])">Apply</x-link-button>
            @else
                <div class="text-center text-slate-500 font-medium">You have alrady applied!</div>
            @endcan
        </x-job-card>


        <x-card class="mb-4">
            <h2 class="mb-4 text-lg font-medium">
                More Jobs From {{ $job->employer->company_name }}
            </h2>

            <div class="text-sm text-slate-500">
                @foreach ($job->employer->jobs as $otherJob)
                    <div class="mb-4 flex justify-between">
                        <div>
                            <div class="text-slate-700 text-sm">
                                <a href="{{ route('jobs.show', $otherJob) }}">
                                    {{ $otherJob->title }}
                                </a>
                            </div>
                            <div class="text-xs">
                                {{ $otherJob->created_at->diffForHumans() }}
                            </div>
                        </div>
                        <div class="text-xs">
                            ${{ number_format($otherJob->salary) }}
                        </div>
                    </div>
                @endforeach
            </div>
        </x-card>
</x-layout>
