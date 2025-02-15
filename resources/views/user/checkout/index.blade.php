@extends('layouts.user')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Checkout</h1>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Order Summary -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-6">Ringkasan Pesanan</h2>
                
                <div class="divide-y divide-gray-200">
                    @foreach($carts as $cart)
                    <div class="py-4 flex items-center">
                        <img src="{{ $cart->product->image }}" alt="{{ $cart->product->name }}" class="w-16 h-16 object-cover rounded-lg">
                        
                        <div class="ml-4 flex-1">
                            <h3 class="text-lg font-semibold text-gray-800">{{ $cart->product->name }}</h3>
                            <p class="text-gray-600">Jumlah: {{ $cart->quantity }}</p>
                        </div>
                        
                        <p class="text-lg font-semibold text-gray-800">
                            Rp {{ number_format($cart->product->price * $cart->quantity, 0, ',', '.') }}
                        </p>
                    </div>
                    @endforeach
                </div>
                
                <div class="mt-6 space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Subtotal</span>
                        <span class="font-semibold text-gray-800">
                            Rp {{ number_format($carts->sum(fn($item) => $item->product->price * $item->quantity), 0, ',', '.') }}
                        </span>
                    </div>
                    
                    <div class="border-t border-gray-200 pt-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Total</span>
                            <span class="font-bold text-green-600">
                                Rp {{ number_format($carts->sum(fn($item) => $item->product->price * $item->quantity), 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Payment Method -->
        <div class="bg-white rounded-lg shadow p-6 h-fit">
            <h2 class="text-xl font-semibold text-gray-800 mb-6">Metode Pembayaran</h2>
            
            <form action="{{ route('checkout.process') }}" method="POST">
                @csrf
                
                <div class="space-y-4">                    
                    <label class="flex items-center p-4 border rounded-lg cursor-pointer hover:bg-gray-50">
                        <input type="radio" name="payment_method" value="e_wallet" class="form-radio h-5 w-5 text-green-600">
                        <div class="ml-3">
                            <span class="block text-gray-800 font-medium">E-Wallet</span>
                            <span class="block text-sm text-gray-500">Gopay, OVO, Dana, dll</span>
                        </div>
                    </label>
                    
                    <label class="flex items-center p-4 border rounded-lg cursor-pointer hover:bg-gray-50">
                        <input type="radio" name="payment_method" value="cod" class="form-radio h-5 w-5 text-green-600">
                        <div class="ml-3">
                            <span class="block text-gray-800 font-medium">COD (Bayar di Tempat)</span>
                            <span class="block text-sm text-gray-500">Bayar saat barang diterima</span>
                        </div>
                    </label>
                </div>
                
                <button type="submit" class="mt-6 w-full bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700">
                    Lanjutkan Pembayaran
                </button>
            </form>
        </div>
    </div>
</div>
@endsection