@extends('layouts.user')

@section('content')
<section class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Product Image -->
            <div class="bg-white rounded-lg shadow-lg p-4">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                     class="w-full h-96 object-cover rounded-lg">
            </div>

            <!-- Product Details -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $product->name }}</h1>

                <div class="flex items-center mb-6">
                    <span class="text-2xl font-bold text-green-600">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </span>
                    @if($product->stock > 0)
                        <span class="ml-4 px-3 py-1 bg-green-100 text-green-800 text-sm rounded-full">
                            Tersedia
                        </span>
                    @else
                        <span class="ml-4 px-3 py-1 bg-red-100 text-red-800 text-sm rounded-full">
                            Stok Habis
                        </span>
                    @endif
                </div>

                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Deskripsi Produk</h3>
                    <p class="text-gray-600 leading-relaxed">
                        {{ $product->description }}
                    </p>
                </div>

                @if($product->stock > 0)
                <form action="{{ route('cart.store') }}" method="POST" class="mb-6">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="flex items-center gap-4">
                        <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}"
                               class="w-24 px-3 py-2 border rounded-lg text-center">
                        <button type="submit"
                                class="flex-1 bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition-colors duration-300">
                            Tambah ke Keranjang
                        </button>
                    </div>
                </form>
                @endif

                <div class="border-t pt-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Informasi Tambahan</h3>
                    <div class="space-y-2 text-gray-600">
                        <p><span class="font-medium">Kategori:</span> {{ $product->category->name ?? 'Tidak ada kategori' }}</p>
                        <p><span class="font-medium">Stok Tersedia:</span> {{ $product->stock }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
