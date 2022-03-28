<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class mailContact extends Mailable
{
    use Queueable, SerializesModels;
    private $name, $state, $email, $capital, $tel, $message;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($req)
    {
        $this->name = $req->name;
        $this->email = $req->email;
        $this->state = $req->state;
        $this->capital = $req->capital;
        $this->message = $req->message;
        $this->tel = $req->number;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('markdowns.contact')->with([
            'name' => $this->name,
            'email' => $this->email,
            'state' => $this->state,
            'tel' => $this->tel,
            'message' => $this->message,
            'capital' => $this->capital,
        ]);
    }
}
