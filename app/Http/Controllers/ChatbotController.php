<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    public function handle(Request $request)
{
    $message = strtolower($request->message);
    $response = $this->generateResponse($message);
    return response()->json(['response' => $response]);
}

private function generateResponse($message)
{
    // Tombol cepat
    if (str_contains($message, 'tombol cepat') || str_contains($message, 'bantuan cepat')) {
        return "Berikut beberapa pertanyaan cepat yang bisa saya bantu:\n\n".
               "1. Metode Pembayaran\n".
               "2. Status Pesanan\n".
               "3. Produk Promo\n".
               "4. Alamat Toko\n".
               "5. Jam Operasional\n".
               "6. Cara Daftar Akun\n".
               "7. Cara Login\n".
               "8. Cara Checkout\n".
               "9. Cara Review Produk\n".
               "10. Hubungi CS";
    }

    // Kondisi utama
    if (str_contains($message, 'metode pembayaran') || str_contains($message, 'pembayaran')) {
        return "Kami menerima pembayaran melalui:\n- E-Wallet (Gopay, OVO, Dana)\n- COD (Bayar di Tempat)";
    } elseif (str_contains($message, 'status pesanan') || str_contains($message, 'cek pesanan')) {
        return "Anda bisa cek status pesanan di menu 'Pesanan' atau melalui link berikut: ".route('orders.index');
    } elseif (str_contains($message, 'produk promo') || str_contains($message, 'promo')) {
        return "Anda bisa melihat produk promo di halaman utama atau melalui menu 'Produk Promo'.";
    } elseif (str_contains($message, 'alamat') || str_contains($message, 'lokasi')) {
        return "Kami berlokasi di:\nJl. Bumbu Masak No. 123, Jakarta";
    } elseif (str_contains($message, 'jam buka') || str_contains($message, 'operasional')) {
        return "Kami buka setiap hari:\nSenin - Minggu: 08.00 - 20.00 WIB";
    } elseif (str_contains($message, 'daftar') || str_contains($message, 'register')) {
        return "Untuk mendaftar akun, silakan kunjungi: ".route('register');
    } elseif (str_contains($message, 'login') || str_contains($message, 'masuk')) {
        return "Untuk login, silakan kunjungi: ".route('login');
    } elseif (str_contains($message, 'checkout') || str_contains($message, 'pembelian')) {
        return "Proses checkout:\n1. Tambahkan produk ke keranjang\n2. Klik 'Lanjut ke Pembayaran'\n3. Pilih metode pembayaran\n4. Selesaikan pembayaran";
    } elseif (str_contains($message, 'review') || str_contains($message, 'ulasan')) {
        return "Untuk memberikan review:\n1. Buka menu 'Pesanan'\n2. Pilih pesanan yang sudah selesai\n3. Klik 'Beri Review' pada produk yang ingin diulas";
    } elseif (str_contains($message, 'customer service') || str_contains($message, 'CS')) {
        return "Anda bisa menghubungi customer service kami melalui:\n- Email: info@bumbumasak.com\n- Telepon: (021) 1234-5678\n- Live Chat (jam kerja)";
    } else {
        return "Maaf, saya tidak mengerti pertanyaan Anda. Berikut beberapa hal yang bisa saya bantu:\n\n".
            "1. Metode Pembayaran\n".
            "2. Status Pesanan\n".
            "3. Produk Promo\n".
            "4. Alamat Toko\n".
            "5. Jam Operasional\n".
            "6. Cara Daftar Akun\n".
            "7. Cara Login\n".
            "8. Cara Checkout\n".
            "9. Cara Review Produk\n".
            "10. Hubungi CS";
    }
}

}
