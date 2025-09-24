<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GaleriKategori extends Model
{
    protected $guarded = ['id'];

    public function galeri()
    {
        return $this->hasMany(Galeri::class, 'kategori_id');
    }
}
