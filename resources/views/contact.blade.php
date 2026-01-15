@extends('layouts.app')

@section('title', 'Contact Us - CoreTI')

@section('content')
<section class="py-16 px-4">
    <div class="max-w-2xl mx-auto">
        <form action="{{ route('contact') }}" method="post" class="bg-white rounded-2xl shadow-lg p-8 border border-gray-200">
            @csrf
            <h3 class="text-3xl font-bold text-center text-gray-800 mb-8 uppercase">Say Something!</h3>
            <div class="mb-6">
                <input type="text" name="name" required placeholder="Enter your name" maxlength="50" 
                       class="w-full px-4 py-4 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all outline-none text-lg">
            </div>

            <div class="mb-6">
                <input type="email" name="email" required placeholder="Enter your email" maxlength="50" 
                       class="w-full px-4 py-4 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all outline-none text-lg">
            </div>

            <div class="mb-6">
                <input type="number" name="number" required placeholder="Enter your number" min="0" max="9999999999" 
                       class="w-full px-4 py-4 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all outline-none text-lg">
            </div>

            <div class="mb-6">
                <textarea name="msg" required placeholder="Enter your message" rows="6" 
                          class="w-full px-4 py-4 border-2 border-gray-200 rounded-lg resize-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all outline-none text-lg"></textarea>
            </div>

            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-4 rounded-lg transition-all duration-300 hover:shadow-lg hover:-translate-y-1 uppercase text-lg">
                Send Message
            </button>
        </form>
    </div>
</section>

<section class="py-16 px-4 bg-gray-50">
    <div class="max-w-7xl mx-auto">
        <h1 class="text-4xl md:text-5xl font-bold text-center text-gray-800 mb-12 uppercase">Our Location</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="bg-white rounded-lg shadow-md p-8 text-center hover:shadow-xl transition-all duration-300">
                <i class="fas fa-map-marker-alt text-6xl text-blue-600 mb-6"></i>
                <h3 class="text-2xl font-semibold text-gray-800 mb-4">Address</h3>
                <p class="text-gray-600 leading-relaxed">Jl. Teknologi No. 123, Denpasar, Bali 80114</p>
            </div>

            <div class="bg-white rounded-lg shadow-md p-8 text-center hover:shadow-xl transition-all duration-300">
                <i class="fas fa-phone text-6xl text-blue-600 mb-6"></i>
                <h3 class="text-2xl font-semibold text-gray-800 mb-4">Phone</h3>
                <p class="text-gray-600 mb-2">+62 812-3456-7890</p>
                <p class="text-gray-600">+62 361-123456</p>
            </div>

            <div class="bg-white rounded-lg shadow-md p-8 text-center hover:shadow-xl transition-all duration-300">
                <i class="fas fa-envelope text-6xl text-blue-600 mb-6"></i>
                <h3 class="text-2xl font-semibold text-gray-800 mb-4">Email</h3>
                <p class="text-gray-600 mb-2">info@coretis.com</p>
                <p class="text-gray-600">support@coretis.com</p>
            </div>

            <div class="bg-white rounded-lg shadow-md p-8 text-center hover:shadow-xl transition-all duration-300">
                <i class="fas fa-clock text-6xl text-blue-600 mb-6"></i>
                <h3 class="text-2xl font-semibold text-gray-800 mb-4">Working Hours</h3>
                <p class="text-gray-600 mb-2">Monday - Saturday: 09:00 - 18:00</p>
                <p class="text-gray-600">Sunday: Closed</p>
            </div>
        </div>
    </div>
</section>
@endsection
