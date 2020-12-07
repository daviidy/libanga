<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chanson extends Model
{
    protected $fillable = ['title','album_id'];
    protected $table = 'chansons';

    public function albums()
    {
        return $this->belongsTo(Album::class);
    }
}
