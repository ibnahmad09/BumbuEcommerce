<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Bumbu Dasar', 'slug' => 'bumbu-dasar'],
            ['name' => 'Bumbu Instan', 'slug' => 'bumbu-instan'],
            ['name' => 'Bumbu Kering', 'slug' => 'bumbu-kering'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
} 