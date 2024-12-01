<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name', 255); // Nama produk
            $table->longText('description'); // Deskripsi produk
            $table->integer('price'); // Harga produk
            $table->integer('stock'); // Stok produk
            $table->foreignId('category_id')->references('id')->on('categories')->onDelete('cascade'); // Relasi ke kategori
            $table->string('image')->nullable(); // Path atau URL gambar
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
