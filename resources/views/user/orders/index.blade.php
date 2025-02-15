@extends('layouts.user')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Riwayat Pesanan</h1>

    @if($orders->isEmpty())
        <div class="bg-white rounded-lg shadow p-6 text-center">
            <p class="text-gray-600">Anda belum memiliki pesanan</p>
            <a href="{{ route('products.index') }}" class="mt-4 inline-block bg-green-600 text-white px-6 py-2 rounded-full hover:bg-green-700">
                Mulai Belanja
            </a>
        </div>
    @else
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="hidden md:block">
                <div class="grid grid-cols-5 gap-4 bg-gray-50 px-6 py-3 text-sm font-medium text-gray-500 uppercase">
                    <div>ID Pesanan</div>
                    <div>Tanggal</div>
                    <div>Total</div>
                    <div>Status</div>
                    <div>Aksi</div>
                </div>
            </div>
            <div class="divide-y divide-gray-200">
                @foreach($orders as $order)
                <div class="p-6 hover:bg-gray-50 transition-colors duration-200">
                    <div class="md:grid md:grid-cols-5 md:gap-4">
                        <!-- Mobile View -->
                        <div class="md:hidden space-y-2">
                            <div class="flex justify-between">
                                <span class="text-gray-500">ID Pesanan:</span>
                                <span class="text-gray-800">#{{ $order->id }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-500">Tanggal:</span>
                                <span class="text-gray-800">{{ $order->created_at->format('d M Y') }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-500">Total:</span>
                                <span class="text-green-600 font-bold">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-500">Status:</span>
                                <span class="px-2 py-1 text-sm rounded-full 
                                    @if($order->status === 'pending') bg-yellow-100 text-yellow-800
                                    @elseif($order->status === 'processing') bg-blue-100 text-blue-800
                                    @elseif($order->status === 'completed') bg-green-100 text-green-800
                                    @elseif($order->status === 'cancelled') bg-red-100 text-red-800
                                    @endif">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </div>
                        </div>
                        
                        <!-- Desktop View -->
                        <div class="hidden md:flex items-center">#{{ $order->id }}</div>
                        <div class="hidden md:flex items-center">{{ $order->created_at->format('d M Y') }}</div>
                        <div class="hidden md:flex items-center font-bold text-green-600">Rp {{ number_format($order->total_price, 0, ',', '.') }}</div>
                        <div class="hidden md:flex items-center">
                            <span class="px-2 py-1 text-sm rounded-full 
                                @if($order->status === 'pending') bg-yellow-100 text-yellow-800
                                @elseif($order->status === 'processing') bg-blue-100 text-blue-800
                                @elseif($order->status === 'completed') bg-green-100 text-green-800
                                @elseif($order->status === 'cancelled') bg-red-100 text-red-800
                                @endif">
                                {{ ucfirst($order->status) }}
                            </span>
                        </div>
                        <div class="flex items-center justify-end md:justify-start mt-4 md:mt-0">
                            <a href="{{ route('orders.show', $order) }}" class="text-green-600 hover:text-green-700 flex items-center">
                                <span>Detail</span>
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $orders->links() }}
        </div>
    @endif
</div>
@endsection 