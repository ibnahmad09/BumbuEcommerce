<footer class="bg-gradient-to-b from-green-50 to-white border-t border-gray-200 mt-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Brand Section -->
            <div class="text-center md:text-left">
                <h3 class="text-2xl font-bold text-green-600 mb-4">BumbuMasak</h3>
                <p class="text-gray-600 leading-relaxed">Solusi bumbu dapur berkualitas untuk masakan rumahan yang lezat.</p>
                <div class="mt-4 flex justify-center md:justify-start space-x-4">
                    <a href="#" class="text-gray-400 hover:text-green-600 transition-colors">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.56v14.91c0 .98-.81 1.78-1.8 1.78h-20.4c-.99 0-1.8-.8-1.8-1.78v-14.91c0-.98.81-1.78 1.8-1.78h20.4c.99 0 1.8.8 1.8 1.78zm-11.4 8.38l-5.4-3.24v6.48l5.4-3.24zm6.6-3.24l-5.4 3.24 5.4 3.24v-6.48zm-18-3.24v12.72h20.4v-12.72h-20.4z"/></svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-green-600 transition-colors">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.16c-5.39 0-9.77 4.38-9.77 9.77 0 4.32 2.81 7.99 6.7 9.29v-6.57h-2.02v-2.72h2.02v-2.07c0-2.01 1.23-3.11 3.02-3.11.88 0 1.8.16 1.8.16v1.98h-1.01c-1 0-1.31.62-1.31 1.26v1.51h2.22l-.36 2.72h-1.86v6.57c3.89-1.3 6.7-4.97 6.7-9.29 0-5.39-4.38-9.77-9.77-9.77z"/></svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-green-600 transition-colors">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M23.95 4.57c-.88.39-1.83.65-2.82.77 1.01-.61 1.79-1.57 2.16-2.72-.95.56-2 .97-3.12 1.19-.9-.96-2.18-1.56-3.6-1.56-2.72 0-4.92 2.2-4.92 4.92 0 .39.04.77.12 1.13-4.09-.21-7.71-2.16-10.14-5.14-.42.72-.66 1.56-.66 2.46 0 1.7.87 3.21 2.19 4.09-.81-.03-1.57-.25-2.23-.62v.06c0 2.39 1.7 4.38 3.95 4.83-.41.11-.85.17-1.3.17-.32 0-.63-.03-.94-.08.63 1.96 2.45 3.39 4.61 3.43-1.69 1.32-3.82 2.11-6.13 2.11-.4 0-.79-.02-1.18-.07 2.19 1.4 4.78 2.22 7.57 2.22 9.08 0 14.05-7.52 14.05-14.05 0-.21 0-.42-.01-.63 1.01-.73 1.88-1.64 2.57-2.67z"/></svg>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="text-center md:text-left">
                <h4 class="text-xl font-semibold text-gray-800 mb-4">Tautan Cepat</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('user.products.index') }}" class="text-gray-600 hover:text-green-600 transition-colors">Produk</a></li>
                    <li><a href="{{ route('cart.index') }}" class="text-gray-600 hover:text-green-600 transition-colors">Keranjang</a></li>
                    <li><a href="{{ route('orders.index') }}" class="text-gray-600 hover:text-green-600 transition-colors">Pesanan</a></li>
                    <li><a href="{{ route('about') }}" class="text-gray-600 hover:text-green-600 transition-colors">Tentang Kami</a></li>
                </ul>
            </div>

            <!-- Support -->
            <div class="text-center md:text-left">
                <h4 class="text-xl font-semibold text-gray-800 mb-4">Dukungan</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-600 hover:text-green-600 transition-colors">FAQ</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-green-600 transition-colors">Kebijakan Privasi</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-green-600 transition-colors">Syarat & Ketentuan</a></li>
                    <li><a href="{{ route('reviews.index') }}" class="text-gray-600 hover:text-green-600 transition-colors">Ulasan</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div class="text-center md:text-left">
                <h4 class="text-xl font-semibold text-gray-800 mb-4">Kontak</h4>
                <ul class="space-y-2">
                    <li class="flex items-center justify-center md:justify-start space-x-2 text-gray-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linecap="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <span>info@bumbumasak.com</span>
                    </li>
                    <li class="flex items-center justify-center md:justify-start space-x-2 text-gray-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linecap="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.949.684V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/
                    </li>
                    <li class="flex items-center justify-center md:justify-start space-x-2 text-gray-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <span>Jl. Bumbu Masak No. 123, Jakarta</span>
                    </li>
                </ul>
            </div>
                </div>
                <div class="border-t border-gray-200 mt-8 pt-8 text-center">
                    <p class="text-gray-600">&copy; 2023 BumbuMasak. All rights reserved.</p>
                </div>
            </div>
        </footer>


