<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Jobs' => route('jobs.index')]" />
    <x-card class="pb-5 mb-4">
        <form action="{{ route('jobs.index') }}" method="GET">
            <div class="grid grid-cols-2 gap-2">
                <div>
                    <div class="mb-1 font-semibold">Search</div>
                    <x-text-input name="search" value="{{request('search')}}" placeholder="Search for any text"></x-text-input>
                </div>
                <div>
                    <div class="mb-1 font-semibold">Search</div>
                    <div class="flex space-x-2">
                        <x-text-input name="min_salary" value="{{request('min_salary')}}" placeholder="From"></x-text-input>
                        <x-text-input name="max_salary" value="{{request('max_salary')}}" placeholder="To"></x-text-input>
                    </div>
                </div>
            </div>
            <button
                class="mt-4 rounded-md border-2 border-slate-400 py-0.5 px-2 w-full hover:bg-slate-200 duration-200">Filter</button>
        </form>
    </x-card>
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
