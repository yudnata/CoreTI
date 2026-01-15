<footer class="bg-gray-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div>
                <h3 class="text-xl font-bold mb-4 uppercase">Quick Links</h3>
                <div class="space-y-2">
                    <a href="{{ route('home') }}" class="block text-gray-300 hover:text-white transition-colors capitalize">Home</a>
                    <a href="{{ route('about') }}" class="block text-gray-300 hover:text-white transition-colors capitalize">About</a>
                    <a href="{{ route('shop') }}" class="block text-gray-300 hover:text-white transition-colors capitalize">Shop</a>
                    <a href="{{ route('contact') }}" class="block text-gray-300 hover:text-white transition-colors capitalize">Contact</a>
                </div>
            </div>
            <div>
                <h3 class="text-xl font-bold mb-4 uppercase">Extra Links</h3>
                <div class="space-y-2">
                    <a href="{{ route('login') }}" class="block text-gray-300 hover:text-white transition-colors capitalize">Login</a>
                    <a href="{{ route('register') }}" class="block text-gray-300 hover:text-white transition-colors capitalize">Register</a>
                    <a href="{{ route('cart') }}" class="block text-gray-300 hover:text-white transition-colors capitalize">Cart</a>
                    <a href="{{ route('orders') }}" class="block text-gray-300 hover:text-white transition-colors capitalize">Orders</a>
                </div>
            </div>
            <div>
                <h3 class="text-xl font-bold mb-4 uppercase">Contact Info</h3>
                <div class="space-y-2">
                    <p class="text-gray-300"><i class="fas fa-phone text-blue-500 mr-2"></i> +123-456-7890</p>
                    <p class="text-gray-300"><i class="fas fa-phone text-blue-500 mr-2"></i> +111-222-3333</p>
                    <p class="text-gray-300"><i class="fas fa-envelope text-blue-500 mr-2"></i> info@coretis.com</p>
                    <p class="text-gray-300"><i class="fas fa-map-marker-alt text-blue-500 mr-2"></i> Bali, Indonesia - 80227</p>
                </div>
            </div>
            <div>
                <h3 class="text-xl font-bold mb-4 uppercase">Follow Us</h3>
                <div class="space-y-2">
                    <a href="#" class="block text-gray-300 hover:text-blue-500 transition-colors">
                        <i class="fab fa-facebook-f mr-2"></i> Facebook
                    </a>
                    <a href="#" class="block text-gray-300 hover:text-blue-400 transition-colors">
                        <i class="fab fa-twitter mr-2"></i> Twitter
                    </a>
                    <a href="#" class="block text-gray-300 hover:text-pink-500 transition-colors">
                        <i class="fab fa-instagram mr-2"></i> Instagram
                    </a>
                    <a href="#" class="block text-gray-300 hover:text-blue-600 transition-colors">
                        <i class="fab fa-linkedin mr-2"></i> LinkedIn
                    </a>
                </div>
            </div>
        </div>
        <div class="border-t border-gray-700 mt-8 pt-8 text-center">
            <p class="text-gray-400">
                &copy; Copyright @ {{ date('Y') }} by <span class="text-white font-semibold">Nata & Gusde</span>
            </p>
        </div>
    </div>
</footer>