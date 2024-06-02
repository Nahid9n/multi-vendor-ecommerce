<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderInvoice extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $order,$tax_total;

    public function __construct(Order $order,$tax_total)
    {
        $this->order = $order;
        $this->tax_total = $tax_total;
    }

    /**
     * Get the message envelope.
     */
    public function build()
    {
        return $this->view('customer.invoice.invoice-pdf')
            ->subject('Your Order Invoice')
            ->with([
                'order' => $this->order,
                'tax_total' => $this->tax_total,
            ]);
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Order Invoice',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'customer.invoice.invoice-pdf',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
