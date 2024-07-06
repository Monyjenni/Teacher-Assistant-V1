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
    private $class;

    public function __construct($data, $class)
    {
        $this->data = $data;
        $this->class = $class;
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
                "from" => $this->data["from"],
                "class" => $this->class,
            ]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
