@extends('layouts.app')

@section('content')
<div class="w-full px-4 sm:px-6 lg:px-8">
    <h2 class="text-2xl font-bold my-6">Search Results for "{{ $query }}"</h2>

    @if($products->isEmpty())
        <p class="text-gray-500">No products found.</p>
    @else
        <div class="relative w-full overflow-hidden mt-6 flex flex-wrap -mx-1">
            @foreach($products as $product)
            <div class="w-1/5 flex-shrink-0 px-1">
                <div class="relative bg-white overflow-hidden group ">
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

        <div class="mt-6 d-flex justify-content-center">
            {{ $products->links('vendor.pagination.bootstrap-5') }}
        </div>
    @endif
</div>
@endsection
