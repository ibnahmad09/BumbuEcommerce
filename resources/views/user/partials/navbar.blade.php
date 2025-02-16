<nav class="bg-white shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <a href="/" class="text-2xl font-bold text-green-600">BumbuMasak</a>
            </div>

            <!-- Hamburger Menu for Mobile -->
            <div class="flex items-center lg:hidden">
                <button id="mobile-menu-button" class="p-2 text-gray-600 hover:text-green-600 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex items-center space-x-6">
                <a href="{{ route('user.products.index') }}" class="text-gray-600 hover:text-green-600">Produk</a>
                <a href="{{ route('cart.index') }}" class="text-gray-600 hover:text-green-600">Keranjang</a>
                <a href="{{ route('orders.index') }}" class="text-gray-600 hover:text-green-600">Pesanan</a>
                <a href="{{ route('about') }}" class="text-gray-600 hover:text-green-600">Tentang Kami</a>
                <a href="{{route('reviews.index')}} " class="text-gray-600 hover:text-green-600">Kontak</a>
                <div class="flex items-center">
                    @auth
                        <a href="{{ route('profile.index') }}" class="text-gray-800 hover:text-green-600 px-3 py-2">Profil</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-gray-800 hover:text-green-600 px-3 py-2">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-800 hover:text-green-600 px-3 py-2">Login</a>
                        <a href="{{ route('register') }}" class="text-gray-800 hover:text-green-600 px-3 py-2">Register</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="lg:hidden hidden">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="{{ route('user.products.index') }}" class="block text-gray-600 hover:text-green-600 px-3 py-2">Produk</a>
            <a href="{{ route('cart.index') }}" class="block text-gray-600 hover:text-green-600 px-3 py-2">Keranjang</a>
            <a href="{{ route('orders.index') }}" class="block text-gray-600 hover:text-green-600 px-3 py-2">Pesanan</a>
            <a href="{{ route('about') }}" class="text-gray-600 hover:text-green-600">Tentang Kami</a>
            <a href=" {{route('reviews.index')}} " class="block text-gray-600 hover:text-green-600 px-3 py-2">Kontak</a>
            <div class="pt-4 border-t border-gray-200">
                @auth
                    <a href="{{ route('profile.index') }}" class="block text-gray-800 hover:text-green-600 px-3 py-2">Profil</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-left text-gray-800 hover:text-green-600 px-3 py-2">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="block text-gray-800 hover:text-green-600 px-3 py-2">Login</a>
                    <a href="{{ route('register') }}" class="block text-gray-800 hover:text-green-600 px-3 py-2">Register</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
<script>
    // Toggle mobile menu
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });

    // Close mobile menu when clicking outside
    document.addEventListener('click', (event) => {
        if (!mobileMenu.contains(event.target) && !mobileMenuButton.contains(event.target)) {
            mobileMenu.classList.add('hidden');
        }
    });
</script>
