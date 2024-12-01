  <x-home-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ __('Product Catalog') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-800">
                  <h3 class="text-2xl font-bold text-gray-800 mb-6">Product Catalog</h3>

                  <!-- Grid Katalog Produk -->
                  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($products as $product)
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded-md">
                        <h3 class="mt-4 text-xl font-semibold text-gray-900 dark:text-gray-100">{{ $product->name }}</h3>
                        <p class="mt-2 text-gray-600 dark:text-gray-300">{{ number_format($product->price, 0, ',', '.') }} IDR</p>
                        <form action="{{ route('cart.add') }}" method="POST" class="mt-4">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="name" value="{{ $product->name }}">
                            <input type="hidden" name="price" value="{{ $product->price }}">
                            <input type="number" name="quantity" value="1" min="1" class="mt-2 p-2 border rounded" required>
                            <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Add to Cart</button>
                        </form>
                    </div>
                @endforeach
                  </div>
              </div>
          </div>
      </div>
  </div>
  </x-home-layout>