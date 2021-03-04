<?php

namespace App;

use App\Models\Address;
use App\Notifications\VerifyEmail;
use App\Models\Album;
use App\Models\Chanson;
use App\Models\Purchase;
use App\Models\Service;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    const ADMIN_TYPE = 'admin';
    const DEFAULT_TYPE = 'default';
    const ARTISTE_TYPE = 'artiste';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password','type','provider','provider_id','image','user_description','email_verified_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail($this->username)); // my notification
    }


    public function isAdmin()    {
        return $this->type === self::ADMIN_TYPE;
    }
    public function isArtiste()    {
        return $this->type === self::ARTISTE_TYPE;
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }
    public function albums()
    {
        return $this->hasMany(Album::class);
    }
    public function address()
    {
        return $this->hasMany(Address::class);
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

}
