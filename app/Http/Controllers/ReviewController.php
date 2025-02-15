<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Order;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'comment' => 'required|string|max:500',
            'rating' => 'required|integer|between:1,5'
        ]);

        // Check if user has purchased the product
        $order = Order::where('id', $request->order_id)
            ->where('user_id', auth()->id())
            ->whereHas('items', function($query) use ($request) {
                $query->where('product_id', $request->product_id);
            })
            ->first();

        if (!$order) {
            return redirect()->back()->with('error', 'Anda belum membeli produk ini');
        }

        Review::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'product_id' => $request->product_id,
                'order_id' => $request->order_id
            ],
            [
                'comment' => $request->comment,
                'rating' => $request->rating
            ]
        );

        return redirect()->back()->with('success', 'Review berhasil disimpan');
    }
}
