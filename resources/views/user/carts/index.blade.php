@extends('layouts.user')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Keranjang Belanja</h1>

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
                    <div class="p-6 flex flex-col sm:flex-row items-start sm:items-center gap-6">
                        <img src="{{ $cart->product->image }}" alt="{{ $cart->product->name }}" class="w-24 h-24 object-cover rounded-lg">
                        
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-800">{{ $cart->product->name }}</h3>
                            <p class="text-green-600 font-bold mt-1">Rp {{ number_format($cart->product->price, 0, ',', '.') }}</p>
                            
                            <div class="mt-3 flex items-center gap-4">
                                <form action="{{ route('cart.update', $cart) }}" method="POST" class="flex items-center">
                                    @csrf
                                    @method('PUT')
                                    <button type="button" onclick="updateQuantity({{ $cart->id }}, -1)" class="px-3 py-1 border rounded-l-lg hover:bg-gray-50">-</button>
                                    <input type="number" name="quantity" value="{{ $cart->quantity }}" min="1" max="{{ $cart->product->stock }}" 
                                           class="w-16 px-2 py-1 border-t border-b text-center" id="quantity-{{ $cart->id }}">
                                    <button type="button" onclick="updateQuantity({{ $cart->id }}, 1)" class="px-3 py-1 border rounded-r-lg hover:bg-gray-50">+</button>
                                </form>
                            </div>
                        </div>
                        
                        <div class="flex flex-col items-end">
                            <p class="text-lg font-semibold text-gray-800">
                                Rp {{ number_format($cart->product->price * $cart->quantity, 0, ',', '.') }}
                            </p>
                            <form action="{{ route('cart.destroy', $cart) }}" method="POST" class="mt-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 text-sm">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Order Summary -->
            <div class="bg-white rounded-lg shadow p-6 h-fit">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Ringkasan Pesanan</h2>
                
                <div class="space-y-3">
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

                <a href="{{ route('checkout.index') }}" class="mt-6 w-full bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 text-center block">
                    Lanjut ke Pembayaran
                </a>
            </div>
        </div>
    @endif
</div>

<script>
    function updateQuantity(cartId, change) {
        const input = document.getElementById(`quantity-${cartId}`);
        let newQuantity = parseInt(input.value) + change;
        
        // Ensure quantity stays within valid range
        newQuantity = Math.max(newQuantity, 1);
        newQuantity = Math.min(newQuantity, parseInt(input.max));
        
        input.value = newQuantity;
        
        // Submit the form
        input.closest('form').submit();
    }
</script>
@endsection