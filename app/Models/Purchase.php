<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $table='purchases';
    protected $fillable =[
                'serive_id',
                'user_id',
                'status'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function serives()
    {
        return $this->belongsTo(Service::class);
    }
}
