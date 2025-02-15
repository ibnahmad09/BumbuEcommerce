@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <!-- Card Total Produk -->
    <div class="bg-white/30 backdrop-blur-lg rounded-xl shadow-soft p-6 glass-effect hover-glow smooth-transition">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-800">Total Produk</h3>
                <p class="text-3xl font-bold text-green-600 mt-2">150</p>
            </div>
            <div class="p-3 bg-green-100 rounded-full">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
        </div>
    </div>

    <!-- Card Total Pesanan -->
    <div class="bg-white/30 backdrop-blur-lg rounded-xl shadow-soft p-6 glass-effect hover-glow smooth-transition">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-800">Total Pesanan</h3>
                <p class="text-3xl font-bold text-green-600 mt-2">150</p>
            </div>
            <div class="p-3 bg-green-100 rounded-full">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
        </div>
    </div>

    <!-- Card Total Pengguna -->
    <div class="bg-white/30 backdrop-blur-lg rounded-xl shadow-soft p-6 glass-effect hover-glow smooth-transition">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-800">Total Pengguna</h3>
                <p class="text-3xl font-bold text-green-600 mt-2">150</p>
            </div>
            <div class="p-3 bg-green-100 rounded-full">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
        </div>
    </div>
</div>

<div class="mt-8">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Pesanan Terbaru</h2>
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID Pesanan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Pelanggan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <!-- Dummy Data -->
                <tr>
                    <td class="px-6 py-4">#12345</td>
                    <td class="px-6 py-4">John Doe</td>
                    <td class="px-6 py-4">Rp 150.000</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 text-sm bg-green-100 text-green-800 rounded">Selesai</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection 