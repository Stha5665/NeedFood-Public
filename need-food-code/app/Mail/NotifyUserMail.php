<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NotifyUserMail extends Mailable
{
    use Queueable, SerializesModels;

    public $notificationDetails;

    /**
     * Create a new message instance.
     */
    public function __construct($notificationDetails)
    {
        $this->notificationDetails = $notificationDetails;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Message From: NeedFood',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'admin.message.mail',
            with:
            [
                'title' =>$this->notificationDetails['title'],
                'description' => $this->notificationDetails['description'],
                'status' => $this->notificationDetails['status'],
                'delivery_type' => $this->notificationDetails['delivery_type'] ?? '',
                'delivery_date' => $this->notificationDetails['delivery_date'] ?? '',

            ],

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
