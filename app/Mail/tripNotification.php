<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class tripNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct()
    {
        //
    }

    public function build()
    {
        return $this
            ->from('admin@gmail.com')
            ->to('steve@gmail.com')
            ->subject("Trip Notification: Upcoming Trip")
            ->view('emails.tripNotification');

    }

    /**
     * Get the message content definition.
     */



    public function attachments(): array
    {
        return [];
    }
}
