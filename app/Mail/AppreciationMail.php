<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AppreciationMail extends Mailable
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
        return $this->subject('Appréciation extrait')
        ->from($from)
        ->to($to)
        ->view('mails.artistes.purchase_comment', ['url'=>route('commandesArtiste'),'detailCommande'=>$this->commande]);
    }
}
