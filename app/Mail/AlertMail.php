<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class AlertMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    public function __construct($data)
    {
        //abstracting the email class, so this
        //class needs to take in the data object
        //The data object can have different properties
        //such as the subject, the message, the view file of the email 
        $this->data = $data;
    }
    public function build()
    {
        return $this->view($this->data['view'])
            ->subject($this->data['subject'])
            ->with(['message' => $this->data['message']]);
    }
}
