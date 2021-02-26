<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $table='purchases';
    protected $fillable =[
                'service_id',
                'user_id',
                'status',
                'purchase_state',
                'medias_id',
                'names'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function serives()
    {
        return $this->belongsTo(Service::class);
    }
    public function medias()
    {
        return $this->hasOne(Media::class);
    }
}
