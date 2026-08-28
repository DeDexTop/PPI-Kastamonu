<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessageMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('user.contact', [
            'title' => 'PPI Kastamonu - Kontak Kami',
        ]);
    }

    public function send(Request $request)
    {
        $input = $request->input('kontak');
        $fieldRule = 'required|max:255';

        if (is_numeric($input)) {
            $fieldRule .= '|regex:/^[0-9]{9,15}$/';
        } else {
            $fieldRule .= '|email:rfc,dns';
        }
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'kontak' => $fieldRule,
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'kontak.required' => 'Email atau Nomor WhatsApp wajib diisi.',
            'kontak.regex' => 'Format nomor WhatsApp salah. Gunakan hanya angka (9-15 digit).',
            'kontak.email' => 'Format email salah atau domain email tidak terdaftar aktif.',
            'subject.required' => 'Subjek pesan wajib diisi.',
            'message.required' => 'Isi pesan tidak boleh kosong.',
        ]);

        Mail::to('ppikastamonu@gmail.com')->send(new ContactMessageMail($validatedData));

        return redirect()->back()->with('success', 'Terima kasih! Pesan Anda telah berhasil dikirim langsung ke email kami.');
    }
}
