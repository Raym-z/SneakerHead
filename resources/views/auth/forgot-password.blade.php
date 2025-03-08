<x-guest-layout>
    <div class="mb-4 text-sm text-gray-800">
        {{ __('Forgot your password? No problem. Just enter your email address and we will send you a link to reset your password.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-gray-900" />
            <x-text-input id="email" 
            class="block mt-1 w-full border-gray-300 focus:ring-black focus:border-black 
                bg-white text-black placeholder-gray-500"
            type="email" name="email" :value="old('email')" required autofocus />

            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
        </div>

        <!-- Submit Button -->
        <div class="flex items-center justify-center mt-6">
            <x-primary-button class="px-6 py-2 text-white bg-black hover:bg-gray-900 transition rounded-md">
                {{ __('Send Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
