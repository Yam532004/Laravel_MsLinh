<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $sentData;
    /**
     * Create a new message instance.
     */
    public function __construct($sentData)
    {
        $this->sentData = $sentData;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Send Mail',
        );
    }
    public function build()
    {
        // Truyền dữ liệu vào view
        return $this->from('am.y25@student.passerellesnumeriques.org', 'From Am')
            ->subject('yêu cầu cấp lại mật khẩu từ shop bánh')
            ->replyTo('am.y25@student.passerellesnumeriques.org', 'Âm')
            ->view('emails.interfaceEmail', ['sentData' => $this->sentData]);
    }


    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.interfaceEmail',
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
