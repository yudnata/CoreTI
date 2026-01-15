@extends('layouts.app')

@section('title', 'Shopping Cart - CoreTI')

@section('content')
    <section class="py-16 px-4 bg-gray-50">
        <div class="max-w-7xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-bold text-center text-gray-800 mb-12 uppercase">Products Added</h1>

            <div class="space-y-6 mb-12">
                @php $grand_total = 0; @endphp
                @forelse($cart_items as $item)
                    <div class="bg-white rounded-lg shadow-sm p-6 flex flex-col md:flex-row items-center gap-6 hover:shadow transition-all duration-300">
                        <a href="{{ route('cart.delete', $item->id) }}" onclick="return confirm('Delete this from cart?');"
                            class="absolute top-4 right-4 md:relative md:top-auto md:right-auto text-2xl text-red-500 hover:text-red-700 transition-colors">
                            <i class="fas fa-times"></i>
                        </a>
                        <img src="{{ asset('uploaded_img/' . $item->image) }}" alt="{{ $item->name }}" class="w-40 h-40 object-cover rounded-lg">

                        <div class="flex-1 text-center md:text-left">
                            <h3 class="text-2xl font-semibold text-gray-800 mb-2">{{ $item->name }}</h3>
                            <p class="text-xl text-red-500 font-bold mb-4">Rp. {{ number_format($item->price, 0, ',', '.') }}/-</p>
                            <form action="{{ route('cart.update') }}" method="post" class="flex items-center gap-4 justify-center md:justify-start">
                                @csrf
                                <input type="hidden" name="cart_id" value="{{ $item->id }}">
                                <input type="number" min="1" name="cart_quantity" value="{{ $item->quantity }}"
                                    class="w-24 px-4 py-2 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all outline-none text-lg">
                                <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white font-semibold px-6 py-2 rounded-lg transition-all duration-300 uppercase">
                                    Update
                                </button>
                            </form>
                        </div>
                        <div class="text-center md:text-right">
                            <p class="text-lg text-gray-600 mb-2">Sub Total:</p>
                            <p class="text-2xl font-bold text-gray-800">Rp. {{ number_format($item->price * $item->quantity, 0, ',', '.') }}/-</p>
                        </div>
                    </div>
                    @php $grand_total += ($item->price * $item->quantity); @endphp
                @empty
                    <div class="text-center py-12">
                        <p class="text-2xl text-red-500 border-2 border-red-500 bg-red-50 rounded-lg py-6 px-4 inline-block">
                            Your cart is empty!
                        </p>
                    </div>
                @endforelse
            </div>

            <div class="bg-white rounded-lg shadow-sm p-8 max-w-2xl mx-auto">
                <p class="text-3xl font-bold text-gray-800 mb-6 text-center">
                    Grand Total: <span class="text-blue-600">Rp. {{ number_format($grand_total, 0, ',', '.') }}/-</span>
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('shop') }}"
                        class="flex-1 bg-orange-500 hover:bg-orange-600 text-white font-semibold py-4 rounded-lg text-center transition-all duration-300 uppercase">
                        Continue Shopping
                    </a>
                    <a href="{{ route('checkout') }}"
                        class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-4 rounded-lg text-center transition-all duration-300 uppercase {{ ($grand_total > 1) ? '' : 'opacity-50 cursor-not-allowed' }}"
                        {{ ($grand_total > 1) ? '' : 'onclick="return false;"' }}>
                        Proceed to Checkout
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection