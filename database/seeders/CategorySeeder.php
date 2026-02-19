<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Elektronik', 'slug' => 'elektronik', 'description' => 'Produk elektronik dan gadget'],
            ['name' => 'Pakaian', 'slug' => 'pakaian', 'description' => 'Pakaian dan aksesoris fashion'],
            ['name' => 'Makanan', 'slug' => 'makanan', 'description' => 'Makanan dan minuman'],
            ['name' => 'Buku', 'slug' => 'buku', 'description' => 'Buku, majalah, dan stationery'],
            ['name' => 'Kesehatan', 'slug' => 'kesehatan', 'description' => 'Produk kesehatan dan kecantikan'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}