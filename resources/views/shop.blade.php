@extends('layouts.app')

@section('title', 'Shop - CoreTI')

@section('content')
<section class="py-16 px-4 bg-gray-50 min-h-screen flex items-center">
    <div class="max-w-7xl mx-auto">
        <h1 class="text-4xl md:text-5xl font-bold text-center text-gray-800 mb-12 uppercase">All Products</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @forelse($products as $product)
            <form action="{{ route('add_to_cart') }}" method="post" class="bg-white rounded-lg shadow-sm hover:shadow transition-all duration-300 overflow-hidden">
                @csrf
                <div class="relative">
                    <img class="w-full h-64 object-cover" src="{{ asset('uploaded_img/' . $product->image) }}" alt="{{ $product->name }}">
                    <div class="absolute top-4 left-4 bg-red-500 text-white px-4 py-2 rounded-lg font-bold text-xl shadow-lg">
                        Rp. {{ number_format($product->price, 0, ',', '.') }}
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">{{ $product->name }}</h3>
                    <input type="number" min="1" name="quantity" value="1" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg mb-4 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all outline-none text-lg">
                    <input type="hidden" name="name" value="{{ $product->name }}">
                    <input type="hidden" name="price" value="{{ $product->price }}">
                    <input type="hidden" name="image" value="{{ $product->image }}">
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg transition-all duration-300 uppercase">
                        Add to Cart
                    </button>
                </div>
            </form>
            @empty
            <div class="col-span-full text-center py-12">
                <p class="text-2xl text-red-500 border-2 border-red-500 bg-red-50 rounded-lg py-6 px-4 inline-block">
                    No products added yet!
                </p>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection