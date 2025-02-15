@extends('layouts.user')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Detail Pesanan #{{ $order->id }}</h1>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Order Summary -->
        <div class="lg:col-span-2 bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-6">Ringkasan Pesanan</h2>

            <div class="divide-y divide-gray-200">
                @foreach($order->items as $item)
                <div class="py-4 flex items-center">
                    <img src="{{ $item->product->image }}" alt="{{ $item->product->name }}" class="w-16 h-16 object-cover rounded-lg">
                    
                    <div class="ml-4 flex-1">
                        <h3 class="text-lg font-semibold text-gray-800">{{ $item->product->name }}</h3>
                        <p class="text-gray-600">Jumlah: {{ $item->quantity }}</p>
                    </div>
                    
                    <p class="text-lg font-semibold text-gray-800">
                        Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}
                    </p>
                </div>
                @endforeach
            </div>

            <div class="mt-6 space-y-3">
                <div class="flex justify-between">
                    <span class="text-gray-600">Subtotal</span>
                    <span class="font-semibold text-gray-800">
                        Rp {{ number_format($order->total_price, 0, ',', '.') }}
                    </span>
                </div>
                
                <div class="border-t border-gray-200 pt-3">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Total</span>
                        <span class="font-bold text-green-600">
                            Rp {{ number_format($order->total_price, 0, ',', '.') }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Order Details -->
        <div class="bg-white rounded-lg shadow p-6 h-fit">
            <h2 class="text-xl font-semibold text-gray-800 mb-6">Detail Pesanan</h2>

            <div class="space-y-4">
                <div>
                    <span class="text-gray-600">Status:</span>
                    <span class="px-2 py-1 text-sm rounded-full 
                        @if($order->status === 'pending') bg-yellow-100 text-yellow-800
                        @elseif($order->status === 'processing') bg-blue-100 text-blue-800
                        @elseif($order->status === 'completed') bg-green-100 text-green-800
                        @elseif($order->status === 'cancelled') bg-red-100 text-red-800
                        @endif">
                        {{ ucfirst($order->status) }}
                    </span>
                </div>

                <div>
                    <span class="text-gray-600">Metode Pembayaran:</span>
                    <span class="font-medium text-gray-800">{{ ucfirst($order->payment_method) }}</span>
                </div>

                <div>
                    <span class="text-gray-600">Tanggal Pesanan:</span>
                    <span class="font-medium text-gray-800">{{ $order->created_at->format('d M Y H:i') }}</span>
                </div>

                @if($order->payment_method === 'e_wallet' && $order->midtrans_transaction_status)
                <div>
                    <span class="text-gray-600">Status Pembayaran:</span>
                    <span class="font-medium text-gray-800">{{ ucfirst($order->midtrans_transaction_status) }}</span>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection