<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EmailAktivasi extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(private $kode)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "Aktivasi Akun Profree",
        );
    }

    public function content(): Content
    {
        return new Content(
            view: "EmailAktivasiAkun",
            with: ["kode" => $this->kode],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
