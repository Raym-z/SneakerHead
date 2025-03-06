@extends('layouts.app')

@section('content')
<div class="w-full px-4 sm:px-6 lg:px-8">
    <h2 class="text-2xl font-bold my-6">Search Results for "{{ $query }}"</h2>

    @if($products->isEmpty())
        <p class="text-gray-500">No products found.</p>
    @else
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($products as $product)
                <div class="bg-white shadow-md rounded-lg p-4">
                    <!-- Image with Lazy Loading -->
                    <div x-data="{ loaded: false }" class="relative w-full h-48">
                                <!-- Actual Image (Hidden Until Loaded) -->
                                <img @load="loaded = true" 
                                    src="{{ $product->image }}" 
                                    alt="{{ $product->name }}" 
                                    class="w-full h-48 object-cover rounded-md mt-2 transition-opacity duration-500"
                                    :class="{ 'opacity-0': !loaded }" />

                                <!-- Placeholder (Spinner) Shown Until Image Loads -->
                                <div x-show="!loaded" class="absolute inset-0 flex items-center justify-center bg-gray-200 rounded-md">
                                    <svg class="animate-spin h-8 w-8 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                                    </svg>
                                </div>
                            </div>
                    <h3 class="text-lg font-semibold mt-2">{{ $product->name }}</h3>
                    <p class="text-gray-600">From {{ number_format($product->price, 2) }} kr</p>
                </div>
            @endforeach
        </div>

        <div class="mt-6 d-flex justify-content-center">
            {{ $products->links('vendor.pagination.bootstrap-5') }}
        </div>
    @endif
</div>
@endsection
