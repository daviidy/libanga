<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table='address';
    protected $fillable =[
                'city',
                'state',
                'description',
                'user_id',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
