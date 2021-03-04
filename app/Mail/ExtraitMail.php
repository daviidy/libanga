<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class ExtraitMail extends Mailable
{
    use Queueable, SerializesModels;
    public $commande;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($commande)
    {
        $this->commande = $commande;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $from = env('MAIL_USERNAME');
        $to = $this->commande['email'];
        return $this->subject('Ajout extrait')
        ->from($from)
        ->to($to)
        ->view('mails.users.media_added', ['url'=>route('commandes'),'detailCommande'=>$this->commande]);
    }
}
