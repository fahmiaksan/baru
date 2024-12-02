<x-app-layout>

<div class="container mt-5 mx-auto">
    <h2 class="text-2xl font-bold mb-4 text-white">Product List</h2>
    <table class=" table table-bordered" id="products-table">
        <thead>
            <tr class="bg-gray-700 text-white">
                <th>Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>

<!-- Tambahkan JS untuk DataTables -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function () {
        $('#products-table').DataTable({
            processing: true,
            serverSide: true,
            styled: true,
            ajax: '{{ route('products.index') }}',  // URL untuk mengambil data
            columns: [
                { data: 'name', name: 'name' },
                { data: 'price', name: 'price', render: $.fn.dataTable.render.number(',', '.', 0, 'Rp ') },
                { data: 'stock', name: 'stock' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });
    });
</script>
</x-app-layout>