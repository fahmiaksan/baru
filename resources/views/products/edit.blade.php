<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-xl font-semibold mb-6">Edit Product</h3>

                    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Nama Produk -->
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Product Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:placeholder-gray-400">
                            @error('name')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>

                        <!-- Harga -->
                        <div class="mb-4">
                            <label for="price" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Price</label>
                            <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:placeholder-gray-400">
                            @error('price')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>

                        <!-- Stok -->
                        <div class="mb-4">
                            <label for="stock" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Stock</label>
                            <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:placeholder-gray-400">
                            @error('stock')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>

                        <!-- Deskripsi -->
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                            <textarea name="description" id="description" rows="4"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-900 dark:border-gray-700 dark:placeholder-gray-400">{{ old('description', $product->description) }}</textarea>
                            @error('description')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>

                        <!-- Gambar -->
                        <div class="mb-4">
                            <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Product Image</label>
                            <input type="file" name="image" id="image"
                                class="mt-1 block w-full text-sm text-gray-500 dark:text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Current Image:</p>
                            <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="w-20 h-20 mt-2 rounded">
                            @error('image')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>

                        <!-- Tombol Update -->
                        <div class="flex justify-end mb-4">
                            <button type="submit" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-md">
                                Update Product
                            </button>
                        </div>
                    </form>

                    

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
