<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AnulationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $beta;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($beta)
    {
        $this->beta = $beta;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.correo', $this->beta)->subject('Bandemica Anulaciones');
    }
}
