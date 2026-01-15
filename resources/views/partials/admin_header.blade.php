<header class="sticky top-0 left-0 right-0 z-40 bg-white border-b border-gray-100 shadow-sm">
    <div class="flex items-center justify-between px-6 py-4 max-w-7xl mx-auto relative">
        <a href="{{ route('admin.home') }}" class="text-2xl font-bold text-gray-800 flex items-center gap-2">
            <span class="text-blue-600">Admin</span>Panel
        </a>

        <nav id="navbar-menu" class="hidden md:flex items-center gap-8">
            <a href="{{ route('admin.home') }}" class="text-gray-600 font-medium hover:text-blue-600 transition-colors">home</a>
            <a href="{{ route('admin.products') }}" class="text-gray-600 font-medium hover:text-blue-600 transition-colors">products</a>
            <a href="{{ route('admin.orders') }}" class="text-gray-600 font-medium hover:text-blue-600 transition-colors">orders</a>
            <a href="{{ route('admin.users') }}" class="text-gray-600 font-medium hover:text-blue-600 transition-colors">users</a>
            <a href="{{ route('admin.messages') }}" class="text-gray-600 font-medium hover:text-blue-600 transition-colors">messages</a>
        </nav>

        <div class="flex items-center gap-4">
            <div id="menu-btn" class="md:hidden cursor-pointer text-gray-600 hover:text-blue-600 transition-colors">
                <i class="fas fa-bars text-xl"></i>
            </div>
            <div id="user-btn" class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center cursor-pointer hover:bg-blue-50 transition-colors text-gray-600 hover:text-blue-600">
                <i class="fas fa-user text-lg"></i>
            </div>
        </div>

        <div id="account-box" class="absolute top-full right-6 w-80 bg-white rounded-xl shadow-2xl border border-gray-100 p-6 text-center transform origin-top-right scale-0 transition-transform duration-200 ease-out z-50 hidden">
            <p class="text-lg text-gray-500 mb-2">username : <span class="text-blue-600 font-semibold">{{ auth()->user()->name }}</span></p>
            <p class="text-lg text-gray-500 mb-6">email : <span class="text-blue-600 font-semibold">{{ auth()->user()->email }}</span></p>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white font-semibold py-3 rounded-lg transition-colors uppercase text-sm tracking-wider">
                    logout
                </button>
            </form>
        </div>
    </div>
</header>