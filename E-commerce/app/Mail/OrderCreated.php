<?php

namespace App\Mail;

use App\Models\ShopOrder;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderCreated extends Mailable
{
    use Queueable, SerializesModels;


    public $data;

    public ShopOrder $shopOrder;
    /**
     * Create a new message instance.
     */
    public function __construct($data, $shopOrder)
    {
        $this->data = $data;
        $this->shopOrder = $shopOrder;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Siparış Oluşturuldu',
        );
    }

    /**
     * Get the message content definition.
     */
    public function build()
    {
        return $this->view('mails.orderCreated')
            ->with('data', $this->data)
            ->with([
                'order' => $this->shopOrder,
                'orderItems' => $this->shopOrder->orderDetails,
            ]);
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
