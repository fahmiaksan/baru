<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Daftar kategori pakaian
        $categories = [
            'Men\'s Wear',
            'Women\'s Wear',
            'T-Shirts',
            'Jeans',
            'Dresses',
            'Jackets',
            'Shoes',
            'Accessories'
        ];

        // Masukkan kategori ke dalam database
        foreach ($categories as $category) {
            Category::create([
                'name' => $category
            ]);
        }
    }
}
