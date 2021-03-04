<?php

namespace App\Http\Controllers;

use App\Mail\AppreciationMail;
use App\Mail\ArtistPurshaseSuccess;
use App\Mail\ClientPurshaseSuccess;
use App\Mail\ConfirmeMail;
use App\Mail\ExtraitMail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function ConfirmMail($user_id)
    {
        \Mail::send(new ConfirmeMail($user_id));
    }
    public function ArtistPurshaseSuccess($detailCommande)
    {
        \Mail::send(new ArtistPurshaseSuccess($detailCommande));
    }
    public function ClientPurshaseSuccess($detailCommande)
    {
        \Mail::send(new ClientPurshaseSuccess($detailCommande));
    }
    public function appreciation($detailCommande)
    {
        \Mail::send(new AppreciationMail($detailCommande));
    }
    public function extraitNotification($detailCommande)
    {
        \Mail::send(new ExtraitMail($detailCommande));
    }
}
