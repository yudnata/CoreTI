@extends('layouts.app')

@section('title', 'Home - CoreTI')

@section('content')
    <section class="min-h-screen relative flex items-center justify-center px-4 hero-bg">
        <div class="max-w-3xl text-center z-10">
            <h3 class="text-5xl md:text-6xl font-bold text-white mb-6 uppercase">Ultimate Hardware Solutions in Bali</h3>
            <p class="text-md md:text-lg text-white/90 mb-8 leading-relaxed">
                Kami menyediakan berbagai komponen berkualitas tinggi, mulai dari prosesor mutakhir, kartu grafis, motherboard, hingga aksesori pendukung lainnya. Dengan koleksi yang terus diperbarui dan
                layanan pelanggan yang berdedikasi, CoreTI memastikan Anda mendapatkan pengalaman berbelanja yang mudah dan memuaskan. Dapatkan solusi hardware terbaik untuk meningkatkan kinerja dan
                produktivitas Anda hanya di CoreTI!
            </p>
            <a href="{{ route('about') }}"
                class="inline-block bg-white text-blue-600 font-semibold px-8 py-4 rounded-lg hover:bg-gray-100 transition-all duration-300 uppercase">
                Discover More
            </a>
        </div>
    </section>

    <section class="py-16 px-4 bg-gray-50">
        <div class="max-w-7xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-bold text-center text-gray-800 mb-12 uppercase">Latest Products</h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @forelse($products as $product)
                    <form action="{{ route('add_to_cart') }}" method="post" class="bg-white rounded-lg shadow-sm hover:shadow transition-all duration-300 overflow-hidden">
                        @csrf
                        <div class="relative">
                            <img class="w-full h-64 object-cover" src="{{ asset('uploaded_img/' . $product->image) }}" alt="{{ $product->name }}">
                            <div class="absolute top-4 left-4 bg-red-500 text-white px-4 py-2 rounded-lg font-bold text-xl">
                                Rp{{ number_format($product->price, 0, ',', '.') }}
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">{{ $product->name }}</h3>
                            <input type="number" min="1" name="quantity" value="1"
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg mb-4 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all outline-none">
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
            <div class="text-center mt-12">
                <a href="{{ route('shop') }}"
                    class="inline-block bg-orange-500 hover:bg-orange-600 text-white font-semibold px-8 py-4 rounded-lg transition-all duration-300 uppercase">
                    Load More
                </a>
            </div>
        </div>
    </section>

    <section class="py-16 px-4">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row items-center gap-8">
                <div class="flex-1">
                    <img src="{{ asset('assets/images/about-img.jpg') }}" alt="About CoreTI" class="rounded-lg shadow-lg w-full">
                </div>
                <div class="flex-1 bg-gray-50 p-8 rounded-lg">
                    <h3 class="text-4xl font-bold text-gray-800 mb-6 uppercase">About Us</h3>
                    <p class="text-lg text-gray-600 leading-relaxed mb-6">
                        CoreTI menyediakan hardware berkualitas untuk kebutuhan teknologi Anda. Temukan prosesor, GPU, dan komponen komputer terbaik di sini. Upgrade teknologi Anda bersama CoreTI!
                    </p>
                    <a href="{{ route('about') }}"
                        class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold px-8 py-4 rounded-lg transition-all duration-300 uppercase">
                        Read More
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 px-4 bg-white border-t-4 border-gray-200">
        <div class="max-w-3xl mx-auto text-center">
            <h3 class="text-4xl font-bold text-gray-800 mb-6 uppercase">Have Any Questions?</h3>
            <p class="text-lg text-gray-600 leading-relaxed mb-8">
                Kami di sini untuk membantu! Jelajahi dunia teknologi tanpa batas dengan CoreTI. Hubungi kami kapan saja, dan biarkan tim ahli kami membantu Anda menemukan solusi yang Anda butuhkan. 🚀✨
            </p>
            <a href="{{ route('contact') }}"
                class="inline-block bg-white border-2 border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white font-semibold px-8 py-4 rounded-lg transition-all duration-300 uppercase">
                Contact Us
            </a>
        </div>
    </section>
@endsection