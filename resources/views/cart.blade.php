@extends('layouts.app')

@section('content')
<div class="w-full px-4 sm:px-6 lg:px-8">
    <h2 class="text-2xl font-bold my-6">Shopping Cart</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded-md mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(empty($cart))
        <p class="text-gray-500">Your cart is empty.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($cart as $id => $item)
                <div class="bg-white shadow-md rounded-lg p-4">
                    <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="w-full h-48 object-cover rounded-md">
                    <h3 class="text-lg font-semibold mt-2">{{ $item['name'] }}</h3>
                    <p class="text-gray-600">Price: {{ number_format($item['price'], 2) }} kr</p>
                    <p class="text-gray-600">Quantity: {{ $item['quantity'] }}</p>

                    <!-- Remove button -->
                    <form action="{{ route('cart.remove', $id) }}" method="POST" class="mt-2">
                        @csrf
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md">
                            Remove
                        </button>
                    </form>
                </div>
            @endforeach
        </div>

        <!-- Clear Cart Button -->
        <form action="{{ route('cart.clear') }}" method="POST" class="mt-6">
            @csrf
            <button type="submit" class="bg-gray-700 text-white px-4 py-2 rounded-md">
                Clear Cart
            </button>
        </form>
    @endif
</div>
@endsection
