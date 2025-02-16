@extends('layouts.user')

@section('content')
<div class="max-w-7xl mx-auto px-2 sm:px-4 lg:px-8 py-4">
    <h1 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-4 sm:mb-8">Checkout</h1>

    <div class="grid grid-cols-1 gap-4 sm:gap-6 lg:grid-cols-3 lg:gap-8">
        <!-- Order Summary -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow p-4 sm:p-6">
                <h2 class="text-lg sm:text-xl font-semibold text-gray-800 mb-4 sm:mb-6">Ringkasan Pesanan</h2>

                <div class="divide-y divide-gray-200">
                    @foreach($carts as $cart)
                    <div class="py-3 sm:py-4 flex items-center">
                        <img src="{{ asset('storage/' . $cart->product->image) }}" alt="{{ $cart->product->name }}" class="w-12 h-12 sm:w-16 sm:h-16 object-cover rounded-lg">

                        <div class="ml-3 sm:ml-4 flex-1">
                            <h3 class="text-base sm:text-lg font-semibold text-gray-800">{{ $cart->product->name }}</h3>
                            <p class="text-sm sm:text-base text-gray-600">Jumlah: {{ $cart->quantity }}</p>
                        </div>

                        <p class="text-base sm:text-lg font-semibold text-gray-800">
                            Rp {{ number_format($cart->product->price * $cart->quantity, 0, ',', '.') }}
                        </p>
                    </div>
                    @endforeach
                </div>

                <div class="mt-4 sm:mt-6 space-y-2 sm:space-y-3">
                    <div class="flex justify-between text-sm sm:text-base">
                        <span class="text-gray-600">Subtotal</span>
                        <span class="font-semibold text-gray-800">
                            Rp {{ number_format($carts->sum(fn($item) => $item->product->price * $item->quantity), 0, ',', '.') }}
                        </span>
                    </div>

                    <div class="border-t border-gray-200 pt-2 sm:pt-3">
                        <div class="flex justify-between text-sm sm:text-base">
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
        <div class="bg-white rounded-lg shadow p-4 sm:p-6 h-fit">
            <h2 class="text-lg sm:text-xl font-semibold text-gray-800 mb-4 sm:mb-6">Metode Pembayaran</h2>

            <form action="{{ route('checkout.process') }}" method="POST">
                @csrf

                <div class="space-y-3">
                    <label class="flex items-center p-3 sm:p-4 border rounded-lg cursor-pointer hover:bg-gray-50">
                        <input type="radio" name="payment_method" value="e_wallet" class="form-radio h-4 w-4 sm:h-5 sm:w-5 text-green-600">
                        <div class="ml-2 sm:ml-3">
                            <span class="block text-sm sm:text-base text-gray-800 font-medium">E-Wallet</span>
                            <span class="block text-xs sm:text-sm text-gray-500">Gopay, OVO, Dana, dll</span>
                        </div>
                    </label>

                    <label class="flex items-center p-3 sm:p-4 border rounded-lg cursor-pointer hover:bg-gray-50">
                        <input type="radio" name="payment_method" value="cod" class="form-radio h-4 w-4 sm:h-5 sm:w-5 text-green-600">
                        <div class="ml-2 sm:ml-3">
                            <span class="block text-sm sm:text-base text-gray-800 font-medium">COD (Bayar di Tempat)</span>
                            <span class="block text-xs sm:text-sm text-gray-500">Bayar saat barang diterima</span>
                        </div>
                    </label>
                </div>

                <button type="submit" class="mt-4 sm:mt-6 w-full bg-green-600 text-white px-4 py-2 sm:px-6 sm:py-3 rounded-lg hover:bg-green-700 text-sm sm:text-base">
                    Lanjutkan Pembayaran
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
