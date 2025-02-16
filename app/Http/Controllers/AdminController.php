<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use DateTime;

class AdminController extends Controller
{
    public function index()
    {
        // Total Pendapatan
        $totalRevenue = Order::where('status', 'completed')->sum('total_price');

        // Total Pesanan
        $totalOrders = Order::count();

        // Total Produk
        $totalProducts = Product::count();

        // Total Pengguna
        $totalUsers = User::count();

        // Pendapatan Bulanan
        $monthlyRevenue = Order::where('status', 'completed')
            ->selectRaw('SUM(total_price) as total, MONTH(created_at) as month')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $monthlyRevenueData = [
            'labels' => $monthlyRevenue->pluck('month')->map(function ($month) {
                return DateTime::createFromFormat('!m', $month)->format('F');
            }),
            'data' => $monthlyRevenue->pluck('total')
        ];

        // Status Pesanan
        $orderStatus = Order::selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->get();

        $orderStatusData = [
            'labels' => $orderStatus->pluck('status')->map(function ($status) {
                return ucfirst($status);
            }),
            'data' => $orderStatus->pluck('count')
        ];

        // Pesanan Terbaru
        $recentOrders = Order::with('user')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', ['monthlyRevenue' => $monthlyRevenueData, 'orderStatus' => $orderStatusData], compact(
            'totalRevenue',
            'totalOrders',
            'totalProducts',
            'totalUsers',
            'monthlyRevenueData',
            'orderStatusData',
            'recentOrders'
        ));
    }
}
