<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = ['media'];
    protected $table = 'medias';

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}
