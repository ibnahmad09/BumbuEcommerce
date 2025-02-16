<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BumbuMasak - Ecommerce Bumbu Dapur</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .notification-enter {
            transform: translateX(100%);
        }
        .notification-enter-active {
            transform: translateX(0);
            transition: transform 300ms ease-out;
        }
        .notification-exit {
            transform: translateX(0);
        }
        .notification-exit-active {
            transform: translateX(100%);
            transition: transform 300ms ease-in;
        }
        .quick-btn {
            @apply bg-green-100 text-green-800 px-3 py-1 rounded-lg text-sm hover:bg-green-200 transition-colors;
        }

        @media (max-width: 640px) {
            #chatbot-container {
                bottom: 1rem;
                right: 1rem;
            }
            #chat-window {
                width: 90vw;
                height: 60vh;
                max-height: 400px;
            }
        }

         .sticky {
        position: -webkit-sticky;
        position: sticky;
    }

    .animate-spin {
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    </style>
</head>
<body class="bg-gray-50">
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
                    <a href="#" class="text-gray-600 hover:text-green-600">Tentang Kami</a>
                    <a href="#" class="text-gray-600 hover:text-green-600">Kontak</a>
                    <div class="flex items-center">
                        @auth
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
                <a href="#" class="block text-gray-600 hover:text-green-600 px-3 py-2">Tentang Kami</a>
                <a href="#" class="block text-gray-600 hover:text-green-600 px-3 py-2">Kontak</a>
                <div class="pt-4 border-t border-gray-200">
                    @auth
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
    <main>
        @yield('content')
    </main>

    <footer class="bg-white border-t border-gray-200 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-lg font-semibold text-green-600 mb-4">BumbuMasak</h3>
                    <p class="text-gray-600">Solusi bumbu dapur berkualitas untuk masakan rumahan yang lezat.</p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-gray-800 mb-4">Tentang Kami</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-600 hover:text-green-600">Visi & Misi</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-green-600">Tim Kami</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-green-600">Karir</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-gray-800 mb-4">Bantuan</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-600 hover:text-green-600">FAQ</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-green-600">Kebijakan Privasi</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-green-600">Syarat & Ketentuan</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-gray-800 mb-4">Hubungi Kami</h4>
                    <ul class="space-y-2">
                        <li class="text-gray-600">Email: info@bumbumasak.com</li>
                        <li class="text-gray-600">Telepon: (021) 1234-5678</li>
                        <li class="text-gray-600">Alamat: Jl. Bumbu Masak No. 123, Jakarta</li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-200 mt-8 pt-8 text-center">
                <p class="text-gray-600">&copy; 2023 BumbuMasak. All rights reserved.</p>
            </div>
        </div>
    </footer>
    @include('user.partials.chatbot')
</body>
</html>
