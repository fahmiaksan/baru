<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Menambahkan produk ke keranjang
    public function add(Request $request)
    {
        // Validasi input
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Ambil produk berdasarkan ID
        $product = Product::find($request->product_id);

        // Cek apakah produk sudah ada di keranjang
        $cart = Cart::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->first();

        if ($cart) {
            // Jika produk sudah ada di keranjang, update quantity
            $cart->quantity += $request->quantity;
            $cart->save();
        } else {
            // Jika produk belum ada di keranjang, tambahkan ke keranjang
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $product->id,
                'quantity' => $request->quantity,
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Product added to cart!');
    }

    // Menampilkan produk di keranjang
    public function index()
    {
        // Ambil semua produk di keranjang milik user yang sedang login
        $carts = Cart::where('user_id', Auth::id())->get();

        return view('cart.index', compact('carts'));
    }

    // Menghapus produk dari keranjang
    public function remove($id)
    {
        // Hapus produk dari keranjang
        Cart::findOrFail($id)->delete();

        return redirect()->route('cart.index')->with('success', 'Product removed from cart!');
    }
}
