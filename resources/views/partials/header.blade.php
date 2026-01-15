@php
    $isHome = request()->routeIs('home');
@endphp

<header id="main-header" class="{{ $isHome ? 'fixed top-0 left-0 right-0 z-50 transition-all duration-300 bg-transparent' : 'sticky top-0 left-0 right-0 z-50 bg-white shadow-md' }}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between py-4 relative">
            <a href="{{ route('home') }}" id="logo" class="text-3xl font-bold {{ $isHome ? 'text-white hover:text-gray-200' : 'text-blue-600 hover:text-blue-700' }} transition-colors">
                CoreTI
            </a>
            <nav class="hidden md:flex items-center gap-8" id="nav-links">
                <a href="{{ route('home') }}" class="{{ $isHome ? 'text-white hover:text-gray-200' : 'text-gray-600 hover:text-blue-600' }} transition-colors text-lg font-medium">Home</a>
                <a href="{{ route('about') }}" class="{{ $isHome ? 'text-white hover:text-gray-200' : 'text-gray-600 hover:text-blue-600' }} transition-colors text-lg font-medium">About</a>
                <a href="{{ route('shop') }}" class="{{ $isHome ? 'text-white hover:text-gray-200' : 'text-gray-600 hover:text-blue-600' }} transition-colors text-lg font-medium">Shop</a>
                <a href="{{ route('contact') }}" class="{{ $isHome ? 'text-white hover:text-gray-200' : 'text-gray-600 hover:text-blue-600' }} transition-colors text-lg font-medium">Contact</a>
                <a href="{{ route('cart') }}" class="{{ $isHome ? 'text-white hover:text-gray-200' : 'text-gray-600 hover:text-blue-600' }} transition-colors text-lg font-medium">Orders</a>
            </nav>
            <div class="flex items-center gap-4" id="header-icons">
                <button id="menu-btn" class="md:hidden text-2xl {{ $isHome ? 'text-white hover:text-gray-200' : 'text-gray-700 hover:text-blue-600' }} transition-colors">
                    <i class="fas fa-bars"></i>
                </button>
                <button id="user-btn" class="text-2xl {{ $isHome ? 'text-white hover:text-gray-200' : 'text-gray-700 hover:text-blue-600' }} transition-colors cursor-pointer">
                    <i class="fas fa-user"></i>
                </button>
                <a href="{{ route('cart') }}" class="relative text-2xl {{ $isHome ? 'text-white hover:text-gray-200' : 'text-gray-700 hover:text-blue-600' }} transition-colors">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs font-bold rounded-full w-5 h-5 flex items-center justify-center">
                        {{ \App\Models\Cart::where('user_id', auth()->id())->count() }}
                    </span>
                </a>
            </div>
            <div id="user-box" class="hidden absolute top-full right-4 mt-4 bg-white rounded-lg shadow-2xl border border-gray-200 p-6 w-80 animate-slide-in">
                @auth
                    <p class="text-lg text-gray-600 mb-2">Username: <span class="text-blue-600 font-semibold">{{ auth()->user()->name }}</span></p>
                    <p class="text-lg text-gray-600 mb-4">Email: <span class="text-blue-600 font-semibold">{{ auth()->user()->email }}</span></p>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white font-semibold py-3 rounded-lg transition-all duration-300 hover:shadow-lg">
                            Logout
                        </button>
                    </form>
                @else
                    <p class="text-center text-gray-600 mb-4">Silakan login terlebih dahulu</p>
                    <a href="{{ route('login') }}" class="block w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg text-center mb-2 transition-all duration-300 hover:shadow-lg">
                        Login
                    </a>
                    <a href="{{ route('register') }}"
                        class="block w-full bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 rounded-lg text-center transition-all duration-300 hover:shadow-lg">
                        Register
                    </a>
                @endauth
            </div>
        </div>
        <nav id="mobile-nav" class="hidden md:hidden pb-4 border-t border-gray-200 mt-4 pt-4 space-y-2">
            <a href="{{ route('home') }}" class="block text-gray-600 hover:text-blue-600 hover:bg-gray-50 px-4 py-2 rounded transition-colors text-lg font-medium">Home</a>
            <a href="{{ route('about') }}" class="block text-gray-600 hover:text-blue-600 hover:bg-gray-50 px-4 py-2 rounded transition-colors text-lg font-medium">About</a>
            <a href="{{ route('shop') }}" class="block text-gray-600 hover:text-blue-600 hover:bg-gray-50 px-4 py-2 rounded transition-colors text-lg font-medium">Shop</a>
            <a href="{{ route('contact') }}" class="block text-gray-600 hover:text-blue-600 hover:bg-gray-50 px-4 py-2 rounded transition-colors text-lg font-medium">Contact</a>
            <a href="{{ route('orders') }}" class="block text-gray-600 hover:text-blue-600 hover:bg-gray-50 px-4 py-2 rounded transition-colors text-lg font-medium">Orders</a>
        </nav>
    </div>
</header>

<script>
    document.getElementById('menu-btn').addEventListener('click', function () {
        document.getElementById('mobile-nav').classList.toggle('hidden');
    });
    document.getElementById('user-btn').addEventListener('click', function () {
        document.getElementById('user-box').classList.toggle('hidden');
    });
    document.addEventListener('click', function (event) {
        const userBtn = document.getElementById('user-btn');
        const userBox = document.getElementById('user-box');
        if (!userBtn.contains(event.target) && !userBox.contains(event.target)) {
            userBox.classList.add('hidden');
        }
    });
    const isHomePage = "{{ $isHome }}" === "1";

    if (isHomePage) {
        window.addEventListener('scroll', function () {
            const header = document.getElementById('main-header');
            const logo = document.getElementById('logo');
            const navLinks = document.getElementById('nav-links');
            const headerIcons = document.getElementById('header-icons');

            if (window.scrollY > 100) {

                header.classList.remove('bg-transparent');
                header.classList.add('bg-white', 'shadow-md');

                logo.classList.remove('text-white', 'hover:text-gray-200');
                logo.classList.add('text-blue-600', 'hover:text-blue-700');

                if (navLinks) {
                    navLinks.querySelectorAll('a').forEach(link => {
                        link.classList.remove('text-white', 'hover:text-gray-200');
                        link.classList.add('text-gray-600', 'hover:text-blue-600');
                    });
                }
                headerIcons.querySelectorAll('button, a').forEach(icon => {
                    icon.classList.remove('text-white', 'hover:text-gray-200');
                    icon.classList.add('text-gray-700', 'hover:text-blue-600');
                });
            } else {
                header.classList.add('bg-transparent');
                header.classList.remove('bg-white', 'shadow-md');

                logo.classList.add('text-white', 'hover:text-gray-200');
                logo.classList.remove('text-blue-600', 'hover:text-blue-700');

                if (navLinks) {
                    navLinks.querySelectorAll('a').forEach(link => {
                        link.classList.add('text-white', 'hover:text-gray-200');
                        link.classList.remove('text-gray-600', 'hover:text-blue-600');
                    });
                }

                headerIcons.querySelectorAll('button, a').forEach(icon => {
                    icon.classList.add('text-white', 'hover:text-gray-200');
                    icon.classList.remove('text-gray-700', 'hover:text-blue-600');
                });
            }
        });
    }
</script>