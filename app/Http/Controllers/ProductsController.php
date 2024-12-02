<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $auth = Auth::user();
        $role = $auth->role;
        if ($role != 'staff') {
            return redirect('/');
            exit;
        }
        $products = Product::all();
        if ($request->ajax()) {

            return DataTables::of($products)
                ->addColumn('action', function ($product) {
                    return '<a href="' . route('products.edit', $product->id) . '" class="btn btn-primary btn-sm">Edit</a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('products.index')->with('products', $products);
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id); // Ambil produk berdasarkan ID
        return view('products.edit', compact('product')); // Tampilkan view edit
    }

    /**
     * Memperbarui data product.
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi gambar
        ]);

        $product = Product::findOrFail($id);

        // Update data produk
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->description = $request->input('description');

        // Jika ada gambar baru, simpan dan hapus gambar lama
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($product->image && Storage::exists($product->image)) {
                Storage::delete($product->image);
            }

            // Simpan gambar baru
            $imagePath = $request->file('image')->store('images/products', 'public');
            $product->image = $imagePath;
        }

        $product->save(); // Simpan perubahan

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function catalog()
    {
        $products = Product::all();
        return view('products.catalog')->with('products', $products);
    }
}
