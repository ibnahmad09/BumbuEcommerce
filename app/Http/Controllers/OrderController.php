<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', auth()->id())
            ->with(['items.product'])
            ->latest()
            ->paginate(10);

        return view('user.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {

        // Cukup gunakan $order yang sudah di-resolve oleh Laravel
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        // Load relasi yang diperlukan
        $order->load(['shippingAddress', 'items.product', 'user']);

        return view('user.orders.show', compact('order'));
    }
}
