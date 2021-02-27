<?php

namespace App\Models;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $table='purchases';
    protected $fillable =[
                'service_id',
                'user_id',
                'status',
                'purchase_state',
                'medias_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function serives()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
    public function medias()
    {
        return $this->hasOne(Media::class);
    }
}
