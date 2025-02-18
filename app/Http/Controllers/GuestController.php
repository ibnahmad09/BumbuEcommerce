<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\OrderItem;
use App\Models\Category;

class GuestController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('products')->get();

         // Get best selling products
         $bestSellingProducts = OrderItem::select('product_id')
         ->selectRaw('SUM(quantity) as total_sold')
         ->groupBy('product_id')
         ->orderByDesc('total_sold')
         ->limit(8)
         ->with('product')
         ->get()
         ->pluck('product');

     // Get new products
     $newProducts = Product::latest()
         ->limit(8)
         ->get();
        return view('guest.index', compact('bestSellingProducts', 'newProducts', 'categories'));
    }
}
