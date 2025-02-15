<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Bumbu Dasar Kuning',
                'description' => 'Bumbu dasar kuning siap pakai untuk berbagai masakan.',
                'price' => 15000,
                'stock' => 50,
                'category_id' => 1, // Sesuaikan dengan ID kategori yang ada
                'image' => 'bumbu-dasar-kuning.jpg',
            ],
            [
                'name' => 'Bumbu Instan Rendang',
                'description' => 'Bumbu instan praktis untuk membuat rendang yang lezat.',
                'price' => 20000,
                'stock' => 30,
                'category_id' => 2,
                'image' => 'bumbu-instan-rendang.jpg',
            ],
            [
                'name' => 'Bumbu Kering Ayam Goreng',
                'description' => 'Bumbu kering untuk ayam goreng yang gurih dan renyah.',
                'price' => 12000,
                'stock' => 40,
                'category_id' => 3,
                'image' => 'bumbu-kering-ayam-goreng.jpg',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
} 