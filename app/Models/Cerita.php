<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cerita extends Model
{
    protected $fillable = ['tema', 'cerita', 'makna'];

    public function datasets()
    {
        return $this->hasMany(Dataset::class);
    }
}
