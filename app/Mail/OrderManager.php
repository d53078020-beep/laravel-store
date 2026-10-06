<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderManager extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public array $cart, // Додаємо $cart
        public int $order_id,
        public int $total = 0,
        public ?string $note = null,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('no-reply@laravel-eshop.loc', 'No-reply'),
            subject: "New Order #{$this->order_id}",
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.order-manager',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}