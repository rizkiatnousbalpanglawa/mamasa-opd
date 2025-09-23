<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penulis extends Model
{
    protected $guarded = ['id'];

    public function berita()
    {
        return $this->hasMany(Berita::class, 'penulis_id');
    }
}
