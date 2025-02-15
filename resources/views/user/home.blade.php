@extends('layouts.user')

@section('content')
<!-- Hero Section -->
<section class="relative h-screen overflow-hidden">
    <div class="absolute inset-0 bg-black/30 z-10"></div>
    <video autoplay muted loop class="absolute inset-0 w-full h-full object-cover">
        <source src="/videos/spices.mp4" type="video/mp4">
    </video>
    <div class="absolute inset-0 z-20 flex flex-col justify-center items-center text-white">
        <h1 class="text-5xl md:text-7xl font-bold mb-6 text-center animate-fade-in-down">
            <span class="bg-clip-text text-transparent bg-gradient-to-r from-yellow-400 to-orange-500">
                Bumbu Dapur, Rasa Restoran
            </span>
        </h1>
        <p class="text-xl md:text-2xl mb-8 text-center max-w-2xl animate-fade-in-up">
            Temukan bumbu masak berkualitas tinggi untuk kreasi masakan Anda
        </p>
        <a href="#products" class="bg-gradient-to-r from-yellow-400 to-orange-500 text-white px-8 py-3 rounded-full hover:bg-orange-600 text-lg transform transition-all duration-300 hover:scale-105 animate-bounce">
            Belanja Sekarang
        </a>
    </div>
</section>

<!-- Promo Products Section -->
<section class="bg-gradient-to-r from-green-50 to-green-100 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Produk Promo</h2>
            <a href="#" class="text-green-600 hover:text-green-700 font-semibold">Lihat Semua</a>
        </div>
    </div>
</section>

<!-- All Products Section -->
<section id="products" class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-gray-800 mb-8">Produk Kami</h2>
        
    </div>
</section>

@push('scripts')
<!-- Swiper JS -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script>
    // Initialize Swiper
    const swiper = new Swiper('.swiper-container', {
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });
</script>
@endpush
@endsection