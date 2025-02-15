<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran - {{ config('app.name') }}</title>
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('services.midtrans.client_key') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex flex-col justify-center items-center p-4">
        <div class="w-full max-w-2xl bg-white rounded-xl shadow-lg overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-green-400 to-green-600 p-6">
                <h1 class="text-3xl font-bold text-white">Selesaikan Pembayaran</h1>
                <p class="text-white/90 mt-2">Langkah terakhir untuk menyelesaikan pesanan Anda</p>
            </div>

            <!-- Content -->
            <div class="p-6">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <p class="text-gray-600">Total Pembayaran</p>
                        <p class="text-2xl font-bold text-gray-800">Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>
                    </div>
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                </div>

                <div class="space-y-4">
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-gray-600">Metode Pembayaran</p>
                        <p class="font-medium text-gray-800">E-Wallet (Midtrans)</p>
                    </div>

                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-gray-600">ID Pesanan</p>
                        <p class="font-medium text-gray-800">#{{ $order->id }}</p>
                    </div>
                </div>

                <button id="pay-button" class="w-full mt-6 bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                    Bayar Sekarang
                </button>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
            snap.pay('{{ $snapToken }}', {
                onSuccess: function(result){
                    window.location.href = "{{ route('orders.show', $order) }}";
                },
                onPending: function(result){
                    window.location.href = "{{ route('orders.show', $order) }}";
                },
                onError: function(result){
                    alert("Pembayaran gagal, silahkan coba lagi");
                }
            });
        });
    </script>
</body>
</html>