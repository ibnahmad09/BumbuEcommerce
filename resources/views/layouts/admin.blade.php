<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Bumbu Masak</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="//unpkg.com/alpinejs" defer></script>
    <style>
    .glass-effect {
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .hover-scale {
        transition: transform 0.3s ease;
    }

    .hover-scale:hover {
        transform: scale(1.02);
    }

    .shadow-soft {
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }

    .animate-fade-in {
        animation: fadeIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .gradient-bg {
        background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
    }

    .hover-glow {
        transition: box-shadow 0.3s ease;
    }

    .hover-glow:hover {
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }

    .smooth-transition {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .animate-float {
        animation: float 3s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-10px);
        }
    }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex min-h-screen bg-gradient-to-br from-gray-50 to-gray-100">
        <div class="lg:hidden fixed top-0 left-0 p-4 z-50">
            <button id="mobile-menu-button" class="p-2 text-gray-500 hover:text-gray-700 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>

        <!-- Overlay for mobile -->
        <div id="sidebar-overlay" class="lg:hidden fixed inset-0 bg-black/50 z-40 transition-opacity duration-300 opacity-0 pointer-events-none"></div>

        <!-- Sidebar -->
        <div id="sidebar" class="bg-white/20 backdrop-blur-lg w-72 min-h-screen shadow-xl border-r border-white/10 transform transition-all duration-300 lg:translate-x-0 -translate-x-full fixed lg:relative z-50">
            <div class="p-6">
                <div class="flex items-center space-x-3">
                    <img src="/images/logo.png" alt="Bumbu Masak Logo" class="w-10 h-10 rounded-lg shadow-sm">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">Bumbu Masak</h1>
                        <p class="text-sm text-gray-600">Admin Panel</p>
                    </div>
                </div>
            </div>
            <nav class="mt-6">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-6 py-3 text-gray-600 hover:bg-white/30 hover:text-gray-900 transition-all duration-300 group">
                    <div class="w-1 h-8 bg-transparent rounded-r-lg group-hover:bg-green-500 transition-all duration-300"></div>
                    <svg class="w-5 h-5 mr-3 text-gray-500 group-hover:text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    Dashboard
                </a>
                <a href="{{ route('products.index') }}" class="flex items-center px-6 py-3 text-gray-600 hover:bg-white/30 hover:text-gray-900 transition-all duration-300">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                    </svg>
                    Produk
                </a>
                <a href="{{ route('categories.index') }}" class="flex items-center px-6 py-3 text-gray-600 hover:bg-white/30 hover:text-gray-900 transition-all duration-300">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                    </svg>
                    Kategori
                </a>
                <a href="{{ route('order.index') }}" class="flex items-center px-6 py-3 text-gray-600 hover:bg-white/30 hover:text-gray-900 transition-all duration-300">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 15h.01M13 15h.01M17 15h.01M9 19h.01M13 19h.01M17 19h.01"></path>
                    </svg>
                    Pesanan
                </a>
                <a href="{{ route('admin.users') }}" class="flex items-center px-6 py-3 text-gray-600 hover:bg-white/30 hover:text-gray-900 transition-all duration-300">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    Pengguna
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1">
            <!-- Navbar -->
            <nav class="bg-white/30 backdrop-blur-lg shadow-sm sticky top-0 z-50">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16 items-center">
                        <!-- Hamburger Menu for Mobile -->
                        <button class="lg:hidden p-2 text-gray-500 hover:text-gray-700 focus:outline-none" id="mobile-menu-button">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                        
                        <h2 class="text-lg font-semibold text-gray-800">@yield('title')</h2>
                        
                        <div class="flex items-center space-x-6">
                            <!-- User Dropdown -->
                            <div class="relative" x-data="{ open: false }">
                                <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none hover:bg-white/20 px-3 py-1.5 rounded-lg transition-all duration-300">
                                    <img class="w-8 h-8 rounded-full shadow-sm" src="/images/user.png" alt="User">
                                    <span class="text-gray-700">Admin</span>
                                    <svg class="w-4 h-4 text-gray-500 transform transition-transform duration-300" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <!-- Dropdown Menu -->
                                <div x-show="open" @click.away="open = false" 
                                     class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 transition-all duration-300"
                                     x-transition:enter="transition ease-out duration-100"
                                     x-transition:enter-start="transform opacity-0 scale-95"
                                     x-transition:enter-end="transform opacity-100 scale-100"
                                     x-transition:leave="transition ease-in duration-75"
                                     x-transition:leave-start="transform opacity-100 scale-100"
                                     x-transition:leave-end="transform opacity-0 scale-95">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 w-full text-left">Logout</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            

            <!-- Content -->
            <main class="p-6">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebar-overlay');
        
        sidebar.classList.toggle('-translate-x-full');
        overlay.classList.toggle('opacity-0');
        overlay.classList.toggle('pointer-events-none');
    }

    function closeSidebar() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebar-overlay');
        
        sidebar.classList.add('-translate-x-full');
        overlay.classList.add('opacity-0');
        overlay.classList.add('pointer-events-none');
    }

    // Sidebar toggle with overlay
    document.getElementById('mobile-menu-button').addEventListener('click', toggleSidebar);

    // Close sidebar and overlay when clicking outside
    document.addEventListener('click', function(event) {
        const sidebar = document.getElementById('sidebar');
        const mobileButton = document.getElementById('mobile-menu-button');
        const overlay = document.getElementById('sidebar-overlay');
        
        if (!sidebar.contains(event.target) && !mobileButton.contains(event.target)) {
            if (window.innerWidth < 1024) {
                closeSidebar();
            }
        }
    });
    </script>
</body>
</html> 