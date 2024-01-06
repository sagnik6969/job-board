<x-layout>
    <x-card class="pb-5 mb-4">
        <form action="{{ route('my_jobs.update', ['my_job' => $job]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-2 gap-2">
                <div>
                    <div class="mb-1 font-semibold">Job Title</div>
                    <x-text-input name="title" value="{{ $job->title }}"
                        placeholder="Enter job title . . . ."></x-text-input>
                    @error('title')
                        <div class="text-sm text-red-700">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <div class="mb-1 font-semibold">Location</div>
                    <x-text-input name="location" value="{{ $job->location }}"
                        placeholder="Enter job location . . . ."></x-text-input>
                    @error('location')
                        <div class="text-sm text-red-700">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-span-2">
                    <div class="mb-1 font-semibold">Salary</div>
                    <x-text-input name="salary" value="{{ $job->salary }}"
                        placeholder="Enter salary . . . ."></x-text-input>
                    @error('salary')
                        <div class="text-sm text-red-700">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-span-2">
                    <div class="mb-1 font-semibold">Description</div>
                    <x-text-input type='textarea' name="description" value="{{ $job->description }}"
                        placeholder="Enter job description . . . ."></x-text-input>
                    @error('description')
                        <div class="text-sm text-red-700">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <div class="mb-1 font-semibold">Experience</div>
                    @error('experience')
                        <div class="text-sm text-red-700">{{ $message }}</div>
                    @enderror
                    <x-radio-group :value="$job->experience" name="experience" :all="false"
                        :options="array_combine(
                            array_map(fn($value) => Str::title($value), \App\Models\Job::$experiences),
                            \App\Models\Job::$experiences,
                        )"></x-radio-group>
                    {{-- Array map => similar to js array.map() --}}
                </div>
                <div>
                    <div class="mb-1 font-semibold">Category</div>
                    @error('category')
                        <div class="text-sm text-red-700">{{ $message }}</div>
                    @enderror
                    <x-radio-group :value="$job->category" :all="false" name="category"
                        :options="\App\Models\Job::$category"></x-radio-group>
                </div>
            </div>
            <x-button class="w-full mt-2">Add Job</x-button>
        </form>
    </x-card>
</x-layout>
