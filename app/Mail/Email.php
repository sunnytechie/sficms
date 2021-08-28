<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Email extends Mailable
{
    use Queueable, SerializesModels;

    public $details;
    public $name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($Anydetails, $name)
    {
        $this->details = $Anydetails;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Sisters Fellowship International')
            ->markdown('Mails.Email')
            ->from('hello@sfiloveinaction.org');
    }
}
