@extends('layouts.app')

@section('content')
<div class="w-full">
    <!-- Hero Section -->
    <div class="bg-gray-100 py-16 text-center">
        <h1 class="text-4xl font-bold text-gray-900">The Sneaker Store.</h1>
        <p class="text-gray-600 mt-2">Find the best shoes at unbeatable prices!</p>
    </div>

    <!-- Featured Products Section -->
    <div class="mt-12 min-h-screen px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center ml-5 mr-5">
            <h2 class="text-2xl font-bold">Bestsellers</h2>
            <a href="#" class="text-gray-600 text-sm font-semibold tracking-wide uppercase relative group">
                SEE ALL
                <span class="absolute left-0 bottom-0 w-full h-[1px] bg-gray-600 scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></span>
            </a>
        </div>


        <!-- Carousel Wrapper -->
        <div x-data="{ 
            currentIndex: 4, 
            totalItems: {{ count($products) }},
            transitionEnabled: true,
            autoScrollTimer: null,

            startAutoScroll() {
                clearInterval(this.autoScrollTimer); // Clear existing timer
                this.autoScrollTimer = setInterval(() => {
                    this.next();
                }, 10000); // Restart with 10 seconds delay
            },

            next() {
                this.startAutoScroll(); // Reset auto-scroll timer
                if (this.currentIndex >= this.totalItems + 4) {
                    this.transitionEnabled = false;
                    this.currentIndex = 4;
                    setTimeout(() => { 
                        this.transitionEnabled = true; 
                        this.currentIndex++; 
                    }, 50);
                } else {
                    this.currentIndex++;
                }
            },

            prev() {
                this.startAutoScroll(); // Reset auto-scroll timer
                if (this.currentIndex <= 0) {
                    this.transitionEnabled = false;
                    this.currentIndex = this.totalItems;
                    setTimeout(() => { 
                        this.transitionEnabled = true; 
                        this.currentIndex--; 
                    }, 50);
                } else {
                    this.currentIndex--;
                }
            },
            
            init() {
                this.startAutoScroll(); // Start auto-scroll initially
            }
        }"
        x-init="init()"class="relative w-full overflow-hidden mt-6">

            <!-- Inner Carousel (Duplicates first & last items for smooth looping) -->
            <div class="flex"
                :class="transitionEnabled ? 'transition-transform duration-500 ease-in-out' : ''"
                :style="'transform: translateX(-' + (currentIndex * 25) + '%)'" style="width: 500%">

                <!-- Duplicate last 4 items at the start -->
                @foreach($products->slice(-4) as $product)
                    <div class="w-1/4 flex-shrink-0 p-4">
                        <div class="bg-white shadow-md rounded-lg p-4">
                            <span class="bg-black text-white text-xs font-bold px-2 py-1 rounded">Bestseller</span>
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
                    </div>
                @endforeach

                <!-- Original product list with Lazy Loading -->
                @foreach($products as $product)
                    <div class="w-1/4 flex-shrink-0 p-4">
                        <div class="bg-white shadow-md rounded-lg p-4">
                            <span class="bg-black text-white text-xs font-bold px-2 py-1 rounded">Bestseller</span>
                            
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

                            <!-- Product Name & Price -->
                            <h3 class="text-lg font-semibold mt-2">{{ $product->name }}</h3>
                            <p class="text-gray-600">From {{ number_format($product->price, 2) }} kr</p>
                        </div>
                    </div>
                @endforeach


                <!-- Duplicate first 4 items at the end -->
                @foreach($products->take(4) as $product)
                    <div class="w-1/4 flex-shrink-0 p-4">
                        <div class="bg-white shadow-md rounded-lg p-4">
                            <span class="bg-black text-white text-xs font-bold px-2 py-1 rounded">Bestseller</span>
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
                    </div>
                @endforeach
            </div>

            <!-- Carousel Navigation Buttons -->
            <button @click="prev()"
                class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white px-3 py-2 rounded-full">
                ❮
            </button>
            <button @click="next()"
                class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white px-3 py-2 rounded-full">
                ❯
            </button>
        </div>
    </div>
</div>
@endsection
