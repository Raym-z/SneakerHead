<nav class="bg-white border-b border-gray-200" x-data="{ searchOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between h-16 items-center">
        
        <!-- Left Side: Logo -->
        <div class="flex items-center">
            <a href="{{ route('home') }}">
                <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
            </a>
        </div>

        <!-- Right Side: Cart & Auth Links -->
        <div class="flex items-center space-x-6 ml-0">
            <!-- Search Button -->
            <button @click="searchOpen = true" class="text-gray-700 hover:bg-gray-100 p-2 rounded-md">
                🔍
            </button>
            
            <!-- Cart Button -->
            <a href="{{ route('cart') }}" class="relative text-gray-700 hover:text-gray-900">
                🛒
                <span class="absolute -top-2 -right-3 bg-red-500 text-white text-xs font-bold w-5 h-5 flex items-center justify-center rounded-full">
                    {{ session('cart_count', 0) }}
                </span>
            </a>

            <!-- Authentication Links -->
            @auth
                <a href="{{ route('profile.edit') }}" class="text-gray-700 hover:bg-gray-100 px-4 py-2 rounded-md transition">
                    <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" class="w-8 h-8 rounded-full">
                </a>
            @else
                <a href="{{ route('login') }}" class="text-gray-700 hover:bg-gray-100 px-4 py-2 rounded-md transition">
                    {{ __('Login') }}
                </a>
                <a href="{{ route('register') }}" class="text-gray-700 hover:bg-gray-100 px-4 py-2 rounded-md transition">
                    {{ __('Register') }}
                </a>
            @endauth
        </div>
    </div>

    <!-- Full-width Search Modal (Pinned to the Top) -->
    <div x-show="searchOpen" x-transition.opacity x-cloak 
         class="fixed top-0 left-0 right-0 bg-white shadow-lg z-50 p-4 border-b border-gray-200"
         @keydown.window.escape="searchOpen = false">
        <div class="max-w-3xl mx-auto flex items-center">
            <input type="text" placeholder="Search..." class="w-full p-3 border rounded bg-gray-100 text-lg">
            <button @click="searchOpen = false" class="ml-4 text-gray-500 hover:text-gray-700">
                ❌
            </button>
        </div>
    </div>
</nav>
