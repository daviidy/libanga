<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class MediaAdded extends Mailable
{
    use Queueable, SerializesModels;
    public $user_id;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user_id)
    {
        $this->user_id  = $user_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $from = env('MAIL_USERNAME');
        $to = Auth::user()->email;
        return $this->subject('Ajoute de media')
        ->from($from)
        ->to($to)
        ->view('mails.users.media_added');
    }
}
