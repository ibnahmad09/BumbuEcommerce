@extends('layouts.admin')

@section('title', 'Laporan')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <h2 class="text-2xl font-bold mb-6">Buat Laporan</h2>

    <form action="{{ route('admin.reports.generate') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="report_type" class="block text-sm font-medium text-gray-700">Jenis Laporan</label>
                <select name="report_type" id="report_type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                    <option value="sales">Penjualan</option>
                    <option value="products">Produk</option>
                    <option value="users">Pengguna</option>
                </select>
            </div>

            <div>
                <label for="start_date" class="block text-sm font-medium text-gray-700">Tanggal Mulai</label>
                <input type="date" name="start_date" id="start_date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>

            <div>
                <label for="end_date" class="block text-sm font-medium text-gray-700">Tanggal Akhir</label>
                <input type="date" name="end_date" id="end_date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>
        </div>

        <div class="mt-6">
            <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded hover:bg-green-600">Buat Laporan</button>
        </div>
    </form>
</div>
@endsection
