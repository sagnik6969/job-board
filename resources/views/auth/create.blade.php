<x-layout>
    <h1 class="text-3xl font-semibold my-11 block text-center">Sign In to your account</h1>
    <x-card>
        <form class="p-4" action="{{ route('auth.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="font-semibold block mb-2">Email</label>
                <x-text-input :value="old('email')" type="email" name="email"
                    placeholder="Enter your email"></x-text-input>
                @error('email')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="font-semibold block mb-2">Password</label>
                <x-text-input name="password" type="password" placeholder="password"></x-text-input>
                @error('password')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex justify-between mb-8">
                <div class="flex items-center space-x-2">
                    <input class="rounded-sm" type="checkbox" name="remember" id="remember">
                    <label for="remember">Remember Me</label>
                </div>
                <div>
                    <a class="font-semibold text-blue-900 hover:underline" href="#">Forget Password?</a>
                </div>
            </div>
            <x-button class="w-full">Submit</x-button>
        </form>
    </x-card>
</x-layout>
