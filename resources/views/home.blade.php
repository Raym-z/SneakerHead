@extends('layouts.app')
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@section('content')
<div class="w-full">
    <!-- Hero Section -->
    <div class="relative w-full">
        <!-- Background Hero Images -->
        <div class="absolute inset-0">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-0 w-full h-full">
                @foreach($heroImages as $image)
                    <div class="relative w-full h-[500px] md:h-[600px] lg:h-[780px]">
                        <img src="{{ $image }}" alt="Sneaker Hero" 
                            class="absolute inset-0 w-full h-full object-cover"/>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Overlay with Title & Subtitle -->
        <div class="relative z-10 flex flex-col items-center justify-center text-center text-white w-full h-[500px] md:h-[600px] lg:h-[780px] bg-black/50">
            <h1 class="text-4xl md:text-5xl font-bold">The Sneaker Head.</h1>
            <p class="text-lg md:text-xl mt-2">Find the best shoes at unbeatable prices!</p>
        </div>
    </div>



    <!-- Featured products_best Section -->
    <!-- Bestsellers Section -->
<div x-data="{ 
    currentIndex: 5, 
    totalItems: {{ count($products_best) }},
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
        if (this.currentIndex >= this.totalItems + 5) {
            this.transitionEnabled = false;
            this.currentIndex = 5;
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
x-init="init()" class="mt-8 min-h-screen px-4 sm:px-6 lg:px-8">

    <!-- Header with Arrows & "SEE ALL" -->
    <div class="flex items-center justify-center w-full max-w-5xl mx-auto relative ">
        <!-- Left Navigation Button -->
        <button @click="prev()" 
            class="text-gray-600 hover:text-black p-2 rounded-full transition mx-4"">
            ❮
        </button>

        <!-- Center Title & See All -->
        <div class="flex flex-col items-center text-center">
            <h2 class="text-2xl font-bold">Bestsellers</h2>
            <a href="#" class="text-gray-600 text-sm font-semibold tracking-wide uppercase relative group mt-1">
                SEE ALL
                <span class="absolute left-0 bottom-0 w-full h-[1px] bg-gray-600 scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></span>
            </a>
        </div>

        <!-- Right Navigation Button -->
        <button @click="next()" 
            class="text-gray-600 hover:text-black p-2 rounded-full transition mx-4">
            ❯
        </button>
    </div>

    <!-- Carousel Wrapper -->
    <div class="relative w-full overflow-hidden mt-4">
        <div class="flex"
            :class="transitionEnabled ? 'transition-transform duration-500 ease-in-out' : ''"
            :style="'transform: translateX(-' + (currentIndex * 20) + '%)'" style="width: 500%">

        


            <!-- Duplicate last 5 items at the start -->
            @foreach($products_best->slice(-8) as $product)
                <div class="w-1/5 flex-shrink-0 px-1 ">
                    <div class="relative bg-white overflow-hidden group">
                        <!-- Bestseller Badge -->
                        <div class="absolute top-2 left-2 bg-black text-white text-xs font-bold px-3 py-1 z-10">
                            Bestseller
                        </div>

                        <!-- Image Section (Now Zoomed and Overflow Hidden) -->
                        <div class="relative w-full h-[280px] overflow-hidden">
                            <img src="{{ $product->image }}" alt="{{ $product->name }}" 
                                class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110"/>
                        </div>

                        <!-- Product Details -->
                        <div class="p-3 text-left h-[140px]">
                            <h3 class="text-md font-semibold text-gray-900">{{ $product->name }}</h3>
                            <p class="text-gray-600 text-sm line-clamp-2 overflow-hidden">{{ $product->description }}</p>
                            <p class="text-gray-700 font-medium mt-1">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        </div>

                    </div>
                </div>
            @endforeach

            <!-- Original product list -->
            @foreach($products_best as $product)
                <div class="w-1/5 flex-shrink-0 px-1">
                    <div class="relative bg-white overflow-hidden group">
                        <!-- Bestseller Badge -->
                        <div class="absolute top-2 left-2 bg-black text-white text-xs font-bold px-3 py-1 z-10">
                            Bestseller
                        </div>

                        <!-- Image Section (Now Zoomed and Overflow Hidden) -->
                        <div class="relative w-full h-[280px] overflow-hidden">
                            <img src="{{ $product->image }}" alt="{{ $product->name }}" 
                                class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110"/>
                        </div>

                        <!-- Product Details -->
                        <div class="p-3 text-left h-[140px]">
                            <h3 class="text-md font-semibold text-gray-900">{{ $product->name }}</h3>
                            <p class="text-gray-600 text-sm line-clamp-2 overflow-hidden">{{ $product->description }}</p>
                            <p class="text-gray-700 font-medium mt-1">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        </div>

                    </div>
                </div>
            @endforeach


            <!-- Duplicate first 5 items at the end -->
            @foreach($products_best->take(8) as $product)
                <div class="w-1/5 flex-shrink-0 px-1">
                    <div class="relative bg-white  overflow-hidden group">
                        <!-- Bestseller Badge -->
                        <div class="absolute top-2 left-2 bg-black text-white text-xs font-bold px-3 py-1 z-10">
                            Bestseller
                        </div>

                        <!-- Image Section (Now Zoomed and Overflow Hidden) -->
                        <div class="relative w-full h-[280px] overflow-hidden">
                            <img src="{{ $product->image }}" alt="{{ $product->name }}" 
                                class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110"/>
                        </div>

                        <!-- Product Details -->
                        <div class="p-3 text-left h-[140px]">
                            <h3 class="text-md font-semibold text-gray-900">{{ $product->name }}</h3>
                            <p class="text-gray-600 text-sm line-clamp-2 overflow-hidden">{{ $product->description }}</p>
                            <p class="text-gray-700 font-medium mt-1">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

</div>
@endsection
