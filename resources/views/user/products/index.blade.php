@extends('layouts.user')

@section('content')
<section class="bg-green-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Produk Kami</h1>
            <p class="text-lg text-gray-600">Temukan bumbu masak berkualitas tinggi untuk kreasi masakan Anda</p>
        </div>
    </div>
</section>

<section class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Filter and Search -->
        <div class="mb-8 flex flex-col sm:flex-row gap-4">
            <input type="text" placeholder="Cari produk..." class="w-full sm:w-64 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-600">
            <select class="w-full sm:w-48 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-600">
                <option value="">Semua Kategori</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <select class="w-full sm:w-48 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-600">
                <option value="">Urutkan</option>
                <option value="price_asc">Harga Terendah</option>
                <option value="price_desc">Harga Tertinggi</option>
                <option value="newest">Terbaru</option>
            </select>
        </div>

        <!-- Product Grid -->
      <!-- Product Grid -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
    @foreach($products as $product)
    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
        <div class="relative">
            <<img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-32 sm:h-56 object-cover">
            @if($product->stock <= 0)
                <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                    <span class="text-white font-bold">Stok Habis</span>
                </div>
            @endif
        </div>
        <div class="p-3 sm:p-4">
            <h3 class="text-lg sm:text-xl font-semibold text-gray-800 mb-1 sm:mb-2">{{ $product->name }}</h3>
            <p class="text-green-600 font-bold mb-2 sm:mb-4">Rp {{ number_format($product->price, 0, ',', '.') }}</p>

            @if($product->stock > 0)
            <form action="{{ route('cart.store') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <div class="flex flex-col sm:flex-row items-center gap-2 sm:gap-4 mb-2 sm:mb-4">
                    <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}"
                           class="w-full sm:w-20 px-2 py-1 border rounded-lg text-center">
                </div>
                <button type="submit" class="w-full bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 text-sm sm:text-base">
                    Tambah ke Keranjang
                </button>
            </form>
            @else
                <button class="w-full bg-gray-400 text-white px-4 py-2 rounded-lg cursor-not-allowed text-sm sm:text-base" disabled>
                    Stok Habis
                </button>
            @endif
        </div>
    </div>
    @endforeach
</div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $products->links() }}
        </div>
    </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle form submission
        const forms = document.querySelectorAll('form[action="{{ route('cart.store') }}"]');
        forms.forEach(form => {
            form.addEventListener('submit', async function(e) {
                e.preventDefault();

                try {
                    const response = await fetch(form.action, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            product_id: form.querySelector('input[name="product_id"]').value,
                            quantity: form.querySelector('input[name="quantity"]').value
                        })
                    });

                    const data = await response.json();

                    if (response.ok) {
                        // Show success notification
                        showNotification('Produk berhasil ditambahkan ke keranjang', data.total_price);
                    } else {
                        alert('Terjadi kesalahan: ' + data.message);
                    }
                } catch (error) {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat menambahkan produk ke keranjang');
                }
            });
        });

        // Function to show notification
        function showNotification(message, totalPrice) {
            const notification = document.createElement('div');
            notification.className = 'fixed bottom-4 right-4 bg-white rounded-lg shadow-lg p-6 max-w-sm transform transition-all duration-300 translate-x-full';
            notification.innerHTML = `
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-green-600">Berhasil!</h3>
                    <button onclick="this.parentElement.parentElement.remove()" class="text-gray-400 hover:text-gray-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <p class="text-gray-600">${message}</p>
                <div class="mt-4">
                    <p class="text-lg font-semibold text-gray-800">Total Keranjang: Rp ${new Intl.NumberFormat('id-ID').format(totalPrice)}</p>
                </div>
            `;

            document.body.appendChild(notification);

            // Trigger animation
            setTimeout(() => {
                notification.classList.remove('translate-x-full');
            }, 10);

            // Auto remove after 5 seconds
            setTimeout(() => {
                notification.remove();
            }, 5000);
        }
    });
</script>
@endsection

