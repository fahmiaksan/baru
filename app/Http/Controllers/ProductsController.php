<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use RealRashid\SweetAlert\Facades\Alert;


class ProductsController extends Controller
{

    public function create()
    {
        $categories = Category::all();
        return view('products.create')->with('categories', $categories);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer',
            'description' => 'required|string',
            'stock' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $request->file('image')->store('images/products', 'public');

        $product = new Product();
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->stock = $request->input('stock');
        $product->category_id = $request->input('category_id');
        $product->image = $imagePath;
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }
    public function index(Request $request)
    {
        $auth = Auth::user();
        $role = $auth->role;
        if ($role !== 'staff') {
            return redirect('/dashboard');
            exit;
        }
        $products = Product::all();
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


    public function destroy(Request $request, $id)
    {

        // Temukan produk berdasarkan ID
        $product = Product::find($id);

        // Jika produk tidak ditemukan, kembalikan respons dengan pesan error
        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Product not found.');
        }

        try {
            // Hapus file gambar jika ada
            if ($product->image && Storage::exists('public/storage/', $product->image)) {
                Storage::delete($product->image);
            }

            // Hapus produk dari database
            $product->delete();

            // Redirect dengan pesan sukses
            return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
        } catch (\Exception $e) {
            // Tangani error dan redirect dengan pesan error
            return redirect()->route('products.index')->with('error', 'Failed to delete product. Please try again.');
        }
    }
}
