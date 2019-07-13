<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class testMail extends Mailable 
{
    use Queueable, SerializesModels;

    public $contact;
    public function __construct($contact) {

        $this->contact = 'jaysvishwa@gmail.com';

    }

    
    public function build()
    {
        return $this->view('email.testmail');
    }
}
