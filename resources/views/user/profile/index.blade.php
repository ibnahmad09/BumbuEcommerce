@extends('layouts.user')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Sidebar Profil -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="text-center">
                    <div class="w-32 h-32 mx-auto mb-4 relative">
                        <img src="{{ asset('images/default-avatar.png') }}" alt="User Avatar"
                             class="w-full h-full rounded-full object-cover border-4 border-green-100">
                        <button class="absolute bottom-0 right-0 bg-green-600 text-white p-2 rounded-full hover:bg-green-700 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </button>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800">{{ auth()->user()->name }}</h2>
                    <p class="text-gray-600 mt-2">{{ auth()->user()->email }}</p>
                </div>

                <div class="mt-6 space-y-4">
                    <a href="{{ route('profile.edit') }}" class="flex items-center p-3 text-gray-600 hover:bg-green-50 rounded-lg transition-colors">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        Edit Profil
                    </a>
                    <a href="{{ route('orders.index') }}" class="flex items-center p-3 text-gray-600 hover:bg-green-50 rounded-lg transition-colors">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                        Riwayat Pesanan
                    </a>
                    <a href="{{ route('profile.security') }}" class="flex items-center p-3 text-gray-600 hover:bg-green-50 rounded-lg transition-colors">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                        Keamanan Akun
                    </a>
                </div>
            </div>
        </div>

        <!-- Konten Utama -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Informasi Profil</h2>

                <div class="space-y-6">
                    <!-- Informasi Dasar -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-500 mb-1">Nama Lengkap</label>
                            <p class="text-gray-800 font-medium">{{ auth()->user()->name }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 mb-1">Email</label>
                            <p class="text-gray-800 font-medium">{{ auth()->user()->email }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 mb-1">Nomor Telepon</label>
                            <p class="text-gray-800 font-medium">{{ auth()->user()->phone ?? '-' }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 mb-1">Alamat</label>
                            <p class="text-gray-800 font-medium">{{ auth()->user()->address ?? '-' }}</p>
                        </div>
                    </div>

                    <!-- Statistik Transaksi -->
                    <div class="bg-green-50 rounded-xl p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Statistik Transaksi</h3>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <div class="text-center">
                                <p class="text-sm text-gray-500">Total Pesanan</p>
                                <p class="text-2xl font-bold text-green-600">12</p>
                            </div>
                            <div class="text-center">
                                <p class="text-sm text-gray-500">Pesanan Selesai</p>
                                <p class="text-2xl font-bold text-green-600">8</p>
                            </div>
                            <div class="text-center">
                                <p class="text-sm text-gray-500">Pesanan Diproses</p>
                                <p class="text-2xl font-bold text-green-600">2</p>
                            </div>
                            <div class="text-center">
                                <p class="text-sm text-gray-500">Total Belanja</p>
                                <p class="text-2xl font-bold text-green-600">Rp 1.250.000</p>
                            </div>
                        </div>
                    </div>

                    <!-- Alamat Pengiriman -->
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Alamat Pengiriman</h3>
                        <div class="space-y-4">
                            <div class="bg-white border border-gray-200 rounded-lg p-4">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <p class="font-medium text-gray-800">Rumah</p>
                                        <p class="text-sm text-gray-600">Jl. Bumbu Masak No. 123, Jakarta</p>
                                    </div>
                                    <button class="text-green-600 hover:text-green-700">Edit</button>
                                </div>
                            </div>
                            <button class="w-full bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                                Tambah Alamat Baru
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
