<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewContact extends Mailable
{
    use Queueable, SerializesModels;

    public $request;

    public function __construct($request)
    {
        $this->request = $request;
    }


    public function build()
    {
        return $this->markdown('emails.new-contact')->subject('Contact Raiochplay: '.$this->request->last_name.' '.$this->request->first_name);
    }
}
