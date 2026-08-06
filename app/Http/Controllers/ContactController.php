<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessageMail;

class ContactController extends Controller
{

    public function index()
    {
        return view('user.contact', [
            'title' => 'PPI Kastamonu - Kontak Kami'
        ]);
    }

    public function send(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Kirim email langsung ke alamat resmi PPI Kastamonu
        Mail::to('ppi.kastamonu@gmail.com')->send(new ContactMessageMail($validatedData));

        return redirect()->back()->with('success', 'Terima kasih! Pesan Anda telah berhasil dikirim langsung ke email kami.');
    }
}
