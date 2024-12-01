<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
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
                'name' => $category,
                'description' => 'Description for ' . $category
            ]);
        }
    }
}
