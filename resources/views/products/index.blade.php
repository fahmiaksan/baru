<x-app-layout>

<div class="container mt-5 mx-auto">
    @if(session()->has('success'))
        <div class="text-green-500 font-bold text-lg">
            {{ session()->get('success') }}
        </div>
    @elseif(session()->has('error')) 
        <div class="text-red-500 font-bold text-lg">
            {{ session()->get('error') }}
        </div>
    @endif
    <div class="container mx-auto mt-10">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-white">Product List</h2>
            <a href="{{ route('products.create') }}" 
               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow-lg">
               Add Product
            </a>
        </div>
    
        <div class="overflow-x-auto p-5 bg-white shadow-md rounded-lg">
            <table class="min-w-full border border-gray-200" id="products-table">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Price</th>
                        <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Stock</th>
                        <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Image</th>
                        <th class="px-6 py-3 text-center text-sm font-medium uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <!-- Contoh baris data -->
                    @if (count($products) > 0)
                        @foreach ($products as $product)
                    <tr>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $product->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $product->price }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $product->stock }}</td>
                        <td class="px-6 py-4">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="w-16 h-16 object-cover rounded">
                        </td>
                        <td class="px-6 py-4 text-sm text-center flex justify-center">
                            <a href="{{ route('products.edit', $product->id) }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded shadow">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                onclick="return confirm('Are you sure you want to delete this product?')"
                                >
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded shadow ml-2">Delete</a>
                            </form>
                        </td>
                    </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="px-6 py-4 text-sm text-center" colspan="4">No products found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    
</div>
</x-app-layout>
<script>
    $(document).ready(function () {
        $('#products-table').DataTable({
            paging: true,
            searching: true,
            info: true,
            responsive: true,
            columnDefs: [
                { className: "text-center", targets: [3] }, // Center align 'Actions' column
            ]
        });
    });
</script>