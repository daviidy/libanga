<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table='services';
    protected $fillable =[
                'name',
                'type',
                'price',
                'user_id',
                'service_description'
    ];

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}
