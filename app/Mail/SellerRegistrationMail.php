<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SellerRegistrationMail extends Mailable
{
    use Queueable, SerializesModels;


    public $verify;
    public function __construct($link)
    {
        $this->verify = $link;
    }
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Seller Registration Mail',
        );
    }
    public function content(): Content
    {
        return new Content(
            view: 'seller.mail.email_verify',
            with:['seller'=>'verify']
        );
    }
    public function attachments(): array
    {
        return [];
    }
}
