<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-50 text-gray-900">
        <!-- Navigation Bar -->
        <div class="bg-white ">
            @include('layouts.navigation')
        </div>

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-gray-100 ">
                <div class="w-full">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main class="min-h-screen">
            <div class="w-full">
                @yield('content')
            </div>
        </main>


        <!-- Footer (Optional) -->
        <footer class="bg-gray-100 text-center py-4 text-gray-600 mt-8">
            &copy; {{ date('Y') }} The Sneaker Head. All rights reserved.
        </footer>
    </body>
</html>
