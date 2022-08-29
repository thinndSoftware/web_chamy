<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $message, $id;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message,$id)
    {
        $this->message = $message;
        $this->id = $id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->subject('DN Phone Cảm ơn Bạn đã liên hệ');
        ->view('admin.mail.contact',);
        ;
    }
}
