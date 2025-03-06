@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <!-- Hero Section -->
    <div class="bg-gray-100 py-16 text-center">
        <h1 class="text-4xl font-bold text-gray-900">The Sneaker Store.</h1>
        <p class="text-gray-600 mt-2">Find the best shoes at unbeatable prices!</p>
    </div>

    <!-- Featured Products Section -->
    <div class="mt-12">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold">Bestsellers</h2>
            <a href="#" class="text-blue-500 hover:underline">SEE ALL</a>
        </div>

        <!-- Carousel Wrapper -->
        <div x-data="{ 
                currentIndex: 0, 
                maxIndex: {{ count($products) - 4 }},
                autoScroll() {
                    setInterval(() => {
                        this.currentIndex = this.currentIndex < this.maxIndex ? this.currentIndex + 1 : 0;
                    }, 10000); // Auto-scroll every 10 seconds
                }
            }" x-init="autoScroll()" class="relative w-full overflow-hidden mt-6">

            <!-- Inner Carousel -->
            <div class="flex transition-transform duration-500 ease-in-out"
                :style="'transform: translateX(-' + (currentIndex * 25) + '%)'" style="width: 400%">

                @foreach($products as $product)
                    <div class="w-1/4 flex-shrink-0 p-4">
                        <div class="bg-white shadow-md rounded-lg p-4">
                            <span class="bg-black text-white text-xs font-bold px-2 py-1 rounded">Bestseller</span>
                            <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded-md mt-2">
                            <h3 class="text-lg font-semibold mt-2">{{ $product->name }}</h3>
                            <p class="text-gray-600">From {{ number_format($product->price, 2) }} kr</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Carousel Navigation Buttons -->
            <button @click="currentIndex = currentIndex > 0 ? currentIndex - 1 : maxIndex"
                class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white px-3 py-2 rounded-full">
                ❮
            </button>
            <button @click="currentIndex = currentIndex < maxIndex ? currentIndex + 1 : 0"
                class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white px-3 py-2 rounded-full">
                ❯
            </button>
        </div>
    </div>
</div>
@endsection
