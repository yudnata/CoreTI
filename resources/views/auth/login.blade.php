@extends('layouts.auth')

@section('title', 'Login - CoreTI')

@section('content')
    <div class="max-w-md mx-auto">
        <form action="{{ route('login') }}" method="post" class="bg-white/95 backdrop-blur-xl rounded-3xl shadow-sm p-10 border border-white/20 animate-slide-up">
            @csrf

            <div class="text-center mb-8">
                <h3 class="text-4xl font-bold text-gray-800 mb-2">Welcome Back</h3>
                <p class="text-gray-500">Login to your account</p>
            </div>

            <div class="relative mb-6">
                <div class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                    <i class="fas fa-envelope text-lg"></i>
                </div>
                <input type="email" name="email" placeholder="Email address" required
                    class="w-full pl-12 pr-4 py-4 rounded-xl border-2 border-gray-200 bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all outline-none text-gray-700">
            </div>

            <div class="relative mb-6">
                <div class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                    <i class="fas fa-lock text-lg"></i>
                </div>
                <input type="password" name="password" placeholder="Password" required
                    class="w-full pl-12 pr-4 py-4 rounded-xl border-2 border-gray-200 bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all outline-none text-gray-700">
            </div>

            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-4 rounded-xl transition-all duration-300 active:scale-95">
                Login Now
            </button>

            <p class="text-center mt-6 text-gray-600">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-blue-600 font-semibold hover:text-blue-700 transition-colors">
                    Create one
                </a>
            </p>

            @if ($errors->any())
                <div class="mt-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl">
                    <span class="block">{{ $errors->first() }}</span>
                </div>
            @endif
        </form>
    </div>
@endsection