<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = ['media','name','purchase_id'];
    protected $table = 'medias';

    public function purchases()
    {
        return $this->belongsTo(Purchase::class);
    }
}
