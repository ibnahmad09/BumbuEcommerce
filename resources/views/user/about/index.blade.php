@extends('layouts.user')

@section('content')
<!-- Hero Section -->
<section class="py-12 bg-gradient-to-r from-green-50 to-green-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Tentang BumbuMasak</h1>
            <p class="text-base md:text-lg text-gray-600 max-w-2xl mx-auto">
                Menyediakan bumbu dapur berkualitas tinggi untuk menciptakan masakan lezat ala restoran di rumah Anda.
            </p>
        </div>
    </div>
</section>

<!-- Visi & Misi Section -->
<section class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row gap-8 items-center">
            <div class="order-2 md:order-1 w-full md:w-1/2">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-6">Visi & Misi Kami</h2>
                <div class="space-y-4">
                    <div class="bg-white p-4 md:p-6 rounded-lg shadow-sm">
                        <h3 class="text-lg md:text-xl font-semibold text-green-600 mb-2">Visi</h3>
                        <p class="text-sm md:text-base text-gray-600">
                            Menjadi penyedia bumbu dapur terkemuka yang membawa cita rasa restoran ke dapur rumah tangga Indonesia.
                        </p>
                    </div>
                    <div class="bg-white p-4 md:p-6 rounded-lg shadow-sm">
                        <h3 class="text-lg md:text-xl font-semibold text-green-600 mb-2">Misi</h3>
                        <ul class="list-disc list-inside text-sm md:text-base text-gray-600 space-y-2">
                            <li>Menyediakan bumbu dapur berkualitas tinggi</li>
                            <li>Membantu masyarakat memasak dengan mudah dan praktis</li>
                            <li>Mengembangkan produk inovatif untuk kebutuhan masakan modern</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="order-1 md:order-2 w-full md:w-1/2">
                <img src="/images/about.jpg" alt="About Us" class="w-full h-auto rounded-lg shadow-sm">
            </div>
        </div>
    </div>
</section>

<!-- Tim Kami Section -->
<section class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-8 text-center">Tim Kami</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <div class="bg-white p-4 rounded-lg shadow-sm text-center">
                <img src="/images/team1.jpg" alt="Team Member" class="w-24 h-24 md:w-32 md:h-32 rounded-full mx-auto mb-4">
                <h3 class="text-lg md:text-xl font-bold text-gray-800 mb-2">John Doe</h3>
                <p class="text-sm md:text-base text-gray-600">Founder & CEO</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow-sm text-center">
                <img src="/images/team2.jpg" alt="Team Member" class="w-24 h-24 md:w-32 md:h-32 rounded-full mx-auto mb-4">
                <h3 class="text-lg md:text-xl font-bold text-gray-800 mb-2">Jane Smith</h3>
                <p class="text-sm md:text-base text-gray-600">Head of Product</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow-sm text-center">
                <img src="/images/team3.jpg" alt="Team Member" class="w-24 h-24 md:w-32 md:h-32 rounded-full mx-auto mb-4">
                <h3 class="text-lg md:text-xl font-bold text-gray-800 mb-2">Michael Lee</h3>
                <p class="text-sm md:text-base text-gray-600">Marketing Director</p>
            </div>
        </div>
    </div>
</section>

<!-- Mengapa Memilih Kami Section -->
<section class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-8 text-center">Mengapa Memilih Kami?</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <div class="bg-white p-4 rounded-lg shadow-sm text-center">
                <div class="w-10 h-10 md:w-12 md:h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <h3 class="text-lg md:text-xl font-bold text-gray-800 mb-2">Kualitas Terbaik</h3>
                <p class="text-sm md:text-base text-gray-600">Bumbu pilihan dengan kualitas premium</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow-sm text-center">
                <div class="w-10 h-10 md:w-12 md:h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg md:text-xl font-bold text-gray-800 mb-2">Pengiriman Cepat</h3>
                <p class="text-sm md:text-base text-gray-600">Pesanan diproses dan dikirim dengan cepat</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow-sm text-center">
                <div class="w-10 h-10 md:w-12 md:h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg md:text-xl font-bold text-gray-800 mb-2">Garansi Kepuasan</h3>
                <p class="text-sm md:text-base text-gray-600">100% uang kembali jika tidak puas</p>
            </div>
        </div>
    </div>
</section>
@endsection
