<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\OrderItem;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Get best selling products
        $bestSellingProducts = OrderItem::select('product_id')->selectRaw('SUM(quantity) as total_sold')->groupBy('product_id')->orderByDesc('total_sold')->limit(8)->with('product')->get()->pluck('product');

        // Get new products
        $newProducts = Product::latest()->limit(8)->get();

        // Get featured products (you can customize this logic)
        // Get featured products (misalnya produk dengan stok terbanyak)
        $featuredProducts = Product::orderByDesc('stock')->limit(8)->get();

        return view('user.home', compact('bestSellingProducts', 'newProducts', 'featuredProducts'));
    }
}
