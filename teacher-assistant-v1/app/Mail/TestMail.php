<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Laravel v11 - Simple Text Email',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'email.simple-email',
            with: [
                "name" => $this->data["name"],
                "from" => $this->data["from"]
            ]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
