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
    public $user;
    public $user_id;
    public $user_name;
    public $user_email;
    public $user_phone;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($Anydetails)
    {
        $this->details = $Anydetails;
        $this->user = $Anydetails['user'];
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
