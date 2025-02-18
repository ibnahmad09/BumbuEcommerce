@extends('layouts.user')

@section('content')
<!-- Hero Section with Swiper -->
<section class="relative h-[500px] md:h-[600px] overflow-hidden">
    <div class="swiper-container h-full">
        <div class="swiper-wrapper">
            <!-- Slide 1 with Parallax -->
            <div class="swiper-slide relative">
                <div class="swiper-parallax bg-black/40 absolute inset-0 z-10"></div>
                <div class="swiper-parallax-bg" data-swiper-parallax="-30%">
                    <img src="{{ asset('storage/images/banner1.jpg') }}" alt="Banner 1"
                         class="w-full h-full object-cover transform scale-125 transition-transform duration-1000">
                </div>
                <div class="absolute inset-0 z-20 flex flex-col justify-center items-center text-white px-4">
                    <div class="swiper-parallax" data-swiper-parallax="-500">
                        <h1 class="text-4xl md:text-6xl font-bold mb-6 text-center animate-fade-in-up">
                            Bumbu Dapur, Rasa Restoran
                        </h1>
                    </div>
                    <div class="swiper-parallax" data-swiper-parallax="-300">
                        <p class="text-lg md:text-xl mb-8 text-center max-w-2xl">
                            Temukan bumbu masak berkualitas tinggi untuk kreasi masakan Anda
                        </p>
                    </div>
                    <div class="swiper-parallax" data-swiper-parallax="-200">
                        <a href="#products" class="btn-primary">
                            Belanja Sekarang
                        </a>
                    </div>
                </div>
            </div>

            <!-- Slide 2 with Zoom Effect -->
            <div class="swiper-slide relative">
                <div class="absolute inset-0 bg-black/30 z-10"></div>
                <div class="swiper-zoom-container">
                    <img src="{{ asset('storage/images/banner2.png') }}" alt="Banner 2"
                         class="w-full h-full object-cover transform scale-150 transition-transform duration-1000">
                </div>
                <div class="absolute inset-0 z-20 flex flex-col justify-center items-center text-white px-4">
                    <h1 class="text-4xl md:text-6xl font-bold mb-6 text-center animate-fade-in-up">
                        Bumbu Segar, Rasa Autentik
                    </h1>
                    <p class="text-lg md:text-xl mb-8 text-center max-w-2xl">
                        Nikmati cita rasa asli Indonesia dengan bumbu pilihan kami
                    </p>
                    <a href="#products" class="btn-secondary">
                        Jelajahi Produk
                    </a>
                </div>
            </div>
        </div>

        <!-- Custom Pagination -->
        <div class="swiper-pagination !bottom-4 swiper-pagination-bullets"></div>

        <!-- Navigation with Custom Icons -->
        <div class="swiper-button-next custom-nav">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </div>
        <div class="swiper-button-prev custom-nav">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </div>
    </div>
</section>

<!-- Best Selling Products -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-gray-800 mb-8">Produk Terlaris</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @foreach($bestSellingProducts as $product)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                <div class="relative">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                    @if($product->stock <= 0)
                        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                            <span class="text-white font-bold">Stok Habis</span>
                        </div>
                    @endif
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $product->name }}</h3>
                    <p class="text-green-600 font-bold mb-4">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    <a href="{{ route('user.products.show', $product->id) }}" class="block w-full bg-green-600 text-white text-center px-4 py-2 rounded-lg hover:bg-green-700">
                        Lihat Detail
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- New Arrivals -->
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-gray-800 mb-8">Produk Terbaru</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @foreach($newProducts as $product)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                <div class="relative">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                    @if($product->stock <= 0)
                        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                            <span class="text-white font-bold">Stok Habis</span>
                        </div>
                    @endif
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $product->name }}</h3>
                    <p class="text-green-600 font-bold mb-4">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    <a href="{{ route('user.products.show', $product->id) }}" class="block w-full bg-green-600 text-white text-center px-4 py-2 rounded-lg hover:bg-green-700">
                        Lihat Detail
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@push('scripts')
<script>
    // Initialize Swiper with more features
    const swiper = new Swiper('.swiper-container', {
        loop: true,
        speed: 1000,
        parallax: true,
        effect: 'creative',
        creativeEffect: {
            prev: {
                shadow: true,
                translate: ['-120%', 0, -500],
            },
            next: {
                shadow: true,
                translate: ['120%', 0, -500],
            },
        },
        autoplay: {
            delay: 8000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
            renderBullet: function (index, className) {
                return `<span class="${className} !w-3 !h-3 !bg-white/50 !opacity-100 hover:!bg-white !transition-all"></span>`;
            },
        },
        keyboard: {
            enabled: true,
        },
        on: {
            init: function () {
                // Add parallax scrolling effect
                this.params.parallax = true;
                this.parallax.init();
            },
        },
    });

    // Add hover pause for autoplay
    swiper.el.addEventListener('mouseenter', () => swiper.autoplay.stop());
    swiper.el.addEventListener('mouseleave', () => swiper.autoplay.start());
</script>
@endpush

@endsection
