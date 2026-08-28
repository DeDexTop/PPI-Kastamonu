<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMessageMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->subject('Pesan Baru dari Website: '.$this->data['subject'])
            ->html("
                    <h3>Pesan Baru dari Formulir Kontak Website</h3>
                    <p><strong>Nama:</strong> {$this->data['name']}</p>
                    <p><strong>Kontak Pengirim (Email/WA):</strong> {$this->data['kontak']}</p>
                    <p><strong>Subjek:</strong> {$this->data['subject']}</p>
                    <p><strong>Pesan:</strong></p>
                    <p>{$this->data['message']}</p>
                ");
    }
}
