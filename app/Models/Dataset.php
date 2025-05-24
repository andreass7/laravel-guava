<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dataset extends Model
{
    protected $fillable = ['filename', 'cerita_id'];

    public function cerita()
    {
        return $this->belongsTo(Cerita::class);
    }
}
