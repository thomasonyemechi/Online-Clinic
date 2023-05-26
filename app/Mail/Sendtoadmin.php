<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Sendtoadmin extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $phone, $message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->message = $message;
        $this->phone = $phone;
    }



    public function envelope()
    {
        return new Envelope(
            from: new Address($this->email, env('APP_NAME')),
            replyTo: [
                new Address(env('MAIL_USERNAME'), env('APP_NAME')),
            ],
            subject: $this->name . ' Sent you a contact mail from ' . env('APP_NAME'),
        );
    }



    public function content()
    {
        return new Content(
            markdown: 'emails.sendtoadmin',
            with: [
                'name' => $this->name,
                'phone' => $this->phone,
                'message' => $this->message,
                'email' => $this->email
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
