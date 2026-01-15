@extends('layouts.app')

@section('title', 'About Us - CoreTI')

@section('content')
    <section class="py-16 px-4 min-h-screen flex items-center">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row items-center gap-12 mb-16">
                <div class="flex-1">
                    <img src="{{ asset('assets/images/about-img.jpg') }}" alt="About CoreTI" class="rounded-2xl shadow-sm w-full">
                </div>
                <div class="flex-1">
                    <h3 class="text-4xl font-bold text-gray-800 mb-6 uppercase">Why Choose Us?</h3>
                    <p class="text-lg text-gray-600 leading-relaxed mb-6">
                        CoreTI adalah toko hardware komputer terpercaya di Bali yang menyediakan berbagai komponen berkualitas tinggi untuk kebutuhan teknologi Anda. Kami berkomitmen untuk memberikan
                        produk terbaik dengan harga yang kompetitif.
                        Dengan pengalaman bertahun-tahun di industri teknologi, kami memahami kebutuhan pelanggan kami. Tim ahli kami siap membantu Anda memilih komponen yang tepat untuk build PC impian
                        Anda.
                        Dari prosesor mutakhir, kartu grafis high-end, motherboard gaming, hingga aksesori pendukung lainnya - CoreTI adalah solusi one-stop untuk semua kebutuhan hardware Anda.
                    </p>
                    <a href="{{ route('contact') }}"
                        class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold px-8 py-4 rounded-lg transition-all duration-300 uppercase">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="py-16 px-4 bg-gray-50">
        <div class="max-w-7xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-bold text-center text-gray-800 mb-12 uppercase">Client's Reviews</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg shadow-sm p-8 text-center hover:shadow transition-all duration-300">
                    <img src="{{ asset('assets/images/pic-1.png') }}" alt="Client" class="w-32 h-32 rounded-full mx-auto mb-6 border-4 border-blue-100">
                    <p class="text-gray-600 leading-relaxed mb-6">
                        Pelayanan sangat memuaskan! Produk original dan harga terjangkau. Recommended banget untuk yang mau upgrade PC!
                    </p>
                    <div class="flex justify-center gap-1 mb-4">
                        <i class="fas fa-star text-orange-400 text-xl"></i>
                        <i class="fas fa-star text-orange-400 text-xl"></i>
                        <i class="fas fa-star text-orange-400 text-xl"></i>
                        <i class="fas fa-star text-orange-400 text-xl"></i>
                        <i class="fas fa-star-half-alt text-orange-400 text-xl"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-800">Putu Ardana</h3>
                </div>

                <div class="bg-white rounded-lg shadow-sm p-8 text-center hover:shadow transition-all duration-300">
                    <img src="{{ asset('assets/images/pic-2.png') }}" alt="Client" class="w-32 h-32 rounded-full mx-auto mb-6 border-4 border-blue-100">
                    <p class="text-gray-600 leading-relaxed mb-6">
                        CoreTI adalah tempat terbaik untuk beli komponen PC di Bali. Staff-nya ramah dan sangat membantu dalam memberikan rekomendasi.
                    </p>
                    <div class="flex justify-center gap-1 mb-4">
                        <i class="fas fa-star text-orange-400 text-xl"></i>
                        <i class="fas fa-star text-orange-400 text-xl"></i>
                        <i class="fas fa-star text-orange-400 text-xl"></i>
                        <i class="fas fa-star text-orange-400 text-xl"></i>
                        <i class="fas fa-star text-orange-400 text-xl"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-800">Made Suryawan</h3>
                </div>

                <div class="bg-white rounded-lg shadow-sm p-8 text-center hover:shadow transition-all duration-300">
                    <img src="{{ asset('assets/images/pic-3.png') }}" alt="Client" class="w-32 h-32 rounded-full mx-auto mb-6 border-4 border-blue-100">
                    <p class="text-gray-600 leading-relaxed mb-6">
                        Produknya lengkap dan berkualitas. Proses pembelian mudah, pengiriman cepat. Puas belanja di CoreTI!
                    </p>
                    <div class="flex justify-center gap-1 mb-4">
                        <i class="fas fa-star text-orange-400 text-xl"></i>
                        <i class="fas fa-star text-orange-400 text-xl"></i>
                        <i class="fas fa-star text-orange-400 text-xl"></i>
                        <i class="fas fa-star text-orange-400 text-xl"></i>
                        <i class="fas fa-star text-orange-400 text-xl"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-800">Komang Ayu</h3>
                </div>
            </div>
        </div>
    </section>
@endsection