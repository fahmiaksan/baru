<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUsMail; // Jika menggunakan Mail untuk mengirimkan email

class ContactController extends Controller
{
    // Menampilkan Form Contact Us
    public function showForm()
    {
        return view('contact');
    }

    // Menangani pengiriman Form Contact Us
    public function submitForm(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Kirim email atau simpan pesan ke database (jika diperlukan)
        // Contoh pengiriman email (pastikan Anda mengonfigurasi Mail di .env)

        // Mail::to('admin@example.com')->send(new ContactUsMail($request));

        return back()->with('success', 'Thank you for contacting us! We will get back to you soon.');
    }
}
