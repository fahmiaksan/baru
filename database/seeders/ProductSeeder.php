<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        // Daftar nama kategori produk pakaian
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

        // Menambahkan produk pakaian ke dalam database
        foreach (range(1, 10) as $index) {
            $category = $categories[array_rand($categories)];  // Pilih kategori acak
            $productName = ucfirst($faker->word) . ' ' . $category;  // Nama produk yang lebih realistis

            // Simulasi gambar
            $imagePath = 'images/products/' . $faker->image('public/storage/images/products', 640, 480, 'fashion', false);

            Product::create([
                'name' => $productName,  // Nama produk
                'description' => $faker->paragraph(2),  // Deskripsi lebih panjang dan masuk akal
                'price' => $faker->numberBetween(10000, 100000),  // Harga produk
                'stock' => $faker->numberBetween(1, 100),  // Stok produk
                'category_id' => $faker->numberBetween(1, 5),  // ID kategori produk, pastikan sudah ada di tabel kategori
                'image' => $imagePath,  // Path gambar produk
            ]);
        }
    }
}
