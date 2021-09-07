<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('mail.contact');
        return $this->from(['addresss' => 'kurdgames90@gmail.com', 'name' => 'mustafa'])
        ->view('mail.contact')
        ->attach(asset('images/space.jpg'))
        ->with([
            'name' =>  $this->name,
        ]);
    }
}
