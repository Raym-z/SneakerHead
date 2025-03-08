<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full border-gray-300 focus:ring-black focus:border-black" 
                type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full border-gray-300 focus:ring-black focus:border-black"
                type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-400 text-black shadow-sm focus:ring-black" name="remember">
                <span class="ml-2 text-sm text-gray-800">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex flex-col items-center mt-6 space-y-4">
            @if (Route::has('password.request'))
                <a class="text-sm text-gray-700 hover:underline" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <!-- Buttons: Log in & Register -->
            <div class="flex space-x-4">
            <x-primary-button class="px-6 py-2 text-white bg-black hover:bg-gray-800 transition duration-300 ease-in-out transform hover:scale-105 shadow-md rounded-lg flex items-center space-x-2">
                <!-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H3m12 0l-4-4m4 4l-4 4m6-6a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg> -->
                <span>{{ __('Log in') }}</span>
            </x-primary-button>
                <a href="{{ route('register') }}" 
                   class="px-6 py-2 text-black border border-black hover:bg-gray-200 transition rounded-md">
                    {{ __('Register') }}
                </a>
            </div>
        </div>
    </form>
</x-guest-layout>
