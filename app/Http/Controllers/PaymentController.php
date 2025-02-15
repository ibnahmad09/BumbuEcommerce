<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use App\Models\Order;

class PaymentController extends Controller
{
    public function pay(Request $request)
    {
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id' => rand(),
                'gross_amount' => $request->total,
            ],
            'customer_details' => [
                'first_name' => $request->name,
                'email' => $request->email,
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        return view('payment', ['snapToken' => $snapToken]);
    }

    public function handleNotification(Request $request)
    {
        // Ambil data dari request
        $orderId = $request->order_id;
        $transactionStatus = $request->transaction_status;
        $fraudStatus = $request->fraud_status;

        // Cari order berdasarkan order_id
        $order = Order::find($orderId);
        
        if ($order) {
            // Update status transaksi Midtrans
            $order->update([
                'midtrans_transaction_status' => $transactionStatus
            ]);
            
            // Jika pembayaran berhasil (settlement)
            if ($transactionStatus == 'settlement') {
                $order->update(['status' => 'processing']);
                return redirect()->route('user.orders.show', $order)->with('success', 'Pembayaran berhasil!');
            }
            
            // Jika pembayaran pending
            if ($transactionStatus == 'pending') {
                return redirect()->route('user.orders.show', $order)->with('info', 'Menunggu pembayaran...');
            }
            
            // Jika pembayaran gagal
            if ($transactionStatus == 'cancel' || $transactionStatus == 'expire' || $transactionStatus == 'deny') {
                return redirect()->route('user.orders.show', $order)->with('error', 'Pembayaran gagal atau dibatalkan.');
            }
        }
        
        return response()->json(['status' => 'success']);
    }
}