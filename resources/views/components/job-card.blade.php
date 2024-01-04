<div>
    <x-card class="mb-4">
        <div class="flex flex-row justify-between mb-4">
            <h1 class="text-xl font-medium">
                {{ $job->title }}
            </h1>
            <h1 class="text-gray-700 font-medium">
                ${{ number_format($job->salary) }}
            </h1>
        </div>
        <div class="mb-4 flex justify-between text-sm text-slate-500">
            <div class="flex space-x-4">
                <div>Company Name</div>
                <div>{{ $job->employer->company_name }}</div>
            </div>
            <div class="flex space-x-1 text-xs">
                <x-tag>
                    <a href="{{ route('jobs.index', ['experience' => $job->experience]) }}">
                        {{ $job->experience }}
                    </a>
                    {{-- TO make first element uppercase --}}
                </x-tag>
                <x-tag>
                    <a href="{{ route('jobs.index', ['category' => $job->category]) }}">
                        {{ $job->category }}
                    </a>
                </x-tag>
            </div>
        </div>
        {{ $slot }}
    </x-card>
</div>
