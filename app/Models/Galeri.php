<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $guarded = ['id'];

    public function kategori()
    {
        return $this->belongsTo(GaleriKategori::class, 'kategori_id');
    }
}
