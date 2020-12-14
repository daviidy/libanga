<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table='albums';
    protected $fillable =[
                'purchase_date',
                'title',
                'user_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function chansons()
    {
        return $this->hasMany(Chanson::class);
    }
}
