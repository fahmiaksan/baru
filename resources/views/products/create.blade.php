<x-app-layout>
  <div class="container mx-auto mt-10">
      <div class="max-w-3xl mx-auto bg-white shadow-md rounded-md p-6">
          <h2 class="text-2xl font-semibold text-gray-800 mb-6">Create Product</h2>
          <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
              @csrf

              <!-- Nama Produk -->
              <div>
                  <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
                  <input 
                      type="text" 
                      name="name" 
                      id="name" 
                      value="{{ old('name') }}" 
                      class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                  @error('name')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
              </div>

              <!-- Harga -->
              <div>
                  <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                  <input 
                      type="number" 
                      name="price" 
                      id="price" 
                      value="{{ old('price') }}" 
                      class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                  @error('price')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
              </div>

              <!-- Stok -->
              <div>
                  <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
                  <input 
                      type="number" 
                      name="stock" 
                      id="stock" 
                      value="{{ old('stock') }}" 
                      class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                  @error('stock')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
              </div>

              <div>
                <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                <select name="category_id" id="category" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                  @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                </select>
                @error('category')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

              <!-- Deskripsi -->
              <div>
                  <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                  <textarea 
                      name="description" 
                      id="description" 
                      rows="4" 
                      class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('description') }}</textarea>
                  @error('description')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
              </div>

              <!-- Gambar -->
              <div>
                  <label for="image" class="block text-sm font-medium text-gray-700">Product Image</label>
                  <input 
                      type="file" 
                      name="image" 
                      id="image" 
                      class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:border-0 file:rounded-md file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                  @error('image')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
              </div>

              <!-- Tombol -->
              <div class="flex justify-end">
                  <button type="submit" class="px-6 py-2 bg-blue-500 text-white font-semibold rounded-md shadow hover:bg-blue-600">
                      Create Product
                  </button>
              </div>
          </form>
      </div>
  </div>
</x-app-layout>
