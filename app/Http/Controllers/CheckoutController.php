<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\Cart;
use App\Models\CheckoutDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function process(Request $request)
    {
        $user = Auth::user();
        $carts = Cart::where('user_id', $user->id)->get();

        if ($carts->isEmpty()) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        // Hitung total harga
        $totalPrice = $carts->sum(function ($cart) {
            return $cart->product->price * $cart->quantity;
        });

        // Generate nomor pesanan
        $orderNumber = 'ORD-' . strtoupper(uniqid());

        // Simpan transaksi utama
        $checkout = Checkout::create([
            'user_id' => $user->id,
            'order_number' => $orderNumber,
            'total_price' => $totalPrice,
        ]);

        // Simpan detail produk dalam transaksi
        foreach ($carts as $cart) {
            CheckoutDetail::create([
                'checkout_id' => $checkout->id,
                'product_id' => $cart->product_id,
                'quantity' => $cart->quantity,
                'price' => $cart->product->price,
            ]);
        }

        // Kosongkan keranjang
        Cart::where('user_id', $user->id)->delete();

        return redirect()->route('checkout.success', ['order' => $checkout->id])
            ->with('success', 'Checkout successful! Your order number is ' . $orderNumber);
    }


    public function success($orderId)
    {
        $checkout = Checkout::findOrFail($orderId);

        return view('checkout.success', compact('checkout'));
    }

    public function manage()
    {
        $checkouts = Checkout::with('user', 'details.product')->orderBy('created_at', 'desc')->get();
        return view('checkout.manage', compact('checkouts'));
    }

    public function updateStatus(Request $request, $id)
    {
        $checkout = Checkout::findOrFail($id);
        $status = $request->status;
        if ($status == 'Payment Success') {
            $status = 'completed';
        } else if ($status == 'Cancel') {
            $status = 'canceled';
        } else {
            $status = 'pending';
        }
        $checkout->status = $status; // Status dikirim melalui form
        $checkout->save();

        return redirect()->route('checkouts.manage')->with('success', 'Checkout status updated successfully.');
    }
}
