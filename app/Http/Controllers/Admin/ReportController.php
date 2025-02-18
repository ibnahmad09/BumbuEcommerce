<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use PDF;

class ReportController extends Controller
{
    public function index()
    {
        return view('admin.reports.index');
    }

    public function generate(Request $request)
    {
        $request->validate([
            'report_type' => 'required|in:sales,products,users',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        $reportType = $request->report_type;
        $startDate = $request->start_date ? Carbon::parse($request->start_date) : null;
        $endDate = $request->end_date ? Carbon::parse($request->end_date) : null;

        switch ($reportType) {
            case 'sales':
                $data = $this->generateSalesReport($startDate, $endDate);
                break;
            case 'products':
                $data = $this->generateProductsReport($startDate, $endDate);
                break;
            case 'users':
                $data = $this->generateUsersReport($startDate, $endDate);
                break;
        }

        $pdf = PDF::loadView('admin.reports.template', $data);
        return $pdf->download('laporan_' . $reportType . '_' . now()->format('YmdHis') . '.pdf');
    }

    private function generateSalesReport($startDate, $endDate)
    {
        $query = Order::query();

        if ($startDate && $endDate) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        $orders = $query->with(['user', 'items.product'])->get();
        $totalRevenue = $orders->where('status', 'completed')->sum('total_price');

        return [
            'title' => 'Laporan Penjualan',
            'data' => $orders,
            'totalRevenue' => $totalRevenue,
            'startDate' => $startDate,
            'endDate' => $endDate
        ];
    }

    private function generateProductsReport($startDate, $endDate)
    {
        $query = Product::query();

        if ($startDate && $endDate) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        $products = $query->withCount('orderItems')->get();

        return [
            'title' => 'Laporan Produk',
            'data' => $products,
            'startDate' => $startDate,
            'endDate' => $endDate
        ];
    }

    private function generateUsersReport($startDate, $endDate)
    {
        $query = User::query();

        if ($startDate && $endDate) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        $users = $query->withCount('orders')->get();

        return [
            'title' => 'Laporan Pengguna',
            'data' => $users,
            'startDate' => $startDate,
            'endDate' => $endDate
        ];
    }
}
