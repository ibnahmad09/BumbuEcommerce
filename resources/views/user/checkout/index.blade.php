@extends('layouts.user')

@section('content')
    <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:px-8 py-4">
        <h1 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-4 sm:mb-8">Checkout</h1>

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3 lg:gap-8">
            <!-- Order Summary -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-6 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Ringkasan Pesanan
                    </h2>

                    <div class="divide-y divide-gray-200">
                        @foreach ($carts as $cart)
                            <div class="py-4 flex items-center space-x-4 hover:bg-gray-50 transition-colors duration-200">
                                <div class="flex-shrink-0">
                                    <img src="{{ asset('storage/' . $cart->product->image) }}"
                                        alt="{{ $cart->product->name }}"
                                        class="w-16 h-16 sm:w-20 sm:h-20 object-cover rounded-lg shadow-sm">
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-lg font-semibold text-gray-800">{{ $cart->product->name }}</h3>
                                    <p class="text-sm text-gray-600">Jumlah: {{ $cart->quantity }}</p>
                                </div>
                                <p class="text-lg font-semibold text-gray-800">
                                    Rp {{ number_format($cart->product->price * $cart->quantity, 0, ',', '.') }}
                                </p>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-6 space-y-4">
                        <div class="flex justify-between text-base">
                            <span class="text-gray-600">Subtotal</span>
                            <span class="font-semibold text-gray-800">
                                Rp
                                {{ number_format($carts->sum(fn($item) => $item->product->price * $item->quantity), 0, ',', '.') }}
                            </span>
                        </div>

                        <div class="border-t border-gray-200 pt-4">
                            <div class="flex justify-between text-lg">
                                <span class="text-gray-700">Total</span>
                                <span class="font-bold text-green-600">
                                    Rp
                                    {{ number_format($carts->sum(fn($item) => $item->product->price * $item->quantity), 0, ',', '.') }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Payment Method -->
    <div class="space-y-6">
        <form action="{{ route('checkout.process') }}" method="POST">
            @csrf

            <!-- Shipping Address -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-6 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0zM15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    Alamat Pengiriman
                </h2>

                @if ($addresses->isEmpty())
                <div class="bg-yellow-50 rounded-lg p-4 border border-yellow-100">
                    <p class="text-yellow-700">Anda belum memiliki alamat pengiriman.</p>
                    <a href="{{ route('profile.index') }}" class="mt-2 inline-flex items-center text-sm text-green-600 hover:text-green-700">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        Tambah Alamat
                    </a>
                </div>
            @else
                <div class="space-y-3">
                    @foreach ($addresses as $address)
                        <label class="flex items-start p-4 border rounded-lg cursor-pointer hover:bg-gray-50 transition-colors duration-200">
                            <input type="radio" name="shipping_address" value="{{ $address->id }}"
                                   class="mt-1 form-radio h-5 w-5 text-green-600" required>
                            <div class="ml-3 flex-1">
                                <p class="font-medium text-gray-800">{{ $address->label }}</p>
                                <p class="text-sm text-gray-600 mt-1">{{ $address->full_address }}</p>
                            </div>
                        </label>
                    @endforeach
                </div>
            @endif
            </div>

            <!-- Payment Method -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-6 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    Metode Pembayaran
                </h2>

                <div class="space-y-3">
                    <label class="flex items-center p-4 border rounded-lg cursor-pointer hover:bg-gray-50 transition-colors duration-200">
                        <input type="radio" name="payment_method" value="e_wallet"
                            class="form-radio h-5 w-5 text-green-600">
                        <div class="ml-3">
                            <span class="block text-base font-medium text-gray-800">E-Wallet</span>
                            <span class="block text-sm text-gray-500">Gopay, OVO, Dana, dll</span>
                        </div>
                    </label>

                    <label class="flex items-center p-4 border rounded-lg cursor-pointer hover:bg-gray-50 transition-colors duration-200">
                        <input type="radio" name="payment_method" value="cod"
                            class="form-radio h-5 w-5 text-green-600">
                        <div class="ml-3">
                            <span class="block text-base font-medium text-gray-800">COD (Bayar di Tempat)</span>
                            <span class="block text-sm text-gray-500">Bayar saat barang diterima</span>
                        </div>
                    </label>
                </div>

                <button type="submit"
                    class="mt-6 w-full bg-gradient-to-r from-green-600 to-green-700 text-white px-6 py-3 rounded-lg hover:from-green-700 hover:to-green-800 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-offset-2 transition-all duration-300">
                    Lanjutkan Pembayaran
                </button>
            </div>
        </form>
    </div>            </div>
        </div>
    </div>
@endsection
