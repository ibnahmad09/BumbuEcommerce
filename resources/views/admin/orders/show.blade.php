@extends('layouts.admin')

@section('title', 'Detail Pesanan #' . $order->id)

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Detail Pesanan #{{ $order->id }}</h1>
    <a href="{{ route('order.index') }}" class="text-gray-600 hover:text-gray-800">Kembali</a>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Order Items -->
    <div class="lg:col-span-2 bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-6">Item Pesanan</h2>
        
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
                <form action="{{ route('order.updateStatus', $order) }}" method="POST" class="inline">
                    @csrf
                    <select name="status" onchange="this.form.submit()" class="ml-2 px-2 py-1 rounded border border-gray-300 focus:ring-2 focus:ring-green-600">
                        <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>Processing</option>
                        <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </form>
            </div>
            
            <div>
                <span class="text-gray-600">Pelanggan:</span>
                <span class="font-medium text-gray-800">{{ $order->user->name }}</span>
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
@endsection 