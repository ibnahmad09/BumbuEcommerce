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
        
    </style>
</head>
<body class="bg-gray-50">
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="/" class="text-2xl font-bold text-green-600">BumbuMasak</a>
                </div>
                <div class="flex items-center space-x-6">
                    <a href="{{ route('user.products.index') }}" class="text-gray-600 hover:text-green-600">Produk</a>
                    <a href="{{ route('cart.index') }}" class="text-gray-600 hover:text-green-600">Keranjang</a>
                    <a href="{{ route('orders.index') }}" class="text-gray-600 hover:text-green-600">Pesanan</a>
                    <a href="#" class="text-gray-600 hover:text-green-600">Tentang Kami</a>
                    <a href="#" class="text-gray-600 hover:text-green-600">Kontak</a>
                    <button id="chatbot-toggle" class="p-2 rounded-full bg-green-100 hover:bg-green-200">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                    </button>
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
    </nav>
    
    <main>
        @yield('content')
    </main>

    @include('user.partials.chatbot')
    
    <script>
        // Chatbot Toggle
        const chatbotToggle = document.getElementById('chatbot-toggle');
        const chatbotContainer = document.getElementById('chatbot-container');
        const chatbotClose = document.getElementById('chatbot-close');

        chatbotToggle.addEventListener('click', () => {
            chatbotContainer.classList.toggle('hidden');
        });

        chatbotClose.addEventListener('click', () => {
            chatbotContainer.classList.add('hidden');
        });
    </script>

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
@stack('script')
</body>
</html> 