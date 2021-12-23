<?php

namespace App\Mail;

use App\Models\Professional;
use App\Models\Requeriment;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProfeRequeriment extends Mailable
{
    use Queueable, SerializesModels;

    public $requeriments;

    public function __construct(Requeriment $requeriments)
    {
        $this->requeriments = $requeriments;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.requeriment', $this->requeriments->toArray())->subject('Banmedica Requerimiento');
    }
}
