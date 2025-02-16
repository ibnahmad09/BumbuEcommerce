@extends('layouts.user')

@section('content')
<div class="max-w-7xl mx-auto px-2 sm:px-4 lg:px-8 py-4">
    <h1 class="text-xl sm:text-2xl font-bold text-gray-800 mb-4">Keranjang Belanja</h1>

    @if($carts->isEmpty())
        <div class="bg-white rounded-lg shadow p-6 text-center">
            <p class="text-gray-600">Keranjang belanja Anda kosong</p>
            <a href="{{ route('products.index') }}" class="mt-4 inline-block bg-green-600 text-white px-6 py-2 rounded-full hover:bg-green-700">
                Lanjutkan Belanja
            </a>
        </div>
    @else
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Cart Items -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-lg shadow divide-y divide-gray-200">
                    @foreach($carts as $cart)
                    <div class="p-4 flex flex-col gap-4 border-b last:border-b-0">
                        <div class="flex gap-4">
                            <img src="{{ asset('storage/' . $cart->product->image) }}" alt="{{ $cart->product->name }}"
                                 class="w-20 h-20 sm:w-24 sm:h-24 object-cover rounded-lg">

                            <div class="flex-1">
                                <h3 class="text-base sm:text-lg font-semibold text-gray-800">{{ $cart->product->name }}</h3>
                                <p class="text-green-600 font-bold mt-1 text-sm sm:text-base">
                                    Rp {{ number_format($cart->product->price, 0, ',', '.') }}
                                </p>

                                <div class="mt-2">
                                    <form action="{{ route('cart.update', $cart) }}" method="POST" class="flex items-center">
                                        @csrf
                                        @method('PUT')
                                        <button type="button" onclick="updateQuantity({{ $cart->id }}, -1)"
                                            class="px-3 py-1 border rounded-l-lg hover:bg-gray-50 text-sm">-</button>
                                    <input type="number" name="quantity" id="quantity-{{ $cart->id }}"
                                           value="{{ $cart->quantity }}" min="1" max="{{ $cart->product->stock }}"
                                           class="w-12 sm:w-16 px-2 py-1 border-t border-b text-center text-sm">
                                    <button type="button" onclick="updateQuantity({{ $cart->id }}, 1)"
                                            class="px-3 py-1 border rounded-r-lg hover:bg-gray-50 text-sm">+</button>
                                    </form>
                                </div>
                            </div>

                            <div class="flex flex-col items-end">
                                <p class="text-sm sm:text-base font-semibold text-gray-800">
                                    Rp {{ number_format($cart->product->price * $cart->quantity, 0, ',', '.') }}
                                </p>
                                <form action="{{ route('cart.destroy', $cart) }}" method="POST" class="mt-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                    class="flex items-center text-red-500 hover:text-red-700 transition-all duration-200 ease-in-out transform hover:scale-105"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus item ini?')">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                                <span class="text-xs sm:text-sm">Hapus</span>
                            </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Order Summary -->
            <div class="lg:col-span-1 sticky top-4">
                <div class="bg-white rounded-lg shadow p-4 sm:p-6">
                    <h2 class="text-lg sm:text-xl font-semibold text-gray-800 mb-4">Ringkasan Pesanan</h2>

                    <div class="space-y-3 text-sm sm:text-base">
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

                    <a href="{{ route('checkout.index') }}"
                       class="mt-4 w-full bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 text-sm sm:text-base text-center block">
                        Lanjut ke Pembayaran
                    </a>
                </div>
            </div>
            </div>
        </div>
    @endif
</div>

<script>
  // Animasi saat menghapus item
  function removeItem(cartId) {
        const item = document.getElementById(`cart-item-${cartId}`);
        item.classList.add('opacity-0', 'translate-x-full');
        setTimeout(() => {
            document.getElementById(`cart-form-${cartId}`).submit();
        }, 300);
    }

    // Update quantity dengan animasi
    function updateQuantity(cartId, change) {
        const input = document.getElementById(`quantity-${cartId}`);

        if (!input) {
            console.error(`Input element with ID quantity-${cartId} not found`);
            return;
        }

        let newQuantity = parseInt(input.value) + change;

        // Validasi jumlah
        newQuantity = Math.max(newQuantity, 1);
        newQuantity = Math.min(newQuantity, parseInt(input.max));

        input.value = newQuantity;

        // Submit form
        const form = input.closest('form');
        if (form) {
            form.submit();
        } else {
            console.error('Form element not found');
        }
    }
</script>
@endsection

<div id="loading-overlay" class="fixed inset-0 bg-white bg-opacity-75 z-50 hidden">
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
        <div class="animate-spin rounded-full h-12 w-12 border-t-2 border-b-2 border-green-600"></div>
    </div>
</div>
