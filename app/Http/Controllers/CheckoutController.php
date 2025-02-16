<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Events\OrderStatusUpdated;
use Midtrans\Config;
use Midtrans\Snap;

class CheckoutController extends Controller
{
    public function index()
{
    $carts = Cart::where('user_id', auth()->id())->with('product')->get();
    $addresses = auth()->user()->addresses;

    return view('user.checkout.index', compact('carts', 'addresses'));
}

    public function process(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|in:e_wallet,cod',
            'shipping_address' => 'required|exists:user_addresses,id,user_id,'.auth()->id()
        ]);

        $carts = Cart::where('user_id', auth()->id())->with('product')->get();

        if ($carts->isEmpty()) {
            return redirect()->back()->with('error', 'Keranjang belanja kosong');
        }

        $order = Order::create([
            'user_id' => auth()->id(),
            'total_price' => $carts->sum(fn($item) => $item->product->price * $item->quantity),
            'status' => 'pending',
            'payment_method' => $request->payment_method,
            'shipping_address_id' => $request->shipping_address
        ]);

        foreach ($carts as $cart) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cart->product_id,
                'quantity' => $cart->quantity,
                'price' => $cart->product->price

            ]);

            // Update product stock
            $product = Product::find($cart->product_id);
            $product->stock -= $cart->quantity;
            $product->save();
        }

        Cart::where('user_id', auth()->id())->delete();

        // Handle payment based on method
        if ($request->payment_method === 'e_wallet') {
            // Redirect to Midtrans payment
            return $this->handleMidtransPayment($order);
        } else {
            // For COD, just update order status
            $order->update(['status' => 'processing']);
            event(new OrderStatusUpdated($order));
            return redirect()->route('orders.show', $order)->with('success', 'Pesanan berhasil dibuat. Silahkan siapkan pembayaran saat barang diterima.');
        }
    }

    private function handleMidtransPayment($order)
    {
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id' => $order->id,
                'gross_amount' => $order->total_price,
            ],
            'customer_details' => [
                'first_name' => auth()->user()->name,
                'email' => auth()->user()->email,
            ],
        ];

        $snapToken = Snap::getSnapToken($params);
        $order->update(['midtrans_order_id' => $order->id, 'midtrans_snap_token' => $snapToken]);

        return view('user.payment.payment', ['snapToken' => $snapToken, 'order' => $order]);
    }
}
