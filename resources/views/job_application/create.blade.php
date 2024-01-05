<x-layout>
    <x-breadcrumbs class="mb-4" :links="[
        'Jobs' => route('jobs.index'),
        $job->title => route('jobs.show', ['job' => $job]),
        'Apply' => '#',
    ]"></x-bredcrumbs>
        <x-job-card :job="$job">
            <p class="text-sm text-slate-500">{{ $job->description }}</p>
        </x-job-card>
        <x-card>
            <h1 class="text-xl font-medium">
                Your Job Application
            </h1>
            <form class="p-4" action="{{ route('jobs.application.store', ['job' => $job]) }}" method="POST"
                enctype="multipart/form-data">
                {{-- enctype="multipart/form-data" => needed for file upload --}}
                @csrf
                <div class="mb-4">
                    <label class="font-semibold block mb-2">Expected Salary</label>
                    <x-text-input :value="old('email')" type="number" name="expected_salary"
                        placeholder="Enter your expected salary . . . . ."></x-text-input>
                    @error('expected_salary')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="font-semibold block mb-2">Expected Salary</label>
                    <x-text-input type="file" name="cv"></x-text-input>
                    @error('cv')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <x-button class="w-full">Submit</x-button>
            </form>
        </x-card>
</x-layout>
